<?php
/**
 * The partial for a preview of a post/page. No context (search vs archive) is provided.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<article>
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</article>
