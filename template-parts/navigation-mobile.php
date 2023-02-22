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

<dialog id="nav-mobile" aria-label="Site Navigation Sidebar (Mobile)" data-dialog-clickoff inert class="fixed z-[99999] top-0 bottom-0 right-0 left-12 max-w-[90vw] max-h-screen w-96 h-full m-0 ml-auto p-0 bg-white dark:bg-gray-900 border-l border-gray-300 dark:border-gray-700 opacity-0 open:opacity-100 translate-x-8 motion-reduce:translate-x-0 open:translate-x-0 pointer-events-none open:pointer-events-auto shadow-none open:shadow-2xl transition-all duration-300 backdrop:backdrop-blur-sm backdrop:bg-gray-900/30">
	<nav aria-label="Site Navigation (Mobile)" class="flex flex-col h-full divide-y divide-gray-300 dark:divide-gray-700">	
		<header class="py-6 px-8 flex gap-6">
			<button data-dialog-close="nav-mobile" class="text-gray-400 dark:text-gray-500"aria-label="<?php esc_html_e( 'Close Navigation', 'wrd' ); ?>">
				<?php the_icon( 'close' ); ?>
			</button>

			<h2 class="text-lg font-semibold">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</h2>
		</header>

		<ol class="grow overflow-y-auto divide-y divide-gray-300 dark:divide-gray-700">

			<?php foreach ( $top_level_menu_items as $menu_item ) : ?>
				<li>

					<details class="group">
						<summary class="flex p-8 justify-between items-center">
							<?php the_menu_item( $menu_item, array( 'class' => 'text-lg font-semibold' ) ); ?>

							<div class="text-gray-400 dark:text-gray-500 transition-transform group-open:rotate-90">
								<?php the_icon( 'chevron_right' ); ?>
							</div>
						</summary>

						<!-- Prominent Items -->
						<div class="mb-8 px-8 space-y-8">
							<?php the_nav_menu_items_prominent( 'navigation', $menu_item->ID ); ?>
						</div>

						<!-- Non-Prominent Items -->
						<div class="px-8 mb-6">
							<span class="font-medium mb-2">
								<?php the_field( 'more_title', $menu_item ); ?>
							</span>

							<ol>
								<?php

								the_nav_menu_items_nonprominent(
									'navigation',
									$menu_item->ID,
									function( $is_subtle, $is_first_subtle ) {
										return 'block py-2' . ( $is_subtle ? ' text-gray-500 dark:text-gray-400 contrast-more:text-gray-700 contrast-more:dark:text-gray-200' : '' ) . ( $is_first_subtle ? ' mt-6' : '' );
									}
								)

								?>
							</ol>
						</div>
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
	</nav>
</dialog>
