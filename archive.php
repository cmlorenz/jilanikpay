<?php
/**
 * Archive Template
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>

<div id="blog-content" class="site-content" role="main"><?php
	if ( have_posts() ) : ?>
		<h2 class="archive-title"><?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'twentyfourteen' ), get_the_date() );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyfourteen' ) ) );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyfourteen' ) ) );
			else :
				_e( 'Archives', 'twentyfourteen' );
			endif; ?>
		</h2>
		<div id="archive-feed"><?php
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="blog-post">
					<h3><?php echo get_the_date(); ?></h3>
					<h2><?php the_title(); ?></h2>
					<h4>By <?php the_author(); ?></h4>
					<?php the_content(); ?>
					<h5><?php the_tags(); ?></h5>
				</article><?php
			endwhile; ?>
		</div><!-- #archive-feed --><?php
		get_sidebar();
	else : ?>
		<h2 class="archive-title"><?php _e( 'Nothing Found', 'twentyfourteen' ); ?></h2>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyfourteen' ); ?></p><?php
		get_search_form();
	endif; ?>
</div><!-- #blog-content --><?php

get_footer();