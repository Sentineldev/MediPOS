<?php
require('./database/database.php');
class ClienteModel{



    #validar que un cliente existe sea juridico o natural

    public static function ExisteCliente($identificacion,$tipo_cliente){
        $connection = new Database();
        $stmt  = $connection->getConnection()->prepare("CALL ExisteCliente(?,?)");
        $stmt->bind_param("ss",$identificacion,$tipo_cliente);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if($stmt->num_rows == 1){
            return true;
        }
        return false;
    }


    #obtener los datos de un cliente natural
    public static function ObtenerClienteNatural($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare('CALL ObtenerClienteNatural(?)');
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }
    #obtener los datos de un cliente Juridico
    public static function ObtenerClienteJuridico($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare('CALL ObtenerClienteJuridico(?)');
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }


    #obtiene cierta cantidad de clientes en un rango determinado
    #se toman de cinco en cinco y segun el numero de pagina obtiene 5
    public static function ObtenerClientesPorPagina($tipo_cliente,$pagina){
        $rango_superior = 5*$pagina;
        $rango_inferior =  $rango_superior - 5;
        $connection = new Database();
        if($tipo_cliente == "Natural"){
            $stmt = $connection->getConnection()->prepare("CALL ObtenerClienteRangoNatural(?,?)");
        }
        else{
            $stmt = $connection->getConnection()->prepare("CALL ObtenerClienteRangoJuridico(?,?)");
        }
        $stmt->bind_param("ii",$rango_inferior,$rango_superior);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $clientes = array();
        while($fila = $stmt->fetch_assoc()){
            array_push($clientes,$fila);
        }
        return $clientes;
    }
    #obtiene la cantidad de clientes que existen de un determinado tipo
    public static function ObtenerCantidadClientes($tipo_cliente){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerCantidadClientes(?)");
        $stmt->bind_param("s",$tipo_cliente);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }


    #registra los datos en la tabla personas de la bd.

    private static function RegistrarPersona($persona){
        $identificacion = $persona->getIdentificacion();
        $nombre = $persona->getNombre();
        $direccion = $persona->getDireccion();
        $telefono = $persona->getTelefono();
        $correo = $persona->getCorreo();
        $tipo_persona = $persona->getTipoPersona();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL RegistrarPersona(?,?,?,?,?,?)");
        $stmt->bind_param(
            "ssssss",
            $identificacion,
            $nombre,
            $direccion,
            $telefono,
            $correo,
            $tipo_persona
        );
        $stmt->execute();

    }

    #registro de un cliente natural.

    public static function RegistrarClienteNatural($clienteNatural){

        ClienteModel::RegistrarPersona($clienteNatural);
        $apellido = $clienteNatural->getApellido();
        $nacionalidad = $clienteNatural->getNacionalidad();
        $sexo = $clienteNatural->getSexo();
        $fecha_nacimiento = $clienteNatural->getFechaNacimiento();
        $identificacion = $clienteNatural->getIdentificacion();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL RegistrarClienteNatural(?,?,?,?,?)");
        $stmt->bind_param(
            "sssss",
            $identificacion,
            $apellido,
            $nacionalidad,
            $sexo,
            $fecha_nacimiento
        );
        $stmt->execute();
    }

    #registro de un cliente juridico

    public static function RegistrarClienteJuridico($clienteJuridico){

        ClienteModel::RegistrarPersona($clienteJuridico);

        $identificacion = $clienteJuridico->getIdentificacion();
        $telefono_empresa = $clienteJuridico->getTelefonoEmpresa();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL RegistrarClienteJuridico(?,?)");
        $stmt->bind_param(
            "ss",
            $identificacion,
            $telefono_empresa
        );
        $stmt->execute();
    }

    #Modifica los datos de una persona, metodo privado porque se hace al momento de modificar un cliente en general.

    private static function ModificarPersona($persona){
        $identificacion = $persona->getIdentificacion();
        $nombre = $persona->getNombre();
        $direccion = $persona->getDireccion();
        $telefono_contacto = $persona->getTelefono();
        $correo = $persona->getCorreo();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ActualizarPersona(?,?,?,?,?)");
        $stmt->bind_param("sssss",$nombre,$direccion,$telefono_contacto,$correo,$identificacion);
        $stmt->execute();
    }

    #Modifica los datos de un cliente natural

    public static function ModificarClienteNatural($clienteNatural){

        ClienteModel::ModificarPersona($clienteNatural);

        $apellido = $clienteNatural->getApellido();
        $nacionalidad = $clienteNatural->getNacionalidad();
        $sexo = $clienteNatural->getSexo();
        $fecha_nacimiento = $clienteNatural->getFechaNacimiento();
        $identificacion = $clienteNatural->getIdentificacion();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ActualizarClienteNatural(?,?,?,?,?)");
        $stmt->bind_param("sssss",$apellido,$nacionalidad,$sexo,$fecha_nacimiento,$identificacion);
        $stmt->execute();
    }
    #Modifica los datos de un cliente juridico
    public static function ModificarClienteJuridico($clienteJuridico){
        ClienteModel::ModificarPersona($clienteJuridico);

        $identificacion = $clienteJuridico->getIdentificacion();
        $telefono_empresa = $clienteJuridico->getTelefonoEmpresa();

        $connection = new Database();

        $stmt = $connection->getConnection()->prepare("CALL ActualizarClienteJuridico(?,?)");
        $stmt->bind_param("ss",$identificacion,$telefono_empresa);
        $stmt->execute();
    }


    private static function EliminarPersona($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL EliminarPersona(?)");
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        $connection->close_connection();
    }
    #Elimina un cliente natural siempre y cuando este no este relacionado en alguna otra tabla
    public static function EliminarClienteNatural($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL EliminarClienteNatural(?)");
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        if((sizeof($stmt->error_list) == 0)){
            ClienteModel::EliminarPersona($identificacion);
            return true;
        }
        return false;
        
    }
    #Elimina un cliente juridico mientras no este asociado a ninguna otra tabla.
    public static function EliminarClienteJuridico($identificacion){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL EliminarClienteJuridico(?)");
        $stmt->bind_param("s",$identificacion);
        $stmt->execute();
        if(sizeof($stmt->error_list) == 0){
            ClienteModel::EliminarPersona($identificacion);
            return true;
        }
        return false;
    } 
}


?>