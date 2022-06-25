<?php


include_once('./Models/Usuario.php');

class UsuarioController{
    
    public static function ExisteUsuario($username,$password){
        return UsuarioModel::ExisteUsuario($username,$password);
    }

    public static function ObtenerUsuario($username,$password){
        return UsuarioModel::ObtenerUsuario($username,$password);
    }
    
}

?>