<?php
get_header(); // Include header.php
?>

<div id="content" class="site-content">
    <div class="container">
        <main id="main" class="site-main">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
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
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>
                        </footer>
                    </article>

                <?php
                endwhile;
            else :
                ?>
                <p><?php _e('Sorry, no posts were found.', 'your-theme-textdomain'); ?></p>
            <?php
            endif;
            ?>
        </main>

        <?php get_sidebar(); // Include sidebar.php 
        ?>
    </div>
</div>

<?php
get_footer(); // Include footer.php
