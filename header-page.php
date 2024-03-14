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
                                if (is_category()) {
                                    $image = esc_url(header_image());
                                } else if (has_post_thumbnail()) {
                                    $image = get_the_post_thumbnail_url(get_queried_object());
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
        <nav class="navbar-femart">
            <a href="/" class="header-logo" aria-label="Return to home page">
                <img src="<?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                            echo $image[0];
                            ?>" alt="Fem Art Gallery Logo">
            </a>
            <div class="nav-container">
                <button class="burger-menu" id="fa-mobile-menu-button" aria-label="Mobile Navigation Menu Toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'menu_class' => 'nav navbar-nav',
                    'menu_id' => 'fa-navigation'
                ));
                ?>
            </div>
        </nav>
    </div>
    <div class="hero hero-page">
        <div class="color-overlay-50 flex justify-center items-center">
            <h1><?php if (is_page()) {
                    echo single_post_title();
                } else if (is_home()) {
                    echo single_post_title();
                } else if (is_category()) {
                    $category = get_queried_object();
                    $category_name = $category->name;
                    echo 'Category: ' . $category_name;
                } else {
                    echo get_bloginfo('name');
                } ?></h1>
        </div>
    </div>
    <div class="container">

        <div class="<?php if (have_posts()) {
                        echo 'page-content-container';
                    } ?>">