<?php
    // Fields
    $title = get_field('slider_title');
    $images = get_field('slider_slider');

    // Options
    $spacer_top = (get_field('slider_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('slider_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
?>

<section class="block b-slider <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <?php if ($title): ?>
            <h3><?= $title; ?></h3>
        <?php endif; ?>

        <div class="b-slider-wrap mb-2">
            <?php foreach ($images as $image): ?>
                <div class="c-slide">
                    <?= wp_get_attachment_image($image, 'large', false, array('class' => 'img-fluid')); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
