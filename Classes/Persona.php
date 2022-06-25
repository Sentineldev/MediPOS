<?php
class Persona{

    private string $nombre;
    private string $direccion;
    private string $telefono;
    private string $correo;
    private string $tipo_persona;
    private string $identificacion;


    function __construct($identificacion,$nombre,$direccion,$telefono,$correo,$tipo_persona){
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->tipo_persona = $tipo_persona;
    }

    function getIdentificacion(){
        return $this->identificacion;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function getTelefono(){
        return $this->telefono;
    }
    function getCorreo(){
        return $this->correo;
    }
    function getTipoPersona(){
        return $this->tipo_persona;
    }
}


?>