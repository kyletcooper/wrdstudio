<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package wrdstudio
 * @since 1.0.0
 */

namespace wrd;

if ( post_password_required() || ! comments_open() ) {
	return;
}

?>

<div>
	<div class="bg-theme-500 h-1 rounded-full mb-12"></div>

	<h2 class="text-4xl font-semibold">
		<?php esc_html_e( 'Replies', 'wrd' ); ?>
	</h2>

	<?php if ( have_comments() ) : ?>
		<ol class="comments-list">
			<?php
			wp_list_comments(
				array(
					'callback'    => function( $comment, $args, $depth ) {
						get_template_part( '/template-parts/comment' );
					},
					'avatar_size' => 74,
				)
			);
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Comment navigation', 'wrd' ); ?>">
				<?php previous_comments_link( __( 'Older Comments', 'wrd' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments', 'wrd' ) ); ?>
			</nav>
		<?php endif; ?>

	<?php else : ?>
		<div>
			<h2 class="text-xl font-semibold mb-3 mt-8">
				<?php esc_html_e( "There's nothing here!", 'wrd' ); ?>
			</h2>

			<p class="max-w-lg">
				<?php esc_html_e( 'Be the first to leave a reply.', 'wrd' ); ?>
			</p>
		</div>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="font-semibold my-8">
			<?php esc_html_e( 'Comments are now closed.', 'wrd' ); ?>
		</p>
	<?php endif; ?>

	<div class="mt-16">
		<?php
		comment_form(
			array(
				'label_submit'         => __( 'Post Reply', 'wrd' ),
				'comment_notes_before' => false,
				'logged_in_as'         => false,
			)
		);
		?>
	</div>

</div>
