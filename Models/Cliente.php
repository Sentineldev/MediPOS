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

    public static function ModificarClienteJuridico($clienteJuridico){
        ClienteModel::ModificarPersona($clienteJuridico);

        $identificacion = $clienteJuridico->getIdentificacion();
        $telefono_empresa = $clienteJuridico->getTelefonoEmpresa();

        $connection = new Database();

        $stmt = $connection->getConnection()->prepare("CALL ActualizarClienteJuridico(?,?)");
        $stmt->bind_param("ss",$identificacion,$telefono_empresa);
        $stmt->execute();
    }
}


?>