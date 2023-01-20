<?php
/**
 * Manages search relation functionality.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

/**
 * Changes the search URL to the pretty URL.
 *
 * @since 1.0.0
 */
function redirect_pretty_search_url() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( '/search/' ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}
}
add_action( 'template_redirect', __NAMESPACE__ . '\\redirect_pretty_search_url' );
