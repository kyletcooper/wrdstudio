<?php
/**
 * Renders the tool embed block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

wp_enqueue_script( 'tools', get_template_directory_uri() . '/tools/' . get_field( 'tool_slug' ) . '/dist/dist.js', array(), '1.0.1', true );

?>

<section <?php block_atts( $block ); ?> >
	<div class="container py-24 border-t-4 border-theme-500 rounded-t -translate-y-1">
		<div id="app"></div>

		<?php if ( $is_preview ) : ?>
			<div class="h-64 bg-gray-50 flex items-center justify-center rounded-lg font-semibold text-lg">
				Tool Embed
			</div>
		<?php endif; ?>
	</div>
</section>
