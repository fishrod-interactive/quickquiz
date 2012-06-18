<?php
	
	require_once 'config.php';
	require_once 'lib/facebook/src/facebook.php';
	
	require_once 'models/question.php';
	require_once 'models/answer.php';
	require_once 'models/reward.php';
	require_once 'models/quiz.php';
	
	$facebook = new Facebook(array(
		'appId'	=> FB_APP_ID,
		'secret' => FB_APP_SECRET,
		'cookie' => true
	));
	
	$signedRequest = $facebook->getSignedRequest();
	
	// Setup the quiz
	$quiz = new Quiz();
	$quiz->name = 'Are You a Brogrammer?';
	$quiz->description = 'Code with your aviators on? Write code comments that are funny only to you?<br />If you code and look cool, let\'s see how you do!';
	$quiz->image = 'img/test.jpg';	

	require_once 'data/rewards.php';
	require_once 'data/questions.php';
	
	if(!empty($_POST) && !isset($_POST['signed_request'])){

		foreach($_POST['answers'] as $key => $answer){
			$quiz->questions[$key]->answers[$answer]->chosen = true;
		}
		
		$protocol = (isset($_SERVER['HTTPS'])) ? 'https' : 'http';
		$directory = dirname($_SERVER['PHP_SELF']);

		$imageurl = sprintf('%s://%s%s/reward.php?percentage=%s', $protocol, $_SERVER['SERVER_NAME'], $directory, $quiz->getScore());
		$facebookURL = sprintf('%s://%s%s/', $protocol, $_SERVER['SERVER_NAME'], $directory);
		
		require_once 'templates/result.phtml';
		return;
		
	}
	
	// Users not on Facebook, direct them to the PCR Digital Facebook Page

	if(!isset($signedRequest['page'])){
		header(sprintf('Location: %s', PAGE_APP_URL));
		return;
	}
	
	// Users who haven't like the page show the like screen
	
	if($signedRequest['page']['liked'] == false){
		require_once 'templates/like.phtml';
		return;
	}
	
	require_once 'templates/index.phtml';
