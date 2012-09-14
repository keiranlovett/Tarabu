$(document).ready(function() {

	$('.logo').localScroll();
	$('#nav').localScroll();
	$('#nav2').localScroll();
	$('#nav3').localScroll();
	$('#nav4').localScroll();
	$('#nav5').localScroll();
	$('#nav6').localScroll();


// Wrap image in span, create circle, hide original
$(".artwork").load(function() {
	$(this).wrap(function(){
		return '<span class="imageCirc' + $(this).attr('class') + '" style="background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width()+10 + 'px; height: ' + $(this).height()+10 + 'px;" />';
	});
});

	var $window = $(window);
	var $bg_title = $('#title');
	var $bg_music = $('#music');
	var $bg_videos = $('#videos');
	var $bg_bio = $('#about');
	var $bg_contact = $('#contact');
	var micro1 = $("#title .micro1");


	var windowHeight = $window.height();

	$('#title, #music, #videos, #about, #contact').bind('inview', function (event, visible) {
			if (visible == true) {
				$(this).addClass("inview");
			} else {
				$(this).removeClass("inview");
			}
		});
	
	function newPos(x, windowHeight, pos, adjuster, inertia){
		return x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px";
	}
	
	function Move(){ 
		var pos = $window.scrollTop();

		if($bg_title.hasClass("inview")){
			$bg_title.css({'backgroundPosition': newPos(50, windowHeight, pos, 0, 0.1)});
			micro1.css({'backgroundPosition': newPos(50, windowHeight, pos, 665, 0.5)}); 
		}		
		if($bg_music.hasClass("inview")){
			$bg_music.css({'backgroundPosition': newPos(50, windowHeight, pos, 5000, -0.1)});
		}
		if($bg_videos.hasClass("inview")){
			$bg_videos.css({'backgroundPosition': newPos(50, windowHeight, pos, 3000, 0.05)});
		}
		if($bg_bio.hasClass("inview")){
			$bg_bio.css({'backgroundPosition': newPos(50, windowHeight, pos, 7000, -0.1)});
		}
		if($bg_contact.hasClass("inview")){
			$bg_contact.css({'backgroundPosition': newPos(50, windowHeight, pos, 4700, 0.1)});

		}
		$('#pixels').html(pos);
	}
	
	$window.resize(function(){
		Move();
	});		
	
	$window.bind('scroll', function(){
		Move();
	});
	
});