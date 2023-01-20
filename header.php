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

<body <?php body_class( get_theme_color_class() ); ?>>
	<?php wp_body_open(); ?>


	<style>
		:root{
			--bg-grid-url: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-grid.svg' ); ?>');
		}
	</style>


	<div id="page" class="bg-grid bg-contain bg-no-repeat bg-top min-h-screen">
		<a class="sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'wrd' ); ?></a>

		<?php get_template_part( 'template-parts/navigation' ); ?>

		<div id="primary">
