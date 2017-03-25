<?php

// A wrapper class for interacting with the CougarBooks database
class Database {

	// private $host = 'localhost';
	// private $user = 'evans099'
	// private $password = 'evans099';
	// private $dbname = 'team2';

	private $dbh;
	private $error;

	// Connect to database upon instantiation
	function __construct($dbname, $user, $password) {
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		try {
			$this->dbh = new PDO( "mysql:host=localhost;dbname=$dbname", $user, $password, $options );
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
		}

	}

	// Close connection to database
	public function close() {
		$this->dbh = null;
	}

	// execute generic query (returning row count)
	public function query( $query, $params ) {
		$sth = $this->dbh->prepare( $query );
		$sth->execute( $params );
		return $sth->rowCount();
	}

	// Fetches a single result (represented as an associative array)
	public function fetchOne( $query, $params ) {
		$sth = $this->dbh->prepare( $query );
		$sth->execute( $params );
		return $sth->fetch(PDO::FETCH_ASSOC);
	}

	// Fetches a sequential array of results
	public function fetchAll( $query, $params ) {
		$sth = $this->dbh->prepare( $query );
		$sth->execute( $params );
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}

	// checks to see if user is an administrator
	public function isAdmin( $user_id ){
		$query = "SELECT is_admin
		FROM users
		WHERE user_id = :user_id";
		$admin = $db->fetchOne( $query, array(
			'user_id' => $user_id
		) );
		if ( $admin ) {
			return true;
		} else {
			return false;
		}
	}

	// Retrieve the attributes for the ad with the given ID
	public function get_ad( $ad_id ) {
		$query = 'SELECT * FROM ad WHERE ad_id = :ad_id';
		$ad = $this->fetchOne( $query, array(
			'ad_id' => $ad_id
		) );
		return $ad;
	}

	// return the id of the last inserted row
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

	// Securely hashes the given password using the given email as a salt
	public function hash_password( $password, $email ) {
		return hash( 'sha256', hash( 'sha256', $password ) . hash( 'sha256', trim( $email ) ) );
	}

	public function sign_in( $email, $entered_password ){

		if(!empty($email) && !empty($entered_password)){
			$query = 'SELECT user_id, user_password, is_admin
			FROM user
			WHERE email_address = :email_address
			LIMIT 1';

			$user = $this->fetchOne( $query, array(
				'email_address' => $email
			) );

			if($user['user_password'] === $this->hash_password( $entered_password, $email ) ){
				// set session variables with user data
				$_SESSION['signed_in'] = true;
				$_SESSION['user_id'] = $user['user_id'];
				$_SESSION['is_admin'] = $user['is_admin'];

				// log user signed in to db
				$this->log_user_action($user['user_id'], 'signin');
			} else {
				$_SESSION['signed_in'] = false;
			}
		}
	}

	// Return true if the currently-signed-in user can edit this ad; otherwise,
	public function allowed_to_edit_ad( $ad_id ) {
		if ( ! empty( $_SESSION['is_admin'] ) || empty( $ad_id ) ) {
			// If signed-in user is admin or if ad ID isn't given, allow user to
			// post ad
			return true;
		} else if ( ! empty( $ad_id ) ) {
			// Otherwise, ad ID is provided, check if ad was posted by signed-in
			// user

			$query = 'SELECT user_id FROM ad WHERE ad_id = :ad_id';
			$user = $this->fetchOne( $query, array(
				'ad_id' => $ad_id
			) );

			if ( $user['user_id'] === $_SESSION['user_id'] ) {
				return true;
			} else {
				return false;
			}

		}
	}

	// Retrieve the ads matching the given search keyword (supports pagination)
	public function get_ads_by_keyword( $keyword, $page = 0, $page_length = CB_PAGE_LENGTH ) {
		$query = "SELECT *
			FROM ad
			WHERE is_closed = 0
			AND (book_title LIKE :title
				OR book_author LIKE :author
				OR book_isbn = :isbn)
			LIMIT " . ($page * $page_length) . ", " . $page_length;
		$ads = $this->fetchAll( $query, array(
	    	'title' => '%' . $keyword . '%',
	    	'author' => '%' . $keyword . '%',
	    	'isbn' => $keyword
		) );
		return $ads;
	}

	// Retrieve all ads for the given user (supports pagination)
	public function get_ads_by_user( $user_id, $page = 0, $page_length = CB_PAGE_LENGTH) {
		$query = "SELECT *
			FROM ad
			WHERE user_id = :user_id
			LIMIT " . ($page * $page_length) . ", " . $page_length;
		$ads = $this->fetchAll( $query, array(
			'user_id' => $user_id
		) );
		// Get all ads for this page except the last
		return $ads;
	}

	// Returns true if the given email address is already taken by some user
	// other than the user with the given ID
	public function email_already_taken( $email_address ) {
		$query = "SELECT email_address FROM user WHERE email_address = :email";
		$params = array(
			'email' => $email_address
		);
		// If user is signed in, assume user is trying to change email
		if ( isset( $_SESSION['user_id'] ) ) {
			$query .= ' AND user_id != :user_id';
			$params['user_id'] = $_SESSION['user_id'];
		}
		$num_existing_users = $this->query( $query, $params );
		if ( $num_existing_users !== 0 ) {
			return true;
		} else {
			return false;
		}
	}

	// log user ineraction sign in / sign out
	public function log_user_action( $user_id, $action ) {
		$query = "INSERT INTO user_log ( user_id, action )
							VALUES ( user_id = :user_id, action = :action )";
		$params = ( array(
				'user_id' => $user_id,
				'action' => $action
		) );

		$this->query( $query, $params );

	}

	// log ad interaction added, edited, closed
	public function log_ad_action( $ad_id, $action ) {
		$query = "INSERT INTO ad_log ( ad_id, action )
							VALUES ( ad_id = :ad_id, action = :action )";
		$params = ( array(
				'ad_id' => $ad_id,
				'action' => $action
		) );

		$this->query( $query, $params );

	}

}




$db = new Database('team2', 'evans099', 'evans099');

?>
