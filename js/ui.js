jQuery(document).ready(function($){
	var actions = {
		
	};

	$('body').on('click', '[data-action]', function(){
		var action = $(this).data('action');
		if(action in actions){
			actions[action].apply(this, arguments);
		}
	});

	$(window).scroll(function(){
		processHeader();
	});
	processHeader();

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

});