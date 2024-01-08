<?php
function inspiria_footer_widgets() {
    // Widget Area 1
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'inspiria'),
        'id'            => 'footer-widget-1',
        'description'   => __('First widget area in the footer.', 'inspiria'),
        'before_widget' => '<div class="single-footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="footer_title">',
        'after_title'   => '</h6>',
    ));

    // Widget Area 2
    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'inspiria'),
        'id'            => 'footer-widget-2',
        'description'   => __('Second widget area in the footer.', 'inspiria'),
        'before_widget' => '<div class="single-footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="footer_title">',
        'after_title'   => '</h6>',
    ));

    // Widget Area 3
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'inspiria'),
        'id'            => 'footer-widget-3',
        'description'   => __('Third widget area in the footer.', 'inspiria'),
        'before_widget' => '<div class="single-footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="footer_title">',
        'after_title'   => '</h6>',
    ));

    // Widget Area 4
    register_sidebar(array(
        'name'          => __('Footer Widget 4', 'inspiria'),
        'id'            => 'footer-widget-4',
        'description'   => __('Fourth widget area in the footer.', 'inspiria'),
        'before_widget' => '<div class="single-footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="footer_title">',
        'after_title'   => '</h6>',
    ));
}

add_action('widgets_init', 'inspiria_footer_widgets');
