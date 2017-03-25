<?php
include('assets/php/head.php');
$ad = $db->get_ad( $_GET['ad'] );
?>
<link rel="stylesheet" href="assets/css/ad.css" />
<title><?php echo htmlspecialchars( $ad['book_title'] ); ?> | CougarBooks</title>
</head>
<body>

	<?php
	include('assets/php/header.php');
	?>

	<main>

		<div class="book-ad<?php echo $ad['is_closed'] ? ' closed' : ''; ?>">

			<?php if ( ! empty( $ad['path_to_picture'] ) ): ?>
				<?php display_ad_image( $ad ); ?>
			<?php endif; ?>

			<div class="ad-info">

				<?php if ( ! empty( $_SESSION['signed_in'] ) && $db->allowed_to_edit_ad( $_GET['ad'] ) ): ?>
					<a href="post.php?ad=<?php echo htmlspecialchars( $_GET['ad'] ); ?>" class="edit-ad-link">Edit</a>
				<?php endif ?>

				<h1 class="book-title"><?php echo htmlspecialchars( $ad['book_title'] ); ?></h1>

				<?php if ( $ad['is_closed'] ): ?>
					<span class="closed-badge">Closed</span>
				<?php endif; ?>

				<div class="book-authors"><span class="book-attr-label">Author(s):</span> <?php echo htmlspecialchars( $ad['book_author'] ); ?></div>

				<?php if ( ! empty( $ad['book_edition'] ) ): ?>
					<div class="book-edition"><span class="book-attr-label">Edition:</span> <?php echo htmlspecialchars( $ad['book_edition'] ); ?></div>
				<?php endif; ?>

				<div class="book-isbn"><span class="book-attr-label">ISBN:</span> <?php echo htmlspecialchars( $ad['book_isbn'] ); ?></div>

				<div class="book-price"><span class="book-attr-label">Price:</span> $<?php echo htmlspecialchars( $ad['listed_price'] ); ?></div>

				<div class="ad-post-date"><span class="book-attr-label">Posted:</span> <?php echo strftime( '%b %d, %Y @ %-I:%M %p', strtotime( $ad['creation_time'] ) ); ?></div>

				<br>

				<div class="ad-description"><?php echo str_replace( "\n", '<br>', htmlspecialchars( $ad['ad_description'] ) ); ?></div>

			</div>

		</div>

		<hr>

		<?php
		$query = "SELECT * FROM user WHERE user_id = :user_id";
		$ad_user = $db->fetchOne( $query, array(
			'user_id' => $ad['user_id']
		) );
		?>

		<div class="contact-info">
			To buy this book, contact <?php echo "{$ad_user['first_name']} {$ad_user['last_name']}"; ?>
			<?php if ( ! empty( $ad_user['telephone_no'] ) ): ?>
				at <?php echo htmlspecialchars( $ad_user['telephone_no'] ); ?>
			<?php endif; ?>
			(<a href="mailto:<?php echo htmlspecialchars( $ad_user['email_address'] ); ?>">email</a>)
		</div>

	</main>
	<?php
	include('assets/php/footer.php');
	?>
</body>
</html>
