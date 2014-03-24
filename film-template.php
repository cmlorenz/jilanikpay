<?php
/**
 * Template Name: Film Page 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$myfilms = new WP_query( array( 
   'post_type' => 'film',
   'post_status' => 'publish',
   'orderby' => 'menu_order',
   'order' => 'ASC',
) ); ?>

<div id="films-container" class="site-content" role="main"><?php

	while( $myfilms->have_posts() ) : $myfilms->the_post(); ?>
		<article class="film">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php
			the_post_thumbnail('film-thumb');
			the_excerpt(); ?>
		</article><?php
	endwhile; wp_reset_postdata(); ?>

</div><!-- #films-container --><?php

get_footer();