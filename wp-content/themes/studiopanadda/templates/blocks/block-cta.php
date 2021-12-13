<?php
    // Fields
    $title = get_field('cta_title');
    $text = get_field('cta_text');
    $cta = get_field('cta_cta');
    $cta_type = get_field('cta_cta_type');

    // Options
    $spacer_top = (get_field('cta_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('cta_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
    $text_align = 'text-' . get_field('cta_align');
?>

<section class="block b-cta <?= $text_align; ?> <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <div class="bg-light p-4 p-lg-6">
            <?php if ($title): ?>
                <h2><?= $title; ?></h2>
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
