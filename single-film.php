<?php
/**
 * Single Film Template 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$values = get_post_custom( $post->ID );
$selected = isset( $values['film_embed'] ) ? $values['film_embed'][0] : '';
$text = isset( $values['film_filmdesc'] ) ? $values['film_filmdesc'][0] : ''; ?>

<div id="film-content" class="site-content" role="main"><?php 
	jn_breadcrumbs();
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article id="film-<?php echo get_the_ID(); ?>">
				<h2><?php the_title(); ?></h2><?php
	    		echo $selected;
	    		the_content(); ?>
	    		<p><?php echo $text ?></p>
			</article><?php
		endwhile; wp_reset_postdata();
	endif; ?>
</div><!-- #film-content --><?php

get_footer(); ?>