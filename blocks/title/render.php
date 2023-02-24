<?php
/**
 * Renders the title block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<div <?php block_atts( $block, array( 'class' => 'container' ) ); ?> >

	<?php

	switch ( get_field( 'level' ) ) {
		case 'h4':
			?>

				<h2 class="text-lg font-medium">
					<?php the_field( 'title' ); ?>
				</h2>

			<?php
			break;

		case 'h3':
			?>

				<h3 class="text-xl font-semibold">
					<?php the_field( 'title' ); ?>
				</h3>

			<?php
			break;

		default:
		case 'h2':
			?>

				<h2 class="text-3xl lg:text-4xl font-semibold">
					<?php the_field( 'title' ); ?>
				</h2>

			<?php
			break;

		case 'h1':
			?>

				<h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold">
					<?php the_field( 'title' ); ?>
				</h1>

			<?php
			break;
	}

	?>

</div>
