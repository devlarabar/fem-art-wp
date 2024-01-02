<?php
/* Template to display empty content / no content */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'femart'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* Link to WP admin new post page */
                    __('Ready to publish your first post? <a href=""%1$s">Get started here</a>.', 'femart'),
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

            <p><?php esc_html_e('It seems we cannot find what you are looking for.'); ?>
            <?php get_search_form();

        endif;
            ?>
    </div>
</section>