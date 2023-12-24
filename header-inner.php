<section class="banner_area">
    <div class="container">
        <div class="row banner_inner">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <div class="banner_content text-center">
                    <h2><?php echo single_post_title(); ?></h2>
                    <div class="page_link">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>

                        <?php
                        // Check if it's a single post or a page
                        if (is_single() || is_page()) {
                            // Get the post/page ancestors
                            $ancestors = get_post_ancestors(get_the_ID());

                            // Output the breadcrumb trail
                            if ($ancestors) {
                                $ancestors = array_reverse($ancestors);
                                foreach ($ancestors as $ancestor) {
                                    echo '<a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a>';
                                }
                            }
                            echo '<span>' . get_the_title() . '</span>';
                        } elseif (is_archive()) {
                            echo '<span>Archive</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>