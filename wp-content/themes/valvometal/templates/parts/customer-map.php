<?php

$stats = get_field('stats', 'option');

?>

<div class="customer_map-container">
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
