<?php
require_once 'controllers/idiom_vacant_controller.php';

function idiomVacantExecRoute()
{
	$controller = new IdiomVacantController();
	if (isset($post['option']) && $post['option'] = 'object') {
		unset($post['option']);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		} else if (['REQUEST_METHOD'] == 'PUT') {
		}
	} else {
		require_once 'routes.php';
	execRoute($controller);
	}
}
