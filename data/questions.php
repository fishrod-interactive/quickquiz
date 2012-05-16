<?php

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

/* How Cool Are You? */
$question = new Question();
$question->description = "How cool are you?";
$answers = array(
	new Answer('0%', 0),
	new Answer('30%', 30),
	new Answer('This is an answer', 60),
	new Answer('This is a second answer', 10)
);

$question->answers = $answers;

$quiz->addQuestion($question);