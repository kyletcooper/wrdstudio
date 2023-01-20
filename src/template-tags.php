<?php
/**
 * Contains helper functions for creating templates.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

/**
 * Renders an icon.
 *
 * @param string $name The name of the icon.
 *
 * @return void
 *
 * @since 1.0.0
 */
function the_icon( string $name ) {
	$name_sanitized = sanitize_title( $name );
	include get_template_directory() . "/assets/icons/$name_sanitized.svg";
}

/**
 * Returns the slug of the theme of the page.
 */
function get_theme_slug() {
	return 'pink';
}

/**
 * Renders the logo icon.
 *
 * Depends upon the theme of the page.
 *
 * @return void
 *
 * @since 1.0.0
 */
function the_theme_icon() {
	$icons = array(
		'blue' => 'logo',
		'pink' => 'logo',
	);

	$key = 'blue';

	if ( array_key_exists( get_theme_slug(), $icons ) ) {
		$key = get_theme_slug();
	}

	the_icon( $icons[ $key ] );
}

/**
 * Gets the color theme class of the current page.
 *
 * @return string The color theme class.
 *
 * @since 1.0.0
 */
function get_theme_color_class() {
	return 'theme-' . get_theme_slug();
}

/**
 * Renders breadcrumbs for a post.
 *
 * @param int|WP_Post|null $post The post to get breadcrumbs for. Accepts post ID, WP_Post. Defaults to global post.
 *
 * @return void
 *
 * @since 1.0.0
 */
function the_breadcrumbs( $post = null ) {
	?>

	Breadcrumbs > to > post

	<?php
}

/**
 * Returns either the link to the user's profile or the log-in page if not logged in.
 *
 * @return string The URL of the profile/log-in page.
 *
 * @since 1.0.0
 */
function get_account_link() {
	if ( is_user_logged_in() ) {
		return get_edit_profile_url();
	} else {
		return wp_login_url();
	}
}
