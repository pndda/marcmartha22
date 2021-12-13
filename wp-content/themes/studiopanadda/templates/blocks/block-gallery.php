<?php
    // Fields
    $title = get_field('gallery_title');
    $slides = get_field('gallery_gallery');

    // Options
    $spacer_top = (get_field('gallery_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('gallery_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
?>

<section class="block b-gallery <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <?php if ($title): ?>
            <h3><?= $title; ?></h3>
        <?php endif; ?>

        <div class="row mt-2 mt-lg-4">
            <?php foreach ($slides as $slide): ?>
                <div class="col-md-4 mb-2 mb-lg-4">
                    <a href="<?= $slide['url']; ?>" class="b-gallery__item venobox" data-gall="venobox">
                        <?= wp_get_attachment_image($slide['id'], 'medium', false, array("title" => get_the_title($slide['id']), 'class' => 'img-fluid')); ?>

                        <?php if ($slide['caption'] != ''): ?>
                            <figcaption class="text-dark"><?= $slide['caption']; ?></figcaption>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
