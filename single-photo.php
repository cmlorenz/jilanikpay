<?php
/**
 * Single Photo Template 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$gal = get_post_meta(get_the_ID(), 'jilanikpay_gallery', true);
$items = new WP_query( array( 
	'post_type' => 'attachment',
	'post_status' => 'any',
	'tax_query' => array(
		array(
			'taxonomy' => 'gallery',
			'terms' => $gal,
			'field' => 'id'
		)
	)
) ); ?>

<div id="photo-content" class="site-content" role="main"><?php 
	jn_breadcrumbs();
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article id="photo-<?php echo get_the_ID(); ?>">
				<h2><?php the_title(); ?></h2><?php
	    		the_content(); ?>
	    		<section id="gallery"><?php
	    			if ( $items->have_posts() ) : ?>
	    				<a id="prev" class="arrow" href="#"></a>
	    				<div class="slide-container"><?php
	    					$first = true;
							while ( $items->have_posts() ) : $items->the_post(); ?>
								<div class="photo-slide <?php if ($first) echo 'active'; $first=false; ?>"><?php
									echo wp_get_attachment_image( get_the_ID(), 'photo-slide' ); ?>
									<h3><?php the_title(); ?></h3>
								</div><?php
		    				endwhile; ?>
	    				</div><!-- .slide-container -->
	    				<a id="next" class="arrow" href="#"></a><?php
	    			endif; ?>
	    		</section><!-- #gallery -->
			</article><?php
		endwhile;
	endif;
	get_sidebar( 'footer' ); ?>
</div><!-- #photo-content --><?php

get_footer(); ?>