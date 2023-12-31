<?php

/**
 * Custom template for displaying comments.
 *
 * @param WP_Comment $comment The comment object.
 * @param array $args An array of arguments.
 * @param int $depth Depth of the comment.
 */
function custom_comments_template($comment, $args, $depth) { ?>
<div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
        <!-- User Section -->
        <div class="user justify-content-between d-flex">
            <div class="thumb">
                <?php echo get_avatar($comment, 50); ?>
            </div>
            <div class="desc">
                <!-- Comment Author -->
                <h5>
                    <a href="<?php echo esc_url(get_comment_author_url()); ?>">
                        <?php echo esc_html(get_comment_author()); ?>
                    </a>
                </h5>
                <!-- Comment Date -->
                <p class="date">
                    <?php printf(esc_html('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?>
                </p>
                <!-- Comment Text -->
                <p class="comment">
                    <?php echo esc_html(get_comment_text()); ?>
                </p>
            </div>
        </div>
        <!-- Reply Button Section -->
        <div class="reply-btn">
            <?php
                // Display the comment reply link.
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text' => '<span class="btn-reply text-uppercase">Reply</span>',
                            'before' => '<div class="before-reply-link">',
                            'after' => '</div>',
                        )
                    )
                );
                ?>
        </div>
    </div>
</div>
<?php } ?>