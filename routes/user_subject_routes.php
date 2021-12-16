<?php
require_once 'controllers/user_subject_controller.php';
function userSubjectExecRoute()
{
    $controller = new UserSubjectController();
    require_once 'routes.php';
    execRoute($controller);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset(POST['petition'])) {
            if (POST['petition'] == "subjects_by_user") {
                $post = POST;
                unset($post['petition']);
                if ($post) $data = $controller->getSubjectsByUser($post['idusuario']);
            }
            print json_encode($data);
        }
    }
}