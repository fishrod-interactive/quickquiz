var app = (function($){
	
	var enhanceScore = function(){
		$('.score').each(function(){
			
			var timeout, callback, score, current = 0, $strapline, maxtimeout = 250, currenttimeout = 1, straplinewidth, $this = $(this);
			
			$strapline = $this.parent().find('.strapline');
			score = $this.data('score');
						
			callback = function(){
				if(current <= score){
					currenttimeout = maxtimeout * (((100 / score) * current) / 100); // One day I'll make you ease!
					$this.text(current);
					current ++;
					timeout = setTimeout(function(){
						callback();
					}, currenttimeout);
				} else {
					$('.strapline, .reward').animate({opacity: 1}, 200, 'linear', function(){
						$('.facebook').fadeIn('200');
					});
					clearTimeout(timeout);
				}
			};
			
			timeout = setTimeout(function(){
				callback();
			}, currenttimeout);
			
		});
	},
	enhanceQuestions = function(){
		$('form.questions').easyPaginate({
			step: 1
		});
	};
	
	return {
		init: function init(){
			enhanceQuestions();
			enhanceScore();
		},
		checkLogin: function(successcallback){
			FB.getLoginStatus(function(response){
				if(response.status === 'connected'){
					successcallback.call();
				} else if (response.status === 'not_authorized') {
					app.login(successcallback);
				} else {
					app.login(successcallback);
				}
			});
		},
		login: function login(successcallback){
			FB.login(function(response) {
			   if (response.authResponse) {
					successcallback.call();
				} else {
					
				}
			 }, {scope: 'publish_stream'});
		},
		checkLoginAndPost: function(result, strapline, image){
			app.checkLogin(function(){
				app.postToTimeline(result, strapline, image);
			});
		},
		postToTimeline: function(result, strapline, image){
			
			//FB UI STUFF HERE
			
			var obj = {
			  method: 'feed',
			  link: 'https://pcr-facebook.fishrod.co.uk/brogrammer',
			  picture: image,
			  name: 'The PCR Digital Brogrammer Quiz',
			  caption: 'I just scored ' + result + ' in the PCR Digital Brogrammer Quiz',
			  description: 'Using Dialogs to interact with users.'
			};
		
			function callback(response) {
			  document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
			}
		
			FB.ui(obj, callback);
			
		}
	};
	
})(jQuery);