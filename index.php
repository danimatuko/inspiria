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
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <?php get_template_part('partials/blog', 'featured') ?>
                            <div class="row">
                                <?php get_template_part('partials/blog') ?>
                                <?php get_template_part('partials/blog') ?>
                                <?php get_template_part('partials/blog') ?>
                                <?php get_template_part('partials/blog') ?>
                            </div>

                            <?php get_template_part('partials/blog', 'featured') ?>


                            <div class="row">
                                <?php get_template_part('partials/blog') ?>
                                <?php get_template_part('partials/blog') ?>

                            </div>
                            <div class="row">
                                <?php get_template_part('partials/blog') ?>
                                <?php get_template_part('partials/blog') ?>

                            </div>
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-left"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                                    <li class="page-item"><a href="#" class="page-link">09</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-right"></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php
                        // Include sidebar.php
                        get_sidebar();
                        ?>

                    </div>
                </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php



get_footer();
