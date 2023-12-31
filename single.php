<?php

/**
 * The main template file.
 *
 * This file serves as the main entry point for rendering the website's content.
 * It includes the header, slider, recent posts, most commented posts, sidebar, and footer.
 *
 * @package Inspiria
 */

// Include headers
get_header();
get_header('inner');
?>

<section class="blog_area p_120 single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                // Loop through the posts
                if (have_posts()) :
                    while (have_posts()) : the_post();
                ?>
                        <div <?php post_class("main_blog_details"); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <!-- Display post thumbnail if available -->
                                <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="">
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>">
                                <h4><?php the_title(); ?></h4>
                            </a>
                            <div class="user_details">
                                <div class="float-left">
                                    <?php
                                    // Display post categories
                                    $categories = get_the_category();
                                    foreach ($categories as $category) {
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                    }
                                    ?>
                                </div>
                                <div class="float-right">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5><?php the_author(); ?></h5>
                                            <p><?php the_date(); ?></p>
                                        </div>
                                        <div class="d-flex">
                                            <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php the_content(); ?>
                            <div class="news_d_footer">
                                <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
                                <a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a>
                                <div class="news_socail ml-auto">
                                    <!-- Social media icons -->
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>

                <div class="navigation-area">
                    <div class="row">
                        <?php
                        // Display previous post if available
                        $prev_post = get_adjacent_post(false, '', true);
                        if ($prev_post) :
                        ?>
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <!-- Display previous post thumbnail or a default image -->
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                        <?php
                                        $prev_thumbnail_url = get_the_post_thumbnail_url($prev_post->ID, 'small');
                                        if ($prev_thumbnail_url) {
                                            echo '<img class="img-fluid" src="' . esc_url($prev_thumbnail_url) . '" alt="">';
                                        } else {
                                            echo '<img class="img-fluid" src="' . get_template_directory_uri() . '/src/img/blog/prev.jpg" alt="">';
                                        }
                                        ?>
                                    </a>
                                </div>

                                <div class="arrow">
                                    <!-- Link to the previous post -->
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <!-- Link and title of the previous post -->
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                                        <h4><?php echo esc_html(get_the_title($prev_post->ID)); ?></h4>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        // Display next post if available
                        $next_post = get_adjacent_post(false, '', false);
                        if ($next_post) :
                        ?>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <!-- Link and title of the next post -->
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                                        <h4><?php echo esc_html(get_the_title($next_post->ID)); ?></h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <!-- Link to the next post -->
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                <div class="thumb">
                                    <!-- Display next post thumbnail or a default image -->
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                                        <?php
                                        if (has_post_thumbnail($next_post->ID)) {
                                            echo get_the_post_thumbnail($next_post->ID, 'small', array('class' => 'img-fluid'));
                                        } else {
                                            echo '<img class="img-fluid" src="' . get_template_directory_uri() . '/src/img/blog/next.jpg" alt="">';
                                        }
                                        ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                    // Check if comments are open or if there are comments
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>

            <div class="col-lg-4">
                <?php get_sidebar(); // Include sidebar 
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer(); // Include footer.php
?>