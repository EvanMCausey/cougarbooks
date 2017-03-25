<?php
include('assets/php/head.php');
?>
<?php if ( ! empty( $_GET['ad'] ) ): ?>
	<title>CougarBooks | Edit Ad</title>
<?php else: ?>
	<title>CougarBooks | Post New Ad</title>
<?php endif; ?>
</head>
<body>

	<?php
	include('assets/php/header.php');
	?>

	<main>

		<?php if ( isset( $_GET['uploadfail'] ) ): ?>
			<div class="notification warning">Image size is too large. Please upload a smaller image.</div>
		<?php endif; ?>

		<?php
		if ( ! empty( $_GET['ad'] ) ) {
			$ad_id = $_GET['ad'];
			// Populate fields for existing ad
			$ad = $db->get_ad( $ad_id );
			// Prepend $ to book price for readability
			$ad['listed_price'] = '$' . $ad['listed_price'];
			echo '<h1>Edit Textbook Ad</h1>';
		} else {
			$ad_id = null;
			// Leave fields blank for new ad
			$ad = array(
				'book_title' => '',
				'book_author' => '',
				'book_edition' => '',
				'book_isbn' => '',
				'listed_price' => '',
				'path_to_picture' => '',
				'ad_description' => '',
			);
			echo '<h1>Post New Textbook Ad</h1>';
		}
		?>

		<?php if ( ! empty( $_SESSION['signed_in'] ) ): ?>

			<?php if ( $db->allowed_to_edit_ad( $ad_id ) ): ?>

				<form class="post-form" action="assets/php/post.php" method="post" enctype="multipart/form-data">

					<input id="ad-id-field" type="hidden" name="ad_id" value="<?php echo $ad_id; ?>">

					<label for="book-title-field">Book Title:</label><br>
					<input id="book-title-field" type="text" name="book_title" required maxlength="100" value="<?php echo htmlspecialchars( $ad['book_title'] ); ?>" autofocus><br>

					<label for="book-author-field">Author(s):</label><br>
					<input id="book-author-field" type="text" name="book_author" required maxlength="100" value="<?php echo htmlspecialchars( $ad['book_author'] ); ?>"><br>

					<label for="book-edition-field">Edition:</label><br>
					<input id="book-edition-field" type="text" name="book_edition" maxlength="100" value="<?php echo $ad['book_edition']; ?>"><br>

					<label for="isbn-field">ISBN:</label><br>
					<input id="isbn-field" type="text" name="book_isbn" required pattern="\s*\d(-?\d){9,12}\s*" maxlength="17" placeholder="10-digit or 13-digit ISBN" value="<?php echo htmlspecialchars( $ad['book_isbn'] ); ?>"><br>

					<label for="book-price-field">Price:</label><br>
					<input id="book-price-field" type="text" name="listed_price" required pattern="\s*\$\d+(\.\d{2})?\s*" maxlength="30" placeholder="$0.00" value="<?php echo $ad['listed_price']; ?>"><br>

					<label for="ad-description">Book Description:</label><br>
					<textarea name="ad_description" id="ad-description" placeholder="200 characters or less" maxlength="200"><?php echo htmlspecialchars( $ad['ad_description'] ); ?></textarea><br>

					<input type="hidden" name="MAX_FILE_SIZE" value="1048576s" />

					<?php if ( ! empty( $ad['path_to_picture'] ) ): ?>
						<label>Book Photo:</label><br>
						<?php display_ad_image( $ad ); ?>
						<br>
						<label for="book-image-field">New Photo:</label><br>
					<?php else: ?>
						<label for="book-image-field">Book Photo:</label><br>
					<?php endif; ?>
					<input id="book-image-field" type="file" name="book_image"><br>
					<small>(1MB max size)</small><br>

					<?php if ( ! empty( $ad_id ) ): ?>
						<button type="submit" name="submit" value="1">Save Changes</button>
						<?php if ( $ad['is_closed'] !== '1' ): ?>
							<button type="submit" name="close" value="1" class="warning">Close Ad</button>
						<?php endif; ?>
					<?php else: ?>
						<button type="submit" name="submit" value="1">Post New Ad</button>
					<?php endif; ?>

				</form>

			<?php else: ?>

				<p>Sorry, but you are not allowed to edit ads which aren't your own.</p>

			<?php endif; ?>

		<?php else: ?>

			<p>You must <a href="<?php echo cb_get_signin_url(); ?>">sign in</a> or <a href="<?php echo cb_get_register_url(); ?>">register</a> to post new ads.</p>

		<?php endif; ?>

	</main>
	<?php
	include('assets/php/footer.php');
	?>
</body>
</html>
