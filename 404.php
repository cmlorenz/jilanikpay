<?php
/**
 * 404 (Page Not Found) Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 */
get_header(); ?>

<div id="notfound-content" class="site-content" role="main">
	<h2 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h2>
	<p><?php _e( 'It looks like nothing was found at this location. Try searching the blog or refer to the top navigation.', 'twentyfourteen' ); ?></p>
	<?php get_search_form(); ?>
</div><!-- #notfound-contents --><?php

get_footer();