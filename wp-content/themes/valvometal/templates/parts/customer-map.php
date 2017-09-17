<?php

$referencesPage = get_page_by_path('references');

$stats = get_field('stats', $referencesPage);
$background = get_field('background_home', $referencesPage);

?>

<div class="customer_map-container" style="background-image: url('<?= wp_get_attachment_url($background) ?>');">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card-group">
                    <?php foreach ($stats as $stat) : ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><?= $stat['value'] ?></div>
                            <div class="card-text"><?= $stat['text'] ?></div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
