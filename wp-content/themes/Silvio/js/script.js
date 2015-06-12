jQuery(document).ready(function($) {

	if($(window).width() > 768 ) {
		var $container = $('ul.menu li ul'),
			$menuHeight = $container.outerHeight();
			
		$container.css({'top':-$menuHeight,'display':'none'});

		$('ul.menu li').hover(
			function(){ $(this).children('ul').stop().fadeIn(); },
			function(){ $(this).children('ul').stop().fadeOut(); }
		);
	};

	$('#scroller').niceScroll();
	
	$('.team.tmsl ul.slides li span').hide();
	$('.team.tmsl ul.slides li').hover(
		function(){ $(this).animate({'height': '345px', 'margin-top': '0px'}, 500).children('span').fadeIn(); },
		function(){ $(this).animate({'height': '313px', 'margin-top': '31px'}, 500).children('span').fadeOut(); }
	);
	
	$('.mobile_menu').on('click', function() {
		$('ul.menu').slideToggle();
		$('.home-container').toggleClass('btt');
		$('.this_is_sparta').fadeToggle();
	});
	
	
	
	$('.team-direction-nav li').css({'opacity':'0.5'});
	$('.team-direction-nav li a').parent().css({'opacity':'1'});

	$('.flexslide').flexslider({
		controlNav: false
	});
	
	$(window).scroll(function(){
		if  ($(window).scrollTop() >= 400 && $(window).height() > $('.sidebar-container').height()){
			$('.sidebar-container').css({'left': '765px', 'top': '0', 'position': 'fixed'});
		} else {
			$('.sidebar-container').css({'left': '100%', 'top': '50px', 'position': 'absolute'});
		}
	});
	
	$(function () {
		$('.tta').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

	$('.jCar').jcarousel({
		vertical: true,
		// auto: 2,
		scroll: 1
	});

	// $("#menu-menu").lavaLamp();

});

/*----------------------------------------------------*/
/*	Isotope Portfolio Filter
/*----------------------------------------------------*/

jQuery(window).load(function(){
	jQuery('#portfolio-wrapper').isotope({
		itemSelector : '.portfolio-item',
		layoutMode : 'fitRows'
	});
		
	jQuery('#filters a.selected').trigger("click");
});

jQuery('#filters a').click(function(e){
	e.preventDefault();

	var selector = jQuery(this).attr('data-option-value');
	jQuery('#portfolio-wrapper').isotope({ filter: selector });

	jQuery(this).parents('ul').find('a').removeClass('selected');
	jQuery(this).addClass('selected');
});