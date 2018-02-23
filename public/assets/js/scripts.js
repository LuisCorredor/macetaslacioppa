"use strict";

$(document).on('ready', function() { 

	/* You can disable srollanimation by removing next function */
	initScrollAnimation();
	initEvents();
	initMasonry();
	initMap();
	initCollapseMenu();
	initContactForm();

	$('.matchHeight').matchHeight();
	$(".accordion").accordion();
	$(".tabs-ui").tabs();

	/* Lightbox plugin */
	$('.swipebox').swipebox();

	initSwiper();
});

$(window).on('scroll', function (event) {

	checkNavbar();
	checkCountUp();
	initProgressBar();
}).scroll();

$(window).on('load', function(){

	initMasonry();
	initParallax();
});

/* Collapse menu slide */
function initCollapseMenu() {

	var navbar = $('#navbar'),
		navbar_toggle = $('.navbar-toggle'),
		navbar_wrapper = $("#nav-wrapper");

    navbar_wrapper.on('click', '.navbar-toggle', function (e) {

        navbar_toggle.toggleClass('collapsed');
        navbar.toggleClass('collapse');
    });

    navbar_wrapper.on('click', '.hasSub > a', function() {

    	var el = $(this);

    	el.next().toggleClass('show');
    	el.parent().toggleClass('show');
    	return false;
    });

    var lastWidth;
    $(window).on("resize", function () {

    	var winWidth = $(window).width();

        if (winWidth > 992 && navbar_toggle.is(':hidden')) {
            navbar.addClass('collapse');
            navbar_toggle.addClass('collapsed');
        }

       	lastWidth = winWidth;
    });	
}


/* All keyboard and mouse events */
function initEvents() {

	/* Show/hide search form in navbar */
	var searchDiv = $('#search'), 
		navbarDiv = $('#navbar');

	searchDiv.on('click', '.search-icon', function() {

		searchDiv.toggleClass('show');
		navbarDiv.toggleClass('show-search').find('ul').fadeToggle();
	});


	/* Scrolling to navbar from "go top" button in footer */
    $('footer').on('click', '.go-top', function() {

	    $('html, body').animate({ scrollTop: 0 }, 800);
	});

	$('.history-line').on('click', 'a', function() {

		var el = $(this);
		el.addClass('active').siblings().removeClass('active');
		el.closest('.history-line').parent().find('.info.active').removeClass('active');
		$('.history-' + el.data('id')).addClass('active');

		return false;
	});
}

/*
	Slider filter 
	Filters element in slider and reinits swiper slider after
*/
function initSliderFilter(swiper) {

	var btns = $('.slider-filter'),
		container = $('.slider-filter-container');

	if (btns.length) {

		btns.on('click', 'a', function() {

			var el = $(this);
			var filter = $(this).data('filter');
			container.find('.filter-item').show();
			el.addClass('btn-active').siblings().removeClass('btn-active');

			if (filter !== '') {

				container.find('.filter-item').hide();
				container.find('.filter-item.filter-type-' + filter + '').fadeIn();
			}

			swiper.slideTo(0, 0);
			swiper.update();
			return false;
		});
	}
}

/* Parallax initialization */
function initParallax() {

	// Only for desktop
	if (/Mobi/.test(navigator.userAgent)) return false;

	$('.parallax').each(function() {
		
		$(this).parallax("50%", 0.5);		
	});

}

/* Scroll animation used for landing page */
function initScrollAnimation() {

	if (/Mobi/.test(navigator.userAgent)) return false;

	window.sr = ScrollReveal();

	var scrollZoomIn = {
		duration: 1500,
		opacity : 1,
		scale    : 0.01,
		distance: '130px',		
		origin: 'bottom',		
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	};

	var scrollTextFade = {		
		duration: 300,
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	var scrollTextFadeDelay = {
		delay: 1200,
		scale    : 0.01,		
		duration: 1000,
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	var scrollTextLeft = {
		delay: 400,		
		duration: 700,
		distance: '150%',
		origin: 'left',
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	var scrollTextRight = {
		delay: 400,
		duration: 700,
		distance: '150%',
		origin: 'right',
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	var scrollTextBottom = {
		duration: 800,
		distance: '150%',
		origin: 'bottom',
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	var scrollSliderFull = {
		duration: 500,
		scale : 1,
		easing   : 'ease-in-out',
		distance : '0px',
		afterReveal: function (domEl) { $(domEl).css('transition', 'all .3s ease'); }
	}

	/* Every element initialized once */
	if ($('#slider-full').length) {

		sr.reveal('#slider-full h1 span, #slider-full .line', scrollTextLeft, 300);
		sr.reveal('#slider-full a', scrollTextFadeDelay, 300);
	}
	if ($('#packages').length) {

		sr.reveal('#packages .item-left', scrollTextLeft);
		sr.reveal('#packages .item-right', scrollTextRight);
		sr.reveal('#packages .large', scrollTextBottom);
	}

	if ($('#design-project').length) sr.reveal('#design-project .divider', scrollZoomIn);

	if ($('#block-footer').length) {

		sr.reveal('#block-footer span, #block-footer p ', scrollTextFade, 100);
	}

}


/* Swiper slider initialization */
function initSwiper() {

	var slider_testimonials = $('#testimonials-slider'),
		slider_services = $('#services-slider'),
		slider_project = $('#project-slider'),
		slider_project_inner = $('#project-slider-inner'),
		slider_inner = $('.slider-inner');

	if (slider_testimonials.length) {

	    var clientsSwiper = new Swiper(slider_testimonials, {
			direction   : 'horizontal',

			speed		: 1000,
			nextButton	: '.arrow-right',
			prevButton	: '.arrow-left',
		
			autoplay    : 7000,
			autoplayDisableOnInteraction	: false,
	    });
	}

	if (slider_services.length) {

	    var servicesSwiper = new Swiper(slider_services, {
			direction   : 'horizontal',

			speed		: 1000,
			slidesPerView: 4,
			slidesPerGroup:1,
			nextButton	: '.arrow-right',
			prevButton	: '.arrow-left',
		
			autoplay    : 7000,
			autoplayDisableOnInteraction	: false,
	    });
	}

    if (slider_project.length) {

	    var projectSwiper = new Swiper(slider_project, {
			direction   : 'horizontal',

			speed		: 1000,
			slidesPerView: 3,
			slidesPerGroup:1,
			nextButton	: '.arrow-right',
			prevButton	: '.arrow-left',
	    });

		initSliderFilter(projectSwiper);
	}

    if (slider_project_inner.length) {

	    var projectSwiperInner = new Swiper(slider_project_inner, {
			direction   : 'horizontal',

			speed		: 1000,
			slidesPerView: 2,
			slidesPerGroup:1,
			nextButton	: '.arrow-right',
			prevButton	: '.arrow-left',
	    });
	}

	/* Slider for inner pages */	
    if (slider_inner.length) {	

	    var innerSwiper = new Swiper(slider_inner, {
			direction   : 'horizontal',
	        pagination: '.swiper-pagination',
	        paginationClickable: true,		
			autoplay    : 4000,
			autoplayDisableOnInteraction	: false,        
	    });
	}

	$(window).on('resize', function(){

		var ww = $(window).width()
		if (typeof servicesSwiper !== 'undefined') {

			if (ww > 991) { servicesSwiper.params.slidesPerView = 4; }
			if (ww <= 991) { servicesSwiper.params.slidesPerView = 3; }
			if (ww <= 768) { servicesSwiper.params.slidesPerView = 2; }		
			if (ww <= 479) { servicesSwiper.params.slidesPerView = 1; }		
		
			servicesSwiper.slideTo(0, 0);
			servicesSwiper.update();			
		}

		if (typeof projectSwiper !== 'undefined') {

			if (ww > 991) { projectSwiper.params.slidesPerView = 3; }
			if (ww <= 991) { projectSwiper.params.slidesPerView = 3; }
			if (ww <= 768) { projectSwiper.params.slidesPerView = 2; }		
			if (ww <= 479) { projectSwiper.params.slidesPerView = 1; }		
		
			projectSwiper.slideTo(0, 0);
			projectSwiper.update();			
		}		
	
		if (typeof projectSwiperInner !== 'undefined') {

			if (ww > 991) { projectSwiperInner.params.slidesPerView = 2; }
			if (ww <= 991) { projectSwiperInner.params.slidesPerView = 2; }	
			if (ww <= 768) { projectSwiper.params.slidesPerView = 2; }					
		
			projectSwiperInner.update();			
		}	

	}).resize();
}

/* Masonry initialization */
function initMasonry() {

	$('.masonry').masonry({
	  itemSelector: '.item',
	  columnWidth:  '.item'
	});		
}

/* Animated progress bar */
function initProgressBar() {

	var block = $('.progressItems'),
		progressBar = $('.progressBar');

    if (block.length) {

	    var scrollTop = block.offset().top - window.innerHeight;

	    if (!block.data('counted') && $(window).scrollTop() > scrollTop) {

	    	/* Initialized once */
			progressBar.each(function(i, el) {
				progressBar(parseInt($(el).find('.value').html(), 10), $(el));
			});

	    	block.data('counted', 1);
	    }  
	}
}

/* Progressbar animation */
function progressBar(percent, $element) {

    var progressBarWidth = percent * $element.width() / 100;
    $element.find('.bar div').animate({ width: progressBarWidth }, 1000);
}

/* Starting countUp function */
function checkCountUp() {

	var countBlock = $('#countUp');
    if (countBlock.length) {
	
	    var scrollTop = countBlock.offset().top - window.innerHeight;

	    if (!countBlock.data('counted') && $(window).scrollTop() > scrollTop) {

	    	/* Initialized once */
	    	$(countBlock).find('.countNum').each(function(i,el) {

				var numAnim = new CountUp($(el).attr('id'), 1, $(el).html(), 0, 2.5, {separator : ''});
				numAnim.start();
	    	});

	    	countBlock.data('counted', 1);
	    }  
	}
}

/* Navbar is set darker on main page on scroll */
function checkNavbar() {

	var scroll = $(window).scrollTop(),
    	navBar = $('nav.navbar'),
	    slideDiv = $('.slider-full');

    if (scroll > 1) navBar.addClass('dark'); else navBar.removeClass('dark');
}


/* Ajax Contact Form */
function initContactForm(){ 

	var formEl = $('.form-validate');

	formEl.validate({

		submitHandler: function(form) {

			var queryString = $(formEl).serialize(); 
			$.post('_ajax_send.php', queryString, function(answer) {

				if (answer) {

					formEl.html('<div class="warning">' + answer + '</div>');
				}	
			}); 
		}
	});
}

/* Google maps init */
function initMap() {

	var mapEl = $('#map');
	if (mapEl.length) {

		var uluru = {lat: mapEl.data('lat'), lng: mapEl.data('lng')};
		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: mapEl.data('zoom'),
		  center: uluru,
		  scrollwheel: false,
		  styles: mapStyles
		});

		var marker = new google.maps.Marker({
		  position: uluru,
		  icon: base_href + 'assets/images/location-black.png',
		  map: map
		});
	}
}
