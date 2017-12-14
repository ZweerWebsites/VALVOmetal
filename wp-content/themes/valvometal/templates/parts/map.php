<?php

$referencesPage = get_page_by_path('references');

$customers = get_field('customers', $referencesPage);

?>

<script type="text/javascript">
    var customers = [
      <?php foreach ($customers as $index => $customer) : ?>
      {
        index: <?= $index ?>,
        name: '<?= $customer['name'] ?>',
        site_name: '<?= $customer['site_name'] ?>',
        build_year: '<?= $customer['build_year'] ?>',
        nation: '<?= $customer['nation'] ?>',
        image: '<?= wp_get_attachment_image_url($customer['image'], 'half') ?>',
        lat: <?= $customer['location']['lat'] ?>,
        lng: <?= $customer['location']['lng'] ?>,
      },
      <?php endforeach ?>
    ];
</script>

<div id="map" class="container-fluid"></div>

<?php

array_splice($customers, 0, 8);

$numCustomers = count($customers);
$customersPerPage = 4;
$numPages = ceil($numCustomers / $customersPerPage);

$customersRandom = array_rand($customers);

?>

<div class="customers_on_map-container">
    <div id="customer_on_map-carousel" class="container carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < $numPages; $i += 1) : ?>
                <li data-target="#customer_on_map-carousel" data-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active"' : '' ?>></li>
            <?php endfor ?>
        </ol>

        <div class="carousel-inner">
            <?php for ($i = 0; $i < $numPages; $i += 1) : ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                    <div class="row">
                    <?php for ($j = $i * $customersPerPage; $j < ($i + 1) * $customersPerPage && $j < count($customersRandom); $j += 1) : ?>
                        <div class="col-md-<?= 12 / $customersPerPage ?> customer_logo" data-marker-index="<?= $j ?>">
                            <img src="<?= wp_get_attachment_image_url($customersRandom[$j]['image'], 'half') ?>">
                        </div>
                    <?php endfor ?>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>
</div>
