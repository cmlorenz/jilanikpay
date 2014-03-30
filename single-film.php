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
$filmAttach = isset( $values['film_attachment'] ) ? esc_attr($values['film_attachment'][0]) : ''; 
var_dump($filmAttach);?>

<div id="film-content" class="site-content" role="main"><?php 
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article id="film-<?php echo get_the_ID(); ?>">
				<h2><?php the_title(); ?></h2><?php
				the_excerpt(); 
				if ($selected!='') {
	    			echo $selected;
	    		} else { ?>
	    			
	    		}
	    		the_content(); ?>
			</article><?php
		endwhile; wp_reset_postdata();
	endif; 
	jn_breadcrumbs();?>
</div><!-- #film-content --><?php

get_footer(); ?>