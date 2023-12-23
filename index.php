<?php

/**
 * The main template file.
 *
 * @package Starter
 */

get_header(); // Include header.php
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                // Include the template part for displaying content
                get_template_part('template-parts/content', get_post_type());

            endwhile;

            // Pagination
            the_posts_pagination();

        else :
            // If no content, include the "No posts found" template
            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php

// Include sidebar.php
//get_sidebar(); 

get_footer();