<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
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
                <h1 id="middle-content-header">Listado de Productos</h1>
                <table id="data-table" class="table text-white mt-3 m-0 ">
                    <thead id="table-head" class="rounded">
                    </thead>
                    <tbody id="table-body" class="rounded">
                    </tbody>
                </table>
                <nav id="pagination" aria-label="Page navigation example bg-light">
                    <ul class="pagination" id="pagination-list">
                    </ul>
                </nav>
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
    include('js/productos/listar_productos.js');
    ?>
</script>
<script type="module">
    <?php
    include('js/api_product.js');
    ?>
</script>
</html>