

<?php 
include('./Controller/Lote.php');
include('./Classes/Lote.php');

if(isset($_POST) && sizeof($_POST) > 0){
    $num_lote = $_POST['num_lote'];

    LoteController::EliminarLote($num_lote); 
    $respuesta = 
    '
    <div class=" alert alert-success col-md-10 mt-4 mb-0 m-1" role="alert">
        Lote Eliminado exitosamente!
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
    <title>Eliminar Lote</title>
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
                <h1 id="middle-content-header">Eliminar Lote</h1>
                <form method="POST" id="form-container" class="d-flex pt-1 pb-5">
                    <div class="container-fluid m-0 w-50 p-1 ">
                        <div class="col-md-4 w-100">
                            <label for="num_lote" class="form-label m-1">Numero de Lote</label>
                            <input type="number" name="num_lote" id="num_lote" class="form-control p-2" required>
                        </div>
                        <div id="button-container" class="">
                            <button id="find-button"class=" button btn  w-50 mt-4  p-2 border-0">Buscar Lote</button>
                        </div>
                    </div>
                    <div id="card-container" class="container-fluid">
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
    include('js/lotes/eliminar_lote.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api_product.js');
    ?>
</script>

</html>