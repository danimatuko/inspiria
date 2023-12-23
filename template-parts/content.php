<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>

        <?php if ('post' === get_post_type()) : ?>
        <div class="entry-meta">
            <span class="posted-on">
                <?php
                    printf(
                        esc_html__('Posted on %s', 'your-theme-textdomain'),
                        '<a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_date()) . '</a>'
                    );
                    ?>
            </span>
        </div>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        if (is_single() || is_page()) :
            the_content();
        else :
            the_excerpt();
        endif;
        ?>
    </div>

    <?php
    if (is_single()) :
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme-textdomain'),
            'after'  => '</div>',
        ));
    endif;
    ?>

    <footer class="entry-footer">
        <?php
        if (is_single() && 'post' === get_post_type()) :
            // Display tags and categories for single posts.
            the_tags('<div class="tags-links">' . esc_html__('Tags: ', 'your-theme-textdomain'), ', ', '</div>');
            echo '<div class="category-links">' . esc_html__('Category: ', 'your-theme-textdomain') . get_the_category_list(', ') . '</div>';
        endif;
        ?>
    </footer>
</article>