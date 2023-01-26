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
				<?php foreach ( $menu_items as $menu_item ) : ?>
					<li class="font-semibold text-theme-500">
						<?php the_menu_item( $menu_item ); ?>
					</li>
				<?php endforeach; ?>
			</ul>

			<button class="text-theme-500 lg:hidden" data-dialog-open="sidebarDialog">
				<?php the_icon( 'menu' ); ?>
			</button>
		</div>
	</nav>
</header>
