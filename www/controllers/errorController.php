<?php

class ErrorController extends Controller {

	public function pageNotFound($lang) {
		
		header("HTTP/1.0 404 Not Found");
		$template = "404";

		$masterModel = array(
			"template" => $template,
			"languages" => $this->site->config()->languages,
			"features" => $this->site->config()->features,
			"lang" => $lang
		);

		// Load the master template with ONLY 2 variables being in scope
		$templatePath = ABSPATH."views/".$template.".php";
		$masterPath = ABSPATH."views/master.php";

		$this->renderTemplate($templatePath, $null);
		$masterResult = $this->renderTemplate($masterPath, (object)$masterModel);

		return $masterResult;
	}

}

?>
