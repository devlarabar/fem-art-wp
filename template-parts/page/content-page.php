<?php
/* Template part to display page content */
?>

<article id="post-<?php the_ID(); ?>">

    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'ninestars'),
            'after' => '</div>'
        ));
        ?>
    </div>

    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer" hidden>
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* Translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'ninestars'),
                        array('span' => array(
                            'class' => array(),
                        ))
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer>
    <?php endif; ?>
</article>