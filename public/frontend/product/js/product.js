
  $(window).ready(function(){

var product = $('#productresponsive');

  //Init the carousel

 // tạo đường viền chạy slide
  

 // end tạo đường viền chạy slide

   product.owlCarousel({
    dots:false, // tạo dấu chấm ở dưới 
      items: 5,
      loop: false,
      nav: true, // cho hiện next với prev
       navClass: [
            "owl-prev hidden",
            "owl-next"
        ],
      navText : ['<i class="glyphicon glyphicon-chevron-left"></i>','<i class="glyphicon glyphicon-chevron-right"></i>'],
      pagination: false, // tạo phân trang
       mouseDrag: true, // kéo trượt slide
    touchDrag: true,// kéo trượt slide
 responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1200:{
            items:5,
            nav:true,
            loop:false
        }
    }
    });
  
 product.on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function (event) {
        if (!event.namespace) return;
        var carousel = event.relatedTarget,
             element = event.target,
             current = carousel.current();
        $('.owl-next', element).toggleClass('hidden', current === carousel.maximum());
        $('.owl-prev', element).toggleClass('hidden', current === carousel.minimum());
    });



});
  


  



  $(window).ready(function(){

var product = $('#quantamresponsive');

  //Init the carousel

 // tạo đường viền chạy slide
  

 // end tạo đường viền chạy slide

   product.owlCarousel({
    dots:false, // tạo dấu chấm ở dưới 
      items: 5,
      loop: false,
      nav: true, // cho hiện next với prev
       navClass: [
            "owl-prev hidden",
            "owl-next"
        ],
      navText : ['<i class="glyphicon glyphicon-chevron-left"></i>','<i class="glyphicon glyphicon-chevron-right"></i>'],
      pagination: false, // tạo phân trang
       mouseDrag: true, // kéo trượt slide
    touchDrag: true,// kéo trượt slide
 responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
    });
  
 product.on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function (event) {
        if (!event.namespace) return;
        var carousel = event.relatedTarget,
             element = event.target,
             current = carousel.current();
        $('.owl-next', element).toggleClass('hidden', current === carousel.maximum());
        $('.owl-prev', element).toggleClass('hidden', current === carousel.minimum());
    });



});
  


  


// nút chạy lên đầu trang
//Thanks to: http://www.webtipblog.com/adding-scroll-top-button-website/

$(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});




// nút chạy lên đầu trang