jQuery(document).ready(function ($) {
	
	//mac datepicker
	if ( $('[type="date"]').prop('type') != 'date' ) {
		$('[type="date"]').datepicker();
	}
	
	// var sName = "cookies";
	// $("#cookies #exit").click(function () {
	// 	var oExpire = new Date();
	// 	oExpire.setTime((new Date()).getTime() + 3600000 * 24 * 365);
	// 	document.cookie = sName + "=1;expires=" + oExpire;
	// 	$("#cookies").fadeOut();
	// });

	// var sStr = '; ' + document.cookie + ';';
	// var nIndex = sStr.indexOf('; ' + escape(sName) + '=');
	// if (nIndex === -1) {
	// 	$("#cookies").show();
	// }

	var sName = "314cookies";
	var visited = $.cookie(sName)

    if (visited == null) {
        $("#cookies").fadeIn();       
    }
	$("#cookies #exit").click(function (event) {
		event.preventDefault();
		$.cookie(sName, 'yes', { expires: 1, path: '/' });
		$("#cookies").fadeOut();
	});

	// MENUTOGGLE
	$(".menu-item-has-children").click(function(event) {
		event.preventDefault();
		// $(this).toggleClass('active');
	});
	
	$(".menu-item-has-children ul li a").click(function(event) {
		window.location.href = $(this).attr('href');
	});
	
	$("#menuToggle input, #menuToggle span").click(function(event) {
		// event.preventDefault();
		$('.header').toggleClass('active');
	});

	// $(".menu__toggle").click(function(event) {
	// 	event.preventDefault();
		
	// 	$(this).toggleClass('toggled');
	// 	$(this).closest('li').find('.sub-menu').eq(0).toggleClass('active');
	// 	$(".header").toggleClass('active');
	// });

	// $(".menu-item").click(function(event) {
	// 	$(".menu__toggle").removeClass('toggled');
	// 	$(".header").removeClass('active');
	// });
	
	// var main__slider = $('.main__slider .owl-carousel');
	// main__slider.owlCarousel({
	// 		loop:true,
	// 		margin: 0,
	// 		nav: true,
	// 		dots: false,
	// 		mouseDrag: false,
	// 		autoplay:true,
	// 		autoplayTimeout:3000,
	// 		autoplayHoverPause:true,
	// 	//	lazyLoad : true,
	// 	//	animateOut: 'fadeOut',
	// 		navText: ["<", ">"],
	// 		responsive:{
	// 				0:{
	// 						items:1
	// 				},
	// 				768:{
	// 						items:1
	// 				}
	// 		}
	// });

	// $('.tel__hover').on( 'click', function(event){
	// 	event.preventDefault();

	// 	var href = $(this).prev().attr( 'href');
	// 	var h1 = href.substring(4,7);
	// 	var h2 = href.substring(7, 10);
	// 	var h3 = href.substring(10, 13);
	// 	var h4 = href.substring(13, 16);
	// 	//dzielenie
	// 	$(this).prev().html(h1 + ' ' + h2 + ' ' + h3 + ' ' + h4);

	// 	$(this).css('display', 'none');
	// 	$(this).prev().css('visibility', 'visible').css('display', 'inline-block');
	// 	$(this).parent().addClass('active');	
	// });

	// $(".modal__form #exit").click(function(event) {
	// 	event.preventDefault();

	// 	$(".modal__form").removeClass('lightbox');
	// 	$(".modal__form").removeClass('active');

	// 	window.history.back();
	// });
	
	// rellax example
	// var rellax = new Rellax('.rellax', {
	//   center: true,
	//   vertical: true,
	// });


	// animejs example
	// var cssSelector = anime({
	// 	targets: '.class',
	// 	translateX: 250
	// });


	// aio example
	// aio({
	// 	offset: 0,
	// 	speed: 500
	// });

});