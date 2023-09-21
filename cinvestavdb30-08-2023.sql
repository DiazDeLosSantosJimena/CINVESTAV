/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 5.7.41 : Database - cinvestav_utvt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cinvestav_utvt` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cinvestav_utvt`;

/*Table structure for table `authors` */

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authors_project_id_foreign` (`project_id`),
  CONSTRAINT `authors_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `authors` */

insert  into `authors`(`id`,`project_id`,`name`,`app`,`apm`,`institution_of_origin`,`state`,`created_at`,`updated_at`) values 
(4,3,'Autor1','Prueba','Prueba','Prueba','México','2023-08-10 14:31:57','2023-08-10 14:31:57'),
(5,3,'Autor2','Prueba','Prueba','Prueba','México','2023-08-10 14:31:57','2023-08-10 14:31:57'),
(6,3,'Autor3','prueba','prueba','prueba','México','2023-08-10 14:31:57','2023-08-10 14:31:57'),
(8,5,'Autor1','Prueba','Prueba','Prueba','Prueba','2023-08-10 17:22:22','2023-08-10 17:22:22'),
(11,7,'Francisco Agustín','Zúñiga ','Coronel','Universidad de Los Altos de Chiapas','México','2023-08-21 16:24:01','2023-08-21 16:24:01'),
(12,8,'Maria Susana','Dominguez','Felix','Universidad de Sonora','México','2023-08-25 20:32:38','2023-08-25 20:32:38'),
(13,8,'Manuel Alfredo','Urrea','Bernal','Universidad de Sonora','México','2023-08-25 20:32:38','2023-08-25 20:32:38'),
(14,9,'Jimmy Alexander','Uribe','Carreño','Universidad del Valle','Colombia','2023-08-28 15:12:47','2023-08-28 15:12:47'),
(15,9,'Marisol','Santacruz','Rodríguez','Universidad del Valle','Colombia','2023-08-28 15:12:47','2023-08-28 15:12:47'),
(16,9,'Jorge Enrique','Galeano','Cano','Universidad del Valle','Colombia','2023-08-28 15:12:47','2023-08-28 15:12:47'),
(23,10,'Sonia Guadalupe','Anguiano ','Rostro','Facultad de Ciencias Químicas, Universidad Autónoma de Nuevo León.','México','2023-08-29 12:36:57','2023-08-29 12:36:57'),
(24,10,'Norma Jeaneth','Treviño','Hernández','Facultad de Ciencias Químicas, Universidad Autónoma de Nuevo León.','México','2023-08-29 12:36:57','2023-08-29 12:36:57'),
(25,10,'Karla Lizette','Guajardo','Cosío','Facultad de Ciencias Químicas, Universidad Autónoma de Nuevo León.','México','2023-08-29 12:36:57','2023-08-29 12:36:57'),
(28,12,'MARÍA MERCEDES  ','CHACARA','MONTES','UNIVERSIDAD DE SONORA','MEXICO','2023-08-29 13:01:44','2023-08-29 13:01:44'),
(29,12,'MARÍA TERESA','DAVILA ','ARAIZA','UNIVERSIDAD DE SONORA','MEXICO','2023-08-29 13:01:44','2023-08-29 13:01:44'),
(32,6,'HELI','HERRERA','LOPEZ','UNIVERSIDAD DE GUADALAJARA','MEXICO','2023-08-29 18:16:18','2023-08-29 18:16:18'),
(33,6,'ABRAHAM ','CUESTA','BORGES','UNIVERSIDAD VERACRUZANA','MEXICO','2023-08-29 18:16:18','2023-08-29 18:16:18'),
(34,13,'Heli','Herrera','López','Universidad de Guadalajara','México','2023-08-29 18:17:47','2023-08-29 18:17:47'),
(35,13,'Abraham','Cuesta','Borges','Universidad Veracruzana','México','2023-08-29 18:17:47','2023-08-29 18:17:47'),
(36,14,'Luis Carlos ','Mercado','Martinez','Universidad Autónoma de Zacatecas','México','2023-08-29 21:00:46','2023-08-29 21:00:46'),
(37,14,'Eduardo Carlos ','Briceño','Solís','Universidad Autónoma de Zacatecas','México','2023-08-29 21:00:46','2023-08-29 21:00:46'),
(38,15,'Janer De Jesus','Cañate','Montiel','Universidad Autónoma de Zacatecas ','México','2023-08-29 21:17:05','2023-08-29 21:17:05'),
(39,15,'José Iván ','López ','Flores','Universidad Autónoma de Zacatecas ','México','2023-08-29 21:17:06','2023-08-29 21:17:06'),
(40,15,'Luis Carlos','Mercado','Martinez','Universidad Autónoma de Zacatecas ','México','2023-08-29 21:17:06','2023-08-29 21:17:06'),
(43,17,'Guadalupe','Cabañas-Sánchez','','Universidad Autónoma de Guerrero','México','2023-08-29 22:05:26','2023-08-29 22:05:26'),
(46,16,'Frank','Tápanes','Ramos','Universidad Autónoma de Guerrero','México','2023-08-29 22:07:04','2023-08-29 22:07:04'),
(47,16,'Hilario','Salinas','Claudio','Universidad Autónoma de Guerrero','México','2023-08-29 22:07:04','2023-08-29 22:07:04'),
(48,18,'Yocelyn','Espinoza de los Monteros','Ortiz','Tecnológico Nacional de México, Instituto Tecnológico Superior de Teziutlán','México','2023-08-29 23:20:35','2023-08-29 23:20:35'),
(49,18,'Laura','Carreón','Romero','Tecnológico Nacional de México, Instituto Tecnológico Superior de Teziutlán','México','2023-08-29 23:20:35','2023-08-29 23:20:35'),
(50,18,'Natali','López','Salgado','Tecnológico Nacional de México, Instituto Tecnológico Superior de Teziutlán','México','2023-08-29 23:20:35','2023-08-29 23:20:35');

/*Table structure for table `evaluations` */

DROP TABLE IF EXISTS `evaluations`;

CREATE TABLE `evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `project_user` bigint(20) unsigned NOT NULL,
  `title` int(11) DEFAULT NULL,
  `extension` int(11) DEFAULT NULL,
  `key_words` int(11) DEFAULT NULL,
  `abstract_keywords` int(11) DEFAULT NULL,
  `problematic` int(11) DEFAULT NULL,
  `theoretical` int(11) DEFAULT NULL,
  `methodology` int(11) DEFAULT NULL,
  `proposal` int(11) DEFAULT NULL,
  `results` int(11) DEFAULT NULL,
  `APA_table` int(11) DEFAULT NULL,
  `APA_references` int(11) DEFAULT NULL,
  `format` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_user_id_foreign` (`user_id`),
  KEY `evaluations_project_user_foreign` (`project_user`),
  CONSTRAINT `evaluations_project_user_foreign` FOREIGN KEY (`project_user`) REFERENCES `projects_users` (`id`),
  CONSTRAINT `evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `evaluations` */

insert  into `evaluations`(`id`,`user_id`,`project_user`,`title`,`extension`,`key_words`,`abstract_keywords`,`problematic`,`theoretical`,`methodology`,`proposal`,`results`,`APA_table`,`APA_references`,`format`,`status`,`comment`,`created_at`,`updated_at`) values 
(1,12,1,9,9,3,10,10,10,9,9,9,9,9,10,'A','Lorem Ipsum','2023-08-28 14:28:16','2023-08-28 15:16:02'),
(4,3,1,8,8,10,10,9,9,6,6,6,10,10,10,'AC','Lorem Ipsum','2023-08-28 19:58:40','2023-08-28 20:01:58'),
(5,4,1,7,6,9,9,10,10,10,10,10,10,10,10,'R','Lorem Ipsum','2023-08-28 20:04:03','2023-08-28 20:05:38'),
(6,3,3,1,1,1,1,1,1,1,1,1,1,1,1,'A','Lorem Ipsum','2023-08-30 14:54:07','2023-08-30 15:11:57'),
(7,4,3,1,1,1,1,1,1,1,1,1,1,1,1,'A','Lorem ipsum','2023-08-30 14:54:26','2023-08-30 15:12:48'),
(8,5,3,1,1,1,1,1,1,1,1,1,1,1,1,'A','Lorem Ipsum','2023-08-30 16:52:46','2023-08-30 16:55:51');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_project_id_foreign` (`project_id`),
  CONSTRAINT `files_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `files` */

insert  into `files`(`id`,`project_id`,`name`,`type`,`archive`,`created_at`,`updated_at`) values 
(1,1,'proposals/1_2023-07-31_Formato-extenso-evaluacion-EICAL-13.docx','docx',1,'2023-07-31 14:06:00','2023-07-31 14:06:00'),
(2,1,'proposals/1_2023-07-31_Formato-Resumen-ponencia-EICAL-13.docx','docx',2,'2023-07-31 14:06:00','2023-07-31 14:06:00'),
(5,3,'proposals/3_2023-08-10_Formato-CARTEL-EICAL-14.docx','docx',1,'2023-08-10 14:31:57','2023-08-10 14:31:57'),
(6,3,'proposals/3_2023-08-10_Formato-CARTEL-EICAL-14.docx','docx',2,'2023-08-10 14:31:58','2023-08-10 14:31:58'),
(7,4,'proposals/4_2023-08-10_Formato-CARTEL-EICAL-14.docx','docx',1,'2023-08-10 14:37:52','2023-08-10 14:37:52'),
(8,4,'proposals/4_2023-08-10_1529609458736.jpeg','jpg',2,'2023-08-10 14:37:52','2023-08-10 14:37:52'),
(9,5,'proposals/5_2023-08-10_Formato-Resumen-ponencia-EICAL-14.docx','docx',1,'2023-08-10 16:21:54','2023-08-10 16:21:54'),
(10,5,'proposals/5_2023-08-10_Formato-extenso-evaluacion-EICAL-14.docx','docx',2,'2023-08-10 16:21:54','2023-08-10 16:21:54'),
(11,6,'proposals/6_2023-08-15_Noción Conceptual de Integral Mediante un Curso Virtual en el Bachillerato Resumen.docx','docx',1,'2023-08-15 23:15:58','2023-08-15 23:15:58'),
(12,6,'proposals/6_2023-08-15_Noción Conceptual de Integral Mediante un Curso Virtual en el Bachillerato.docx','docx',2,'2023-08-15 23:15:58','2023-08-15 23:15:58'),
(13,7,'proposals/7_2023-08-20_Resumen.docx','docx',1,'2023-08-20 14:22:40','2023-08-20 14:22:40'),
(14,7,'proposals/7_2023-08-20_Extenso-evaluar.docx','docx',2,'2023-08-20 14:22:41','2023-08-20 14:22:41'),
(15,8,'proposals/8_2023-08-25_RESUMEN.docx','docx',1,'2023-08-25 20:32:38','2023-08-25 20:32:38'),
(16,8,'proposals/8_2023-08-25_Extenso-evaluar.docx','docx',2,'2023-08-25 20:32:38','2023-08-25 20:32:38'),
(17,9,'proposals/9_2023-08-28_Formato-Resumen-ponencia-EICAL-14.docx','docx',1,'2023-08-28 15:12:47','2023-08-28 15:12:47'),
(18,9,'proposals/9_2023-08-28_Formato-extenso-evaluacion-EICAL-14.docx','docx',2,'2023-08-28 15:12:47','2023-08-28 15:12:47'),
(19,10,'proposals/10_2023-08-29_Formato-Resumen-ponencia-EICAL-14 SGAR.docx','docx',1,'2023-08-29 12:35:10','2023-08-29 12:35:10'),
(20,10,'proposals/10_2023-08-29_Formato-extenso-evaluacion-EICAL-14 SGAR.docx','docx',2,'2023-08-29 12:35:11','2023-08-29 12:35:11'),
(23,12,'proposals/12_2023-08-29_Formato-Resumen-ponencia-EICAL-14.docx','docx',1,'2023-08-29 13:00:59','2023-08-29 13:00:59'),
(24,12,'proposals/12_2023-08-29_Formato-extenso-evaluacion-EICAL-14 (2).docx','docx',2,'2023-08-29 13:00:59','2023-08-29 13:00:59'),
(25,13,'proposals/13_2023-08-29_Formato-Resumen-ponencia-EICAL-14 RESUMEN NOCION CONCEPTUAL.docx','docx',1,'2023-08-29 18:17:47','2023-08-29 18:17:47'),
(26,13,'proposals/13_2023-08-29_Formato-extenso-evaluacion-EICAL-14 NOCION CONCEPTUAL DE INTEGRAL.docx','docx',2,'2023-08-29 18:17:48','2023-08-29 18:17:48'),
(27,14,'proposals/14_2023-08-29_Resumen.docx','docx',1,'2023-08-29 21:00:46','2023-08-29 21:00:46'),
(28,14,'proposals/14_2023-08-29_Extenso-evaluar.docx','docx',2,'2023-08-29 21:00:46','2023-08-29 21:00:46'),
(29,15,'proposals/15_2023-08-29_Resumen.docx','docx',1,'2023-08-29 21:17:06','2023-08-29 21:17:06'),
(30,15,'proposals/15_2023-08-29_extenso-evaluar.docx','docx',2,'2023-08-29 21:17:06','2023-08-29 21:17:06'),
(31,16,'proposals/16_2023-08-29_Resumen.docx','docx',1,'2023-08-29 22:05:19','2023-08-29 22:05:19'),
(32,16,'proposals/16_2023-08-29_Extenso-evaluar.docx','docx',2,'2023-08-29 22:05:19','2023-08-29 22:05:19'),
(33,17,'proposals/17_2023-08-29_Formato-Resumen-ponencia-EICAL-14.docx','docx',1,'2023-08-29 22:05:26','2023-08-29 22:05:26'),
(34,17,'proposals/17_2023-08-29_Formato-extenso-evaluacion-EICAL-14.docx','docx',2,'2023-08-29 22:05:26','2023-08-29 22:05:26'),
(35,18,'proposals/18_2023-08-29_Formato-Resumen-ponencia-EICAL-14_Yocelyn.docx','docx',1,'2023-08-29 23:20:36','2023-08-29 23:20:36'),
(36,18,'proposals/18_2023-08-29_Formato-extenso-evaluacion-EICAL-14_Yocelyn.docx','docx',2,'2023-08-29 23:20:36','2023-08-29 23:20:36');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_06_07_152938_create_roles_table',1),
(2,'2014_10_12_000000_create_users_table',1),
(3,'2014_10_12_100000_create_password_reset_tokens_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2023_07_02_230908_create_projects_table',1),
(7,'2023_07_02_231359_create_projectsusers_table',1),
(8,'2023_07_02_231730_create_files_table',1),
(9,'2023_07_02_231805_create_authors_table',1),
(10,'2023_07_03_231205_create_evaluations_table',1),
(11,'2023_07_13_194133_create_workshops_table',1),
(12,'2023_07_13_194225_create_workshopattendances_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `preattendances` */

DROP TABLE IF EXISTS `preattendances`;

CREATE TABLE `preattendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `presentation_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preattendances_presentation_id_foreign` (`presentation_id`),
  KEY `preattendances_user_id_foreign` (`user_id`),
  CONSTRAINT `preattendances_presentation_id_foreign` FOREIGN KEY (`presentation_id`) REFERENCES `presentations` (`id`),
  CONSTRAINT `preattendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `preattendances` */

/*Table structure for table `presentations` */

DROP TABLE IF EXISTS `presentations`;

CREATE TABLE `presentations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pro_users` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assistance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presentations_pro_users_foreign` (`pro_users`),
  CONSTRAINT `presentations_pro_users_foreign` FOREIGN KEY (`pro_users`) REFERENCES `projects_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `presentations` */

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tracking_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thematic_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`tracking_key`,`modality`,`title`,`thematic_area`,`status`,`created_at`,`updated_at`) values 
(1,'trakingkey','P','Proyecto de prueba','U',2,'2023-07-31 14:06:00','2023-08-28 18:50:34'),
(3,'trakingkey','P','Titulo de prueba','STEM',3,'2023-08-10 14:31:57','2023-08-30 16:55:51'),
(4,'trakingkey','C','Titulo de prueba','HM',2,'2023-08-10 14:37:52','2023-08-28 20:11:47'),
(5,'trakingkey','P','Titulo de prueba','STEM',1,'2023-08-10 16:21:53','2023-08-10 16:21:53'),
(6,'pon-20230815-6','P','Noción Conceptual de Integral Mediante un Curso Virtual en el Bachillerato','P',1,'2023-08-15 23:15:58','2023-08-15 23:15:58'),
(7,'pon-20230820-7','P','TAREAS DE MODELIZACIÓN MATEMÁTICA PARA LA CONSTRUCCIÓN DE ALBERCAS A ESCALA. UN ESTUDIO CON ESTUDIANTES DE INGENIERÍA CIVIL','U',1,'2023-08-20 14:22:40','2023-08-20 14:22:40'),
(8,'pon-20230825-8','P','SECUENCIA DIDÁCTICA PARA EL APRENDIZAJE DEL TEOREMA DE TALES EN EL BACHILLERATO CON UN ENFOQUE EN SUS PROPIEDADES GEOMÉTRICAS','P',1,'2023-08-25 20:32:38','2023-08-25 20:32:38'),
(9,'pon-20230828-9','P','Un experimento de enseñanza que integra modelación matemática usando recursos digitales en la formación de futuros profesores de ciencias naturales','U',1,'2023-08-28 15:12:46','2023-08-28 15:12:47'),
(10,'pon-20230829-10','P','Geogebra como herramienta tecnológica para calcular volúmenes de objetos reales.','U',1,'2023-08-29 12:35:09','2023-08-29 12:36:57'),
(12,'pon-20230829-12','P','CONCEPCIONES Y DIFICULTADES DE LOS ESTUDIANTES DE INGENIERÍA CON RESPECTO A LA INTEGRAL DEFINIDA.','U',1,'2023-08-29 13:00:58','2023-08-29 13:00:58'),
(13,'pon-20230829-13','P','Noción Conceptual de Integral Mediante un Curso Virtual en el Bachillerato','P',1,'2023-08-29 18:17:47','2023-08-29 18:17:47'),
(14,'pon-20230829-14','P','DESARROLLO DEL PENSAMIENTO Y LENGUAJE VARIACIONAL CON ENFOQUE STEAM: UN MARCO DE REFERENCIA PARA LA FUNCIÓN EXPONENCIAL','STEM',1,'2023-08-29 21:00:45','2023-08-29 21:00:46'),
(15,'pon-20230829-15','P','MODELACIÓN Y REPRESENTACIÓN PARAMÉTRICA DEL MOVIMIENTO EN EL AULA DE MATEMÁTICAS','U',1,'2023-08-29 21:17:05','2023-08-29 21:17:05'),
(16,'pon-20230829-16','P','UNA PROPUESTAS DIDÁCTICAS PARA FAVORECER EL APRENDIZAJE DE LA INTEGRAL CON EL EMPLEO DE LA MODELACIÓN DE UN FENÓMENO FÍSICO.','U',1,'2023-08-29 22:05:18','2023-08-29 22:07:05'),
(17,'pon-20230829-17','P','Estrategias de generalización en patrones lineales por profesores de matemáticas','B',1,'2023-08-29 22:05:26','2023-08-29 22:05:26'),
(18,'pon-20230829-18','P','Diseño de una secuencia didáctica económico – matemática mediante el ABP para el desarrollo de las competencias profesionales en estudiantes de ingeniería de segundo semestre del ITST','U',1,'2023-08-29 23:20:35','2023-08-29 23:20:35');

/*Table structure for table `projects_users` */

DROP TABLE IF EXISTS `projects_users`;

CREATE TABLE `projects_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_users_project_id_foreign` (`project_id`),
  KEY `projects_users_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `projects_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects_users` */

insert  into `projects_users`(`id`,`project_id`,`user_id`,`created_at`,`updated_at`) values 
(1,1,9,'2023-07-31 14:06:00','2023-07-31 14:06:00'),
(3,3,21,'2023-08-10 14:31:58','2023-08-10 14:31:58'),
(4,4,22,'2023-08-10 14:37:53','2023-08-10 14:37:53'),
(5,5,24,'2023-08-10 16:21:54','2023-08-10 16:21:54'),
(6,6,25,'2023-08-15 23:15:58','2023-08-15 23:15:58'),
(7,7,27,'2023-08-20 14:22:41','2023-08-20 14:22:41'),
(8,8,28,'2023-08-25 20:32:39','2023-08-25 20:32:39'),
(9,9,29,'2023-08-28 15:12:47','2023-08-28 15:12:47'),
(10,10,26,'2023-08-29 12:35:11','2023-08-29 12:35:11'),
(12,12,30,'2023-08-29 13:00:59','2023-08-29 13:00:59'),
(13,13,25,'2023-08-29 18:17:48','2023-08-29 18:17:48'),
(14,14,31,'2023-08-29 21:00:46','2023-08-29 21:00:46'),
(15,15,33,'2023-08-29 21:17:06','2023-08-29 21:17:06'),
(16,16,34,'2023-08-29 22:05:19','2023-08-29 22:05:19'),
(17,17,32,'2023-08-29 22:05:27','2023-08-29 22:05:27'),
(18,18,35,'2023-08-29 23:20:36','2023-08-29 23:20:36');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'admin','2023-08-01 00:23:05','2023-08-01 00:23:05'),
(2,'evaluador','2023-08-01 00:23:05','2023-08-01 00:23:05'),
(3,'postulante','2023-08-01 00:23:05','2023-08-01 00:23:05'),
(4,'Público General','2023-08-01 00:23:05','2023-08-01 00:23:05'),
(5,'Invitado Especial','2023-08-01 00:23:05','2023-08-01 00:23:05');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `alternative_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`app`,`apm`,`photo`,`alternative_contact`,`email`,`email_verified_at`,`password`,`phone`,`country`,`state`,`municipality`,`rol_id`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','-','CINVESTAV','default.jpg','Mtro','admin@cinvestav.com',NULL,'$2y$10$aFwB.qaz2KAtNqLKlGSQzudFRNMlOPosjKBaXBXdwgDfsnPRZM0Na','0000000000','México','México','Toluca',1,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(2,'Admin2','-','CINVESTAV','default.jpg','Mtro','edu@cinvestav.com',NULL,'$2y$10$E7NxeASOp5hMaJrQ3VrufuUmeWUhqS2vdAYExUdW4c0Ym8b1BrR1G','0000000000','México','México','Toluca',1,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(3,'Juez 1','-','CINVESTAV','default.jpg','Mtro','juez1@cinvestav.com',NULL,'$2y$10$opePPQ.ilEN150Z2FYXanOjb9.EFDAATOkPebe6eX29BKptSAHg1C','0000000000','México','México','Toluca',2,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(4,'Juez 2','-','CINVESTAV','default.jpg','Mtro','juez2@cinvestav.com',NULL,'$2y$10$1pXjN.WHKBDSNNBywRXVlepsMgeX6mUuEUivgCX4CihXV/tkCDV0u','0000000000','México','México','Toluca',2,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(5,'Juez 3','-','CINVESTAV','default.jpg','Mtro','juez3@cinvestav.com',NULL,'$2y$10$nHClOf7Npdv1JazQjBR0Y.O6mRgPgzXaWlkMGMTlZLqKFWG2DmxUq','0000000000','México','México','Toluca',2,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(6,'Ponente','-','CINVESTAV','default.jpg','contact@cinvestav.com','user@cinvestav.com',NULL,'$2y$10$nEd5A3R/tUjAhrXabVRDW.MgxKwEfMoo0DWchVzN0UZaKkDlo.YDC','0000000000','México','México','Toluca',3,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(7,'Publico General','-','CINVESTAV','default.jpg','contact@cinvestav.com','publico@cinvestav.com',NULL,'$2y$10$wkow7zI7QL3W212MnfADz.6z1v37Y61EW8mrW/aJ/zLqxG82muwsi','0000000000','México','México','Toluca',4,NULL,NULL,'2023-08-01 00:23:05','2023-08-01 00:23:05'),
(8,'Usuario','Prueba','Hernandez Gonzalez','20230727135149Cinvestav.png','Licenciado','israel.hernandez@cinvestav.mx',NULL,'$2y$10$c1Qx4LJ7jqkM.uMQEwOv6OmN.yPF0z7NprSAeYYnkl36Fi1Ok.rki','5534105104','México','Ciudad de México','Gustaco A. Madero',3,'2023-07-31 10:23:54',NULL,'2023-07-27 13:51:49','2023-07-31 10:23:54'),
(9,'Israel Emmanuel','Hernández','González','20230731124332Avatar-Profile-PNG-Image-File.png','Ingeniero','correoprueba@cinvestav.mx',NULL,'$2y$10$8Jlqs.uE3bEJaIGnwQ/ZkuJ9R.hMBGU/F/jp.i.hX9L8MJp63CqUm','5521779392','México','Ciudad de México','Gustavo A. Madero',3,NULL,NULL,'2023-07-31 12:43:32','2023-07-31 12:43:32'),
(10,'Lilia','Alanís','López',NULL,'Doctorado','lilia.alanis.lopez@gmail.com',NULL,'$2y$10$0vtLCDyECt1HIBJzL47MauiITbnKIrM0H61d.PnRPBsRci5CjyRMS','8115105249','MÉXICO','Nuevo León','San Nicolás de los Garza',2,NULL,NULL,'2023-08-10 11:11:09','2023-08-10 11:11:09'),
(12,'Israel Emmauel','Hernández','Hernandez Gonzalez',NULL,'Doctorado','israel0304@gmail.com',NULL,'$2y$10$bTJO/O9SmdhMSTz.coFUI.S0vdEjqo67CnUZ6xtH.bTHwWqea2Fwe','5521779392','México','Ciudad de México','Gustavo A. Madero',2,NULL,NULL,'2023-08-10 11:15:08','2023-08-28 14:29:13'),
(13,'Elizabeth','Guajardo','García',NULL,'Doctorado','elizabeth.guajardo@gmail.com',NULL,'$2y$10$8dRtfy1t6aPR5tLewLDm6eizCNtM3c2XOf8OoFMm0Z9Wj9rbCJG5W','8111700022','MÉXICO','Nuevo León','San Nicolás de los Garza',2,NULL,NULL,'2023-08-10 11:20:00','2023-08-10 11:20:00'),
(14,'Miguel Ángel','Martínez','Martínez',NULL,'Doctorado','mangel_mtz@yahoo.com.mx',NULL,'$2y$10$D4uXkpfSg4SzJsL4ptXfYeUorULxr9B5bIOKjuyPHbo31cEka0wfC','8126231243','MÉXICO','Nuevo León','San Nicolás de los Garza',2,NULL,NULL,'2023-08-10 11:23:42','2023-08-10 11:23:42'),
(15,'Lilia','López','Vera',NULL,'Doctorado','lilia_lopez@hotmail.com',NULL,'$2y$10$iI6hG4H/123RV/qUuyQDh.nH7lIQCEW0U9vzo1AuKoaeJ//iyMHwi','8120305324','MÉXICO','Nuevo León','San Nicolás de los Garza',2,NULL,NULL,'2023-08-10 11:27:52','2023-08-10 11:27:52'),
(16,'Alfredo','Alanís','Durán',NULL,'Doctorado','aalanis56@hotmail.com',NULL,'$2y$10$37.45YbWVLRyIQGX2JN2AOEiQs4.8r/wsLtUwXsbXoiRs78Bj01sa','8120305324','MÉXICO','Nuevo León','San Nicolás de los Garza',2,NULL,NULL,'2023-08-10 11:35:37','2023-08-10 11:35:37'),
(17,'Eduardo','Briceño','Solis',NULL,'Doctorado','ebriceno@uaz.edu.mx',NULL,'$2y$10$J5S.6/Ytk724Q9wXRcNXkOGfFnEziNhtlRda63Tyjqo75xpETO3GC','4921711200','MÉXICO','Zacatecas','Guadalupe',2,NULL,NULL,'2023-08-10 11:37:17','2023-08-10 11:37:17'),
(18,'Judith Alejandra','Hernández','Sánchez',NULL,'Doctorado','judith700@hotmail.com',NULL,'$2y$10$j2QEKeUcwQfV/X2XEo5areMSe0hZJid6Cke9t.ELVdML8hTPTCQne','4921433396','MÉXICO','Zacatecas','Zacatecas',2,NULL,NULL,'2023-08-10 11:38:54','2023-08-10 11:38:54'),
(19,'José Luis','Díaz','Gómez',NULL,'Doctorado','joseluis.diaz@unison.mx',NULL,'$2y$10$uuUGyVo7OuKuTJpXPfKUSO/wiTFS4yexr5v8Bbs4uniHgcWWbfaOq','6621143986','MÉXICO','Sonora','Hermosillo',2,NULL,NULL,'2023-08-10 11:40:08','2023-08-10 11:40:08'),
(21,'Ponente1','Prueba','Prueba','20230810141551Avatar-Profile-PNG-Image-File.png','ponente@prueba.com','ponente1@prueba.com',NULL,'$2y$10$xPLtbeTJZi8YuMKussKB7ueIM1VoWrwfuBndUovRMALLdwvR0Nvoq','5512345678','México','México','México',3,NULL,NULL,'2023-08-10 14:15:52','2023-08-10 14:15:52'),
(22,'Ponente2','Prueba','Prueba','20230810141839Avatar-Profile-PNG-Image-File.png','5512345679','ponente2@prueba.com',NULL,'$2y$10$Q554Ui8YsKeIja.cSkDlEOg3TJlbvsCrPwJzaozy30bRgQ89YDfX2','5512345678','México','Ciudad de México','Gustavo A. Madero',3,NULL,NULL,'2023-08-10 14:18:39','2023-08-10 14:18:39'),
(23,'Ponente3','Prueba','Prueba','20230810160722Avatar-Profile-PNG-Image-File.png','5512345671','ponente3@prueba.com',NULL,'$2y$10$qsf4vU58IKluJEGxvNLReu5.rlqUou/VozNSHKR2Nin6yXwQdlpEC','5512345678','Mexico','Mexico','Mexico',3,NULL,NULL,'2023-08-10 16:07:22','2023-08-10 16:07:22'),
(24,'Ponente4','Prueba','Prueba','20230810161947Avatar-Profile-PNG-Image-File.png','5512345673','ponente4@prueba.com',NULL,'$2y$10$JSUyLJXUpBmzIAoFDqjnNufTD.g8IS8LBePZ.yTzRAauJiEAvn7fi','5512345678','Mexico','Mexico','Mexico',3,NULL,NULL,'2023-08-10 16:19:47','2023-08-10 16:19:47'),
(25,'HELI','HERRERA','LOPEZ','20230814105309HeliHerrera.jpg','2281567198','heli683@hotmail.com',NULL,'$2y$10$TShYgMKP/ztdNHUpVoaRSuZJZGMzum.gXPopYUNDt.CeC4NHUQ1iW','2281401974','MEXICO','VERACRUZ','XALAPA',3,NULL,NULL,'2023-08-14 10:53:09','2023-08-14 10:53:09'),
(26,'Sonia Guadalupe','Anguiano','Rostro','20230816185819WhatsApp Image 2023-08-16 at 6.52.52 PM.jpeg','srostro@hotmail.com','srostro@hotmail.com',NULL,'$2y$10$AMxCY1ctNAxK4qrsRT4RSeHgt6hRkcxyoIguxG98jctr3t79G804m','8115779823','México','Nuevo León','Juárez',3,NULL,NULL,'2023-08-16 18:58:19','2023-08-16 18:58:19'),
(27,'Francisco Agustín','Zúñiga','Coronel','20230820133455Foto Mtro. Francisco.jpg','paco_teopis@hotmail.com','maestro_coronel@hotmail.com',NULL,'$2y$10$vKQ/9IutwyxtmTqr1DRRpOzRLu.o0n00stKtrKgjKjR5t2TF0p69K','9612333289','México','Chiapas','Teopisca',3,NULL,NULL,'2023-08-20 13:34:55','2023-08-20 13:34:55'),
(28,'Maria Susana','Dominguez','Felix','20230825194931Foto_Susana Dominguez_ponencia.jpg','6621458815','susi.rvm@gmail.com',NULL,'$2y$10$CZjN2EgmHjyu79/EqvGVee1KOJ9VA/WLNLIJS3mbuT0rWZ1b36aNi','6624522808','México','Sonora','Hermosillo',3,NULL,NULL,'2023-08-25 19:49:32','2023-08-25 19:49:32'),
(29,'Jimmy Alexander','Uribe','Carreño','20230828103907IMG_20230623_093732.jpg','jimmy.uribe@correounivalle.edu.co','jimmy.uribe@correounivalle.edu.co',NULL,'$2y$10$baYnKTh8.Cp5PxPtIthGdO7Ik/I6Q9sSNywbo8t2CLQEjBNaxe/pG','+573187673714','Colombia','Valle del Cauca','Cali',3,NULL,NULL,'2023-08-28 10:39:07','2023-08-28 10:39:07'),
(30,'María Mercedes','Chacara','Montes','20230829112253foto ponente.jpg','mercedes.chacara@unison.mx','mercedes.chacara@unison.mx',NULL,'$2y$10$XB9Ap0Zy8ci26EUVBw6k.eLkdhWCLoNoGbbe2Io3Zxce.A73Xm1EW','6624742908','Mexico','Sonora','Hermosillo',3,NULL,NULL,'2023-08-29 11:22:53','2023-08-29 11:22:53'),
(31,'Luis Carlos','Mercado','Martinez','20230829204310luis.jpg','luisc10mercado@gmail.com','luisc10mercado@gmail.com',NULL,'$2y$10$IUxmwqVjyyyD0Ec9zrUeP.0I2ItVxolSx6IIyE8viqunzM78a9ISe','4922893872','México','Zacatecas','Zacatecas',3,NULL,NULL,'2023-08-29 20:43:10','2023-08-29 20:43:10'),
(32,'Guadalupe','Cabañas-Sánchez',NULL,'20230829205530GCabañas foto.jpeg','gcabanas@uagro.mx','gcabanas@uagro.mx',NULL,'$2y$10$EuiHmWnpbU/0mWofbIuC2uigHOiKQGh94.4dXJ2dnSZ9NWTFZGmN6','7471211532','México','GUERRERO','Chilpancingo',3,NULL,NULL,'2023-08-29 20:55:30','2023-08-29 20:55:30'),
(33,'Janer De Jesus','Cañate','Montiel','20230829205928Fotografía.png','jannermontiel@gmail.com','jannermontiel@gmail.com',NULL,'$2y$10$b0nJYdqZPI.6PzLU16LBLOR9Aeo8qs4CHqJM5SN1aSt8NaFXMZUGW','+573012550508','México','Zacatecas','Zacatecas',3,NULL,NULL,'2023-08-29 20:59:28','2023-08-29 20:59:28'),
(34,'Frank','Tápanes','Ramos','20230829215641foto.jpeg','22404017@uagro.mx','22404017@uagro.mx',NULL,'$2y$10$0mC/h9/3Zj6UK3c2q6DBz.8wyyYZeMaIOAAvq5b6z5746rcNe7ZZi','7471614192','México','Guerrero','Chilpancingo de los Bravos',3,NULL,NULL,'2023-08-29 21:56:41','2023-08-29 21:56:41'),
(35,'Yocelyn','Espinoza de los Monteros','Ortiz','20230829230225YOCELYN.jpg','yocelyn.eo@teziutlan.tecnm.mx','yocelyn.eo@teziutlan.tecnm.mx',NULL,'$2y$10$rZZR0e5/josQF1fi1FQDfO018nWj3DQzW6XE3CYNld3L1kaaS1GGe','2311518009','México','Puebla','Teziutlán',3,NULL,NULL,'2023-08-29 23:02:26','2023-08-29 23:02:26'),
(36,'Usuario1','Prueba','Prueba','default.jpg','5512345679','usuario1@correo.com',NULL,'$2y$10$3zCGzPUp.VPoMSKbxB9hU.nOtIpgP2DOt5nPZFlIdmXDQsF4KyXbG','5512345678','México','México','México',4,NULL,NULL,'2023-08-30 10:30:28','2023-08-30 10:30:28');

/*Table structure for table `workshopattendances` */

DROP TABLE IF EXISTS `workshopattendances`;

CREATE TABLE `workshopattendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `workshop_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workshopattendances_workshop_id_foreign` (`workshop_id`),
  KEY `workshopattendances_user_id_foreign` (`user_id`),
  CONSTRAINT `workshopattendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `workshopattendances_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `workshopattendances` */

/*Table structure for table `workshops` */

DROP TABLE IF EXISTS `workshops`;

CREATE TABLE `workshops` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nameu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `assistance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `workshops` */

insert  into `workshops`(`id`,`nameu`,`title`,`activity`,`date`,`hour`,`site`,`status`,`level`,`participants`,`part`,`assistance`,`created_at`,`updated_at`) values 
(1,'Dra. Magally Martínez Reyes, Dr. Miguel Delgado Pineda, Dr. Armando Cuevas Vallejo','T1: Enfoque didáctico para dinamizar un aula de forma lúdica y experimental para educación básica','4','2023-09-20','08:30:00','Por definir',1,'Secundaria, Primaria',25,0,'Presencial','2023-08-30 10:38:42','2023-08-30 10:44:45'),
(2,'Dra. Magally Martínez Reyes, Dr. Miguel Delgado Pineda, Dr. Armando Cuevas Vallejo','T1: Enfoque didáctico para dinamizar un aula de forma lúdica y experimental para educación básica','4','2023-09-21','08:00:00','Por definir',1,'Secundaria, Primaria',25,0,'Presencial','2023-08-30 10:43:50','2023-08-30 10:43:50'),
(3,'Dr. José Rigoberto Gabriel Argüelles, Dra. Eloisa Benitez','T2: Visualizaciones de algunos conceptos de Cálculo con el uso de la tecnología','4','2023-09-18','16:00:00','Por definir',1,'Medio Superior, Superior',30,0,'Presencial','2023-08-30 10:46:52','2023-08-30 10:46:52'),
(4,'Dr. José Ismael Arcos Quezada','T3: El primer curso de Cálculo, para estudiantes de ingeniería, no centrado en el límite','4','2023-09-18','16:00:00','Por definir',1,'Superior',20,0,'Presencial','2023-08-30 10:48:25','2023-08-30 10:48:25'),
(5,'M. en C. Sofía Paz Rodríguez, M. en C. Sofía Paz Rodríguez','T4: Diseño de tareas con apoyo de tecnología digital, un prototipo para la construcción de EDVI’s','4','2023-09-18','16:00:00','Por definir',1,'Medio Superior',25,0,'Presencial','2023-08-30 10:56:22','2023-08-30 10:56:22'),
(6,'Dra. Lilia Patricia Aké','T5: Diseñando mis primeros patrones figurales.','4','2023-09-18','16:00:00','Por definir',1,'Secundaria, Medio Superior',15,0,'Presencial','2023-08-30 10:57:53','2023-08-30 10:57:53'),
(7,'Dra. María Gudalupe Simón Ramos,  Dra. Patricia Lamadrid González, Dra. Yolanda Chávez Ruiz','T6: Equidad de género en el aula de matemáticas. Cómo lograrla desde la propuesta de la nueva escuela mexicana','4','2023-12-18','16:00:00','Por definir',1,'Secundaria, Medio Superior',25,0,'Virtual','2023-08-30 11:01:10','2023-08-30 11:01:10'),
(8,'Dr. Luc Trouche, Dr. José Orozco Santiago','T7: Enseñanza del cálculo: elección de situaciones, elección de orquestación','4','2023-09-19','16:00:00','Por definir',1,'Medio Superior',30,0,'Presencial','2023-08-30 11:03:00','2023-08-30 11:03:00'),
(9,'M. en C. Jesús Esteban Ponce García','T8: Uso de la tecnología escolar de Casio para la noción intuitiva de límite.','4','2023-09-19','16:00:00','Por definir',1,'Medio Superior, Superior',25,0,'Presencial','2023-08-30 11:05:28','2023-08-30 11:05:28'),
(10,'M. en C. Mauricio Flores Nicolás, Dr. Felipe de Jesús Matías Torres, Dra. Magally Martínez Reyes','T9: ¿Cómo utilizar la tecnología en la educación? Adaptando la innovación a las necesidades educativas','4','2023-09-19','16:00:00','Por definir',1,'Secundaria, Medio Superior',30,0,'Presencial','2023-08-30 11:07:27','2023-08-30 11:07:27'),
(11,'Dra. María del Socorro Valero Cázarez','T10: Un Acercamiento STEM a la matemática del cambio y la variación','4','2023-09-19','16:00:00','Por definir',1,'Secundaria, Medio Superior, Superior',15,0,'Presencial','2023-08-30 11:08:50','2023-08-30 11:08:50'),
(12,'Dr. Gustavo Martínez Sierra','T11: El concepto derivada a partir del concepto de velocidad instantánea con herramientas digitales.','4','2023-09-19','16:00:00','Por definir',1,'Medio Superior, Superior',15,0,'Prsencial/Virtual','2023-08-30 11:10:05','2023-08-30 11:10:05'),
(13,'Dra. Beatriz Adriana Rodríguez González, Dr. Héctor Durán Muñoz','T12: Implementación de tareas de probabilidad para detección de errores de estudiantes universitarios','4','2023-09-19','16:00:00','Por definir',1,'Superior',20,0,'Virtual','2023-08-30 11:12:48','2023-08-30 11:12:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
