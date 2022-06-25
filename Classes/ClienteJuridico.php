<?php

class ClienteJuridico extends Persona{
    private string $telefono_empresa;

    function __construct($persona,$telefono_empresa){
        parent::__construct(
            $persona->getIdentificacion(),
            $persona->getNombre(),
            $persona->getDireccion(),
            $persona->getTelefono(),
            $persona->getCorreo(),
            $persona->getTipoPersona()
        );
        $this->telefono_empresa = $telefono_empresa;
    }

    function getTelefonoEmpresa(){
        return $this->telefono_empresa;
    }
}


?>