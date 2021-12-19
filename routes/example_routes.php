<?php
require_once 'controllers/example_controller.php';

# Aquí iran se utilizaran los metodos exclusivos de este controlador en especifico,
#todo lo que lleve en el json el parametro option con el valor object pasará por aquí.

function exampleExecRoute()
{
	$controller = new ExampleController();
	if (isset($post['option']) && $post['option'] = 'object') {
		unset($post['option']);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			# Aquí los metodos especificos del post.
		} else if (['REQUEST_METHOD'] == 'PUT') {
			# Aquí los metodos especificos del put.
		}
	} else {
		require_once 'routes.php';
		execRoute($controller);
	}
}
