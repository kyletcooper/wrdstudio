<?php

namespace wrd;

/**
 * The version of the theme.
 *
 * @since 1.0.0
 */
define( 'WRDSTUDIO_VERSION', '1.0.0' );

/**
 * Enqueues all assets required.
 */
function enqueue_assets() {
	wp_enqueue_style( 'wrdstudio-css', get_template_directory_uri() . '/assets/styles/dist.css', array(), WRDSTUDIO_VERSION );
	wp_enqueue_script( 'wrdstudio-js', get_template_directory_uri() . '/assets/scripts/dist.css', array(), WRDSTUDIO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );

/**
 * Registers the theme's support level for WordPress features.
 *
 * @since 1.0.0
 */
function add_theme_supports() {
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	add_image_size( 'xlarge', 1200 );
	add_image_size( 'fullscreen', 2000 );

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
add_action( 'after_theme_setup', __NAMESPACE__ . '\\add_theme_supports' );

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
