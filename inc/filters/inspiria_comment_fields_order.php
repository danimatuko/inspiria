<?php

/**
 * Move the comment text field to the bottom.
 *
 * @see https://developer.wordpress.org/reference/hooks/comment_form_fields/
 *
 * @param  array $fields The comment fields.
 * 
 * @return array
 */
function inspiria_comment_fields_order($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;

    return $fields;
}

add_filter('comment_form_fields', 'inspiria_comment_fields_order');