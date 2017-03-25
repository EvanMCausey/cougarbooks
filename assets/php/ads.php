<?php

// Displays the <img> element for the given ad object
function display_ad_image( $ad ) {
	?>
	<div class="book-image-container">
		<img class="book-image" src="<?php echo CB_AD_PHOTO_PATH_BASE . '/' . htmlspecialchars( $ad['path_to_picture'] ); ?>" alt="<?php echo htmlspecialchars( $ad['book_title'] ); ?>" />
	</div>
	<?php
}

// Displays the HTML for the given ad object
function display_ad( $ad ) {

	?>

	<div class="book-ad<?php echo $ad['is_closed'] ? ' closed' : ''; ?>">
		<?php if ( $ad['is_closed'] ): ?>
			<span class="closed-badge">Closed</span>
		<?php endif; ?>
		<?php if ( ! empty( $ad['path_to_picture'] ) ): ?>
			<?php display_ad_image( $ad ); ?>
		<?php endif; ?>
		<div class="ad-info">
			<h3 class="book-title"><a href="ad.php?ad=<?php echo htmlspecialchars( $ad['ad_id'] ); ?>"><?php echo htmlspecialchars( $ad['book_title'] ); ?></a></h3>
			<div class="book-authors"><span class="book-attr-label">Author(s):</span> <?php echo htmlspecialchars( $ad['book_author'] ); ?></div>
			<?php if ( ! empty( $ad['book_edition'] ) ): ?>
				<div class="book-edition"><span class="book-attr-label">Edition:</span> <?php echo htmlspecialchars( $ad['book_edition'] ); ?></div>
			<?php endif; ?>
			<div class="book-isbn"><span class="book-attr-label">ISBN:</span> <?php echo htmlspecialchars( $ad['book_isbn'] ); ?></div>
			<div class="ad-post-date"><span class="book-attr-label">Posted:</span> <?php echo strftime( '%b %d, %Y @ %-I:%M %p', strtotime( $ad['creation_time'] ) ); ?></div>
			<div class="book-price">$<?php echo htmlspecialchars( $ad['listed_price'] ); ?></div>
		</div>
	</div>

	<?php

}

?>
