import $ from 'jquery';

function setFadeIn(selector, offset) {
  const $element = $(selector);

  $element.waypoint(() => $element.removeClass('invisible').addClass('animated fadeIn'), { offset });
}

$(() => {
  setFadeIn('header', '100%');
});