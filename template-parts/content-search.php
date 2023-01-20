<?php
/**
 * The partial for a preview of a post/page in the search results.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<article <?php post_class(); ?> >
	<div class="flex items-center gap-2 mb-2 text-sm text-theme-500 [&>svg]:w-5">
		<?php
		the_breadcrumbs(
			get_the_ID(),
			array(
				'use_main_query' => false,
				'include_home'   => false,
				'include_self'   => false,
			)
		);
		?>
	</div>
	<a href="<?php the_permalink(); ?>">
		<h2 class="text-3xl font-semibold">
			<?php the_title(); ?>
		</h2>

		<?php if ( get_the_excerpt() ) : ?>
			<div class="pt-4">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	</a>
</article>
