import $ from 'jquery';

function setFadeIn(selector, effect, offset) {
  const $elements = $(selector);

  $elements.waypoint(function () {
    const $element = $(this.element);

    $element.removeClass('invisible').addClass(`animated ${effect}`);
  }, { offset });
}

$(() => {
  setFadeIn('header', 'fadeInDown', '100%');
  setFadeIn('.card-group', 'fadeInUp', '70%');
  setFadeIn('.quality-container img', 'fadeIn', '70%');
});