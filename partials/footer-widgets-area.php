<div class="row justify-content-center footer-widgets-area">
    <?php
    $column_count = get_theme_mod('footer_column_count', 4);

    foreach (range(1, $column_count) as $i) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <?php dynamic_sidebar('footer-widget-' . $i); ?>
        </div>
    <?php endforeach; ?>
</div>