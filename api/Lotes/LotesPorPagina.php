<?php
header('Content-type: application/json');
include('./Controller/Lote.php');
echo(json_encode(LoteController::ObtenerLotesPorPagina($pagina)));
exit();
?>