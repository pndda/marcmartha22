<?php
    // Fields
    $image = get_field('image_image');
    $caption = get_field('image_caption');

    // Options
    $spacer_top = (get_field('image_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('image_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
?>

<section class="block b-image <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <figure>
            <?= wp_get_attachment_image($image, 'large', false, array("title" => get_the_title($image), 'class' => 'img-fluid')); ?>

            <?php if ($caption != ''): ?>
                <figcaption class="pt-2"><?= $caption; ?></figcaption>
            <?php endif; ?>
        </figure>
    </div>
</section>
