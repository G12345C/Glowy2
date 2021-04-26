jQuery(document).ready(function($){

	jQuery(window).scroll(function(){
        if (jQuery(window).scrollTop() >= 100) {
            jQuery('.header-sticky').addClass('header-fixed-top');
			jQuery('.header-sticky').removeClass('not-sticky');
        }
        else {
            jQuery('.header-sticky').removeClass('header-fixed-top');
			jQuery('.header-sticky').addClass('not-sticky');
        }
    });
	
    var js_window = $(window);
    var js_body = $('body');
    
    /* footer sticky */
    function stickyFooter(){
        if ($(window).width() > 992) {
           //alert('Larger than 960');
           var footer_height = $('.site-footer').height();
            //$('.site').css('margin-bottom', footer_height);
        } else {
           //alert('Smaller than 960');
        }
    }
    stickyFooter();
    js_window.resize(function () {
         stickyFooter();
    });
    
    /* Slider */
    $('.home-slider').owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		animateIn: jewelry_store_settings.slider_animateIn,
		animateOut: jewelry_store_settings.slider_animateOut,
		autoplay : 7000,
		smartSpeed: jewelry_store_settings.slider_smart_speed,
		autoplayTimeout: jewelry_store_settings.slider_scroll_speed,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: jewelry_store_settings.slider_mouse_drag,
		loop:false, // loop is true up to 1199px screen.
		nav:jewelry_store_settings.slider_arrow_show, // is true across all sizes
		margin:0, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		items: 1,
		dots: jewelry_store_settings.slider_pagination_show,
		navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"]
	});

	/* Testimonial Slider */
    $('.testimonial-slider').owlCarousel({
		//navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		animateIn: "",
		animateOut: "",
		autoplay : 7000,
		smartSpeed: 1000,
		autoplayTimeout: 2500,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: true,
		loop:false, // loop is true up to 1199px screen.
		nav:false, // is true across all sizes
		margin:30, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		//items: 1,
		dots: true,
		navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
		responsive:{
			100:{ items:1 },	
			480:{ items:1 },
			768:{ items:1 },
			1000:{ items:1 }
		},
	});

	/* Team Slider */
    $('.team-slider').owlCarousel({
		//navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		animateIn: "",
		animateOut: "",
		autoplay : 7000,
		smartSpeed: 1000,
		autoplayTimeout: 2500,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: true,
		loop:false, // loop is true up to 1199px screen.
		nav:true, // is true across all sizes
		margin:30, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		//items: 1,
		dots: true,
		navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
		responsive:{
			100:{ items:1 },	
			480:{ items:1 },
			768:{ items:2 },
			1000:{ items:jewelry_store_settings.team_column }
		},
	});
    
    /* Product Slider */
    $('.product-slider').owlCarousel({
		//navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		animateIn: "",
		animateOut: "",
		autoplay : 7000,
		smartSpeed: 1000,
		autoplayTimeout: 2500,
		autoplayHoverPause:true,
		singleItem:true,
		mouseDrag: true,
		loop:true, // loop is true up to 1199px screen.
		nav:true, // is true across all sizes
		margin:30, // margin 10px till 960 breakpoint
		autoHeight: true,
		responsiveClass:true, // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.
		//items: 1,
		dots: true,
		navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
		responsive:{
			100:{ items:1 },	
			480:{ items:1 },
			768:{ items:2 },
			1000:{ items:jewelry_store_settings.shop_column }
		},
	});
    
    $('.jsgroup-bg').parallax();

    $(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.back_to_top').fadeIn();
		} else {
			$('.back_to_top').fadeOut();
		}
	});

	$('.back_to_top').click(function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
    
});

new WOW({
	  boxClass:     'wow',      // animated element css class (default is wow)
	  animateClass: 'animated', // animation css class (default is animated)
	  offset:       100,        // distance to the element when triggering the animation (default is 0)
	  mobile: true,             // trigger animations on mobile devices (true is default)
	  live: true                // consatantly check for new WOW elements on the page (true is default)
	}).init();