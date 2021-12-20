<?php
require_once 'controllers/main_controller.php';

class EmploymentContractController extends MainController
{
	public function __construct()
	{
		$this->setTable("employments_contract");
		# id tabla
		$this->setIdName("id");
	}
}
