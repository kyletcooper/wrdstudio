<?php
/**
 * Registers the blocks in the blocks directory.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

/**
 * Returns an array of all the theme's block directories.
 *
 * @return array The block dirs.
 *
 * @since 1.0.0
 */
function get_all_theme_block_dirs() {
	$dir        = get_template_directory() . '/blocks';
	$subdirs    = array_filter( glob( "$dir/*" ), 'is_dir' );
	$block_dirs = array();

	foreach ( $subdirs as $block_dir ) {
		$block_json_file = $block_dir . '/block.json';

		if ( ! file_exists( $block_json_file ) ) {
			continue;
		}

		$block_dirs[] = $block_dir;
	}

	return $block_dirs;
}

/**
 * Registers all the blocks in the /blocks/ directory.
 *
 * @since 1.0.0
 */
function register_theme_blocks() {
	$block_dirs = get_all_theme_block_dirs();

	foreach ( $block_dirs as $block_dir ) {
		$acf_file = $block_dir . '/acf.php';

		if ( file_exists( $acf_file ) ) {
			include $acf_file;
		}

		register_block_type( $block_dir );
	}
}
add_action( 'init', __NAMESPACE__ . '\\register_theme_blocks' );

/**
 * Filters the allowed blocks for the editor.
 *
 * @param bool|array $allowed_blocks The current whitelist.
 *
 * @since 1.0.0
 */
function filter_allowed_blocks( $allowed_blocks ) {
	$allowed_blocks = array();

	foreach ( get_all_theme_block_dirs() as $block_dir ) {
		$block_json_file = file_get_contents( $block_dir . '/block.json' );
		$block_json      = json_decode( $block_json_file );

		if ( $block_json && property_exists( $block_json, 'name' ) ) {
			$allowed_blocks[] = $block_json->name;
		}
	}

	return $allowed_blocks;
}
add_filter( 'allowed_block_types_all', __NAMESPACE__ . '\\filter_allowed_blocks' );
