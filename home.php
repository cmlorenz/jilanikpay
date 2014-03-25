<?php
/**
 * Blog Template
 *
 * This is the template that displays all pages by default.
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
get_header(); ?>
<div id="page-content" class="site-content" role="main"><?php
	while ( have_posts() ) : the_post(); ?>
		<article>
			<h2><?php the_title(); ?></h2><?php the_date();
			?>by <?php the_author(); ?>
			<?php the_content(); ?>
		</article><?php
	endwhile; ?>
</div><!-- #page-content --><?php
get_sidebar();
get_footer();?>