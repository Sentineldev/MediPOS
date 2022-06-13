<?php

require_once('./database/database.php');
class ProductoModel{
    

    public function __construct(){

    }

    public static function getProduct(){
        $connection = new Database();
        $sql = $connection->getConnection()->query('SELECT * FROM producto');
        $connection->close_connection();
        return $sql;
    }
    


}


?>