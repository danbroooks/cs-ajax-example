<?php

class VideoPageController extends Controller {

	public function handleRequest(Request $req){
		$response = new Response;
		$view = new View('base');

		$variables = array(
			"Title" => "Video Page",
			"Layout" => "videopageView",
			
			"HomeLinkClass" => "",
			"VideoLinkClass" => "active",
			
			"content" => "Videopage content from file."
		);


		// see Controller.php for notes

		if ($req->isAjax()) {
			$view = new View('videopageView');
		} else {
			$view = new View('base');
		}

		$response->setBody($view->render($variables));
		return $response;
	}

}