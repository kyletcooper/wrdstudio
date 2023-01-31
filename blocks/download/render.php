<?php
/**
 * Renders the download block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<header <?php block_atts( $block ); ?> >
	<div class="container">
		<h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold text-center mb-6">
			<?php the_field( 'title' ); ?>
		</h1>

		<div class="prose max-w-3xl mx-auto mb-10">
			<?php the_field( 'body' ); ?>
		</div>

		<div class="flex gap-6 justify-center">
			<?php echo create_link_button( 'cta_1' ); ?>
			<?php echo create_link_button( 'cta_2', true ); ?>
		</div>
	</div>
</header>
