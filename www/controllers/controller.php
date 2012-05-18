<?php

class Controller {

	var $request;
	var $site;
	var $labels;

	var $currBlockName = "";
	var $blocks = array();

	public function __construct($request, $site, $labels = array()) {
        $this->request = $request;
        $this->site = $site;
		$this->labels = $labels;
    }

	protected function startBlock($id) {
		$this->currBlockName = $id;
		ob_start();
	}

	protected function endBlock() {
		$this->blocks[$this->currBlockName] = ob_get_contents();
		$this->currBlockName = "";
		ob_end_clean();
	}

	protected function renderBlock($id) {
		$output = "";
		if(array_key_exists($id, $this->blocks)) {
			$output = $this->blocks[$id];
		}
		echo $output; 
	}

	protected function renderTemplate($filePath, $model) {

		if(!file_exists($filePath)) {
			//TODO: Throw exception?
			return "";
		}

		ob_start(); // start output buffer

		include $filePath;
		$template = ob_get_contents(); // get contents of buffer

		ob_end_clean();

		return $template;
	}
}

?>
