<footer id="footer" class="site-footer">
    <div class="footer-widgets">
        <?php dynamic_sidebar('footer-widgets'); // Replace 'footer-widgets' with your widget area name. 
        ?>
    </div>
    <div class="site-info">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>