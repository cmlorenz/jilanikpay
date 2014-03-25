<?php
/**
 * Blog Template
 *
 * This is the template that displays all pages by default.
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>

<div id="blog-content" class="site-content" role="main">
	<div id="blog-feed"><?php
		while ( have_posts() ) : the_post(); ?>
			<article class="blog-post">
				<?php the_date(); ?>
				<h2><?php the_title(); ?></h2>
				By <?php the_author(); ?>
				<?php the_content(); ?>
			</article><?php
		endwhile; ?>
	</div><!-- #page-feed --><?php
	get_sidebar(); ?>
</div><!-- #page-content --><?php

get_footer();?>