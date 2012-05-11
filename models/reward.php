<?php

class Reward {
	
	public $threshold = 0;
	public $message = '';
	public $image;
	
	public function __construct($threshold, $message, $image){
		$this->threshold = $threshold;
		$this->message = $message;
		$this->image = $image;
	}
	
}