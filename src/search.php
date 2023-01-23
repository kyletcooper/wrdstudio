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

/**
 * Changes the excerpt teaser from [...] to ...
 *
 * @since 1.0.0
 */
function excerpt_teaser() {
	return '...';
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_teaser' );

/**
 * Sets the length of excerpts to 20 characters.
 *
 * @since 1.0.0
 */
function excerpt_length() {
	return 35;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\excerpt_length' );

/**
 * Registers REST API endpoints.
 */
function register_rest_html_fields() {
	register_rest_field(
		'post',
		'preview',
		array(
			'get_callback' => function( $post_arr ) {
				ob_start();
				get_template_part( '/template-parts/content' );
				$default = ob_get_clean();

				ob_start();
				get_template_part( '/template-parts/content', 'search' );
				$search = ob_get_clean();

				return array(
					'default' => $default,
					'search'  => $search,
				);
			},
		)
	);
}
add_action( 'rest_api_init', __NAMESPACE__ . '\\register_rest_html_fields' );
