$(document).ready(() => {
  $('.mobile-nav-trigger').on('click', function () {
    $('.mobile-nav-trigger').toggleClass('open');
    $('.mobile-navigation-items').slideToggle(100);
  });
});
