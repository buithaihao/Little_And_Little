$(document).ready(function(){
  var $carousel = $('.carousel');
  
  $carousel.slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $carousel.on('afterChange', function(event, slick, currentSlide) {
    var currentPage = Math.floor(currentSlide / 4) + 1;
    var totalSlides = Math.ceil(slick.slideCount / slick.options.slidesToScroll);
    $('.current-page').text('Trang ' + currentPage + '/' + totalSlides);
  });

  $('.prev-btn').click(function() {
    $carousel.slick('slickPrev');
  });

  $('.next-btn').click(function() {
    $carousel.slick('slickNext');
  });
});