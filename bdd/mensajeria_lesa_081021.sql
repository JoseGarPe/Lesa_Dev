/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : mensajeria_lesa

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 08/10/2021 09:19:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Activo',
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 'Opticas CV+', 'Activo');
INSERT INTO `cliente` VALUES (2, 'La Realeza ', 'Activo');

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario`  (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `horario` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_horario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of horario
-- ----------------------------
INSERT INTO `horario` VALUES (1, 'AM');
INSERT INTO `horario` VALUES (2, 'PM');

-- ----------------------------
-- Table structure for registro_trabajos
-- ----------------------------
DROP TABLE IF EXISTS `registro_trabajos`;
CREATE TABLE `registro_trabajos`  (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_recibido` date NULL DEFAULT NULL,
  `hora_recibido` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `orden_pedido` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_laboratorio` date NULL DEFAULT NULL,
  `fecha_salida` date NULL DEFAULT NULL,
  `hora_salida` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'En recepcion',
  `id_sucursal` int(11) NULL DEFAULT NULL,
  `cliente_optica` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_mensajero` date NULL DEFAULT NULL,
  `hora_mensajero` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_generado` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_registro`) USING BTREE,
  INDEX `registro_generado`(`id_generado`) USING BTREE,
  CONSTRAINT `registro_generado` FOREIGN KEY (`id_generado`) REFERENCES `sticker_generado` (`id_generado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of registro_trabajos
-- ----------------------------
INSERT INTO `registro_trabajos` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, 'Recibido por mensajero', 2, NULL, '2021-08-20', '16:9:22', NULL, NULL, 1);
INSERT INTO `registro_trabajos` VALUES (2, NULL, NULL, NULL, NULL, NULL, NULL, 'Recibido por mensajero', 2, NULL, '2021-08-20', '16:11:32', NULL, NULL, 2);
INSERT INTO `registro_trabajos` VALUES (3, NULL, NULL, NULL, NULL, NULL, NULL, 'Recibido por mensajero', 2, NULL, '2021-08-20', '7:28:5', NULL, NULL, 3);
INSERT INTO `registro_trabajos` VALUES (4, NULL, NULL, NULL, NULL, NULL, NULL, 'Recibido por mensajero', 1, NULL, '2021-08-24', '7:28:27', NULL, NULL, 4);
INSERT INTO `registro_trabajos` VALUES (5, NULL, NULL, NULL, NULL, NULL, NULL, 'Recibido por mensajero', 1, NULL, '2021-08-24', '16:47:18', NULL, NULL, 5);

-- ----------------------------
-- Table structure for registro_trabajos_independiente
-- ----------------------------
DROP TABLE IF EXISTS `registro_trabajos_independiente`;
CREATE TABLE `registro_trabajos_independiente`  (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_recibido` date NULL DEFAULT NULL,
  `hora_recibido` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `orden_pedido` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_laboratorio` date NULL DEFAULT NULL,
  `fecha_salida` date NULL DEFAULT NULL,
  `hora_salida` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'En recepcion',
  `id_sucursal` int(11) NULL DEFAULT NULL,
  `cliente_optica` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `sticker` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_mensajero` date NULL DEFAULT NULL,
  `hora_mensajero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of registro_trabajos_independiente
-- ----------------------------

-- ----------------------------
-- Table structure for ruta
-- ----------------------------
DROP TABLE IF EXISTS `ruta`;
CREATE TABLE `ruta`  (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_ruta`) USING BTREE,
  INDEX `ruta_usuario`(`id_usuario`) USING BTREE,
  CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ruta
-- ----------------------------
INSERT INTO `ruta` VALUES (2, 'R1', 3);
INSERT INTO `ruta` VALUES (4, 'R2', 5);
INSERT INTO `ruta` VALUES (5, 'R3', 6);

-- ----------------------------
-- Table structure for sticker_generado
-- ----------------------------
DROP TABLE IF EXISTS `sticker_generado`;
CREATE TABLE `sticker_generado`  (
  `id_generado` int(11) NOT NULL AUTO_INCREMENT,
  `stickers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id_sticker` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `estado` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Sin Utilizar',
  PRIMARY KEY (`id_generado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 141 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sticker_generado
-- ----------------------------
INSERT INTO `sticker_generado` VALUES (1, 'R1AM000001', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (2, 'R1AM000002', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (3, 'R1AM000003', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (4, 'R1AM000004', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (5, 'R1AM000005', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (6, 'R1AM000006', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (7, 'R1AM000007', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (8, 'R1AM000008', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (9, 'R1AM000009', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (10, 'R1AM000010', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (11, 'R1AM000011', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (12, 'R1AM000012', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (13, 'R1AM000013', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (14, 'R1AM000014', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (15, 'R1AM000015', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (16, 'R1AM000016', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (17, 'R1AM000017', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (18, 'R1AM000018', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (19, 'R1AM000019', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (20, 'R1AM000020', 21, '2021-07-20 16:23:01', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (21, 'R1AM000021', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (22, 'R1AM000022', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (23, 'R1AM000023', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (24, 'R1AM000024', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (25, 'R1AM000025', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (26, 'R1AM000026', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (27, 'R1AM000027', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (28, 'R1AM000028', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (29, 'R1AM000029', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (30, 'R1AM000030', 22, '2021-07-20 16:54:34', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (31, 'R1AM000031', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (32, 'R1AM000032', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (33, 'R1AM000033', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (34, 'R1AM000034', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (35, 'R1AM000035', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (36, 'R1AM000036', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (37, 'R1AM000037', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (38, 'R1AM000038', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (39, 'R1AM000039', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (40, 'R1AM000040', 22, '2021-07-20 16:54:41', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (41, 'R1AM000041', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (42, 'R1AM000042', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (43, 'R1AM000043', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (44, 'R1AM000044', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (45, 'R1AM000045', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (46, 'R1AM000046', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (47, 'R1AM000047', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (48, 'R1AM000048', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (49, 'R1AM000049', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (50, 'R1AM000050', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (51, 'R1AM000051', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (52, 'R1AM000052', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (53, 'R1AM000053', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (54, 'R1AM000054', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (55, 'R1AM000055', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (56, 'R1AM000056', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (57, 'R1AM000057', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (58, 'R1AM000058', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (59, 'R1AM000059', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (60, 'R1AM000060', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (61, 'R1AM000061', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (62, 'R1AM000062', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (63, 'R1AM000063', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (64, 'R1AM000064', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (65, 'R1AM000065', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (66, 'R1AM000066', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (67, 'R1AM000067', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (68, 'R1AM000068', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (69, 'R1AM000069', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (70, 'R1AM000070', 23, '2021-07-20 16:55:07', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (71, 'R3AM000071', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (72, 'R3AM000072', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (73, 'R3AM000073', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (74, 'R3AM000074', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (75, 'R3AM000075', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (76, 'R3AM000076', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (77, 'R3AM000077', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (78, 'R3AM000078', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (79, 'R3AM000079', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (80, 'R3AM000080', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (81, 'R3AM000081', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (82, 'R3AM000082', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (83, 'R3AM000083', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (84, 'R3AM000084', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (85, 'R3AM000085', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (86, 'R3AM000086', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (87, 'R3AM000087', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (88, 'R3AM000088', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (89, 'R3AM000089', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (90, 'R3AM000090', 24, '2021-07-21 07:19:42', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (91, 'R2AM000091', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (92, 'R2AM000092', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (93, 'R2AM000093', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (94, 'R2AM000094', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (95, 'R2AM000095', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (96, 'R2AM000096', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (97, 'R2AM000097', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (98, 'R2AM000098', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (99, 'R2AM000099', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (100, 'R2AM000100', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (101, 'R2AM000101', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (102, 'R2AM000102', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (103, 'R2AM000103', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (104, 'R2AM000104', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (105, 'R2AM000105', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (106, 'R2AM000106', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (107, 'R2AM000107', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (108, 'R2AM000108', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (109, 'R2AM000109', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (110, 'R2AM000110', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (111, 'R2AM000111', 25, '2021-09-30 17:04:54', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (112, 'R2AM000112', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (113, 'R2AM000113', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (114, 'R2AM000114', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (115, 'R2AM000115', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (116, 'R2AM000116', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (117, 'R2AM000117', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (118, 'R2AM000118', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (119, 'R2AM000119', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (120, 'R2AM000120', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (121, 'R2AM000121', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (122, 'R2AM000122', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (123, 'R2AM000123', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (124, 'R2AM000124', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (125, 'R2AM000125', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (126, 'R2AM000126', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (127, 'R2AM000127', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (128, 'R2AM000128', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (129, 'R2AM000129', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (130, 'R2AM000130', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (131, 'R2AM000131', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (132, 'R2AM000132', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (133, 'R2AM000133', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (134, 'R2AM000134', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (135, 'R2AM000135', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (136, 'R2AM000136', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (137, 'R2AM000137', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (138, 'R2AM000138', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (139, 'R2AM000139', 25, '2021-09-30 17:04:55', 'Sin Utilizar');
INSERT INTO `sticker_generado` VALUES (140, 'R2AM000140', 25, '2021-09-30 17:04:55', 'Sin Utilizar');

-- ----------------------------
-- Table structure for stickers
-- ----------------------------
DROP TABLE IF EXISTS `stickers`;
CREATE TABLE `stickers`  (
  `id_stickers` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruta` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `cantidad` int(11) NULL DEFAULT NULL,
  `estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'No Generados',
  PRIMARY KEY (`id_stickers`) USING BTREE,
  INDEX `ruta_sticker`(`id_ruta`) USING BTREE,
  INDEX `horario_sticker`(`id_horario`) USING BTREE,
  CONSTRAINT `stickers_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `stickers_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stickers
-- ----------------------------
INSERT INTO `stickers` VALUES (21, 2, 1, '2021-07-19', '2021-07-19 16:34:44', '2021-07-20 16:23:01', 20, 'Generados');
INSERT INTO `stickers` VALUES (22, 5, 2, '2021-07-19', '2021-07-19 16:39:59', '2021-07-20 16:54:34', 10, 'Generados');
INSERT INTO `stickers` VALUES (23, 4, 2, '2021-07-19', '2021-07-19 16:45:04', '2021-07-20 16:55:07', 30, 'Generados');
INSERT INTO `stickers` VALUES (24, 5, 1, '2021-07-22', '2021-07-21 07:19:31', '2021-07-21 07:19:42', 20, 'Generados');
INSERT INTO `stickers` VALUES (25, 4, 1, '2021-10-01', '2021-09-30 17:04:45', '2021-09-30 17:04:54', 50, 'Generados');

-- ----------------------------
-- Table structure for sucursal
-- ----------------------------
DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE `sucursal`  (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `sucursal` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sucursal`) USING BTREE,
  INDEX `id_cliente`(`id_cliente`) USING BTREE,
  CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sucursal
-- ----------------------------
INSERT INTO `sucursal` VALUES (1, 2, 'Optica La Realeza Metrocentro SS', 'Metrocentro SS local #1', 'Griselda Marroquin ', '2256-9088');
INSERT INTO `sucursal` VALUES (2, 1, 'Opticas CV+ Metrocentro SS', 'Metrocentro local #4', 'Flor Martinez', '2264-5890');
INSERT INTO `sucursal` VALUES (3, 1, '', '', '', '');

-- ----------------------------
-- Table structure for tipo_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario`  (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_usuario
-- ----------------------------
INSERT INTO `tipo_usuario` VALUES (1, 'Administrador');
INSERT INTO `tipo_usuario` VALUES (2, 'Mensajero');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `placa` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Activo',
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `tipo_usuario`(`id_tipo_usuario`) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'Adminsitrador', 'P000001', '73670806', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'Activo');
INSERT INTO `usuario` VALUES (2, 'Aileen Recepcion', 'N/D', '7568-0000', 'aileen', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 1, 'Desactivado');
INSERT INTO `usuario` VALUES (3, 'Josue Marinero', 'M000-001', '7777-0000', 'marineroj', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 2, 'Activo');
INSERT INTO `usuario` VALUES (5, 'Eduardo Josue', 'M020-002', '7367-0806', 'garciaj', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 2, 'Activo');
INSERT INTO `usuario` VALUES (6, 'Nelson Martinez', 'M123-456', '7689-5403', 'martinezn', '4bc14039d46f877eaf5655123e7aec45c974cec96fb04244470c20887711db79', 2, 'Activo');
INSERT INTO `usuario` VALUES (7, '', '', '', 'josue@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'Desactivado');

-- ----------------------------
-- Triggers structure for table sticker_generado
-- ----------------------------
DROP TRIGGER IF EXISTS `updateStickers`;
delimiter ;;
CREATE TRIGGER `updateStickers` AFTER INSERT ON `sticker_generado` FOR EACH ROW update stickers  set estado='Generados' where id_stickers = new.id_sticker
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table usuario
-- ----------------------------
DROP TRIGGER IF EXISTS `newRuta`;
delimiter ;;
CREATE TRIGGER `newRuta` AFTER INSERT ON `usuario` FOR EACH ROW BEGIN  
declare numeroRuta int(11);
IF new.id_tipo_usuario=2 THEN
   set numeroRuta=(SELECT COUNT(*) FROM ruta);
	  INSERT INTO ruta VALUES(null,CONCAT('R',numeroRuta+1), new.id_usuario);
ELSE	
   set numeroRuta=(SELECT COUNT(*) FROM ruta);
END IF;  
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
