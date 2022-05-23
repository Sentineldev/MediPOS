<?php

#Obtener los datos cuando se envie una peticion de post
if(isset($_POST) && sizeof($_POST)>0){
    $username = $_POST['username'];
    $password = $_POST['password'];

    #Validando que la cuenta ingresada esta registrada.
    if($username == "root" && $password == ""){
        require_once('pos.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <div class="img-container">
        <div class="black-screen"></div>
        <img src="" alt="" class="img-cover">
    </div>
    <div class=" main-container container-fluid">
        <div class="empty-box"></div>
        <form class="form-container rounded"method="POST">
            <div class="top-bar"></div>
            <h1 class="display-4" id="form-header">Ingreso</h1>
            <div class="mb-3">
              <label for="username" class="form-label">Usuario</label>
              <input name="username" type="text" class="form-control" id="username" aria-describedby="UserHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button id="form-button" type="submit" class="btn btn-primary btn-lg">Ingresar</button>
          </form>
          <div class="empty-box"></div>
          <div class="container-fluid">
              <footer class="footer column justify-content-center">
                  <h1>LocalServer</h1>
                  <h5>©Copyright 2022</h3>
              </footer>
          </div>
    </div>
        
</body>
<script src="./bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js"></script>
</html>