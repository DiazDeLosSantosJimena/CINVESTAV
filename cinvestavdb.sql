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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `authors` */

insert  into `authors`(`id`,`project_id`,`name`,`app`,`apm`,`institution_of_origin`,`state`,`created_at`,`updated_at`) values 
(1,1,'Autor 1','Ponencia','CINVESTAV','Universidad Tecnológica del Valle de Toluca','México','2023-08-22 15:49:49','2023-08-22 15:49:49'),
(2,1,'Autor 2','Ponencia','CINVESTAV','Instituto Politécnico Nacional','México','2023-08-22 15:49:49','2023-08-22 15:49:49'),
(3,1,'Autor 3','Ponencia','CINVESTAV','Universidad Autonoma del Estado de México','México','2023-08-22 15:49:49','2023-08-22 15:49:49'),
(4,2,'Autor 1','CARTEL','CINVESTAV','Universidad Tecnológica del Valle de Toluca','México','2023-08-22 15:52:03','2023-08-22 15:52:03'),
(5,2,'Autor 2','CARTEL','CINVESTAV','Instituto Politécnico Nacional','México','2023-08-22 15:52:03','2023-08-22 15:52:03'),
(6,2,'Autor 3','CARTEL','CINVESTAV','Universidad Autonoma del Estado de México','México','2023-08-22 15:52:03','2023-08-22 15:52:03'),
(10,3,'Autor 1','-','CINVESTAV','Instituto Politécnico Nacional','México','2023-08-25 13:21:44','2023-08-25 13:21:44'),
(11,3,'Autor 2','-','CINVESTAV','Universidad Autonoma del Estado de México','México','2023-08-25 13:21:44','2023-08-25 13:21:44'),
(12,4,'Autor 1','-','CINVESTAV','Universidad Autónoma de la Ciudad de México','México','2023-08-25 13:22:04','2023-08-25 13:22:04');

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

insert  into `evaluations`(`id`,`user_id`,`project_user`,`title`,`extension`,`key_words`,`abstract_keywords`,`problematic`,`theoretical`,`methodology`,`proposal`,`results`,`APA_table`,`APA_references`,`format`,`status`,`comment`,`created_at`,`updated_at`) values 
(1,3,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-25 13:33:39','2023-08-25 13:33:39'),
(2,4,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-25 13:33:47','2023-08-25 13:33:47'),
(3,5,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-25 13:33:56','2023-08-25 13:33:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `files` */

insert  into `files`(`id`,`project_id`,`name`,`type`,`archive`,`created_at`,`updated_at`) values 
(1,1,'proposals/1_2023-08-22_Formato-Resumen-ponencia-EICAL-14.docx','docx',1,'2023-08-22 15:49:49','2023-08-22 15:49:49'),
(2,1,'proposals/1_2023-08-22_Formato-extenso-evaluacion-EICAL-14.docx','docx',2,'2023-08-22 15:49:49','2023-08-22 15:49:49'),
(3,2,'proposals/2_2023-08-22_Formato-CARTEL-EICAL-14.docx','docx',1,'2023-08-22 15:52:03','2023-08-22 15:52:03'),
(4,2,'proposals/2_2023-08-22_art.jpg','jpg',2,'2023-08-22 15:52:03','2023-08-22 15:52:03'),
(5,3,'proposals/3_2023-08-25_Formato-Resumen-ponencia-EICAL-14.docx','docx',1,'2023-08-25 13:15:51','2023-08-25 13:15:51'),
(6,3,'proposals/3_2023-08-25_Formato-CARTEL-EICAL-14.docx','docx',2,'2023-08-25 13:15:51','2023-08-25 13:15:51'),
(7,4,'proposals/4_2023-08-25_Formato-CARTEL-EICAL-14.docx','docx',1,'2023-08-25 13:20:38','2023-08-25 13:20:38'),
(8,4,'proposals/4_2023-08-25_art.jpg','jpg',2,'2023-08-25 13:20:38','2023-08-25 13:20:38');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
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
(12,'2023_07_13_194225_create_workshopattendances_table',1),
(13,'2023_07_21_175904_create_presentations_table',1),
(14,'2023_07_21_181432_create_preattendances_table',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`tracking_key`,`modality`,`title`,`thematic_area`,`status`,`created_at`,`updated_at`) values 
(1,'pon-20230822-1','P','CINVESTAV - Ponencia','HM',1,'2023-08-22 15:49:49','2023-08-22 15:49:49'),
(2,'car-20230822-2','C','CINVESTAV CARTEL','P',1,'2023-08-22 15:52:03','2023-08-25 13:33:19'),
(3,'pon-20230825-3','P','CINVESTAV PRUEBA UT - Ponencia','B',1,'2023-08-25 13:15:51','2023-08-25 13:21:44'),
(4,'car-20230825-4','C','CINVESTAV PRUEBA UT - CARTEL','STEM',1,'2023-08-25 13:20:38','2023-08-25 13:22:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects_users` */

insert  into `projects_users`(`id`,`project_id`,`user_id`,`created_at`,`updated_at`) values 
(1,1,6,'2023-08-22 15:49:49','2023-08-22 15:49:49'),
(2,2,6,'2023-08-22 15:52:03','2023-08-22 15:52:03'),
(3,3,6,'2023-08-25 13:15:51','2023-08-25 13:15:51'),
(4,4,6,'2023-08-25 13:20:38','2023-08-25 13:20:38');

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
(1,'admin','2023-08-24 23:55:29','2023-08-24 23:55:29'),
(2,'evaluador','2023-08-24 23:55:29','2023-08-24 23:55:29'),
(3,'postulante','2023-08-24 23:55:29','2023-08-24 23:55:29'),
(4,'Público General','2023-08-24 23:55:29','2023-08-24 23:55:29'),
(5,'Invitado Especial','2023-08-24 23:55:29','2023-08-24 23:55:29');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `app` varchar(50) NOT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `alternative_contact` varchar(255) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`app`,`apm`,`photo`,`alternative_contact`,`email`,`email_verified_at`,`password`,`phone`,`country`,`state`,`municipality`,`rol_id`,`deleted_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','-','CINVESTAV','default.jpg','Mtro','admin@cinvestav.com',NULL,'$2y$10$NZJr4VLvwAKzO.oJtr6.gO2cX7BX.3yG1c2Iq6dDhd6mranf0vRGW','0000000000','México','México','Toluca',1,NULL,NULL,'2023-08-24 23:55:29','2023-08-24 23:55:29'),
(2,'Admin2','-','CINVESTAV','default.jpg','Mtro','edu@cinvestav.com',NULL,'$2y$10$4oRBiVhpztRq6mBuomc1wOjioA0fDekAJxVS6EGgv4I0NZnSs7wn6','0000000000','México','México','Toluca',1,NULL,NULL,'2023-08-24 23:55:29','2023-08-24 23:55:29'),
(3,'Juez 1','-','CINVESTAV','default.jpg','Mtro','juez1@cinvestav.com',NULL,'$2y$10$JUktu5lFR2SV1kHl5ed.COjqegYKAiooExKLRFWyWBsuNXOkMuFaS','0000000000','México','México','Toluca',2,NULL,NULL,'2023-08-24 23:55:30','2023-08-24 23:55:30'),
(4,'Juez 2','-','CINVESTAV','default.jpg','Mtro','juez2@cinvestav.com',NULL,'$2y$10$mHiZarjVML9rM/3A7RVBNuGuTdmCeXg9A0GnzigsBKtakysUDHslK','0000000000','México','México','Toluca',2,NULL,NULL,'2023-08-24 23:55:30','2023-08-24 23:55:30'),
(5,'Juez 3','-','CINVESTAV','default.jpg','Mtro','juez3@cinvestav.com',NULL,'$2y$10$9YrkBmze2H4GNpR8C6aDge9.HnkzSA6CDvK1bFmuFBYHCa6YSlxdy','0000000000','México','México','Toluca',2,NULL,NULL,'2023-08-24 23:55:30','2023-08-24 23:55:30'),
(6,'Ponente','-','CINVESTAV','default.jpg','contact@cinvestav.com','user@cinvestav.com',NULL,'$2y$10$BU0P6JB5wsUJnKS4C2t9r.BAy7wgznUQE8KTDCcUhVmG9FvgkObPK','0000000000','México','México','Toluca',3,NULL,NULL,'2023-08-24 23:55:30','2023-08-24 23:55:30'),
(7,'Jossue','Alejandro','Candelas','20230824203409ponente.png','jossueale02@hotmail.com','jossueale@hotmail.com',NULL,'$2y$10$W8XlY9BHdx3dh0CgDD9Hp.zKY9SfMhnkB2uCKd4rfjY6bQbZriBYm','7293579266','México','México','Toluca',3,NULL,NULL,'2023-08-24 23:55:30','2023-08-24 23:55:30'),
(8,'Publico General','-','CINVESTAV','default.jpg','contact@cinvestav.com','publico@cinvestav.com',NULL,'$2y$10$fjLX3./Wt1J3VIuBxLvuKuZaQWAX70K2cATWTF4EzC/KWTT0xfoma','0000000000','México','México','Toluca',4,NULL,NULL,'2023-08-24 23:55:30','2023-08-24 23:55:30'),
(9,'Jimena','de los Santos','Diaz','default.jpg','jimena.diaz@utvtol.edu.mx','al222110707@gmail.com',NULL,'$2y$10$qKjp7jHSIPo7wgWUFyC/auZNnA0vAXATbVhE7.FlsUPKOSdgmdLLG','7222222222','México','México','Xonacatlan',4,NULL,NULL,'2023-08-25 13:12:43','2023-08-25 13:12:43');

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
  `nameu` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `site` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `level` varchar(255) NOT NULL,
  `participants` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `assistance` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `workshops` */

insert  into `workshops`(`id`,`nameu`,`title`,`activity`,`date`,`hour`,`site`,`status`,`level`,`participants`,`part`,`assistance`,`created_at`,`updated_at`) values 
(1,'Dr. Miguel Delgado, UNED, España\r\nDr. Carlos Armando Cuevas Vallejo, Cinvestav, México\r\nDra. Magally Martínez Reyes, UAEM','T1- Enfoque didáctico para dinamizar un aula de forma lúdica y experimental para educación básica','3','2010-09-17','02:58:00','Auditorio 1',1,'Superior',30,0,'Virtual','2023-08-24 22:37:04','2023-08-25 14:11:48'),
(2,'Dr. José Rigoberto Gabriel Argüelles, Dra. Eloísa Benítez Mariño, Universidad Veracruzana','T2- Visualizaciones de algunos conceptos de cálculo con el uso de tecnología','3','1970-04-09','01:04:00','Auditorio 2',1,'Medio superior',20,0,'Presencial','2023-08-24 22:37:20','2023-08-25 00:32:35'),
(3,'Dr. José Ismael Arcos Quezada, UAEMex','T3 - El primer curso de Cálculo, para estudiantes de ingeniería, no centrado en el límite','4','2007-09-15','21:01:00','Auditorio 3',1,'Secundaria',5,0,'Virtual','2023-08-24 22:37:45','2023-08-25 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
