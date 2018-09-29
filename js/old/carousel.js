$(document).ready(function() {
    // Custom prev/next arrows
    var prevArrow = '<div class="carousel__arrow-container carousel__arrow-container--prev"><div class="carousel__arrow"><i class="fa fa-angle-left"></i></div></div>';
    var nextArrow = '<div class="carousel__arrow-container carousel__arrow-container--next"><div class="carousel__arrow"><i class="fa fa-angle-right"></i></div></div>';

    // Only activate carousel plugin when there is more than one image to scroll through
    $('.carousel').each(function() {
        var hasDots = $(this).hasClass('has-dots');

        if($(this).children('.carousel__slide').length > 1) {
            $(this).slick({
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                dots: hasDots
            });
        }
    });

    // Un-hide all slides that were hidden for smoother initialization
    $('.carousel__slide').removeClass('is-hidden');
});