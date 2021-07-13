-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para mensajeria_lesa
CREATE DATABASE IF NOT EXISTS `mensajeria_lesa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `mensajeria_lesa`;

-- Volcando estructura para tabla mensajeria_lesa.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(300) NOT NULL,
  `estado` varchar(50) DEFAULT 'Activo',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla mensajeria_lesa.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.horario
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `horario` varchar(2) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mensajeria_lesa.horario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.registro_trabajos
CREATE TABLE IF NOT EXISTS `registro_trabajos` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_stickers` int(11) NOT NULL,
  `fecha_recibido` date NOT NULL,
  `hora_recibido` varchar(10) NOT NULL,
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
  `updated_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `registro_sticker` (`id_stickers`),
  CONSTRAINT `registro_trabajos_ibfk_1` FOREIGN KEY (`id_stickers`) REFERENCES `stickers` (`id_stickers`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mensajeria_lesa.registro_trabajos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `registro_trabajos` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_trabajos` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.ruta
CREATE TABLE IF NOT EXISTS `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_ruta`),
  KEY `ruta_usuario` (`id_usuario`),
  CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mensajeria_lesa.ruta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.stickers
CREATE TABLE IF NOT EXISTS `stickers` (
  `id_stickers` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruta` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_stickers`),
  KEY `ruta_sticker` (`id_ruta`),
  KEY `horario_sticker` (`id_horario`),
  CONSTRAINT `stickers_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE CASCADE,
  CONSTRAINT `stickers_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mensajeria_lesa.stickers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `stickers` DISABLE KEYS */;
/*!40000 ALTER TABLE `stickers` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.sucursal
CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `sucursal` varchar(300) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_sucursal`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla mensajeria_lesa.sucursal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(150) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mensajeria_lesa.tipo_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
	(1, 'Administrador'),
	(2, 'Mensajero');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla mensajeria_lesa.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) NOT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `telefono` varchar(9) NOT NULL,
  `usuario` varchar(16) DEFAULT NULL,
  `pass` varchar(16) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mensajeria_lesa.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para disparador mensajeria_lesa.newRuta
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `newRuta` BEFORE INSERT ON `usuario` FOR EACH ROW BEGIN  
declare numeroRuta INT;
IF new.id_tipo_usuario=2 THEN
   SELECT COUNT(*) INTO numeroRuta FROM ruta;
	  INSERT INTO ruta VALUES(CONCAT('R',numeroRuta+1), new.id_usuario);
ELSE	
   SELECT COUNT(*) INTO numeroRuta FROM ruta;
END IF;  
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
