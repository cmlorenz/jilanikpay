<?php
/**
 * Front Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
$film = get_option('jilanikpay_film'); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<h2><?php echo get_the_title($film['featured_film']); ?></h2>
			<?php echo get_the_post_thumbnail($film['featured_film']); ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content --><?php

get_footer();