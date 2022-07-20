
<?php 

include('./Controller/Producto.php');
include('./Classes/Producto.php');
if(isset($_POST) && sizeof($_POST) > 0){
    
    $producto = new Producto(
        $_POST['codigo_producto'],
        $_POST['descripcion'],
        $_POST['presentacion'],
        $_POST['cantidad'],
        $_POST['precio']
    );
    ProductoController::ModificarProducto($producto);
    $respuesta = 
    '
    <div class=" alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
        Modificado exitosamente!
    </div>
    ';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
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
                <h1 id="middle-content-header">Modificar Producto</h1>
                <form method="POST" id="form-container" class="row g-3">
                    <div class="col-md-4" id="usuario-container"> 
                        <label for="codigo_producto" class="form-label m-1 ">Codigo del Producto</label>
                        <input maxlength="128" type="text" name="codigo_producto" id="codigo_producto" class="form-control p-2" required>
                    </div>
                    <div id="button-container" class="">
                        <button id="find-button"class=" button btn w-25  mt-4 m-1  p-2 border-0">Registrar Producto</button>
                    </div>
                    <div id="input-container" class="container-fluid row g-3">
                        <?php
                        if(isset($respuesta)){
                            echo($respuesta);
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
    include('js/productos/modificar_producto.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api_product.js');
    ?>
</script>
</html>