<?php
    // Fields
    $title = get_field('flex_title');
    $repeater = get_field('flex_repeater');

    // Options
    $spacer_top = (get_field('flex_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('flex_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
    $columns = get_field('flex_column_number');
?>

<section class="block b-flex <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <?php if ($title): ?>
            <h2><?= $title; ?></h2>
        <?php endif; ?>

        <div class="row mt-2 mt-md-3 mt-lg-4">
            <?php foreach($repeater as $column): ?>
                <?php if ($columns == '2'): $colClass = 'col-sm-12 col-md-6 mb-4'; endif; ?>
                <?php if ($columns == '3'): $colClass = 'col-sm-12 col-md-4 mb-4'; endif; ?>
                <?php if ($columns == '4'): $colClass = 'col-sm-12 col-md-6 col-lg-3 mb-4'; endif; ?>

	            <div class="<?= $colClass; ?>">
                    <?php if ($column['link']): ?>
                        <a href="<?= $column['link']['url']; ?>" target="<?= $column['link']['target']; ?>">
                    <?php endif; ?>
                        <?= wp_get_attachment_image($column['image'], 'medium', false, array("title" => get_the_title($column['image']), 'class' => 'img-fluid mb-4')); ?>
                    <?php if ($column['link']): ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($column['title']): ?>
                        <h4><?= $column['title']; ?></h4>
                    <?php endif; ?>

                    <?php if ($column['text']): ?>
                        <p><?= $column['text']; ?></p>
                    <?php endif; ?>

                    <?php if ($column['link']): ?>
                        <a href="<?= $column['link']['url']; ?>" class="btn btn-<?= $column['cta_type']; ?>" target="<?= $column['link']['target']; ?>">
                            <?= $column['link']['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
