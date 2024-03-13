<?php
/* Template for displaying search results */

if (is_page('home')) {
    get_header();
} else {
    get_header('page');
}
?>

<div id="primary" class="search-content-area">
    <main id="main" class="site-main <?php if (have_posts()) echo 'blog-single-container'; ?>">

        <?php if (have_posts()) : ?>
            <section class="search-results">
                <h2 class="fa-header-bottom-divider">Search results for: "<?php echo get_search_query(); ?>"</h2>
                <?php
                // Start the loop
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/page/content', 'search');
                endwhile;

                echo '<div class="pagination">';
                echo paginate_links([
                    'prev_text' => esc_html__('Prev', 'femart'),
                    'next_text' => esc_html__('Next', 'femart'),
                ]);
                echo '</div>';
                ?>
            </section>
            <?php get_sidebar(); ?>

        <?php else : get_template_part('template-parts/page/content', 'none')

        ?>


        <?php endif; ?>
    </main>
</div>

<?php
get_footer();
?>