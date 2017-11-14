<?php

$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');

?>

<div class="quality_assurance-container">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3><?= $subtitle ?></h3>
                <h2><?= $title ?></h2>
            </div>

            <div class="col-1"></div>

            <div class="col-6 text">
                <?= $text ?>
            </div>
        </div>
    </div>
</div>
