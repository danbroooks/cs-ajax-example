<?php

class Controller {

	public function handleRequest(Request $req){
		$response = new Response;

		$variables = array(
			"Title" => "Home Page",
			"Layout" => "homepageView",
			"HomeLinkClass" => "active",
			"content" => "Homepage content from file."
		);

		// additional code to deal with ajax requests

		if ($req->isAjax()) { // is the request ajax (see new method added into Request.php to check if request is ajax)
			// if it is we just want to render out the homepage view
			$view = new View('homepageView');
		} else {
			// otherwise the request is a non-ajax one that we want to handle like we did before
			$view = new View('base');
		}

		$response->setBody($view->render($variables));
		return $response;
	}
}
