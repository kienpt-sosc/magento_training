jQuery.noConflict();
(function($){
	$(document).ready(function(){
		$('.products-grid li img').hover(function(){
			// $('#zoom-image').css('display','block');
			// $('#zoom-image img').attr("src",$(this).attr("src"));
			$(this).parent().append("<div class='zoom-image' style='left:"+$(this).attr('width')+"px;'><img src='"+$(this).attr("src")+"'  style='width:250px;'/></div>");
		},function(){
			// $('#zoom-image').css('display','none');
			$('.zoom-image').remove();
		});
	});	
})(jQuery);
