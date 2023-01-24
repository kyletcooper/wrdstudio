<?php
/**
 * The template for displaying a page.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

get_header();

?>

<div class="mt-16 mb-24 min-h-[50vh]">
	<?php the_content(); ?>
</div>

<?php

get_footer();
