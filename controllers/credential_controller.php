<?php
require_once 'controllers/main_controller.php';

class CredentialController extends MainController
{
	public function __construct()
	{
		$this->setTable("credentials");
		# id tabla
		$this->setIdName("id");
	}
}
