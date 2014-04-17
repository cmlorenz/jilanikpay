<?php
/**
 * Tag Template
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>

<div id="blog-content" class="site-content" role="main"><?php
	if ( have_posts() ) : ?>
		<h2 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'twentyfourteen' ), single_tag_title( '', false ) ); ?></h2>
		<div id="tag-feed"><?php
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="blog-post">
					<h3><?php echo get_the_date(); ?></h3>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<h5><?php the_tags(); ?></h5>
				</article><?php
			endwhile; wp_reset_postdata(); ?>
		</div><!-- #tag-feed --><?php
		get_sidebar();
	else : ?>
		<h2 class="archive-title"><?php _e( 'Nothing Found', 'twentyfourteen' ); ?></h2>
		<p><?php _e( 'It looks like nothing was found at this location. Try searching the blog or refer to the top navigation.', 'twentyfourteen' ); ?></p><?php
		get_search_form();
	endif; ?>
</div><!-- #blog-content --><?php

get_footer();