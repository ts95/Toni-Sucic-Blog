$(function() {
	window.dotGenerator = new DotGenerator(1.5, $('.sidepane'));
	window.dotGenerator.generateDots();

	setTimeout(function() {
		$('.alert').fadeOut(1000, function() {
			$(this).remove();
		});
	}, 3000);
});
