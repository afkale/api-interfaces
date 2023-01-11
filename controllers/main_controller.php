<?php
require_once 'database/database.php';

# Aquí se encuentran los metodos genericos para todos los objetos, en caso de que uno de estos metodos no sea util para un objeto en
# particular por pequeñas inconveniencias en la base de datos se debería pisar el metodo en la clase controller correspondiente al 
# objeto para realizar un override.

abstract class MainController
{
    private $table;
    private $idName;

    # POST
    # Metodo para recoger un unico elemento, en este caso necesitaras utilizar un parametro en el json que he designado como petition
    # para este metodo utilizaremos "petition" : "one_element" esto buscara entre todos los elementos de la tabla el que coincida con
    # todos los parametros que le pasamos por json.
    public function getElement($data)
    {
        $clause = $this->createClauses($data);
        $query = "SELECT * FROM " . $this->getTable() . $clause;
        $values = $this->extractValues(array_values($data));
        try {
            $command = $this->prepare($query);
            $command->execute($values);
            $result = $command->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : null;
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }

    # POST
    # Metodo para recoger todos los elementos de una tabla, podemos no pasarle ningun objeto como parametro o pasarle varios datos para
    # que busque las coincidencias.
    public function getElements($data)
    {
        $clause = $this->createClauses($data);
        $query = "SELECT * FROM " . $this->getTable() . $clause;
        $values = $this->extractValues(array_values($data));
        try {
            $command = $this->prepare($query);
            $command->execute($values);
            return $command->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }


    # PUT
    # Metodo para actualizar los valores de un objeto en particular, utilizará el id como buscador del objeto en particular, le podemos
    # pasar como json uno o varios parametros.
    public function updateValues($data)
    {
        $id = $data[$this->getIdName()];
        unset($data[$this->getIdName()]);
        try {
            $command = $this->prepare("UPDATE " . $this->getTable() . " SET " . implode(" = ?, ", array_keys($data)) . " = ? WHERE " . $this->getIdName() . " = '$id'");
            return array("status" => $command->execute(array_values($data)) ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }

    # POST
    # Metodo para insertar datos, para utilizar este datos volveremos a pasar un dato en el json que contenga "petition" : "insert" y los
    # datos del objeto en particular para poder realizar la insercion correctamente.
    public function insertData($data)
    {
        try {
            $command = $this->prepare("INSERT INTO " . $this->getTable() . " ( " . implode(", ", array_keys($data)) . " ) VALUES ( '" . implode("', '", array_values($data)) . "' )");
            return array("status" => $command->execute() ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }

    public function removeData($data)
    {
        try {
            $clause = isset($data) ? " WHERE " . implode(" = ? AND ", array_keys($data)) . " = ?" : "";
            $command = $this->prepare("DELETE FROM " . $this->getTable() . $clause);
            return array("status" => $command->execute(array_values($data)) ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }

    private function createClauses($data)
    {
        if (!$data)
            return;
        $result = [];
        foreach ($data as $key => $value) {
            $operator = $this->getOperator($key, $isFirst = count($result) == 0);
            $param = is_array($value) ? $operator . " IN (" . implode(", ", array_map(fn($value) => "?", $value)) . ") " : $operator . " LIKE ?";
            array_push($result, $param);
        }
        return " WHERE " . implode("", $result);
    }

    private function getOperator(string $key, $isFirst)
    {
        if (!$this->containsAny($key, "|", "!"))
            return $isFirst ? $key : " AND " . $key;
        $clearedKey = str_replace(["|", "!"], "", $key);
        $not = str_contains($key, "!");
        $or = str_contains($key, "|");
        return ($or ? " OR " : " AND ") . $clearedKey . ($not ? " NOT " : "");
    }

    private function containsAny(string $haystack, string...$needles)
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }
        return false;
    }

    private function extractValues($values)
    {
        if (!$values)
            return [];
        $result = [];
        foreach ($values as &$value) {
            if (is_array($value)) {
                array_push($result, ...$value);
            } else {
                array_push($result, $value);
            }
        }
        return $result;
    }


    public function prepare($query)
    {
        return $this->getDatabase()->getInstance()->getConnection()->prepare($query);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
    }

    public function getIdName()
    {
        return $this->idName;
    }

    public function setIdName(string $idName)
    {
        $this->idName = $idName;
    }

    public function getDatabase()
    {
        return $this->database = new DataBase();
    }
}