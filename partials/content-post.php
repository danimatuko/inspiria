<!--================Blog Area =================-->
<section class="blog_area p_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="position-relative text-center pb-5">Recent Posts</h1>

                <div class="blog_left_sidebar">
                    <div class="row">
                        <?php
                        // Query to get the latest 6 posts
                        $latest_posts_query = new WP_Query(array(
                            'posts_per_page' => 3,
                            'ignore_sticky_posts' => 1,
                        ));

                        // Start the custom loop
                        if ($latest_posts_query->have_posts()) :
                            $post_counter = 0;
                            while ($latest_posts_query->have_posts()) :
                                $latest_posts_query->the_post();
                        ?>
                                <div class="col-lg-<?php echo ($post_counter === 0) ? '12' : '6'; ?> my-5">
                                    <?php get_template_part('partials/blog'); ?>
                                </div>
                        <?php
                                $post_counter++;
                            endwhile;
                            // Restore original post data
                            wp_reset_postdata();
                        else :
                            echo 'No posts found';
                        endif;
                        ?>
                    </div><!-- .row -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <!-- Sidebar content goes here -->
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</section>