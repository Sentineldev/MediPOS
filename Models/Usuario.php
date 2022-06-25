<?php

require('./database/database.php');
class UsuarioModel{


    public static function ExisteUsuario($username,$password){
        
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL obtenerUsuario(?,?)");
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if($stmt->num_rows == 1){
            return true;
        }
        return false;
    }

    public static function ObtenerUsuario($username,$password){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL obtenerUsuario(?,?)");
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt;
    }
}
?>