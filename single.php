<?php
/**
 * Single Post Template
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>

<div id="blog-content" class="site-content" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>><?php
		while ( have_posts() ) : the_post();
			twentyfourteen_post_thumbnail(); ?>
			<h3><?php echo get_the_date(); ?></h3>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<h5><?php the_tags(); ?></h5><?php
			twentyfourteen_post_nav();
		endwhile; wp_reset_postdata(); ?>
	</article><!-- #post --><?php
	get_sidebar(); ?>
</div><!-- #blog-content --><?php

get_footer();