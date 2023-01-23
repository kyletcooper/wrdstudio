<?php
/**
 * The main theme file which tells WordPress how the theme works and adds the typical theme hooks.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

/**
 * The version of the theme.
 *
 * @since 1.0.0
 */
define( 'WRDSTUDIO_VERSION', '1.0.0' );

/**
 * Includes the source files.
 *
 * @since 1.0.0
 */
function include_src() {
	include get_template_directory() . '/src/template-tags.php';
	include get_template_directory() . '/src/megamenu.php';
	include get_template_directory() . '/src/search.php';
}
include_src();

/**
 * Enqueues all assets required.
 *
 * @since 1.0.0
 */
function enqueue_assets() {
	wp_enqueue_style( 'wrdstudio-css', get_template_directory_uri() . '/assets/styles/dist.css', array(), WRDSTUDIO_VERSION );
	wp_enqueue_script( 'wrdstudio-js', get_template_directory_uri() . '/assets/scripts/dist.js', array( 'wp-api' ), WRDSTUDIO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );

/**
 * Registers the theme's support level for WordPress features.
 *
 * @since 1.0.0
 */
function add_theme_supports() {
	load_theme_textdomain( 'wrd', get_template_directory() . '/languages' );

	add_image_size( 'xlarge', 1200 );
	add_image_size( 'fullscreen', 2000 );

	register_nav_menus(
		array(
			'navigation' => esc_html__( 'Primary Navigation', 'wrd' ),
			'footer'     => esc_html__( 'Footer Navigation', 'wrd' ),
			'socials'    => esc_html__( 'Social Media Accounts', 'wrd' ),
		)
	);

	add_theme_support( 'menus' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\add_theme_supports' );

/**
 * Includes any plugin files required to work.
 *
 * @see https://www.advancedcustomfields.com/resources/including-acf-within-a-plugin-or-theme/
 *
 * @since 1.0.0
 */
function include_plugin_dependencies() {
	define( 'MY_ACF_PATH', get_template_directory() . '/plugins/advanced-custom-fields-pro/' );
	define( 'MY_ACF_URL', get_template_directory_uri() . '/plugins/advanced-custom-fields-pro/' );

	include_once MY_ACF_PATH . 'acf.php';

	add_filter(
		'acf/settings/url',
		function ( $url ) {
			return MY_ACF_URL;
		}
	);
}
include_plugin_dependencies();
