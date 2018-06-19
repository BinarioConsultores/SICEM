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
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_01_11_123609_creartablacementerio',1),(4,'2018_01_11_123706_creartablapabellon',1),(5,'2018_01_11_123735_creartablanicho',1),(6,'2018_01_11_123803_creartabladifunto',1),(7,'2018_01_11_123821_creartablasolicitante',1),(8,'2018_01_11_123944_creartablaservicioextra',1),(9,'2018_01_11_124003_creartablaboleta',1),(10,'2018_01_11_124004_creartablaboletadetalle',1),(11,'2018_01_11_124006_creartablaconvenio',1),(12,'2018_01_11_124007_creartablacontrato',1),(13,'2018_01_11_124008_creartablatraslado',1),(14,'2018_01_11_124101_creartablaplanpago',1),(15,'2018_01_11_124118_creartabladbppago',1),(16,'2018_01_11_124119_creartablacsextra',1);
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
-- Table structure for table `t_bdppago`
--

DROP TABLE IF EXISTS `t_bdppago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_bdppago` (
  `bdpp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ppago_id` int(10) unsigned NOT NULL,
  `bolde_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bdpp_id`),
  KEY `t_dbppago_ppago_id_foreign` (`ppago_id`),
  KEY `t_dbppago_bolde_id_foreign` (`bolde_id`),
  CONSTRAINT `t_dbppago_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  CONSTRAINT `t_dbppago_ppago_id_foreign` FOREIGN KEY (`ppago_id`) REFERENCES `t_planpago` (`ppago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_bdppago`
--

LOCK TABLES `t_bdppago` WRITE;
/*!40000 ALTER TABLE `t_bdppago` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_bdppago` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_boleta`
--

LOCK TABLES `t_boleta` WRITE;
/*!40000 ALTER TABLE `t_boleta` DISABLE KEYS */;
INSERT INTO `t_boleta` VALUES (1,'-1','00000000','sin nombre','0000-00-00',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_boletadetalle`
--

LOCK TABLES `t_boletadetalle` WRITE;
/*!40000 ALTER TABLE `t_boletadetalle` DISABLE KEYS */;
INSERT INTO `t_boletadetalle` VALUES (1,'sin valor',-1.00,1,NULL,NULL);
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
  `cont_estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_tipouso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_tiempo` int(11) NOT NULL,
  `cont_monto` decimal(8,2) NOT NULL,
  `cont_diffechsep` date NOT NULL,
  `sol_id` int(10) unsigned NOT NULL,
  `dif_id` int(10) unsigned NOT NULL,
  `nicho_id` int(10) unsigned NOT NULL,
  `usu_id_reg` int(10) unsigned NOT NULL,
  `usu_id_auto` int(10) unsigned NOT NULL,
  `conv_id` int(10) unsigned NOT NULL,
  `bolde_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cont_id`),
  KEY `t_contrato_sol_id_foreign` (`sol_id`),
  KEY `t_contrato_conv_id_foreign` (`conv_id`),
  KEY `t_contrato_dif_id_foreign` (`dif_id`),
  KEY `t_contrato_nicho_id_foreign` (`nicho_id`),
  KEY `t_contrato_usu_id_reg_foreign` (`usu_id_reg`),
  KEY `t_contrato_usu_id_auto_foreign` (`usu_id_auto`),
  KEY `t_contrato_bolde_id_foreign` (`bolde_id`),
  CONSTRAINT `t_contrato_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  CONSTRAINT `t_contrato_conv_id_foreign` FOREIGN KEY (`conv_id`) REFERENCES `t_convenio` (`conv_id`),
  CONSTRAINT `t_contrato_dif_id_foreign` FOREIGN KEY (`dif_id`) REFERENCES `t_difunto` (`dif_id`),
  CONSTRAINT `t_contrato_nicho_id_foreign` FOREIGN KEY (`nicho_id`) REFERENCES `t_nicho` (`nicho_id`),
  CONSTRAINT `t_contrato_sol_id_foreign` FOREIGN KEY (`sol_id`) REFERENCES `t_solicitante` (`sol_id`),
  CONSTRAINT `t_contrato_usu_id_auto_foreign` FOREIGN KEY (`usu_id_auto`) REFERENCES `users` (`id`),
  CONSTRAINT `t_contrato_usu_id_reg_foreign` FOREIGN KEY (`usu_id_reg`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`conv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_convenio`
--

LOCK TABLES `t_convenio` WRITE;
/*!40000 ALTER TABLE `t_convenio` DISABLE KEYS */;
INSERT INTO `t_convenio` VALUES (1,'0000-00-00',-1.00,-1,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_csextra`
--

LOCK TABLES `t_csextra` WRITE;
/*!40000 ALTER TABLE `t_csextra` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_csextra` ENABLE KEYS */;
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
  `dif_ape2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_fechadef` date NOT NULL,
  `dif_obser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dif_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_servicioextra`
--

LOCK TABLES `t_servicioextra` WRITE;
/*!40000 ALTER TABLE `t_servicioextra` DISABLE KEYS */;
INSERT INTO `t_servicioextra` VALUES (1,'LAPIDA','28.00',NULL,NULL),(2,'REJILLA','28.00',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jorge Garnica Blanco','jorgegarba@gmail.com','$2y$10$9B.TscorQQbiEa.5eUQgQOMtoIrA5JqlCiKWOERWBhRLFCHCNIP9m','47040062','administrador','activo','2w0fGRiSuU7zfODEPp1COvLiO1QpsAGMSEXwtBYwU3dhTZrdPzeuZXuEcUly','2018-02-09 14:13:48','2018-02-09 14:13:48'),(2,'Administrador','mvizcarra@gmail.com','$2y$10$MGneXWDmq.hgxAl78pp2U.EApmV6kF0CeHz/6OyvmivnSdZSCrMyO','10101010','gerencia','activo','XyZk0flmSausTcxPR04AjzEHcz0rCqk2nAffHyZj7yj6oxFM9oG4RrBrqM2v','2018-02-27 11:20:11','2018-02-27 11:20:11'),(3,'Cajero','caja@gmail.com','$2y$10$W9.uTDXkbAewRAaZ8nljju8oVNrMzyqrAra8wdyLtzaEzwYbI6SfO','80808080','caja','activo','ytyfxEeVBx8N1bhEvD4Dc1qcUFrFpi1FguadyYI6MJKqy88apD3oKDAKot9R','2018-03-28 23:17:43','2018-03-28 23:17:43');
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

-- Dump completed on 2018-06-14 16:26:19
