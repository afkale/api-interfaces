<?php
require_once 'controllers/main_controller.php';

class IdiomStudentController extends MainController
{
	public function __construct()
	{
		$this->setTable("idioms_student");
		# id tabla
		$this->setIdName("id");
	}
}
