<?php
# path
require_once './routes/example_routes.php';

if (isset($_GET['url'])) {
    $args = explode('/', $_GET['url']);
    switch ($args[0]) {
            # method
		case 'example':
			exampleExecRoute();
			break;

    }
}
