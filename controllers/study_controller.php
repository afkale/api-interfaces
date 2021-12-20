<?php
require_once 'controllers/main_controller.php';

class StudyController extends MainController
{
	public function __construct()
	{
		$this->setTable("studies");
		# id tabla
		$this->setIdName("id");
	}
}
