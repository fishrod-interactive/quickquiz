<?php
	
	require_once 'models/question.php';
	require_once 'models/answer.php';
	require_once 'models/reward.php';
	require_once 'models/quiz.php';

	// Setup the quiz
	$quiz = new Quiz();
	$quiz->name = 'Test Quiz';
	$quiz->description = 'Test Description';
	$quiz->image = 'img/test.jpg';
	
	/* Create the rewards */
	$rewards = array(
		new Reward(0, 'Your rubbish', 'img/rubbish.png'),
		new Reward(20, 'You\'re not too bad', 'img/not-bad.png'),
		new Reward(30, 'You\'re alright', 'img/alright.png'),
		new Reward(80, 'You\'re not quite awesone!', 'img/awesome.png'),
		new Reward(100, 'You\'re fucking awesone!', 'img/awesome.png')
	);
	
	$quiz->rewards = $rewards;
	
	/* How Cool Are You? */
	$question = new Question();
	$question->description = "How cool are you?";
	$answers = array(
		new Answer('0%', 0),
		new Answer('30%', 30),
		new Answer('70%', 70)
	);
	
	$question->answers = $answers;
	
	$quiz->addQuestion($question);

	/* How many fingers do you have? */
	$question = new Question();
	$question->description = "How many fingers do you have?";
	$answers = array(
		new Answer('0%', 0),
		new Answer('30%', 30),
		new Answer('70%', 70)
	);
	
	$question->answers = $answers;
	
	$quiz->addQuestion($question);
	
	if(!empty($_POST)){
		
		foreach($_POST['answers'] as $key => $answer){
			$quiz->questions[$key]->answers[$answer]->chosen = true;
		}
		
		require_once 'templates/result.phtml';
		return;
		
	}
	
	require_once 'templates/index.phtml';

?>