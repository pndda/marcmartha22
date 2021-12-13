<?php
    // Fields
    $image = get_field('hero_image');
    $title = get_field('hero_title');
    $text = get_field('hero_text');
    $cta = get_field('hero_cta');
    $cta_type = get_field('hero_cta_type');

    // Options
    $spacer_top = (get_field('hero_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('hero_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
    $text_align = 'text-' . get_field('hero_align');
?>

<section class="block b-hero <?= $text_align; ?> <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="b-hero__img" style="background-image: url(<?= wp_get_attachment_image_url($image, 'hero'); ?>)"></div>
    <div class="b-hero__content py-4 py-md-0">
        <div class="container">
            <?php if ($title): ?>
                <h1 class="b-hero__title"><?= $title; ?></h1>
            <?php endif; ?>

            <?php if ($text): ?>
                <?= $text; ?>
            <?php endif; ?>

            <?php if ($cta): ?>
                <a href="<?= $cta['url']; ?>" class="btn btn-<?= $cta_type; ?>" target="<?= $cta['target']; ?>">
                    <?= $cta['title']; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
