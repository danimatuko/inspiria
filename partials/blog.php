    <article class="blog_style1 small">
        <div class="blog_img">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
        </div>
        <div class="blog_text">
            <div class="blog_text_inner">
                <div class="cat">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<a class="cat_btn" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                    }
                    ?>
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('F j, Y'); ?></a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                        <?php comments_number('0', '1', '%'); ?></a>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <h4><?php the_title(); ?></h4>
                </a>
                <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                <a class="blog_btn" href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </div>
    </article>


    <style>
        .cat .cat_btn {
            width: fit-content !important;
        }
    </style>