<?php
/* Template to display empty content / no content */
?>

<section class="no-results not-found">
    <header class="page-header content-none-container">
        <h1 class="page-title"><?php esc_html_e("There's nothing here!", 'femart'); ?></h1>
        <p>This page is currently empty. Perhaps you should check back soon?</p>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* Link to WP admin new post page */
                    __('Ready to publish your first post? <a href="/wp-admin/edit.php">Get started here</a>.', 'femart'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        ?>

    </div>


</section>

<?php else : ?>
    <div class="search-form-404-page">
        <p class="m-0"><?php esc_html_e('Use the form below to search the site, or the navigation above.'); ?></p>
    <?php get_search_form();

        endif;
    ?>
    </div>