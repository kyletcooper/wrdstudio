<?php
/**
 * Renders the cards block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">

			<?php foreach ( get_field( 'cards' ) as $card ) : ?>

				<div>
					<?php echo wp_get_attachment_image( $card['image'], 'medium', false, array( 'class' => 'w-full h-48 bg-gray-50 dark:bg-gray-800 object-cover object-center' ) ); ?>

					<h2 class="text-xl font-semibold my-4">
						<?php echo esc_html( $card['title'] ); ?>
					</h2>
					
					<div class="prose">
						<?php echo wp_kses( $card['body'], 'post' ); ?>
					</div>

					<?php echo isset( $card['CTA'] ) ? create_link( $card['CTA'], 'mt-8' ) : null; ?>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</section>
