<?php

$title = get_field('tabs-title');
$subtitle = get_field('tabs-subtitle');
$text = get_field('tabs-text');
$background = get_field('tabs-background');

$tabs = get_field('tabs');

?>

<div class="testing-container">
    <div class="container">
        <h3><?= $subtitle ?></h3>
        <h2><?= $title ?></h2>
        <?= $text ?>
    </div>
</div>

<div class="testing_tabs-container container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <nav class="nav nav-tabs testing-navs col p-0">
                    <?php foreach ($tabs as $index => $tab) : $slug = sanitize_title($tab['title']) ?>
                        <a class="nav-item nav-link col-3 <?= $index === 0 ? 'active' : '' ?>" id="nav-<?= $slug ?>-tab" data-toggle="tab" href="#nav-<?= $slug ?>" role="tab" aria-controls="nav-<?= $slug ?>" aria-selected="true"><?= $tab['title'] ?></a>
                    <?php endforeach ?>
                </nav>
            </div>
        </div>
    </div>

    <div class="testing-tabs row" data-slick='{"slidesToShow": 1, "arrows": false, "dots": false}'>
        <?php foreach ($tabs as $index => $tab) : $slug = sanitize_title($tab['title']) ?>
            <div class="col-12 testing-tab" style="background-image: url('<?= wp_get_attachment_url($tab['background']) ?>')">
                <div class="row">
                    <div class="col-3 d-none d-lg-block"></div>

                    <div class="col-lg-3 tab-title"><?= $tab['text'] ?></div>

                    <div class="col-lg-3 tab-text"><?= $tab['list'] ?></div>

                    <div class="col-3 d-none d-lg-block"></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
