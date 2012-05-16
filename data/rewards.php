<?php
	
	/* Create the rewards */
	$rewards = array(
		new Reward(0, 'Your rubbish', 'img/rubbish.png'),
		new Reward(20, 'You\'re not too bad', 'img/not-bad.png'),
		new Reward(30, 'You\'re alright', 'img/alright.png'),
		new Reward(80, 'You\'re not quite awesone!', 'img/awesome.png'),
		new Reward(100, 'You\'re fucking awesone!', 'img/awesome.png')
	);
	
	$quiz->rewards = $rewards;