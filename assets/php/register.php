<?php
session_start();
include('database.php');
include('redirection.php');

// Format the phone number by removing dashes
function cb_format_telephone_no( $telephone_no ) {
	if ( ! empty( $telephone_no ) ) {
		return trim( str_replace( '-', '', $telephone_no ) );
	} else {
		return null;
	}
}

// get all the variables that were passed from the form
// when the user registered
if( ! empty( $_POST['submit'] ) ){

	if( !empty( $_POST['first_name'] ) ){
		$first_name = trim( $_POST['first_name'] );
	}

	if( !empty( $_POST['last_name'] ) ){
		$last_name = trim( $_POST['last_name'] );
	}

	if( !empty( $_POST['email'] ) ){
		$email_address = trim( $_POST['email'] );
	}

	if( !empty( $_POST['phone'] ) ){
		$telephone_no = trim( $_POST['phone'] );
	} else {
		$telephone_no = null;
	}

	if( !empty( $_POST['password'] ) ){
		$user_password = $_POST['password'];
	}

	if( !empty( $_POST['confirm_password'] ) ){
		$confirm_password = $_POST['confirm_password'];
	}

	// make sure that both the password and confirmed password matches
	// in order to avoid the user entering incorrect password
	if( $user_password == $confirm_password ){

		// If no registered users with the same email address exist
		if ( ! $db->email_already_taken( $email_address ) ) {
			// Register new user as normal

			$query = 'INSERT INTO user
			( first_name, last_name, email_address, telephone_no, user_password  )
			VALUES (:first_name, :last_name, :email_address, :telephone_no, :user_password)';

			$db->query( $query, array(
				'first_name' => trim( $first_name ),
				'last_name' => trim( $last_name ),
				'email_address' => trim( $email_address ),
				'telephone_no' => cb_format_telephone_no( $telephone_no ),
				'user_password' => $db->hash_password( $user_password, $email_address )
			) );

			$new_user_id = $db->lastInsertId();

			$_SESSION['signed_in'] = true;
			$_SESSION['user_id'] = $new_user_id;

			cb_redirect_user_signin( $_POST['redirect_path'] );

		} else {
			// Otherwise, inform user that the entered email is taken

			cb_redirect( '../../register.php?email_taken=1&redirect=' . urlencode( $_POST['redirect_path'] ) );

		}

	}else{
		cb_redirect( '../../register.php?password_mismatch=1&redirect=' . urlencode( $_POST['redirect_path'] ) );
	}




}


?>
