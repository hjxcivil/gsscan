$(function () {
	var wrap = $('#wrap');
	var list = $('#list');
	var lists = list.find('li');
	
	var index = 1;
	var len = lists.length;
	var interval = 2500;
	var timer;
	
	
	play();
	
	$('.dot i').click(function(){
		index = $(this).index();
		showButton();
		play();
	})
	
	wrap.hover(stop,play);
	
	
	function showButton() {
		$('.dot i').eq(index).addClass('on').siblings().removeClass('on');
	}
	
	
	function play () {
		timer = setInterval(function(){
					index = index>len-1?0:index;
					$('.dot i').eq(index).addClass('on').siblings().removeClass('on');
					$('#list li:first').fadeTo(0.3).appendTo($('#list'));
					
					index++;
				},interval)
	}		
	
	
	function stop () {
		clearInterval(timer);
	}
	


	// function animate (offset) {
		// var left = parseInt(list.css('left')) + offset;
		// if (offset>0) {
			// offset = '+=' + offset;
		// }
		// else {
			// offset = '-=' + Math.abs(offset);
		// }
		// list.animate({'left': offset}, 300, function () {
			// if(left > -200){
				// list.css('left', -600 * len);
			// }
			// if(left < (-600 * len)) {
				// list.css('left', -600);
			// }
		// });
	// }

	// function showButton() {
		// buttons.eq(index-1).addClass('on').siblings().removeClass('on');
	// }

	// function play() {
		// timer = setTimeout(function () {
			// next.trigger('click');
			// play();
		// }, interval);
	// }
	// function stop() {
		// clearTimeout(timer);
	// }

	// next.bind('click', function () {
		// if (list.is(':animated')) {
			// return;
		// }
		// if (index == 5) {
			// index = 1;
		// }
		// else {
			// index += 1;
		// }
		// animate(-600);
		// showButton();
	// });

	// prev.bind('click', function () {
		// if (list.is(':animated')) {
			// return;
		// }
		// if (index == 1) {
			// index = 5;
		// }
		// else {
			// index -= 1;
		// }
		// animate(600);
		// showButton();
	// });

	// buttons.each(function () {
		 // $(this).bind('click', function () {
			 // if (list.is(':animated') || $(this).attr('class')=='on') {
				 // return;
			 // }
			 // var myIndex = parseInt($(this).attr('index'));
			 // var offset = -600 * (myIndex - index);

			 // animate(offset);
			 // index = myIndex;
			 // showButton();
		 // })
	// });

	// wrap.hover(stop, play);

	// play();

});