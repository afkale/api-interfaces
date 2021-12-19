<?php
require_once 'controllers/main_controller.php';

class ExampleController extends MainController
{
	public function __construct()
	{
		# nombre de la tabla
		$this->setTable("examples");
		# id tabla
		$this->setIdName("id");
	}
}
