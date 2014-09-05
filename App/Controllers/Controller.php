<?php

class Controller {

	public function handleRequest(Request $req){
		$response = new Response;
		$view = new View('base');
		
		$variables = array(
		"Title" => "Home Page",
		"Layout" => "homepageView",
		"content" => "Homepage content from file."
		);
		
		$response->setBody($view->render($variables));
		
		return $response;
	}
}
