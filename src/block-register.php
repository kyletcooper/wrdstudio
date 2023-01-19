<?php
/**
 * Includes and registers all blocks.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

namespace wrd;

/**
 * Includes the blocks ACF file (if it exists) and registers it using ACF.
 *
 * @since 1.0.0
 */
function register_theme_block( string $name ) {

}

function register_all_theme_blocks() {

}
add_action( 'init', __NAMESPACE__ . '\\register_all_theme_blocks' );
