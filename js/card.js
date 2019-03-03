$(function () {
	
	var click = true;
	$(document).on('click', '#card .card-kata', function(e){
		var t = 0;
		setInterval(function (argument) {
			t += 1;
			console.log(t)
			if (parseInt(t) == 10) {
				clearInterval(this);
				click = true;
			}
		}, 100);
		if (click) {
			click = false;
			if ($(this).hasClass('open')) {
				$(this).removeClass('open');
			} else {
				$(this).addClass('open');
			}
		}
		
	});
});