-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-07-2022 a las 02:43:14
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `ActualizarClienteJuridico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarClienteJuridico` (IN `identificacion` VARCHAR(32), IN `telefono_empresa` VARCHAR(32))  UPDATE cliente_juridico
SET cliente_juridico.telefono_empresa = telefono_empresa
WHERE cliente_juridico.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `ActualizarClienteNatural`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarClienteNatural` (IN `apellido` VARCHAR(64), IN `nacionalidad` VARCHAR(64), IN `sexo` VARCHAR(16), IN `fecha_nacimiento` DATE, IN `identificacion` VARCHAR(32))  UPDATE cliente_natural

SET
cliente_natural.apellido = apellido,
cliente_natural.nacionalidad = nacionalidad,
cliente_natural.sexo = sexo,
cliente_natural.fecha_nacimiento = fecha_nacimiento
WHERE cliente_natural.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `ActualizarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPersona` (IN `nombre` VARCHAR(64), IN `direccion` VARCHAR(128), IN `telefono_contacto` VARCHAR(32), IN `correo` VARCHAR(128), IN `identificacion` VARCHAR(32))  MODIFIES SQL DATA
UPDATE persona 
SET
persona.nombre = nombre,
persona.direccion = direccion,
persona.telefono_contacto = telefono_contacto,
persona.correo = correo
WHERE persona.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `EliminarClienteJuridico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarClienteJuridico` (IN `identificacion` VARCHAR(32))  MODIFIES SQL DATA
DELETE FROM cliente_juridico
WHERE cliente_juridico.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `EliminarClienteNatural`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarClienteNatural` (IN `identificacion` VARCHAR(32))  MODIFIES SQL DATA
DELETE FROM cliente_natural
WHERE cliente_natural.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `EliminarLote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarLote` (IN `numero_lote` INT)  MODIFIES SQL DATA
DELETE FROM lote 
WHERE lote.numero_lote = numero_lote$$

DROP PROCEDURE IF EXISTS `EliminarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarPersona` (IN `identificacion` VARCHAR(32))  MODIFIES SQL DATA
DELETE FROM persona
WHERE persona.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `EliminarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarProducto` (IN `codigo_producto` VARCHAR(128))  MODIFIES SQL DATA
DELETE FROM producto
WHERE producto.codigo_producto = codigo_producto$$

DROP PROCEDURE IF EXISTS `EliminarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuario` (IN `identificacion` VARCHAR(32))  MODIFIES SQL DATA
DELETE FROM usuario
WHERE usuario.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `ExisteCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ExisteCliente` (IN `identificacion` VARCHAR(32), IN `tipo_cliente` VARCHAR(16))  SELECT * FROM persona WHERE persona.identificacion = identificacion and persona.tipo_persona = tipo_cliente$$

DROP PROCEDURE IF EXISTS `ExisteUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ExisteUsuario` (IN `usuario` VARCHAR(64))  READS SQL DATA
SELECT * FROM usuario
WHERE usuario.usuario = usuario$$

DROP PROCEDURE IF EXISTS `ExisteUsuarioByID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ExisteUsuarioByID` (IN `identificacion` VARCHAR(32))  READS SQL DATA
SELECT * FROM usuario 
WHERE usuario.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `GuardarFactura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarFactura` (IN `monto` FLOAT, IN `identificacion_cliente` VARCHAR(32), IN `identificacion_usuario` VARCHAR(32), IN `id_establecimiento` INT)  MODIFIES SQL DATA
INSERT INTO factura(
    factura.monto,
    factura.identificacion_usuario,
    factura.identificacion_cliente,
    factura.id_establecimiento
) VALUES(
    monto,
    identificacion_usuario,
    identificacion_cliente,
    id_establecimiento
)$$

DROP PROCEDURE IF EXISTS `GuardarPagoFactura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarPagoFactura` (IN `id_factura` INT, IN `id_metodo_pago` INT, IN `monto` FLOAT)  READS SQL DATA
INSERT INTO metodo_pago_factura(
	metodo_pago_factura.id_factura,
    metodo_pago_factura.id_metodo_pago,
    metodo_pago_factura.monto
)
VALUES(
	id_factura,
    id_metodo_pago,
    monto
)$$

DROP PROCEDURE IF EXISTS `GuardarProductoFactura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarProductoFactura` (IN `factura_id` INT, IN `producto_id` VARCHAR(128), IN `cantidad_producto` INT)  MODIFIES SQL DATA
INSERT INTO factura_producto(
    factura_producto.factura_id,
    factura_producto.codigo_producto,
    factura_producto.cantidad_producto
)VALUES(
	factura_id,
    producto_id,
    cantidad_producto
)$$

DROP PROCEDURE IF EXISTS `ModificarLote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarLote` (IN `numero_lote` INT, IN `cantidad` INT, IN `precio` FLOAT, IN `fecha_entrada` DATE, IN `fecha_vencimiento` DATE)  MODIFIES SQL DATA
UPDATE lote
SET lote.cantidad = cantidad,
lote.precio = precio,
lote.fecha_entrada = fecha_entrada,
lote.fecha_vencimiento = fecha_vencimiento
WHERE lote.numero_lote = numero_lote$$

DROP PROCEDURE IF EXISTS `ModificarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarProducto` (IN `codigo_producto` VARCHAR(128), IN `descripcion` VARCHAR(128), IN `presentacion` VARCHAR(64), IN `cantidad` INT, IN `precio` FLOAT)  MODIFIES SQL DATA
UPDATE producto
SET producto.descripcion = descripcion,
producto.presentacion = presentacion,
producto.cantidad = cantidad,
producto.precio = precio
WHERE producto.codigo_producto = codigo_producto$$

DROP PROCEDURE IF EXISTS `ModificarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarUsuario` (IN `identificacion` VARCHAR(32), IN `usuario` VARCHAR(64), IN `clave` VARCHAR(128), IN `rango` INT)  MODIFIES SQL DATA
UPDATE usuario
SET usuario.usuario = usuario,
usuario.clave = clave,
usuario.rango = rango
WHERE usuario.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `ObtenerCantidadClientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCantidadClientes` (IN `tipo_cliente` VARCHAR(16))  READS SQL DATA
SELECT COUNT(*) as `cantidad` FROM persona
WHERE persona.tipo_persona = tipo_cliente$$

DROP PROCEDURE IF EXISTS `ObtenerCantidadLotes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCantidadLotes` ()  READS SQL DATA
SELECT COUNT(*) as `cantidad` FROM lote$$

DROP PROCEDURE IF EXISTS `ObtenerCantidadProductos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCantidadProductos` ()  READS SQL DATA
SELECT COUNT(*) as `cantidad` FROM  producto$$

DROP PROCEDURE IF EXISTS `ObtenerCantidadUsuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerCantidadUsuarios` ()  READS SQL DATA
SELECT COUNT(*) as `cantidad`
FROM usuario$$

DROP PROCEDURE IF EXISTS `ObtenerClienteJuridico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerClienteJuridico` (IN `identificacion` VARCHAR(32))  READS SQL DATA
SELECT 
p.identificacion,p.nombre,p.direccion,
p.telefono_contacto,p.correo,
p.tipo_persona,cj.telefono_empresa,p.id_persona
FROM cliente_juridico as cj
JOIN persona as  p ON p.identificacion = cj.identificacion
WHERE cj.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `ObtenerClienteNatural`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerClienteNatural` (IN `identificacion` VARCHAR(32))  READS SQL DATA
SELECT
cn.identificacion,p.nombre,cn.apellido,
p.direccion,p.telefono_contacto,p.correo,
p.tipo_persona,cn.sexo,cn.nacionalidad,
cn.fecha_nacimiento,
p.id_persona,cn.id_cliente_natural
FROM cliente_natural as cn
JOIN persona AS p ON p.identificacion = cn.identificacion

WHERE cn.identificacion = identificacion$$

DROP PROCEDURE IF EXISTS `ObtenerClienteRangoJuridico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerClienteRangoJuridico` (IN `rango_inferior` INT, IN `rango_superior` INT)  READS SQL DATA
SELECT * FROM cliente_juridico
JOIN  persona ON persona.identificacion = cliente_juridico.identificacion
LIMIT rango_inferior,rango_superior$$

DROP PROCEDURE IF EXISTS `ObtenerClienteRangoNatural`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerClienteRangoNatural` (IN `rango_inferior` INT, IN `rango_superior` INT)  READS SQL DATA
SELECT * FROM cliente_natural
JOIN persona ON persona.identificacion = cliente_natural.identificacion
LIMIT rango_inferior,rango_superior$$

DROP PROCEDURE IF EXISTS `obtenerClientesJuridicos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerClientesJuridicos` ()  READS SQL DATA
SELECT * FROM cliente_juridico
JOIN  persona ON persona.identificacion = cliente_juridico.identificacion$$

DROP PROCEDURE IF EXISTS `obtenerClientesNaturales`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerClientesNaturales` ()  READS SQL DATA
SELECT * FROM cliente_natural
JOIN persona ON persona.identificacion = cliente_natural.identificacion$$

DROP PROCEDURE IF EXISTS `ObtenerEstablecimiento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerEstablecimiento` (IN `id_establecimiento` INT)  READS SQL DATA
SELECT * FROM  establecimiento 
WHERE establecimiento.id_establecimiento = id_establecimiento$$

DROP PROCEDURE IF EXISTS `ObtenerFactura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerFactura` (IN `id_factura` INT)  READS SQL DATA
SELECT * FROM factura
WHERE id_factura = factura.id_factura$$

DROP PROCEDURE IF EXISTS `ObtenerLote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerLote` (IN `numero_lote` INT)  READS SQL DATA
SELECT 
lote.id_lote,
lote.numero_lote,
lote.cantidad as `cantidad_lote`,
lote.precio as `precio_lote`,
lote.fecha_entrada,
lote.fecha_vencimiento,
producto.id_producto,
producto.codigo_producto,
producto.descripcion,
producto.presentacion,
producto.precio as `precio_producto`,
producto.cantidad as `cantidad_producto`
FROM lote
JOIN producto ON producto.codigo_producto = lote.codigo_producto
WHERE lote.numero_lote = numero_lote$$

DROP PROCEDURE IF EXISTS `ObtenerLotesRango`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerLotesRango` (IN `rango_inferior` INT, IN `rango_superior` INT)  READS SQL DATA
SELECT 
lote.id_lote,
lote.numero_lote,
lote.cantidad as `cantidad_lote`,
lote.precio as `precio_lote`,
lote.fecha_entrada,
lote.fecha_vencimiento,
producto.id_producto,
producto.codigo_producto,
producto.descripcion,
producto.presentacion,
producto.precio as `precio_producto`,
producto.cantidad as `cantidad_producto`
FROM lote
JOIN producto ON producto.codigo_producto = lote.codigo_producto
LIMIT rango_inferior,rango_superior$$

DROP PROCEDURE IF EXISTS `ObtenerProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerProducto` (IN `codigo_producto` VARCHAR(128))  READS SQL DATA
SELECT * FROM producto 
WHERE producto.codigo_producto = codigo_producto$$

DROP PROCEDURE IF EXISTS `ObtenerProductosRango`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerProductosRango` (IN `rango_inferior` INT, IN `rango_superior` INT)  READS SQL DATA
SELECT * FROM producto
LIMIT rango_inferior,rango_superior$$

DROP PROCEDURE IF EXISTS `ObtenerUltimaFactura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerUltimaFactura` ()  READS SQL DATA
SELECT id_factura FROM factura
ORDER BY id_factura DESC limit 1$$

DROP PROCEDURE IF EXISTS `obtenerUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerUsuario` (IN `usuario` VARCHAR(64), IN `clave` VARCHAR(128))  SELECT nombre,apellido,usuario,clave,id_usuario,rango FROM usuario
JOIN cliente_natural as CN ON CN.identificacion = usuario.identificacion
JOIN persona as P on P.identificacion = usuario.identificacion
WHERE usuario.usuario = usuario and usuario.clave = clave$$

DROP PROCEDURE IF EXISTS `ObtenerUsuarioByUserId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerUsuarioByUserId` (IN `id_usuario` INT)  SELECT * FROM usuario
JOIN cliente_natural as `cn` ON cn.identificacion = usuario.identificacion
JOIN persona as `p` ON p.identificacion = usuario.identificacion
WHERE id_usuario = usuario.id_usuario$$

DROP PROCEDURE IF EXISTS `ObtenerUsuariosRango`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerUsuariosRango` (IN `rango_inferior` INT, IN `rango_superior` INT)  SELECT * FROM usuario
LIMIT rango_inferior,rango_superior$$

DROP PROCEDURE IF EXISTS `RegistrarClienteJuridico`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarClienteJuridico` (IN `identificacion` VARCHAR(32), IN `telefono_empresa` VARCHAR(32))  MODIFIES SQL DATA
INSERT INTO cliente_juridico(
    cliente_juridico.identificacion,
    cliente_juridico.telefono_empresa
) VALUES(
    identificacion,
    telefono_empresa
)$$

DROP PROCEDURE IF EXISTS `RegistrarClienteNatural`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarClienteNatural` (IN `identificacion` VARCHAR(32), IN `apellido` VARCHAR(64), IN `nacionalidad` VARCHAR(64), IN `sexo` VARCHAR(16), IN `fecha_nacimiento` DATE)  INSERT INTO cliente_natural(
    cliente_natural.identificacion,
    cliente_natural.apellido,
    cliente_natural.nacionalidad,
    cliente_natural.sexo,
    cliente_natural.fecha_nacimiento
) VALUES(
    identificacion,
    apellido,
    nacionalidad,
    sexo,
    fecha_nacimiento
)$$

DROP PROCEDURE IF EXISTS `RegistrarLote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarLote` (IN `codigo_producto` VARCHAR(128), IN `numero_lote` INT, IN `cantidad` INT, IN `precio` FLOAT, IN `fecha_entrada` DATE, IN `fecha_vencimiento` DATE)  MODIFIES SQL DATA
INSERT INTO lote(
    lote.codigo_producto,
    lote.numero_lote,
    lote.cantidad,
    lote.precio,
    lote.fecha_entrada,
    lote.fecha_vencimiento
)
VALUES (
    codigo_producto,
    numero_lote,
    cantidad,
    precio,
    fecha_entrada,
    fecha_vencimiento
)$$

DROP PROCEDURE IF EXISTS `RegistrarPersona`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarPersona` (IN `identificacion` VARCHAR(32), IN `nombre` VARCHAR(64), IN `direccion` VARCHAR(128), IN `telefono_contacto` VARCHAR(32), IN `correo` VARCHAR(129), IN `tipo_persona` VARCHAR(16))  MODIFIES SQL DATA
INSERT INTO persona(
    persona.identificacion,
    persona.nombre,
    persona.direccion,
    persona.telefono_contacto,
    persona.correo,
    persona.tipo_persona
) VALUES (
    identificacion,
    nombre,
    direccion,
    telefono_contacto,
    correo,
    tipo_persona
)$$

DROP PROCEDURE IF EXISTS `RegistrarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarProducto` (IN `codigo_producto` VARCHAR(128), IN `descripcion` VARCHAR(128), IN `presentacion` VARCHAR(64), IN `cantidad` INT, IN `precio` FLOAT)  MODIFIES SQL DATA
INSERT INTO producto(
    producto.codigo_producto,
    producto.descripcion,
    producto.presentacion,
    producto.cantidad,
    producto.precio
)
VALUES(
    codigo_producto,
    descripcion,
    presentacion,
    cantidad,
    precio
)$$

DROP PROCEDURE IF EXISTS `RegistrarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuario` (IN `identificacion` VARCHAR(32), IN `usuario` VARCHAR(64), IN `clave` VARCHAR(128), IN `rango` INT)  MODIFIES SQL DATA
INSERT INTO 
usuario(
    usuario.identificacion
        ,usuario.usuario
        ,usuario.clave
        ,usuario.rango
)
VALUES(
    identificacion,
    usuario,
    clave,
    rango
)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_juridico`
--

DROP TABLE IF EXISTS `cliente_juridico`;
CREATE TABLE IF NOT EXISTS `cliente_juridico` (
  `id_cliente_juridico` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono_empresa` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente_juridico`),
  UNIQUE KEY `identificacion` (`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_natural`
--

DROP TABLE IF EXISTS `cliente_natural`;
CREATE TABLE IF NOT EXISTS `cliente_natural` (
  `id_cliente_natural` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `nacionalidad` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id_cliente_natural`),
  UNIQUE KEY `id_cliente_natural` (`id_cliente_natural`,`identificacion`),
  UNIQUE KEY `identificacion` (`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente_natural`
--

INSERT INTO `cliente_natural` (`id_cliente_natural`, `identificacion`, `apellido`, `nacionalidad`, `sexo`, `fecha_nacimiento`) VALUES
(1, '29660012', 'Figuera', 'Venezolano', 'Masculino', '2001-10-23'),
(18, '30547870', 'Gadke', 'Venezolano', 'Femenino', '2003-10-30'),
(29, '29582637', 'Hernandez Mora', 'Venezolano', 'Masculino', '2001-10-15'),
(30, '12067253', 'Zabala', 'Venezolano', 'Masculino', '1967-09-26'),
(31, '11855543', 'Marcano', 'Venezolano', 'Masculino', '2020-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

DROP TABLE IF EXISTS `establecimiento`;
CREATE TABLE IF NOT EXISTS `establecimiento` (
  `id_establecimiento` int NOT NULL AUTO_INCREMENT,
  `telefono` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_establecimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id_establecimiento`, `telefono`, `direccion`, `nombre`) VALUES
(1, '02952421768', 'La asuncion escudo de armas', 'Farmacia DelValle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `identificacion_usuario` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `identificacion_cliente` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_establecimiento` int NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_establecimiento` (`id_establecimiento`),
  KEY `id_usuario` (`identificacion_usuario`),
  KEY `id_cliente` (`identificacion_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `monto`, `identificacion_usuario`, `identificacion_cliente`, `id_establecimiento`) VALUES
(140, 110.5, '29582637', '29660012', 1),
(141, 52.5, '29582637', '29660012', 1),
(142, 28.5, '12067253', '11855543', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_producto`
--

DROP TABLE IF EXISTS `factura_producto`;
CREATE TABLE IF NOT EXISTS `factura_producto` (
  `factura_producto_id` int NOT NULL AUTO_INCREMENT,
  `factura_id` int NOT NULL,
  `codigo_producto` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_producto` int NOT NULL,
  PRIMARY KEY (`factura_producto_id`),
  KEY `cod_prod` (`codigo_producto`),
  KEY `id_fact` (`factura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura_producto`
--

INSERT INTO `factura_producto` (`factura_producto_id`, `factura_id`, `codigo_producto`, `cantidad_producto`) VALUES
(122, 140, '0105', 2),
(123, 140, '0103', 1),
(124, 141, '0103', 5),
(125, 142, '123456789', 6),
(126, 142, '0103', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

DROP TABLE IF EXISTS `lote`;
CREATE TABLE IF NOT EXISTS `lote` (
  `id_lote` int NOT NULL AUTO_INCREMENT,
  `numero_lote` int NOT NULL,
  `codigo_producto` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precio` float NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  PRIMARY KEY (`id_lote`),
  UNIQUE KEY `numero_lote` (`numero_lote`),
  KEY `codigo_producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id_lote`, `numero_lote`, `codigo_producto`, `cantidad`, `precio`, `fecha_entrada`, `fecha_vencimiento`) VALUES
(15, 8733, '123456789', 150, 5, '2020-03-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

DROP TABLE IF EXISTS `metodo_pago`;
CREATE TABLE IF NOT EXISTS `metodo_pago` (
  `id_metodo_pago` int NOT NULL AUTO_INCREMENT,
  `moneda` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `entidad` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_metodo_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_metodo_pago`, `moneda`, `entidad`, `tipo`) VALUES
(1, 'Bolivares', 'Banco de Venezuela', 'Debito'),
(2, 'Bolivares', 'Banco de Venezuela', 'Credito'),
(3, 'Bolivares', 'Solo', 'Efectivo'),
(5, 'Bolivares', 'Otros', 'Debito'),
(6, 'Bolivares', 'Otros', 'Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago_factura`
--

DROP TABLE IF EXISTS `metodo_pago_factura`;
CREATE TABLE IF NOT EXISTS `metodo_pago_factura` (
  `id_metodo_pago_factura` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `id_metodo_pago` int NOT NULL,
  `monto` float NOT NULL,
  PRIMARY KEY (`id_metodo_pago_factura`),
  KEY `id_factura` (`id_factura`),
  KEY `id_metodo_pago` (`id_metodo_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metodo_pago_factura`
--

INSERT INTO `metodo_pago_factura` (`id_metodo_pago_factura`, `id_factura`, `id_metodo_pago`, `monto`) VALUES
(64, 140, 1, 110.5),
(65, 141, 1, 52.5),
(66, 142, 3, 15),
(67, 142, 5, 3.5),
(68, 142, 6, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_contacto` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_persona` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `identificacion` (`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `identificacion`, `nombre`, `direccion`, `telefono_contacto`, `correo`, `tipo_persona`) VALUES
(1, '29660012', 'Jesus', 'La asuncion Escudo de armas con calle la victoreana', '04123548627', 'jesusfiguera@gmail.com', 'Natural'),
(26, '30547870', 'Jade', 'Apostadero', '04165970491', 'jadegadke@gmail.com', 'Natural'),
(41, '29582637', 'Ulises Jose', 'Calle las Flores con calle Guilarte, Conjunto Residencial y Comercial Mucuraparo, Apartamento 9 Torre A', '04129447464', 'ulisesjhm@gmail.com', 'Natural'),
(42, '12067253', 'Suhail ', 'Porlamar', '869898689', 'jesusfiguera20@gmail.com', 'Natural'),
(43, '11855543', 'Ingrith ', 'Altagracia', '980980980980989', 'parcial@hotmail.com', 'Natural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `presentacion` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo_producto`, `descripcion`, `presentacion`, `cantidad`, `precio`) VALUES
(21, '0103', 'Acetaminofen', '20g', 10, 10.5),
(22, '0105', 'Loratadina', '500g 12und', 20, 50),
(23, '123456789', 'Papitas Fritas', 'Fritolay', 100, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `rango` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `identificacion` (`identificacion`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `identificacion`, `usuario`, `clave`, `rango`) VALUES
(18, '29660012', 'Sentinel', '70242526', 1),
(29, '30547870', 'Jadecita123', '123456', 0),
(30, '29582637', 'ulisesjhm', 'ujhm2001', 0),
(31, '12067253', 'SAZA', 'SAZASAZA', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_natural`
--
ALTER TABLE `cliente_natural`
  ADD CONSTRAINT `identificacion_persona` FOREIGN KEY (`identificacion`) REFERENCES `persona` (`identificacion`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`identificacion_cliente`) REFERENCES `persona` (`identificacion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_establecimiento` FOREIGN KEY (`id_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`identificacion_usuario`) REFERENCES `usuario` (`identificacion`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD CONSTRAINT `cod_prod` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_fact` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id_factura`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `codigo_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `metodo_pago_factura`
--
ALTER TABLE `metodo_pago_factura`
  ADD CONSTRAINT `id_factura` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_metodo_pago` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_pago` (`id_metodo_pago`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `identificacion_usuario` FOREIGN KEY (`identificacion`) REFERENCES `cliente_natural` (`identificacion`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
