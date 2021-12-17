<?php
define("POST", json_decode(file_get_contents('php://input'), true));
function execRoute($controller)
{
    $post = POST;
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $data = $controller->updateValues(POST);
        print json_encode($data);

    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($post['petition'])) {
            if ($post['petition'] == "one_object") {
                unset($post['petition']);
                $data = $controller->getOneElement($post);
                print json_encode($data);
            }else if ($post['petition'] == "insert") {
                unset($post['petition']);
                $data = $controller->insertData($post);
            }

        } else {
            $data = $controller->getElements($post);
            print json_encode($data);
        }
    }
}
