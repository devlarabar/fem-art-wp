<?php
/* Contains header */
?>

<!DOCTYPE html>
<html <?php language_attributes(); // lang="en"
		?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

	<?php wp_head(); // Brings in important WP links and scripts, etc 
	?>
</head>

<body <?php body_class(); // WP provides some default body classes 
		?>>

	<div class="container">
		<nav class="navbar-femart flex justify-between items-center">
			<img src="<?php
						$custom_logo_id = get_theme_mod('custom_logo');
						$image = wp_get_attachment_image_src($custom_logo_id, 'full');
						echo $image[0];
						?>" class="header-logo">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'nav navbar-nav'
			));
			?>
		</nav>
	</div>
	<div class="hero" style="background-image: url(<?php echo esc_url(header_image()) ?>)">
		<div class="container h-full flex flex-col justify-end">
			<section class="hero-content">
				<p>
					<span>We are a nonprofit committed to</span>
					<span>cultivating a better society with the</span>
					<span>feminine voice through visual art.</span>
				</p>
			</section>
		</div>
	</div>
	<div class="container">

		<div class="page-content-container">