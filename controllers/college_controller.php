<?php
require_once 'controllers/main_controller.php';

class CollegeController extends MainController
{
	public function __construct()
	{
		$this->setTable("colleges");
		# id tabla
		$this->setIdName("id");
	}
}
