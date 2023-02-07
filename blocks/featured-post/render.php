<?php
/**
 * Renders the featured post block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<section <?php block_atts( $block ); ?> >
	<div class="container <?php echo esc_attr( get_theme_color_class() ); ?>">
		<?php

		global $post;
		$post = get_field( 'post' );
		setup_postdata( $post );

		get_template_part( 'template-parts/content', 'featured' );

		wp_reset_postdata();

		?>
	</div>
</section>
