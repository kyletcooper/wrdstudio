<?php
/**
 * The partial for a when no posts are available.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<div class="text-center">
	<h2 class="text-xl font-semibold mb-3">
		<?php esc_html_e( "There's nothing here!", 'wrd' ); ?>
	</h2>

	<p class="max-w-lg mx-auto">
		<?php esc_html_e( "We couldn't find any posts that matched your search. Try searching for something shorter or with less filters applied.", 'wrd' ); ?>
	</p>
</div>
