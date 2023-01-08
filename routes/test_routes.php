<?php
require_once 'controllers/test_controller.php';

function testExecRoute($args)
{
	$controller = new TestController();
	if (isset($args[1]) && $args[1] == 'object') {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		}
	} else {
		require_once 'routes.php';
		execRoute($controller, $args);
	}
}
