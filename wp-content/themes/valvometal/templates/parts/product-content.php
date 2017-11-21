<?php

$content = get_field('description');

?>

<div class="product_content-container">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-8" id="content">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
