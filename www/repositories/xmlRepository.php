<?php

class XmlRepository {

	public function getSection($path, $page) {

		$sections = $this->getSections($path);
		$currentSection = null;

		// Find the matching section, grab VIEW and TITLE
		foreach($sections as $section) {
			if($section->urlname == $page) {
				$currentSection	= $section;
			}
		}

		return $currentSection;
	}

	public function getSectionsDom($path) {
		$domDoc = new DOMDocument();
		$rootElt = $domDoc->createElement('sections');
		$rootNode = $domDoc->appendChild($rootElt);

		$dataRootPath = ABSPATH."data/";
		$dataPagePath = $dataRootPath.$path;
		$dataPagePattern = $dataPagePath."*.xml";

		$isValidPath = is_dir($dataPagePath);

		if($isValidPath) {
			// Load all XML files
			foreach (glob($dataPagePattern) as $filename) {
				$section = new DOMDocument();
				$section->load($filename);

				$sectionNode = $domDoc->importNode($section->documentElement, true);
				$domDoc->documentElement->appendChild($sectionNode);
			}
		}

		return $domDoc;
	}

	public function getSections($path) {
		
		$sections = Array();

		$dataRootPath = ABSPATH."data/";
		$dataPagePath = $dataRootPath.$path;
		$dataPagePattern = $dataPagePath."*.xml";

		$isValidPath = is_dir($dataPagePath);

		if($isValidPath) {
			// Load all XML files
			foreach (glob($dataPagePattern) as $filename) {
				$section = @simplexml_load_file($filename);
				array_push($sections,$section);
			}
		}

		return $sections;
	}
}
?>
