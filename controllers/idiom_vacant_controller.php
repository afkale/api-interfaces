<?php
require_once 'controllers/main_controller.php';

class IdiomVacantController extends MainController
{
	public function __construct()
	{
		$this->setTable("idioms_vacant");
		# id tabla
		$this->setIdName("id");
	}
}
