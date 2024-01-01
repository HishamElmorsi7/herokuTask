<?php
namespace Task\Lib;

class DatabaseHandler
{

    // Database handler attributes
    private $host;
    private $name;
    private $pwd;
    private $dbname;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->name = getenv('USER');
        $this->pwd = getenv('PWD');
        $this->dbname = getenv('DB_NAME');
    }

    public function connect()
    {
        $dns = "mysql:host=" . $host . ";dbname=" . $dbname;

        //Checking the connection and raising an error if the connection failed
        try {
            $pdo = new \PDO($dns, $name, $pwd);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            return $pdo;
        } catch (\PDOException $e) {
            $error = $e->getMessage();
            echo $error;
            die();
        }
    }
}
