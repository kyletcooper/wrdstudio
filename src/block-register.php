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
 * @param string $name The slug of the block.
 *
 * @since 1.0.0
 */
function register_theme_block( string $name ) {

}

/**
 * Scans the themes block directory to find blocks to register.
 *
 * @since 1.0.0
 */
function register_all_theme_blocks() {

}
add_action( 'init', __NAMESPACE__ . '\\register_all_theme_blocks' );
