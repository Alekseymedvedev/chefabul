<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chef-abul-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php 
						$page_id = 11;
						the_field('fav_icon', $page_id); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<header class="header">
			<div class="header-top">
				<div class="container">
					<div class="flex">
						<div class="top-menu">
							<ul>
								<li><?php my_account_loginout_link(); ?></li>
								
			
							</ul>

						</div>
						<a href="<?php echo  home_url($path, $scheme); ?>" class="logo">
							<img src="<?php 
						$page_id = 11;
						the_field('logo', $page_id); ?>" alt="Chef Abuls">
						</a>
							
							<?php abdul_woocommerce_cart_link(); ?>
					</div>
				</div>
			</div>
			<nav class="header-nav">
				<div class="container">
					<div class="flex">
						<nav class="main-nav">
							<?php primary_menu(); ?>
						</nav>
						<div class="header-search">
								<?php get_search_form( $echo = true ); ?>
								<img class="search_icon" src="<?php 
						$page_id = 11;
						the_field('search_icon', $page_id); ?>" alt="">

						</div>
					</div>
				</div>
			</nav>
			<div class="toggle-menu">
				<div class="line line1"></div>
				<div class="line line2"></div>
				<div class="line line3"></div>
			</div>
			<nav class="header__nav nav-bar">
				<?php mobile_menu(); ?>
			</nav>

		</header>