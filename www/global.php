<?php

$site = new Site();

// Setup request object
$request = new Request();
$request->path = getVar("path");
$request->page = getVar("page");
$request->lang = getVar("lang");

// Load Language
$locale = new Locale();
$locale->loadLanguage(
	$site->config()->languages, 
	$request->lang,
	$request->path . $request->page,
	$langCookie = getCookie("lang")
);

$site->locale = $locale->getLanguageCode();
$site->language = $locale->getLanguage();

// Load and Run Router
$router = new NavRouter($site->config()->features["nav"]);
$route = $router->getRoute($request);

$controller = new $route["controller"]($request, $site, $site->config()->labels);

echo $controller->$route["action"]($route["id"]);

?>
