<?php
/* Contains header */
?>

<!DOCTYPE html>
<html <?php language_attributes(); // lang="en"
		?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); // Brings in important WP links and scripts, etc 
	?>
</head>

<body <?php body_class(); // WP provides some default body classes 
		?>>

	<div class="container">
		<nav class="navbar-femart">
			<a href="/" class="header-logo">
				<img src="<?php
							$custom_logo_id = get_theme_mod('custom_logo');
							$image = wp_get_attachment_image_src($custom_logo_id, 'full');
							echo $image[0];
							?>">
			</a>
			<div class="nav-container">
				<button class="burger-menu" id="fa-mobile-menu-button">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
					</svg>

				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'nav navbar-nav',
					'menu_id' => 'fa-navigation'
				));
				?>
			</div>
		</nav>
	</div>
	<div class="hero" style="background-image: url(<?php echo esc_url(header_image()) ?>)">
		<div class="color-overlay-20">
			<div class="container h-full flex flex-col justify-end p-lg">
				<section class="hero-content">
					<p>
						<span>We are a nonprofit committed to</span>
						<span>cultivating a better society with the</span>
						<span>feminine voice through visual art.</span>
					</p>
				</section>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="page-content-container">