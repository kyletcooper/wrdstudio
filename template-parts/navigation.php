<?php
/**
 * The navigation bar for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

$menu_items = get_menu_items_by_location(
	'navigation',
	array(
		'parent_item' => 0,
	)
);

?>

<header>

	<div class="bg-theme-500 text-white">
		<div class="container py-2">
			<div class="flex items-center justify-between flex-wrap gap-2">
				<div class="flex items-center gap-2 text-xs [&>svg]:w-4">
					<?php the_breadcrumbs(); ?>
				</div>

				<div class="hidden sm:flex items-center gap-6 ml-auto">
					<a aria-label="<?php esc_attr_e( 'Search', 'wrd' ); ?>" href="<?php echo esc_url( get_search_link( ' ' ) ); ?>" data-dialog-open="searchDialog">
						<?php the_icon( 'search' ); ?>
					</a>
					
					<button aria-label="<?php esc_attr_e( 'Toggle dark mode', 'wrd' ); ?>" type="button" data-darkmode>
						<?php the_icon( 'dark_mode' ); ?>
					</button>

					<a aria-label="<?php esc_attr_e( 'Manage account', 'wrd' ); ?>" href="<?php echo esc_url( get_account_link() ); ?>">
						<?php the_icon( 'account_circle' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<nav class="container py-8">
		<div class="flex items-center justify-between">
			<a href="<?php echo esc_url( get_home_url() ); ?>" class="flex items-center gap-4 font-semibold" >
				<span class="text-theme-500">
					<?php the_theme_icon(); ?>
				</span>
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>

			<ul class="hidden lg:flex gap-12">
				<?php foreach ( $menu_items as $i => $menu_item ) : ?>
					<li>
						<?php

						the_menu_item(
							$menu_item,
							array(
								'data-megamenu-open' => $i,
								'class'              => 'font-semibold text-theme-500',
							)
						);

						?>

						<dialog data-megamenu="<?php echo esc_attr( $i ); ?>" class="block bg-white dark:bg-gray-900 fixed z-40 m-0 arrow-top border border-gray-100 dark:border-gray-800 rounded-md p-0 w-[700px] transition-[opacity,shadow,transform] duration-300 pointer-events-none open:pointer-events-auto translate-y-8 open:translate-y-0 opacity-0 open:opacity-100 shadow-none open:shadow-xl" >
							<div class="grid grid-cols-5">
								
								<!-- Prominent Items -->
								<div class="p-8 space-y-8 col-span-3">
									<?php the_nav_menu_items_prominent( 'navigation', $menu_item->ID ); ?>
								</div>

								<!-- Non-Prominent Items -->
								<div class="bg-gray-50 dark:bg-gray-800 rounded-tr-md rounded-br-md p-8 col-span-2 flex flex-col">
									<span class="font-medium mb-2">
										<?php the_field( 'more_title', $menu_item ); ?>
									</span>

									<ol class="grow flex flex-col">
										<?php

										the_nav_menu_items_nonprominent(
											'navigation',
											$menu_item->ID,
											function( $is_subtle, $is_first_subtle ) {
												return 'block py-2 hover:text-theme-500 transition-colors' . ( $is_subtle ? ' text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100' : '' );
											},
											function( $is_subtle, $is_first_subtle ) {
												return ( $is_first_subtle ? ' mt-auto' : '' );
											}
										)

										?>
									</ol>
								</div>
								
							</div>
						</dialog>
					</li>
				<?php endforeach; ?>
			</ul>

			<button class="text-theme-500 lg:hidden" data-dialog-open="sidebarDialog">
				<?php the_icon( 'menu' ); ?>
			</button>
		</div>
	</nav>
</header>
