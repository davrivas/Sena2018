-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2018 a las 23:05:40
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_consultora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_empresa` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cif` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefonos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`id_cliente`, `nombre_empresa`, `direccion`, `cif`, `telefonos`) VALUES
(1, 'Fenalco', 'Cra 34 # 23 -23', '934875ekjf', '2344455 - 3456723'),
(2, 'Pintuco', 'Calle 34 # 23 -34', '3746ueg', ''),
(3, 'Sena', 'Calle 65 #13-65', '4876dkjh', '1365295'),
(4, 'Ecopetrol', 'Calle 35 #34-23', 'fghgfh', '45673495'),
(5, 'Bavaria', 'Transversal 34 # 45-67', 'k4h5987kfj', '2345456 - 3024564545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_consultores`
--

CREATE TABLE `tbl_consultores` (
  `id_consultor` int(11) NOT NULL,
  `nombre_consultor` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_consultor` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_consultores`
--

INSERT INTO `tbl_consultores` (`id_consultor`, `nombre_consultor`, `apellido_consultor`) VALUES
(1, 'David', 'Rivas'),
(2, 'Cristian', 'Tellez'),
(3, 'Ismael', 'Suarez'),
(4, 'Zaida Patricia', 'Ojeda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proyectos`
--

CREATE TABLE `tbl_proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_proyectos`
--

INSERT INTO `tbl_proyectos` (`id_proyecto`, `nombre_proyecto`, `precio`, `descripcion`) VALUES
(1, 'Fase 5', 450000, ''),
(2, 'Fase 6', 1500000, 'Este proyecto es espectacular porque nos permite mejorar como empresa'),
(3, 'Equinox', 3400000, 'Este es un proyecto que no es viable siempre y cuando '),
(4, 'SIMU', 5000000, 'Sistema de informaciÃ³n para motos usadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ventas`
--

CREATE TABLE `tbl_ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_consultor` int(11) NOT NULL,
  `costo_asociado` double NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ventas`
--

INSERT INTO `tbl_ventas` (`id_venta`, `id_cliente`, `id_proyecto`, `id_consultor`, `costo_asociado`, `fecha_inicio`, `fecha_fin`) VALUES
(2, 3, 3, 2, 345000, '2018-06-02', '2018-07-20'),
(3, 3, 2, 1, 450000, '2018-06-02', '2018-06-05'),
(4, 4, 3, 2, 80000, '2018-06-02', '2018-06-09'),
(5, 2, 1, 1, 0, '2018-06-06', '2018-11-21'),
(6, 5, 4, 3, 340000, '2018-06-02', '2031-02-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_consultores`
--
ALTER TABLE `tbl_consultores`
  ADD PRIMARY KEY (`id_consultor`);

--
-- Indices de la tabla `tbl_proyectos`
--
ALTER TABLE `tbl_proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_tbl_ventas_tbl_clientes_idx` (`id_cliente`),
  ADD KEY `fk_tbl_ventas_tbl_proyectos1_idx` (`id_proyecto`),
  ADD KEY `fk_tbl_ventas_tbl_consultores1_idx` (`id_consultor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_consultores`
--
ALTER TABLE `tbl_consultores`
  MODIFY `id_consultor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_proyectos`
--
ALTER TABLE `tbl_proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD CONSTRAINT `fk_tbl_ventas_tbl_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_ventas_tbl_consultores1` FOREIGN KEY (`id_consultor`) REFERENCES `tbl_consultores` (`id_consultor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_ventas_tbl_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `tbl_proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
