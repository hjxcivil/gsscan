$(function(){
	
	var	viewportWidth = window.innerWidth;
		if (viewportWidth >961 ) {
			$('.outer').hover(function(){
				$(this).find('ul').toggle();
			})
	
		}
	
	
	
})