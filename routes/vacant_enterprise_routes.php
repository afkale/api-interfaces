<?php
require_once 'controllers/vacant_enterprise_controller.php';

function vacantEnterpriseExecRoute()
{
	$controller = new VacantEnterpriseController();
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
