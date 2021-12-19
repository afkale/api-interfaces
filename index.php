<?php
# path
require_once './routes/user_routes.php';

if (isset($_GET['url'])) {
    $args = explode('/', $_GET['url']);
    switch ($args[0]) {
        # method
		case 'user':
			userExecRoute();
			break;  
    }
}
