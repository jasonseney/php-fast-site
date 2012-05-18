<?php
	class Locale {

		//TODO: Set default in constructor
		//		Add function to get default language code

		var $languageCode = "";
		var $currentLanguage = null;

		public function getLanguageCode() {
			return $this->languageCode;
		}

		public function getLanguage() {
			return $this->currentLanguage;
		}

		public function loadLanguage($languages, $lang, $url, $langCookie) {

			$expiretime = time() +60*60*24*30; // 30 days

			$this->languageCode = $lang;

			$isHome = $url == "";

			// Default Request = '/' or '/about' etc
			if($lang == "") {

				// Use first language as default
				$defaultLanguageConfig = array_shift(array_values($languages));
				$this->currentLanguage = $defaultLanguageConfig;
				$this->languageCode = $defaultLanguageConfig["code"];

				//If on homepage and cookie-ed for a different language, redirect to that language path
				if($isHome && $langCookie != null && $langCookie != $this->languageCode) {
					$newPath = $languages[$langCookie]["path"];
					if($newPath != null) {
						header("HTTP/1.1 307 Temporary Redirect");
						header("Location: /" . $newPath);
						exit();
					}
				}
			}
			// Explicit Request = '/en', '/pr/about' etc
			else {

				$langConfig = $languages[$lang];
				$this->currentLanguage = $langConfig;

				// If no cookie or request is overriding cookie
				if($langCookie == null || $langCookie != $lang) {
					setcookie("lang", $lang, $expiretime, "/");
				}
				
				// If current language path is different from the request, redirect to the path
				$currLangPath = $langConfig["path"];

				if($currLangPath != $lang) {
					header("HTTP/1.1 307 Temporary Redirect");
					header("Location: /" . $currLangPath . $url);
					exit();
				}
			}
		}
	}
?>
