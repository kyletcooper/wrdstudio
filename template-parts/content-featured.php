<?php
/**
 * The partial for a preview of a post/page in a featured context.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$heading_id = uniqid( 'article_heading_' );

?>


<article <?php post_class(); ?> aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" >
	<a href="<?php the_permalink(); ?>" class="group grid grid-cols-12 gap-6 md:gap-8">
		<div class="col-span-12 md:col-span-6 lg:col-span-4 odd:order-1 min-h-[20rem] bg-gray-100 dark:bg-gray-800 bg-cover overflow-clip relative">
			<?php the_post_thumbnail( 'medium', array( 'class' => 'absolute min-w-full min-h-full object-cover object-center transition-transform group-hover:scale-105 motion-reduce:group-hover:transform-none' ) ); ?>
		</div>

		<div class="col-span-12 md:col-span-6 lg:col-span-8 flex items-center md:py-8">
			<div class="w-full">
				<?php if ( get_category_labels() ) : ?>
					<div class="font-semibold text-theme-500">
						<?php the_category_labels(); ?>
					</div>
				<?php endif; ?>

				<hr class="hidden md:block my-12 border-t-4 border-theme-500" />

				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="text-4xl font-semibold">
					<span class="sr-only"><?php esc_html_e( 'Featured: ', 'wrd' ); ?></span>
					<?php the_title(); ?>
				</h2>
			</div>
		</div>
	</a>
</article>
