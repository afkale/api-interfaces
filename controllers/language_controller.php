<?php
require_once 'controllers/main_controller.php';

class LanguageController extends MainController
{
	public function __construct()
	{
		$this->setTable("languages");
		# id tabla
		$this->setIdName("id");
	}
}
