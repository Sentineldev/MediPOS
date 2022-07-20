

<?php

$rango = $_SESSION['user']['rango'];

$url = $_SESSION['url'];

$rutas = array(
  "cliente"=>[$url."cliente/registrar",$url."cliente/modificar",$url."cliente/eliminar",$url."cliente/listar"],
  "usuario"=>[$url."usuario/registrar",$url."usuario/modificar",$url."usuario/eliminar",$url."usuario/listar"],
  "producto"=>[$url."producto/registrar",$url."producto/modificar",$url."producto/eliminar",$url."producto/listar"],
  "lote"=>[$url."lote/registrar",$url."lote/modificar",$url."lote/eliminar",$url."lote/listar"]
);


?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo($_SESSION['url']."user/home"); ?>">
        <img src="../Imagenes/user-svgrepo-com.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Farmacia Porlamar
      </a>
      <button class="navbar-toggler  border-white border-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cliente
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
                $registrar = $rutas['cliente'][0]; $modificar = $rutas['cliente'][1];
                $eliminar = $rutas['cliente'][2]; $listar = $rutas['cliente'][3];
                if($rango == 1){
                  
                  echo(
                    "
                    <li><a class='dropdown-item' href='$registrar'>Registrar</a></li>
                    <li><a class='dropdown-item' href='$modificar'>Modificar</a></li>
                    <li><a class='dropdown-item' href='$eliminar'>Eliminar</a></li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='$listar'>Listar</a></li>
                    
                    
                    "
                  );
                }
                else{
                  echo(
                    "
                    <li><a class='dropdown-item' href='$registrar'>Registrar</a></li>
                    <li><a class='dropdown-item' href='$modificar'>Modificar</a></li>
                    
                    
                    "
                  );
                }

              ?>
            </ul>
          </li>
          <li class="nav-item dropdown">

            <?php
            if($rango == 1){
              $registrar = $rutas['usuario'][0]; $modificar = $rutas['usuario'][1];
              $eliminar = $rutas['usuario'][2]; $listar = $rutas['usuario'][3]; 
              if($rango == 1){
                echo(
                  "
                  <a class='nav-link dropdown-toggle' href='' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Usuario
                  </a>
                  <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    <li><a class='dropdown-item' href='$registrar'>Registrar</a></li>
                    <li><a class='dropdown-item' href='$modificar'>Modificar</a></li>
                    <li><a class='dropdown-item' href='$eliminar'>Eliminar</a></li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='$listar'>Listar</a></li>
                  </ul>
                  "
                );
              }
            }
            ?>
            
          </li>
          <li class="nav-item dropdown">
            <?php
              $registrar = $rutas['producto'][0]; $modificar = $rutas['producto'][1];
              $eliminar = $rutas['producto'][2]; $listar = $rutas['producto'][3]; 
              if($rango == 1){
                echo(
                  "
                  <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Producto
                  </a>
                  <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    <li><a class='dropdown-item' href='$registrar'>Registrar</a></li>
                    <li><a class='dropdown-item' href='$modificar'>Modificar</a></li>
                    <li><a class='dropdown-item' href='$eliminar'>Eliminar</a></li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='$listar'>Listar</a></li>
                  </ul>
                  
                  "
                );
              }
            ?>
          </li>
          
          <li class="nav-item dropdown">
            <?php
            $registrar = $rutas['lote'][0]; $modificar = $rutas['lote'][1];
            $eliminar = $rutas['lote'][2]; $listar = $rutas['lote'][3]; 
            if($rango == 1){
              echo(
                
                "
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                  Lote
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                  <li><a class='dropdown-item' href='$registrar'>Registrar</a></li>
                  <li><a class='dropdown-item' href='$modificar'>Modificar</a></li>
                  <li><a class='dropdown-item' href='$eliminar'>Eliminar</a></li>
                  <li><hr class='dropdown-divider'></li>
                  <li><a class='dropdown-item' href='$listar'>Listar</a></li>
                </ul>
                
                
                "
              );
            }
            ?>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Factura
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo($_SESSION['url']."factura/registrar"); ?>">Facturar</a></li>
            </ul>
          </li>
          
        </ul>
        <div class="d-flex nav-item" role="search">
          <a class="navbar-brand" href="<?php echo($_SESSION['url']."user/logout"); ?>">
            <img src="../Imagenes/logout-svgrepo-com.svg" alt="" width="30" height="28" class="d-inline-block align-text-top">
            Salir
          </a>
          
        </div>

      </div>
    </div>
  </nav>