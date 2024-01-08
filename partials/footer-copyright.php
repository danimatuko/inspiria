<div class="row footer-bottom d-flex justify-content-between align-items-center">
    <?php
    $footer_text = get_theme_mod('footer_text', '');

    if (true) : ?>
        <p class="col-lg-12 footer-text text-center footer-copyright">
            <?= wp_kses_post($footer_text); ?>
        </p>
    <?php endif; ?>
</div>