<?php
/**
 * The header for the theme
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

?>

<!doctype html>
<html class="scroll-smooth" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="color-scheme" content="light dark" />
	<meta name="theme-color" content="<?php echo esc_attr( get_theme_color() ); ?>" />
	
	<style id="font-faces">
		@font-face {
			font-family: "Montserrat";
			src: local("Montserrat") local("Montserrat Regular") local("Montserrat-Regular") url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/fonts/montserrat/Montserrat-Regular.ttf') format('truetype');
			font-weight: 400;
			font-display: swap;
		}

		@font-face {
			font-family: "Montserrat";
			src: local("Montserrat Medium") local("Montserrat-Medium") url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/fonts/montserrat/Montserrat-Medium.ttf') format('truetype');
			font-weight: 500;
			font-display: swap;
		}

		@font-face {
			font-family: "Montserrat";
			src: local("Montserrat Semibold") local("Montserrat-Semibold") url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/fonts/montserrat/Montserrat-Semibold.ttf') format('truetype');
			font-weight: 500;
			font-display: swap;
		}

		:root{
			--bg-grid-url: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-grid.svg' ); ?>');
			--bg-grid-white-url: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-grid-white.svg' ); ?>');
		}

		.dark{
			--bg-grid-url: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-grid-dark.svg' ); ?>');
		}

		<?php if ( is_admin_bar_showing() ) : ?>
			@media (min-width: 601px) {
				body{
					--admin-bar-height: 46px;
				}
			}
			@media (min-width: 783px) {
				body{
					--admin-bar-height: 32px;
				}
			}
		<?php else : ?>
			body{
				--admin-bar-height: 0px;
			}
		<?php endif; ?>
	</style>

	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class( array( 'bg-white text-gray-900 dark:bg-gray-900 dark:text-white', get_theme_color_class() ) ); ?>>
	<?php wp_body_open(); ?>

	<a id="skip-link" class="sr-only focus:not-sr-only focus:absolute focus:z-30 focus:bg-gray-900 focus:text-white focus:py-2 focus:px-5" href="#primary">
		<?php esc_html_e( 'Skip to content', 'wrd' ); ?>
	</a>

	<script id="dark-mode">
		window.wrd = window.wrd || {};

		window.wrd.theme = {
			refresh: () => {
				if (window.wrd.theme.get() === 'dark') {
					document.documentElement.classList.add('dark')
				} else {
					document.documentElement.classList.remove('dark')
				}
				window.dispatchEvent(new Event('theme-change'))
			},

			get: () => {
				if(('theme' in localStorage)){
					return localStorage.theme;
				}

				return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
			},

			toggle: () => {
				if(window.wrd.theme.get() === 'dark'){
					window.wrd.theme.setLight();
				}
				else{
					window.wrd.theme.setDark();
				}
			},

			setDark: () => {
				localStorage.theme = 'dark'
				window.wrd.theme.refresh();
			},

			setLight: () => {
				localStorage.theme = 'light'
				window.wrd.theme.refresh();
			},
			
			setOS: () => {
				localStorage.removeItem('theme')
				window.wrd.theme.refresh();
			}
		}

		window.wrd.theme.refresh();
	</script>

	<div id="page" class="bg-grid bg-contain bg-no-repeat bg-top min-h-screen leading-7">
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
		
		<?php get_template_part( 'template-parts/navigation' ); ?>

		<main id="primary">
