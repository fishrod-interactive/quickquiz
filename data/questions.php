<?php

/* Do you code? */
$question = new Question();
$question->description = "Do you code?";
$answers = array(
	new Answer('No', -600),
	new Answer('I know a bit, beginner style', 25),
	new Answer('I\'m fairly good at coding', 50),
	new Answer('I\'ll Java your Script', 75),
	new Answer('I code like Hugh Jackman in Swordfish', 100)
);

$question->answers = $answers;

$quiz->addQuestion($question);

/* What would your coding montage be played to? */
$question = new Question();
$question->description = "What would your coding montage be played to?";
$answers = array(
	new Answer('Justin Bieber', 0),
	new Answer('A classical piece, maybe by Chopin', 25),
	new Answer('The top 40 chart', 50),
	new Answer('Tu-Pac til I die', 75),
	new Answer('Dubstep baby!', 100)
);

$question->answers = $answers;

$quiz->addQuestion($question);

/* How would you describe your body? */
$question = new Question();
$question->description = "How would you describe your body?";
$answers = array(
	new Answer('Average at best', 0),
	new Answer('Bit of a beer belly', 25),
	new Answer('I try to look after my body', 50),
	new Answer('I work out, but the tan is natural', 75),
	new Answer('Ripped with a wicked tan!', 100)
);

$question->answers = $answers;

$quiz->addQuestion($question);

/* Do you have any coding eyewear? */
$question = new Question();
$question->description = "Do you have any coding eyewear?";
$answers = array(
	new Answer('No', 0),
	new Answer('Goggles', 25),
	new Answer('An eye patch', 50),
	new Answer('Ray Bans', 75),
	new Answer('Prada sunglasses', 100)
);

$question->answers = $answers;

$quiz->addQuestion($question);

/* What do you eat while coding? */
$question = new Question();
$question->description = "What do you eat while coding?";
$answers = array(
	new Answer('My mum makes me a packed lunch', 0),
	new Answer('I am so focused on coding I forget to eat', 25),
	new Answer('Snacks', 50),
	new Answer('Meat, meat, and meat - low carbs', 75),
	new Answer('A balanced diet of protein, carbs and veg', 100)
);

$question->answers = $answers;

$quiz->addQuestion($question);

/* How often do you party? */
$question = new Question();
$question->description = "How often do you party?";
$answers = array(
	new Answer('Never been invited out', 0),
	new Answer('Only on special occasions', 25),
	new Answer('Every weekend', 50),
	new Answer('Occasionally on a school night', 75),
	new Answer('Every night\'s a party!', 100)
);

$question->answers = $answers;

$quiz->addQuestion($question);