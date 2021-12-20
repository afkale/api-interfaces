<?php
require_once 'controllers/language_controller.php';

function languageExecRoute()
{
	$controller = new LanguageController();
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
