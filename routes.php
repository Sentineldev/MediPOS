<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/MediPOS/router.php");




#URLS para el login 
get('/','Views/auth/login.php');
post('/','Views/auth/login.php');




#urls para la vista principal al ingresar!
get("/home",'Views/user_interface/home.php');
get("/logout",'Views/auth/logout.php');

#<-----urls para las funcionalidades del cliente----->#

#vista de las funcionalidades de clientes
get("/cliente/registrar","Views/user_interface/cliente/RegistrarCliente.php");
post("/cliente/registrar","Views/user_interface/cliente/RegistrarCliente.php");

get("/cliente/modificar","Views/user_interface/cliente/ModificarCliente.php");
post("/cliente/modificar","Views/user_interface/cliente/ModificarCliente.php");








#Direcciones para obtener datos de la API
get('/cliente/obtener_cliente_natural/$identificacion','api/clientes/ObtenerClienteNatural.php');
get('/cliente/obtener_cliente_juridico/$identificacion','api/clientes/ObtenerClienteJuridico.php');


#any('/404','Views/404.php');
?>