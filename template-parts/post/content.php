<?php
/* Template part for displaying posts */
?>

<article id="post-<?php the_ID(); ?>" class="<?php if (is_singular()) {
                                                    echo 'entry-content blog-single';
                                                } else {
                                                    echo 'blog-post';
                                                } ?>">
    <header class="blog-post-preview-header">
        <!-- Post Thumbnail -->
        <?php if (!is_singular()) : ?>
            <div class="blog-post-preview-thumbnail <?php
                                                    if (!has_post_thumbnail()) :
                                                        echo 'hidden';
                                                    endif;
                                                    ?>" <?php
                                                        if (has_post_thumbnail()) :
                                                            echo 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"'; // full, large, medium, custom size
                                                        endif;
                                                        ?>>
            </div>
        <?php endif; ?>
        <?php if (is_singular()) {
            the_title('<h2 class="fa-header-bottom-divider">', '</h2>');
        } else {
            the_title('<h2>', '</h2>');
        } ?>
    </header>

    <!-- Post Content -->
    <?php if (is_home() || is_archive()) : ?>
        <div class="<?php if (!is_singular()) {
                        echo 'blog-post-preview';
                    }; ?>">
            <?php the_excerpt(); ?>
            <?php if (!is_singular()) {
                $post_link = esc_url(get_permalink());
                echo '<a class="blog-post-preview-link" href="' . $post_link . '">Read More →</a>';
            } ?>
        </div>
    <?php elseif (is_single()) : ?>
        <div class="blog-post-preview">
            <?php
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ninestars'),
                'after' => '</div>'
            ));
            ?>
        </div>
    <?php endif; ?>
</article>