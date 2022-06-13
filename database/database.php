<?php

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'].'/MediPOS');
$dotenv->load();

class Database{
    private string $host;
    private string $username;
    private string $password;
    private string $dbname;

    private $connection;


    public function __construct(){
        $this->host = getenv("DATABASE_HOST");
        $this->username = getenv("DATABASE_USER");
        $this->password = getenv("DATABASE_PASSWORD");
        $this->dbname = getenv("DATABASE");
        $this->connection = $this->Connection();

    }

    private function Connection(){
        return new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );
    }

    public function close_connection(){
        $this->connection->close();
    }

    public function getConnection(){
        return $this->connection();
    }

}


?>
