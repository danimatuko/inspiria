<?php

/**
 * Custom widget for subscription form.
 */
class SubscribeWidget extends WP_Widget
{

    /**
     * Widget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'inspiria_subscribe', // Widget ID
            'Inspiria Subscribe', // Widget name
            array('description' => 'A widget for subscription form') // Widget description
        );
    }


    /**
     * Outputs the content of the widget.
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from the database.
     */
    public function widget($args, $instance)
    {
        $this->instance = $instance; // Set the instance property
        echo $args['before_widget'];
        echo $this->get_subscribe_form();
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin.
     *
     * @param array $instance The widget options.
     */
    public function form($instance)
    {
        // Output the email field in the widget form
        $email = !empty($instance['email']) ? esc_attr($instance['email']) : '';
        $placeholder = !empty($instance['placeholder']) ? esc_attr($instance['placeholder']) : '';
?>


        <div>
            <label for="<?php echo esc_attr($this->get_field_id('placeholder')); ?>"><?php _e('Placeholder:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder')); ?>" name="<?php echo esc_attr($this->get_field_name('placeholder')); ?>" type="text" value="<?php echo esc_attr($placeholder); ?>" />
        </div>

    <?php
    }
    /**
     * Updates the widget settings.
     *
     * @param array $new_instance New settings for this instance as input.
     * @param array $old_instance Old settings for this instance.
     * @return array Updated instance settings.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['email'] = !empty($new_instance['email']) ? sanitize_email($new_instance['email']) : '';
        $instance['placeholder'] = !empty($new_instance['placeholder']) ? sanitize_text_field($new_instance['placeholder']) : '';

        return $instance;
    }


    /**
     * Helper function to generate the subscribe form markup.
     */
    private function get_subscribe_form()
    {
        $email = !empty($this->instance['email']) ? esc_attr($this->instance['email']) : '';
        $placeholder = !empty($this->instance['placeholder']) ? esc_attr($this->instance['placeholder']) : '';
    ?>
        <form target="_blank" action="/" method="get" class="subscribe_form relative" novalidate="true">
            <div class="input-group d-flex flex-row">
                <input name="email" placeholder="<?php echo $placeholder; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php echo $placeholder; ?> '" required="true" type="email" value="<?php echo $email; ?>">
                <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
            </div>
            <div class="mt-10 info"></div>
        </form>
<?php
    }
}

/**
 * Register the widget.
 */
function register_subscribe_widget()
{
    register_widget('SubscribeWidget');
}
add_action('widgets_init', 'register_subscribe_widget');
?>