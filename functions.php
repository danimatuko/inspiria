<?php

/**
 * Class Inspiria
 *
 * This class handles the setup and functionality of the theme.
 */
class Inspiria {
    /**
     * Constructor method to initialize theme setup
     */
    public function __construct() {
        $this->setup_actions();
        $this->setup_filters();
    }

    /**
     * Setup actions
     */
    private function setup_actions() {
        add_action('after_setup_theme', array($this, 'theme_setup'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('widgets_init', array($this, 'register_widget_areas'));
    }



    /**
     * Include files
     *
     * Include additional files as needed.
     */
    public static function include_files() {
        require get_template_directory() . '/inc/custom_comments_template.php';
        require get_template_directory() . '/inc/filters/inspiria_comment_form.php';
    }


    /**
     * Setup filters
     */
    private function setup_filters() {
        // Add any filters here if needed
        add_filter('comment_form_defaults', 'inspiria_comment_form');
    }

    /**
     * Theme setup
     *
     * Add support for title tags and post thumbnails, and register navigation menus.
     */
    public function theme_setup() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('comments');

        // Add custom image sizes
        add_image_size('small', 60, 60, true);

        register_nav_menus(array(
            'primary-menu' => esc_html__('Primary Menu', 'Inspiria'),
            // Add more menu locations as needed
        ));
    }

    /**
     * Enqueue styles
     *
     * Enqueue the theme's stylesheets.
     */
    public function enqueue_styles() {
        wp_enqueue_style('my-theme-style', get_stylesheet_uri());
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', [], '4.1.3');
        wp_enqueue_style('linearicons', 'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css', array(), null, 'all');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css', [], '4.5.0');
        wp_enqueue_style('swiper-style', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.css', [], '11.0.5');
        wp_enqueue_style('responsive', get_template_directory_uri() . '/dist/responsive.min.css');
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/dist/main.min.css', array(), '1.0');
    }

    /**
     * Enqueue scripts
     *
     * Enqueue JavaScript files as needed.
     */
    public function enqueue_scripts() {
        // Enqueue jQuery from the WordPress core
        // wp_enqueue_script('jquery');
        wp_enqueue_script('swiper-script', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.js');

        // wp_enqueue_script('owl-carousel-script', get_template_directory_uri() . '/node_modules/owl.carousel/src/js/owl.carousel.js');
        wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/main.min.js', array('jquery'), '1.0', true);
    }

    /**
     * Register widget areas
     *
     * Register the sidebar widget area.
     */
    public function register_widget_areas() {
        register_sidebar(array(
            'name' => esc_html__('Sidebar Widget Area', 'your-theme-textdomain'),
            'id' => 'sidebar-widget-area',
            'description' => esc_html__('Add widgets here to appear in the sidebar.', 'Inspiria'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }
}

// Instantiate the Inspiria class
new Inspiria();
Inspiria::include_files();
