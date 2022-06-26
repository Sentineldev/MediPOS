<?php
header('Content-type: application/json');
include('./Controller/Cliente.php');
echo(json_encode(ClienteController::ObtenerCantidadClientes($tipo_cliente)));
exit();
?>