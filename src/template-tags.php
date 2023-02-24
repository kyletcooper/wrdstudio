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
 * @param string $classes Classes to add the to SVG element.
 *
 * @return void
 *
 * @since 1.0.0
 */
function the_icon( string $name, string $classes = '' ) {
	echo get_icon( $name, $classes );
}

/**
 * Returns an icon.
 *
 * @param string $name The name of the icon.
 *
 * @param string $classes Classes to add the to SVG element.
 *
 * @return void
 *
 * @since 1.0.0
 */
function get_icon( string $name, string $classes = '' ) {
	ob_start();

	$name_sanitized = sanitize_title( $name );
	include get_template_directory() . "/assets/icons/$name_sanitized.svg";

	$icon = ob_get_clean();
	$icon = str_replace( '<svg', '<svg class="' . $classes . '"', $icon );

	return $icon;
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

global $wrd_color_theme;

/**
 * Sets the theme in use.
 *
 * @param string $slug The slug of the color theme.
 *
 * @since 1.0.0
 */
function set_theme_slug( $slug ) {
	global $wrd_color_theme;

	$wrd_color_theme = $slug;
}

/**
 * Returns the slug of the theme of the page.
 *
 * @since 1.0.0
 */
function get_theme_slug() {
	global $wrd_color_theme;

	if ( isset( $wrd_color_theme ) ) {
		return $wrd_color_theme;
	}

	if ( get_field( 'page_theme' ) ) {
		return get_field( 'page_theme' );
	}

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
		'red'    => 'logo',
		'orange' => 'logo',
		'green'  => 'logo',
		'blue'   => 'logo',
		'pink'   => 'logo',
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
 * Gets the color theme class of the current page.
 *
 * @return string The color theme class.
 *
 * @since 1.0.0
 */
function get_theme_color() {
	$colors = array(
		'red'    => '#EF3838',
		'orange' => '#F8841E',
		'green'  => '#85A700',
		'blue'   => '#1E92F8',
		'pink'   => '#C60295',
	);

	$key = 'blue';

	if ( array_key_exists( get_theme_slug(), $colors ) ) {
		$key = get_theme_slug();
	}

	return $colors[ $key ];
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
function _the_breadcrumb_link( $url, $title = '', $args = array(), $is_last_item = false ) {
	$max_title_length = 17;
	$title            = trim( wp_strip_all_tags( $title ) );

	if ( ! $is_last_item && strlen( $title ) > $max_title_length ) {
		$title = substr( $title, 0, $max_title_length ) . '...';
	}

	if ( $args['use_links'] ) : ?>
	
		<a href="<?php echo esc_url( $url ); ?>">
			<?php echo wp_strip_all_tags( $title ); //phpcs:ignore -- esc_html messes with ampersands ?>
		</a>

	<?php else : ?>

		<span>
			<?php echo wp_strip_all_tags( $title ); //phpcs:ignore -- esc_html messes with ampersands ?>
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

		_the_breadcrumb_link( $link['url'], $link['title'], $args, count( $links ) === $i + 1 );
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
	the_field( 'contact_email_address', 'option' );
}

/**
 * Prints the contact phone number.
 *
 * @since 1.0.0
 */
function the_contact_phone() {
	the_field( 'contact_telephone_number', 'option' );
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

/**
 * Returns the array of tailwind classes for a button.
 *
 * @param boolean $filled If true returns a filled button rather than an outlined button.
 *
 * @since 1.0.0
 */
function get_button_classes( $filled = false ) {
	if ( $filled ) {
		return 'block w-fit py-3 px-12 border-2 border-theme-500 bg-theme-500 font-medium text-white transition-all cursor-pointer hover:bg-transparent hover:text-theme-500 focus:bg-transparent focus:text-theme-500';
	}

	return 'block w-fit py-3 px-12 border-2 border-theme-500 bg-transparent font-medium text-theme-500 transition-all cursor-pointer hover:bg-theme-500 hover:text-white focus:bg-theme-500 focus:text-white';
}

/**
 * Creates a link tag from a ACF link array.
 *
 * @param string|array $link The ACF link array or the key for the field.
 *
 * @param string       $classes Classes to add.
 *
 * @return string The link markup.
 *
 * @since 1.0.0
 */
function create_link( $link, $classes = '' ) {
	if ( ! is_array( $link ) ) {
		$link = get_field( $link );
	}

	if ( $link ) :
		// Add rel noopener to external links.
		$attr  = '';
		$parse = wp_parse_url( $link['url'] );

		if ( array_key_exists( 'host', $parse ) && $parse['host'] !== $_SERVER['HTTP_HOST'] ) {
			$attr .= " rel='noopener' ";
		}

		$link_url    = $link['url'];
		$link_title  = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';

		$html = '<a href="' . esc_url( $link_url ) . '"
                    target="' . esc_attr( $link_target ) . '"
                    class="' . $classes . '"
                    ' . $attr . '>
                    ' . esc_html( $link_title ) . '
                </a>';

		return $html;

	else :

		return '';

	endif;
}

/**
 * Creates a link tag with the button classes from a ACF link array.
 *
 * @param string|array $link The ACF link array or the key for the field.
 *
 * @param boolean      $filled If true, the button will be filled. False for outlined button.
 *
 * @param string       $classes Classes to add.
 *
 * @return string The link markup.
 *
 * @since 1.0.0
 */
function create_link_button( $link, $filled = false, $classes = '' ) {
	return create_link( $link, get_button_classes( $filled ) . ' ' . $classes );
}

/**
 * Displays the block's attributes.
 *
 * @param array $block The block to show attributes for.
 *
 * @param array $atts Additional attributes to add.
 *
 * @return void
 *
 * @since 1.0.0
 */
function block_atts( $block, $atts = array() ) {
	// ID.
	if ( ! empty( $block['anchor'] ) ) {
		$atts['id'] = $block['anchor'];
	}

	// Classes.
	if ( ! isset( $atts['class'] ) ) {
		$atts['class'] = '';
	}
	$atts['class'] .= ' wp-block-' . sanitize_title( $block['name'] );
	if ( ! empty( $block['className'] ) ) {
		$atts['class'] .= ' ' . $block['className'];
	}

	// Spacing.
	$atts['class'] .= ' spacing-top-' . get_field( 'spacing_top' );
	$atts['class'] .= ' spacing-bottom-' . get_field( 'spacing_bottom' );

	// Print attributes.
	foreach ( $atts as $attr => $value ) {
		echo esc_attr( $attr ) . '="' . esc_attr( $value ) . '" ';
	}
}

/**
 * Checks if the current block render has a specific style.
 *
 * @param array  $block The block to show attributes for.
 *
 * @param string $style The name of the style to look for.
 *
 * @return bool If the style is on this block.
 *
 * @since 1.0.0
 */
function block_has_style( $block, $style ) {
	if ( ! isset( $block['className'] ) ) {
		return false;
	}

	return str_contains( $block['className'], "is-style-$style" );
}

function get_menu_items_by_location( $location, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'has_description' => -1,
			'parent_item'     => -1,
		)
	);

	$locations           = get_nav_menu_locations();
	$menu                = wp_get_nav_menu_object( $locations[ $location ] );
	$menu_items          = wp_get_nav_menu_items( $menu );
	$filtered_menu_items = array();

	foreach ( $menu_items as $menu_item ) {
		$passes_filters = true;

		$parent_id = (int) $menu_item->menu_item_parent;
		if ( -1 !== $args['parent_item'] && $parent_id !== $args['parent_item'] ) {
			$passes_filters = false;
		}

		$has_description = strlen( trim( $menu_item->description ) ) > 0;
		if ( -1 !== $args['has_description'] && $args['has_description'] !== $has_description ) {
			$passes_filters = false;
		}

		if ( $passes_filters ) {
			$filtered_menu_items[] = $menu_item;
		}
	}

	return $filtered_menu_items;
}

/**
 * Outputs the link for a menu item.
 *
 * Based on Walker_Nav_Menu::start_el()
 *
 * @param WP_Post $menu_item The menu item to create the link for.
 *
 * @param array   $atts Additional attributes to add to the link.
 *
 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/start_el/
 *
 * @since 1.0.0
 */
function the_menu_item( $menu_item, $atts = array() ) {
	$title = $menu_item->title;

	?>

	<a <?php the_menu_item_attrs( $menu_item, $atts ); ?> >
		<?php echo esc_html( $title ); ?>
	</a>

	<?php
}

/**
 * Outputs the link attributes for a menu item.
 *
 * Based on Walker_Nav_Menu::start_el()
 *
 * @param WP_Post $menu_item The menu item to create the link for.
 *
 * @param array   $atts Additional attributes to add to the link.
 *
 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/start_el/
 *
 * @since 1.0.0
 */
function the_menu_item_attrs( $menu_item, $atts = array() ) {
	$atts['title']  = ! empty( $menu_item->attr_title ) ? $menu_item->attr_title : '';
	$atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
	if ( '_blank' === $menu_item->target && empty( $menu_item->xfn ) ) {
		$atts['rel'] = 'noopener';
	} else {
		$atts['rel'] = $menu_item->xfn;
	}
	$atts['href']         = ! empty( $menu_item->url ) ? $menu_item->url : '';
	$atts['aria-current'] = $menu_item->current ? 'page' : '';

	$attributes = '';
	foreach ( $atts as $attr => $value ) {
		if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
			$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';
		}
	}

	echo $attributes;
}

/**
 * Displays the none prominent (has no description) menu items.
 *
 * @param string   $menu_location The theme location for the menu.
 *
 * @param int      $parent_item The ID of the parent to filter menu items by. Defaults to -1 (do not filter).
 *
 * @param callable $link_callback A function to decide what classes to add to a link. Passed $is_subtle and $is_first_subtle.
 *
 * @param callable $li_callback A function to decide what classes to add to a link. Passed $is_subtle and $is_first_subtle.
 */
function the_nav_menu_items_nonprominent( $menu_location, $parent_item = -1, $link_callback = null, $li_callback = null ) {
	$undescripted_children_menu_items = get_menu_items_by_location(
		$menu_location,
		array(
			'has_description' => false,
			'parent_item'     => $parent_item,
		)
	);

	$is_first_subtle = true;

	foreach ( $undescripted_children_menu_items as $menu_item ) {
		$is_subtle    = get_field( 'is_subtle', $menu_item );
		$link_classes = $link_callback ? call_user_func( $link_callback, $is_subtle, $is_subtle && $is_first_subtle ) : '';
		$li_classes   = $li_callback ? call_user_func( $li_callback, $is_subtle, $is_subtle && $is_first_subtle ) : '';

		echo '<li class="' . esc_attr( $li_classes ) . '">';
		the_menu_item( $menu_item, array( 'class' => $link_classes ) );
		echo '</li>';

		if ( $is_first_subtle && $is_subtle ) {
			$is_first_subtle = false;
		}
	}
}

/**
 * Displays the prominent (has a description) menu items.
 *
 * @param string $menu_location The theme location for the menu.
 *
 * @param int    $parent_item The ID of the parent to filter menu items by. Defaults to -1 (do not filter).
 */
function the_nav_menu_items_prominent( $menu_location, $parent_item = -1 ) {
	$descripted_children_menu_items = get_menu_items_by_location(
		$menu_location,
		array(
			'has_description' => true,
			'parent_item'     => $parent_item,
		)
	);

	foreach ( $descripted_children_menu_items as $child_menu_item ) :
		$og_theme = get_theme_slug();
		set_theme_slug( get_field( 'theme', $child_menu_item ) );

		?>

		<a <?php the_menu_item_attrs( $child_menu_item, array( 'class' => 'block relative overflow-clip p-6 rounded-md bg-theme-50 dark:bg-theme-900 hover:bg-theme-100 dark:hover:bg-theme-800 transition-colors [&:hover_svg]:text-theme-200 dark:[&:hover_svg]:text-theme-700 ' . get_theme_color_class() ) ); ?>>
			<div class="relative z-10">
				<span class="font-medium text-lg mb-2">
					<?php echo esc_html( $child_menu_item->title ); ?>
				</span>
				<p class="text-sm">
					<?php echo esc_html( $child_menu_item->description ); ?>
				</p>
			</div>

			<div class="absolute -bottom-2 -right-2 w-1/3 aspect-square [&>svg]:w-full [&>svg]:h-full [&>svg]:transition-colors text-theme-100 dark:text-theme-800 opacity-50">
				<?php the_theme_icon(); ?>
			</div>
		</a>

		<?php set_theme_slug( $og_theme ); ?>

		<?php

endforeach;
}

/**
 * Outputs the categories as a string without links.
 *
 * @since 1.0.0
 */
function the_category_labels() {
	echo esc_html( get_category_labels() );
}

/**
 * Returns the categories as a string without links.
 *
 * @since 1.0.0
 */
function get_category_labels() {
	$cats = get_the_category();
	$str  = '';

	foreach ( $cats as $i => $cat ) {
		if ( 0 !== $i ) {
			$str .= esc_html( ', ' );
		}

		$str .= esc_html( $cat->name );
	}

	return $str;
}
