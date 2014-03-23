<?php 
get_header();
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			the_title();
			$values = get_post_custom( $post->ID );
    		$selected = isset( $values['film_embed'] ) ? $values['film_embed'][0] : '';
    		echo $selected;
    		the_content();
		} // end while
	} // end if
get_footer();?>