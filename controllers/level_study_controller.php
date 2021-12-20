<?php
require_once 'controllers/main_controller.php';

class LevelStudyController extends MainController
{
	public function __construct()
	{
		$this->setTable("levels_study");
		# id tabla
		$this->setIdName("id");
	}
}
