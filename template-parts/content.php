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
			<?php the_post_thumbnail( 'medium', array( 'class' => 'absolute min-w-full min-h-full transition-transform group-hover:scale-105 motion-reduce:group-hover:transform-none' ) ); ?>
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

					<div class="transition-transform group-hover:translate-x-3 motion-reduce:group-hover:transform-none">
						<?php the_icon( 'arrow_right' ); ?>
					</div>
				</span>
			</div>
		</div>
	</a>
</article>
