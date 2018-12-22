jQuery(document).ready(function ($) {

	/**
	 * Animates to anchor if href has hashtag
	 */
	$(document).on('click', 'a[href^="#"]', function (e) {
		e.preventDefault();
		if ($.attr(this, 'href') != '#') {
			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top
			}, 500);
		}
	});

	/**
	 * Do action after scolling more than $scrollOffset 
	 */
	// var st;
	// var scrollOffset = 500;
	// $(window).scroll(function () {
	// 	st = $(document).scrollTop() >= scrollOffset ?
	// 		$(".header").removeClass('header--fixed') :
	// 		$(".header").addClass('header--fixed');
	// });


	/**
	 * escape key 
	 */
	// $(document).keyup(function (e) {
	// 	if (e.keyCode == 27) {
	// 		// hide lightbox
	// 	}
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


	/**
	 * Init headroom
	 */
	var header = document.querySelector("header");
	var headroom = new Headroom(header);
	headroom.init();

	/**
	 * Toggle mobile menu
	 */
	$(".menu__toggle").click(function () {
		$(".header").toggleClass('header--toggled');
		$("body").toggleClass('body--toggled');
	});

	$("body").addClass('loaded');


	console.log("https://websitestyle.pl - Strony internetowe - zapraszamy na rozmowę rekrutacyjną :)");
});