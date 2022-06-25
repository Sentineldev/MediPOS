<?php


class Database{
    private string $host = "localhost";
    private string $username = "root";
    private string $password = "70242526";
    private string $database = "farmacia";
    private $connection;

    public function __construct(){
        $this->connection = $this->Connection();
    }

    public function Connection(){
        
        return new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database,
        );
    }



    public function close_connection(){
        $this->connection->close();
    }

    public function getConnection(){
        return $this->connection;
    }
}


?>
