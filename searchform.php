<?php
/**
 * The search form template for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex md:w-fit border-gray-900 border-2 focus-within:border-b-theme-500">
	<label class="flex grow py-2 px-4 cursor-text gap-4">
		<div class="hidden md:block" aria-hidden="true">
			<?php the_icon( 'search' ); ?>
		</div>

		<span class="sr-only">
			<?php esc_html_e( 'Search for:', 'wrd' ); ?>
		</span>

		<input class="grow w-32 md:w-64 lg:w-80 font-medium focus:outline-none" type="search" placeholder="<?php esc_attr_e( 'Search', 'wrd' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	</label>

	<button class="bg-theme-500 text-white font-medium py-2 px-6" type="submit">
		<?php esc_html_e( 'Search', 'wrd' ); ?>
	</button>
</form>
