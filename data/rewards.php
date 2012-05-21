<?php
	
	/* Create the rewards */
	$rewards = array(
		new Reward(0, 'You can\'t even code, you\'re no developer!', 'img/rubbish.png'),
		new Reward(20, 'You are a true programmer, none of this frat boy rubbish - we salute you!', 'img/not-bad.png'),
		new Reward(30, 'Dude, your cool, but you\'re no brogrammer', 'img/alright.png'),
		new Reward(80, 'Complete geek chic, but not quite a brogrammer! ', 'img/awesome.png'),
		new Reward(100, 'Totes brogrammer stuff there dude', 'img/awesome.png')
	);
	
	$quiz->rewards = $rewards;