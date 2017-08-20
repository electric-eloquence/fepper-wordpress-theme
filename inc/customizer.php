<?php
/**
 * Sets up the WordPress core custom header and custom background features.
 */
function fepper_custom_header_and_background() {
	$color_scheme             = fepper_get_color_scheme();
	$default_background_color = trim( $color_scheme[0], '#' );
	$default_text_color       = trim( $color_scheme[0], '#' );

	/**
	 * Filter the arguments used when adding 'custom-background' support.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'fepper_custom_background_args', array(
		'default-color' => $default_background_color,
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support.
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'fepper_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/_assets/src/landscape-16x9-mountains.jpg',
		'default-text-color'     => $default_text_color,
		'width'                  => 1200,
		'height'                 => 675,
		'flex-height'            => true
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/_assets/src/landscape-16x9-mountains.jpg',
			'thumbnail_url' => '%s/_assets/src/landscape-16x9-mountains.jpg',
			'description'   => __( 'Default Header Image', 'fepper' ),
		),
	) );
}
add_action( 'after_setup_theme', 'fepper_custom_header_and_background' );

/**
 * Registers color schemes.
 *
 * Necessary for header text color and background color customization to work.
 *
 * @return array An associative array of color scheme options.
 */
function fepper_get_color_schemes() {
	/**
	 * Filter the color schemes.
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *     }
	 * }
	 */
	return apply_filters( 'fepper_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'fepper' ),
			'colors' => array(
				'#ffffff',
			),
		),
	) );
}

if ( ! function_exists( 'fepper_get_color_scheme' ) ) :
/**
 * Retrieves the current color scheme.
 *
 * Create your own fepper_get_color_scheme() function to override in a child theme.
 *
 * @return array An associative array of either the current or default color scheme HEX values.
 */
function fepper_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       = fepper_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // fepper_get_color_scheme
