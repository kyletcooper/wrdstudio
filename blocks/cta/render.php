<?php
/**
 * Renders the cta block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">

		<div class="bg-cover bg-center" style="background-image: url('<?php echo esc_url( wp_get_attachment_image_url( get_field( 'background' ), 'xlarge' ) ); ?>')">

			<div class="grid gap-6 xl:grid-cols-5 place-items-end p-12 bg-gray-900/70 text-white">
				<h2 class="xl:col-span-2 text-3xl md:text-5xl font-semibold">
					<?php the_field( 'title' ); ?>
				</h2>

				<div class="flex flex-col justify-end xl:col-span-3">
					<?php if ( get_field( 'body' ) ) : ?>
					<div class="prose prose-invert max-w-none mb-10">
						<?php the_field( 'body' ); ?>
					</div>
					<?php endif; ?>

					<?php echo create_link_button( 'cta', true ); ?>
				</div>
			</div>
		</div>

	</div>
</section>
