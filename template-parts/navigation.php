<?php
/**
 * The navigation bar for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<header>

	<div class="bg-theme-500 text-white">
		<div class="container py-2">
			<div class="flex items-center justify-between">
				<div class="flex items-center gap-2 text-xs [&>svg]:w-4">
					<?php the_breadcrumbs(); ?>
				</div>

				<div class="flex items-center gap-6">
					<a aria-label="<?php esc_attr_e( 'Search', 'wrd' ); ?>" href="<?php echo esc_url( get_search_link() ); ?>">
						<?php the_icon( 'search' ); ?>
					</a>
					
					<button aria-label="<?php esc_attr_e( 'Toggle dark mode', 'wrd' ); ?>" type="button" data-darkmode>
						<?php the_icon( 'nights_stay' ); ?>
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

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'navigation',
					'container'      => false,
					'menu_id'        => 'megamenu',
				)
			);
			?>
		</div>
	</nav>
</header>
