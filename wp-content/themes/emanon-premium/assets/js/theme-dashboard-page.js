(function ($) {

$(function (){
	$('.nav-tab').on('click',function(){
		var $th = $(this).index();
		$('.nav-tab').removeClass('nav-tab-active');
		$('.tab-panel').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active');
		$('.tab-panel').eq($th).addClass('nav-tab-active');
	});
});

$(function (){
		if ($.cookie('num')) {
		var $num = $.cookie('num');
		} else {
			var $num = 0;
		}

		tabSwitching($num);

		$('.nav-tab').click(function() {
		var $num= $('.nav-tab').index(this);
			tabSwitching($num);
			$.cookie('num', $num, {expires: 1});
		});

		function tabSwitching($num ){
			$('.nav-tab').removeClass('nav-tab-active');
			$('.tab-panel').removeClass('nav-tab-active');
			$('.nav-tab').eq($num).addClass('nav-tab-active');
			$('.tab-panel').eq($num).addClass('nav-tab-active');
		}

});


})(jQuery);