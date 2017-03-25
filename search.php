<?php
include('assets/php/head.php');
?>
<title>CougarBooks | Search</title>
</head>
<body>

	<?php
	include('assets/php/header.php');
	?>

	<main>

		<?php
			$page_index = isset($_GET['page']) ? htmlspecialchars( $_GET['page'] ) : 0;
			$search_word = isset($_GET['q']) ? htmlspecialchars( $_GET['q'] ) : '';
		?>

		<h1>Search for textbooks</h1>
		<p>Your search results for '<?php echo $search_word ?>'</p>

		<?php
			$ads = $db->get_ads_by_keyword( $search_word, $page_index );
			$num_ads = count( $ads );
		?>

		<?php foreach ( $ads as $ad_index => $ad ): ?>
			<?php if ( $ad_index < $num_ads ): ?>
				<?php display_ad( $ad ); ?>
			<?php endif; ?>
		<?php endforeach; ?>

		<?php include( 'assets/php/pagination.php' ); ?>
		<?php display_pagination_controls( $num_ads, $page_index ); ?>

	</main>
	<?php
	include('assets/php/footer.php');
	?>
</body>
</html>
