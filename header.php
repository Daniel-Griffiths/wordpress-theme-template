<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/mobile.css" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
	<header id="header" role="banner">
		<section id="branding" class="grid">
			<div class="col-1-1">
				<img class="logo" src="<?= get_template_directory_uri() ?>/assets/img/logo.png">
			</div>
		</section>
		<nav id="menu" role="navigation">
			<div class="grid no-overflow">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</nav>
	</header>
	<div class="grid">