<?php
define("POST", json_decode(file_get_contents('php://input'), true));
function execRoute($controller)
{
    # Aquí se encuentran los metodos generales y globales, en este sitio sólo debería de haber metodos generales de cada uno de los objetos.
    # Los que son especificos de un objeto en particular se deberán posicionar en su routes correspondiente.
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
            } else if ($post['petition'] == "insert") {
                unset($post['petition']);
                $data = $controller->insertData($post);
            }
        } else {
            $data = $controller->getElements($post);
            print json_encode($data);
        }
    }
}
