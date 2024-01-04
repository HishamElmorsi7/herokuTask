<?php
namespace Task\Lib;

class DatabaseHandler
{

    // Database handler attributes
    private $host;
    private $port;
    private $user;
    private $pwd;
    private $dbname;
    
    public function __construct()
    {
        $dbUrl = getenv('DATABASE_URL');
        $dbInfo = parse_url($dbUrl);
        $this->host = $dbInfo('host');
        $this->port = $dbInfo('port');
        $this->user = $dbInfo('user');
        $this->pwd = $dbInfo('pass');
        $this->dbname = ltrim($dbInfo["path"], "/");
    }

    public function connect()
    {
        $dns = "pgsql:host=" . $this->host . ";port=". $this->port . ";dbname=" . $this->dbname;

        //Checking the connection and raising an error if the connection failed
        try {
            $pdo = new \PDO($dns, $this->user, $this->pwd);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            return $pdo;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}
