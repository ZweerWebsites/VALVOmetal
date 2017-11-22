import $ from 'jquery';

$(() => {
  const $testingNavs = $('.testing-navs .nav-item');
  const $testingTabs = $('.testing-tabs');

  $testingTabs.slick();
  $testingNavs.on('click', (event) => {
    const $this = $(event.target);

    $testingTabs.slick('slickGoTo', $this.index());
  });
});