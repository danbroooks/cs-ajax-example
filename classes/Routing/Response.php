<?php

class Response {

	private $body;

	public function setBody($body){
		$this->body = $body;
	}

	public function output(){
		echo $this->body;
		die;
	}

}