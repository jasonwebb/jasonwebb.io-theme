$(document).ready(function () {
  // Open overlay
  $('.overlay .pulldown-tab a').click(function () {
    $(this).parent().parent().toggleClass('is-open');
  });

  $('.overlay .overlay__inner .close').click(function () {
    $(this).parent().parent().toggleClass('is-open');
  });
});