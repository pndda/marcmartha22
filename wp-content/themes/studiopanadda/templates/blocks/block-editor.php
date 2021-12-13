<?php
    // Fields
    $title = get_field('editor_title');
    $text = get_field('editor_text');

    // Options
    $spacer_top = (get_field('editor_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('editor_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
    $text_align = 'text-' . get_field('editor_align');
    $boxed = get_field('editor_boxed');
?>

<section class="block b-editor <?= $text_align; ?> <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <div class="<?php if ($boxed): ?>border border-primary p-4 p-lg-6 <?php endif; ?> <?= $text_align; ?>">
            <?php if ($title): ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>

            <?php if ($text): ?>
                <?= $text; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
