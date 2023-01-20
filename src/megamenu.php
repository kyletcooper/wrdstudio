<?php
/**
 * Registers all the hooks for classes for the mega menu.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

use stdClass;
use WP_Post;

/**
 * Filters the li classes for a mega menu.
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu item's <li> element.
 *
 * @param WP_Post  $menu_item The current menu item object.
 *
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @param int      $depth Depth of menu item. Used for padding.
 *
 * @since 1.0.0
 */
function megamenu_li_classes( array $classes, WP_Post $menu_item, stdClass $args, int $depth ) {
	if ( 'megamenu' !== $args->menu_id ) {
		return $classes;
	}

	if ( 0 === $depth ) {
		$classes[] = 'mm__top-level-li';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\megamenu_li_classes', 10, 4 );

/**
 * Filters the link attributes for a mega menu.
 *
 * @param array    $atts The HTML attributes applied to the menu item's <a> element, empty strings are ignored.
 *
 * @param WP_Post  $menu_item The current menu item object.
 *
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @param int      $depth Depth of menu item. Used for padding.
 *
 * @since 1.0.0
 */
function megamenu_link_atts( array $atts, WP_Post $menu_item, stdClass $args, int $depth ) {
	if ( 'megamenu' !== $args->menu_id ) {
		return $atts;
	}

	if ( ! isset( $atts['class'] ) ) {
		$atts['class'] = '';
	}

	if ( 0 === $depth ) {
		$atts['class'] .= 'mm__top-level-link';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\\megamenu_link_atts', 10, 4 );
