<?php

/**
 * Customize the comment form.
 * 
 * @see https://developer.wordpress.org/reference/hooks/comment_form_fields/
 *
 * @param array $defaults Default comment form arguments.
 *
 * @return array Modified comment form arguments.
 * 
 */
function inspiria_comment_form($defaults) {
    // Remove the default email and URL fields
    unset($defaults['fields']['email']);
    unset($defaults['fields']['url']);
    unset($defaults['fields']['comment_field']);

    // Add a custom class to the form container
    $defaults['class_container'] = 'comment-form';

    // Customize the form title
    $defaults['title_reply'] = '<h2 class="h4 text-dark">Leave a Reply</h2>';

    // Add custom structure for the subject field
    $defaults['fields']['subject'] = '
        <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Subject\'">
        </div>';

    // Add custom structure for the author and email fields in the desired order
    $defaults['fields']['author'] = '
        <div class="form-group form-inline">
            <div class="form-group col-lg-6 col-md-6 name">
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter Name" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enter Name\'">
            </div>
            <div class="form-group col-lg-6 col-md-6 email">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enter Email Address\'">
            </div>
        </div>';

    // Add custom structure for the comment field
    $defaults['comment_field'] = '
        <div class="form-group">
            <textarea class="form-control mb-10" rows="5" name="dani" placeholder="Message" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Message\'" required=""></textarea>
        </div>';

    // Add custom structure for the comment note before
    $defaults['comment_notes_before'] = '<p class="mb-2">Your email address will not be published.</p>';
    // $defaults['comment_notes_after'] = '';
    $defaults['class_submit'] = 'primary-btn submit_btn mt-3';
    $defaults['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>';

    return $defaults;
}
