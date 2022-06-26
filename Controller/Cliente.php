<?php
require('./Models/Cliente.php');
class ClienteController{



    #validar que un cliente existe

    public static function ExisteCliente($identificacion,$tipo_cliente){
        return ClienteModel::ExisteCliente($identificacion,$tipo_cliente);
    }

    #registro de cliente natural
    public static function RegistrarClienteNatural($clienteNatural){
        ClienteModel::RegistrarClienteNatural($clienteNatural);
    }

    #modificar cliente natural
    public static function ModificarClienteNatural($clienteNatural){
        ClienteModel::ModificarClienteNatural($clienteNatural);
    }

    #registro de cliente juridico
    public static function RegistrarClienteJuridico($clienteJuridico){
        ClienteModel::RegistrarClienteJuridico($clienteJuridico);
    }
    #modificar cliente juridico

    public static function ModificarClienteJuridico($clienteJuridico){
        ClienteModel::ModificarClienteJuridico($clienteJuridico);
    }

    #obtener los datos de un cliente natural
    public static function ObtenerClienteNatural($identificacion){
        return ClienteModel::ObtenerClienteNatural($identificacion);
    } 
    #obtener los datos de un cliente juridico
    public static function ObtenerClienteJuridico($identificacion){
        return ClienteModel::ObtenerClienteJuridico($identificacion);
    }
    #elimina un cliente natural
    public static function EliminarClienteNatural($identificacion){
        return ClienteModel::EliminarClienteNatural($identificacion);
    }
    #elimina un cliente juridico
    public static function EliminarClienteJuridico($identificacion){
        return ClienteModel::EliminarClienteJuridico($identificacion);
    } 
    #Obtiene la cantidad de clientes que existe en el sistema de un tipo determinado
    public static function ObtenerCantidadClientes($tipo_cliente){
        return ClienteModel::ObtenerCantidadClientes($tipo_cliente);
    }
    #Obtiene la cantidad de clientes en un rango determinado con un tipo especific para separarlos en paginas.
    public static function ObtenerClientesPorPagina($tipo_cliente,$pagina){
        return ClienteModel::ObtenerClientesPorPagina($tipo_cliente,$pagina);
    }
}


?>