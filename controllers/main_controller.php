<?php
require_once 'database/database.php';

class MainController
{
    private $table;

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
        $id = $data['id'];
        unset($data['id']);
        try {
            $command = $this->getDatabase()->getInstance()->getConnection()
                ->prepare("UPDATE " . $this->getTable() . " SET " . implode(" = ?, ", array_keys($data)) . " = ? WHERE id = $id");
            return array("status" => $command->execute(array_values($data)) ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1);
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

    public function getDatabase()
    {
        return $this->database = new DataBase();
    }
}
