<?php
	
	require_once 'config.php';
	require_once 'lib/facebook/src/facebook.php';
	
	require_once 'models/question.php';
	require_once 'models/answer.php';
	require_once 'models/reward.php';
	require_once 'models/quiz.php';
	
	// Setup the quiz
	$quiz = new Quiz();
	$quiz->name = 'The Brogrammer Challenge';
	$quiz->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla scelerisque volutpat tincidunt.';
	$quiz->image = 'img/test.jpg';

	require_once 'data/rewards.php';
	require_once 'data/questions.php';
	
	if(!empty($_POST)){
		
		foreach($_POST['answers'] as $key => $answer){
			$quiz->questions[$key]->answers[$answer]->chosen = true;
		}
		
		require_once 'templates/result.phtml';
		return;
		
	}
	
	require_once 'templates/index.phtml';
