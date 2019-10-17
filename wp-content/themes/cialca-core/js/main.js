jQuery(document).ready(function($){
'use strict';


    // preloader
	jQuery(window).load(function () {
		$('#preloader').fadeOut('slow', function () {
			$(this).remove();
		});
	});

	$('.li-btn').appendTo('#top-bar__navigation > ul');

	(function()
	{
		var oInterval = setInterval(function ()
		{
			if (typeof window.jQuery !== 'undefined')
			{
				clearInterval(oInterval);

				jQuery(document).ready(function($){

					$('#start-screen-owl').children('.owl-carousel').owlCarousel({
						loop: true,
						nav: false,
						dots: true,
						autoplay: true,
						autoplayTimeout: 5000,
						autoplayHoverPause: true,
						autoHeight: true,
						smartSpeed: 1000,
						margin: 0,
						navText: [
							'<i class="fa fa-angle-left"></i>',
							'<i class="fa fa-angle-right"></i>'
						],
						responsive: {
							0:{
								items:1
							},
							500:{
								items:2
							},
							992:{
								items:3
							},
							2000:{
								items:4
							}
						},
						onInitialized: _fixed_menu
					});
				});
			}
		}, 500);
	})();



var $window = $(window);

/* fixed menu
================================================== */
function _fixed_menu ()
{
	var nTopBar = document.getElementById('top-bar'),
		jTopBar = $(nTopBar),
		iTop    = jTopBar.next('header').innerHeight() + 120;

	window.onscroll = function() {
		if ( (window.pageYOffset || document.documentElement.scrollTop) >= iTop ) {

			jTopBar.addClass('fixed in');

		} else if ( jTopBar.hasClass('fixed') ) {

			jTopBar.removeClass('in').addClass('out');

			setTimeout(function(){
				jTopBar.removeClass('fixed out');
			}, 100 );
		};
	};
};

$(window).scroll(function(){
	if ($(this).scrollTop() > 10) {
	   $('#top-bar').addClass('mobile-header-after-scroll');
	} else {
	   $('#top-bar').removeClass('mobile-header-after-scroll');
	}
});
/* main menu
================================================== */
function _main_menu ()
{
	var nTopBar      = document.getElementById('top-bar'),
		nMenuToggler = document.getElementById('top-bar__navigation-toggler'),
		nNav         = document.getElementById('top-bar__navigation'),

		jTopBar      = $(nTopBar),
		jMenuToggler = $(nMenuToggler),
		jNav         = $(nNav),

		jLink        = jNav.find('li a'),
		jSubMenu     = jNav.find('.submenu'),
		TopBarHeight = 0;

	if ( jSubMenu.length ) { jSubMenu.parents('li').addClass('has-children'); };

	if ( jMenuToggler.is(':visible') )
	{
		TopBarHeight = 70;
	}
	else
	{
		TopBarHeight = 80;
	};

	jLink.on('touchend click', function (e) {

		var $this = $(this),
			$parent = $this.parent();
if ($('.page.page-id-180').length > 0) {
		if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname )
		{
			var target = $(this.hash);

			target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');

			if ( target.length )
			{
				$('html,body').stop().animate({
					scrollTop: target.offset().top - TopBarHeight
				}, 1000);
			}

			if ( jMenuToggler.is(':visible') )
			{
				jTopBar.removeClass('expanded');
				jMenuToggler.removeClass('active');
			};

			return false;
		};
}
		if ( jMenuToggler.is(':visible') && $this.next(jSubMenu).length )
		{
			if ( $this.next().is(':visible') )
			{
				$parent.removeClass('drop_active');
				$this.next().slideUp('fast');

			} else {

				$this.closest('ul').find('li').removeClass('drop_active');
				$this.closest('ul').find('.submenu').slideUp('fast');
				$parent.addClass('drop_active');
				$this.next().slideDown('fast');
			};

			return false;
		};
	});

	jMenuToggler.on('touchend click', function (e) {
		e.preventDefault();

		var $this = $(this);

		$this.toggleClass('active');
		jTopBar.toggleClass('expanded');

		return false;
	});

	$window.smartresize(function() {

		if ( window.innerWidth >= 767 )
		{
			jTopBar.removeClass('expanded');
			jMenuToggler.removeClass('active');
		}
	});
};

/* owl carousel
================================================== */
function _owl_carousel ()
{
	var fSlider = $('.feedbacks--slider');

	if ( fSlider.length > 0 )
	{
		var timeout = $('.feedbacks--slider').attr('data-owl-autoplaytimeout');
		var time_out = timeout ? parseInt(timeout) : 6000;
		var smartspeed = $('.feedbacks--slider').attr('data-owl-smartspeed');
		var smart_speed = smartspeed ? parseInt(smartspeed) : 1000;
		fSlider.children('.owl-carousel').owlCarousel({
			loop: true,
			nav: false,
			dots: true,
			autoplay: true,
			autoplayTimeout: time_out,
			autoplayHoverPause: true,
			autoHeight: true,
			smartSpeed: smart_speed,
			margin: 30,
			navText: [
				'<i class="fa fa-angle-left"></i>',
				'<i class="fa fa-angle-right"></i>'
			],
			responsive: {
				0:{
					items:1
				},
				992:{
					items:1
				}
			}
		});
	}

};

/* isotope sorting
================================================== */
function _isotope_sorting ()
{
	var nOptionSets = document.getElementById('gallery-set'),
		jOptionSets = $(nOptionSets);

	if ( jOptionSets.length > 0 )
	{
		var jIsoContainer = $('.js-isotope'),
			jOptionLinks = jOptionSets.find('a');

		jOptionLinks.on('click', function(e) {
			var $this = $(this),
				currentOption = $this.data('cat');

			jOptionSets.find('.selected').removeClass('selected');
			$this.addClass('selected');

			if (currentOption !== '*') {
				currentOption = '.' + currentOption;
			}

			jIsoContainer.isotope({filter : currentOption});

			return false;
		});
	};
};

/* chart
================================================== */
function _chart ()
{
	$('.skill__item').appear(function() {
		var _self = $(this);

		setTimeout(function() {
			_chartInit(_self);
		}, 200);
	});

	function _chartInit(el)
	{
		$('.js-chart',el).each(function () {
			$(this).easyPieChart({
				easing: 'easeOutElastic',
				delay: 3000,
				barColor: '#369670',
				trackColor: '',
				scaleColor: false,
				lineWidth: 12,
				trackWidth: 12,
				size: 175,
				lineCap: 'butt',
				onStep: function(from, to, percent) {
					this.el.children[0].innerHTML = Math.round(percent);
				}
			});
		});
	};
};

/* counters
================================================== */
function _count()
{
	$('.counter__item').appear(function() {
		var _self = $(this);

		setTimeout(function() {
			_countInit(_self);
		}, 200);
	});

	function _countInit(el)
	{
		$('.js-count',el).each(function() {
			if( !$(this).hasClass('animate') )
			{
				$(this).countTo({
					from: 0,
					speed: 2000,
					refreshInterval: 100,
					onComplete: function() {
						$(this).addClass('animate');
					}
				});
			}
		});
	};
};

/* parallax
================================================== */
function _parallax ()
{
	if ( device.desktop() )
	{
		$.stellar({
			scrollProperty: 'scroll',
			verticalOffset: 0,
			horizontalOffset: 0,
			horizontalScrolling: false
		});

		$window.smartresize(function() {
			$.stellar('refresh');
		});
	};
};

/* scroll to top
================================================== */
function _scrollTop ()
{
	var	nBtnToTopWrap = document.getElementById('btn-to-top-wrap'),
		jBtnToTopWrap = $(nBtnToTopWrap);

	if ( jBtnToTopWrap.length > 0 )
	{
		var nBtnToTop = document.getElementById('btn-to-top'),
			jBtnToTop = $(nBtnToTop);

		jBtnToTop.on('click', function (e) {
			e.preventDefault();

			$('body,html').stop().animate({ scrollTop: 0 } , 1500);

			return false;
		});

		$window.on('scroll', function(e) {

			if ( $window.scrollTop() > jBtnToTop.data('visible-offset') )
			{
				if ( jBtnToTopWrap.is(":hidden") )
				{
					jBtnToTopWrap.fadeIn();
				};

			} else {

				if ( jBtnToTopWrap.is(":visible") )
				{
					jBtnToTopWrap.fadeOut();
				};
			};
		});
	};
};

/* boxer gall
================================================== */
function _gall ()
{
	var galleryElement = $("a[data-gallery]");

	if ( galleryElement.length > 0 )
	{
		galleryElement.boxer({
			fixed: true,
			videoWidth: 1000
		});
	}
};

/* smartresize
================================================== */
(function($,sr){

	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;

		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
					if (!execAsap)
							func.apply(obj, args);
					timeout = null;
			};

			if (timeout)
					clearTimeout(timeout);
			else if (execAsap)
					func.apply(obj, args);

			timeout = setTimeout(delayed, threshold || 100);
		};
	}
	// smartresize
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
})(jQuery,'smartresize');



	/* fixed menu
	================================================== */
	_fixed_menu();

	/* main menu
	================================================== */
	_main_menu();

	/* owl carousel
	================================================== */
	_owl_carousel();

	/* isotopeSort
	================================================== */
	_isotope_sorting();

	/* chart
	================================================== */
	_chart();

	/* counters
	================================================== */
	_count();

	/* parallax
	================================================== */
	_parallax();

	/* scroll to top
	================================================== */
	_scrollTop();

	/* boxer gall
	================================================== */
	_gall();


	$window.on('load', function () {

		var jIsotope = $('.js-isotope');

		if ( jIsotope.length )
		{
			jIsotope.isotope('layout');
		};

	});
	/* google map
	================================================== */
});

if (navigator.userAgent.indexOf('Safari') != -1 &&
    navigator.userAgent.indexOf('Chrome') == -1) {
        document.body.className += " safari";
    }
