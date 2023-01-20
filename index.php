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

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'archive' );
	endwhile;

	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();
