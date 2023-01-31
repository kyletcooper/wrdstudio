<?php
/**
 * Manages custom login page.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

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
