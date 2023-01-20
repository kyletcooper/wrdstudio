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

get_search_form();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'search' );
	endwhile;

	the_posts_navigation();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();
