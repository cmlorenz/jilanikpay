<?php
/**
 * Single Film Template 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$values = get_post_custom( $post->ID );
$selected = isset( $values['film_embed'] ) ? $values['film_embed'][0] : ''; ?>

<div id="film-content" class="site-content" role="main">
	<p class="crumbs"><a href="">« Breadcrumbs</a></p><?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();  ?>
			<h2><?php the_title(); ?></h2><?php
    		echo $selected;
    		the_content();
		endwhile;
	endif; ?>
</div><!-- #film-content --><?php

get_footer(); ?>