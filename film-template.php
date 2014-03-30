<?php
/**
 * Template Name: Film Page 
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header();
$myfilms = new WP_query( array( 
   'post_type' => 'film',
   'post_status' => 'publish',
   'orderby' => 'menu_order',
   'order' => 'ASC',
) ); 
$count = $myfilms->post_count; ?>

<div id="films-container" class="site-content" role="main">
	<div class="film-row"><?php $I = 0;
		while( $myfilms->have_posts() ) : $myfilms->the_post(); $I++; ?>
			<article class="film">
				<a class="img-link" href="<?php the_permalink(); ?>"><?php
					the_post_thumbnail('film-thumb'); ?>
					<h2><?php the_title(); ?></h2>
				</a><?php
				the_excerpt(); ?>
			</article><?php
			if ($I==$count){?>
				</div><?php
			}elseif ($I%2==0) {?>
				</div><div class="film-row"><?php
			}
		endwhile; wp_reset_postdata(); ?>
</div><!-- #films-container --><?php

get_footer();