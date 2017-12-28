import $ from 'jquery';

$(() => {
  const $customers = $('.some_customers');

  if ($customers.length > 0) {
    $customers.slick();
  }
});