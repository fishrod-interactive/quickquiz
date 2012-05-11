<?php

class Answer {
	
	public $description = '';
	public $percentage = 0;
	public $chosen = false;
	
	public function __construct($description, $percentage){
		$this->description = $description;
		$this->percentage = $percentage;
	}
	
}