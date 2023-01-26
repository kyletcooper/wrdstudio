<?php
/**
 * Displays the mobile sidebar navigation menu.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$top_level_menu_items = get_menu_items_by_location(
	'navigation',
	array(
		'parent_item' => 0,
	)
);

?>

<dialog id="sidebarDialog" data-dialog-clickoff class="flex flex-col fixed z-[99999] top-0 bottom-0 right-0 left-12 max-w-[90vw] max-h-screen w-96 h-full m-0 ml-auto p-0 bg-white dark:bg-gray-900 border-l border-gray-300 dark:border-gray-700 divide-y divide-gray-300 dark:divide-gray-700 opacity-0 open:opacity-100 translate-x-8 open:translate-x-0 pointer-events-none open:pointer-events-auto shadow-none open:shadow-2xl transition-all duration-300 backdrop:backdrop-blur-sm backdrop:bg-gray-900/30">
	<header class="py-6 px-8 flex gap-6">
		<button data-dialog-close="sidebarDialog" class="text-gray-400 dark:text-gray-500">
			<?php the_icon( 'close' ); ?>
		</button>

		<h2 class="text-lg font-semibold">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</h2>
	</header>

	<ol role="navigation" class="grow overflow-y-auto divide-y divide-gray-300 dark:divide-gray-700">

		<?php foreach ( $top_level_menu_items as $menu_item ) : ?>

			<?php

			$descripted_children_menu_items = get_menu_items_by_location(
				'navigation',
				array(
					'has_description' => true,
					'parent_item'     => $menu_item->ID,
				)
			);

			$undescripted_children_menu_items = get_menu_items_by_location(
				'navigation',
				array(
					'has_description' => false,
					'parent_item'     => $menu_item->ID,
				)
			);

			?>

			<li class="p-8">

				<details class="group">
					<summary class="flex justify-between items-center">
						<?php the_menu_item( $menu_item, array( 'class' => 'text-lg font-semibold' ) ); ?>

						<div class="text-gray-400 dark:text-gray-500 transition-transform group-open:rotate-90">
							<?php the_icon( 'chevron_right' ); ?>
						</div>
					</summary>

					<!-- Prominent Items -->
					<div class="my-8 space-y-8">
						<?php foreach ( $descripted_children_menu_items as $child_menu_item ) : ?>

							<?php

							$og_theme = get_theme_slug();
							set_theme_slug( get_field( 'theme', $child_menu_item ) );

							?>

							<a <?php the_menu_item_attrs( $child_menu_item, array( 'class' => 'block relative overflow-clip p-6 rounded-md bg-theme-50 dark:bg-theme-900 ' . get_theme_color_class() ) ); ?>>
								<div class="relative z-10">
									<h4 class="font-medium text-theme-500 text-lg mb-2">
										<?php echo esc_html( $child_menu_item->title ); ?>
									</h4>
									<p class="text-sm">
										<?php echo esc_html( $child_menu_item->description ); ?>
									</p>
								</div>

								<div class="absolute -bottom-2 -right-2 w-1/3 aspect-square [&>svg]:w-full [&>svg]:h-full text-theme-100 dark:text-theme-800 opacity-50">
									<?php the_theme_icon(); ?>
								</div>
							</a>

							<?php set_theme_slug( $og_theme ); ?>

						<?php endforeach; ?>
					</div>

					<!-- Non-Prominent Items -->
					<?php if ( $undescripted_children_menu_items ) : ?>
						<div>
							<h4 class="font-medium mb-2">
								<?php the_field( 'more_title', $menu_item ); ?>
							</h4>

							<ol>
								<?php

								$is_first_subtle = true;

								foreach ( $undescripted_children_menu_items as $child_menu_item ) :
									$is_subtle = get_field( 'is_subtle', $child_menu_item );

									?>

									<li class="<?php echo esc_attr( $is_subtle && $is_first_subtle ? 'mt-6' : '' ); ?>">
										<?php the_menu_item( $child_menu_item, array( 'class' => 'block py-2 ' . ( $is_subtle ? 'text-gray-500 dark:text-gray-400' : '' ) ) ); ?>
									</li>

									<?php

									if ( $is_first_subtle && $is_subtle ) {
										$is_first_subtle = false;
									}

								endforeach;

								?>
							</ol>
						</div>
					<?php endif; ?>
				</details>
			</li>
		<?php endforeach; ?>
	</ol>

	<div class="grid grid-cols-3 divide-x divide-inherit">
		<a class="flex items-center justify-center py-4" aria-label="<?php esc_attr_e( 'Search', 'wrd' ); ?>" href="<?php echo esc_url( get_search_link( ' ' ) ); ?>">
			<?php the_icon( 'search' ); ?>
		</a>
		
		<button class="flex items-center justify-center py-4" aria-label="<?php esc_attr_e( 'Toggle dark mode', 'wrd' ); ?>" type="button" data-darkmode>
			<?php the_icon( 'dark_mode' ); ?>
		</button>

		<a class="flex items-center justify-center py-4" aria-label="<?php esc_attr_e( 'Manage account', 'wrd' ); ?>" href="<?php echo esc_url( get_account_link() ); ?>">
			<?php the_icon( 'account_circle' ); ?>
		</a>
	</div>
</dialog>
