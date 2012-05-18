<?php 

//*** Library Functions ***
function getVar($key, $default) {
	return getElementOrDefault($_GET, $key, $default);
}

function getCookie($key, $default) {
	return getElementOrDefault($_COOKIE, $key, $default);
}

function getElementOrDefault($arr,$key, $default="") {
	if (isset($arr[$key])) {
		return $arr[$key]; 
	}
	else {
		return $default;
	}
}

function getPage($collection, $pageNumber, $pageSize) {

	if($pageSize < 1 || $pageNumber < 1) { 
		die("Invalid page number"); 
	}

	$start = $pageSize * ($pageNumber - 1);
	$end = $start + $pageSize - 1;

	$resultPage = array();

	for($i=0, $count = count($collection); $i < $count; $i++) {
		if($i >= $start && $i <= $end) {
			array_push($resultPage, $collection[$i]);
		}
	}
	return $resultPage;
}

function buildPath($nodeArray) {
	$path = "";
	foreach($nodeArray as $node) {
		if($node != null && $node != "" ) {
			$path = $path . "/" . $node;
		}
	}
	return $path;
}

function getMenuClass($fullpath, $link, $existingClass = null) {

	// Check if the current fullpath is the same as the link 
	if($link != null && $fullpath == $link) {
		// Add a "current" class if the same
		return "class=\"".($existingClass != null ? $existingClass." " : "")."current\""; 
	}
	else if ($link != null && strstr($fullpath, $link)) {
		// Check for parent
		return "class=\"".($existingClass != null ? $existingClass." " : "")."current-parent\"";
	}
	else {
		// Else add just the existing class if there is one
		return ($existingClass != null ? "class=\"$existingClass\"" : "");
	}
}

function rglob($pattern='*', $flags = 0, $path='')
{
    $paths=glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
    $files=glob($path.$pattern, $flags);
    foreach ($paths as $path) { $files=array_merge($files,rglob($pattern, $flags, $path)); }
    return $files;
}

//Checks if exists before adding
function array_push_exclusive($item, & $array) {
	if(!in_array($item,$array)){
		array_push($array, $item);
	}
}

function debug($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

function getImage($width, $height, $path) {
	if(stristr($path, "http://")) {
		return $path;
	}
	else {
		return "/image.php?width=$width&height=$height&image=$path";
	}
}

function renderView($name, $model, $labels) {
	include $name;
}

function getHost() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") { 
		$pageURL .= "s"; 
	}
	$pageURL = $pageURL . "://";

	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"];
	}
	return $pageURL;
}
function getRequestUrl() {
	return getHost() . $_SERVER["REQUEST_URI"];
}

?>
