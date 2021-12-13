<?php
    // Fields
    $text = get_field('quote_text');
    $author = get_field('quote_author');

    // Options
    $spacer_top = (get_field('quote_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('quote_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
?>

<section class="block b-quote <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if ($text): ?>
                    <p><?= $text; ?></p>
                <?php endif; ?>
                <?php if ($author): ?>
                    <small class="d-block mt-2"><?= $author; ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
