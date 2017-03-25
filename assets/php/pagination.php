<?php

// Display navigation controls (next page, previous page, etc.) for paginated
// areas of the site (e.g. My Ads and Search)
function display_pagination_controls( $num_results, $page_index, $page_length = CB_PAGE_LENGTH ) {
	$query_param = isset( $_GET['q'] ) ? "query={$_GET['q']}&" : ''
	?>
	<p>
		<?php if ( $page_index > 0 ): ?>
			<a href="?<?php echo $query_param; ?>page=<?php echo $page_index - 1; ?>">Previous Page</a> |
		<?php endif; ?>
		Page <?php echo ($page_index + 1) ?>
		<?php if ( $num_results == $page_length ): ?>
			| <a href="?<?php echo $query_param; ?>page=<?php echo $page_index + 1; ?>">Next Page</a>
		<?php endif; ?>
	</p>
	<?php

}

?>
