<?php

/**
 * Template Name: Artists Page
 */
?>

<?php

if (is_page('home')) {
    get_header();
} else {
    get_header('page');
}
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/page/content-artists', 'page');

            // If comments enabled, show the comments template
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
        ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
?>