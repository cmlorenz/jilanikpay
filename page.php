<?php
/**
 * Page Template
 *
 * This is the template that displays all pages by default.
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>

<article id="page-content" class="site-content" role="main"><?php
	while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2><?php
		the_content();
	endwhile; ?>
</article><!-- #page-content --><?php

get_footer();