<?php
require_once 'controllers/main_controller.php';

class VacantEnterpriseController extends MainController
{
	public function __construct()
	{
		$this->setTable("vacants_enterprise");
		# id tabla
		$this->setIdName("id");
	}
}
