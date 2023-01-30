<?php
/**
 * Renders the testimonial block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<?php the_icon( 'arrow_right', 'w-16 h-16 text-theme-500' ); ?>

		<hr class="my-12 border-t-4 border-theme-500" />

		<div class="grid md:grid-cols-[1fr_auto] items-end gap-12">

			<h2 class="text-3xl md:text-5xl font-semibold">
				<?php the_field( 'quote' ); ?>
			</h2>

			<?php echo create_link_button( 'cta' ); ?>

		</div>
	</div>
</section>
