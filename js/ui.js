jQuery(document).ready(function($){
	var actions = {
		toggleMenu: function(e){
			e.preventDefault();
			$('body').toggleClass('menu-open');
		},

		closeMenu: function(){
			$('body').removeClass('menu-open');
		}
	};

	$('html').on('touchstart', 'body.menu-open', function(e){
		if(!$(e.target).is('a')){
			actions.closeMenu.apply();
		}
	});

	$('html').on('click', 'body.menu-open', function(e){
		if(!$(e.target).is('a')){
			actions.closeMenu.apply();
		}
	});

	$('body').on('click', '[data-action]', function(){
		var action = $(this).data('action');
		if(action in actions){
			actions[action].apply(this, arguments);
		}
	});

	function processHeader(){
		if($(window).scrollTop() > 0){
			$('nav#navigation').addClass('bg');
		} else {
			if($('header#hero').length > 0 || $('div.featured-image').length > 0){
				$('nav#navigation').removeClass('bg');
				$('body').removeClass('spacing');
			}
		}
	}

	$(window).scroll(function(){
		processHeader();
	});
	processHeader();

});