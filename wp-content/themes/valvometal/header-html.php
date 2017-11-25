<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right') ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php

    $faviconUrl = WP_THEME_URI . '/img/favicon/';
    $genericIcons = [16, 32, 57, 76, 96, 128, 228];
    $androidIcons = [36, 48, 72, 96, 144, 192, 196];
    $iosIcons = [57, 60, 72, 76, 114, 120, 144, 152, 180];

    ?>

    <!-- generics -->
    <?php foreach ($genericIcons as $genericIcon) : ?>
        <link rel="icon" href="<?= $faviconUrl ?>favicon-<?= $genericIcon ?>x<?= $genericIcon ?>.png" sizes="<?= $genericIcon ?>x<?= $genericIcon ?>">
    <?php endforeach ?>

    <!-- Android -->
    <?php foreach ($androidIcons as $androidIcon) : ?>
        <link rel="shortcut icon" href="<?= $faviconUrl ?>android-icon-<?= $androidIcon ?>x<?= $androidIcon ?>.png" sizes="<?= $androidIcon ?>x<?= $androidIcon ?>">
    <?php endforeach ?>

    <!-- iOS -->
    <link rel="apple-touch-icon-precomposed" href="<?= $faviconUrl ?>apple-icon-precomposed.png">
    <?php foreach ($iosIcons as $iosIcon) : ?>
        <link rel="apple-touch-icon" href="<?= $faviconUrl ?>apple-icon-<?= $iosIcon ?>x<?= $iosIcon ?>.png" sizes="<?= $iosIcon ?>x<?= $iosIcon ?>">
    <?php endforeach ?>

    <!-- Windows 8 IE 10 -->
    <meta name="msapplication-TileColor" content="#3671BD">
    <meta name="msapplication-TileImage" content="<?= $faviconUrl ?>ms-icon-144x144.png">

    <!-- Windows 8.1 IE11 and above -->
    <meta name="application-name" content="<?php bloginfo('name'); ?>">
    <meta name="msapplication-tooltip" content="<?php bloginfo('description'); ?>">
    <meta name="msapplication-config" content="<?= $faviconUrl ?>browserconfig.xml" />

    <script>
      var baseUrl = '<?= WP_THEME_URI ?>';
    </script>

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if (function_exists('the_field')) : ?>
        <link rel="shortcut icon" href="<?php the_field('favicon', 'option') ?>" />
    <?php endif ?>

    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->