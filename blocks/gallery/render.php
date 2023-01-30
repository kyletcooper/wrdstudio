<?php
/**
 * Renders the gallery block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$all_images = get_field( 'images' );
$img_cols   = array_chunk( $all_images, ceil( count( $all_images ) / 2 ) );

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<div class="grid md:grid-cols-2 items-end gap-x-8 gap-y-4 mb-12">

			<h2 class="text-3xl md:text-5xl font-semibold">
				<?php the_field( 'title' ); ?>
			</h2>

			<div class="prose max-w-none">
				<?php the_field( 'body' ); ?>
			</div>

		</div>

		<div class="grid md:grid-cols-2 gap-8">
			<?php foreach ( $img_cols as $images ) : ?>
				<div class="flex flex-col gap-8">
					<?php

					foreach ( $images as $image ) {
						echo wp_get_attachment_image( $image, 'large', false, array( 'class' => 'w-full h-auto' ) );
					}

					?>

				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
