<?php
# path
require_once './routes/example_routes.php';

if (isset($_GET['url'])) {
    $args = explode('/', $_GET['url']);
	define("POST", json_decode(file_get_contents('php://input'), true));
    switch ($args[0]) {
            # method
		  case 'examples':
			exampleExecRoute();
			break;
		
    }
}
