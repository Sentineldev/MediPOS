<?php

require_once('./database/database.php');
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
    public static function ObtenerUsuarioById($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ExisteUsuarioByID(?)");
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }

    public static function ObtenerUsuarioByUserId($user_id){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerUsuarioByUserId(?)");
        $stmt->bind_param("i",$user_id);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }

    public static function ObtenerCantidadUsuarios(){
        $connection = new Database();
        $stmt = $connection->getConnection()->query("CALL ObtenerCantidadUsuarios()");
        return $stmt->fetch_assoc();
        
    }
    public static function ObtenerUsuariosPorPagina($pagina){
        $rango_superior = 5*$pagina;
        $rango_inferior = $rango_superior-5; 
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerUsuariosRango(?,?)");
        $stmt->bind_param("ii",$rango_inferior,$rango_superior);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $users = array();
        while($fila = $stmt->fetch_assoc()){
            array_push($users,$fila);
        }
        return $users;
    }

    public static function RegistrarUsuario($identificacion,$usuario,$clave,$rango){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL RegistrarUsuario(?,?,?,?)");
        $stmt->bind_param("ssss",$identificacion,$usuario,$clave,$rango);
        $stmt->execute();
        $connection->close_connection();
    }

    public static function ModificarUsuario($identificacion,$usuario,$clave,$rango){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ModificarUsuario(?,?,?,?)");
        $stmt->bind_param("ssss",$identificacion,$usuario,$clave,$rango);
        $stmt->execute();
        $connection->close_connection();
    }

    public static function EliminarUsuario($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL EliminarUsuario(?)");
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        if(sizeof($stmt->error_list) == 0){
            return true;
        }
        return false;
    }

    public static function ExisteUsuarioByUser($usuario){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ExisteUsuario(?)");
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if($stmt->num_rows == 1){
            return true;
        }
        return false;
    }
    public static function ExisteUsuarioById($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ExisteUsuarioByID(?)");
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if($stmt->num_rows == 1){
            return true;
        }
        return false;
    }
}
?>