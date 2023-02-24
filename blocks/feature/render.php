<?php
/**
 * Renders the feature block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container grid place-items-center gap-12 lg:gap-24 lg:grid-cols-2 lg:px-24 xl:px-32">

		<?php echo wp_get_attachment_image( get_field( 'image' ), 'large', false, array( 'class' => 'w-full h-full object-cover object-center ' . ( block_has_style( $block, 'right' ) ? 'lg:order-1' : '' ) ) ); ?>

		<div class="lg:py-24">
			<h2 class="text-3xl lg:text-4xl font-semibold mb-12">
				<?php the_field( 'title' ); ?>
			</h2>

			<?php if ( get_field( 'body' ) ) : ?>
				<div class="prose max-w-none">
					<?php the_field( 'body' ); ?>
				</div>
			<?php endif; ?>

			<?php echo create_link_button( 'cta', true, 'mt-10' ); ?>

		</div>

	</div>
</section>
