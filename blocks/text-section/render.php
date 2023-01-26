<?php
/**
 * Renders the text section block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12 pt-12 border-t-4 border-theme-500 ">

			<div class="lg:col-span-2 <?php echo esc_attr( block_has_style( $block, 'right' ) ? 'md:order-1' : '' ); ?>">
				<h2 class="text-3xl md:text-5xl font-semibold">
					<?php the_field( 'title' ); ?>
				</h2>
			</div>

			<div class="lg:col-span-3">
				<div class="prose max-w-none mb-10">
					<?php the_field( 'body' ); ?>
				</div>

				<?php echo create_link_button( 'cta' ); ?>
			</div>

		</div>
	</div>
</section>
