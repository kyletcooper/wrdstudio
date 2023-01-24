<?php
/**
 * Displays the mobile sidebar navigation menu.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<nav>
	<header class="flex gap-4">
		<button class="text-gray-500">
			<?php the_icon( 'close' ); ?>
		</button>
		<span>
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</span>
	</header>

	<ol class="divide-y divide-gray-300 dark:divide-gray-700">
		<li>
			<button>
				<span>
					Plugins
				</span>

				<button class="text-gray-500">
					<?php the_icon( 'chevron_right' ); ?>
				</button>
			</button>
		</li>
	</ol>
</nav>
