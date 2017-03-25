<?php
include('assets/php/head.php');
?>
<title>CougarBooks | Sell your unused textbooks</title>
</head>
<body>

	<?php
	include('assets/php/header.php');
	?>

	<main>

		<section id="home-intro">

			<h1>Welcome to CougarBooks!</h1>

			<p>CougarBooks enables CSU San Marcos students to sell their unused textbooks to students who need them!</p>

		</section>

		<h2>Latest Ads</h2>

		<div id="books">

			<?php
			$ads = $db->fetchAll( 'SELECT * FROM ad WHERE is_closed = 0 ORDER BY creation_time DESC LIMIT 10', array() );
			?>

			<?php if ( count( $ads ) > 0 ): ?>

				<?php foreach ( $ads as $ad ): ?>

					<?php display_ad( $ad ); ?>

				<?php endforeach; ?>

			<?php else: ?>

				<p>There are no new ads to show!</p>

			<?php endif; ?>

		</div>

	</main>
	<?php
	include('assets/php/footer.php');
	?>
</body>
</html>
