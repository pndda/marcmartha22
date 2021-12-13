<?php
    // Fields
    $title = get_field('imagetext_title');
    $text = get_field('imagetext_text');
    $cta = get_field('imagetext_cta');
    $cta_type = get_field('imagetext_cta_type');
    $image = get_field('imagetext_image');

    // Options
    $spacer_top = (get_field('imagetext_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('imagetext_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
    $image_align = get_field('imagetext_align');
?>

<section class="block b-image-text <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 <?php if($image_align == 'right'): ?>order-md-last<?php endif; ?>">
                <figure>
                    <?php if($cta): ?>
                        <a href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>">
                    <?php endif; ?>
                    <?= wp_get_attachment_image($image, 'medium', false, array("title" => get_the_title($image), 'class' => 'img-fluid')); ?>
                    <?php if($cta): ?>
                        </a>
                    <?php endif; ?>
                </figure>
            </div>
            <div class="col-md-7 <?php if($image_align == 'right'): ?>order-md-first<?php endif; ?>">
                <?php if($title): ?>
                    <h3><?= $title; ?></h3>
                <?php endif; ?>

                <?php if($text): ?>
                    <?= $text; ?>
                <?php endif; ?>

                <?php if($cta): ?>
                    <a href="<?= $cta['url']; ?>" class="btn btn-<?= $cta_type; ?>" target="<?= $cta['target']; ?>">
                        <?= $cta['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
