-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2018 a las 22:51:25
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bovedafiscal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisores`
--

CREATE TABLE `emisores` (
  `idEmisor` int(11) NOT NULL,
  `emisorRazonSocial` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `emisorNit` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `emisorNombreRepresentante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `emisorNumeroTelefonico` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `emisorDireccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `emisorCorreoElectronico` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `emisorClave` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `emisorSitioWeb` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `emisores`
--

INSERT INTO `emisores` (`idEmisor`, `emisorRazonSocial`, `emisorNit`, `emisorNombreRepresentante`, `emisorNumeroTelefonico`, `emisorDireccion`, `emisorCorreoElectronico`, `emisorClave`, `emisorSitioWeb`, `idTipoUsuario`) VALUES
(1, 'Dian', '101', '', '', '', 'dian@dian.gov.co', 'dian', NULL, 2),
(5, 'Sports Daniel', '102', 'Daniel Ramirez', '2344345', 'Calle 45 #45-56', 'ds@gmail.com', 'daniel', 'www.daniel.com', 1),
(6, 'Drogas David', '103', 'David Rivas', '3455656', 'Calle 55 #55-55', 'dr@gmail.com', 'david', NULL, 1),
(7, 'Obleas', '100005', 'Nicolas Murillo', '435456', 'Calle 69', 'jnmurillo@gmail.com', 'nicolas', '', 1),
(8, 'Katherine', '3547596-6', 'Katherine Garzón', '69696969', 'Calle 69 # 69-69', 'okgarzon@gmail.com', 'bizcochito', '', 1),
(9, 'Diego Toys', '12398-1', 'Diego Augusto Ramirez', '78789798', 'Calle 64', 'd@gmail.com', '1234', 'http://www.diegoToys.com/', 1),
(10, 'Zaida Empresa', '1000111', 'Zaida Patricia Ojeda Guzman', '3045640080', 'calle 63', 'z@gmail.com', '1234', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadofacturas`
--

CREATE TABLE `estadofacturas` (
  `idEstadoFactura` int(11) NOT NULL,
  `estadoFactura` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estadofacturas`
--

INSERT INTO `estadofacturas` (`idEstadoFactura`, `estadoFactura`) VALUES
(1, 'Activada'),
(2, 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL,
  `nombreProducto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valorUnitario` double NOT NULL,
  `total` double NOT NULL,
  `totalIvaRecaudado` double NOT NULL,
  `montoTotalAPagar` int(11) NOT NULL,
  `fechaEmision` date NOT NULL,
  `fechaPago` date NOT NULL,
  `idTipoFactura` int(11) NOT NULL,
  `idReceptor` int(11) NOT NULL,
  `idEstadoFactura` int(11) NOT NULL,
  `idEmisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `nombreProducto`, `cantidad`, `valorUnitario`, `total`, `totalIvaRecaudado`, `montoTotalAPagar`, `fechaEmision`, `fechaPago`, `idTipoFactura`, `idReceptor`, `idEstadoFactura`, `idEmisor`) VALUES
(441, 'Camisetas', 4, 500, 2000, 320, 2320, '2018-06-01', '2018-06-07', 3, 10, 1, 6),
(442, 'Gorras', 3, 600, 1800, 288, 2088, '2018-06-02', '2018-06-08', 3, 10, 1, 5),
(443, 'Chaquetas', 2, 700, 1400, 224, 1624, '2018-06-03', '2018-06-09', 3, 11, 1, 6),
(444, 'Medias', 3, 800, 2400, 384, 2784, '2018-06-04', '2018-06-10', 3, 11, 1, 5),
(445, 'Zapatillas', 4, 900, 3600, 576, 4176, '2018-06-05', '2018-06-11', 3, 12, 1, 5),
(446, 'Mouse', 2, 700, 1400, 224, 1624, '2018-06-06', '2018-06-12', 2, 12, 1, 6),
(447, 'Arepas con Chorizo', 2, 3000, 6000, 960, 6960, '2018-07-02', '2018-07-06', 3, 13, 1, 5),
(448, 'Sonrisas', 100, 2000, 200000, 32000, 232000, '2018-07-03', '2018-07-11', 3, 10, 1, 8),
(449, 'Besos', 1000, 5000, 5000000, 800000, 5800000, '2018-07-02', '2018-07-12', 3, 11, 1, 8),
(450, 'Miradas', 1000, 6000, 6000000, 960000, 6960000, '2018-07-02', '2018-07-12', 3, 10, 1, 8),
(451, 'Zapatillas', 5, 100000, 500000, 80000, 580000, '2018-06-21', '2018-07-01', 3, 10, 1, 5),
(452, 'Mesas de ping pong', 2, 600000, 1200000, 192000, 1392000, '2018-06-13', '2018-07-19', 3, 10, 1, 5),
(453, 'guayos', 4, 1000000, 4000000, 640000, 4640000, '2018-07-11', '2018-07-26', 3, 11, 1, 5),
(454, 'Licras', 4, 25000, 100000, 16000, 116000, '2018-07-03', '2018-07-20', 2, 11, 1, 5),
(455, 'Tobillera', 4, 10000, 40000, 6400, 46400, '2018-07-01', '2018-07-26', 3, 13, 1, 5),
(456, 'Rodillera', 6, 15000, 90000, 14400, 104400, '2018-07-10', '2018-07-18', 3, 12, 1, 5),
(457, 'Balon Basketball', 5, 35000, 175000, 28000, 203000, '2018-06-29', '2018-07-19', 0, 11, 1, 5),
(458, 'Balon Medicinal', 4, 25000, 100000, 16000, 116000, '2018-07-11', '2018-07-19', 0, 10, 1, 5),
(459, 'Balon Micro', 10, 20000, 200000, 32000, 232000, '2018-06-30', '2018-07-12', 3, 10, 1, 5),
(460, 'tulas', 6, 15000, 90000, 14400, 104400, '2018-06-29', '2018-07-18', 3, 12, 1, 5),
(461, 'Botilitos', 4, 16000, 64000, 10240, 74240, '2018-07-18', '2018-07-25', 0, 11, 1, 5),
(462, 'Gafas para piscina', 10, 30000, 300000, 48000, 348000, '2018-07-01', '2018-07-20', 0, 11, 1, 5),
(463, 'gorros para piscina', 25, 8000, 200000, 32000, 232000, '2018-07-15', '2018-07-19', 2, 13, 1, 5),
(464, 'Farola', 2, 200000, 400000, 64000, 464000, '2018-07-03', '2018-07-19', 3, 11, 1, 9),
(465, 'bomper', 4, 150000, 600000, 96000, 696000, '2018-07-01', '2018-07-11', 3, 12, 1, 9),
(466, 'guarda baarro', 2, 45000, 90000, 14400, 104400, '2018-07-01', '2018-07-11', 0, 11, 1, 9),
(467, 'stop', 3, 300000, 900000, 144000, 1044000, '2018-07-10', '2018-07-18', 3, 11, 1, 9),
(468, 'Parabrisas', 2, 450000, 900000, 144000, 1044000, '2018-06-13', '2018-07-17', 2, 11, 1, 9),
(469, 'Puertas', 2, 500000, 1000000, 160000, 1160000, '2018-07-01', '2018-07-16', 3, 11, 1, 9),
(470, 'Arepa rellena', 2, 5000, 10000, 1600, 11600, '2018-07-01', '2018-07-17', 3, 12, 1, 6),
(471, 'Arepa quesuda', 200, 6000, 1200000, 192000, 1392000, '2018-07-02', '2018-07-05', 2, 10, 1, 6),
(472, 'Pincho de cerdo', 45, 4500, 202500, 32400, 234900, '2018-06-28', '2018-07-30', 3, 13, 1, 6),
(473, 'Pincho de pollo', 100, 5000, 500000, 80000, 580000, '2018-07-05', '2018-07-17', 0, 10, 1, 6),
(474, 'Pincho mixto', 300, 2500, 750000, 120000, 870000, '2018-07-01', '2018-07-10', 2, 11, 1, 6),
(475, 'Arepa con jamon', 50, 6000, 300000, 48000, 348000, '2018-06-21', '2018-07-26', 3, 12, 1, 6),
(476, 'Arepa con todo', 300, 8000, 2400000, 384000, 2784000, '2018-07-01', '2018-07-05', 2, 13, 1, 6),
(477, 'Choriperro', 200, 4000, 800000, 128000, 928000, '2018-06-20', '2018-07-18', 3, 11, 1, 6),
(478, 'Hamburguesa Especial', 120, 12000, 1440000, 230400, 1670400, '2018-07-09', '2018-07-18', 3, 10, 1, 6),
(479, 'Guantes Futbol', 300, 150000, 45000000, 7200000, 52200000, '2018-07-01', '2018-07-07', 3, 10, 1, 5),
(480, 'Arepas', 2, 5000, 10000, 1600, 11600, '2018-07-05', '2018-07-11', 3, 11, 1, 10),
(481, 'Jugos', 4, 4000, 16000, 2560, 18560, '2018-06-28', '2018-07-19', 3, 12, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermiso` int(11) NOT NULL,
  `nombrePermiso` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `iconoPermiso` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `urlPermiso` text COLLATE utf8_spanish_ci NOT NULL,
  `idTipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `nombrePermiso`, `iconoPermiso`, `urlPermiso`, `idTipoUsuario`) VALUES
(1, 'Mis facturas', 'icon-spreadsheet', 'index.php', 1),
(2, 'Nueva factura', 'icon-plus', 'nuevaFactura.php', 1),
(3, 'Consultar facturas', 'icon-spreadsheet', 'index.php', 2),
(4, 'Top facturas', 'icon-spreadsheet', 'topFacturas.php', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receptores`
--

CREATE TABLE `receptores` (
  `idReceptor` int(11) NOT NULL,
  `receptorRazonSocial` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `receptorNit` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `receptorNombreRepresentante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `receptorNumeroTelefonico` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `receptorDireccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `receptorCorreoElectronico` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `receptorSitioWeb` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `receptores`
--

INSERT INTO `receptores` (`idReceptor`, `receptorRazonSocial`, `receptorNit`, `receptorNombreRepresentante`, `receptorNumeroTelefonico`, `receptorDireccion`, `receptorCorreoElectronico`, `receptorSitioWeb`) VALUES
(10, 'Toys Nico', '101', 'Nicolas Murillo', '3045640080', 'calle 70', 'tn@gmail.com', NULL),
(11, 'Dance Yan', '102', 'Yan Morera', '3045640081', 'calle 71', 'dy@gmail.com', NULL),
(12, 'Flowers Rosa', '103', 'Rosa Valderrama', '3045640082', 'calle 72', 'fr@gmail.com', NULL),
(13, 'Tito Brigdes', '43535-5', 'Albrto Puentes', '3012345678', 'carrera 45', 'tp@gmail.com', 'http://www.titobridges.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofacturas`
--

CREATE TABLE `tipofacturas` (
  `idTipoFactura` int(11) NOT NULL,
  `tipoFactura` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipofacturas`
--

INSERT INTO `tipofacturas` (`idTipoFactura`, `tipoFactura`) VALUES
(1, 'Nota Debito'),
(2, 'Nota Credito'),
(3, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `idTipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`idTipoUsuario`, `tipoUsuario`) VALUES
(1, 'Empresa'),
(2, 'Dian');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `emisores`
--
ALTER TABLE `emisores`
  ADD PRIMARY KEY (`idEmisor`),
  ADD UNIQUE KEY `nit_UNIQUE` (`emisorNit`),
  ADD UNIQUE KEY `correoElectronico_UNIQUE` (`emisorCorreoElectronico`),
  ADD KEY `fk_empresas_tipoUsuarios1_idx` (`idTipoUsuario`);

--
-- Indices de la tabla `estadofacturas`
--
ALTER TABLE `estadofacturas`
  ADD PRIMARY KEY (`idEstadoFactura`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fk_facturas_tipofacturas1_idx` (`idTipoFactura`),
  ADD KEY `fk_facturas_receptores1_idx1` (`idReceptor`),
  ADD KEY `fk_facturas_estadofacturas1_idx` (`idEstadoFactura`),
  ADD KEY `fk_facturas_emisores1_idx1` (`idEmisor`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermiso`),
  ADD KEY `fk_permisos_tipoUsuarios1_idx` (`idTipoUsuario`);

--
-- Indices de la tabla `receptores`
--
ALTER TABLE `receptores`
  ADD PRIMARY KEY (`idReceptor`),
  ADD UNIQUE KEY `nit_UNIQUE` (`receptorNit`),
  ADD UNIQUE KEY `correoElectronico_UNIQUE` (`receptorCorreoElectronico`);

--
-- Indices de la tabla `tipofacturas`
--
ALTER TABLE `tipofacturas`
  ADD PRIMARY KEY (`idTipoFactura`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emisores`
--
ALTER TABLE `emisores`
  MODIFY `idEmisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estadofacturas`
--
ALTER TABLE `estadofacturas`
  MODIFY `idEstadoFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `receptores`
--
ALTER TABLE `receptores`
  MODIFY `idReceptor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipofacturas`
--
ALTER TABLE `tipofacturas`
  MODIFY `idTipoFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `emisores`
--
ALTER TABLE `emisores`
  ADD CONSTRAINT `fk_empresas_tipoUsuarios1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuarios` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_receptores1` FOREIGN KEY (`idReceptor`) REFERENCES `receptores` (`idReceptor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permisos_tipoUsuarios1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuarios` (`idtipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
