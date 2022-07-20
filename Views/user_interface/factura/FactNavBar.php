
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
        <ul id="fact-opciones" class="navbar-nav me-auto mb-2 mb-lg-0">
          
          
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