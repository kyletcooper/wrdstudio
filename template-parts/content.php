<?php
/**
 * The partial for a preview of a post/page. No context (search vs archive) is provided.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>


<article <?php post_class(); ?> >
	<a href="<?php the_permalink(); ?>" class="group grid grid-cols-12 gap-6 md:gap-8">
		<div class="col-span-12 md:col-span-6 lg:col-span-4 min-h-[15rem] bg-gray-100 dark:bg-gray-800 bg-cover overflow-clip relative">
			<?php the_post_thumbnail( 'medium', array( 'class' => 'absolute min-w-full min-h-full transition-transform group-hover:scale-105' ) ); ?>
		</div>

		<div class="col-span-12 md:col-span-6 lg:col-span-8 flex items-center md:py-8">
			<div>
				<h2 class="text-3xl font-semibold">
					<?php the_title(); ?>
				</h2>

				<?php if ( get_the_excerpt() ) : ?>
					<div class="pt-4">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>

				<span class="flex items-center gap-4 mt-8 text-theme-500 font-medium">
					<?php esc_html_e( 'Read more', 'wrd' ); ?>

					<svg class="transition-transform group-hover:translate-x-3" xmlns="http://www.w3.org/2000/svg" width="33.85" height="15.252" viewBox="0 0 33.85 15.252">
						<g id="Group_3283" data-name="Group 3283" transform="translate(-399 -646.086)">
							<line id="Line_156" data-name="Line 156" x2="31.436" transform="translate(400 653.712)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
							<line id="Line_157" data-name="Line 157" x2="6.212" y2="6.212" transform="translate(425.224 647.5)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
							<line id="Line_158" data-name="Line 158" y1="6.212" x2="6.212" transform="translate(425.224 653.712)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"/>
						</g>
					</svg>
				</span>
			</div>
		</div>
	</a>
</article>
