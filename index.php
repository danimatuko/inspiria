<?php

/**
 * The main template file.
 *
 * @package Inspiria
 */

// Include header.php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="blog_area p_120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="blog_left_sidebar">
                            <div class="row">
                                <?php
                                // Check if there are posts
                                if (have_posts()) :
                                    // Start the loop
                                    while (have_posts()) : the_post();
                                ?>
                                <div class="col-lg-4 my-5">
                                    <?php
                                            // Include the blog post content template
                                            get_template_part('partials/blog');
                                            ?>
                                </div>
                                <?php
                                    // End the loop
                                    endwhile;
                                    ?>
                            </div><!-- .row -->

                            <div class="row">
                                <?php get_template_part('partials/pagination'); ?>
                            </div>

                            <?php else : ?>
                            <!-- If no posts found -->
                            <p><?php esc_html_e('No posts found', 'inspiria'); ?></p>
                            <?php endif; ?>
                        </div><!-- .blog_left_sidebar -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </section><!-- .blog_area -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// Include footer.php
get_footer();
?>