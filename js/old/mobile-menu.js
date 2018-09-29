$(document).ready(function () {
  // Elements
  var hamburgerIconEl = $('.mobile-controls .js-open-mobile-menu');
  var hamburgerChildEl = hamburgerIconEl.children('.fa');

  var searchIconEl = $('.mobile-controls .js-open-site-search');
  var searchChildEl = searchIconEl.children('.fa');
  var searchBoxEl = $('.mobile-controls .search');

  var bodyEl = $('body > .container');
  var mobileMenuEl = $('.mobile-menu');
  var contentEl = $('body > .container > .columns > .content');

  // State flags
  var mobileMenuIsOpen = false;
  var searchBoxIsOpen = false;

  //==================================================================================================
  //  Toggle mobile menu when hamburger clicked
  //==================================================================================================
  hamburgerIconEl.click(function (e) {
    e.preventDefault();

    if (mobileMenuIsOpen) {
      closeMobileMenu();
    } else {
      openMobileMenu();
      closeSearchBox();
    }
  });

  function openMobileMenu() {
    bodyEl.addClass('is-mobile-menu-opened');
    mobileMenuEl.show().addClass('is-active');
    hamburgerIconEl.addClass('is-active');

    hamburgerChildEl.removeClass('fa-bars');
    hamburgerChildEl.addClass('fa-times');

    contentEl.addClass('is-inactive');

    mobileMenuIsOpen = true;
  }

  function closeMobileMenu() {
    bodyEl.removeClass('is-mobile-menu-opened');
    mobileMenuEl.removeClass('is-active');
    hamburgerIconEl.removeClass('is-active');

    hamburgerChildEl.removeClass('fa-times');
    hamburgerChildEl.addClass('fa-bars');

    contentEl.removeClass('is-inactive');

    // Hide mobile menu after animation for better resizing behavior
    setTimeout(function () {
      mobileMenuEl.hide();
    }, 1000);

    mobileMenuIsOpen = false;
  }


  //==================================================================================================
  //  Toggle search box
  //==================================================================================================
  searchIconEl.click(function (e) {
    e.preventDefault();
    console.log("clicked");

    if (searchBoxIsOpen) {
      closeSearchBox();
    } else {
      openSearchBox();
    }
  });

  function openSearchBox() {
    searchBoxEl.addClass('is-active');
    searchBoxEl.find('.input').focus();

    searchIconEl.addClass('is-active');
    searchChildEl.removeClass('fa-search');
    searchChildEl.addClass('fa-times');

    console.log("test");

    searchBoxIsOpen = true;
  }

  function closeSearchBox() {
    searchBoxEl.removeClass('is-active');
    searchBoxEl.find('.input').blur();

    searchIconEl.removeClass('is-active');
    searchChildEl.removeClass('fa-times');
    searchChildEl.addClass('fa-search');

    searchBoxIsOpen = false;
  }
});