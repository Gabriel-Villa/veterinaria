/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: veterinaria
Date: 6/08/2022 19:46:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT '2022-08-06',
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `model_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `model_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `orden`
-- ----------------------------
DROP TABLE IF EXISTS `orden`;
CREATE TABLE `orden` (
  `id_orden` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) unsigned NOT NULL,
  `hora_entrega` time NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensaje_proveedor` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_compra` datetime DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_orden`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `FK_orden_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `orden_detalle`
-- ----------------------------
DROP TABLE IF EXISTS `orden_detalle`;
CREATE TABLE `orden_detalle` (
  `id_orden_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` bigint(20) unsigned NOT NULL,
  `id_producto` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_detalle`),
  KEY `FK_orden_detalle_orden` (`id_orden`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `FK_orden_detalle_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`),
  CONSTRAINT `FK_orden_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `producto`
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_categoria` bigint(20) unsigned NOT NULL,
  `id_proveedor` bigint(20) unsigned NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(6,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_categoria` (`id_categoria`),
  KEY `fk_producto_proveedor` (`id_proveedor`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `fk_producto_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `producto_detalle`
-- ----------------------------
DROP TABLE IF EXISTS `producto_detalle`;
CREATE TABLE `producto_detalle` (
  `id_producto_detalle` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` bigint(20) unsigned NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_producto_detalle`),
  KEY `fk_producto_detalle_producto` (`id_producto`),
  CONSTRAINT `fk_producto_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `categoria` VALUES ('1','CATEGORIA 1','1975-08-28','1'), ('2','CATEGORIA 2','1994-10-11','1'), ('3','CATEGORIA 3','2020-07-13','1'), ('4','CATEGORIA 4','2008-03-02','1'), ('5','CATEGORIA 5','1983-05-11','1');
INSERT INTO `migrations` VALUES ('1','2014_10_12_100000_create_password_resets_table','1'), ('2','2019_08_19_000000_create_failed_jobs_table','1'), ('3','2022_08_04_143052_create_permission_tables','1'), ('4','2022_08_05_234716_create_categoria_table','1'), ('5','2022_08_05_234716_create_orden_detalle_table','1'), ('6','2022_08_05_234716_create_orden_table','1'), ('7','2022_08_05_234716_create_producto_table','1'), ('8','2022_08_05_234716_create_users_table','1'), ('9','2022_08_05_234717_add_foreign_keys_to_orden_detalle_table','1'), ('10','2022_08_05_234717_add_foreign_keys_to_orden_table','1'), ('11','2022_08_05_234717_add_foreign_keys_to_producto_table','1');
INSERT INTO `model_has_roles` VALUES ('1','App\\Models\\User','1'), ('2','App\\Models\\User','2'), ('2','App\\Models\\User','3'), ('3','App\\Models\\User','4'), ('3','App\\Models\\User','5'), ('3','App\\Models\\User','6');
INSERT INTO `permissions` VALUES ('1','dashboard','web','2022-08-06 19:39:04','2022-08-06 19:39:04'), ('2','categoria.index','web','2022-08-06 19:39:05','2022-08-06 19:39:05'), ('3','categoria.create','web','2022-08-06 19:39:06','2022-08-06 19:39:06'), ('4','categoria.edit','web','2022-08-06 19:39:06','2022-08-06 19:39:06'), ('5','producto.index','web','2022-08-06 19:39:06','2022-08-06 19:39:06'), ('6','producto.create','web','2022-08-06 19:39:06','2022-08-06 19:39:06'), ('7','producto.edit','web','2022-08-06 19:39:07','2022-08-06 19:39:07'), ('8','orden.index','web','2022-08-06 19:39:07','2022-08-06 19:39:07'), ('9','orden.create','web','2022-08-06 19:39:08','2022-08-06 19:39:08'), ('10','orden.edit','web','2022-08-06 19:39:08','2022-08-06 19:39:08');
INSERT INTO `roles` VALUES ('1','admin','web','2022-08-06 19:39:04','2022-08-06 19:39:04'), ('2','proveedor','web','2022-08-06 19:39:04','2022-08-06 19:39:04'), ('3','cliente','web','2022-08-06 19:39:04','2022-08-06 19:39:04');
INSERT INTO `role_has_permissions` VALUES ('1','1'), ('1','2'), ('2','1'), ('3','1'), ('4','1'), ('5','1'), ('5','2'), ('6','1'), ('6','2'), ('7','1'), ('7','2'), ('8','1'), ('8','2'), ('9','1'), ('9','2'), ('10','1'), ('10','2');
INSERT INTO `users` VALUES ('1','GABRIEL - ADMIN','dev@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$ZlqLYCU61v/fEZ8QYEvghu2vrDNg0JmaIUrGMEgFPZirDmFPxIIc6',NULL), ('2','PROVEEDOR - 1','proveedor1@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$TM8b.U5aagWrb/HcYnV.DeQ8MSqKVHbwg/TaH/u5Otmmn7e8UWh7u',NULL), ('3','PROVEEDOR - 2','proveedor2@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$c8tk397p4Xkmfs7z7E0W8O2Cc0SwWYCtoFfN.XoemsJmLYznanR6m',NULL), ('4','CLIENTE - 1','cliente1@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$vryYsypGOcMlPGSeeVnRVej10REqnTgaogAjdjn9sfr16.Nf9LRAm',NULL), ('5','CLIENTE - 2','cliente2@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$6.59kUqBxz.pxuXAkWQEy.JivcuLk6lqogSzzVsjFKNFTjEOKVNmu',NULL), ('6','CLIENTE - 3','cliente3@gmail.com',NULL,NULL,NULL,NULL,NULL,'$2y$10$RFyQYhxYHVsIJQOT3bgJhujhy7H6KrDFcEsFGOAzaGzwnJUOaV64m',NULL);
