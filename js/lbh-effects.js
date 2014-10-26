
if (!jQuery) { throw new Error("LBH-EFFECTS requires jQuery") }

//SHAKE EFFECT
+function ($) { "use strict";
	$.fn.shake = function(intShakes, intDistance, intDuration) {
		this.each(function() {
			$(this).css("position","relative"); 
			for (var x=1; x<=intShakes; x++) {
				$(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
				.animate({left:intDistance}, ((intDuration/intShakes)/2))
				.animate({left:0}, (((intDuration/intShakes)/4)));
			}
		});
		return this;
	};  
}(window.jQuery);
