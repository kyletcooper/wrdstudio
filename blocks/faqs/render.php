<?php
/**
 * Renders the FAQs block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<h2 class="text-3xl lg:text-4xl font-semibold mb-12">
			<?php the_field( 'title' ); ?>
		</h2>

		<div class="grid gap-12">
			<?php foreach ( get_field( 'questions' ) as $i => $question ) : ?>
				<details class="group" <?php echo esc_attr( 0 === $i ? 'open' : null ); ?> >
					<summary class="appearance-auto flex items-center gap-6 mb-4 cursor-pointer">
						<div class="text-theme-500 rotate-180 group-open:rotate-0 motion-safe:transition-transform">
							<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="13.631" height="20.051" viewBox="0 0 13.631 20.051">
								<g transform="translate(659.271 -343.28) rotate(90)">
									<line data-name="Line 156" x2="16.43" transform="translate(344.78 652.455)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="3"/>
									<line data-name="Line 157" x2="4.694" y2="4.694" transform="translate(356.516 647.76)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="3"/>
									<line data-name="Line 158" y1="4.694" x2="4.694" transform="translate(356.516 652.455)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="3"/>
								</g>
							</svg>
						</div>

						<h3 class="text-xl lg:text-2xl font-medium">
							<?php echo esc_html( $question['question'] ); ?>
						</h3>
					</summary>

					<div class="prose max-w-4xl">
						<?php echo wp_kses_post( $question['answer'] ); ?>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
