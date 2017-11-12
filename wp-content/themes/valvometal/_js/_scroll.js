import $ from 'jquery';

$(() => {
  const $toScroll = $('html, body');

  $(document).on('click', 'a[href^="#"]', (event) => {
    const $link = $(event.currentTarget);

    event.preventDefault();

    $toScroll.animate({
      scrollTop: $($link.attr('href')).offset().top,
    }, 500);
  });
});