<!doctype html>
<html class="no-js" lang="<?php bloginfo('language'); ?>">

<head>
    <?php if (!defined('WPSEO_VERSION')): ?>
        <title><?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'external_ip': '<?= do_shortcode("[show_ip]"); ?>'
        });
    </script>


    <?php wp_head(); ?>

</head>
<body <?php body_class('studiopanadda-theme'); ?>>

<?php if (get_field('gtm_tag', 'options')): ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=<?= get_field('gtm_tag', 'options'); ?>" height="0"
                width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
<?php get_template_part('templates/core/sidebar'); ?>

<?php get_template_part('templates/core/header'); ?>
<main role="main">
    <?php include studiopanadda_template_path(); ?>
</main>

<?php get_template_part('templates/core/footer'); ?>

<?php get_template_part('templates/includes/cookiebanner'); ?>

<?php wp_footer(); ?>

<div class="hidden" hidden>
    <?php include_once('dist/sprite/sprite.svg'); ?>
</div>

<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
<script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>	
</script>
<script>
    gsap.registerPlugin(ScrollTrigger);
</script>
</body>
</html>
