<?php
/**
 * Renders the post grid block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container grid gap-12 md:grid-cols-2 lg:grid-cols-3">
		<?php

		global $post;
		$selected_posts = get_field( 'posts' );

		foreach ( $selected_posts as $post ) {
			setup_postdata( $post );

			get_template_part( 'template-parts/content', 'vertical' );

			wp_reset_postdata();
		}

		?>
	</div>
</section>
