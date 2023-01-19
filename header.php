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

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page">
		<a class="sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'wrd' ); ?></a>

		<?php get_template_part( 'template-parts/navigation' ); ?>

		<div id="primary">
