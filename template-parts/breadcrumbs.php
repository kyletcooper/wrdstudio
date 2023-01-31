<?php
/**
 * The breadcrumbs bar for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<div id="breadcrumbs" class="bg-theme-500 text-white sticky top-0 z-20 [.admin-bar_&]:top-8">
	<div class="container py-2">
		<div class="flex items-center justify-between flex-wrap gap-2">
			<div class="flex items-center gap-2 text-xs [&>svg]:w-4">
				<?php the_breadcrumbs(); ?>
			</div>

			<div class="hidden sm:flex items-center gap-6 ml-auto">
				<a aria-label="<?php esc_attr_e( 'Search', 'wrd' ); ?>" href="<?php echo esc_url( get_search_link( ' ' ) ); ?>" data-dialog-open="search">
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
