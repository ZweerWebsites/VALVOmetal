import 'bootstrap';
import $ from 'jquery';

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
