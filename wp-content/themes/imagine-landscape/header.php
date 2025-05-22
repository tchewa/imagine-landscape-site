<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imaginelandscape
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/il-icon.png" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" rel="preload"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="site">
		<div class="wrapper-container">
			<header class="site-header">
				<?php include "inc/main-navigation.php"; ?>
				<?php include "inc/mobile-navigation.php"; ?>
			</header>