
// page loader
$(window).load(function() {
    $("#page-loader").delay(300).fadeOut('slow');
});

$(document).ready(function(){

  // Toggle the popover for each head shot
  $('a.head-shot').webuiPopover({
      trigger: 'hover',
      delay: { 
         show: "50", 
         hide: "700"
      },
      placement: 'auto',
      animation: 'pop',
      width: 500,
      height: 'auto',
      closeable: true,
  });

  // Wow Animation DISABLE FOR MOBILE
  wow = new WOW(
  {
    mobile: false
  });
  wow.init();


  $('.carousel-header').slick({
    dots: true,
    fade: true,
    speed: 1500,
    cssEase: 'linear',
    autoplay: true,
    slidesToScroll: 1,
    infinite: true,
    dots: true,
    arrows: false,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        arrows: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        initialSlide: 1,
        autoplay: false,
        dots: false,
        arrows: false
      }
    }
    ]

  });

});

$(window).scroll(function() {
    // Collapse navbar on scroll
    if ($(".navbar-fixed-top").offset().top > 50) {
        $(".navbar-fixed-top").addClass("navbar-shrink");
    } else {
        $(".navbar-fixed-top").removeClass("navbar-shrink");
    }

});


// faster smooth scroll, no plugin required
$('a.page-scroll').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
  && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
          var targetOffset = $target.offset().top;
          $('html,body').animate({scrollTop: targetOffset}, 600);
          return false;
      }
  }
});


