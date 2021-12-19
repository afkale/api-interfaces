<?php
require_once 'database/database.php';

class MainController
{
    private $table;
    private $idName;
    
    public function getOneElement($data)
    {
        $clause = "SELECT * FROM " . $this->getTable() . " WHERE " . implode(" = ? AND ", array_keys($data)) . " = ?";
        try {
            $command = $this->getDatabase()->getInstance()->getConnection()->prepare($clause);
            $command->execute(array_values($data));
            return $command->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function getElements($data)
    {
        $clause = isset($data) ? " WHERE " . implode(" = ? AND ", array_keys($data)) . " = ?" : "";
        try {
            $command = $this->getDatabase()->getInstance()->getConnection()->prepare("SELECT * FROM " . $this->getTable() . $clause);
            $command->execute($data ? array_values($data) : []);
            return $command->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function updateValues($data)
    {
        $id = $data[$this->getIdName()];
        unset($data[$this->getIdName()]);
        try {
            $command = $this->getDatabase()->getInstance()->getConnection()
                ->prepare("UPDATE " . $this->getTable() . " SET " . implode(" = ?, ", array_keys($data)) . " = ? WHERE " . $this->getIdName() . " = '$id'");
            return array("status" => $command->execute(array_values($data)) ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }

    public function insertData($data)
    {
        try {
            $command = $this->getDatabase()->getInstance()->getConnection()
                ->prepare("INSERT INTO " . $this->getTable() . " ( " . implode(", ", array_keys($data)) ." ) VALUES ( '" .implode("', '", array_values($data)) ."' )");
            return array("status" => $command->execute() ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
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
