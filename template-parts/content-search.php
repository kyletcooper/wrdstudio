<?php
/**
 * The partial for a preview of a post/page in the search results.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<article>
	<div>
		<?php the_breadcrumbs( get_the_ID(), false ); ?>
	</div>
	<a href="<?php the_permalink(); ?>">
		<h2>
			<?php the_title(); ?>
		</h2>

		<div>
			<?php the_excerpt(); ?>
		</div>
	</a>
</article>
