<?php
include('assets/php/head.php');
?>
<title>CougarBooks | Register</title>
</head>
<body>

	<?php
	include('assets/php/header.php');
	?>

	<main>

		<?php if ( isset( $_GET['email_taken'] ) ): ?>
			<div class="notification warning">Email address already taken</div>
		<?php endif; ?>

		<?php if ( isset( $_GET['password_mismatch'] ) ): ?>
			<div class="notification warning">Passwords do not match</div>
		<?php endif; ?>

		<h1>Register</h1>

		<form class="register-form" action="assets/php/register.php" method="post">

			<?php cb_embed_redirect_field(); ?>

			<label for="first-name-field">First Name:</label><br>
			<input id="first-name-field" type="text" name="first_name" required autofocus><br>

			<label for="last-name-field">Last Name:</label><br>
			<input id="last-name-field" type="text" name="last_name" required><br>

			<label for="email-field">Email:</label><br>
			<input id="email-field" type="text" name="email" required placeholder="me@example.com" pattern="\s*([^@]+)@([^@]+)\s*"><br>

			<label for="phone-field">Phone Number:</label><br>
			<input id="phone-field" type="text" name="phone" placeholder="xxx-xxx-xxxx" pattern="\s*(\d{3})-?(\d{3})-?(\d{4})\s*"><br>

			<label for="password-field">Password:</label><br>
			<input id="password-field" type="password" name="password" required><br>

			<label for="confirm-password-field">Confirm Password:</label><br>
			<input id="confirm-password-field" type="password" name="confirm_password" required><br>

			<button type="submit" name="submit" value="1">Register</button>

		</form>

	</main>
	<?php
	include('assets/php/footer.php');
	?>
</body>
</html>
