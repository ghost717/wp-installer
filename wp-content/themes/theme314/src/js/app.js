jQuery(document).ready(function ($) {

	// document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
	// ':35729/livereload.js?snipver=1"></' + 'script>')

	// SmoothScrolling
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	});

	var ofertaThumbs = $('.main__oferta .owl-carousel');
	ofertaThumbs.owlCarousel({
			loop:true,
			margin: 0,
			nav: true,
			dots: false,
			mouseDrag: false,
		//	lazyLoad : true,
		//	animateOut: 'fadeOut',
			navText: ["<", ">"],
			responsive:{
					0:{
							items:1
					},
					768:{
							items:2
					}
			}
	});
	
	// MENUTOGGLE
	$(".menu__toggle").click(function(event) {
		$(this).toggleClass('toggled');
		$("#menu").toggleClass('active');
	});

	$(".menu-item").click(function(event) {
		$(".menu__toggle").removeClass('toggled');
		$("#menu").removeClass('active');
	});
	
	//getForm
	$(".more.--form").click(function(event) {
		event.preventDefault();
		$("#ajaxForm").toggleClass('active');
	});
	
	$("#ajaxForm #exit").click(function(event) {
		event.preventDefault();
		$("#ajaxForm").toggleClass('active');
	});
		
	AOS.init({
		duration: 1000,
		delay: 300,
	});
});