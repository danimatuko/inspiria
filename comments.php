<?php
if (have_comments()) :
?>
<div class="comments-area">
    <h2 class="comments-title">
        <?php
            printf(
                esc_html(_nx('One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain')),
                number_format_i18n(get_comments_number())
            );
            ?>
    </h2>

    <ol class="comment-list">
        <?php
            wp_list_comments(array(
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'custom_comments_template', // Custom callback function
            ));
            ?>
    </ol>


</div>
<?php
endif;
?>

<?php
comment_form();