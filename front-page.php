<?php
/**
 * Front Page Template
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$film = get_option('jilanikpay_film'); ?>

<article id="frontpage-content" class="site-content" role="main">
	<?php echo get_the_post_thumbnail($film['featured_film'], 'feat-film'); ?>
	<h2><?php echo get_the_title($film['featured_film']); ?></h2>
</article><!-- #frontpage-content --><?php

get_footer();