<?php
require_once 'controllers/subject_controller.php';
function subjectExecRoute()
{
    $controller = new SubjectController();
    require_once 'routes.php';
    execRoute($controller);
}
