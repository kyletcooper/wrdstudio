<?php
/**
 * The partial for a preview of a post/page. No context (search vs archive) is provided.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$heading_id = uniqid( 'article_heading_' );

?>


<article <?php post_class(); ?> aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" >
	<a href="<?php the_permalink(); ?>" class="group h-full flex flex-col">
		<div class="min-h-[20rem] bg-gray-100 dark:bg-gray-800 bg-cover overflow-clip relative mb-6">
			<?php the_post_thumbnail( 'medium', array( 'class' => 'absolute min-w-full min-h-full object-cover object-center transition-transform group-hover:scale-105 motion-reduce:group-hover:transform-none' ) ); ?>
		</div>

		<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="text-3xl font-semibold">
			<?php the_title(); ?>
		</h2>

		<?php if ( get_the_excerpt() ) : ?>
			<div class="grow pt-4">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>

		<span class="flex items-center gap-4 mt-6 text-theme-500 font-medium">
			<?php esc_html_e( 'Read more', 'wrd' ); ?>

			<div class="transition-transform group-hover:translate-x-3 motion-reduce:group-hover:transform-none">
				<?php the_icon( 'arrow_right' ); ?>
			</div>
		</span>
	</a>
</article>
