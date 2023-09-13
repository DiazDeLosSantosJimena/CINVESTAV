/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.28-MariaDB : Database - cinvestav3
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cinvestav3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `cinvestav3`;

/*Table structure for table `authors` */

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `app` varchar(50) NOT NULL,
  `apm` varchar(50) NOT NULL,
  `institution_of_origin` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authors_project_id_foreign` (`project_id`),
  CONSTRAINT `authors_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `authors` */

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
  `status` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_user_id_foreign` (`user_id`),
  KEY `evaluations_project_user_foreign` (`project_user`),
  CONSTRAINT `evaluations_project_user_foreign` FOREIGN KEY (`project_user`) REFERENCES `projects_users` (`id`),
  CONSTRAINT `evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `evaluations` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_project_id_foreign` (`project_id`),
  CONSTRAINT `files_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `files` */

insert  into `files`(`id`,`project_id`,`name`,`type`,`created_at`,`updated_at`) values
(1,1,'proposals/1_2023-07-04_Formato-Resumen-ponencia-EICAL-13.docx','docx','2023-07-04 15:13:53','2023-07-04 15:13:53'),
(2,1,'proposals/1_2023-07-04_Formato-extenso-evaluacion-EICAL-13.docx','docx','2023-07-04 15:13:53','2023-07-04 15:13:53'),
(3,2,'proposals/2_2023-07-04_Formato-Resumen-ponencia-EICAL-13.docx','docx','2023-07-04 15:15:48','2023-07-04 15:15:48'),
(4,2,'proposals/2_2023-07-04_tortugas-ninja.jpg','jpg','2023-07-04 15:15:48','2023-07-04 15:15:48'),
(5,3,'proposals/3_2023-07-04_Formato-Resumen-ponencia-EICAL-13.docx','docx','2023-07-04 16:10:01','2023-07-04 16:10:01'),
(6,3,'proposals/3_2023-07-04_tortugas-ninja.jpg','jpg','2023-07-04 16:10:01','2023-07-04 16:10:01');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10,'2023_07_03_231205_create_evaluations_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `site` varchar(255) NOT NULL,
  `assistance` varchar(255) NOT NULL,
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
  `tracking_key` varchar(255) DEFAULT NULL,
  `modality` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thematic_area` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`modality`,`title`,`thematic_area`,`sending_institution`,`status`,`created_at`,`updated_at`) values
(1,'P','PLANET PLANTS By DSM54','U','Universidad Tecnológica del Valle de Toluca',0,'2023-07-04 15:13:53','2023-07-04 15:13:53'),
(2,'C','TITAN By Ocean Gate','STEM','Harvar University',0,'2023-07-04 15:15:48','2023-07-04 15:15:48'),
(3,'C','The Travel Proyect By Spotify','STEM','Spotify',0,'2023-07-04 16:10:01','2023-07-04 16:10:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects_users` */

insert  into `projects_users`(`id`,`project_id`,`user_id`,`created_at`,`updated_at`) values
(1,1,1,'2023-07-04 15:13:53','2023-07-04 15:13:53'),
(2,2,1,'2023-07-04 15:15:48','2023-07-04 15:15:48'),
(3,3,3,'2023-07-04 16:10:01','2023-07-04 16:10:01');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values
(1,'admin','2023-07-04 14:41:54','2023-07-04 14:41:54'),
(2,'evaluador','2023-07-04 14:41:54','2023-07-04 14:41:54'),
(3,'postulante','2023-07-04 14:41:54','2023-07-04 14:41:54'),
(4,'Público General','2023-07-04 15:21:16',NULL),
(5,'Invitado Especial','2023-07-04 15:21:43',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `app` varchar(50) NOT NULL,
  `apm` varchar(50) NOT NULL,
  `academic_degree` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`app`,`apm`,`academic_degree`,`email`,`email_verified_at`,`password`,`phone`,`country`,`state`,`municipality`,`assistance`,`rol_id`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values
(1,'Admin','-','CINVESTAV','Mr','admin@cinvestav.com',NULL,'$2y$10$IdU12/k4u9uqhOlp0LxPE.ShGFOYdLnkDScxXi7jzjgNbGiRlofCK','0000000000','México','México','Toluca','p',1,NULL,NULL,'2023-07-04 14:41:54','2023-07-04 14:41:54'),
(2,'Juez 1','-','CINVESTAV','Mr','juez1@cinvestav.com',NULL,'$2y$10$OQ43oYDaEHKg1xA.nsa.6.qtstcVEf9r8szWSuSKGhG3Kxji01Z56','0000000000','México','México','Toluca','p',2,NULL,NULL,'2023-07-04 14:41:54','2023-07-04 14:41:54'),
(3,'Ponente','-','CINVESTAV','Mr','user@cinvestav.com',NULL,'$2y$10$1TqUCTf2c9jDPZfADNVe7eg0rWOkpDAF/aWtGxLQvtckw3y4CPUUC','0000000000','México','México','Toluca','p',3,NULL,NULL,'2023-07-04 14:41:54','2023-07-04 14:41:54');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
