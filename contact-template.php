<?php
/*
Template Name: Contact Page
*/

get_header();
get_header("inner");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verify nonce
    if (isset($_POST['custom_contact_form_nonce']) && wp_verify_nonce($_POST['custom_contact_form_nonce'], 'custom_contact_form_nonce')) {
        // Process and sanitize form data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        // Email processing logic
        $to = 'sendto@example.com';
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        $message_body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

        // Send the email
        $email_sent = wp_mail($to, $subject, $message_body, $headers);

        if ($email_sent) {
            echo '<p class="success-message">Message sent successfully!</p>';
        } else {
            echo '<p class="error-message">Failed to send email. Please try again later.</p>';
        }
    } else {
        // Nonce verification failed
        echo '<p class="error-message">Security check failed. Please try again.</p>';
    }
}
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>California, United States</h6>
                            <p>Santa monica bullevard</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">00 (440) 9865 562</a></h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">support@colorlib.com</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                        method="post" id="contactForm" novalidate="novalidate">
                        <form class="row contact_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                            method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="4"
                                        placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                            <input type="hidden" name="action" value="custom_contact_form">
                            <?php wp_nonce_field('custom_contact_form_nonce', 'custom_contact_form_nonce'); ?>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();