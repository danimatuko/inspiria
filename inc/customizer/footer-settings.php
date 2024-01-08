<?php

function inspiria_customize_footer($wp_customize) {
    // Add a section for footer settings
    $wp_customize->add_section('footer_settings', array(
        'title'    => __('Footer Settings', 'inspiria'),
    ));

    // Setting to control the number of footer columns
    $wp_customize->add_setting('footer_column_count', array(
        'default'            => 4,
        'transport'          => 'postMessage',
        'sanitize_callback'  => 'absint', // Ensure the value is an integer.
    ));

    // Control for the number of footer columns
    $wp_customize->add_control('footer_column_count', array(
        'label'       => __('Number of Footer Columns', 'inspiria'),
        'section'     => 'footer_settings',
        'type'        => 'select',
        'choices'     => array(
            '1' => __('One Column', 'inspiria'),
            '2' => __('Two Columns', 'inspiria'),
            '3' => __('Three Columns', 'inspiria'),
            '4' => __('Four Columns', 'inspiria'),
        ),
        'description' => __('Controls how many columns the footer should have'),
    ));

    // Add selective refresh for the footer widgets area
    $wp_customize->selective_refresh->add_partial('footer_column_count', array(
        'selector'            => '.footer-widgets-area',
        'container_inclusive' => false,
        'render_callback'     => 'inspiria_render_footer_widgets',
    ));

    // Setting to control the footer text/copyright section
    $wp_customize->add_setting('footer_text', array(
        'default'           => '',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'custom_sanitize_footer_text',
    ));

    // Control for the footer text/copyright section
    $wp_customize->add_control('footer_text', array(
        'label'       => __('Footer Text', 'inspiria'),
        'section'     => 'footer_settings',
        'type'        => 'textarea',
        'description' => __('Enter the footer text for the copyright section'),
    ));

    // Add selective refresh for the footer copyright section
    $wp_customize->selective_refresh->add_partial('footer_text', array(
        'selector'            => '.footer-copyright',
        'container_inclusive' => false,
        'render_callback'     => 'inspiria_render_footer_copyright',
    ));
}

// Hook the customize register function
add_action('customize_register', 'inspiria_customize_footer');

// Custom render callback for the footer widgets area
function inspiria_render_footer_widgets() {
    get_template_part('partials/footer', 'widgets-area');
}

// Custom render callback for the footer copyright section
function inspiria_render_footer_copyright() {
    get_template_part('partials/footer', 'copyright');
}


function custom_sanitize_footer_text($input) {
    // Define the allowed HTML tags and attributes
    $allowed_tags = array(
        'a'    => true,
        'i'    => true,
        'p'    => true,
        'span' => true
    );

    // Use wp_kses to allow only the specified tags and attributes
    $output = wp_kses($input, $allowed_tags);

    return $output;
}
