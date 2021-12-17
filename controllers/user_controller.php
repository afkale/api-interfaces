<?php
require_once 'controllers/main_controller.php';

class UserController extends MainController
{
    public function __construct()
    {
        $this->setTable("usuarios");
    }
}
