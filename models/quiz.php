<?php

class Quiz {
	
	public $questions = array();
	public $name = '';
	public $description = '';
	public $image = '';
	public $rewards = array();
	
	public function getRemainingQuestions(){
		
		$questions = 0;
		
		foreach($this->questions as $question){
			if($question->getUserAnswer()){
				$questions++;
			}
		}
		
	}
	
	public function addQuestion($question){
		$this->questions[] = $question;
	}
	
	public function getTotalQuestions(){
		return count($this->questions);		
	}
	
	public function getNextQuestion(){
		foreach($this->questions as $question){
			if($question->getUserAnswer() == false){
				return $question;
			}
		}
		
		return false;
	}
	
	public function getScore(){
		
		$score = 0;
		$answers = array();
		
		foreach($this->questions as $key => $question){
			if($question->getUserAnswer()){
				$answers[] = $question->getUserAnswer();
			}
		}
		
		foreach($answers as $answer){
			$score += $answer->percentage;
		}
				
		return round($score / count($answers));
		
	}
	
	public function getReward($score = null){
		
		if($score == null){
			$score = $this->getScore();
		}
		
		foreach($this->rewards as $reward){
			if($score <= $reward->threshold){
				return $reward;
			}
		}
		
		return false;
	}
	
}