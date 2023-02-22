<?php
/**
 * Renders the form block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

print_inline_style( 'wrd-wpcf7', get_template_directory_uri() . '/assets/styles/wpcf7.css' );

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<div class="grid lg:grid-cols-2 gap-12 pt-12 border-t-4 border-theme-500">

			<div>
				<h2 class="text-3xl lg:text-4xl font-semibold mb-6">
					<?php the_field( 'title' ); ?>
				</h2>

				<div class="prose max-w-none">
					<?php the_field( 'body' ); ?>
				</div>
			</div>

			<div>
				<?php echo do_shortcode( '[contact-form-7 id="' . get_field( 'form' ) . '"]' ); ?>
			</div>

		</div>
	</div>
</section>
