<?php
include('assets/php/head.php');
?>
<title>CougarBooks | My Ads</title>
</head>
<body>

	<?php
	include('assets/php/header.php');
	?>

	<main>

		<?php if ( ! empty( $_GET['closed'] ) ): ?>
			<div class="notification">Ad has been closed.</div>
		<?php endif; ?>

		<h1>My Ads</h1>

		<?php
		$page_index = isset($_GET['page']) ? htmlspecialchars( $_GET['page'] ) : 0;
		// Retrieve all ads created by the signed-in user
		// WHERE user_id = :user_id
		$ads = $db->get_ads_by_user( $_SESSION['user_id'], $page_index );
		$num_ads = count( $ads );
		?>

		<?php if ( $num_ads == 0 ): ?>
			<p>There are no ads to display.</p>
		<?php endif; ?>

		<div id="books">
			<?php foreach ( $ads as $ad_index => $ad ): ?>
				<?php if ( $ad_index < $num_ads ): ?>
					<?php display_ad( $ad ); ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<?php include( 'assets/php/pagination.php' ); ?>
		<?php display_pagination_controls( $num_ads, $page_index ); ?>

	</main>
	<?php
	include('assets/php/footer.php');
	?>
</body>
</html>
