<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <?php
        if ('post' === get_post_type()) :
            // Display tags and categories for search results.
            the_tags('<div class="tags-links">' . esc_html__('Tags: ', 'your-theme-textdomain'), ', ', '</div>');
            echo '<div class="category-links">' . esc_html__('Category: ', 'your-theme-textdomain') . get_the_category_list(', ') . '</div>';
        endif;
        ?>
    </footer>
</article>
