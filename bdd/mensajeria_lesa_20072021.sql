-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2021 a las 01:03:11
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mensajeria_lesa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(300) NOT NULL,
  `estado` varchar(50) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cliente`, `estado`) VALUES
(1, 'Opticas CV+', 'Activo'),
(2, 'La Realeza ', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `horario` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `horario`) VALUES
(1, 'AM'),
(2, 'PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_trabajos`
--

CREATE TABLE `registro_trabajos` (
  `id_registro` int(11) NOT NULL,
  `id_stickers` int(11) NOT NULL,
  `fecha_recibido` date DEFAULT NULL,
  `hora_recibido` varchar(10) DEFAULT NULL,
  `orden_pedido` varchar(75) DEFAULT NULL,
  `fecha_laboratorio` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` varchar(10) DEFAULT NULL,
  `estado` varchar(255) DEFAULT 'En recepcion',
  `id_sucursal` int(11) DEFAULT NULL,
  `cliente_optica` varchar(255) DEFAULT NULL,
  `fecha_mensajero` date DEFAULT NULL,
  `hora_mensajero` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `ruta` varchar(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `ruta`, `id_usuario`) VALUES
(2, 'R1', 3),
(4, 'R2', 5),
(5, 'R3', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stickers`
--

CREATE TABLE `stickers` (
  `id_stickers` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `cantidad` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT 'No Generados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stickers`
--

INSERT INTO `stickers` (`id_stickers`, `id_ruta`, `id_horario`, `fecha`, `created_at`, `updated_at`, `cantidad`, `estado`) VALUES
(21, 2, 1, '2021-07-19', '2021-07-19 22:34:44', '2021-07-20 22:23:01', 20, 'Generados'),
(22, 5, 2, '2021-07-19', '2021-07-19 22:39:59', '2021-07-20 22:54:34', 10, 'Generados'),
(23, 4, 2, '2021-07-19', '2021-07-19 22:45:04', '2021-07-20 22:55:07', 30, 'Generados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sticker_generado`
--

CREATE TABLE `sticker_generado` (
  `id_generado` int(11) NOT NULL,
  `stickers` varchar(255) NOT NULL DEFAULT '0',
  `id_sticker` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `estado` varchar(75) DEFAULT 'Sin Utilizar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sticker_generado`
--

INSERT INTO `sticker_generado` (`id_generado`, `stickers`, `id_sticker`, `created_at`, `estado`) VALUES
(1, 'R1AM000001', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(2, 'R1AM000002', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(3, 'R1AM000003', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(4, 'R1AM000004', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(5, 'R1AM000005', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(6, 'R1AM000006', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(7, 'R1AM000007', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(8, 'R1AM000008', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(9, 'R1AM000009', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(10, 'R1AM000010', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(11, 'R1AM000011', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(12, 'R1AM000012', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(13, 'R1AM000013', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(14, 'R1AM000014', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(15, 'R1AM000015', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(16, 'R1AM000016', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(17, 'R1AM000017', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(18, 'R1AM000018', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(19, 'R1AM000019', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(20, 'R1AM000020', 21, '2021-07-20 22:23:01', 'Sin Utilizar'),
(21, 'R1AM000021', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(22, 'R1AM000022', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(23, 'R1AM000023', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(24, 'R1AM000024', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(25, 'R1AM000025', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(26, 'R1AM000026', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(27, 'R1AM000027', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(28, 'R1AM000028', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(29, 'R1AM000029', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(30, 'R1AM000030', 22, '2021-07-20 22:54:34', 'Sin Utilizar'),
(31, 'R1AM000031', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(32, 'R1AM000032', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(33, 'R1AM000033', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(34, 'R1AM000034', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(35, 'R1AM000035', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(36, 'R1AM000036', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(37, 'R1AM000037', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(38, 'R1AM000038', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(39, 'R1AM000039', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(40, 'R1AM000040', 22, '2021-07-20 22:54:41', 'Sin Utilizar'),
(41, 'R1AM000041', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(42, 'R1AM000042', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(43, 'R1AM000043', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(44, 'R1AM000044', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(45, 'R1AM000045', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(46, 'R1AM000046', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(47, 'R1AM000047', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(48, 'R1AM000048', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(49, 'R1AM000049', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(50, 'R1AM000050', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(51, 'R1AM000051', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(52, 'R1AM000052', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(53, 'R1AM000053', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(54, 'R1AM000054', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(55, 'R1AM000055', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(56, 'R1AM000056', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(57, 'R1AM000057', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(58, 'R1AM000058', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(59, 'R1AM000059', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(60, 'R1AM000060', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(61, 'R1AM000061', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(62, 'R1AM000062', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(63, 'R1AM000063', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(64, 'R1AM000064', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(65, 'R1AM000065', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(66, 'R1AM000066', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(67, 'R1AM000067', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(68, 'R1AM000068', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(69, 'R1AM000069', 23, '2021-07-20 22:55:07', 'Sin Utilizar'),
(70, 'R1AM000070', 23, '2021-07-20 22:55:07', 'Sin Utilizar');

--
-- Disparadores `sticker_generado`
--
DELIMITER $$
CREATE TRIGGER `updateStickers` AFTER INSERT ON `sticker_generado` FOR EACH ROW update stickers  set estado='Generados' where id_stickers = new.id_sticker
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `sucursal` varchar(300) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `nombre_contacto` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `id_cliente`, `sucursal`, `direccion`, `nombre_contacto`, `telefono`) VALUES
(1, 2, 'Optica La Realeza Metrocentro SS', 'Metrocentro SS local #1', 'Griselda Marroquin ', '2256-9088'),
(2, 1, 'Opticas CV+ Metrocentro SS', 'Metrocentro local #4', 'Flor Martinez', '2264-5890'),
(3, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Mensajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `telefono` varchar(9) NOT NULL,
  `usuario` varchar(16) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `estado` varchar(255) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `placa`, `telefono`, `usuario`, `pass`, `id_tipo_usuario`, `estado`) VALUES
(1, 'Adminsitrador', 'P000001', '73670806', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'Activo'),
(2, 'Aileen Recepcion', 'N/D', '7568-0000', 'aileen', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 1, 'Desactivado'),
(3, 'Josue Marinero', 'M000-001', '7777-0000', 'marineroj', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 2, 'Activo'),
(5, 'Eduardo Josue', 'M020-002', '7367-0806', 'garciaj', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 2, 'Activo'),
(6, 'Nelson Martinez', 'M123-456', '7689-5403', 'martinezn', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 2, 'Activo'),
(7, '', '', '', 'josue@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'Desactivado');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `newRuta` AFTER INSERT ON `usuario` FOR EACH ROW BEGIN  
declare numeroRuta int(11);
IF new.id_tipo_usuario=2 THEN
   set numeroRuta=(SELECT COUNT(*) FROM ruta);
	  INSERT INTO ruta VALUES(null,CONCAT('R',numeroRuta+1), new.id_usuario);
ELSE	
   set numeroRuta=(SELECT COUNT(*) FROM ruta);
END IF;  
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `registro_trabajos`
--
ALTER TABLE `registro_trabajos`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `registro_sticker` (`id_stickers`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`),
  ADD KEY `ruta_usuario` (`id_usuario`);

--
-- Indices de la tabla `stickers`
--
ALTER TABLE `stickers`
  ADD PRIMARY KEY (`id_stickers`),
  ADD KEY `ruta_sticker` (`id_ruta`),
  ADD KEY `horario_sticker` (`id_horario`);

--
-- Indices de la tabla `sticker_generado`
--
ALTER TABLE `sticker_generado`
  ADD PRIMARY KEY (`id_generado`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_trabajos`
--
ALTER TABLE `registro_trabajos`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `stickers`
--
ALTER TABLE `stickers`
  MODIFY `id_stickers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `sticker_generado`
--
ALTER TABLE `sticker_generado`
  MODIFY `id_generado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro_trabajos`
--
ALTER TABLE `registro_trabajos`
  ADD CONSTRAINT `registro_trabajos_ibfk_1` FOREIGN KEY (`id_stickers`) REFERENCES `stickers` (`id_stickers`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stickers`
--
ALTER TABLE `stickers`
  ADD CONSTRAINT `stickers_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE CASCADE,
  ADD CONSTRAINT `stickers_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
