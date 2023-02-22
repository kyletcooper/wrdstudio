<?php
/**
 * Displays the live search modal.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<dialog id="search" inert data-dialog-clickoff class="bg-white dark:bg-gray-900 scale-95 opacity-0 pointer-events-none open:pointer-events-auto open:scale-100 open:shadow-2xl open:opacity-100 fixed inset-y-12 inset-x-4 z-40 mt-0 flex flex-col shadow-none border-gray-300 dark:border-gray-700 border rounded-md p-0 w-full max-w-2xl transition-all backdrop:backdrop-blur-sm backdrop:bg-gray-900/30">
	<label class="flex items-center gap-4 py-3 px-5">
		<span class="hidden md:block dark:text-white">
			<?php the_icon( 'search' ); ?>
		</span>

		<input data-search-dialog-input autofocus enterkeyhint="<?php esc_html_e( 'Search', 'wrd' ); ?>" placeholder="<?php esc_attr_e( 'Search...', 'wrd' ); ?>" class="grow bg-transparent placeholder:text-gray-400 dark:placeholder:text-gray-500 dark:text-white font-medium text-lg appearance-none focus:outline-none" type='search'>

		<kbd class="px-2 border-gray-300 dark:border-gray-600 border rounded-md text-sm text-gray-400 dark:text-gray-500 contrast-more:text-gray-700 contrast-more:dark:text-gray-300">ESC</kbd>
	</label>

	<ol data-search-dialog-results class="grow overflow-auto max-h-[70vh] divide-y divide-gray-300 dark:divide-gray-700 border-gray-300 dark:border-gray-700 border-t empty:border-t-0"></ol>

	<div class="py-3 px-5 border-gray-300 dark:border-gray-700 border-t">
		<a class="flex w-fit gap-2 items-center [&>svg]:w-5 text-sm text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 transition-colors" href="<?php echo esc_url( get_search_link( ' ' ) ); ?>">
			<?php the_icon( 'arrow_down_right' ); ?>
			<?php esc_html_e( 'View all results', 'wrd' ); ?>
		</a>
	</div>
</dialog>
