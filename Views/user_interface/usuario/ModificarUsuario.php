<?php
include('./Controller/Usuario.php');
$respuesta = "";
if(isset($_POST) && sizeof($_POST) > 0){
    $identificacion = $_POST['identificacion'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rango = $_POST['rango'];
    
    $user = UsuarioController::ObtenerUsuarioById($identificacion);
    if($user['usuario'] == $usuario){
        UsuarioController::ModificarUsuario($identificacion,$usuario,$clave,$rango);
        $respuesta = 
        '<div class="alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
            Modificado exitosamente!
        </div>';
    }
    else{
        if(!UsuarioController::ExisteUsuarioByUser($usuario)){
            UsuarioController::ModificarUsuario($identificacion,$usuario,$clave,$rango);
            $respuesta = 
            '<div class="alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
                Modificado exitosamente!
            </div>';
            
        }
        else{
            $respuesta = 
            '<div class="alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
                El usuario ya se encuentra en uso!
            </div>';
        }
    }

    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
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
                <h1 id="middle-content-header">Modificar Usuario</h1>
                <form method="POST" id="form-container" class="row g-3">
                    <div class="col-md-4">
                        <label for="identificacion" class="form-label m-1">Cedula</label>
                        <input maxlength="32" type="text" name="identificacion" id="identificacion" class="form-control p-2" required>
                    </div>
                    <div id="button-container" class="col-12 m-0">
                        <button id="find-button" class="button btn  w-25 mt-4 m-1 p-2 "  type="submit" >Buscar Usuario</button>
                    </div>
                    <div id="input-container" class="col-12 m-0 d-flex flex-column">
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
    include('js/usuarios/modificar_usuario.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api_user.js');
    ?>
</script>
</html>