<?php
require_once 'controllers/main_controller.php';

class StudyStudentController extends MainController
{
	public function __construct()
	{
		$this->setTable("studies_student");
		# id tabla
		$this->setIdName("id");
	}
}
