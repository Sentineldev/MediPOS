<?php
header('Content-type: application/json');
include('./Controller/Factura.php');
include('./Controller/Usuario.php');
$json = file_get_contents('php://input');
$data = json_decode($json);




$id_establecimiento = 1;
$id_usuario = UsuarioController::ObtenerUsuarioByUserId($_SESSION['user']['id_usuario']);
FacturaController::GuardarFactura(
    $data->monto,
    $data->cliente->identificacion,
    $id_usuario['identificacion'],
    $id_establecimiento
);

FacturaController::GuardarProductoFactura($data->productos);
FacturaController::GuardarPagoFactura($data->pagos);
FacturaController::PrintFactura($id_usuario,$data->cliente,$id_establecimiento,$data->productos,$data->pagos);
echo(json_encode($data->pagos));
?>