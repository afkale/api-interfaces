<?php
require_once 'controllers/main_controller.php';

class IdiomController extends MainController
{
	public function __construct()
	{
		$this->setTable("idioms");
		# id tabla
		$this->setIdName("id");
	}
}
