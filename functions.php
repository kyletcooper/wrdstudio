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
define( 'WRDSTUDIO_VERSION', '1.0.1' );


/**
 * Includes the source files.
 *
 * @since 1.0.0
 */
function include_src() {
	include get_template_directory() . '/src/template-tags.php';
	include get_template_directory() . '/src/megamenu.php';
	include get_template_directory() . '/src/search.php';
	include get_template_directory() . '/src/register-blocks.php';
	include get_template_directory() . '/src/login.php';
	include get_template_directory() . '/src/print-inline-styles.php';
}
include_src();


/**
 * Enqueues all assets required.
 *
 * @since 1.0.0
 */
function enqueue_assets() {
	wp_enqueue_style( 'wrdstudio', get_template_directory_uri() . '/assets/styles/dist.css', array(), WRDSTUDIO_VERSION );
	wp_enqueue_script( 'wrdstudio', get_template_directory_uri() . '/assets/scripts/dist.js', array(), WRDSTUDIO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );


/**
 * Removes unneccessary script/styles from being loaded.
 *
 * @since 1.0.0
 */
function dequeue_assets() {
	// Block Styles.
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_deregister_style( 'classic-theme-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
	wp_dequeue_style( 'global-styles' );

	// Dummy Content Generator.
	wp_dequeue_script( 'wp_dummy_content_generator' );
	wp_dequeue_style( 'wp_dummy_content_generator' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\dequeue_assets', 11 );

remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' ); // Removes the SVG filters definitions.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // Removes the inline emoji detection script.
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // Removes the inline emoji styles.
remove_action( 'wp_head', 'wp_generator' ); // Removes the generator meta tag.
remove_action( 'wp_head', 'wlwmanifest_link' ); // Removes the Window Live Writer manifest link tag.
remove_action( 'wp_head', 'rsd_link' ); // Removes the Really Simple Discovery endpoint link tag.
remove_action( 'wp_head', 'feed_links', 2 ); // Removes the RSS and other feed links (does not disable them).
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Removes the links to extra feeds such as categories.

/**
 * Removes unneccessary script/style from wpcf7 being loaded on page they're not used on.
 *
 * @see https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/
 *
 * @since 1.0.0
 */
function dequeue_wpcf7_assets() {
	if ( ! is_page() || ! has_block( 'wrd/form' ) ) {
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\\dequeue_wpcf7_assets', 0 );


/**
 * Enqueues all assets required for the block editor.
 *
 * @since 1.0.0
 */
function enqueue_block_editor_assets() {
	wp_enqueue_style( 'wrdstudio-editor', get_template_directory_uri() . '/assets/styles/dist.css', array(), WRDSTUDIO_VERSION );
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_block_editor_assets' );

/**
 * Disables the block editor for posts
 *
 * @param bool    $use_block_editor Whether the post can be edited or not.
 *
 * @param WP_Post $post The post being checked.
 *
 * @since 1.0.0
 */
function filter_block_editor( $use_block_editor, $post ) {
	if ( 'post' === get_post_type( $post ) ) {
		return false;
	}

	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', __NAMESPACE__ . '\\filter_block_editor', 10, 2 );


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

	include get_template_directory() . '/src/acf-options-page.php';
	include get_template_directory() . '/src/acf-blocks-general.php';
	include get_template_directory() . '/src/acf-primary-navigation.php';
	include get_template_directory() . '/src/acf-page-theme.php';
}
include_plugin_dependencies();


/**
 * Filters the fields in the comment form.
 *
 * @param array $fields The array of fields.
 */
function filter_comment_fields( $fields ) {
	unset( $fields['url'] );
	unset( $fields['cookies'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', __NAMESPACE__ . '\\filter_comment_fields' );
