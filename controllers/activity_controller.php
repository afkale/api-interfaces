<?php
require_once 'controllers/main_controller.php';
class ActivityController extends MainController
{
    public function __construct()
    {
        $this->setTable("actividades");
    }
}
