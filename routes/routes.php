<?php

function execRoute($controller)
{
    # Aquí se encuentran los metodos generales y globales, en este sitio sólo debería de haber metodos generales de cada uno de los objetos.
    # Los que son especificos de un objeto en particular se deberán posicionar en su routes correspondiente.
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $data = $controller->updateValues(POST);
        print json_encode($data);
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($post['petition'])) {
            # Aquellos metodos que comparten envio, se separan a traves de el parametro petition que será enviado a traves del json
            # por defecto los comunes son one_object e insert.
            if ($post['petition'] == "one_object") {
                unset($post['petition']);
                $data = $controller->getElement($post);
                print json_encode($data);
            } else if ($post['petition'] == "insert") {
                unset($post['petition']);
                $data = $controller->insertData($post);
            }
        } else {
            # Metodo por defecto del POST el cual no necesita recibir parametros para obtener datos, también filtrara en caso de que
            # reciba parametros que tengan que ver con la tabla relaccionada.
            $data = $controller->getElements($post);
            print json_encode($data);
        }
    }
}
