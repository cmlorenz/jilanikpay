<?php
/*
 * Template Name: Film Page 
 */

get_header();

$args = array(
	'post_type'        => 'film',
	'post_status'      => 'publish'
	);

$myfilms = get_posts($args);
foreach ($myfilms as $film) : 
	setup_postdata( $film ); ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php
	the_post_thumbnail();
	the_content();
endforeach; 
wp_reset_postdata();
get_footer();