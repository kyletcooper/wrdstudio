<?php
/**
 * The footer for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>
<footer id="footer">
	<div  id="footer-callout" class="bg-theme-500 bg-grid-white bg-100% bg-no-repeat text-white mt-12">
		<div class="container py-16">
			<div class="flex items-end justify-between flex-wrap gap-12">
				<div>
					<a class="block text-3xl md:text-4xl font-semibold py-2" href="mailto:<?php the_contact_email(); ?>"><?php the_contact_email(); ?></a>
					<a class="block text-3xl md:text-4xl font-semibold py-2" href="tel:<?php the_contact_phone(); ?>"><?php the_contact_phone(); ?></a>
				</div>

				<?php
				wp_nav_menu(
					array(
						'theme_location'       => 'socials',
						'container'            => 'nav',
						'menu_id'              => 'socialicons',
						'container_aria_label' => __( 'Social Media', 'wrd' ),
					)
				);
				?>
			</div>
		</div>
	</div>

	<div id="footer-sitemap">
		<div class="bg-gray-50 dark:bg-gray-800 py-16">
			<nav class="container" aria-label="<?php esc_attr_e( 'Sitemap', 'wrd' ); ?>" >
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_id'        => 'footermenu',
					)
				);
				?>
			</nav>
		</div>
		
		<div class="container flex justify-between flex-wrap py-12 text-gray-600 dark:text-gray-400">
			<p>
				Copyright © <?php echo esc_html( gmdate( 'Y' ) ); ?>. All rights reserved.
				<a class="underline underline-offset-4 decoration-gray-300 dark:decoration-gray-700" href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy Policy</a>
			</p>

			<p>
				Proudly powered by <a class="underline underline-offset-4 decoration-gray-300 dark:decoration-gray-700" href="https://wordpress.org" rel="noopener">WordPress</a>.
			</p>
		</div>
	</div>
</footer>
