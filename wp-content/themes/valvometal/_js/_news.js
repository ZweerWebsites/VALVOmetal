import $ from 'jquery';

$(() => {
  const $share = $('.share');

  $share.sticky({ topSpacing: 75 });

  const $newsContentImages = $('.news-content-images');

  $newsContentImages.lightGallery();
});