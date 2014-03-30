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
) );
$footer = get_post_meta(get_the_ID(), 'jilanikpay_footergallery', true);
$footeritems = new WP_query( array( 
	'post_type' => 'attachment',
	'post_status' => 'any',
	'tax_query' => array(
		array(
			'taxonomy' => 'gallery',
			'terms' => $footer,
			'field' => 'id'
		)
	)
) ); ?>

<div id="photo-content" class="site-content" role="main"><?php 
	
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article id="photo-<?php echo get_the_ID(); ?>">
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
		    				endwhile; wp_reset_postdata(); ?>
	    				</div><!-- .slide-container -->
	    				<a id="next" class="arrow" href="#"></a><?php
	    			endif; ?>
	    		</section><!-- #gallery -->
				<h2><?php the_title(); ?></h2><?php
	    		the_content();
				jn_breadcrumbs();
	    		if ( $footeritems->have_posts() ) : ?>
		    		<aside id="photo-footer">
	    				<div class="footer-gallery-container content"><?php
	    					while ( $footeritems->have_posts() ) : $footeritems->the_post(); ?>
	    						<div id="photo-<?php the_ID(); ?>" class="footer-photo"><?php
	    							echo wp_get_attachment_image( get_the_ID(), 'full' ); ?>
	    							<h4><?php the_title(); ?></h4>
	    						</div><?php
	    					endwhile; wp_reset_postdata(); ?>
	    				</div><!-- .footer-gallery-container -->
	    			</aside><!-- #photo-footer --><?php
	    		endif; ?>
			</article><?php
		endwhile; wp_reset_postdata();
	endif; ?>
</div><!-- #photo-content --><?php

get_footer(); ?>