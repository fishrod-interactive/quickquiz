<?php

class Question {
	
	public $answers = array();
	public $description = '';
	public $image = '';
	
	public function getUserAnswer(){
		foreach($this->answers as $answer){
			if($answer->chosen === true){
				return $answer;
			}
		}
		
		return false;
	}
	
	public function addAnswer($answer){
		$this->answers[] = $answer;
	}
	
}