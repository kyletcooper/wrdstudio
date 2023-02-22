<?php
/**
 * Handles functions for adding minified inline styles.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

namespace wrd;

/**
 * Minifies CSS string.
 *
 * Removes whitespace but does not remove comments, shorten values etc.
 *
 * @param string $css The CSS to minify.
 *
 * @since 1.0.0
 */
function minify_css( string $css ) {
	$minified = $css;
	$minified = preg_replace( '/\s+/', ' ', $minified ); // Remove duplicate whitespace.
	$minified = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minified ); // Remove CSS comments.
	$minified = str_replace( "\n", '', $minified );
	$minified = str_replace( ' {', '{', $minified );
	$minified = str_replace( '{ ', '{', $minified );
	$minified = str_replace( ' }', '}', $minified );
	$minified = str_replace( '} ', '}', $minified );
	$minified = str_replace( ', ', ',', $minified );
	$minified = str_replace( '; ', ';', $minified );
	$minified = str_replace( ': ', ':', $minified );

	return $minified;
}

/**
 * Returns the array of printed styles.
 *
 * @return array $wrd_printed_inline_styles The list of already printed styles.
 *
 * @since 1.0.0
 */
function &printed_inline_styles() {
	global $wrd_printed_inline_styles;

	if ( ! is_array( $wrd_printed_inline_styles ) ) {
		$wrd_printed_inline_styles = array();
	}

	return $wrd_printed_inline_styles;
}

/**
 * Prints a CSS file as inline styles if not already included in the page.
 *
 * @param string $handle The handle of the file.
 *
 * @param string $src The location of the CSS file.
 *
 * @return boolean True if the styles were printed, false if not.
 */
function print_inline_style( string $handle, string $src ) {
	$printed_styles = &printed_inline_styles();

	if ( in_array( $src, $printed_styles, true ) ) {
		return false;
	}

	$css          = file_get_contents( $src ); // phpcs:ignore -- This is a local file.
	$minified_css = minify_css( $css );
	$handle       = esc_attr( $handle );

	echo "<style id='$handle-css'>$minified_css</style>"; // phpcs:ignore -- This is trusted.

	$printed_styles[] = $src;

	return true;
}
