$(function() {
	$('button[data-toggle="popover"]').popover()
});
$(document).ready(function() {
	var stickyNavTop = $('#stickyNav').offset().top;
	var stickyNav = function() {
		var scrollTop = $(window).scrollTop();
		if (scrollTop > stickyNavTop) {
			$('#stickyNav').removeClass('navbar navbar-default navbar-fixed-top');
			$('#stickyNav').addClass('navbar navbar-inverse navbar-fixed-top');
		} else {
			$('#stickyNav').removeClass('navbar navbar-inverse navbar-fixed-top');
			$('#stickyNav').addClass('navbar navbar-default navbar-fixed-top');
		}
	};
	stickyNav();
	$(window).scroll(function() {
		stickyNav();
	});
});



$(document).ready(function(){

	// hide #back-top first
	$("#top-up").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#top-up').fadeIn();
			} else {
				$('#top-up').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#top-up').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
