<?php
/* Main template file */

if (is_page('home')) {
    get_header();
} else {
    get_header('page');
}

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main <?php if (have_posts()) {
                                            echo 'blog-posts';
                                        } else {
                                            echo 'entry-content';
                                        }; ?>">

        <?php
        // This is a PHP shorthand
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/post/content', get_post_format()); // Add files in the theme
            // Do our custom things
            endwhile;
            echo paginate_links([
                'prev_text' => esc_html__('Prev', 'femart'),
                'next_text' => esc_html__('Next', 'femart'),
            ]);
        else :
            get_template_part('template-parts/page/content', 'none');
        endif;
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>