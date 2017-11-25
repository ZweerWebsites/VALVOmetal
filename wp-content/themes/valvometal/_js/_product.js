import $ from 'jquery';

$(() => {
  const $productGalleries = $('.gallery-button, .photogallery');

  $productGalleries.each((index, productGallery) => {
    const $productGallery = $(productGallery);
    const $button = $productGallery.find('.btn');
    const $gallery = $productGallery.find('.product-gallery');
    const $firstImage = $gallery.find('img:first');

    $gallery.lightGallery();

    $button.click(() => {
      $firstImage.click();

      return false;
    });
  });
});