<?php
require_once 'controllers/main_controller.php';

class WorkExperienceController extends MainController
{
	public function __construct()
	{
		$this->setTable("works_experience");
		# id tabla
		$this->setIdName("id");
	}
}
