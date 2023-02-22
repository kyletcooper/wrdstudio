<?php
/**
 * The partial for a preview of a post/page in the live search results.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$heading_id = uniqid( 'article_heading_' );

?>

<article <?php post_class(); ?> aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" >
	<div class="flex items-center gap-2 mb-1 text-sm text-gray-400 dark:text-gray-500 [&>svg]:w-4">
		<?php
		the_breadcrumbs(
			get_the_ID(),
			array(
				'use_main_query' => false,
				'include_home'   => false,
				'include_self'   => false,
				'use_links'      => false,
			)
		);
		?>
	</div>

	<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="text-xl font-semibold text-gray-900 dark:text-white">
		<?php the_title(); ?>
	</h2>
</article>
