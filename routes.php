<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/MediPOS/router.php");




#URLS para el login 
get('/','Views/auth/login.php');
post('/','Views/auth/login.php');




#urls para la vista principal al ingresar!
get("/user/home",'Views/user_interface/home.php');
get("/user/logout",'Views/auth/logout.php');

#<-----urls para las funcionalidades del cliente----->#

#vista de las funcionalidades de clientes
get("/cliente/registrar","Views/user_interface/cliente/RegistrarCliente.php");
post("/cliente/registrar","Views/user_interface/cliente/RegistrarCliente.php");

get("/cliente/modificar","Views/user_interface/cliente/ModificarCliente.php");
post("/cliente/modificar","Views/user_interface/cliente/ModificarCliente.php");

get("/cliente/eliminar","Views/user_interface/cliente/EliminarCliente.php");
post("/cliente/eliminar","Views/user_interface/cliente/EliminarCliente.php");

get("/cliente/listar","Views/user_interface/cliente/ListarClientes.php");
post("/cliente/listar","Views/user_interface/cliente/ListarClientes.php");

#<-----urls para las funcionalidades del usuario----->#

#vista de las funcionalidades de usuarios
get("/usuario/registrar","Views/user_interface/usuario/RegistrarUsuario.php");
post("/usuario/registrar","Views/user_interface/usuario/RegistrarUsuario.php");

get("/usuario/modificar","Views/user_interface/usuario/ModificarUsuario.php");
post("/usuario/modificar","Views/user_interface/usuario/ModificarUsuario.php");

get("/usuario/eliminar","Views/user_interface/usuario/EliminarUsuario.php");
post("/usuario/eliminar","Views/user_interface/usuario/EliminarUsuario.php");

get("/usuario/listar","Views/user_interface/usuario/ListarUsuarios.php");

#<-----urls para las funcionalidades del producto----->#

#vista de las funcionalidades de productos

get("/producto/registrar","Views/user_interface/producto/RegistrarProducto.php");
post("/producto/registrar","Views/user_interface/producto/RegistrarProducto.php");

get("/producto/modificar","Views/user_interface/producto/ModificarProducto.php");
post("/producto/modificar","Views/user_interface/producto/ModificarProducto.php");

get("/producto/eliminar","Views/user_interface/producto/EliminarProducto.php");
post("/producto/eliminar","Views/user_interface/producto/EliminarProducto.php");


get("/producto/listar","Views/user_interface/producto/ListarProductos.php");


#<-----urls para las funcionalidades de los metodos de lotes----->#

#vista de las funcionalidades de metodos de lotes

get("/lote/registrar","Views/user_interface/lote/RegistrarLote.php");
post("/lote/registrar","Views/user_interface/lote/RegistrarLote.php");

get("/lote/modificar","Views/user_interface/lote/ModificarLote.php");
post("/lote/modificar","Views/user_interface/lote/ModificarLote.php");

get("/lote/eliminar","Views/user_interface/lote/EliminarLote.php");
post("/lote/eliminar","Views/user_interface/lote/EliminarLote.php");

get("/lote/listar","Views/user_interface/lote/ListarLotes.php");


#<-----urls para las funcionalidades de los metodos de lotes----->#

#vista de las funcionalidades de metodos de lotes

get('/factura/registrar','Views/user_interface/factura/RegistrarFactura.php');


#Direcciones para obtener datos de la API de los clientes
get('/cliente/obtener_cliente_natural/$identificacion','api/clientes/ObtenerClienteNatural.php');
get('/cliente/obtener_cliente_juridico/$identificacion','api/clientes/ObtenerClienteJuridico.php');
get('/cliente/obtener_cantidad_clientes/$tipo_cliente','api/clientes/ObtenerCantidadClientes.php');
get('/cliente/obtener_clientes/$tipo_cliente/$pagina','api/clientes/ClientesPorPagina.php');




#Direcciones para obtener datos de la API de los usuarios
get('/usuario/obtener_usuario_by_id/$identificacion','api/usuarios/ObtenerUsuarioByID.php');
get('/usuario/obtener_cantidad_usuarios','api/usuarios/ObtenerCantidadUsuarios.php');
get('/usuario/obtener_usuarios/$pagina','api/usuarios/UsuariosPorPagina.php');



#Direcciones para obtener datos de la API de los productos
get('/producto/obtener_producto/$codigo_producto','api/productos/ObtenerProducto.php');
get('/producto/obtener_producto_pagina/$pagina','api/productos/ProductosPorPagina.php');
get('/producto/obtener_cantidad_productos','api/productos/ObtenerCantidadProductos.php');

#Direcciones para obtener datos de la API de los lotes
get('/lote/obtener_lote/$numero_lote','api/lotes/ObtenerLote.php');
get('/lote/obtener_lotes_por_pagina/$pagina','api/lotes/LotesPorPagina.php');
get('/lote/obtener_cantidad_lotes','api/lotes/ObtenerCantidadLotes.php');

#Direcciones para guardar la factura
post("/factura/guardar_factura",'api/Factura/GuardarFactura.php')

#any('/404','Views/404.php');
?>