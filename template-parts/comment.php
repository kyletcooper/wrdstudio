<?php
/**
 * The partial for displaying a comment.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

global $comment;
$parent_id = $comment->comment_parent;

?>

<div <?php comment_class( 'flex gap-6 items-start py-12 border-t border-gray-300 dark:border-gray-600' ); ?> id="comment-<?php comment_ID(); ?>">
	<div class="overflow-hidden rounded-full">
		<?php echo get_avatar( get_comment(), 64 ); ?>
	</div>

	<div>
		<h3 class="text-lg font-medium mb-4">
			<?php comment_author(); ?>
		</h3>

		<?php if ( $parent_id ) : ?>
			<div class="flex gap-2 items-center mb-4 -mt-3 text-sm text-gray-400 dark:text-gray-600 [&>svg]:w-4">
				<?php the_icon( 'arrow_down_right' ); ?>

				<span>
					<?php echo esc_html_e( 'In response to ', 'wrd' ); ?>
					
					<a href="<?php echo esc_attr( '#comment-' . $parent_id ); ?>">
						<?php comment_author( $parent_id ); ?>
					</a>
				</span>
			</div>
		<?php endif; ?>

		<div>
			<?php comment_text(); ?>
		</div>

		<div class="mt-4 flex gap-8">
			<span class="text-theme-500 font-medium">
			<?php
			comment_reply_link(
				array(
					'depth'     => 1,
					'max_depth' => 10,
				)
			);
			?>
			</span>

			<span class="text-gray-400 dark:text-gray-600">
				<?php the_relative_date( get_comment_date( 'U' ) ); ?>
			</span>
		</div>
	</div>
</div>
