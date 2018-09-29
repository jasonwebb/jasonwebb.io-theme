$(document).ready(function () {
  var isResumePage = $('.resume-page').length;
  var showWebOnly = false;

  //================================================================================================
  //  Show 'web only' items if #web hash is present
  //================================================================================================
  if (isResumePage) {
    var hash = location.hash;
    var page = hash.slice(1, hash.length);

    if (page == 'web') {
      showWebOnlyItems();
      $('.resume-page .controls .custom-checkbox input').prop('checked', true);
    }
  }

  //================================================================================================
  //  'Web only' custom checkbox
  //================================================================================================
  $('.resume-page .controls .custom-checkbox input').change(function () {
    if ($(this).is(":checked")) {
      showWebOnlyItems();
    } else {
      showAllItems();
    }
  });

  function showWebOnlyItems() {
    // Hide all non-web items
    $('.resume-page .is-non-web').each(function () {
      $(this).slideUp();
    });

    // Show all web-only items
    $('.resume-page .is-web-only').each(function () {
      $(this).slideDown();
    });
  }

  function showAllItems() {
    // Show all items
    $('.resume-page .is-non-web').each(function () {
      $(this).slideDown();
    });

    // Hide any web-only items
    $('.resume-page .is-web-only').each(function () {
      $(this).slideUp();
    });
  }
});