-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2018 a las 19:51:53
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
-- Base de datos: `db_concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administradores`
--

CREATE TABLE `tbl_administradores` (
  `correo_electronico_admin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `clave_admin` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_administradores`
--

INSERT INTO `tbl_administradores` (`correo_electronico_admin`, `clave_admin`) VALUES
('cdtellez@misena.edu.co', 'cristian');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE `tbl_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_cliente` int(11) NOT NULL,
  `direccion_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_clientes`
--

INSERT INTO `tbl_clientes` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `direccion_cliente`) VALUES
(1, 'Zaida Ojeda', 2345678, 'Cra 45 # 23-34'),
(2, 'Ismael Suarez', 34567789, 'Cll 34 #123-43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_concesionarios`
--

CREATE TABLE `tbl_concesionarios` (
  `nit_concesionario` int(11) NOT NULL,
  `nombre_concesionario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_concesionario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_concesionario` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_concesionarios`
--

INSERT INTO `tbl_concesionarios` (`nit_concesionario`, `nombre_concesionario`, `telefono_concesionario`, `direccion_concesionario`) VALUES
(45655, 'Villa Marcela', '5677', 'Cra 34 # 45-34'),
(123456, 'Ferrari', '555556666', 'calle 131 '),
(345345, 'Patio Bonito', '433545', 'Cra 1 # 4-56'),
(349898, 'Cedritos', '345345', 'Cll 34 #45-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vehiculos`
--

CREATE TABLE `tbl_vehiculos` (
  `codigo_vehiculo` int(11) NOT NULL,
  `marca_vehiculo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `modelo_vehiculo` int(11) NOT NULL,
  `precio_vehiculo` double NOT NULL,
  `codigo_concesionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_vehiculos`
--

INSERT INTO `tbl_vehiculos` (`codigo_vehiculo`, `marca_vehiculo`, `modelo_vehiculo`, `precio_vehiculo`, `codigo_concesionario`) VALUES
(1, 'Toyota', 2014, 4000000, 345345),
(2, 'Chevrolet', 2017, 10000000, 45655),
(3, 'Toyota', 2013, 23000000, 345345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ventas`
--

CREATE TABLE `tbl_ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ventas`
--

INSERT INTO `tbl_ventas` (`id_venta`, `fecha_venta`, `id_vehiculo`, `id_cliente`) VALUES
(1, '2018-08-09', 1, 1),
(2, '2018-08-16', 2, 2),
(3, '2018-08-10', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administradores`
--
ALTER TABLE `tbl_administradores`
  ADD PRIMARY KEY (`correo_electronico_admin`);

--
-- Indices de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_concesionarios`
--
ALTER TABLE `tbl_concesionarios`
  ADD PRIMARY KEY (`nit_concesionario`);

--
-- Indices de la tabla `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  ADD PRIMARY KEY (`codigo_vehiculo`),
  ADD KEY `fk_tbl_vehiculos_tbl_concesionarios_idx` (`codigo_concesionario`);

--
-- Indices de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_tbl_ventas_tbl_vehiculos1_idx` (`id_vehiculo`),
  ADD KEY `fk_tbl_ventas_tbl_clientes1_idx` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_clientes`
--
ALTER TABLE `tbl_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  MODIFY `codigo_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  ADD CONSTRAINT `fk_tbl_vehiculos_tbl_concesionarios` FOREIGN KEY (`codigo_concesionario`) REFERENCES `tbl_concesionarios` (`nit_concesionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD CONSTRAINT `fk_tbl_ventas_tbl_clientes1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_ventas_tbl_vehiculos1` FOREIGN KEY (`id_vehiculo`) REFERENCES `tbl_vehiculos` (`codigo_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
