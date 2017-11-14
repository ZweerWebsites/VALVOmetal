import $ from 'jquery';

$(() => {
  const $certifications = $('.certifications');

  if ($certifications.length > 0) {
    $certifications.slick();
  }
});