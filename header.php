<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/mobile.css" />
	<!--[if lt IE 9]>
	  <script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
	<header id="header" role="banner">
		<section id="branding" class="grid">
			<div class="col-1-2">
				<a href="/">
					<img class="logo" alt="Logo" src="<?= get_template_directory_uri() ?>/assets/img/logo.png">
				</a>
			</div>
			<div class="col-1-2">
				<?php 
					/* display website details */
					if(!empty( get_option('website_tel'))) 			echo '<div>' . get_option('website_tel') . '</div>';
					if(!empty( get_option('website_email'))) 		echo '<div>' . get_option('website_email') . '</div>';
					if(!empty( get_option('website_facebook_url'))) echo '<div>' . get_option('website_facebook_url') . '</div>';
					if(!empty( get_option('website_twitter_url')))  echo '<div>' . get_option('website_twitter_url') . '</div>'; 
				?>
			</div>
		</section>
		<nav id="menu" role="navigation">
			<div class="grid no-overflow">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</nav>
	</header>

	<?php 
	/* display featured image as a hero banner */
	if(has_post_thumbnail()){ 
		echo '
		<div class="hero-banner" style="background-image:url(' . wp_get_attachment_url( get_post_thumbnail_id($post->ID)) . ');">
			<div class="inner">
				';
				if(is_front_page()){
				
					echo 
					'<h1><strong>Main Text</strong><br>Sub Text</h1>
					<a href="#" class="btn btn-default">Button</a>
					<a href="#" class="btn btn-default">Button</a>
					';

					//echo '<br>' . do_shortcode('[post-box amount="3"]');
				}
			echo '
			</div>
		</div>
		';	
	} 
	?>
	<main class="grid main-content">