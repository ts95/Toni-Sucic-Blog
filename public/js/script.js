$(function() {
	var dotGenerator = new DotsGenerator(1.5, $('.sidepane'));
	dotGenerator.generateDots();

	setTimeout(function() {
		$('.alert').fadeOut(1000, function() {
			$(this).remove();
		});
	}, 3000);
});
