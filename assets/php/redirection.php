<?php

// Append the current page path to the given URL (but only if the redirect page
// is not the registration, sign-in, or sign-out page)
function cb_add_redirect_param( $url ) {
	if ( ! preg_match( '/(sign-in|register)/', $_SERVER['REQUEST_URI'] ) ) {
		$url .= '?redirect=' . urlencode( $_SERVER['REQUEST_URI'] );
	}
	return $url;
}

// Retrieves the URL to the registration page (redirecting to the current page
// after submitting the form)
function cb_get_register_url() {
	return cb_add_redirect_param( 'register.php' );
}

// Retrieves the URL to the sign-in page (redirecting to the current page
// after submitting the form)
function cb_get_signin_url() {
	return cb_add_redirect_param( 'sign-in.php' );
}

// Redirect to a different page
function cb_redirect( $redirect_path ) {
	header( "Location: $redirect_path");
}

// Redirects a user after sign-in to the page they were on previously (also
// applies to new users after registration)
function cb_redirect_user_signin( $redirect_path ) {
	if ( ! empty( $redirect_path ) ) {
		// redirect to page that the user was on before signing in
		cb_redirect( $redirect_path );
	} else {
		// redirect to My Ads page if explicit redirect URL is not provided
		cb_redirect( '../../my-ads.php' );
	}
}

// Output a hidden form field containing a redirect path (to be used in Sign In
// and Registration forms)
function cb_embed_redirect_field() {
	// Ensure that PHP doesn't throw an 'undefined index' error
	if ( ! empty( $_GET['redirect'] ) ) {
		$redirect_path = $_GET['redirect'];
	} else {
		$redirect_path = '';
	}
	?>
	<input type="hidden" name="redirect_path" value="<?php echo $redirect_path; ?>" />
	<?php
}

?>
