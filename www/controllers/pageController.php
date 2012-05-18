<?php

class PageController extends Controller {

	var $repo;

	public function __construct() {
		$this->repo = new XmlRepository();
		call_user_func_array(array('parent', "__construct"), func_get_args());
	}

	public function landing() {

		/* Tip: The landing action is an EXAMPLE, and real text should come from either a data source or config */

		$template = "basic";

		$model = array(
			"title" => "My Landing Title",
			"content" => "Real landing content here."
		);

		$masterModel = array(
			"title" => " - My Landing",
			"description" => "My Landing Description",
			"template" => $template,
			"languages" => $this->site->config()->languages,
			"features" => $this->site->config()->features,
			"lang" => $this->site->locale
		);

		// Load the master template with ONLY 2 variables being in scope
		$templatePath = ABSPATH."views/" . $template . ".php";
		$masterPath = ABSPATH."views/master.php";

		$this->renderTemplate($templatePath, (object)$model);
		$masterResult = $this->renderTemplate($masterPath, (object)$masterModel);

		return $masterResult;

	}

	public function detail() {
		
		// *** Data Provider *** 
		$currentSection = $this->repo->getSection($this->request->path, $this->request->page);

		if($currentSection == null) {
			header("HTTP/1.0 404 Not Found");
			$template = "404";
		}
		else {
			$template = $currentSection["type"];
		}

		$masterModel = array(
			"title" => " - " . $currentSection->title,
			"description" => $currentSection->title,
			"template" => $template,
			"languages" => $this->site->config()->languages,
			"features" => $this->site->config()->features,
			"lang" => $this->site->locale
		);

		// Load the master template with ONLY 2 variables being in scope
		$templatePath = ABSPATH."views/".$template.".php";
		$masterPath = ABSPATH."views/master.php";

		$this->renderTemplate($templatePath, $currentSection);
		$masterResult = $this->renderTemplate($masterPath, (object)$masterModel);

		return $masterResult;
	}

}

?>
