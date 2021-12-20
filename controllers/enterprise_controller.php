<?php
require_once 'controllers/main_controller.php';

class EnterpriseController extends MainController
{
	public function __construct()
	{
		$this->setTable("enterprises");
		# id tabla
		$this->setIdName("id");
	}
}
