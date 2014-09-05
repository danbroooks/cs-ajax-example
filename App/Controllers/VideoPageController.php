<?php

class VideoPageController extends Controller {

	public function handleRequest(Request $req){
		$response = new Response;
		$view = new View('base');

		$variables = array(
			"Title" => "Video Page",
			"Layout" => "videopageView",
			"content" => "Videopage content from file."
		);
		
		$response->setBody($view->render($variables));
		
		return $response;
	}

}