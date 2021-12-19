<?php
require_once 'controllers/user_controller.php';

function userExecRoute()
{
	$post = POST;
	$controller = new UserController();
	# sin finalizar, idea filtrar los metodos que son del especificos y los que son genéricos.
	if(isset($post['object'])){
		if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
			
		} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
		}
	}else{
		require_once 'routes.php';
		execRoute($controller);
	}
}
