<?php
/**
 * The footer for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

get_template_part( '/template-parts/search' );

?>

<div class="bg-theme-500 bg-grid bg-100% bg-no-repeat text-white mt-12">
	<div class="container py-16">
		<div class="flex items-end justify-between flex-wrap gap-12">
			<div>
				<a class="block text-2xl md:text-4xl font-semibold md:mb-4" href="mailto:<?php the_contact_email(); ?>"><?php the_contact_email(); ?></a>
				<a class="block text-2xl md:text-4xl font-semibold" href="tel:<?php the_contact_phone(); ?>"><?php the_contact_phone(); ?></a>
			</div>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'socials',
					'container'      => 'nav',
					'menu_id'        => 'socialicons',
				)
			);
			?>
		</div>
	</div>
</div>

<footer class="bg-theme-50 dark:bg-theme-900">
	<nav class="container py-16">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_id'        => 'footermenu',
			)
		);
		?>

		<p class="mt-12 text-gray-600 dark:text-gray-400">
			Copyright © <?php echo esc_html( gmdate( 'Y' ) ); ?>. All rights reserved. <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy Policy</a>
		</p>
	</nav>
</footer>
