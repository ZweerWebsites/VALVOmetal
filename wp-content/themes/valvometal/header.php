<?php

get_header('html');

$logoId = get_field('logo', 'option');

$logoSrc = wp_get_attachment_image_url($logoId, 'half');
$logoSrcSet = wp_get_attachment_image_srcset($logoId, 'half');
$logoSizes = wp_get_attachment_image_sizes($logoId, 'half');

?>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="<?php get_permalink(get_page_by_path('homepage')) ?>">
        <img src="<?= $logoSrc ?>"
             srcset="<?= $logoSrcSet ?>"
             sizes="<?= $logoSizes ?>">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <?php wp_nav_menu('main-menu') ?>
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
        </div>
    </div>
</nav>