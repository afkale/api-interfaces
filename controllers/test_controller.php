<?php
require_once 'controllers/main_controller.php';

class TestController extends MainController
{
	public function __construct()
	{
		$this->setTable("tests");
		# id tabla
		$this->setIdName("id");
	}
}
