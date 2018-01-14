import $ from 'jquery';

$(() => {
  const $backgrounds = $('.backgrounds');
  if ($backgrounds.length > 0) {
    const class2add = 'active';
    const delay = 10000;

    const $images = $backgrounds.find('.background');
    let index = 0;

    function advanceBackground() {
      const $image = $($images.get(index));

      $images.removeClass(class2add);
      $image.addClass(class2add);

      index += 1;
      if (index === $images.length) {
        index = 0;
      }

      setTimeout(advanceBackground, delay);
    }

    advanceBackground();

    const $navbar = $('.navbar');
    const $header = $('header');
    const $production = $('header + .production-container');

    function recalcBackgroundHeight() {
      const navbarHeight = $navbar.outerHeight(true);
      const headerHeight = $header.outerHeight(true);
      const productionHeight = $production.outerHeight(true) || 0;

      $backgrounds.height(navbarHeight + headerHeight + productionHeight);
    }

    const $window = $(window);
    $window.resize(recalcBackgroundHeight);
    $window.resize();
  }
});
