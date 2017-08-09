<!-- Begin Footer -->
<footer class="footer" role="contentinfo">
	<div class="footer-content">
		<div class="site-title"><?php bloginfo( 'name' ); ?></div>
		<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu( array( 'menu_class' => 'menu-footer', 'theme_location' => 'footer' ) );
			endif;
		?>
		<?php
			$theme_location = 'social';
			if ( isset( $locations[ $theme_location ] ) ) :
				wp_nav_menu( array( 'menu_class' => 'menu-social', 'theme_location' => 'social' ) );
			endif;
		?>
	</div>
</footer>
<!-- End Footer -->
