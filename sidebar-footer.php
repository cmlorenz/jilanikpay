<?php
/**
 * Footer Sidebar Template
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
if ( !is_active_sidebar( 'sidebar-3' ) ) {
	return;
} ?>
<section id="footer-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</section><!-- #footer-sidebar -->