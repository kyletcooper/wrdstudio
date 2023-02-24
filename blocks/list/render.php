<?php
/**
 * Renders the list block.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$og_theme = get_theme_slug();
$colors   = array( 'blue', 'green', 'orange', 'pink', 'red' );

?>

<section <?php block_atts( $block ); ?> >
	<ul class="container grid gap-6 gap-y-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
		
		<?php foreach ( get_field( 'list' ) as $i => $list_item ) : ?>
			<?php set_theme_slug( $colors[ $i % count( $colors ) ] ); ?>

			<li class="flex items-center gap-4 font-semibold <?php echo esc_attr( get_theme_color_class() ); ?>">
				<div class="text-theme-500">
					<?php the_icon( 'arrow_right' ); ?>
				</div>

				<?php echo esc_html( $list_item['text'] ); ?>
			</li>
		<?php endforeach; ?>

	</ul>
</section>

<?php set_theme_slug( $og_theme ); ?>
