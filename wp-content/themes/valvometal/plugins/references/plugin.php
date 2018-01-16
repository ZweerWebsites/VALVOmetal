<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../abstract-plugin.php';

class ValvoMetal_Plugin_References extends ValvoMetal_Plugin {
    protected $name = 'ValvoMetal References';
    protected $prefix = 'vmref';
    protected $capability = 'administrator';

    public function register_settings_pages() {
        add_submenu_page('options-general.php', $this->name . ' Settings', $this->name, $this->capability, $this->prefix . '_settings', array($this, 'viewMainPage'));
    }

    public function register_settings() {}

    public function viewMainPage() {
        if (current_user_can($this->capability)) {
            $this->handleImport();
            echo $this->render_template('admin/import.php');
        } else {
            wp_die('Access denied.');
        }
    }

    protected function handleImport() {
        if ($_FILES and $_FILES['csv'] and $_FILES['csv']['type'] === 'text/csv') {
            $csv = file_get_contents($_FILES['csv']['tmp_name']);
            $rows = explode("\n", $csv);

            $field = [];

            for ($i = 1; $i < count($rows); $i += 1) {
                # YEAR;CUSTOMER;PLANT;COUNTRY;NOME LOGO;COORDINATE

                list($year, $customer, $plant, $country, $logo, $coords) = explode(';', $rows[$i]);

                $attachment = new WP_Query([
                    'posts_per_page' => 1,
                    'post_type' => 'attachment',
                    'name' => 'reference-logo-' . strtolower($logo),
                ]);

                $image = null;

                if (count($attachment->posts) > 0) {
                    $image = $attachment->posts[0]->ID;
                }

                preg_match('/@(.*),(.*),(.*)z/', $coords, $matches);

                if (count($matches) > 0) {
                    $lat = $matches[1];
                    $lon = $matches[2];

                    array_push($field, [
                        'name' => $customer,
                        'site_name' => $plant,
                        'build_year' => $year,
                        'nation' => $country,
                        'image' => $image,
                        'lat' => $lat,
                        'lon' => $lon,
                    ]);
                } else {
                    var_dump($i);
                    var_dump($coords);
                }
            }

            update_field('customers', $field, get_page_by_path('references'));
        }
    }
}

new ValvoMetal_Plugin_References();
