<?php

$referencesPage = get_page_by_path('references');

$customers = get_field('customers', $referencesPage);

$names = array_unique(array_map(function ($customer) {
    return $customer['name'];
}, $customers));
sort($names);

$sites = array_unique(array_map(function ($customer) {
    return $customer['site_name'];
}, $customers));
sort($sites);

$nations = array_unique(array_map(function ($customer) {
    return $customer['nation'];
}, $customers));
sort($nations);

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

<div class="map_filters-container">
    <div class="container">
        <div class="row">
            <div class="col col-md-3">
                <label for="map_filter_customer">Customer</label>
                <select id="map_filter_customer">
                    <option value="" selected>View All</option>
                    <?php foreach ($names as $name) : ?>
                        <option value="<?= $name ?>"><?= $name ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col col-md-3">
                <label for="map_filter_site">Site</label>
                <select id="map_filter_site">
                    <option value="" selected>View All</option>
                    <?php foreach ($sites as $site) : ?>
                        <option value="<?= $site ?>"><?= $site ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col col-md-3">
                <label for="map_filter_nation">Nation</label>
                <select id="map_filter_nation">
                    <option value="" selected>View All</option>
                    <?php foreach ($nations as $nation) : ?>
                        <option value="<?= $nation ?>"><?= $nation ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col col-md-3">
                <button class="map_filter_apply btn btn-block btn-light">Apply filters</button>
            </div>
        </div>
    </div>
</div>

<div id="map" class="container-fluid"></div>

<?php

shuffle($customers);
$customers = array_slice($customers, 0, 8);

$numCustomers = count($customers);
$customersPerPage = 4;
$numPages = ceil($numCustomers / $customersPerPage);

?>

<div class="customers_on_map-container">
    <h2>Some Customers</h2>

    <div id="customer_on_map-carousel" class="container">
        <div class="some_customers" data-slick='{"slidesToShow": <?= $customersPerPage ?>, "arrows": false, "dots": true}'>
            <?php foreach ($customers as $customer) : ?>
                <div class="some_customer">
                    <img src="<?= wp_get_attachment_image_url($customer['image'], 'half') ?>">
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
