<?php
require_once 'controllers/main_controller.php';

class LevelLanguageController extends MainController
{
	public function __construct()
	{
		$this->setTable("levels_language");
		# id tabla
		$this->setIdName("id");
	}
}
