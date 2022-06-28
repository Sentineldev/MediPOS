
<?php 
include('./Controller/Usuario.php');
$respuesta = "";
if(isset($_POST) && sizeof($_POST) >0){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rango = $_POST['rango'];
    $identificacion = $_POST['identificacion'];

    if(!UsuarioController::ExisteUsuarioByUser($usuario) && !UsuarioController::ExisteUsuarioById($identificacion)){
        UsuarioController::RegistrarUsuario($identificacion,$usuario,$clave,$rango);
        $respuesta = 
        '
        <div class=" alert-modify alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
            Registrado exitosamente!
        </div>
       ';
    }
    else{
        $respuesta = 
        '
        <div class="alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El usuario ya existe!
        </div>
       ';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
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
                <h1 id="middle-content-header">Registrar Usuario</h1>
                <form method="POST" id="form-container" class="d-flex pt-1 pb-5">
                    <div class="container-fluid m-0 w-50 p-1 ">
                        <div class="col-md-4 w-100">
                            <label for="identificacion" class="form-label m-1">Cedula</label>
                            <input type="text" name="identificacion" id="identificacion" class="form-control p-2" required>
                        </div>
                        <div id="button-container" class="">
                            <button id="find-button"class=" button btn  w-50 mt-4  p-2 border-0">Buscar Cliente</button>
                        </div>
                        <div id="user-form">
                        </div>
                    </div>
                    <div id="card-container" class="container-fluid">
                    <?php
                        echo($respuesta);
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
    include('js/usuarios/registrar_usuario.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api.js');
    ?>
</script>
</html>