(function ($) {
"use strict";  
    
/*------------------------------------
	Sticky Menu 
--------------------------------------*/
    var windows = $(window);
    var stick = $(".header-sticky");
    windows.on('scroll',function() {    
        var scroll = windows.scrollTop();
        if (scroll < 10) {
            stick.removeClass("sticky");
        }else{
            stick.addClass("sticky");
        }
    });  
    
/*------------------------------------
    jQuery MeanMenu
-------------------------------------- */
	$('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });
    
/*------------------------------------
    jQuery Submenu
-------------------------------------- */    
    $('.show-submenu').on('click', function() {
        $(this).parent().find('.submenu').toggleClass('submenu-active'); 
        $(this).toggleClass('submenu-active');  
        return false;  
    });
    $('.show-menu').on('click', function() {
        if ($('.menu-show').is(":visible")) {
            $('.menu-show').hide();  
        }else{
            $('.menu-show').show();
        }
        return false;  
    });
    
/*------------------------------------
	Owl Carousel
--------------------------------------*/
    $('.slider-wrapper').owlCarousel({
        loop:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 2500,
        items:1,
        nav:false,
        dots: true
    });
    
    $('.product-carousel').owlCarousel({
        loop:true,
        items:5,
        nav:true,
        navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
              items:1,
              nav: false
            },
            420:{
                items:2
            },
            600:{
              items:3
            },
            800:{
              items:3
            },
            1024:{
              items:4
            },
            1200:{
              items:5
            }
        }
    });
    
    $('.seller-carousel').owlCarousel({
        loop:true,
        items:4,
        nav:true,
        navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
              items:1,
              nav: false
            },
            420:{
              items:2,
              nav: false
            },
            600:{
              items:2
            },
            800:{
              items:3
            },
            1024:{
              items:3
            },
            1200:{
              items:4
            }
        }
    }); 
    
    $('.woman-carousel').owlCarousel({
        loop:true,
        items:4,
        nav:true,
        navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
              items:1,
              nav: false
            },
            420:{
                items:2
            },
            600:{
              items:3
            },
            800:{
              items:3
            },
            1024:{
              items:4
            },
            1200:{
              items:4
            }
        }
    });  
    
    $('.man-carousel').owlCarousel({
        loop:true,
        items:4,
        nav:true,
        navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
              items:1,
              nav: false
            },
            420:{
                items:2
            },
            600:{
              items:2
            },
            800:{
              items:2
            },
            1024:{
              items:2
            },
            1200:{
              items:3
            }
        }
    }); 
    
    $('.product-seller').owlCarousel({
        loop:true,
        items:5,
        nav:false,
        mouseDrag: false,
        navText : ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
              items:1,
              mouseDrag: true
            },
            420:{
                items:2
            },
            600:{
              items:3,
              mouseDrag: true,
              nav: true
            },
            800:{
              items:3,
              mouseDrag: true,
              nav: true
            },
            1024:{
              items:4,
              mouseDrag: true,
              nav: true
            },
            1200:{
              items:5
            }
        }
    }); 
    
    $('.new-carousel').owlCarousel({
        loop:true,
        items:5,
        nav:false,
        mouseDrag: false,
        responsive:{
            0:{
              items:1,
              mouseDrag: true
            },
            420:{
                items:2
            },
            600:{
              items:3,
              mouseDrag: true
            },
            800:{
              items:3,
              mouseDrag: true
            },
            1024:{
              items:4,
              mouseDrag: true
            },
            1200:{
              items:5
            }
        }
    });    
    
    $(".testimonial-owl").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: true,
		nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
    $(".blog-carousel").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: true,
        nav:true,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            420:{
                items:2
            },
            600:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });   
    
    $(".deal-carousel").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: true,
        nav:true,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:1,
                nav: false
            },
            420:{
                items:2
            },
            600:{
                items:1
            },
            1000:{
                items:2
            }
        }
    });  
    
    $(".offer-carousel").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: false,
		nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
    $(".arrival-carousel").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: true,
        nav:true,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    
    $(".shop-carousel").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: true,
        nav:true,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
                nav:true
            },
            1000:{
                items:1
            }
        }
    });
    
    $(".category-carousel").owlCarousel({
        loop:true,
        smartSpeed: 2500,
        items:1,
        dots: true,
        nav:true,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:1,
                nav: false
            },
            420:{
                items:2
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    $('.client-carousel').owlCarousel({
        loop:true,
        dots:true,
        nav:true,
        navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsive:{
            0:{
                items:2,
            },
            768:{
                items:4
            },
            1000:{
                items:6
            }
        }
    }); 
    
/*--------------------------
 Countdown
---------------------------- */	
    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<div class="cdown days"><span class="counting">%-D</span><span class="c-text">days</span></div><div class="cdown hours"><span class="counting">%-H</span><span class="c-text">hrs</span></div><div class="cdown minutes"><span class="counting">%M</span><span class="c-text">mins</span></div><div class="cdown seconds"><span class="counting">%S</span><span class="c-text">secs</span></div>'));
        });
    }); 

/*------------------------------------
	Scrollup
--------------------------------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-long-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
/*----------------------------------------
	Product Details Slick Slider
------------------------------------------*/
    $('.product-thumbnail-slider').slick({
        autoplay: false,
        infinite: true,
        centerPadding: '0px',
        focusOnSelect: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-image-slider',
    });

    $('.product-image-slider').slick({
        prevArrow: '<button type="button" class="slick-prev"><img src="'+getBaseURL()+'"public/img/icon/left-angle.png" alt=""/></button>',
        nextArrow: '<button type="button" class="slick-next"><img src="'+getBaseURL()+'"public/img/icon/right-angle.png" alt=""/></button>',
        autoplay: false,
        infinite: true,
        slidesToShow: 1,
        asNavFor: '.product-thumbnail-slider',
    });

/*-----------------------------------------
   Newletter Modal On Load
----------------------------------------- */ 
    var win = $(window);
    win.on('load', function() {
        $('#newslettermodal').modal('show');
    }); 
    
/*-----------------------------------------
  Modal On Load
----------------------------------------- */   
    $('.modal').on('shown.bs.modal', function (e) {
        $('.product-thumbnail-slider, .product-image-slider').slick("setPosition", 0);
    })

})(jQuery);	