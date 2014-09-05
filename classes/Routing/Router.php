<?php 

class Router {

	private $rules;

	public function __construct() {
		$this->rules = array();
	}

	public function handle(){
		$req = new Request;

		if ($this->hasRule($req->url)) {
			$controllerName = $this->rules[$req->url];
			$controller = new $controllerName;
			$response = $controller->handleRequest($req);
		} else {
			$response = new Response;
			$response->setBody("404");
		}
		$response->output();
	}

	public function hasRule($url) {
		return array_key_exists($url, $this->rules);
	}

	public function rule($url, $controller){
		$this->rules[$url] = $controller;
	}

}

