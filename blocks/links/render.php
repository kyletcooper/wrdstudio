<?php
/**
 * Renders the links block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$i      = 0;
$colors = array( 'blue', 'green', 'orange' );

?>

<section <?php block_atts( $block ); ?> >
	<div class="container">
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">

			<?php
			while ( have_rows( 'links' ) ) :
				set_theme_slug( $colors[ $i ] );
				$i = ( $i + 1 ) % count( $colors );
				the_row();
				?>
				
				<a class="block group <?php echo esc_attr( get_theme_color_class() ); ?>" href="<?php the_sub_field( 'url' ); ?>">	
					<h2 class="flex items-center gap-8 text-3xl font-semibold arrow-link mb-4">
						<?php the_sub_field( 'title' ); ?>

						<div class="transition-transform group-hover:translate-x-3 text-theme-500">
							<?php the_icon( 'arrow_right', 'h-8 w-12' ); ?>
						</div>
					</h2>

					<div class="prose">
						<?php the_sub_field( 'body' ); ?>
					</div>
				</a>

			<?php endwhile; ?>

		</div>
	</div>
</section>
