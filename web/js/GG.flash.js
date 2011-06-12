var GG = GG || {};

GG.flash = (function() {
	var flashArea	= false;
	var areaVisible	= true;
	var fadeTime	= 4000;
	var fadeSpeed	= 500;
	var queue 		= [];

	var fadeOut = function(flash) {
		$(flash).fadeOut(fadeSpeed, function() {
			$(this).remove();
			
			clean();
		});
	};

	var setFadeOut = function(flash) {
		setTimeout(function() { fadeOut(flash); }, fadeTime);
	};
	
	var newFlash = function(type, message) {
		var flash = $('<div />').addClass(type)
								.html(message)
								.hide();
		
		flashArea.append(flash);
		
		$(flash).fadeIn(fadeSpeed, function() {
			setFadeOut(flash);
		});
		
		$(flashArea).fadeIn(fadeSpeed);
					
		return flash;
	};
	
	var clean = function() {    						
		if(!$(flashArea).children().length) {
			$(flashArea).fadeOut(fadeSpeed);
		};
	};
	
	var scan = function() {	
		flashArea = $('#flash');
		
		if(!$(flashArea).children().length) {
			// ?
		} else {
			$(flashArea).children().each(function(f, flash) {
				setFadeOut(flash);
			});
		}
		
		$.each(queue, function(f, fn) {
			fn();			
		});
	};
	
	var flash = function(type, message) {
		var fn = function() {
			var flash = newFlash(type, message);
			setFadeOut(flash);
		};
		
		if(flashArea) {
			fn();
		} else {
			return queue.push(fn);
		}
	};
	
	$(window).load(scan);
	
	return flash;				
})();
