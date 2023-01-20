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
 * Returns the list of allowed themes with the array keys being the slugs and the values being the labels.
 *
 * @return array The array of themes.
 *
 * @since 1.0.0
 */
function get_theme_slugs() {
	return array(
		'red'    => __( 'Red', 'wrd' ),
		'orange' => __( 'Orange', 'wrd' ),
		'green'  => __( 'Green', 'wrd' ),
		'blue'   => __( 'Blue', 'wrd' ),
		'pink'   => __( 'Pink', 'wrd' ),
	);
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
 * Private: Creates an anchor tag for a breadcrumb item.
 *
 * @param string|WP_Post $post_or_url The URL or the post to get the URL for.
 *
 * @param string         $title Optional. The title for the link. Defaults to post title or empty string.
 *
 * @return void
 *
 * @since 1.0.0
 */
function _the_breadcrumb_link( $post_or_url, $title = '' ) {
	$max_title_length = 15;

	if ( $post_or_url instanceof \WP_Post ) {
		$title       = get_the_title( $post_or_url );
		$post_or_url = get_the_permalink( $post_or_url );
	}

	if ( strlen( $title ) > $max_title_length ) {
		$title = substr( $title, 0, $max_title_length ) . '...';
	}

	?>
	
	<a href="<?php echo esc_url( $post_or_url ); ?>">
		<?php echo esc_html( $title ); ?>
	</a>

	<?php
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
	$post      = get_post( $post );
	$post_type = get_post_type( $post );

	_the_breadcrumb_link( get_home_url(), get_bloginfo( 'name' ) );

	if ( 'page' === $post_type ) {
		if ( is_front_page( $post ) ) {
			return;
		}

		$ancestors        = array( $post );
		$current_ancestor = get_post_parent( $post );

		while ( $current_ancestor ) {
			$ancestors[]      = $current_ancestor;
			$current_ancestor = get_post_parent( $current_ancestor );
		}

		foreach ( array_reverse( $ancestors ) as $ancestor ) {
			the_icon( 'chevron_right' );
			_the_breadcrumb_link( $ancestor );
		}
	} else {
		$post_type_object      = get_post_type_object( $post_type );
		$post_type_archive_url = get_post_type_archive_link( $post_type );
		$post_type_label       = $post_type_object->labels->name;

		if ( 'post' === $post_type && get_option( 'page_for_posts' ) ) {
			// If the posts archive is using a static page, get that page title rather than the post type label.
			$posts_static_page = get_post( get_option( 'page_for_posts' ) );
			$post_type_label   = get_the_title( $posts_static_page );
		}

		the_icon( 'chevron_right' );
		_the_breadcrumb_link( $post_type_archive_url, $post_type_label );

		if ( ! is_archive() && ! is_home() ) {
			the_icon( 'chevron_right' );
			_the_breadcrumb_link( $post );
		}
	}
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
