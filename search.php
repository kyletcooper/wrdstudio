<?php
/**
 * The template for displaying search results.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

get_header();

?>

<div class="container grid lg:grid-cols-2 2xl:grid-cols-5 gap-24 mt-16 mb-24 min-h-[50vh]">
	<div class="2xl:col-span-2">
		<h1 class="text-5xl font-semibold mb-8">
			<?php esc_html_e( 'Search', 'wrd' ); ?>
		</h1>

		<?php get_search_form(); ?>
	</div>

	<div class="2xl:col-span-3">
		<div class="grid gap-16 mb-8">
			<?php

			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;

			?>
		</div>

		<?php the_posts_navigation(); ?>
	</div>
</div>

<?php

get_footer();
