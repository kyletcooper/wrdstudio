<?php
/**
 * The template for displaying a post.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

the_post();

get_header();

?>

<div class="container grid gap-16 mt-16 mb-24">
	<header>
		<h1 class="text-4xl lg:text-5xl font-semibold mb-8">
			<?php the_title(); ?>
		</h1>

		<div class="flex items-center gap-6">
			<div class="rounded-full overflow-hidden bg-gray-100 dark:bg-gray-800">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', get_the_author(), ); ?>
			</div>

			<div>
				<div class="font-semibold"><?php the_author(); ?></div>
				<div class="font-medium"><?php the_date(); ?></div>
			</div>
		</div>
	</header>

	<?php
	the_post_thumbnail(
		'xlarge',
		array(
			'loading' => 'eager',
			'class'   => 'w-full h-96 bg-gray-100 dark:bg-gray-800 object-cover object-center',
		)
	);
	?>
	
	<div class="grid lg:grid-cols-3 gap-x-16 gap-y-8">
		<div class="col-span-2">
			<div class="prose max-w-none mb-24">
				<?php the_content(); ?>
			</div>

			<?php comments_template(); ?>
		</div>

		<div>
			<div class="sticky top-12">
				<span class="hidden lg:block text-2xl font-semibold">
					<?php the_title(); ?>
				</span>

				<div class="flex flex-wrap gap-10 mt-4">
					<button data-share class="flex items-center gap-3 text-theme-500 font-semibold cursor-pointer" type="button">
						<?php the_icon( 'share' ); ?>
						Share
					</button>

					<a href="#comments" class="flex items-center gap-3 text-theme-500 font-semibold cursor-pointer">
						<?php the_icon( 'chat_bubble' ); ?>
						<?php echo esc_html( get_comments_number() . __( ' Comments', 'wrd' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

get_footer();
