jQuery(document).ready(function ($) {
    var main__slider = $('.main__slider .owl-carousel');
	main__slider.owlCarousel({
			loop:true,
			margin: 0,
			nav: true,
			dots: false,
			mouseDrag: false,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
		//	lazyLoad : true,
			// animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			navText: ["<", ">"],
			responsive:{
					0:{
							items:1
					},
					768:{
							items:1
					}
			}
	});

	$('.tel__hover').on( 'click', function(event){
		event.preventDefault();

		var href = $(this).prev().attr( 'href');
		var h1 = href.substring(4,7);
		var h2 = href.substring(7, 10);
		var h3 = href.substring(10, 13);
		var h4 = href.substring(13, 16);
		//dzielenie
		$(this).prev().html(h1 + ' ' + h2 + ' ' + h3 + ' ' + h4);

		$(this).css('display', 'none');
		$(this).prev().css('visibility', 'visible').css('display', 'inline-block');
		$(this).parent().addClass('active');	
	});

	$(".modal__form #exit").click(function(event) {
		event.preventDefault();

		$(".modal__form").removeClass('lightbox');
		$(".modal__form").removeClass('active');

		window.history.back();
    });
});