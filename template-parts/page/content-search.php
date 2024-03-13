<?php
/* Template part for displaying search results */
?>

<article id="post=<?php the_ID(); ?>" class="search-result">
    <header class="entry-header">
        <?php the_title('<h2 class="search-title">', '</a>'); ?>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <div class="entry-footer">
        <?php
        printf('<a href="%s">Read More →</a>', esc_url(get_the_permalink()));
        ?>
    </div>
</article>