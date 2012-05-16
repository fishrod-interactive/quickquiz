var app = (function($){
	
	var enhanceScore = function(){
		$('.score').each(function(){
			
			var timeout, callback, score, current = 0, $strapline, maxtimeout = 250, currenttimeout = 1, straplinewidth, $this = $(this);
			
			$strapline = $this.parent().find('.strapline');
			score = $this.data('score');
						
			callback = function(){
				if(current < score){
					currenttimeout = maxtimeout * (((100 / score) * current) / 100); // One day I'll make you ease!
					$this.text(current);
					current ++;
					timeout = setTimeout(function(){
						callback();
					}, currenttimeout);
				} else {
					$('.strapline').animate({opacity: 1}, 200, 'linear', function(){
						$('.facebook').fadeIn('200');
					});
					clearTimeout(timeout);
				}
			};
			
			timeout = setTimeout(function(){
				callback();
			}, currenttimeout);
			
		});
	}
	
	return {
		init: function init(){
			enhanceScore();
		}
	}
	
})(jQuery);