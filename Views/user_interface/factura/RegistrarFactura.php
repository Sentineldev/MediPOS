<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturar</title>
    <style>
        <?php
            include('boostrap/css/bootstrap.css');
            include('CSS/navbar.css');
            include('CSS/content.css');
            include('CSS/base.css');
            include('CSS/factura.css');
        ?>
    </style>
</head>
<body>
    <?php
        include('Views/user_interface/factura/FactNavBar.php');
    ?>
    <section id="main">
        <section id="content">
            <?php
                include_once('Views/user_interface/factura/FactSideBar.php');
            ?>
            <div id="middle-content" class="container-fluid p-0">

                
                <h1 class="mt-2 m-2" id="middle-content-header">Facturar</h1>
                <form method="POST" id="form-container" class="d-flex  pt-1 pb-5">
                    <div class="container-fluid  m-0 w-50">
                        <div class="col-md-4 w-100">
                            <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                            <select name="tipo_cliente" id="tipo_cliente" class="form-select p-2">
                                <option value="">Seleccione</option>
                                <option value="Natural">Natural</option>
                                <option value="Juridico">Juridico</option>
                            </select>
                        </div>
                        <div class="col-md-4 w-100" id="identification-container">
                            
                        </div>
                        <div id="button-container" class="">
                            <button id="find-button"   class=" button btn  w-100 mt-4  p-2 border-0" disabled >Buscar Cliente</button>
                        </div>
                        <div id="input-container" class="container-fluid  row g-3">
                        </div>
                    </div>
                    <div id="card-container" class="container-fluid">
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
    include('js/factura/client.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/factura/factura.js');
    ?>
</script>

<script type="module">
    <?php
    include('js/factura/tables.js');
    ?>
</script>

<script type="module">
    <?php
    include('js/api_product.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api.js');
    ?>
</script>



</html>