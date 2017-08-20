<!-- Begin .header -->
<style type="text/css">
	<?php
		$text_color = get_theme_support( 'custom-header', 'default-text-color' );
		if ( $text_color ) :
	?>
		.header,
		.header a {
			color: #<?php echo esc_html( $text_color ); ?>;
		}
	<?php endif; ?>
</style>
<header class="header cf" role="banner">
	<div class="site-branding">
		<?php
			if ( has_custom_logo() ) :
				if ( is_front_page() ) :
					echo '<h1 class="site-title">';
				endif;
				the_custom_logo();
				if ( is_front_page() ) :
					echo '</h1>';
				endif;
			else :
				if ( display_header_text() ) :
		?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					</h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php
				endif;
			endif;
		?>
	</div>
	<a href="#" class="nav-toggle nav-toggle-search icon-search"></a>
	<a href="#" class="nav-toggle nav-toggle-menu icon-menu"></a>
	<div
		id="widget-area"
		class="widget-area"
		role="complementary"
		<?php
			echo 'style="background: url(';
			header_image();
			echo ') center no-repeat; background-size: cover;"';
		?>
	>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .widget-area -->
	<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
</header>
<!-- End .header -->
