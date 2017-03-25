<header id="site-header">
	<h1><a href="index.php">CougarBooks</a></h1>
	<nav id="site-navigation">
		<ul>
			<?php if ( ! empty( $_SESSION['signed_in'] ) ): ?>
				<li><a href="post.php">Post New Ad</a></li>
				<li><a href="my-ads.php">My Ads</a></li>
				<li><a href="account.php">Account</a></li>
				<li><a href="sign-in.php?signout=1">Sign Out</a></li>
			<?php else: ?>
				<li><a href="<?php echo cb_get_register_url(); ?>">Register</a></li>
				<li><a href="<?php echo cb_get_signin_url(); ?>">Sign In</a></li>
			<?php endif; ?>
		</ul>
	</nav>
	<form action="search.php" id="site-search-form">
		<input type="text" placeholder="Search textbook ads" name="q" id="site-search-field" value="<?php echo ! empty( $_GET['q'] ) ? $_GET['q'] : ''; ?>" />
		<input type="submit" value="Submit" id="site-search-submit" />
	</form>
</header>
