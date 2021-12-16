<?php
require_once 'controllers/user_controller.php';
function userExecRoute()
{
    $controller = new UserController();
    require_once 'routes.php';
    execRoute($controller);
}
