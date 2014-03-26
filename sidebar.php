<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
?>
<div id="secondary"><?php
	if ( has_nav_menu( 'secondary' ) ) : ?>
		<nav role="navigation" class="navigation site-navigation secondary-navigation"><?php
			wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
		</nav><?php
	endif;
	if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<section id="primary-sidebar" role="complementary"><?php
			dynamic_sidebar( 'sidebar-1' ); ?>
		</section><!-- #primary-sidebar --><?php
	endif; ?>
</div><!-- #secondary -->