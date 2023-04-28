-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 28-04-2023 a las 22:01:51
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hoteldb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarCliente` (IN `pidCliente` INT, IN `papellidos` VARCHAR(80), IN `pcontrasenna` VARCHAR(12), IN `pemail` VARCHAR(50), IN `pnombre` VARCHAR(50), IN `pnumDocumento` VARCHAR(12), IN `ptelefono` VARCHAR(12), IN `ptipoDocumento` INT, IN `pfechaNac` DATE)   BEGIN 

UPDATE cliente SET
cliente.Apellidos = papellidos , cliente.contrasenna = pcontrasenna , 
cliente.email = pemail , cliente.Nombre = pnombre , cliente.num_documento = pnumDocumento , 
cliente.telefono = ptelefono , cliente.tipo_documento = ptipoDocumento , cliente.fecha_nac = pfechaNac
WHERE id_cliente = pidCliente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarHabitacion` (IN `pidHabitacion` INT(12), IN `pnumeroHabitacion` INT, IN `ppiso` INT, IN `ptipoHabitacion` INT, IN `pestadoHabitacion` INT)   BEGIN
  UPDATE habitacion
  SET
    numeroHabitacion = pnumeroHabitacion,
    piso = ppiso,
    tipoHabitacion = ptipoHabitacion,
    estadoHabitacion = pestadoHabitacion
  WHERE
    idHabitacion = pidHabitacion;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarReserva` (IN `pidReserva` INT, IN `pidHab` INT, IN `pidCliente` INT, IN `pidEmpleado` INT, IN `ptipoReserva` INT, IN `pfechaIngreso` DATE, IN `pfechaSalida` DATE, IN `pNumeroPersonas` INT, IN `pestadoReserva` INT)   BEGIN

UPDATE `hoteldb`.`reserva`
SET
idHabitacion =  pidHab,
idCliente =  pidCliente, 
idEmpleado =  pidEmpleado,
tipoReserva =  ptipoReserva, 
fecha_reserva =  NOW(), 
fecha_ingreso =  pfechaIngreso, 
fecha_salida =  pfechaSalida, 
numeroPersonas = pNumeroPersonas , 
estadoReserva  = pestadoReserva
WHERE idReserva = pidReserva;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarTipoReserva` (IN `pidTipoReserva` INT, IN `pDescripcion` VARCHAR(40), IN `pCaracteristicas` VARCHAR(220), IN `pCostoNoche` DECIMAL)   BEGIN
		UPDATE tiporeserva
SET
`descripcion` = pDescripcion,
`caracteristicas` = pCaracteristicas,
`costoPorNoche` = pCostoNoche
WHERE `idTipoReserva` = pidTipoReserva;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambioRol` (IN `pidCliente` INT)   BEGIN
UPDATE `hoteldb`.`cliente`
SET
estado = 1
WHERE id_cliente = pidCliente;

INSERT INTO `hoteldb`.`empleado`
(
`nombre`,
`apellidos`,
`tipo_documento`,
`num_documento`,
`telefono`,
`email`,
`contrasenna`,
`tipoUsuario`)
SELECT Nombre ,Apellidos,num_documento,telefono, email,contrasenna
FROM cliente
 WHERE  id_cliente = pidCliente
 ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelarReserva` (IN `pIdReserva` INT)   BEGIN

UPDATE `reserva`
SET
estadoReserva = 3
WHERE `idReserva` =pIdReserva ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarContrasenna` (IN `_pcorreoElectronico` VARCHAR(250))   BEGIN
	SELECT contrasenna FROM cliente
    where email = _pcorreoElectronico;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearCliente` (IN `_pcorreoElectronico` VARCHAR(250), IN `_pnombre` VARCHAR(30), IN `_ptipoDocumento` INT, IN `_pnumeroDocumento` MEDIUMTEXT, IN `_pcontrasenna` VARCHAR(250))   BEGIN
	INSERT INTO `cliente`(`Nombre`
                          , `Apellidos`
                          , `fecha_nac`
                          , `tipo_documento`
                          , `num_documento`
                          , `telefono`
                          , `email`
                          , `direcccion`
                          , `tipoUsuario`
                          , `contrasenna`)
                          VALUES (_pnombre
                                  ,''
                                  ,''
                                  ,_ptipoDocumento
                                  ,_pnumeroDocumento
                                  ,''
                                  ,_pcorreoElectronico
                                  ,''
                                  ,2
                                  ,_pcontrasenna);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearEmpleado` (IN `pNombre` VARCHAR(80), IN `pApellidos` VARCHAR(80), IN `pEmail` VARCHAR(80), IN `pNum_documento` VARCHAR(11), IN `pPuesto` VARCHAR(50), IN `pSueldo` DECIMAL, IN `pTelefono` VARCHAR(12), IN `pTipoUsuario` TINYINT, IN `pTipoDocumento` VARCHAR(30), IN `pContrasenna` VARCHAR(14))   BEGIN

INSERT INTO empleado(apellidos,contrasenna,email,nombre,num_documento,puesto,sueldo,telefono,tipoUsuario,tipo_documento)
VALUES(
pApellidos,pContrasenna,pEmail,pNombre,pNum_documento,pPuesto,pSueldo,pTelefono,pTipoUsuario,pTipoDocumento
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearHabitacion` (IN `pnumeroHabitacion` INT, IN `pPiso` INT, IN `pTipoHabitacion` INT)   BEGIN
INSERT INTO habitacion(numeroHabitacion,piso,tipoHabitacion,estadoHabitacion) 
VALUES(pnumeroHabitacion,pPiso,pTipoHabitacion,1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearReserva` (IN `pFecha_ingreso` DATE, IN `pFecha_reserva` DATE, IN `pFecha_salida` DATE, IN `pIdCliente` INT, IN `pIdEmpleado` INT, IN `pIdHabitacion` INT, IN `pNumeroPersonas` INT, IN `pTipoReserva` INT)   BEGIN
INSERT INTO reserva(estadoReserva,fecha_ingreso,fecha_reserva,fecha_salida,idCliente,idEmpleado,idHabitacion,numeroPersonas,tipoReserva)
VALUES (
			2,
    pFecha_ingreso,
    pFecha_reserva,
    pFecha_salida,
    pIdCliente,
    pIdEmpleado,
    pIdHabitacion,
    pNumeroPersonas,
    pTipoReserva);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearTipoReserva` (IN `pDescripcion` VARCHAR(40), IN `pCaracteristicas` VARCHAR(220), IN `pCostoNoche` DECIMAL)   BEGIN

INSERT INTO tiporeserva
(
descripcion,
caracteristicas,
costoPorNoche
)
VALUES(
pDescripcion,
pCaracteristicas,
pCostoNoche
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCliente` (IN `pidCliente` INT)   BEGIN 

DELETE FROM cliente where idCliente = pidCliente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHabitacion` (IN `pidHabitacion` INT(12))   BEGIN 
 DELETE FROM habitacion
    WHERE
        habitacion.idHabitacion = pidHabitacion;
        
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteReserva` (IN `pIdReserva` INT)   BEGIN
DELETE FROM reserva WHERE reserva.idReserva = pIdReserva;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTipoReserva` (IN `pidTipoReserva` INT)   BEGIN

DELETE FROM `hoteldb`.`tiporeserva`
WHERE idTipoReserva = pidTipoReserva;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `detalleHabitacion` (IN `pidHabitacion` INT)   BEGIN

SELECT idHabitacion,
    numeroHabitacion,
    piso,
    tipoHabitacion,
    estadoHabitacion
FROM habitacion
WHERE idHabitacion = pidHabitacion
;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `detalleTipoReserva` (IN `pidTipoReserva` INT)   BEGIN
SELECT idTipoReserva,
   descripcion,
    caracteristicas,
    costoPorNoche
FROM tiporeserva
WHERE idTipoReserva = pidTipoReserva ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarCliente` (IN `pidCliente` INT)   BEGIN 
UPDATE  `cliente`
SET
estado = 0 
WHERE `id_cliente` =pidCliente; 

UPDATE `reserva`
SET
`estado` = 3
WHERE reserva.idCliente = pidCliente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarReserva` (IN `pIdReserva` INT)   BEGIN

UPDATE `reserva`
SET
`estado` = 3
WHERE `idReserva` =pIdReserva ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `estadosHabitacion` ()   BEGIN

SELECT * FROM estadohabitaciom;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarDatosCliente` (IN `pidCliente` INT)   BEGIN 
SELECT 
	Apellidos,direcccion, email, fecha_nac,email,
    fecha_nac,id_cliente,Nombre,num_documento,
    telefono,U.nombreTipoUsuario , D.NombreTipo
	
    from cliente C 
    INNER JOIN tipodocumentos D 
    ON D.idTipoDocumento = C.tipo_documento
    INNER JOIN tiposusuarios U ON C.tipoUsuario = U.idTipoUsuario
    WHERE C.id_cliente = pidCliente
    ;
    
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarHabitaciones` ()   BEGIN

SELECT hab.idHabitacion
, hab.numeroHabitacion
, est.nombreEstado
, hab.piso
, tip.nombreHabitacion
FROM habitacion hab
inner join estadohabitaciom est on hab.estadoHabitacion = est.idEstado
inner JOIN tipohabitacion tip on hab.tipoHabitacion = tip.idTipoHabitacion;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarReservasCliente` (IN `pidCliente` INT(12))   BEGIN

SELECT R.idReserva as idReserva,
R.idHabitacion , 
/*CONCAT(E.nombre , " " , E.apellidos) AS Empleado,*/
CONCAT(C.Nombre , " " , C.Apellidos) AS Cliente,
R.numeroPersonas,
T.descripcion ,
T.costoPorNoche,
R.fecha_reserva ,
R.fecha_ingreso ,
R.fecha_salida,
E.nombreEstado
FROM reserva R 
INNER JOIN cliente C ON C.id_cliente = R.idCliente 
INNER JOIN tiporeserva T ON T.idTipoReserva = R.TipoReserva 
INNER JOIN habitacion H ON H.idHabitacion = R.idHabitacion 
INNER JOIN estadoreserva E ON E.idEstadoReserva = R.estadoReserva
/*INNER JOIN empleado E ON E.idempleado = R.idEmpleado*/
WHERE R.idCliente = pidCliente and 
E.idEstadoReserva != 3
; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTipoDocumentos` ()   SELECT * FROM tipodocumentos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTipoReserva` ()   BEGIN

SELECT idTipoReserva,
   descripcion,
    caracteristicas,
    costoPorNoche
FROM tiporeserva;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reservaDetalle` (IN `pidReserva` INT)   BEGIN

SELECT  `idReserva`,
    H.numeroHabitacion , 
    H.piso, 
    H.tipoHabitacion AS tipoHabitacion,
    R.idHabitacion,
    idCliente,
    R.idEmpleado,
	CONCAT(E.nombre,' ', E.apellidos) AS NombreEmpleado,
	CONCAT(C.nombre,' ', C.apellidos) AS NombreCliente,
    T.descripcion,
    `fecha_reserva`,
    `fecha_ingreso`,
    `fecha_salida`,
    ER.nombreEstado,
    numeroPersonas
FROM reserva R
INNER JOIN habitacion H ON R.idHabitacion = H.idHabitacion
INNER JOIN empleado E ON R.idEmpleado = E.idEmpleado
INNER JOIN estadoreserva ER ON R.estadoReserva = ER.idEstadoReserva
INNER JOIN cliente C ON R.idCliente = C.id_cliente
INNER JOIN tiporeserva T ON R.tipoReserva = T.idTipoReserva
WHERE idReserva = pidReserva
;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reservasCliente` (IN `pidCliente` INT(12))   BEGIN

SELECT R.idReserva as idReserva,
R.idHabitacion , 
/*CONCAT(E.nombre , " " , E.apellidos) AS Empleado,*/
CONCAT(C.Nombre , " " , C.Apellidos) AS Cliente,
R.numeroPersonas,
T.descripcion ,
T.costoPorNoche,
R.fecha_reserva ,
R.fecha_ingreso ,
R.fecha_salida,
E.nombreEstado
FROM reserva R 
INNER JOIN cliente C ON C.id_cliente = R.idCliente 
INNER JOIN tiporeserva T ON T.idTipoReserva = R.TipoReserva 
INNER JOIN habitacion H ON H.idHabitacion = R.idHabitacion 
INNER JOIN estadoreserva E ON E.idEstadoReserva = R.estadoReserva
/*INNER JOIN empleado E ON E.idempleado = R.idEmpleado*/
WHERE R.idCliente = pidCliente
; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showEmpleados` ()   BEGIN

SELECT * FROM empleado;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tiposHabitacion` ()   BEGIN 

SELECT * FROM tipohabitacion;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarInicioSesionCli` (IN `pCorreoElectronico` VARCHAR(80), IN `pContrasenna` VARCHAR(14))   Begin 
SELECT * FROM cliente 
WHERE cliente.email = pCorreoElectronico
and cliente.contrasenna = pContrasenna;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarInicioSesionEmp` (IN `pcorreoElectronico` VARCHAR(80), IN `pContrasenna` VARCHAR(14))   Begin 
SELECT * FROM empleado 
WHERE empleado.email = pCorreoElectronico
and empleado.contrasenna = pContrasenna;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verClientes` (IN `pTipoUsuario` INT(11))   BEGIN
 
       SELECT	Apellidos,IFNULL(direcccion , "No se brindo este dato") as direccion
,num_documento, email, fecha_nac , id_cliente , Nombre, telefono , D.NombreTipo , U.nombreTipoUsuario
        FROM 	cliente C 
        INNER JOIN tipodocumentos D  ON C.tipo_documento = D.idTipoDocumento 
        INNER JOIN tiposusuarios U ON U.idTipoUsuario = C.tipoUsuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verHabitacionesDesocupadas` ()   BEGIN 

SELECT idHabitacion , numeroHabitacion FROM habitacion WHERE estadoHabitacion != 'ocupada';

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificarExisteCedula` (IN `pIdentificacion ` VARCHAR(12))   BEGIN 
SELECT * FROM empleado 
WHERE empleado.num_documento = pIdentificacion
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificarExisteCorreo` (IN `pCorreoElectronico` VARCHAR(80))   SELECT empleado.email as emailEmpleado,
cliente.email as emailCliente
FROM empleado ,cliente
WHERE empleado.email = pCorreoElectronico or cliente.email =pCorreoElectronico$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verReservas` ()   BEGIN 
SELECT res.idReserva
, tip.nombreHabitacion, CONCAT(cli.Nombre,cli.Apellidos) AS NombreCliente, 
CONCAT(emp.nombre,emp.apellidos) AS NombreEmpleado, 
tipr.descripcion,CAST(res.fecha_reserva  AS DATE) AS fecha_reserva, 
CAST(res.fecha_ingreso AS DATE) AS fecha_ingreso , CAST(res.fecha_salida  AS DATE) AS fecha_salida ,
 res.estadoReserva, res.numeroPersonas,
 esta.nombreEstado
FROM reserva res
inner join habitacion hab on res.idHabitacion = hab.idHabitacion
inner join tipohabitacion tip on hab.tipoHabitacion = tip.idTipoHabitacion
inner join cliente cli on res.idCliente = cli.id_cliente
inner join empleado emp on res.idEmpleado = emp.idempleado
inner join tiporeserva tipr on res.tipoReserva = tipr.idTipoReserva
inner join estadoreserva esta on res.estadoreserva = esta.idEstadoReserva;



END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verTipoReservas` ()   BEGIN
SELECT * FROM tiporeserva;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `num_documento` mediumtext NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `direcccion` varchar(250) DEFAULT NULL,
  `tipoUsuario` tinyint(4) NOT NULL,
  `contrasenna` varchar(14) NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `Nombre`, `Apellidos`, `fecha_nac`, `tipo_documento`, `num_documento`, `telefono`, `email`, `direcccion`, `tipoUsuario`, `contrasenna`, `estado`) VALUES
(2, 'Cristian   ', 'Miranda Vega  ', '0000-00-00', 1, '118450472   ', '72618399  ', 'cristiaw85@gmail.com', 'adasd', 1, '123', b'0'),
(3, 'ad    ', 'sadad    ', '2023-04-30', 1, '31312dsa    ', '72618888', 'cristiaw88@gmail.com', NULL, 2, '', b'0'),
(4, 'dasads ', 'daasdaaa', '2023-04-29', 1, '31221312  ', '231314213 ', 'cristiaw88@gmail.com', NULL, 2, '', b'0'),
(5, 'Sebastian ', 'Miranda Vega', '2023-03-12', 1, '12312313321', '13123141', 'cristiaw89@gmail.com', NULL, 2, '111222', b'0'),
(6, 'Andres Miranda     ', '    ', '0000-00-00', 1, '31232213321 ', ' 43124132  ', 'cristiaw87@gmail.com', '', 2, '', b'0'),
(7, 'Pedro Perez  ', ' Parce3123143121 ', '2023-03-11', 1, '3123143121  ', '72618392', 'ppppp@gmail.com', '', 2, '123', b'0'),
(8, 'Cristian ', ' Miranda Vega ', '2023-03-19', 1, '118450472  ', '72618399', 'cristiaw80@gmail.com', '', 2, '123', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo`
--

CREATE TABLE `consumo` (
  `idConsumo` int(11) NOT NULL,
  `idReserva` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioTotal` decimal(10,0) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `num_documento` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(80) NOT NULL,
  `puesto` varchar(80) NOT NULL,
  `sueldo` decimal(10,0) NOT NULL,
  `contrasenna` varchar(14) NOT NULL,
  `tipoUsuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `nombre`, `apellidos`, `tipo_documento`, `num_documento`, `telefono`, `email`, `puesto`, `sueldo`, `contrasenna`, `tipoUsuario`) VALUES
(1, 'Cristian ', 'Miranda', 1, '118450472', '72618399', 'aaaaa@gmail.com', 'Jefe de sistemas', '10000', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadohabitaciom`
--

CREATE TABLE `estadohabitaciom` (
  `idEstado` int(11) NOT NULL,
  `nombreEstado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadohabitaciom`
--

INSERT INTO `estadohabitaciom` (`idEstado`, `nombreEstado`) VALUES
(1, 'ocupada'),
(2, 'libre'),
(6, 'limpiando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoreserva`
--

CREATE TABLE `estadoreserva` (
  `idEstadoReserva` bigint(4) NOT NULL,
  `nombreEstado` varchar(25) NOT NULL,
  `descripcion` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadoreserva`
--

INSERT INTO `estadoreserva` (`idEstadoReserva`, `nombreEstado`, `descripcion`) VALUES
(1, 'En espera', 'Se ha llegado al tiempo de la reserva pero los clientes no han llegado'),
(2, 'Reservado', 'Se ha realizado la reserva con exito y se esta en espera de cambio '),
(3, 'Cancelada ', 'Por parte del cliente o del empleado encargado ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `idHabitacion` int(11) NOT NULL,
  `numeroHabitacion` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `tipoHabitacion` int(11) NOT NULL,
  `estadoHabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`idHabitacion`, `numeroHabitacion`, `piso`, `tipoHabitacion`, `estadoHabitacion`) VALUES
(1, 32, 9, 1, 1),
(2, 11, 3, 1, 1),
(5, 4, 2, 2, 1),
(15, 3, 23, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `tipoProducto` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `idHabitacion` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `tipoReserva` int(11) NOT NULL,
  `fecha_reserva` datetime NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `numeroPersonas` int(11) NOT NULL,
  `estadoReserva` bigint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idReserva`, `idHabitacion`, `idCliente`, `idEmpleado`, `tipoReserva`, `fecha_reserva`, `fecha_ingreso`, `fecha_salida`, `numeroPersonas`, `estadoReserva`) VALUES
(11, 15, 4, 1, 1, '2023-04-27 23:00:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3123123, 2),
(12, 2, 3, 1, 1, '2023-05-07 00:00:00', '2023-04-12 00:00:00', '2023-05-07 00:00:00', 3, 3),
(13, 5, 3, 1, 1, '2023-05-21 00:00:00', '2023-05-11 00:00:00', '2023-05-21 00:00:00', 4, 3),
(14, 2, 3, 1, 1, '2023-05-13 00:00:00', '2023-04-29 00:00:00', '2023-05-13 00:00:00', 3, 2),
(15, 2, 4, 1, 1, '2023-06-07 00:00:00', '2023-05-13 00:00:00', '2023-06-07 00:00:00', 4, 2),
(16, 1, 4, 1, 1, '2023-04-30 00:00:00', '2023-04-14 00:00:00', '2023-04-30 00:00:00', 3, 2),
(17, 2, 4, 1, 1, '2023-04-28 10:22:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 999, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumentos`
--

CREATE TABLE `tipodocumentos` (
  `idTipoDocumento` int(11) NOT NULL,
  `NombreTipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipodocumentos`
--

INSERT INTO `tipodocumentos` (`idTipoDocumento`, `NombreTipo`) VALUES
(1, 'Cedula de Identidad'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitacion`
--

CREATE TABLE `tipohabitacion` (
  `idTipoHabitacion` int(11) NOT NULL,
  `nombreHabitacion` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `caracteristicas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`idTipoHabitacion`, `nombreHabitacion`, `descripcion`, `caracteristicas`) VALUES
(1, 'STANDAR ROOM ', 'cuarto estandar con dos camas y vista al mar donde se podra observar....', 'Zona oeste del hotel \r\nFacil accesibilidad a la zona de piscinas\r\nVista al mar \r\nDos camas \r\nPara 4 personas '),
(2, 'STANDAR ROOM ', 'cuarto estandar con dos camas y vista al mar donde se podra observar....', 'Zona oeste del hotel \r\nFacil accesibilidad a la zona de piscinas\r\nVista al mar \r\nDos camas \r\nPara 4 personas ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeserva`
--

CREATE TABLE `tiporeserva` (
  `idTipoReserva` int(11) NOT NULL,
  `descripcion` varchar(240) NOT NULL,
  `caracteristicas` varchar(240) NOT NULL,
  `costoPorNoche` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiporeserva`
--

INSERT INTO `tiporeserva` (`idTipoReserva`, `descripcion`, `caracteristicas`, `costoPorNoche`) VALUES
(1, 'premium ', 'caminatas casa club todo incluido spa wifi gratis', '120');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposusuarios`
--

CREATE TABLE `tiposusuarios` (
  `idTipoUsuario` tinyint(4) NOT NULL,
  `nombreTipoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiposusuarios`
--

INSERT INTO `tiposusuarios` (`idTipoUsuario`, `nombreTipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `documento_identidad` (`num_documento`) USING HASH,
  ADD KEY `tipoDoc2` (`tipo_documento`),
  ADD KEY `fkRol` (`tipoUsuario`);

--
-- Indices de la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`idConsumo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD KEY `tipoDoc` (`tipo_documento`),
  ADD KEY `fkRol2` (`tipoUsuario`);

--
-- Indices de la tabla `estadohabitaciom`
--
ALTER TABLE `estadohabitaciom`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `estadoreserva`
--
ALTER TABLE `estadoreserva`
  ADD PRIMARY KEY (`idEstadoReserva`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`idHabitacion`),
  ADD KEY `fk_tipoHab` (`tipoHabitacion`),
  ADD KEY `estadoHab` (`estadoHabitacion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fkCliente` (`idCliente`),
  ADD KEY `fkHabitacion` (`idHabitacion`),
  ADD KEY `fkTipoReserva` (`tipoReserva`),
  ADD KEY `fkEmpleado` (`idEmpleado`),
  ADD KEY `fkEstadoReserva` (`estadoReserva`);

--
-- Indices de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  ADD PRIMARY KEY (`idTipoHabitacion`);

--
-- Indices de la tabla `tiporeserva`
--
ALTER TABLE `tiporeserva`
  ADD PRIMARY KEY (`idTipoReserva`);

--
-- Indices de la tabla `tiposusuarios`
--
ALTER TABLE `tiposusuarios`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estadohabitaciom`
--
ALTER TABLE `estadohabitaciom`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estadoreserva`
--
ALTER TABLE `estadoreserva`
  MODIFY `idEstadoReserva` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `idHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  MODIFY `idTipoHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiporeserva`
--
ALTER TABLE `tiporeserva`
  MODIFY `idTipoReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tiposusuarios`
--
ALTER TABLE `tiposusuarios`
  MODIFY `idTipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fkRol` FOREIGN KEY (`tipoUsuario`) REFERENCES `tiposusuarios` (`idTipoUsuario`),
  ADD CONSTRAINT `tipoDoc2` FOREIGN KEY (`tipo_documento`) REFERENCES `tipodocumentos` (`idTipoDocumento`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fkRol2` FOREIGN KEY (`tipoUsuario`) REFERENCES `tiposusuarios` (`idTipoUsuario`),
  ADD CONSTRAINT `tipoDoc` FOREIGN KEY (`tipo_documento`) REFERENCES `tipodocumentos` (`idTipoDocumento`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `estadoHab` FOREIGN KEY (`estadoHabitacion`) REFERENCES `estadohabitaciom` (`idEstado`),
  ADD CONSTRAINT `fk_tipoHab` FOREIGN KEY (`tipoHabitacion`) REFERENCES `tipohabitacion` (`idTipoHabitacion`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fkCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fkEmpleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idempleado`),
  ADD CONSTRAINT `fkEstadoReserva` FOREIGN KEY (`estadoReserva`) REFERENCES `estadoreserva` (`idEstadoReserva`),
  ADD CONSTRAINT `fkHabitacion` FOREIGN KEY (`idHabitacion`) REFERENCES `habitacion` (`idHabitacion`),
  ADD CONSTRAINT `fkTipoReserva` FOREIGN KEY (`tipoReserva`) REFERENCES `tiporeserva` (`idTipoReserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
