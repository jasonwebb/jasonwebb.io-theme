$(document).ready(function () {
  //============================================================================================
  //  Search box
  //============================================================================================
  // Toggle the search box when icon is clicked
  $('.sidebar .search .icon').on('click', function () {
    if ($(this).children('.fa').hasClass('fa-search')) {
      showSearch();
    } else {
      hideSearch();
    }
  });

  $('.sidebar .search .input').blur(function () {
    // $('.sidebar .search .icon .fa').removeClass('fa-times').addClass('fa-search');
    // $('.sidebar .search').removeClass('is-active');
  });

  function showSearch() {
    $('.sidebar .search .icon .fa').removeClass('fa-search').addClass('fa-times');
    $('.sidebar .search').addClass('is-active');
    $('.sidebar .search .input').focus();
  }

  function hideSearch() {
    $('.sidebar .search .icon .fa').removeClass('fa-times').addClass('fa-search');
    $('.sidebar .search').removeClass('is-active');
    $('.sidebar .search .input').blur();
  }
});