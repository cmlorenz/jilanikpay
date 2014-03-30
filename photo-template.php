<?php
/**
 * Template Name: Photo Page 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$myphotos = new WP_query( array( 
   'post_type' => 'photo',
   'post_status' => 'publish',
   'orderby' => 'menu_order',
   'order' => 'ASC',
) ); ?>

<div id="photos-container" class="site-content" role="main"><?php

	while( $myphotos->have_posts() ) : $myphotos->the_post(); ?>
		<article class="photo">
			<a class="img-link" href="<?php the_permalink(); ?>"><?php
				the_post_thumbnail('photo-thumb'); ?>
				<h2><?php the_title(); ?></h2>
			</a><?php
			the_excerpt(); ?>
		</article><?php
	endwhile; wp_reset_postdata(); ?>

</div><!-- #photos-container --><?php

get_footer();