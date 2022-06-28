
<?php
include('./Controller/Producto.php');
include('./Classes/Producto.php');

if(isset($_POST) && sizeof($_POST) > 0){
    $producto  = new Producto(
        $_POST['codigo_producto'],
        $_POST['descripcion'],
        $_POST['presentacion'],
        $_POST['cantidad'],
        $_POST['precio']
    );
    if(!ProductoController::ExisteProducto($producto->getCodigoProducto())){
        ProductoController::RegistrarProducto($producto);
        $respuesta = 
        '
        <div class=" alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
            Producto Registrado exitosamente!
        </div>
        ';
    }
    else{
        $respuesta = 
        '
        <div class=" alert alert-danger col-md-10 mt-4 mb-0 m-1" role="alert">
            El producto ya se encuentra registrado!
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
    <title>Registrar Producto</title>
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
                <h1 id="middle-content-header">Registrar Producto</h1>
                <form method="POST" id="form-container" class="row g-3 mt-2">
                    <div class="col-md-4" id="usuario-container"> 
                        <label for="codigo_producto" class="form-label m-1 ">Codigo del Producto</label>
                        <input type="text" name="codigo_producto" id="codigo_producto" class="form-control p-2" required>
                    </div>
                    <div class="col-md-4" id="usuario-container"> 
                        <label for="descripcion" class="form-label m-1 ">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control p-2" required>
                    </div>
                    <div class="col-md-4" id="usuario-container"> 
                        <label for="presentacion" class="form-label m-1 ">Presentacion</label>
                        <input type="text" name="presentacion" id="presentacion" class="form-control p-2" required>
                    </div>
                    <div class="col-md-4" id="usuario-container"> 
                        <label for="cantidad" class="form-label m-1 ">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control p-2" required>
                    </div>
                    <div class="col-md-4" id="usuario-container"> 
                        <label for="precio" class="form-label m-1 ">Precio</label>
                        <input type="number" step="0.01" name="precio" id="precio" class="form-control p-2" required>
                    </div>
                    <div id="button-container" class="">
                        <button id="button-register"class=" button btn w-25  mt-4 m-1  p-2 border-0">Registrar Usuario</button>
                    </div>
                    <?php
                    if(isset($respuesta)){
                        echo($respuesta);
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

</html>