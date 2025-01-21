/**
  * Theme Js file.
**/

// ===== Slider ==== 

jQuery('document').ready(function(){
  var owl = jQuery('#slider-post .owl-carousel');
    owl.owlCarousel({
    margin:10,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      },
      1200: {
        items: 4
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});