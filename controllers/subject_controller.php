<?php
require_once 'controllers/main_controller.php';

class SubjectController extends MainController
{
    public function __construct()
    {
        $this->setTable("tema");
    }
}
