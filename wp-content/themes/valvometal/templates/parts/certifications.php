<?php

$certifications = get_field('certifications');
$slidesToShow = 3;

?>

<div class="certifications-container">
    <div class="container">
        <div class="certifications" data-slick='{"slidesToShow": <?= $slidesToShow ?>}'>
            <?php foreach ($certifications as $certification) : ?>
            <div class="certification">
                <i class="fa fa-file-text-o"></i>

                <h4><?= $certification['category'] ?></h4>
                <p><?= $certification['name'] ?></p>

                <a href="#" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
