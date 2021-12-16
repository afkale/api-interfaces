<?php
require_once 'controllers/activity_controller.php';
function activityExecRoute()
{
    $controller = new ActivityController();
    require_once 'routes.php';
    execRoute($controller);
}
