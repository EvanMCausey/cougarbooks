<?php
session_start();
include('database.php');
include('redirection.php');

// Format the phone number by removing dashes
function cb_format_telephone_no( $telephone_no ) {
	return trim( str_replace( '-', '', $telephone_no ) );
}

// Prevent unauthorized users from trying to update account information
if ( ! isset( $_SESSION['signed_in'] ) ) {
	die('Cannot update account: authentication failed');
}

$first_name = trim( $_POST['first_name'] );
$last_name = trim( $_POST['last_name'] );
$email_address = trim( $_POST['email'] );
if ( ! empty( $_POST['phone'] ) ) {
	$telephone_no = cb_format_telephone_no( $_POST['phone'] );
} else {
	$telephone_no = null;
}

$password = $_POST['password'];
$confirmed_password = $_POST['confirm_password'];
$hashed_password = $db->hash_password( $password, $email_address );

// If another user is already using the entered email address
if ( $db->email_already_taken( $email_address ) ) {

	// Return to Account page indicating that email is already taken
	cb_redirect('../../account.php?email_taken=1');

} else {

	// Only save changes if entered passwords match
	if ( $password === $confirmed_password ) {

		$query = 'UPDATE user SET
			first_name = :first_name,
			last_name = :last_name,
			email_address = :email_address,
			telephone_no = :telephone_no,
			user_password = :hashed_password
			WHERE user_id = :user_id';

		$db->query( $query, array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email_address' => $email_address,
			'telephone_no' => $telephone_no,
			'hashed_password' => $hashed_password,
			'user_id' => $_SESSION['user_id']
		) );

		// Redirect back to Account page after saving changes
		cb_redirect('../../account.php?success=1');

	} else {

		// Return to Account page indicating that entered passwords do not match
		cb_redirect('../../account.php?pw_mismatch=1');

	}

}

?>
