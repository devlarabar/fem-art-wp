<?php
/* Single post page template */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/post/content', get_post_format());
        endwhile;

        // If comments enabled, show the comments template
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>