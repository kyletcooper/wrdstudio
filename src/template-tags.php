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
 * Returns an icon.
 *
 * @param string $name The name of the icon.
 *
 * @return void
 *
 * @since 1.0.0
 */
function get_icon( string $name ) {
	ob_start();
	the_icon( $name );
	return ob_get_clean();
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
	return 'blue';
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
 * @param string|WP_Post $url The URL or the post to get the URL for.
 *
 * @param string         $title Optional. The title for the link. Defaults to post title or empty string.
 *
 * @return void
 *
 * @since 1.0.0
 */
function _the_breadcrumb_link( $url, $title = '', $args ) {
	$max_title_length = 17;

	if ( strlen( $title ) > $max_title_length ) {
		$title = substr( $title, 0, $max_title_length - 1 ) . '...';
	}

	if ( $args['use_links'] ) : ?>
	
		<a href="<?php echo esc_url( $url ); ?>">
			<?php echo esc_html( $title ); ?>
		</a>

	<?php else : ?>

		<span>
			<?php echo esc_html( $title ); ?>
		</span>

		<?php
	endif;
}

/**
 * Renders breadcrumbs for a post.
 *
 * @param int|WP_Post|null $post The post to get breadcrumbs for. Accepts post ID, WP_Post. Defaults to global post.
 *
 * @param array            $args Arguments for the breadcrumbs.
 *
 * @param bool             $include_home Whether to include the home page link at the start. Defaults to true.
 *
 * @param bool             $include_self Whether to include the post being breadcrumbed. Defaults to true.
 *
 * @return void
 *
 * @since 1.0.0
 */
function the_breadcrumbs( $post = null, array $args = array() ) {
	$default_args = array(
		'use_main_query' => true,
		'include_home'   => true,
		'include_self'   => true,
		'use_links'      => true,
	);

	$args = wp_parse_args( $args, $default_args );

	$post             = get_post( $post );
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

	$links = array();

	if ( $args['include_home'] ) {
		$links[] = array(
			'url'   => get_home_url(),
			'title' => get_bloginfo( 'name' ),
		);
	}

	if ( $args['use_main_query'] ) {
		if ( is_404() ) {
			$links[] = array(
				'url'   => '',
				'title' => __( '404 Error', 'wrd' ),
			);
		}

		if ( is_search() ) {
			$links[] = array(
				'url'   => get_search_link( ' ' ),
				'title' => __( 'Search', 'wrd' ),
			);

			$search_query = trim( get_search_query() );

			if ( strlen( $search_query ) > 0 && $args['include_self'] ) {
				$links[] = array(
					'url'   => get_search_link( $search_query ),
					'title' => $search_query,
				);
			}
		}

		if ( is_home() && get_option( 'show_on_front' ) === 'page' ) {
			// If the posts archive is not the front page but a static page.
			$posts_archive_page_id = get_option( 'page_for_posts' );
			$links[]               = array(
				'url'   => get_the_permalink( $posts_archive_page_id ),
				'title' => get_the_title( $posts_archive_page_id ),
			);
		}

		if ( is_post_type_archive() ) {
			// is_post_type_archive will not include the posts home page.
			$links[] = array(
				'url'   => get_post_type_archive_link( $post_type ),
				'title' => $post_type_object->labels->name,
			);
		}
	}

	if ( ( is_singular() && ! is_front_page() ) || ! $args['use_main_query'] ) {
		if ( is_post_type_hierarchical( $post_type ) ) {
			// Navigate through parent pages.

			$ancestors        = array();
			$current_ancestor = get_post_parent( $post );

			while ( $current_ancestor ) {
				$ancestors[]      = $current_ancestor;
				$current_ancestor = get_post_parent( $current_ancestor );
			}

			foreach ( array_reverse( $ancestors ) as $ancestor ) {
				$links[] = array(
					'url'   => get_the_permalink( $ancestor ),
					'title' => get_the_title( $ancestor ),
				);
			}
		} else {
			// Get just the archive (no taxonomies).

			if ( 'post' === $post_type ) {
				// The posts archive might be the home page (don't include again) or a static page.
				if ( get_option( 'show_on_front' ) === 'page' ) {
					$posts_archive_page_id = get_option( 'page_for_posts' );
					$links[]               = array(
						'url'   => get_the_permalink( $posts_archive_page_id ),
						'title' => get_the_title( $posts_archive_page_id ),
					);
				}
			} else {
				$links[] = array(
					'url'   => get_post_type_archive_link( $post_type ),
					'title' => $post_type_object->labels->name,
				);
			}
		}

		if ( $args['include_self'] ) {
			$links[] = array(
				'url'   => get_the_permalink( $post ),
				'title' => get_the_title( $post ),
			);
		}
	}

	foreach ( $links as $i => $link ) {
		if ( 0 !== $i ) {
			the_icon( 'chevron_right' );
		}

		_the_breadcrumb_link( $link['url'], $link['title'], $args );
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

/**
 * Prints the contact email address.
 *
 * @since 1.0.0
 */
function the_contact_email() {
	echo 'sales@wrd.studio';
}

/**
 * Prints the contact phone number.
 *
 * @since 1.0.0
 */
function the_contact_phone() {
	echo '01483 239967';
}

/**
 * Returns the date relative to the current time.
 *
 * @param mixed $date The date to compare to. Optional, defaults to current post date.
 *
 * @since 1.0.0
 */
function get_relative_date( $date = null ) {
	if ( ! $date ) {
		$date = get_the_date();
	}

	if ( ! ctype_digit( $date ) ) {
		$date = strtotime( $date );
	}

	$diff = time() - $date;
	if ( 0 === $diff ) {
		return __( 'Now', 'wrd' );
	}

	$day_diff = floor( $diff / 86400 );

	if ( 0 == $day_diff ) {
		if ( $diff < 60 ) {
			return __( 'Less than a minute ago', 'wrd' );
		}
		if ( $diff < 120 ) {
			return __( '1 minute ago', 'wrd' );
		}
		if ( $diff < 3600 ) {
			return floor( $diff / 60 ) . __( ' minutes ago', 'wrd' );
		}
		if ( $diff < 7200 ) {
			return __( '1 hr ago', 'wrd' );
		}
		if ( $diff < 86400 ) {
			return floor( $diff / 3600 ) . __( ' hrs ago', 'wrd' );
		}
	}
	if ( 1 === $day_diff ) {
		return __( 'Yesterday', 'wrd' );
	}
	if ( $day_diff < 7 ) {
		return $day_diff . __( ' days ago', 'wrd' );
	}
	if ( $day_diff < 31 ) {
		return ceil( $day_diff / 7 ) . __( ' wks ago', 'wrd' );
	}
	if ( $day_diff < 60 ) {
		return __( 'Last month', 'wrd' );
	}

	return gmdate( 'F Y', $date );
}

/**
 * Prints the date relative to the current time.
 *
 * @param mixed $date The date to compare to. Optional, defaults to current post date.
 *
 * @since 1.0.0
 */
function the_relative_date( $date = null ) {
	echo esc_html( get_relative_date( $date ) );
}
