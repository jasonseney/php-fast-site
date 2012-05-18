var util = {
	log : function(message) {
        if (typeof (console) != 'undefined' && window.console) {
            console.log(message);
        } 
	},
	queryString : (function(key) {

		var params = {};
		var qs = location.search.substring(1, location.search.length);

		// Turn <plus> back to <space>
		// See: http://www.w3.org/TR/REC-html40/interact/forms.html#h-17.13.4.1
		qs = qs.replace(/\+/g, ' ');
		var args = qs.split('&'); // parse out name/value pairs separated via &
		
		// split out each name=value pair
		for (var i = 0; i < args.length; i++) {
			var pair = args[i].split('=');
			var name = decodeURIComponent(pair[0]);
			
			var value = (pair.length==2)
				? decodeURIComponent(pair[1])
				: name;
			
			params[name] = value;
		}

		return {
			get : function(key, fallback) {
				var value = params[key];
				return (value != null) ? value : fallback;
			},	
			contains : function(key) {
				var value = params[key];
				return (value != null);
			}
		};

	})(),
	getOS: function (nav) {
		return nav.appVersion.indexOf("Win") != -1 ? "Windows" :
			nav.userAgent.match(".*(iPhone|iPad|iPod).*") ? "iOS" :
			nav.appVersion.indexOf("Mac") != -1 ? "MacOS" :
			nav.appVersion.indexOf("Linux") != -1 ? "Linux" :
			"";
	}
};
