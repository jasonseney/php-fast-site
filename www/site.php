<?php
class Site
{
	var $locale = "";
	var $language = null;
	
	// Global configurations
	function config() { 

		$suffix = $this->locale != "" ? "-" . $this->locale : "";

		return (object)array(
			"features" => sfYaml::load(ABSPATH."config/features.yml"),
			"languages" => sfYaml::load(ABSPATH."config/languages.yml"),
			"labels" => sfYaml::load(ABSPATH."config/labels". $suffix . ".yml")
		);
	}

	function getLabel($id) {
		return $this->config()->labels[$id];
	}

}
?>
