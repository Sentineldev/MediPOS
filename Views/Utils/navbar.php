
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
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
              <li><a class="dropdown-item" href="<?php echo($_SESSION['url']."cliente/registrar"); ?>">Registrar</a></li>
              <li><a class="dropdown-item" href="<?php echo($_SESSION['url']."cliente/modificar"); ?>">Modificar</a></li>
              <li><a class="dropdown-item" href="<?php echo($_SESSION['url']."cliente/eliminar"); ?>">Eliminar</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo($_SESSION['url']."cliente/listar"); ?>">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lote
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Ingresar</a></li>
              <li><a class="dropdown-item" href="#">Modificar</a></li>
              <li><a class="dropdown-item" href="#">Eliminar</a></li>
              <li><a class="dropdown-item" href="#">Buscar</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuario
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Ingresar</a></li>
              <li><a class="dropdown-item" href="#">Modificar</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Factura
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Facturar</a></li>
              <li><a class="dropdown-item" href="#">Cargar</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Devolucion</a></li>
            </ul>
          </li>
          
        </ul>
        <div class="d-flex nav-item" role="search">
          <a class="navbar-brand" href="<?php echo($_SESSION['url']."logout"); ?>">
            <img src="../Imagenes/logout-svgrepo-com.svg" alt="" width="30" height="28" class="d-inline-block align-text-top">
            Salir
          </a>
          
        </div>

      </div>
    </div>
  </nav>