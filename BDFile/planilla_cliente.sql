-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2022 a las 21:00:25
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planilla_cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(100) NOT NULL,
  `capellido_cliente` varchar(255) DEFAULT NULL,
  `cnombre_cliente` varchar(255) DEFAULT NULL,
  `ndocumento_cliente` varchar(9) DEFAULT NULL,
  `ntelefono_cliente` varchar(13) DEFAULT NULL,
  `cdireccion_cliente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `capellido_cliente`, `cnombre_cliente`, `ndocumento_cliente`, `ntelefono_cliente`, `cdireccion_cliente`) VALUES
(1, 'Fleitas', 'Camilo Nahuel', '44324654', '3704567666', 'Barrio 20 de julio Mz 15 C 2'),
(2, 'Publico General', NULL, NULL, NULL, NULL),
(3, 'Martinez', 'Alberto', '39845443', '3704347655', 'Barrio guadalupe Mz 13 C 2'),
(4, 'Gonzalez', 'Sergio', '35543342', '3704231454', 'Barrio 8 de Julio Mz 36 C 15'),
(5, 'Mona', 'Lisa', '44343322', '30000000', 'Av Gonzalez Lelong 1500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `registro_id` int(100) NOT NULL,
  `rela_cliente_id` int(100) NOT NULL,
  `cnombre_producto` varchar(255) NOT NULL,
  `ncant_prod` int(11) NOT NULL,
  `nprecio_producto` int(11) NOT NULL,
  `nprecio_cuota` int(11) DEFAULT NULL,
  `ncuotas_producto` int(3) DEFAULT NULL,
  `ncuotas_pagadas` int(3) DEFAULT NULL,
  `dfecha_venta` date NOT NULL,
  `thora_venta` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`registro_id`, `rela_cliente_id`, `cnombre_producto`, `ncant_prod`, `nprecio_producto`, `nprecio_cuota`, `ncuotas_producto`, `ncuotas_pagadas`, `dfecha_venta`, `thora_venta`) VALUES
(1, 1, 'Baraja Hachazo', 2, 150, 10, 12, 7, '2022-02-01', '16:00:00'),
(48, 1, 'Lentes de sol marca Blindness', 1, 130, 13, 10, 4, '2022-02-06', '16:45:00'),
(49, 3, 'Botella de agua', 2, 200, 0, 0, 0, '2022-02-06', '17:06:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`registro_id`),
  ADD KEY `rela_cliente_id` (`rela_cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `registro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`rela_cliente_id`) REFERENCES `clientes` (`cliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
