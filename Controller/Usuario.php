<?php


include_once('./Models/Usuario.php');

class UsuarioController{
    
    #Verifica si el existe el usuario con el usuario y la clave indicada
    public static function ExisteUsuario($username,$password){
        return UsuarioModel::ExisteUsuario($username,$password);
    }
    #obtiene los datos del usuario
    public static function ObtenerUsuario($username,$password){
        return UsuarioModel::ObtenerUsuario($username,$password);
    }
    #registra un nuevo usuario
    public static function RegistrarUsuario($identificacion,$usuario,$clave,$rango){
        UsuarioModel::RegistrarUsuario($identificacion,$usuario,$clave,$rango);
    }
    #modifica los datos del usuario
    public static function ModificarUsuario($identificacion,$usuario,$clave,$rango){
        UsuarioModel::ModificarUsuario($identificacion,$usuario,$clave,$rango);
    }

    public static function EliminarUsuario($identificacion){
        return  UsuarioModel::EliminarUsuario($identificacion);
    }

    #Verifica si el nombre de usuario actual existe
    public static function ExisteUsuarioByUser($usuario){
        return UsuarioModel::ExisteUsuarioByUser($usuario);
    }
    #verifica si se encuentra un  usuario registrado con una cedula especifica
    public static function ExisteUsuarioById($identificacion){
        return UsuarioModel::ExisteUsuarioById($identificacion);
    }
    #Obtiene los datos del usuario por la cedula
    public static function ObtenerUsuarioById($identificacion){
        return UsuarioModel::ObtenerUsuarioById($identificacion);
    }

    public static function ObtenerCantidadUsuarios(){
        return UsuarioModel::ObtenerCantidadUsuarios();
    }
    public static function ObtenerUsuariosPorPagina($pagina){
        return UsuarioModel::ObtenerUsuariosPorPagina($pagina);
    }
    
}

?>