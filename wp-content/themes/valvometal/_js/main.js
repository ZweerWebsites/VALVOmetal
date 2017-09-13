import 'bootstrap';
import $ from 'jquery';

Modernizr.addTest('safari', function() {
  return navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1;
});

$(() => {
  const threshold = 400;
  const class2add = 'navbar-hidden-visible';

  const $navbar = $('.navbar-hidden');
  const $window = $(window);

  $window.scroll(() => {
    if ($window.scrollTop() > threshold) {
      $navbar.addClass(class2add);
    } else {
      $navbar.removeClass(class2add);
    }
  });
});

$(() => {
  const $backgrounds = $('.backgrounds');
  if ($backgrounds.length > 0) {
    const class2add = 'active';
    const delay = 10000;

    const $images = $backgrounds.find('img');
    let index = 0;

    function advanceBackground() {
      const $image = $($images.get(index));

      $images.removeClass(class2add);
      $image.addClass(class2add);

      index += 1;
      if (index === $images.length) {
        index = 0;
      }
    }

    advanceBackground();
    setInterval(advanceBackground, delay);
  }
});
