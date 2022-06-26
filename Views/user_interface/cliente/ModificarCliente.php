<?php

include('./Controller/Cliente.php');
include('./Classes/Persona.php');
include('./Classes/ClienteNatural.php');
include('./Classes/ClienteJuridico.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <style>
        <?php
            include('boostrap/css/bootstrap.css');
            include('CSS/navbar.css');
            include('CSS/content.css');
            include('CSS/base.css');
        ?>
    </style>
</head>
<body>
    <?php
        include('Views/Utils/navbar.php');
    ?>
    <section id="main">
        <section id="content">
            <?php
            include_once('Views/Utils/sidebar.php');
            ?>
            <div id="middle-content" class="container-fluid">
                <h1 id="middle-content-header">Modificar Cliente</h1>
                <form method="POST" id="form-container" class="row g-3">
                <div class="col-md-4">
                    <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                    <select name="tipo_cliente" id="tipo_cliente" class="form-select p-2">
                        <option value="">Seleccione</option>
                        <option value="Natural">Natural</option>
                        <option value="Juridico">Juridico</option>
                    </select>
                </div>
                <div class="col-md-4" id="identification-container">
                </div>
                <div id="button-container" class="col-12">
                    <button id="find-button"   class=" button btn  w-25 mt-4 m-1 p-2 border-0" disabled >Buscar Cliente</button>
                </div>
                <div id="input-container" class="container-fluid  row g-3">
                </div>
                <?php
                if(isset($_POST) && sizeof($_POST) > 0){
                    $persona = new Persona(
                        $_POST['identificacion'],
                        $_POST['nombre'],
                        $_POST['direccion'],
                        $_POST['telefono'],
                        $_POST['correo'],
                        $_POST['tipo_cliente']
                    );
                
                    if($persona->getTipoPersona() == "Natural"){
                        $clienteNatural = new ClienteNatural(
                            $persona,
                            $_POST['apellido'],
                            $_POST['sexo'],
                            $_POST['nacionalidad'],
                            $_POST['fecha_nacimiento']
                        );
                        ClienteController::ModificarClienteNatural($clienteNatural);
                    }
                    else if($persona->getTipoPersona() == "Juridico"){
                        $clienteJuridico = new ClienteJuridico(
                            $persona,
                            $_POST['telefono_empresa']
                        );
                        ClienteController::ModificarClienteJuridico($clienteJuridico);
                    }
                    echo(
                    '<div class=" alert-modify alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
                        Modificado Exitosamente!
                    </div>'
                    );
                }
                ?>
                </form>
            </div>
        </section>
    </section>
    
</body>

<script type="module">
    <?php
    include('boostrap/js/bootstrap.bundle.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/clientes/modificar_cliente.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api.js');
    ?>
</script>
</html>