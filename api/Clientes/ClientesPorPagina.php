<?php
header('Content-type: application/json');
include('./Controller/Cliente.php');
echo(json_encode(ClienteController::ObtenerClientesPorPagina($tipo_cliente,$pagina)));
exit();
?>