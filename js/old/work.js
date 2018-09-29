$(document).ready(function () {
  var isWorkPage = $('.work-page').length;
  var currentHash = location.hash || "#creative";
  var currentPage = currentHash.slice(1, currentHash.length);
  var phpLocation = '/wp-content/themes/minimal-for-jasonwebbio/php/work/';
  var offset = 0;
  var contentLoaded = false;

  if (isWorkPage) {

    //===============================================================================================
    //  Lazy load more content at page bottom
    //===============================================================================================
    // $(window).scroll(function() {
    //     if($(window).scrollTop() + $(window).height() > $(document).height() - 300 
    //             && isWorkPage 
    //             && contentLoaded
    //             && currentPage != 'academic') {
    //         offset += 10;
    //         contentLoaded = false;
    //         loadWorkContent(currentPage, offset, true);
    //     }
    // });

    //===============================================================================================
    //  Load initial page content
    //===============================================================================================
    $('.work-page .work-controls li a[href="#' + currentPage + '"]').addClass('is-active');
    loadWorkContent(currentPage);

    //===============================================================================================
    //  Load new content with tab clicked
    //===============================================================================================
    $('.work-page .work-controls a').on('click', function () {
      var nextPage = $(this).attr('href').slice(1, $(this).attr('href').length);

      // Do not reload content if it's already up
      if (nextPage === currentPage) {
        return;
      }

      // Reset offset so we always load latest posts
      offset = 0;

      // Update URL hash for bookmarking
      currentPage = nextPage;

      // Update active tab
      $('.work-page .work-controls li a').removeClass('is-active');
      $(this).addClass('is-active');

      // Hide current content
      $('.work-page .work-items').animate({
        opacity: 0,
        height: 0,
        marginTop: 40
      }, 500, function () {
        // Remove old content
        $('.work-page .work-items .work-item').each(function () {
          $(this).remove();
        });

        loadWorkContent(nextPage);
      });
    });

    //===============================================================================================
    //  Load and display a new page of content
    //===============================================================================================
    function loadWorkContent(page, offset, append) {
      var url = phpLocation + 'get-work-items.php?page=' + page;

      if (offset) {
        url += "&offset=" + offset;
      }

      $.ajax({
        url: url,
        beforeSend: function () {
          $spinnerEl = $('<div class="loading-spinner has-text-centered"><i class="fa fa-spinner fa-spin"></i></div>');
          $('.work-page .work-items')
            .removeClass('has-gray-background')
            .css('opacity', '1')
            .hide()
            .html($spinnerEl).fadeIn();
        }
      }).done(function (data) {
        // Replace or append existing .work-items content with retreived content
        if (append) {
          $('.work-page .work-items').append(data);
        } else {
          $('.work-page .work-items').html(data);
        }

        // Initialize all carousels
        initializeCarousels();

        if (page != "academic") {
          $('.work-page .work-items').addClass('has-gray-background');
        } else {
          $('.work-page .work-items').removeClass('has-gray-background');
        }

        // Fade in new content
        $('.work-page .work-items').animate({
          opacity: 1,
          height: '100%',
          marginTop: 0
        }, 500, function () {
          contentLoaded = true;
        });
      });
    }

    //===============================================================================================
    //  Initialize carousels
    //===============================================================================================
    function initializeCarousels() {
      // Custom prev/next arrows
      var prevArrow = '<div class="carousel__arrow-container carousel__arrow-container--prev"><div class="carousel__arrow"><i class="fa fa-angle-left"></i></div></div>';
      var nextArrow = '<div class="carousel__arrow-container carousel__arrow-container--next"><div class="carousel__arrow"><i class="fa fa-angle-right"></i></div></div>';

      // Only activate carousel plugin when there is more than one image to scroll through
      $('.carousel').each(function () {
        var hasDots = $(this).hasClass('has-dots');

        if ($(this).children('.carousel__slide').length > 1) {
          $(this).slick({
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            dots: hasDots
          });
        }
      });

      // Un-hide all slides that were hidden for smoother initialization
      $('.carousel__slide').removeClass('is-hidden');
    }
  }
});