<?php
require_once 'controllers/main_controller.php';

class VacantController extends MainController
{
	public function __construct()
	{
		$this->setTable("vacants");
		# id tabla
		$this->setIdName("id");
	}
}
