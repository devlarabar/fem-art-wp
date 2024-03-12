<?php
/* Template to display empty content / no content */
?>

<section class="no-results not-found">
    <header class="page-header">
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

        elseif (is_search()) :
        ?>

            <p>
                <?php esc_html_e('Sorry, but nothing matched your search.'); ?>
            <?php get_search_form();

        else :
            ?>

            <p><?php esc_html_e('It seems we cannot find what you are looking for. Use the form below to search the site, or the navigation above.'); ?>
            <?php get_search_form();

        endif;
            ?>
    </div>
</section>