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
