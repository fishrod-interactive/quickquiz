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
		sendToFriend: function(URL, image, result){
			

		FB.ui({
          method: 'send',
          name: 'PCR Brogrammer Quiz',
          link: URL,
		  picture: image,
		  description: 'I just scored ' + result + ' in the PCR Digital Brogrammer Quiz! Can you beat me?'
        },
		
		function(response) {
	        	var message = 'Link successfully shared.', title = 'PCR Brogrammer Quiz - Link Shared', buttonLabel = '<input type="button" name="ok" value="OK" id="ok" onClick="FB.Dialog.remove(this);">', content = '<div id="window_container"><div id="title_bar">' +title+ '</div><p id="message">' + message + '</p><div id="bottom_bar">' +buttonLabel+ '</div></div>';
	
			var dialog = FB.Dialog.create({
                content: content,
                closeIcon: true,
                onClose: function() {
                        FB.Dialog.remove(this);
                },
                visible: true
			});
	 
			dialog.style.width='450px';
			dialog.style.height='137px';
		  }
		
		);
			
			return false;
		},
		postToTimeline: function(result, strapline, image){
			
			//FB UI STUFF HERE
			
			var obj = {
			  method: 'feed',
			  link: 'https://pcr-facebook.fishrod.co.uk/brogrammer',
			  picture: image,
			  name: 'The PCR Digital Brogrammer Quiz',
			  caption: 'I just scored ' + result + ' in the PCR Digital Brogrammer Quiz',
			  description: 'Think you can beat their score? Try now bro!'
			};
		
			function callback(response) {

			var message = 'Successfully posted to wall.', title = 'PCR Brogrammer Quiz - Link Shared', buttonLabel = '<input type="button" name="ok" value="OK" id="ok" onClick="FB.Dialog.remove(this);">', content = '<div id="window_container"><div id="title_bar">' +title+ '</div><p id="message">' + message + '</p><div id="bottom_bar">' +buttonLabel+ '</div></div>';
	
			var dialog = FB.Dialog.create({
                content: content,
                closeIcon: true,
                onClose: function() {
                        FB.Dialog.remove(this);
                },
                visible: true
			});
	 
			dialog.style.width='450px';
			dialog.style.height='137px';
			
			}
		
			return false;
			
		}
	};
	
})(jQuery);