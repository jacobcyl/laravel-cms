/*
Theme: Flatfy Theme
Author: Andrea Galanti
Bootstrap Version 
Build: 1.0
http://www.andreagalanti.it
*/

$(window).on('load', function() {
	//Preloader
	$('#status').delay(300).fadeOut();
	$('#preloader').delay(300).fadeOut('slow');
	$('body').delay(550).css({'overflow':'visible'});
});

$(document).ready(function() {

	$('.navbar-default').stickUp();

	$(".lazy").lazyload({
		effect : "fadeIn"
	});

	//Disable cut copy
	$('body').bind('cut copy', function (e) {
		e.preventDefault();
	});

	//Disable mouse right click
	$("body").on("contextmenu",function(e){
		return false;
	});
	
	//animated logo
	$(".navbar-brand").hover(function () {
		$(this).toggleClass("animated shake");
	});

	//animated scroll_arrow
	$(".img_scroll").hover(function () {
		$(this).toggleClass("animated infinite bounce");
	});

	//Wow Animation DISABLE FOR ANIMATION MOBILE/TABLET
	wow = new WOW(
	{
		mobile: false
	});
	wow.init();

	//MagnificPopup
	$('.image-link').magnificPopup({type:'image'});


	// OwlCarousel N1
	$("#owl-demo").owlCarousel({
		lazyLoad:true,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				dots: false,
			},
			600:{
				items:2,
				nav:true,
				dots: false,
			},
			800:{
				items:3,
				nav:false,
				dots: true,
			},
			1000:{
				items:4,
				nav:false,
				dots:true
			}
		}
	});

	// OwlCarousel N2
	$("#owl-demo-0").owlCarousel({
		items: 1,
		navigation : false, // Show next and prev buttons
		lazyLoad:true,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
	});

	// OwlCarousel
	$("#owl-demo-1").owlCarousel({
		items: 1,
		navigation : false, // Show next and prev buttons
		lazyLoad:true,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true
	});

	$("#owl-demo-2").owlCarousel({
		items: 1,
		navigation : false, // Show next and prev buttons
		lazyLoad:true,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true
	});

	//SmothScroll
	$('a[href*=\\#]').click(function() {
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

	//Subscribe
	//new UIMorphingButton( document.querySelector( '.morph-button' ) );
	// for demo purposes only
	[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) {
		bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
	} );

	$('.refresh-captcha').on('click', function () {
		var captcha = $(this).find('img');
		var config = $(this).data('refresh-config');
		$.ajax({
			method: 'GET',
			url: '/get_captcha/' + config,
		}).done(function (response) {
			captcha.prop('src', response);
		});
	});

	$('#contact-form').on('submit', function(e){
		e.preventDefault();
		var form = $(this);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: '/contact',
			type: 'POST',
			dataType: 'json',
			data:form.serialize()
		})
			.done(function(data){
				$('textarea[name="message"]').val('');
				$('.refresh-captcha').trigger('click');
				$('input[name="captcha"]').val('');
				$.toast({
					text : data.message,
					bgColor : '#3c763d',              // Background color for toast
					textColor : '#eee',            // text color
					allowToastClose : true,       // Show the close button or not
				})
			})
			.fail(function(jqXHR, textStatus, errorThrown){
				$('.refresh-captcha').trigger('click');
				$('input[name="captcha"]').val('');
				for(key in jqXHR.responseJSON.errors){
					//$(":input[name="+key+"]").addClass('warning-border');
					$.toast({
						text : jqXHR.responseJSON.errors[key][0],
						bgColor : '#a94442',              // Background color for toast
						textColor : '#eee',            // text color
						allowToastClose : true,       // Show the close button or not
					})
				}
			});
	})

});

