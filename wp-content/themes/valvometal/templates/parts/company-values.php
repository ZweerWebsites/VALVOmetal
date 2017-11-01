<?php

$values = get_field('high-values');

?>

<div class="company-values-container">
    <div class="container">
        <div class="card-group">
            <?php foreach ($values as $value) : ?>
            <div class="card">
                <div class="card-body">
                    <div class="card-title"><?= $value['value'] ?></div>
                    <div class="card-text"><?= $value['text'] ?></div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
