<?php
require_once 'controllers/example_controller.php';

function exampleExecRoute()
{
	$controller = new ExampleController();
	if (isset($_GET['option']) && $_GET['option'] = 'object') {
		# Aquí se filtraran todos los metodos que son especificos de este objeto en particular
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			# metodos POST
		} else if (['REQUEST_METHOD'] == 'PUT') {
			# metodos PUT
		}
	} else {
		require_once 'routes.php';
		execRoute($controller);
	}
}
