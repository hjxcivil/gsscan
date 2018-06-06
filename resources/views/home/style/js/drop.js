$(function(){
	var w=$('.list img').first().width();
	var len=$('.list li').length;
	var index=0; timer=null;
	var $dot=$('.dot i');
	$dot.click(function(){
		$(this).css('background-color','red').siblings().css('background-color','');
		index=$(this).index();
		move();
	})
	function move(){
		if(index==len){
			index=0;
		}
		$('.list').animate({marginLeft:-100*index+'%'},10,function(){
			index++;
		});
		console.log(index);
		
		$dot.eq(index).css('background-color','red').siblings().css('background-color','');
	}
	timer = setInterval(move,1000);
	$('.banner').hover(function(){
		clearInterval(timer);
	},function(){
		timer=setInterval(move,1000);
	});
	
	
   
		$('.column dt').on('click', 'i',function(e){
			$(this).closest('dt').toggleClass('active').siblings().slideToggle();
		});
		
		$(window).resize(function(){
			if (this.innerWidth > 641) {
				$('.column dd').show(); 
			}
		})
	
	
	$('#menu').click(function(){
		$('.nav').fadeToggle();
	})

	$('.exp').on('click','i',function(){
		$(this).next().toggleClass('exped');
	});
})