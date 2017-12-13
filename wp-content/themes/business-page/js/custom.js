$=jQuery
jQuery(document).ready(function () {

  jQuery('.menu-top-menu-container').meanmenu({
    meanMenuContainer: '.main-navigation',
    meanScreenWidth:"767",
    meanRevealPosition: "right",
  });


         /* back-to-top button*/

     $('.back-to-top').hide();
     $('.back-to-top').on("click",function(e) {
     e.preventDefault();
     $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    
    $(window).scroll(function(){
      var scrollheight =400;
      if( $(window).scrollTop() > scrollheight ) {
           $('.back-to-top').fadeIn();

          }
        else {
              $('.back-to-top').fadeOut();
             }
     });

    


           // slider

           var owllogo = $("#owl-slider-demo");

              owllogo.owlCarousel({
                  items:1,
                  loop:true,
                  nav:false,
                  dots:true,
                  smartSpeed:900,
                  autoplay:true,
                  autoplayTimeout:5000,
                  fallbackEasing: 'easing',
                  transitionStyle : "fade",
                  autoplayHoverPause:true,
                  animateOut: 'fadeOut'
              });

             var owl = $("#clients-slider");
              owl.owlCarousel({
              items:3,
              loop:$('#clients-slider .individual-client').size() > 6 ? true:false,
              nav:false,
              dots:false,
              smartSpeed:900,
              autoplay:true,
              autoplayTimeout:1000,
              fallbackEasing: 'easing',
              transitionStyle : "fade",
              autoplayHoverPause:true,
              responsive:{
                  0:{
                      items:2
                  },
                  580:{
                      items:4
                  },
                  1000:{
                      items:6
                  }
              }
              
              });

              var owl = $("#testimonial-slider");
              owl.owlCarousel({
              items:3,
              loop:$('#testimonial-slider .single-testimonial').length > 3 ? true:false,
              nav:false,
              autoplay:true,
              autoplayTimeout:4000,
              fallbackEasing: 'easing',
              transitionStyle : "fade",
              dots:true,
              autoplayHoverPause:true,
              responsive:{
                  0:{
                      items:1
                  },
                  580:{
                      items:2
                  },
                  1000:{
                      items:3
                  }
              }
              
              });

              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })



              

// fixed nav menu

    $(window).scroll(function(){
    // fixed menu js     
     var scrollheight = parseInt(($(".site-header").height())/1.030);
      if( $(window).scrollTop() > scrollheight ) {
           $('.hgroup-wrap').addClass('sticky-header');

          }
        else {
              $('.hgroup-wrap').removeClass('sticky-header');
          }
    }); 



$(window).scroll(function(){
  var scrollPos = $(document).scrollTop();
  scrollPos = scrollPos+58;
    $('#site-navigation a').each(function () {
        var currLink = $(this);
        var refElement = currLink.attr("href");
        /*check hash value exist*/
        if(refElement.indexOf('#')=="-1"){
          return;
       }
        refElement = '#'+refElement.substring(refElement.indexOf('#')+1);
        refElement = $(refElement);
       // var refElement = $(currLink.attr("href"));
       
       /*check hash id exist*/
       if(!refElement.length){
          return;
       }
        if (refElement.offset().top <= scrollPos && refElement.offset().top + refElement.outerHeight() > scrollPos) {
            $('#site-navigation ul li a').removeClass("active");
            currLink.closest('li').addClass('current-menu-item');
        }
        else{
            currLink.closest('li').removeClass('current-menu-item');
        }
    });
  });


    $('.navigation ul li a')
            .click(function (e) {

                $(".main section")
                        .removeClass(" ");
                $(this)
                        .parent()
                        .parent()
                        .parent()
                        .removeClass('in');


                if($(window).width()<768){
                  $('.meanclose').trigger('click');
                }

                var hashValue = $(this).attr('href').split('#')[1];
                if( (hashValue).length ){
                  e.preventDefault();

                  if(!$('#'+hashValue).length){
                    window.location.href=$(this).attr('href');
                  }

                  var topPosition = $('#'+hashValue).position().top;
                  $('html, body').animate({
                    scrollTop: topPosition
                  }, 800);
                }
            });





            /* for counter */

    function count($this){
      var current = parseInt($this.html(), 10);
      current = current + 1; /* Where 1 is increment */

      $this.html(++current);
      if(current > $this.data('count')){
        $this.html($this.data('count'));
      } else {
        setTimeout(function(){count($this)}, 50);
      }
    }

    jQuery(".start-count").each(function() {
      jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
      jQuery(this).html('0');
      count(jQuery(this));
    });

  //      parallax
     $(function(){
        $.stellar({
          horizontalScrolling: false,
          verticalOffset: 40
        });
      });


     $('#mixit-container').mixItUp();




        
      });


function checkBannerHeight(){
  var winHeight = $(window).height();
  $('.slider-content figure').height(winHeight);
}

$(document).ready(function(){
checkBannerHeight();
});

$(document).resize(function(){
checkBannerHeight();
});

$(document).ready(function(){
  $('.meanmenu-reveal').on('click', function(){
    $(this).closest('.mean-bar').toggleClass('mean-bar-wrap');
  });
});