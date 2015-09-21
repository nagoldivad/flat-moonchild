<?php
/**
 * The template for displaying the footer
 */
?>
			<?php if ( apply_filters( 'show_flat_credits', true ) ) : ?>
				<?php flat_hook_footer_before(); ?>
				
				<footer class="site-info" itemscope itemtype="http://schema.org/WPFooter">
					<?php flat_hook_footer_top(); ?>
					<p>All contents Copyright &copy; 2008-2015 Moonhowlings</p>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'flat' ) ); ?>" title="<?php esc_attr_e( 'WordPress.org', 'flat' ); ?>"><?php printf( __( 'Proudly powered by %s', 'flat' ), 'WordPress' ); ?></a>.
					<br>
					<?php printf( __( 'Moonhowlings uses a custom child theme of %1$s %2$s by %3$s.', 'flat' ), 'Flat', wp_get_theme()->get( 'Version' ), '<a rel="nofollow" href="'.esc_url( 'https://themeisle.com/themes/flat/' ).'" title="'.esc_attr( 'Flat WordPress Theme' ).'">Themeisle</a>' ); ?>
				</footer>
				
				<?php flat_hook_footer_after(); ?>
			<?php endif; ?>
				<?php flat_hook_content_bottom(); ?>
			</div>
			<?php flat_hook_content_after(); ?>
		</div>
	</div>
</div>
<?php flat_hook_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
