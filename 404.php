<?php
/* Template for displaying 404 */

if (is_page('home')) {
    get_header();
} else {
    get_header('page');
}
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title text-center">
                    <?php esc_html_e('Oops! That page cannot be found.', 'femart'); ?>
                </h1>
            </header>

            <div class="page-content">
                <div class="search-form-404-page">
                    <p class="m-0"><?php esc_html_e('Use the form below to search the site, or the navigation above.'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>