<?php
class NavRouter {

	var $nav = array();

	public function __construct($navSections) {

		foreach($navSections as $section) {
			foreach($section as $node) {
				array_push($this->nav, $node);
			}
		}
	}

	public function getRoute($request) {

		$foundNode = false;

		$route = array(
			"controller" => "",
			"action" => "",
			"id" => ""
		);

		// Look for match using full url
		foreach($this->nav as $node) {
			if($node["url"] == $request->path.$request->page) {
				$foundNode = true;
				$route["controller"] = $node["controller"];
				$route["action"] = $node["action"];
			}
		}

		// If no match, look using just the path
		if(!$foundNode) {
			foreach($this->nav as $node) {
				if($node["url"] == rtrim($request->path,"/")) {
					$foundNode = true;
					$route["controller"] = $node["controller"];
					$route["action"] = $node["idAction"];
					$route["id"] = $request->page;
				}
			}
		}

		// If no still no match, use 404 page
		if(!$foundNode) {
			$route["controller"] = "ErrorController";
			$route["action"] = "pageNotFound";
		}

		return $route;
	}
}
?>
