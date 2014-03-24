<?php
/**
 * Single Photo Template 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$gal = get_post_meta(get_the_ID(), 'jilanikpay_gallery', true);
$args = array(
	'post_type' => 'attachment',
	'tax_query' => array(
		array(
			'taxonomy' => 'gallery',
			'field' => 'term_id',
			'terms' => $gal
		)
	)
);
$items = new WP_Query( $args );
//var_dump($items);
?>

<div id="photo-content" class="site-content" role="main"><?php 
	jn_breadcrumbs();
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			 ?>
			<article id="photo-<?php echo get_the_ID(); ?>">
				<h2><?php the_title(); ?></h2><?php
	    		the_content(); ?>
	    		<section id="gallery"><?php
	    			echo $gal;
	    			foreach ($items as $item) :
	    				echo $item;
	    			endforeach; ?>
	    		</section>
			</article><?php
		endwhile;
	endif; ?>
	<aside>
		Widgets go here..
	</aside>
</div><!-- #photo-content --><?php

get_footer(); ?>