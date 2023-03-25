-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 25-03-2023 a las 16:57:51
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
cliente.telefono = ptelefono , cliente.tipo_documento = ptipoDocumento , cliente.fecha_nac = pfehcaNac
WHERE id_cliente = pidCliente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearCliente` (IN `pApellidos` VARCHAR(80), IN `pContrasenna` VARCHAR(14), IN `pEmail` VARCHAR(80), IN `pNombre` VARCHAR(30), IN `pNum_documento` VARCHAR(12), IN `pTelefono` VARCHAR(12), IN `pTipoDocumento` VARCHAR(20), IN `pfech_nac` DATE)   BEGIN

INSERT INTO cliente(Apellidos,contrasenna,email,nombre,num_documento,telefono,tipoUsuario,tipo_documento,fecha_nac)
VALUES(
pApellidos,pContrasenna,pEmail,pNombre,pNum_documento,pTelefono,2,pTipoDocumento,pfech_nac
);

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
INSERT INTO reserva(estado,fecha_ingreso,fecha_reserva,fecha_salida,idCliente,idEmpleado,idHabitacion,numeroPersonas,tipoReserva)
VALUES (
'RESERVADO',
    pFecha_ingreso,
    pFecha_reserva,
    pFecha_salida,
    pIdCliente,
    pIdEmpleado,
    pIdHabitacion,
    pNumeroPersonas,
    pTipoReserva);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCliente` (IN `pidCliente` INT)   BEGIN 

DELETE FROM cliente where idCliente = pidCliente;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteReserva` (IN `pIdReserva` INT)   BEGIN
DELETE FROM reserva WHERE reserva.idReserva = pIdReserva;END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `estadosHabitacion` ()   BEGIN

SELECT * FROM estadohabitaciom;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarHabitaciones` ()   BEGIN

SELECT * FROM habitacion; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTipoDocumentos` ()   SELECT * FROM tipodocumentos$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificarExisteCorreo` (IN `pCorreoElectronico` VARCHAR(80))   BEGIN 
SELECT * FROM empleado ,cliente
WHERE pCorreoElectronico = empleado.email or cliente.email;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verReservas` ()   BEGIN 

SELECT * FROM reserva;

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
  `contrasenna` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `Nombre`, `Apellidos`, `fecha_nac`, `tipo_documento`, `num_documento`, `telefono`, `email`, `direcccion`, `tipoUsuario`, `contrasenna`) VALUES
(2, 'Cristian ', 'Miranda Vega', '2002-06-17', 1, '118450472', '72618399', 'cristiaw85@gmail.com', 'adasd', 1, '123456'),
(3, 'ad', 'sadad', '2023-03-23', 2, '31312dsa', '72618399', 'cristiaw88@gmail.com', NULL, 2, '111222'),
(4, 'dasads', 'dasd', '2023-03-10', 1, '31221312', '231314213', 'cristiaw88@gmail.com', NULL, 2, '111222'),
(5, 'Sebastian ', 'Miranda Vega', '2023-03-12', 1, '12312313321', '13123141', 'cristiaw89@gmail.com', NULL, 2, '111222');

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
(1, 10, 3, 1, 2),
(2, 11, 3, 1, 1),
(5, 4, 2, 2, 1),
(6, 6, 1, 2, 1);

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
  `fecha_reserva` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  `numeroPersonas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idReserva`, `idHabitacion`, `idCliente`, `idEmpleado`, `tipoReserva`, `fecha_reserva`, `fecha_ingreso`, `fecha_salida`, `estado`, `numeroPersonas`) VALUES
(1, 1, 2, 1, 1, '0000-00-00', '0000-00-00', '0000-00-00', 'RESERVADO', 3),
(4, 1, 2, 1, 1, '2023-03-24', '2023-03-24', '2023-03-24', 'RESERVADO', 4),
(5, 6, 3, 1, 1, '2023-03-30', '2023-03-25', '2023-03-30', 'RESERVADO', -5);

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
  ADD KEY `fkEmpleado` (`idEmpleado`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `idHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `fkHabitacion` FOREIGN KEY (`idHabitacion`) REFERENCES `habitacion` (`idHabitacion`),
  ADD CONSTRAINT `fkTipoReserva` FOREIGN KEY (`tipoReserva`) REFERENCES `tiporeserva` (`idTipoReserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
