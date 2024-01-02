<?php

/**
 * Display pagination links for blog posts.
 *
 */
?>

<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <?php
        // Get the total number of pages
        $total_pages = $wp_query->max_num_pages;

        // Get the current page
        $current_page = max(1, get_query_var('paged'));
        ?>

        <!-- Previous page link -->
        <li class="page-item">
            <?= get_previous_posts_link('<span aria-hidden="true"><span class="lnr lnr-chevron-left align-middle"></span></span>'); ?>
        </li>

        <!-- Page links -->
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?= ($current_page == $i ? 'active' : ''); ?>">
                <a href="<?= esc_url(get_pagenum_link($i)); ?>" class="page-link"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next page link -->
        <li class="page-item">
            <?= get_next_posts_link('<span aria-hidden="true"><span class="lnr lnr-chevron-right align-middle"></span></span>', $total_pages); ?>
        </li>
    </ul>
</nav>
?>

<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <?php
        // Get the total number of pages
        $total_pages = $wp_query->max_num_pages;

        // Get the current page
        $current_page = max(1, get_query_var('paged'));
        ?>

        <!-- Previous page link -->
        <li class="page-item">
            <?= get_previous_posts_link('<span aria-hidden="true"><span class="lnr lnr-chevron-left align-middle"></span></span>'); ?>
        </li>

        <!-- Page links -->
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?= ($current_page == $i ? 'active' : ''); ?>">
                <a href="<?= esc_url(get_pagenum_link($i)); ?>" class="page-link"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next page link -->
        <li class="page-item">
            <?= get_next_posts_link('<span aria-hidden="true"><span class="lnr lnr-chevron-right align-middle"></span></span>', $total_pages); ?>
        </li>
    </ul>
</nav>