<?php
/* Template for displaying search results */

if (is_page('home')) {
    get_header();
} else {
    get_header('page');
}
?>

<div id="primary" class="search-content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <?php
            // Start the loop
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/page/content', 'search');
            endwhile;

            echo paginate_links([
                'prev_text' => esc_html__('Prev', 'femart'),
                'next_text' => esc_html__('Next', 'femart'),
            ]);

        else :
            get_template_part('template-parts/page/content', 'none')

            ?>

        <?php endif; ?>
    </main>
</div>

<?php
get_footer();
?>