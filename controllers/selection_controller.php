<?php
require_once 'controllers/main_controller.php';

class SelectionController extends MainController
{
	public function __construct()
	{
		$this->setTable("selections");
		# id tabla
		$this->setIdName("id");
	}
}
