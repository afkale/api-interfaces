<?php
require_once 'database/database.php';

abstract class MainController
{
    private $table;
    private $idName;

    private $database;

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
    public function getElements($data)
    {
        $clause = $this->createClauses($data);
        $query = "SELECT * FROM " . $this->getTable() . $clause;
        $values = $this->extractValues($data);
        try {
            $command = $this->prepare($query);
            $command->execute($values);
            return $command->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }

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
        $clause = $this->createClauses($data);
        $query = "DELETE FROM " . $this->getTable() . $clause;
        $values = $this->extractValues(array_values($data));
        try {
            $command = $this->prepare($query);
            $result = $command->execute($values);
            return array("status" => $result ? 0 : -2);
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
        $clearedKey = str_replace(["|", "!"], "", $key);
        if (!$this->containsAny($key, "|", "!") || $isFirst)
            return $isFirst ? $clearedKey : " AND " . $clearedKey;
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
        $values = array_values($values);
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