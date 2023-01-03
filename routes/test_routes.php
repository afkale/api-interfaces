<?php
require_once 'controllers/test_controller.php';

function testExecRoute()
{
	$controller = new TestController();
	if (isset($_GET['option']) && $_GET['option'] = 'object') {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		}
	} else {
		require_once 'routes.php';
		execRoute($controller);
	}
}
