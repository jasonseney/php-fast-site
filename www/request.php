<?php
class Request
{
	var $path;
	var $page;
	var $lang;

	public function fullpath() {
		return "/" . $this->path . $this->page;
	}
}

?>
