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
 * Filters the arguments used to display a navigation menu.
 *
 * @param array $args Args for the menu.
 *
 * @since 1.0.0
 */
function megamenu_menu_args( array $args ) {
	$prefix = $args['menu_id'];

	$args['menu_class'] .= ' ' . $prefix;

	return $args;
}
add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\\megamenu_menu_args', 10, 4 );

/**
 * Filters the ul classes for a mega menu.
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu item's <li> element.
 *
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @param int      $depth Depth of menu item. Used for padding.
 *
 * @since 1.0.0
 */
function megamenu_submenu_classes( array $classes, stdClass $args, int $depth ) {
	$prefix = $args->menu_id;

	$classes[] = $prefix . '__ul';
	$classes[] = $prefix . '__ul--depth-' . $depth;

	if ( 0 === $depth ) {
		$classes[] = $prefix . '__ul--top-level';
	}

	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', __NAMESPACE__ . '\\megamenu_submenu_classes', 10, 4 );

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
	$prefix = $args->menu_id;

	$classes[] = $prefix . '__li';
	$classes[] = $prefix . '__li--depth-' . $depth;

	if ( 0 === $depth ) {
		$classes[] = $prefix . '__li--top-level';
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
	$prefix = $args->menu_id;

	if ( ! isset( $atts['class'] ) ) {
		$atts['class'] = '';
	}

	$atts['class'] .= ' ' . $prefix . '__a';
	$atts['class'] .= ' ' . $prefix . '__a--depth-' . $depth;

	if ( 0 === $depth ) {
		$atts['class'] .= ' ' . $prefix . '__a--top-level';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\\megamenu_link_atts', 10, 4 );

/**
 * Filters the menu items to update the content.
 *
 * @param array    $sorted_menu_items The menu items, sorted by each menu item's menu order.
 *
 * @param stdClass $args An object containing wp_nav_menu() arguments.
 *
 * @since 1.0.0
 */
function megamenu_link_text( array $sorted_menu_items, stdClass $args ) {
	if ( 'socialicons' !== $args->menu_id ) {
		return $sorted_menu_items;
	}

	foreach ( $sorted_menu_items as $k => $object ) {
		$object->title = get_icon( strtolower( $object->title ) );
	}

	return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', __NAMESPACE__ . '\\megamenu_link_text', 10, 2 );
