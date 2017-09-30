import $ from 'jquery';

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

      setTimeout(advanceBackground, delay);
    }

    advanceBackground();
  }
});
