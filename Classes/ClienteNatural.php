<?php

class ClienteNatural extends Persona{
    private string $apellido;
    private string $sexo;
    private string $nacionalidad;
    private $fecha_nacimiento;

    function __construct($persona,$apellido,$sexo,$nacionalidad,$fecha_nacimiento){
        parent::__construct(
            $persona->getIdentificacion(),
            $persona->getNombre(),
            $persona->getDireccion(),
            $persona->getTelefono(),
            $persona->getCorreo(),
            $persona->getTipoPersona()
        );
        $this->apellido = $apellido;
        $this->sexo = $sexo;
        $this->nacionalidad = $nacionalidad;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }


    function getApellido(){
        return $this->apellido;
    }
    function getSexo(){
        return $this->sexo;
    }
    function getNacionalidad(){
        return $this->nacionalidad;
    }
    function getFechaNacimiento(){
        return $this->fecha_nacimiento;
    }
}


?>