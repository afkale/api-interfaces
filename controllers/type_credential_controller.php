<?php
require_once 'controllers/main_controller.php';

class TypeCredentialController extends MainController
{
	public function __construct()
	{
		$this->setTable("types_credential");
		# id tabla
		$this->setIdName("id");
	}
}
