<?php
    // Fields
    $title = get_field('forms_title');
    $text = get_field('forms_text');
    $form_id = get_field('forms_formID');

    // Options
    $spacer_top = (get_field('forms_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('forms_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
?>

<section class="block b-form <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="bg-white shadow rounded p-4 p-lg-6">
                    <?php if ($title): ?>
                        <h4 class="text-secondary text-uppercase <?= ($text) ? 'mb-3' : ''; ?>">
                            <?= $title; ?>
                        </h4>
                    <?php endif; ?>

                    <?php if ($text): ?>
                        <p class="text-secondary">
                            <?= $text; ?>
                        </p>
                    <?php endif; ?>

                    <?php gravity_form($form_id, false, false, false, false, false, 10); ?>
                </div>
            </div>
        </div>
    </div>
</section>
