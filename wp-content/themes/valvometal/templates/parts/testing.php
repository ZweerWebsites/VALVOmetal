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

<div class="testing_tabs-container" style="background-image: url('<?= wp_get_attachment_url($background) ?>')">
    <div class="container">
        <nav class="nav nav-tabs" id="myTab" role="tablist">
            <?php foreach ($tabs as $index => $tab) : $slug = sanitize_title($tab['title']) ?>
                <a class="nav-item nav-link col-3 <?= $index === 0 ? 'active' : '' ?>" id="nav-<?= $slug ?>-tab" data-toggle="tab" href="#nav-<?= $slug ?>" role="tab" aria-controls="nav-<?= $slug ?>" aria-selected="true"><?= $tab['title'] ?></a>
            <?php endforeach ?>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <?php foreach ($tabs as $index => $tab) : $slug = sanitize_title($tab['title']) ?>
                <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="nav-<?= $slug ?>" role="tabpanel" aria-labelledby="nav-<?= $slug ?>-tab">
                    <div class="row">
                        <div class="col-3"></div>

                        <div class="col-3 tab-title"><?= $tab['text'] ?></div>

                        <div class="col-3 tab-text"><?= $tab['list'] ?></div>

                        <div class="col-3"></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
