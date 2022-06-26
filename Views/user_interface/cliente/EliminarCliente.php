
<?php

include('./Controller/Cliente.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
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
                <h1 id="middle-content-header">Eliminar Cliente</h1>
                <form method="POST" id="form-container" class="d-flex  pt-1 pb-5">
                    <div class="container-fluid  m-0 w-50">
                        <div class="col-md-4 w-100">
                            <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                            <select name="tipo_cliente" id="tipo_cliente" class="form-select p-2">
                                <option value="">Seleccione</option>
                                <option value="Natural">Natural</option>
                                <option value="Juridico">Juridico</option>
                            </select>
                        </div>
                        <div class="col-md-4 w-100" id="identification-container">
                        </div>
                        <div id="button-container" class="">
                            <button id="find-button"   class=" button btn  w-100 mt-4  p-2 border-0" disabled >Buscar Cliente</button>
                        </div>
                        <div id="input-container" class="container-fluid  row g-3">
                        </div>
                    </div>
                    <div id="card-container" class="container-fluid">
                        <?php
                        
                        if(isset($_POST) && sizeof($_POST)){
                            $identificacion = $_POST['identificacion'];
                            $tipo_cliente = $_POST['tipo_cliente'];
                            if($tipo_cliente == "Natural"){
                                if(ClienteController::EliminarClienteNatural($identificacion)){
                                    echo(
                                        '<div class="  alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
                                            Cliente eliminado!
                                         </div>
                                        '
                                    );
                                }
                                else{
                                    echo(
                                        '<div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
                                            No se puede eliminar el cliente!
                                         </div>
                                        '
                                    );
                                }
                            }
                            else if($tipo_cliente == "Juridico"){
                                if(ClienteController::EliminarClienteJuridico($identificacion)){
                                    echo(
                                        '<div class="  alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
                                            Cliente eliminado!
                                         </div>
                                        '
                                    );
                                }
                                else{
                                    echo(
                                        '<div class="  alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
                                            No se puede eliminar el cliente!
                                         </div>
                                        '
                                    );
                                }
                            }
                                
                        }
                        ?>
                    </div>
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
    include('js/clientes/eliminar_cliente.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api.js');
    ?>
</script>
</html>