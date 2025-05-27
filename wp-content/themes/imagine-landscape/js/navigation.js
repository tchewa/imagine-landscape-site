$(document).ready(() => {
  $('.mobile-nav-trigger').on('click', function () {
    console.log('hello');
    $('.mobile-nav-trigger').toggleClass('open');
    $('.mobile-navigation-items').slideToggle(100);
  });
});
