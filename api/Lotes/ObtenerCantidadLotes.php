<?php
header('Content-type: application/json');
include('./Controller/Lote.php');
echo(json_encode(LoteController::ObtenerCantidadLotes()));
exit();
?>