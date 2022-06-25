<?php
include_once('./Controller/Usuario.php');

$_SESSION['url'] = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/MediPOS/";
$_SESSION['folder'] = $_SERVER['DOCUMENT_ROOT']."/MediPOS/".""
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
   
    <?php
            echo('<link rel="stylesheet" href="boostrap/css/bootstrap.css">');
            echo('<link rel="stylesheet" href="CSS/login_style.css">');
            echo('<link rel="stylesheet" href="CSS/style.css">');
    ?>
</head>
<body>
<section class="container-fluid section-container d-flex align-items-center justify-content-center p-3">
        <div class="black-container"></div>
        <div class="container-fluid login-container d-flex p-0 m-0 rounded-start">
            
            <h1>
            <?php
            if(isset($_POST) && sizeof($_POST) > 0){
            
                
                $username = $_POST['username'];
                $password = $_POST['password'];
                if(UsuarioController::ExisteUsuario($username,$password)){
                    $user = UsuarioController::ObtenerUsuario($username,$password)->fetch_assoc();
                    $_SESSION['user'] = $user;
                    header('Location: '.$_SESSION['url']."home");
                }                
                
            }

            ?>
            </h1>

            <div class="container-fluid form-container d-flex align-items-center justify-content-center rounded"> 
                <form action="" method="post" id="login-form" class="rounded   position-relative p-5 ">
                    <div class="header d-flex flex-column align-items-center">
                        <div class="">
                            <h1 class=" header pt-5  m-0 text-center">
                                Acceso
                            </h1>
                        </div>
                    </div>
                    <div class="input-group mb-5 mt-5">
                        <span id="usuario-icon"   class="input-group-text border-0  border-bottom border-4 " id="basic-addon1">
                        <?php
                            echo('<img src="Imagenes/user-svgrepo-com.svg" width="28" alt="">');
                        ?>
                        </span>
                        <input   type="text" name="username" id="usuario" class=" user-input form-control p-3 fs-3 rounded-0  border-0 border-4 border-bottom" placeholder="usuario" autocomplete="off" required>
                    </div>
                    <div class=" input-group mb-5 mt-5 pt-4 ">
                        <span id="clave-icon"  class="input-group-text  border-0 border-bottom border-4">
                            <?php
                                echo('<img src="Imagenes/padlock-password-protection-svgrepo-com.svg" width="28"  alt="">');
                            ?>
                        </span>
                        <input  type="password" name="password" id="clave" class=" user-input form-control p-3 fs-3 rounded-0 border-0 border-bottom border-4" placeholder="clave" autocomplete="off"required>
                    </div>
                    <button type="submit" class="btn  p-2 fs-2 mt-5 mb-5 rounded border-0">Ingresar</button>
                </form>
            </div>
        </div>
        <div class="container-fluid ad-container p-0 rounded-end"></div>
    </section>
</body>
</html>