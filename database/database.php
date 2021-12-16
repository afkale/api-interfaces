<?php
require_once 'database_login.php';
class DataBase
{
    private static $PDO;

    public function getConnection()
    {
        self::$PDO = new PDO('mysql:dbname=' . DATABASE . ';host=' . HOSTNAME . ';port:80;', USERNAME, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$PDO;
    }

    public function getInstance()
    {
        if (self::$PDO != null) {
            $this->getConnection();
        }
        return $this;
    }

    function __destruct()
    {
        self::$PDO = null;
    }
}
