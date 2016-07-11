var main = function() {
	$('.menuToggle').click( function(e){

		var menuWidthPerc = ((document.getElementById("menu").clientWidth/document.getElementById("background").clientWidth)-(document.getElementById("menuButton").clientWidth/document.getElementById("background").clientWidth))*100;
		var rect = $('#menu').position().left;
		var against = 1200;
		var away = 1000;

		if(rect >= 0){
			// Hides the menu bar if it is showing and resizes the body and its text
			$('#menu').animate({left: '-'+menuWidthPerc+'%'}, against);
			$('.menu_item').delay(700).fadeToggle();
			$('#mainBody').animate({left: '-='+menuWidthPerc+'%',width: '+='+(menuWidthPerc)+'%'}, away); //Changing the width/height causes the page to jump to top unless height is fixed...
	
		}
		else{
			// Resets the menu bar and resets the body and its text 
			$('.menu_item').toggle();
			$('#menu').animate({left: '0%'}, against);
			$('#mainBody').animate({left: '0%',width: '100%'}, against);
		}
		return false;
	});
}
$(document).ready(main);