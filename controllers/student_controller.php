<?php
require_once 'controllers/main_controller.php';

class StudentController extends MainController
{
	public function __construct()
	{
		$this->setTable("students");
		# id tabla
		$this->setIdName("id");
	}
}
