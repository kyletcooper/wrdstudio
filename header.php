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
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( array( 'bg-white text-gray-900 dark:bg-gray-900 dark:text-white', get_theme_color_class() ) ); ?>>
	<?php wp_body_open(); ?>

	<script>
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

	<style>
		:root{
			--bg-grid-url: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-grid.svg' ); ?>');
		}
		.dark{
			--bg-grid-url: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-grid-dark.svg' ); ?>');
		}
	</style>

	<div id="page" class="bg-grid bg-contain bg-no-repeat bg-top min-h-screen leading-7">
		<a class="sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'wrd' ); ?></a>

		<?php get_template_part( 'template-parts/navigation' ); ?>

		<main id="primary">
