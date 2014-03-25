<?php
/**
 * Single Photo Template 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$gal = get_post_meta(get_the_ID(), 'jilanikpay_gallery', true);
$items = new WP_query(array( 
		'post_type' => 'attachment',
    	'post_status' => 'any',
    	'tax_query' => array(
        	array(
         		'taxonomy' => 'gallery',
            	'terms' => $gal,
            	'field' => 'id',
       		 	)
   			)
		)); 
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
	    			//echo $gal;
	    			if ($items->have_posts()) {
						while ($items->have_posts()) { $items->the_post(); 
	    					$image_src = wp_get_attachment_url(get_the_ID());?>
	    					<img src="<?php echo $image_src ?>" alt="<?php the_title(); ?>"><?php				

	    				}
	    			}?>
	    		</section>
			</article><?php
		endwhile;
	endif; ?>
	<aside>
		Widgets go here..
	</aside>
</div><!-- #photo-content --><?php

get_footer(); ?>