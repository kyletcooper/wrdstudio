<?php
/**
 * The template for displaying a 404 error.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

get_header();

?>

<div class="flex flex-col justify-center container min-h-[70vh]">
	<div>
		<h1 class="text-5xl font-semibold mb-4">
			404 Error
		</h1>

		<p class="max-w-lg mb-12">
			Sorry, the page you are trying to visit doesn't exist or has been moved somewhere else. Why no try searching try searching our site instead:
		</p>

		<?php get_search_form(); ?>
	</div>
</div>

<?php

get_footer();
