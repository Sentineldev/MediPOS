<?php
header('Content-type: application/json');
include('./Controller/Usuario.php');
echo(json_encode(UsuarioController::ObtenerUsuariosPorPagina($pagina)));
exit();
?>