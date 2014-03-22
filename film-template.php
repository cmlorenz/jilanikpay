<?php
/*
 * Template Name: Film Page 
 */

get_header();

$myfilms = new WP_query( array( 
   'post_type' => 'film',
   'post_status' => 'publish',
   'orderby' => 'menu_order',
   'order' => 'ASC',
) );
while( $myfilms->have_posts() ) : $myfilms->the_post(); ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php
	the_post_thumbnail();
	the_content();
endwhile; 
wp_reset_postdata();

get_footer();