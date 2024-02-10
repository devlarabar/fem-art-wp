<?php

if (!function_exists('femart_setup')) {
    /*
    Sets up theme defaults and registers support for various WordPress features.
	
    Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. 
    
    The init hook is too late for some features, such as indicating support for post thumbnails.
    */
    function femart_setup()
    {
        /*
        Make theme available for translation.
        
        Translations can be filed in the /languages/ directory.
        
        If you're building a theme based on Crafty Press, use a find and replace to change 'femart' to the name of your theme in all the template files.
		*/
        load_theme_textdomain('femart', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        Let WordPress manage the document title.
        
        By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
        */
        add_theme_support('title-tag');

        /*
        Enable support for Post Thumbnails on posts and pages.
        
        @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'femart_custom_background_args',
                array(
                    'default-color' => '2C2F38',
                    'default-image' => '',
                )
            )
        );

        /*
        Switch default core markup for search form, comment form, and comments to output valid HTML5.
        */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        // Add Support for Custom Page Header
        add_theme_support('custom-header', array(
            'flex-width'    => true,
            'width'         => 1600,
            'flex-height'   => true,
            'height'        => 450,
            'default-image' => '',
        ));

        // Add Post Type Support
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'femart'),
            'footer' => esc_html__('Footer Menu', 'femart'),
            'header_action' => esc_html__('Header Action', 'femart'),
        ));

        //add_filter('show_admin_bar', '__return_false');
    };
};

add_action('after_setup_theme', 'femart_setup');

/*
Set the content width in pixels, based on the theme's design and stylesheet.
Priority 0 to make it available to lower priority callbacks.
@global int $content_width
*/
function femart_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('femart_content_width', 1170);
}
add_action('after_setup_theme', 'femart_content_width', 0);

/*
 Register Sidebar widget area.
@since 1.0.0
*/
function femart_sidebar_widgets_init()
{
    // Default Sidebar
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'femart'),
        'id'            => 'default-sidebar',
        'description'   => esc_html__('Add widgets here.', 'femart'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    // Register Footer Widget
    register_sidebar(array(
        'name' => 'Footer Area 1',
        'id' => 'footer-1',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer-3',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'femart_sidebar_widgets_init');

/*
Enqueue public scripts and styles
*/
function femart_public_scripts()
{
    // Styles
    // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], wp_rand(), 'all');
    wp_enqueue_style('variables', get_template_directory_uri() . '/assets/css/variables.css', [], wp_rand(), 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], wp_rand(), 'all');
    wp_enqueue_style('utility', get_template_directory_uri() . '/assets/css/utility.css', [], wp_rand(), 'all');

    // Scripts
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], wp_rand(), true);
}
add_action('wp_enqueue_scripts', 'femart_public_scripts');

/*
Enqueue admin scripts and styles
*/
function femart_admin_scripts()
{
}
add_action('admin_enqueue_scripts', 'femart_admin_scripts');

/* Media Styles */
add_action('init', 'themeslug_register_block_styles');

function themeslug_register_block_styles()
{
    register_block_style('core/media-text', array(
        'name'         => 'rounded-md',
        'label'        => __('Rounded MD', 'themeslug'),
        'inline_style' => '.wp-block-media-text.is-style-rounded-md img {
			overflow: hidden;
			border-radius: 15px !important;
		}'
    ));
    register_block_style('core/image', array(
        'name'         => 'rounded-md',
        'label'        => __('Rounded MD', 'themeslug'),
        'inline_style' => '.wp-block-image.is-style-rounded-md img {
			overflow: hidden;
			border-radius: 15px !important;
		}'
    ));
}

/* Allow SVG Media Uploads */

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Add support for custom page templates
function custom_theme_support()
{
    add_theme_support('custom-page-templates', array(
        'page-templates/template-artist.php' => 'Artists Page',
        // Add additional template files here if needed
    ));
}
add_action('after_setup_theme', 'custom_theme_support');
