<?php
header('Content-type: application/json');
include('./Controller/Usuario.php');
echo(json_encode(UsuarioController::ObtenerUsuarioById($identificacion)));
exit();
?>