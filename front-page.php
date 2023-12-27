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
get_header('slider');

?>

<section class="blog_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">

                    <?php
                    // Include recent posts section
                    get_template_part('partials/blog', 'recent-posts');

                    // Include most commented posts section
                    get_template_part('partials/blog', 'most-comments');
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