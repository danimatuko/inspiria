<section class="mb-5">

    <div class="row">
        <h2 class="text-center mx-auto">Most Comments</h2>

        <?php
        // Query to get posts with most comments
        $popular_posts_query = new WP_Query(array(
            'posts_per_page' => 3,
            'orderby' => 'comment_count', // Order by the number of comments
            'ignore_sticky_posts' => 1,
        ));

        // Start the custom loop
        if ($popular_posts_query->have_posts()) :
            $post_counter = 0;
            while ($popular_posts_query->have_posts()) :
                $popular_posts_query->the_post();
        ?>
                <div class="col-lg-<?php echo ($post_counter === 0) ? '12' : '6'; ?> py-5">
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
</section>