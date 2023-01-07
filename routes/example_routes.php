<?php
require_once 'controllers/example_controller.php';

function exampleExecRoute($args)
{
	$controller = new ExampleController();
	if (isset($args[1]) && $args[1] == 'object') {
		# Aquí se filtraran todos los metodos que son especificos de este objeto en particular
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			# metodos POST
		} else if (['REQUEST_METHOD'] == 'PUT') {
			# metodos PUT
		}
	} else {
		require_once 'routes.php';
		execRoute($controller, $args);
	}
}
