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
$videoID = isset( $values['film_attachment'] ) ? esc_attr($values['film_attachment'][0]) : ''; ?>

<div id="film-content" class="site-content" role="main"><?php 
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article id="film-<?php echo get_the_ID(); ?>">
				<h2><?php the_title(); ?></h2><?php
				the_excerpt(); 
				if ($selected!='') {
	    			echo $selected;
	    		} else { 
	    			$videoData = wp_get_attachment_metadata($videoID);
	    			$videoPath = wp_get_attachment_url($videoID);
	    			if ( $videoData!='' || $videoPath!='' ) { ?>
		    			<object classid="<?php echo $videoID; ?>" width="<?php echo $videoData['width']; ?>" height="<?php echo $videoData['height']; ?>" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
							<param name="src" value="<?php echo $videoPath?>">
							<param name="qtsrc" value="<?php echo $videoPath?>">
							<param name="autoplay" value="false">
							<param name="loop" value="false">
							<param name="controller" value="true">
							<embed src="<?php echo $videoPath; ?>" qtsrc="<?php echo $videoPath; ?>" width="<?php echo $videoData['width']; ?>" height="<?php echo $videoData['height']; ?>" autoplay="false" loop="false" controller="true" pluginspage="http://www.apple.com/quicktime/"></embed>
						</object><?php
	    			}
	    		}
	    		the_content(); ?>
			</article><?php
		endwhile; wp_reset_postdata();
	endif; 
	jn_breadcrumbs();?>
</div><!-- #film-content --><?php

get_footer(); ?>