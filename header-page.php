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

<style>
    .hero-page {
        background-image: url(<?php
                                if (has_post_thumbnail($post->ID)) {
                                    $image = get_the_post_thumbnail_url();
                                } else {
                                    $image = esc_url(header_image());
                                }
                                echo $image;
                                ?>);
        background-size: cover;
        background-position: center;
    }
</style>


<body <?php body_class(); // WP provides some default body classes 
        ?>>

    <div class="container navbar-container">
        <nav class="navbar-femart flex justify-between items-center">
            <a href="/" class="header-logo">
                <img src="<?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                            echo $image[0];
                            ?>">
            </a>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav navbar-nav'
            ));
            ?>
        </nav>
    </div>
    <div class="hero hero-page">
        <div class="color-overlay-50 flex justify-center items-center">
            <h1><?php single_post_title(); ?></h1>
        </div>
    </div>
    <div class="container">

        <div class="page-content-container">