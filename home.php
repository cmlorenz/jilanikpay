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
			<article id="post-<?php the_ID(); ?>" class="blog-post">
				<h3><?php echo get_the_date(); ?></h3>
				<h2><?php the_title(); ?></h2>
				<h4>By <?php the_author(); ?></h4>
				<?php the_content(); ?>
				<h5><?php the_tags(); ?></h5>
			</article><?php
		endwhile; wp_reset_postdata(); ?>
	</div><!-- #blog-feed --><?php
	get_sidebar(); ?>
</div><!-- #blog-content --><?php

get_footer();?>