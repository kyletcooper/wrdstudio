<?php
/**
 * The template for displaying post archives.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

get_header();

?>

<div class="container mt-16 mb-24 min-h-[50vh]">
	<h1 class="text-5xl font-semibold mb-4">
		<?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?>
	</h1>

	<div class="font-medium max-w-4xl mb-16">
		<?php echo wp_kses( get_the_content( null, null, get_option( 'page_for_posts' ) ), 'post' ); ?>
	</div>

	<hr class="border-theme-500 border-t-4 mb-6" />

	<post-archive per-page="<?php echo esc_attr( get_option( 'posts_per_page' ) ); ?>">
		<div data-placeholder="filters" class="flex gap-4 mb-8">
			<div class="bg-gray-100 dark:bg-gray-800 rounded-full py-2 px-4 text-sm text-transparent animate-pulse">
				Category
			</div>

			<div class="bg-gray-100 dark:bg-gray-800 rounded-full py-2 px-4 text-sm text-transparent animate-pulse">
				Private
			</div>

			<div class="bg-gray-100 dark:bg-gray-800 rounded-full py-2 px-4 text-sm text-transparent animate-pulse">
				Placeholder
			</div>
		</div>

		<div data-placeholder="posts" class="grid gap-14">
			<?php

			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;

			?>
		</div>
		
		<div data-placeholder="navigation" class="mt-8">
			<?php the_posts_navigation(); ?>
		</div>
	</post-archive>
</div>

<?php

get_footer();
