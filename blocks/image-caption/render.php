<?php
/**
 * Renders the image caption block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$image_url = wp_get_attachment_image_url( get_field( 'image' ), 'xlarge' );

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<div class="h-96 bg-cover bg-center bg-gray-50 dark:bg-gray-800 mb-12" style="background-image: url('<?php echo esc_url( $image_url ); ?>')">
		</div>

		<div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12">

			<div class="lg:col-span-2 <?php echo esc_attr( block_has_style( $block, 'right' ) ? 'md:order-1' : '' ); ?>">
				<h2 class="text-3xl md:text-4xl font-semibold">
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
