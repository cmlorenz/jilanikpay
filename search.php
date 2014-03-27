<?php
/**
 * Search Results Template
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>

<div id="blog-content" class="site-content" role="main"><?php
	if ( have_posts() ) : ?>
		<h2 class="page-title"><?php printf( __( 'Blog Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h2>
		<div id="results-feed"><?php
			while ( have_posts() ) : the_post();
				if ( get_post_type(get_the_ID())=='post' ) : ?>
					<article id="post-<?php the_ID(); ?>" class="result">
						<h3><?php echo get_the_date(); ?></h3>
						<h2><?php the_title(); ?></h2>
						<h4>By <?php the_author(); ?></h4>
						<?php the_content(); ?>
						<h5><?php the_tags(); ?></h5>
					</article><?php
				endif;
			endwhile; ?>
		</div><!-- #results-feed --><?php
		get_sidebar();
	else : ?>
		<h2 class="page-title"><?php _e( 'Nothing Found', 'twentyfourteen' ); ?></h2>
		<p><?php _e( 'It looks like nothing was found at this location. Try searching the blog or refer to the top navigation.', 'twentyfourteen' ); ?></p><?php
		get_search_form();
	endif; ?>
</div><!-- #blog-content --><?php

get_footer();