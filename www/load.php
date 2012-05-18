<?php	

define( 'ABSPATH', dirname(__FILE__) . '/' );

// Load Required Classes
include_once ABSPATH."site.php";
include_once ABSPATH."request.php";
include_once ABSPATH."locale.php";

// Load Libraries
include_once ABSPATH."lib/functions.php";
include_once ABSPATH."lib/logger.php";
include_once ABSPATH."lib/sfYaml.php";
include_once ABSPATH."lib/sfYamlDumper.php";
include_once ABSPATH."lib/sfYamlInline.php";
include_once ABSPATH."lib/sfYamlParser.php";

// Load Repositories
include_once ABSPATH."repositories/xmlRepository.php";

// Load Routing
include_once ABSPATH."navRouter.php";

// Load Controllers
include_once ABSPATH."controllers/controller.php";
include_once ABSPATH."controllers/errorController.php";
include_once ABSPATH."controllers/pageController.php";

// Load Global - Runs the site!
include_once ABSPATH."global.php";

?>
