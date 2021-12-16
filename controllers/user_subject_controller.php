<?php
require_once 'controllers/main_controller.php';
class UserSubjectController extends MainController
{
    public function __construct()
    {
        $this->setTable("usuario_tema");
    }

    public function getSubjectsByUser(...$data)
    {
        try {
            $command = $this->getDatabase()->getInstance()->getConnection()
                ->prepare("SELECT nombretema, tiempo, visto, contenido, idtema FROM " . $this->getTable() . " ,tema WHERE id = idtema AND idusuario = ? AND visto LIKE 'NO' ");
            $command->execute($data);
            return $command->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function updateValues($data)
    {
        $idUsuario = $data['idusuario'];
        unset($data['idusuario']);

        $idTema = $data['idtema'];
        unset($data['idtema']);

        try {
            $command = $this->getDatabase()->getInstance()->getConnection()
                ->prepare("UPDATE " . $this->getTable() . " SET " . implode(" = ?, ", array_keys($data)) . " = ? WHERE idusuario = $idUsuario AND idtema = $idTema");
            return array("status" => $command->execute(array_values($data)) ? 0 : -2);
        } catch (PDOException $e) {
            return array("status" => -1, "error" => $e);
        }
    }
}
