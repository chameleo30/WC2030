CREATE DATABASE  IF NOT EXISTS `wc_2030_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `wc_2030_db`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: wc_2030_db
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES ('admin','admin',NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designation` (`designation`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Maillots Nationaux','Maillots officiels des équipes nationales pour supporters passionnés.',NULL,NULL),(2,'Éditions Spéciales','Maillots World Cup 2030, éditions limitées et collectors.',NULL,NULL),(3,'Tenues d’Entraînement','Tenues sportives confortables pour l’entraînement et le quotidien.',NULL,NULL),(4,'Accessoires Football','Écharpes, casquettes et accessoires pour compléter votre tenue.',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` enum('Homme','Femme') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_tel_unique` (`tel`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'El Amrani','Mohammed','1985-06-15','Homme','0600123456','Rue Hassan II, N°12','Casablanca','mohammed.elamrani@example.com','password123','elamrani.jpg',NULL,NULL),(2,'Bennani','Fatima','1990-11-23','Femme','0600654321','Avenue Moulay Youssef, N°7','Rabat','fatima.bennani@example.com','password456','bennani.jpg',NULL,NULL),(3,'Ouazzani','Youssef','1988-04-09','Homme','0600234567','Boulevard Zerktouni, N°18','Marrakech','youssef.ouazzani@example.com','password789','ouazzani.jpg',NULL,NULL),(4,'Fassi','Salma','1992-08-19','Femme','0600345678','Route de Fès, N°3','Fès','salma.fassi@example.com','passwordabc','fassi.jpg',NULL,NULL),(5,'El Yousfi','Ahmed','1983-12-05','Homme','0600456789','Quartier des Oudayas, N°14','Tanger','ahmed.elyousfi@example.com','passworddef','elyousfi.jpg',NULL,NULL),(44,'amahane','abdelmoula','2000-11-30','Homme','0625586079','279 Boulevard Bir Anzarane, 20250','Casablanca','abdelmoula.amahane@etud.iga.ac.ma','abdo1234','abdelmoula.png','2024-09-12 22:46:42','2024-10-03 11:29:41'),(47,'amahane','abdelmoula','2000-11-30','Homme','0625586080','oulfa hayhassani','casablanca','chameleo04@gmail.com','123456',NULL,'2026-02-05 01:22:34','2026-02-05 01:22:34'),(48,'landarouche','ikrame','2002-11-04','Femme','0707951482','ain chock','casablanca','ikraam.landarouche@gmail.com','ikramfenna','WIN_20260207_16_43_46_Pro.jpg','2026-02-07 16:25:50','2026-02-07 16:25:50');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commandes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `clients_id` bigint unsigned NOT NULL,
  `date_commande` date NOT NULL DEFAULT '2024-09-10',
  `heure_commande` time NOT NULL DEFAULT '22:54:52',
  `adresse_livraison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandes_clients_id_foreign` (`clients_id`),
  CONSTRAINT `commandes_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandes`
--

LOCK TABLES `commandes` WRITE;
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
INSERT INTO `commandes` VALUES (21,44,'2024-09-24','22:39:57','279 Boulevard Bir Anzarane, Casablanca 20250',490.00,'2024-09-24 21:39:57','2024-09-24 21:39:57'),(22,44,'2024-09-29','15:53:58','279 Boulevard Bir Anzarane, 20250',176.00,'2024-09-29 14:53:58','2024-09-29 14:53:58'),(23,44,'2024-10-02','15:15:20','279 Boulevard Bir Anzarane, 20250',540.00,'2024-10-02 14:15:21','2024-10-02 14:15:21'),(26,44,'2024-11-29','21:14:04','279 Boulevard Bir Anzarane, 20250',68.00,'2024-11-29 20:14:04','2024-11-29 20:14:04'),(27,44,'2026-01-19','15:12:18','279 Boulevard Bir Anzarane, 20250',80.00,'2026-01-19 15:12:19','2026-01-19 15:12:19'),(28,44,'2026-01-20','01:43:13','279 Boulevard Bir Anzarane, 20250',80.00,'2026-01-20 01:43:13','2026-01-20 01:43:13'),(29,44,'2026-02-05','00:04:25','279 Boulevard Bir Anzarane, 20250',1099.96,'2026-02-04 23:04:25','2026-02-04 23:04:25'),(30,44,'2026-02-05','00:15:40','279 Boulevard Bir Anzarane, 20250',299.99,'2026-02-04 23:15:40','2026-02-04 23:15:40'),(31,44,'2026-02-05','00:39:48','279 Boulevard Bir Anzarane, 20250',959.98,'2026-02-04 23:39:49','2026-02-04 23:39:49'),(32,48,'2026-02-07','19:32:55','ain chock',529.99,'2026-02-07 18:32:56','2026-02-07 18:32:56');
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail__commandes`
--

DROP TABLE IF EXISTS `detail__commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail__commandes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `commandes_id` bigint unsigned NOT NULL,
  `produits_id` bigint unsigned NOT NULL,
  `quantite_commande` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `detail__commandes_commandes_id_produits_id_unique` (`commandes_id`,`produits_id`),
  KEY `detail__commandes_produits_id_foreign` (`produits_id`),
  CONSTRAINT `detail__commandes_commandes_id_foreign` FOREIGN KEY (`commandes_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail__commandes_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail__commandes`
--

LOCK TABLES `detail__commandes` WRITE;
/*!40000 ALTER TABLE `detail__commandes` DISABLE KEYS */;
INSERT INTO `detail__commandes` VALUES (44,29,1,1,'2026-02-04 23:04:25','2026-02-04 23:04:25'),(45,29,9,3,'2026-02-04 23:04:25','2026-02-04 23:04:25'),(46,30,21,1,'2026-02-04 23:15:40','2026-02-04 23:15:40'),(47,31,2,2,'2026-02-04 23:39:49','2026-02-04 23:39:49'),(48,32,2,1,'2026-02-07 18:32:56','2026-02-07 18:32:56');
/*!40000 ALTER TABLE `detail__commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historiques`
--

DROP TABLE IF EXISTS `historiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historiques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `clients_id` bigint NOT NULL,
  `clients_nom_email_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commandes_id` bigint NOT NULL,
  `commandes_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produits_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `produits_prix` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `produits_quantite` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `historiques_clients_id_commandes_id_unique` (`clients_id`,`commandes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiques`
--

LOCK TABLES `historiques` WRITE;
/*!40000 ALTER TABLE `historiques` DISABLE KEYS */;
INSERT INTO `historiques` VALUES (20,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',21,'2024-09-24;22:39:57;279 Boulevard Bir Anzarane, Casablanca 20250','Miel de Châtaignier Bio;','220.00;','2;',490.00,'2024-09-24 21:39:57','2024-09-24 21:39:57'),(21,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',22,'2024-09-29;15:53:58;279 Boulevard Bir Anzarane, 20250','Tomates Bio;','18.00;','7;',176.00,'2024-09-29 14:53:58','2024-09-29 14:53:58'),(22,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',23,'2024-10-02;15:15:20;279 Boulevard Bir Anzarane, 20250','Miel de Châtaignier Bio;Kiwi Bio;Oranges Bio;','220.00;35.00;30.00;','2;2;1;',540.00,'2024-10-02 14:15:21','2024-10-02 14:15:21'),(25,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',26,'2024-11-29;21:14:04;279 Boulevard Bir Anzarane, 20250','Tomates Bio;','18.00;','1;',68.00,'2024-11-29 20:14:04','2024-11-29 20:14:04'),(26,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',27,'2026-01-19;15:12:18;279 Boulevard Bir Anzarane, 20250','Oranges Bio;','30.00;','1;',80.00,'2026-01-19 15:12:19','2026-01-19 15:12:19'),(27,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',28,'2026-01-20;01:43:13;279 Boulevard Bir Anzarane, 20250','Oranges Bio;','30.00;','1;',80.00,'2026-01-20 01:43:13','2026-01-20 01:43:13'),(28,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',29,'2026-02-05;00:04:25;279 Boulevard Bir Anzarane, 20250','Maillot Maroc Domicile 2026;Trophée Miniature WC2030;','499.99;199.99;','1;3;',1099.96,'2026-02-04 23:04:25','2026-02-04 23:04:25'),(29,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',30,'2026-02-05;00:15:40;279 Boulevard Bir Anzarane, 20250','Sac de Sport World Cup 2030;','249.99;','1;',299.99,'2026-02-04 23:15:40','2026-02-04 23:15:40'),(30,44,'amahane;abdelmoula;abdelmoula.amahane@etud.iga.ac.ma;0625586079',31,'2026-02-05;00:39:48;279 Boulevard Bir Anzarane, 20250','Maillot France Domicile 2026;','479.99;','2;',959.98,'2026-02-04 23:39:49','2026-02-04 23:39:49'),(31,48,'landarouche;ikrame;ikraam.landarouche@gmail.com;0707951482',32,'2026-02-07;19:32:55;ain chock','Maillot France Domicile 2026;','479.99;','1;',529.99,'2026-02-07 18:32:56','2026-02-07 18:32:56');
/*!40000 ALTER TABLE `historiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_09_06_064728_create_clients_table',1),(5,'2024_09_06_065023_create_categories_table',1),(6,'2024_09_06_065304_create_commandes_table',1),(7,'2024_09_06_070923_create_admins_table',1),(8,'2024_09_06_091531_create_produits_table',1),(9,'2024_09_06_091900_create_detail__commandes_table',1),(10,'2024_09_08_191118_add_two_factor_columns_to_users_table',2),(11,'2024_09_08_191253_create_personal_access_tokens_table',2),(12,'2024_09_09_033228_create_detail__commandes_table',3),(13,'2024_09_10_201911_create_historiques_table',4),(14,'2024_09_10_224926_create_historiques_table',5),(15,'2024_09_10_224956_create_commandes_table',6),(16,'2024_09_10_225459_create_detail__commandes_table',7),(17,'2024_09_10_230253_create_historiques_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categories_id` bigint unsigned NOT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `prix_vente` decimal(10,2) NOT NULL,
  `unite_mesure` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite_stock` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designation` (`designation`),
  KEY `produits_categories_id_foreign` (`categories_id`),
  CONSTRAINT `produits_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (1,1,'Maillot Maroc Domicile 2026','Maillot officiel des Lions de l’Atlas, édition World Cup 2030.',499.99,'pièce',49,'maillot-maroc-domicile-2026.jpg',NULL,'2026-02-04 23:04:25'),(2,1,'Maillot France Domicile 2026','Maillot officiel de l’équipe de France pour la Coupe du Monde 2030.',479.99,'pièce',37,'maillot-france-domicile-2026.jpg',NULL,'2026-02-07 18:32:56'),(3,1,'Maillot Espagne Domicile 2026','Maillot officiel de l’équipe d’Espagne, édition collector World Cup 2030.',459.99,'pièce',30,'maillot-espagne-domicile-2026.jpg',NULL,NULL),(4,1,'Maillot Portugal Domicile 2026','Maillot officiel de l’équipe du Portugal, édition World Cup 2030.',489.99,'pièce',35,'maillot-portugal-domicile-2026.jpg',NULL,NULL),(5,1,'Maillot USA Domicile 2026','Maillot officiel de l’équipe des États-Unis pour la Coupe du Monde 2030.',469.99,'pièce',25,'maillot-usa-domicile-2026.jpg',NULL,NULL),(6,2,'Écharpe World Cup 2030','Écharpe officielle édition limitée pour supporters passionnés.',149.99,'pièce',50,'echarpe-wc2030.png',NULL,NULL),(7,2,'Casquette World Cup 2030','Casquette premium collector pour supporter officiel.',129.99,'pièce',40,'casquette-wc2030.png',NULL,NULL),(8,2,'Badge Collector World Cup 2030','Badge métallique édition limitée, idéal pour collectionneurs.',79.99,'pièce',100,'badge-wc2030.png',NULL,NULL),(9,2,'Trophée Miniature WC2030','Réplique du trophée de la Coupe du Monde 2030, édition spéciale.',199.99,'pièce',22,'trophee-mini-wc2030.png',NULL,'2026-02-04 23:04:25'),(10,2,'Poster Collector WC2030','Poster édition limitée des équipes participantes.',49.99,'pièce',75,'poster-wc2030.png',NULL,NULL),(11,3,'Survêtement Maroc 2026','Survêtement officiel pour l’entraînement des Lions de l’Atlas.',399.99,'pièce',30,'survet-maroc-2026.jpg',NULL,NULL),(12,3,'T-shirt Entraînement France','T-shirt technique de l’équipe de France pour l’entraînement.',149.99,'pièce',50,'tshirt-france-entrainement-2026.jpg',NULL,NULL),(13,3,'Short Portugal 2026','Short officiel pour les entraînements de l’équipe du Portugal.',129.99,'pièce',40,'short-portugal-2026.jpg',NULL,NULL),(14,3,'Survêtement USA 2026','Survêtement officiel pour les entraînements de l’équipe des États-Unis.',399.99,'pièce',25,'survet-usa-2026.jpg',NULL,NULL),(15,3,'T-shirt Entraînement Espagne','T-shirt technique officiel pour les entraînements de l’équipe d’Espagne.',149.99,'pièce',50,'tshirt-espagne-entrainement-2026.jpg',NULL,NULL),(16,4,'Chaussures Football Maroc 2026','Chaussures officielles pour supporter ou joueur, confort et performance.',699.99,'paire',30,'chaussures-maroc-2026.jpg',NULL,NULL),(18,4,'Protège-tibias France 2026','Protège-tibias léger et résistant, édition officielle équipe de France.',129.99,'paire',50,'protege-tibias-france.jpg',NULL,NULL),(19,4,'Gants Gardien Portugal 2026','Gants de gardien premium, adhérence maximale pour entraînement et match.',299.99,'paire',25,'gants-portugal-2026.jpg',NULL,NULL),(20,4,'Chaussettes Football USA 2026','Chaussettes techniques pour confort et performance.',79.99,'paire',60,'chaussettes-usa-2026.jpg',NULL,NULL),(21,4,'Sac de Sport World Cup 2030','Sac officiel collector pour transporter votre équipement.',249.99,'pièce',39,'sac-sport-wc2030.jpg',NULL,'2026-02-04 23:15:40');
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('M9tLaJGGZkvkVR8Kb0CzrWGwalglPVXTZNkyOgIj',NULL,'192.168.11.115','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','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',1770493446),('Ph7rKTahd7yGBD3ekXmM3rQv3VCQ3uyYM9VdRJuO',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','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',1770490803),('x4OqAIuOveeh0Bg0AHfXsPAhZCo6nURWkcUkjCeF',NULL,'192.168.11.128','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmZ0YXNoYVZabkhIQnlZejVzVndmR1VxRVJ3VktnY3RBbTNLQnhBcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xOTIuMTY4LjExLjEyODo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1770491349);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-07 23:11:19
