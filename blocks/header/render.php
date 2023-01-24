<?php
/**
 * Renders the header block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<header <?php block_atts( $block ); ?> >
	<div class="container">
		<h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold mb-6">
			<?php the_field( 'title' ); ?>
		</h1>

		<div class="prose max-w-3xl mb-10">
			<?php the_field( 'body' ); ?>
		</div>

		<?php echo create_link_button( 'cta' ); ?>
	</div>
</header>
