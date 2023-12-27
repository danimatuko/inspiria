<article <?php post_class('blog_style1'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="blog_img">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
        </div>
    <?php endif; ?>

    <div class="blog_text <?php echo has_post_thumbnail() ? 'pt-0' : ''; ?>">
        <div class="blog_text_inner">
            <div class="cat">
                <?php
                // Display the category link if the post belongs to a category
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<a class="cat_btn mb-3" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                }
                ?>
                <div class="div">
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('F j, Y'); ?></a>
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                        <?php comments_number('0', '1', '%'); ?>
                    </a>
                </div>
            </div>
            <a href="<?php the_permalink(); ?>">
                <h4><?php the_title(); ?></h4>
            </a>
            <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
            <a class="blog_btn" href="<?php the_permalink(); ?>">Read More</a>
        </div>
    </div>
</article>