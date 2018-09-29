$(document).ready(function () {
  // Elements
  var contentEl = $('body > .container > .columns > .content > div');
  var mobileControlsTitleEl = $('<h1 class="page-title"></h1>');

  // If a page title is provided via the content container, apply it to the mobile control header and fade it in
  // - Use the data-page-title attribute on the .content div
  if (contentEl.data('page-title') !== undefined) {
    mobileControlsTitleEl.text(contentEl.data('page-title'));
    $('.mobile-controls').append(mobileControlsTitleEl);
    mobileControlsTitleEl.fadeIn(700);
  }
});