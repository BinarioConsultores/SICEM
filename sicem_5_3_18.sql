-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sicem
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_01_11_123609_creartablacementerio',1),(4,'2018_01_11_123706_creartablapabellon',1),(5,'2018_01_11_123735_creartablanicho',1),(6,'2018_01_11_123803_creartabladifunto',1),(7,'2018_01_11_123821_creartablasolicitante',1),(8,'2018_01_11_123944_creartablaservicioextra',1),(9,'2018_01_11_124003_creartablaboleta',1),(10,'2018_01_11_124004_creartablaboletadetalle',1),(11,'2018_01_11_124007_creartablacontrato',1),(12,'2018_01_11_124008_creartablatraslado',1),(13,'2018_01_11_124026_creartablaconvenio',1),(14,'2018_01_11_124101_creartablaplanpago',1),(15,'2018_01_11_124118_creartabladbppago',1),(16,'2018_01_11_124119_creartablacsextra',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_boleta`
--

DROP TABLE IF EXISTS `t_boleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_boleta` (
  `bol_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bol_nro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bol_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bol_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bol_fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_boleta`
--

LOCK TABLES `t_boleta` WRITE;
/*!40000 ALTER TABLE `t_boleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_boleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_boletadetalle`
--

DROP TABLE IF EXISTS `t_boletadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_boletadetalle` (
  `bolde_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bolde_concepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bolde_monto` decimal(8,2) NOT NULL,
  `bol_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bolde_id`),
  KEY `t_boletadetalle_bol_id_foreign` (`bol_id`),
  CONSTRAINT `t_boletadetalle_bol_id_foreign` FOREIGN KEY (`bol_id`) REFERENCES `t_boleta` (`bol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_boletadetalle`
--

LOCK TABLES `t_boletadetalle` WRITE;
/*!40000 ALTER TABLE `t_boletadetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_boletadetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cementerio`
--

DROP TABLE IF EXISTS `t_cementerio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_cementerio` (
  `cement_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cement_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cementerio`
--

LOCK TABLES `t_cementerio` WRITE;
/*!40000 ALTER TABLE `t_cementerio` DISABLE KEYS */;
INSERT INTO `t_cementerio` VALUES (1,'Sachaca','2018-02-08 23:14:01','2018-02-21 21:56:15'),(2,'Cementerio 2','2018-02-27 20:00:27','2018-02-27 20:00:27'),(3,'Arequipa','2018-03-02 19:46:24','2018-03-02 19:46:24');
/*!40000 ALTER TABLE `t_cementerio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_contrato`
--

DROP TABLE IF EXISTS `t_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_contrato` (
  `cont_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont_fecha` date NOT NULL,
  `cont_tipopago` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_concepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_tipouso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_tiempo` int(11) NOT NULL,
  `cont_monto` decimal(8,2) NOT NULL,
  `cont_diffechsep` date NOT NULL,
  `sol_id` int(10) unsigned NOT NULL,
  `dif_id` int(10) unsigned NOT NULL,
  `nicho_id` int(10) unsigned NOT NULL,
  `usu_id_reg` int(10) unsigned NOT NULL,
  `usu_id_auto` int(10) unsigned NOT NULL,
  `bolde_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cont_id`),
  KEY `t_contrato_sol_id_foreign` (`sol_id`),
  KEY `t_contrato_dif_id_foreign` (`dif_id`),
  KEY `t_contrato_nicho_id_foreign` (`nicho_id`),
  KEY `t_contrato_usu_id_reg_foreign` (`usu_id_reg`),
  KEY `t_contrato_usu_id_auto_foreign` (`usu_id_auto`),
  KEY `t_contrato_bolde_id_foreign` (`bolde_id`),
  CONSTRAINT `t_contrato_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  CONSTRAINT `t_contrato_dif_id_foreign` FOREIGN KEY (`dif_id`) REFERENCES `t_difunto` (`dif_id`),
  CONSTRAINT `t_contrato_nicho_id_foreign` FOREIGN KEY (`nicho_id`) REFERENCES `t_nicho` (`nicho_id`),
  CONSTRAINT `t_contrato_sol_id_foreign` FOREIGN KEY (`sol_id`) REFERENCES `t_solicitante` (`sol_id`),
  CONSTRAINT `t_contrato_usu_id_auto_foreign` FOREIGN KEY (`usu_id_auto`) REFERENCES `users` (`id`),
  CONSTRAINT `t_contrato_usu_id_reg_foreign` FOREIGN KEY (`usu_id_reg`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_contrato`
--

LOCK TABLES `t_contrato` WRITE;
/*!40000 ALTER TABLE `t_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_convenio`
--

DROP TABLE IF EXISTS `t_convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_convenio` (
  `conv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conv_fecha` date NOT NULL,
  `conv_cuotaini` decimal(8,2) NOT NULL,
  `conv_nrocuota` int(11) NOT NULL,
  `conv_montocuota` decimal(8,2) NOT NULL,
  `cont_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`conv_id`),
  KEY `t_convenio_cont_id_foreign` (`cont_id`),
  CONSTRAINT `t_convenio_cont_id_foreign` FOREIGN KEY (`cont_id`) REFERENCES `t_contrato` (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_convenio`
--

LOCK TABLES `t_convenio` WRITE;
/*!40000 ALTER TABLE `t_convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_csextra`
--

DROP TABLE IF EXISTS `t_csextra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_csextra` (
  `csextra_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont_id` int(10) unsigned NOT NULL,
  `sextra_id` int(10) unsigned NOT NULL,
  `bolde_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`csextra_id`),
  KEY `t_csextra_cont_id_foreign` (`cont_id`),
  KEY `t_csextra_sextra_id_foreign` (`sextra_id`),
  KEY `t_csextra_bolde_id_foreign` (`bolde_id`),
  CONSTRAINT `t_csextra_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  CONSTRAINT `t_csextra_cont_id_foreign` FOREIGN KEY (`cont_id`) REFERENCES `t_contrato` (`cont_id`),
  CONSTRAINT `t_csextra_sextra_id_foreign` FOREIGN KEY (`sextra_id`) REFERENCES `t_servicioextra` (`sextra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_csextra`
--

LOCK TABLES `t_csextra` WRITE;
/*!40000 ALTER TABLE `t_csextra` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_csextra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_dbppago`
--

DROP TABLE IF EXISTS `t_dbppago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_dbppago` (
  `dbpp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ppago_id` int(10) unsigned NOT NULL,
  `bolde_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dbpp_id`),
  KEY `t_dbppago_ppago_id_foreign` (`ppago_id`),
  KEY `t_dbppago_bolde_id_foreign` (`bolde_id`),
  CONSTRAINT `t_dbppago_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  CONSTRAINT `t_dbppago_ppago_id_foreign` FOREIGN KEY (`ppago_id`) REFERENCES `t_planpago` (`ppago_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_dbppago`
--

LOCK TABLES `t_dbppago` WRITE;
/*!40000 ALTER TABLE `t_dbppago` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_dbppago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_difunto`
--

DROP TABLE IF EXISTS `t_difunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_difunto` (
  `dif_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dif_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_ape` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_fechadef` date NOT NULL,
  `dif_obser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_difunto`
--

LOCK TABLES `t_difunto` WRITE;
/*!40000 ALTER TABLE `t_difunto` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_difunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_nicho`
--

DROP TABLE IF EXISTS `t_nicho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_nicho` (
  `nicho_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nicho_nro` int(11) NOT NULL,
  `nicho_fila` int(11) NOT NULL,
  `nicho_col` int(11) NOT NULL,
  `nicho_precio` decimal(8,2) NOT NULL,
  `nicho_est` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicho_pathimag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pab_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nicho_id`),
  KEY `t_nicho_pab_id_foreign` (`pab_id`),
  CONSTRAINT `t_nicho_pab_id_foreign` FOREIGN KEY (`pab_id`) REFERENCES `t_pabellon` (`pab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_nicho`
--

LOCK TABLES `t_nicho` WRITE;
/*!40000 ALTER TABLE `t_nicho` DISABLE KEYS */;
INSERT INTO `t_nicho` VALUES (1,60,1,1,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(2,59,1,2,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(3,58,1,3,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(4,57,1,4,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(5,56,1,5,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(6,55,1,6,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(7,54,1,7,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(8,53,1,8,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(9,52,1,9,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(10,51,1,10,876.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-24 00:59:23'),(11,50,2,1,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(12,49,2,2,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(13,48,2,3,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(14,47,2,4,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(15,46,2,5,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(16,45,2,6,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(17,44,2,7,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(18,43,2,8,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(19,42,2,9,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(20,41,2,10,90.80,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-25 03:19:45'),(21,40,3,1,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(22,39,3,2,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(23,38,3,3,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(24,37,3,4,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(25,36,3,5,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(26,35,3,6,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(27,34,3,7,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(28,33,3,8,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(29,32,3,9,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(30,31,3,10,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(31,30,4,1,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(32,29,4,2,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(33,28,4,3,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(34,27,4,4,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(35,26,4,5,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(36,25,4,6,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(37,24,4,7,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(38,23,4,8,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(39,22,4,9,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(40,21,4,10,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(41,20,5,1,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(42,19,5,2,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(43,18,5,3,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(44,17,5,4,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(45,16,5,5,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(46,15,5,6,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(47,14,5,7,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(48,13,5,8,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(49,12,5,9,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(50,11,5,10,0.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(51,10,6,1,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(52,9,6,2,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(53,8,6,3,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(54,7,6,4,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(55,6,6,5,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(56,5,6,6,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(57,4,6,7,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(58,3,6,8,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(59,2,6,9,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(60,1,6,10,1500.00,'libre','pathima',1,'2018-02-08 23:14:30','2018-03-02 19:51:03'),(61,1,1,1,0.00,'ocupado','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(62,2,1,2,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(63,3,1,3,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(64,4,1,4,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(65,5,1,5,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(66,6,1,6,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(67,7,2,1,0.00,'ocupado','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(68,8,2,2,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(69,9,2,3,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(70,10,2,4,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(71,11,2,5,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(72,12,2,6,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(73,13,3,1,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(74,14,3,2,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(75,15,3,3,0.00,'ocupado','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(76,16,3,4,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(77,17,3,5,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(78,18,3,6,0.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(79,19,4,1,90.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-24 00:18:25'),(80,20,4,2,90.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-24 00:18:25'),(81,21,4,3,90.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-24 00:18:25'),(82,22,4,4,90.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-24 00:18:25'),(83,23,4,5,90.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-24 00:18:25'),(84,24,4,6,90.00,'libre','pathima',2,'2018-02-22 20:31:32','2018-02-24 00:18:26'),(85,12,1,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(86,24,1,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(87,36,1,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(88,48,1,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(89,11,2,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(90,23,2,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(91,35,2,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(92,47,2,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(93,10,3,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(94,22,3,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(95,34,3,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(96,46,3,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(97,9,4,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(98,21,4,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(99,33,4,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(100,45,4,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(101,8,5,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(102,20,5,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(103,32,5,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(104,44,5,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(105,7,6,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(106,19,6,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(107,31,6,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(108,43,6,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(109,6,7,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(110,18,7,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(111,30,7,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(112,42,7,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(113,5,8,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(114,17,8,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(115,29,8,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(116,41,8,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(117,4,9,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(118,16,9,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(119,28,9,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(120,40,9,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(121,3,10,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(122,15,10,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(123,27,10,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(124,39,10,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(125,2,11,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(126,14,11,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(127,26,11,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(128,38,11,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(129,1,12,1,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(130,13,12,2,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(131,25,12,3,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54'),(132,37,12,4,0.00,'libre','pathima',3,'2018-03-02 23:21:54','2018-03-02 23:21:54');
/*!40000 ALTER TABLE `t_nicho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pabellon`
--

DROP TABLE IF EXISTS `t_pabellon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_pabellon` (
  `pab_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pab_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pab_nrofil` int(11) NOT NULL,
  `pab_nrocol` int(11) NOT NULL,
  `pab_cantnicho` int(11) NOT NULL,
  `pab_pathimag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pab_tiponum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cement_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pab_id`),
  KEY `t_pabellon_cement_id_foreign` (`cement_id`),
  CONSTRAINT `t_pabellon_cement_id_foreign` FOREIGN KEY (`cement_id`) REFERENCES `t_cementerio` (`cement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pabellon`
--

LOCK TABLES `t_pabellon` WRITE;
/*!40000 ALTER TABLE `t_pabellon` DISABLE KEYS */;
INSERT INTO `t_pabellon` VALUES (1,'SAN ANTONIO',6,10,-1,'1.jpeg','F',1,'2018-02-08 23:14:30','2018-02-08 23:14:30'),(2,'San Judas',4,6,-1,'2.jpeg','A',1,'2018-02-22 20:31:32','2018-02-22 20:31:32'),(3,'Binario',12,4,-1,'3.png','C',3,'2018-03-02 23:21:54','2018-03-02 23:21:54');
/*!40000 ALTER TABLE `t_pabellon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_planpago`
--

DROP TABLE IF EXISTS `t_planpago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_planpago` (
  `ppago_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ppago_fechaven` date NOT NULL,
  `ppago_nrocuota` int(11) NOT NULL,
  `ppago_montocuota` decimal(8,2) NOT NULL,
  `ppago_saldocuota` decimal(8,2) NOT NULL,
  `conv_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ppago_id`),
  KEY `t_planpago_conv_id_foreign` (`conv_id`),
  CONSTRAINT `t_planpago_conv_id_foreign` FOREIGN KEY (`conv_id`) REFERENCES `t_convenio` (`conv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_planpago`
--

LOCK TABLES `t_planpago` WRITE;
/*!40000 ALTER TABLE `t_planpago` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_planpago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_servicioextra`
--

DROP TABLE IF EXISTS `t_servicioextra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_servicioextra` (
  `sextra_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sextra_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sextra_costo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sextra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_servicioextra`
--

LOCK TABLES `t_servicioextra` WRITE;
/*!40000 ALTER TABLE `t_servicioextra` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_servicioextra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_solicitante`
--

DROP TABLE IF EXISTS `t_solicitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_solicitante` (
  `sol_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sol_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_dir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_solicitante`
--

LOCK TABLES `t_solicitante` WRITE;
/*!40000 ALTER TABLE `t_solicitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_solicitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_traslado`
--

DROP TABLE IF EXISTS `t_traslado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_traslado` (
  `tras_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tras_fecha` date NOT NULL,
  `tras_est` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_id_ant` int(10) unsigned NOT NULL,
  `cont_id_nue` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tras_id`),
  KEY `t_traslado_cont_id_ant_foreign` (`cont_id_ant`),
  KEY `t_traslado_cont_id_nue_foreign` (`cont_id_nue`),
  CONSTRAINT `t_traslado_cont_id_ant_foreign` FOREIGN KEY (`cont_id_ant`) REFERENCES `t_contrato` (`cont_id`),
  CONSTRAINT `t_traslado_cont_id_nue_foreign` FOREIGN KEY (`cont_id_nue`) REFERENCES `t_contrato` (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_traslado`
--

LOCK TABLES `t_traslado` WRITE;
/*!40000 ALTER TABLE `t_traslado` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_traslado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jorge Garnica Blanco','jorgegarba@gmail.com','$2y$10$9B.TscorQQbiEa.5eUQgQOMtoIrA5JqlCiKWOERWBhRLFCHCNIP9m','47040062','administrador','activo','7m1eevnzCuIxx7mFBGYgVGjCTj5T1nbC5Ahy9qxn3bNTwuFii8y7Dg8JcBsb','2018-02-08 23:13:48','2018-02-08 23:13:48'),(2,'Maricarmen Vizcarra','mvizcarra@gmail.com','$2y$10$MGneXWDmq.hgxAl78pp2U.EApmV6kF0CeHz/6OyvmivnSdZSCrMyO','10101010','gerencia','activo','OaeCKmXEHhqf8lNBAm1G2s8OnJlCL4JDpqvOYZaO4hrDZKMDQLVjaxxVWBRm','2018-02-26 20:20:11','2018-02-26 20:20:11');
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

-- Dump completed on 2018-03-05  9:35:07
