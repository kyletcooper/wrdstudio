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
	include get_template_directory() . '/src/register-blocks.php';
}
include_src();

/**
 * Enqueues all assets required.
 *
 * @since 1.0.0
 */
function enqueue_assets() {
	wp_enqueue_style( 'wrdstudio', get_template_directory_uri() . '/assets/styles/dist.css', array(), WRDSTUDIO_VERSION );
	wp_enqueue_script( 'wrdstudio', get_template_directory_uri() . '/assets/scripts/dist.js', array( 'wp-api' ), WRDSTUDIO_VERSION, true );

	wp_localize_script(
		'wrdstudio',
		'wrd_consts',
		array(
			'rest_url' => get_rest_url(),
		)
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );

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
 * Enqueues all assets required for the login page.
 *
 * @since 1.0.0
 */
function enqueue_login_assets() {
	wp_enqueue_style( 'wrdstudio-login', get_template_directory_uri() . '/assets/styles/login.css', array(), WRDSTUDIO_VERSION );

	?>

	<style type="text/css">
		:root{
			--logo-url: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/icons/logo.svg');
			--grid-url: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/bg-grid.svg');
		}
	</style>

	<?php
}
add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\enqueue_login_assets' );

/**
 * Filters the login logo link URL.
 *
 * @since 1.0.0
 */
function login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', __NAMESPACE__ . '\\login_logo_url' );

/**
 * Filters the login link separator.
 *
 * @since 1.0.0
 */
function login_link_separator() {
	return '';
}
add_filter( 'login_link_separator', __NAMESPACE__ . '\\login_link_separator' );

/**
 * Filters the login logo title.
 *
 * @since 1.0.0
 */
function login_logo_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', __NAMESPACE__ . '\\login_logo_title' );

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
