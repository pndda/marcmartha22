<?php
    // Fields
    $url = get_field('video_url');
    $image = get_field('video_image');

    // Options
    $spacer_top = (get_field('video_spacing_top')) ? 'pt-3 pt-md-4 pt-lg-5' : '';
    $spacer_bottom = (get_field('video_spacing_bottom')) ? 'pb-3 pb-md-4 pb-lg-5' : '';
?>

<section class="block b-video <?= $spacer_top; ?> <?= $spacer_bottom; ?>">
    <div class="container text-center">
        <figure>
            <a class="b-video__play venobox" data-autoplay="true" data-vbtype="video" href="<?= $url; ?>">
                <?= wp_get_attachment_image($image, 'large', false, array("title" => get_the_title($image))); ?>
            </a>
        </figure>
    </div>
</section>
