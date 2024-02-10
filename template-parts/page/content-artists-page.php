<?php
/* Template part to display page content */
?>

<article id="post-<?php the_ID(); ?>">

    <div class="entry-content">
        <?php
        the_content();
        ?>
        <div class="artists-container">
            <?php
            $args = array(
                'post_type' => 'artist',
                'posts_per_page' => 10,
                // Add any additional query parameters as needed
            );
            $custom_query = new WP_Query($args);

            // Start the loop
            if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) : $custom_query->the_post();
                    // Display post content here
                    $artist_name = get_post_meta(get_the_ID(), 'artist_name', true);
                    $artist_link = get_post_meta(get_the_ID(), 'artist_link', true);
                    $artist_image = get_post_meta(get_the_ID(), 'artist_image', true);

                    $artist_image_url = wp_get_attachment_image_src($artist_image)[0];

                    $post_html = '<div class="fa-03-image-container" style="background-image: url(';
                    $post_html .= esc_html($artist_image_url);
                    $post_html .= ')"><div class="artist-info">';
                    if (empty($artist_link)) {
                        $post_html .= esc_html($artist_name) . '</div></div>';
                    } else {
                        $post_html .= '<a href="' . esc_html($artist_link) . '" target="_blank">' . esc_html($artist_name) . '</a></div></div>';
                    }
                    echo $post_html;
                endwhile;
                wp_reset_postdata(); // Reset post data
            else :
            // No posts found
            endif;
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ninestars'),
                'after' => '</div>'
            ));
            ?>
        </div>
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