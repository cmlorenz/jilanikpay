<?php
/**
 * Footer Template
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Twenty_Fourteen
 * @subpackage Jila Nikpay
 */
$footer = get_option('jilanikpay_footer');
?>
			</section><!-- #main -->
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<p><?php echo esc_attr( stripcslashes($footer['copyright']) ); ?></p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>