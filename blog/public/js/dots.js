var DotsGenerator = (function($) {
	'use strict';

	function randomRGB() {
		var r = $.randInt(0, 255);
		var g = $.randInt(0, 255);
		var b = $.randInt(0, 255);

		r = r.toString(16);
		g = g.toString(16);
		b = b.toString(16);

		return '#' + r + g + b;
	}

	function DotGenerator(interval, $container) {
		// Dots per second
		this.interval = interval * 1000;
		this.$container = $container;
	}

	DotGenerator.prototype.generateDots = function() {
		if (this.id) return;

		var $container = this.$container;

		var $dotContainer = $('<div></div>');
		$container.append($dotContainer);

		var addAndRemoveDots = function() {			
			var r2 = $.randInt(50, 100);

			var x = $.randInt(r2, $container.width() - r2);
			var y = $.randInt(r2, $container.height() * 0.6 - r2);

			var $dot = $('<div></div>');
			$dot.addClass('translucent-dot');
			$dot.css('background-color', randomRGB());
			$dot.css('width', r2 + 'px');
			$dot.css('height', r2 + 'px');
			$dot.css('left', x + 'px');
			$dot.css('bottom', y + 'px');

			$($dotContainer).append($dot.fadeIn(1000));

			$dot.fadeOut($.randInt(10000, 15000), function() {
				$(this).remove();
			});
		};

		addAndRemoveDots();
		this.id = setInterval(addAndRemoveDots, this.interval);
	};

	DotGenerator.prototype.stop = function() {
		if (this.id) clearInterval(this.id);
	};

	return DotGenerator;

})(jQuery);
