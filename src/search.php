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
	if ( is_search() && ! empty( $_GET['s'] ) ) { // phpcs:ignore -- No nonce required to search.
		wp_safe_redirect( home_url( '/search/' ) . rawurlencode( get_query_var( 's' ) ) );
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
 * Returns the search and default content template parts for use as a REST API field.
 *
 * @since 1.0.0
 */
function rest_api_search_field() {
	$parts = array(
		'default' => '',
		'search'  => 'search',
		'small'   => 'small',
	);

	$ret = array();

	foreach ( $parts as $part_name => $part_slug ) {
		ob_start();
		get_template_part( '/template-parts/content', $part_slug );
		$ret[ $part_name ] = ob_get_clean();
	}

	return $ret;
}

/**
 * Registers REST API endpoints.
 *
 * @since 1.0.0
 */
function register_rest_html_fields() {
	register_rest_field(
		array( 'post', '/search/(?P<search>[a-zA-Z0-9\s]+)' ),
		'preview',
		array(
			'get_callback' => __NAMESPACE__ . '\\rest_api_search_field',
		)
	);
}
add_action( 'rest_api_init', __NAMESPACE__ . '\\register_rest_html_fields' );

/**
 * A custom search endpoint that includes multiple post types.
 *
 * @param \WP_REST_Request $request The request options.
 *
 * @return array The array of results.
 *
 * @since 1.0.0
 */
function rest_search_endpoint( \WP_REST_Request $request ) {
	$posts = get_posts(
		array(
			'post_type'   => array( 'post', 'page' ),
			'numberposts' => get_option( 'posts_per_page' ), // phpcs:ignore -- Pagination is set by admin.
			's'           => $request['search'],
		)
	);

	$data             = array();
	$posts_controller = new \WP_REST_Posts_Controller( 'post' );

	foreach ( $posts as $post ) {
		$itemdata = $posts_controller->prepare_item_for_response( $post, $request );
		$data[]   = $posts_controller->prepare_response_for_collection( $itemdata );
	}

	return new \WP_REST_Response( $data, 200 );
}

/**
 * Registers the search endpoint.
 *
 * @since 1.0.0
 */
function register_rest_search_endpoint() {
	register_rest_route(
		'wrd/v1',
		'/search',
		array(
			'methods'  => 'GET',
			'callback' => __NAMESPACE__ . '\\rest_search_endpoint',
			'args'     => array(
				'search' => array(
					'required' => true,
					'type'     => 'string',
				),
			),
		)
	);
}
add_action( 'rest_api_init', __NAMESPACE__ . '\\register_rest_search_endpoint' );
