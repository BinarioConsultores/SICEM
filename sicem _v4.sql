-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2018 a las 21:07:33
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_11_123609_creartablacementerio', 1),
(4, '2018_01_11_123706_creartablapabellon', 1),
(5, '2018_01_11_123735_creartablanicho', 1),
(6, '2018_01_11_123803_creartabladifunto', 1),
(7, '2018_01_11_123821_creartablasolicitante', 1),
(8, '2018_01_11_123944_creartablaservicioextra', 1),
(9, '2018_01_11_124003_creartablaboleta', 1),
(10, '2018_01_11_124004_creartablaboletadetalle', 1),
(11, '2018_01_11_124006_creartablaconvenio', 1),
(12, '2018_01_11_124007_creartablacontrato', 1),
(13, '2018_01_11_124008_creartablatraslado', 1),
(14, '2018_01_11_124101_creartablaplanpago', 1),
(15, '2018_01_11_124118_creartabladbppago', 1),
(16, '2018_01_11_124119_creartablacsextra', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_boleta`
--

CREATE TABLE `t_boleta` (
  `bol_id` int(10) UNSIGNED NOT NULL,
  `bol_nro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bol_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bol_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bol_fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_boleta`
--

INSERT INTO `t_boleta` (`bol_id`, `bol_nro`, `bol_dni`, `bol_nom`, `bol_fecha`, `created_at`, `updated_at`) VALUES
(1, '23', '72126142', '1', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_boletadetalle`
--

CREATE TABLE `t_boletadetalle` (
  `bolde_id` int(10) UNSIGNED NOT NULL,
  `bolde_concepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bolde_monto` decimal(8,2) NOT NULL,
  `bol_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_boletadetalle`
--

INSERT INTO `t_boletadetalle` (`bolde_id`, `bolde_concepto`, `bolde_monto`, `bol_id`, `created_at`, `updated_at`) VALUES
(1, 'concepto', '0.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cementerio`
--

CREATE TABLE `t_cementerio` (
  `cement_id` int(10) UNSIGNED NOT NULL,
  `cement_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_cementerio`
--

INSERT INTO `t_cementerio` (`cement_id`, `cement_nom`, `created_at`, `updated_at`) VALUES
(1, 'Sachaca', '2018-02-09 14:14:01', '2018-02-22 12:56:15'),
(2, 'Cementerio 2', '2018-02-28 11:00:27', '2018-02-28 11:00:27'),
(3, 'Arequipa', '2018-03-03 10:46:24', '2018-03-03 10:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contrato`
--

CREATE TABLE `t_contrato` (
  `cont_id` int(10) UNSIGNED NOT NULL,
  `cont_fecha` date NOT NULL,
  `cont_tipopago` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_concepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_tipouso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_tiempo` int(11) NOT NULL,
  `cont_monto` decimal(8,2) NOT NULL,
  `cont_diffechsep` date NOT NULL,
  `sol_id` int(10) UNSIGNED NOT NULL,
  `dif_id` int(10) UNSIGNED NOT NULL,
  `nicho_id` int(10) UNSIGNED NOT NULL,
  `usu_id_reg` int(10) UNSIGNED NOT NULL,
  `usu_id_auto` int(10) UNSIGNED NOT NULL,
  `conv_id` int(10) UNSIGNED NOT NULL,
  `bolde_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_contrato`
--

INSERT INTO `t_contrato` (`cont_id`, `cont_fecha`, `cont_tipopago`, `cont_concepto`, `cont_estado`, `cont_tipouso`, `cont_tiempo`, `cont_monto`, `cont_diffechsep`, `sol_id`, `dif_id`, `nicho_id`, `usu_id_reg`, `usu_id_auto`, `conv_id`, `bolde_id`, `created_at`, `updated_at`) VALUES
(2, '2018-03-09', 'credito', 'concepto', 'tramite', 'cesion', 25, '90.00', '2018-03-06', 4, 4, 80, 2, 1, 1, 1, '2018-03-10 01:05:24', '2018-03-10 01:05:24'),
(3, '2018-03-09', 'credito', 'concepto', 'tramite', 'cesion', 25, '90.00', '2018-03-06', 5, 5, 80, 2, 1, 1, 1, '2018-03-10 01:06:29', '2018-03-10 01:06:29'),
(4, '2018-03-09', 'credito', 'concepto', 'tramite', 'cesion', 25, '90.00', '2018-03-06', 6, 6, 80, 2, 1, 1, 1, '2018-03-10 01:06:56', '2018-03-10 01:06:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_convenio`
--

CREATE TABLE `t_convenio` (
  `conv_id` int(10) UNSIGNED NOT NULL,
  `conv_fecha` date NOT NULL,
  `conv_cuotaini` decimal(8,2) NOT NULL,
  `conv_nrocuota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_convenio`
--

INSERT INTO `t_convenio` (`conv_id`, `conv_fecha`, `conv_cuotaini`, `conv_nrocuota`, `created_at`, `updated_at`) VALUES
(1, '2018-03-13', '10.00', 5, NULL, NULL),
(2, '2018-03-09', '10.00', 5, '2018-03-10 01:06:56', '2018-03-10 01:06:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_csextra`
--

CREATE TABLE `t_csextra` (
  `csextra_id` int(10) UNSIGNED NOT NULL,
  `cont_id` int(10) UNSIGNED NOT NULL,
  `sextra_id` int(10) UNSIGNED NOT NULL,
  `bolde_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_dbppago`
--

CREATE TABLE `t_dbppago` (
  `dbpp_id` int(10) UNSIGNED NOT NULL,
  `ppago_id` int(10) UNSIGNED NOT NULL,
  `bolde_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_difunto`
--

CREATE TABLE `t_difunto` (
  `dif_id` int(10) UNSIGNED NOT NULL,
  `dif_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_ape` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dif_fechadef` date NOT NULL,
  `dif_obser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_difunto`
--

INSERT INTO `t_difunto` (`dif_id`, `dif_nom`, `dif_ape`, `dif_dni`, `dif_fechadef`, `dif_obser`, `created_at`, `updated_at`) VALUES
(1, 'sfdf', 'sdfdsf', '12345678', '2018-03-15', 'sdf', '2018-03-10 02:46:01', '2018-03-10 02:46:01'),
(2, 'aisdoaisn', 'oasdni', '79876542', '2018-12-31', 'asasdasdasd232asdasd', '2018-03-10 03:12:29', '2018-03-10 03:12:29'),
(3, 'asd', 'asd', '12345678', '2018-03-09', 'asd', '2018-03-10 01:03:19', '2018-03-10 01:03:19'),
(4, 'asd', 'asd', '12345678', '2018-03-09', 'asd', '2018-03-10 01:05:24', '2018-03-10 01:05:24'),
(5, 'asd', 'asd', '12345678', '2018-03-09', 'asd', '2018-03-10 01:06:29', '2018-03-10 01:06:29'),
(6, 'asd', 'asd', '12345678', '2018-03-09', 'asd', '2018-03-10 01:06:56', '2018-03-10 01:06:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_nicho`
--

CREATE TABLE `t_nicho` (
  `nicho_id` int(10) UNSIGNED NOT NULL,
  `nicho_nro` int(11) NOT NULL,
  `nicho_fila` int(11) NOT NULL,
  `nicho_col` int(11) NOT NULL,
  `nicho_precio` decimal(8,2) NOT NULL,
  `nicho_est` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicho_pathimag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pab_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_nicho`
--

INSERT INTO `t_nicho` (`nicho_id`, `nicho_nro`, `nicho_fila`, `nicho_col`, `nicho_precio`, `nicho_est`, `nicho_pathimag`, `pab_id`, `created_at`, `updated_at`) VALUES
(1, 60, 1, 1, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(2, 59, 1, 2, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(3, 58, 1, 3, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(4, 57, 1, 4, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(5, 56, 1, 5, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(6, 55, 1, 6, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(7, 54, 1, 7, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(8, 53, 1, 8, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(9, 52, 1, 9, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(10, 51, 1, 10, '876.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-24 15:59:23'),
(11, 50, 2, 1, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(12, 49, 2, 2, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(13, 48, 2, 3, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(14, 47, 2, 4, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(15, 46, 2, 5, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(16, 45, 2, 6, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(17, 44, 2, 7, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(18, 43, 2, 8, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(19, 42, 2, 9, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(20, 41, 2, 10, '90.80', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-25 18:19:45'),
(21, 40, 3, 1, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(22, 39, 3, 2, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(23, 38, 3, 3, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(24, 37, 3, 4, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(25, 36, 3, 5, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(26, 35, 3, 6, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(27, 34, 3, 7, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(28, 33, 3, 8, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(29, 32, 3, 9, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(30, 31, 3, 10, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(31, 30, 4, 1, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(32, 29, 4, 2, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(33, 28, 4, 3, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(34, 27, 4, 4, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(35, 26, 4, 5, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(36, 25, 4, 6, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(37, 24, 4, 7, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(38, 23, 4, 8, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(39, 22, 4, 9, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(40, 21, 4, 10, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(41, 20, 5, 1, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(42, 19, 5, 2, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(43, 18, 5, 3, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(44, 17, 5, 4, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(45, 16, 5, 5, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(46, 15, 5, 6, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(47, 14, 5, 7, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(48, 13, 5, 8, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(49, 12, 5, 9, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(50, 11, 5, 10, '0.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(51, 10, 6, 1, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(52, 9, 6, 2, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(53, 8, 6, 3, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(54, 7, 6, 4, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(55, 6, 6, 5, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(56, 5, 6, 6, '1500.00', 'tramite', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-10 02:46:02'),
(57, 4, 6, 7, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(58, 3, 6, 8, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(59, 2, 6, 9, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(60, 1, 6, 10, '1500.00', 'libre', 'default.jpg', 1, '2018-02-09 14:14:30', '2018-03-03 10:51:03'),
(61, 1, 1, 1, '0.00', 'ocupado', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(62, 2, 1, 2, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(63, 3, 1, 3, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(64, 4, 1, 4, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(65, 5, 1, 5, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(66, 6, 1, 6, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(67, 7, 2, 1, '0.00', 'ocupado', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(68, 8, 2, 2, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(69, 9, 2, 3, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(70, 10, 2, 4, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(71, 11, 2, 5, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(72, 12, 2, 6, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(73, 13, 3, 1, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(74, 14, 3, 2, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(75, 15, 3, 3, '0.00', 'ocupado', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(76, 16, 3, 4, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(77, 17, 3, 5, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(78, 18, 3, 6, '0.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(79, 19, 4, 1, '90.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-24 15:18:25'),
(80, 20, 4, 2, '90.00', 'tramite', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-03-10 01:06:56'),
(81, 21, 4, 3, '90.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-24 15:18:25'),
(82, 22, 4, 4, '90.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-24 15:18:25'),
(83, 23, 4, 5, '90.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-24 15:18:25'),
(84, 24, 4, 6, '90.00', 'libre', 'default.jpg', 2, '2018-02-23 11:31:32', '2018-02-24 15:18:26'),
(85, 12, 1, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(86, 24, 1, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(87, 36, 1, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(88, 48, 1, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(89, 11, 2, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(90, 23, 2, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(91, 35, 2, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(92, 47, 2, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(93, 10, 3, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(94, 22, 3, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(95, 34, 3, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(96, 46, 3, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(97, 9, 4, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(98, 21, 4, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(99, 33, 4, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(100, 45, 4, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(101, 8, 5, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(102, 20, 5, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(103, 32, 5, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(104, 44, 5, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(105, 7, 6, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(106, 19, 6, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(107, 31, 6, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(108, 43, 6, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(109, 6, 7, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(110, 18, 7, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(111, 30, 7, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(112, 42, 7, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(113, 5, 8, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(114, 17, 8, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(115, 29, 8, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(116, 41, 8, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(117, 4, 9, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(118, 16, 9, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(119, 28, 9, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(120, 40, 9, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(121, 3, 10, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(122, 15, 10, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(123, 27, 10, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(124, 39, 10, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(125, 2, 11, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(126, 14, 11, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(127, 26, 11, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(128, 38, 11, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(129, 1, 12, 1, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(130, 13, 12, 2, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(131, 25, 12, 3, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54'),
(132, 37, 12, 4, '0.00', 'libre', 'default.jpg', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pabellon`
--

CREATE TABLE `t_pabellon` (
  `pab_id` int(10) UNSIGNED NOT NULL,
  `pab_nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pab_nrofil` int(11) NOT NULL,
  `pab_nrocol` int(11) NOT NULL,
  `pab_cantnicho` int(11) NOT NULL,
  `pab_pathimag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pab_tiponum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_pabellon`
--

INSERT INTO `t_pabellon` (`pab_id`, `pab_nom`, `pab_nrofil`, `pab_nrocol`, `pab_cantnicho`, `pab_pathimag`, `pab_tiponum`, `cement_id`, `created_at`, `updated_at`) VALUES
(1, 'SAN ANTONIO', 6, 10, -1, '1.jpeg', 'F', 1, '2018-02-09 14:14:30', '2018-02-09 14:14:30'),
(2, 'San Judas', 4, 6, -1, '2.jpeg', 'A', 1, '2018-02-23 11:31:32', '2018-02-23 11:31:32'),
(3, 'Binario', 12, 4, -1, '3.png', 'C', 3, '2018-03-03 14:21:54', '2018-03-03 14:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_planpago`
--

CREATE TABLE `t_planpago` (
  `ppago_id` int(10) UNSIGNED NOT NULL,
  `ppago_fechaven` date NOT NULL,
  `ppago_nrocuota` int(11) NOT NULL,
  `ppago_montocuota` decimal(8,2) NOT NULL,
  `ppago_saldocuota` decimal(8,2) NOT NULL,
  `conv_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_planpago`
--

INSERT INTO `t_planpago` (`ppago_id`, `ppago_fechaven`, `ppago_nrocuota`, `ppago_montocuota`, `ppago_saldocuota`, `conv_id`, `created_at`, `updated_at`) VALUES
(1, '2018-04-09', 1, '16.00', '16.00', 2, '2018-03-10 01:06:56', '2018-03-10 01:06:56'),
(2, '2018-05-09', 2, '16.00', '16.00', 2, '2018-03-10 01:06:56', '2018-03-10 01:06:56'),
(3, '2018-06-09', 3, '16.00', '16.00', 2, '2018-03-10 01:06:56', '2018-03-10 01:06:56'),
(4, '2018-07-09', 4, '16.00', '16.00', 2, '2018-03-10 01:06:56', '2018-03-10 01:06:56'),
(5, '2018-08-09', 5, '16.00', '16.00', 2, '2018-03-10 01:06:56', '2018-03-10 01:06:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_servicioextra`
--

CREATE TABLE `t_servicioextra` (
  `sextra_id` int(10) UNSIGNED NOT NULL,
  `sextra_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sextra_costo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_solicitante`
--

CREATE TABLE `t_solicitante` (
  `sol_id` int(10) UNSIGNED NOT NULL,
  `sol_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_dir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_solicitante`
--

INSERT INTO `t_solicitante` (`sol_id`, `sol_nombre`, `sol_telefono`, `sol_dir`, `sol_dni`, `created_at`, `updated_at`) VALUES
(1, 'dfsf', '65456', 'fsdf', '72126142', '2018-03-10 02:46:01', '2018-03-10 02:46:01'),
(2, 'sol', '132456', 'asdasd', '45678952', '2018-03-10 03:12:29', '2018-03-10 03:12:29'),
(3, 'j', '546', 'adds', '12345678', '2018-03-10 01:03:19', '2018-03-10 01:03:19'),
(4, 'j', '546', 'adds', '12345678', '2018-03-10 01:05:24', '2018-03-10 01:05:24'),
(5, 'j', '546', 'adds', '12345678', '2018-03-10 01:06:29', '2018-03-10 01:06:29'),
(6, 'j', '546', 'adds', '12345678', '2018-03-10 01:06:56', '2018-03-10 01:06:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_traslado`
--

CREATE TABLE `t_traslado` (
  `tras_id` int(10) UNSIGNED NOT NULL,
  `tras_fecha` date NOT NULL,
  `tras_est` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont_id_ant` int(10) UNSIGNED NOT NULL,
  `cont_id_nue` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dni`, `tipo`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jorge Garnica Blanco', 'jorgegarba@gmail.com', '$2y$10$9B.TscorQQbiEa.5eUQgQOMtoIrA5JqlCiKWOERWBhRLFCHCNIP9m', '47040062', 'administrador', 'activo', 'hFkSOOOeU6km4n0DFtWkSc2NYvzjWTz8t9aIPeW8WTUWeBvKHn0AsTpuYWWT', '2018-02-09 14:13:48', '2018-02-09 14:13:48'),
(2, 'Maricarmen Vizcarra', 'mvizcarra@gmail.com', '$2y$10$MGneXWDmq.hgxAl78pp2U.EApmV6kF0CeHz/6OyvmivnSdZSCrMyO', '10101010', 'gerencia', 'activo', 'YYfzy3fxBM5y6Yh1qPLyYeHqv9udbzoCwpuPd306ElLkppgJeLuWbCt2Za45', '2018-02-27 11:20:11', '2018-02-27 11:20:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `t_boleta`
--
ALTER TABLE `t_boleta`
  ADD PRIMARY KEY (`bol_id`);

--
-- Indices de la tabla `t_boletadetalle`
--
ALTER TABLE `t_boletadetalle`
  ADD PRIMARY KEY (`bolde_id`),
  ADD KEY `t_boletadetalle_bol_id_foreign` (`bol_id`);

--
-- Indices de la tabla `t_cementerio`
--
ALTER TABLE `t_cementerio`
  ADD PRIMARY KEY (`cement_id`);

--
-- Indices de la tabla `t_contrato`
--
ALTER TABLE `t_contrato`
  ADD PRIMARY KEY (`cont_id`),
  ADD KEY `t_contrato_sol_id_foreign` (`sol_id`),
  ADD KEY `t_contrato_conv_id_foreign` (`conv_id`),
  ADD KEY `t_contrato_dif_id_foreign` (`dif_id`),
  ADD KEY `t_contrato_nicho_id_foreign` (`nicho_id`),
  ADD KEY `t_contrato_usu_id_reg_foreign` (`usu_id_reg`),
  ADD KEY `t_contrato_usu_id_auto_foreign` (`usu_id_auto`),
  ADD KEY `t_contrato_bolde_id_foreign` (`bolde_id`);

--
-- Indices de la tabla `t_convenio`
--
ALTER TABLE `t_convenio`
  ADD PRIMARY KEY (`conv_id`);

--
-- Indices de la tabla `t_csextra`
--
ALTER TABLE `t_csextra`
  ADD PRIMARY KEY (`csextra_id`),
  ADD KEY `t_csextra_cont_id_foreign` (`cont_id`),
  ADD KEY `t_csextra_sextra_id_foreign` (`sextra_id`),
  ADD KEY `t_csextra_bolde_id_foreign` (`bolde_id`);

--
-- Indices de la tabla `t_dbppago`
--
ALTER TABLE `t_dbppago`
  ADD PRIMARY KEY (`dbpp_id`),
  ADD KEY `t_dbppago_ppago_id_foreign` (`ppago_id`),
  ADD KEY `t_dbppago_bolde_id_foreign` (`bolde_id`);

--
-- Indices de la tabla `t_difunto`
--
ALTER TABLE `t_difunto`
  ADD PRIMARY KEY (`dif_id`);

--
-- Indices de la tabla `t_nicho`
--
ALTER TABLE `t_nicho`
  ADD PRIMARY KEY (`nicho_id`),
  ADD KEY `t_nicho_pab_id_foreign` (`pab_id`);

--
-- Indices de la tabla `t_pabellon`
--
ALTER TABLE `t_pabellon`
  ADD PRIMARY KEY (`pab_id`),
  ADD KEY `t_pabellon_cement_id_foreign` (`cement_id`);

--
-- Indices de la tabla `t_planpago`
--
ALTER TABLE `t_planpago`
  ADD PRIMARY KEY (`ppago_id`),
  ADD KEY `t_planpago_conv_id_foreign` (`conv_id`);

--
-- Indices de la tabla `t_servicioextra`
--
ALTER TABLE `t_servicioextra`
  ADD PRIMARY KEY (`sextra_id`);

--
-- Indices de la tabla `t_solicitante`
--
ALTER TABLE `t_solicitante`
  ADD PRIMARY KEY (`sol_id`);

--
-- Indices de la tabla `t_traslado`
--
ALTER TABLE `t_traslado`
  ADD PRIMARY KEY (`tras_id`),
  ADD KEY `t_traslado_cont_id_ant_foreign` (`cont_id_ant`),
  ADD KEY `t_traslado_cont_id_nue_foreign` (`cont_id_nue`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `t_boleta`
--
ALTER TABLE `t_boleta`
  MODIFY `bol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_boletadetalle`
--
ALTER TABLE `t_boletadetalle`
  MODIFY `bolde_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_cementerio`
--
ALTER TABLE `t_cementerio`
  MODIFY `cement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_contrato`
--
ALTER TABLE `t_contrato`
  MODIFY `cont_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_convenio`
--
ALTER TABLE `t_convenio`
  MODIFY `conv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_csextra`
--
ALTER TABLE `t_csextra`
  MODIFY `csextra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_dbppago`
--
ALTER TABLE `t_dbppago`
  MODIFY `dbpp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_difunto`
--
ALTER TABLE `t_difunto`
  MODIFY `dif_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_nicho`
--
ALTER TABLE `t_nicho`
  MODIFY `nicho_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `t_pabellon`
--
ALTER TABLE `t_pabellon`
  MODIFY `pab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_planpago`
--
ALTER TABLE `t_planpago`
  MODIFY `ppago_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_servicioextra`
--
ALTER TABLE `t_servicioextra`
  MODIFY `sextra_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_solicitante`
--
ALTER TABLE `t_solicitante`
  MODIFY `sol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_traslado`
--
ALTER TABLE `t_traslado`
  MODIFY `tras_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_boletadetalle`
--
ALTER TABLE `t_boletadetalle`
  ADD CONSTRAINT `t_boletadetalle_bol_id_foreign` FOREIGN KEY (`bol_id`) REFERENCES `t_boleta` (`bol_id`);

--
-- Filtros para la tabla `t_contrato`
--
ALTER TABLE `t_contrato`
  ADD CONSTRAINT `t_contrato_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  ADD CONSTRAINT `t_contrato_conv_id_foreign` FOREIGN KEY (`conv_id`) REFERENCES `t_convenio` (`conv_id`),
  ADD CONSTRAINT `t_contrato_dif_id_foreign` FOREIGN KEY (`dif_id`) REFERENCES `t_difunto` (`dif_id`),
  ADD CONSTRAINT `t_contrato_nicho_id_foreign` FOREIGN KEY (`nicho_id`) REFERENCES `t_nicho` (`nicho_id`),
  ADD CONSTRAINT `t_contrato_sol_id_foreign` FOREIGN KEY (`sol_id`) REFERENCES `t_solicitante` (`sol_id`),
  ADD CONSTRAINT `t_contrato_usu_id_auto_foreign` FOREIGN KEY (`usu_id_auto`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `t_contrato_usu_id_reg_foreign` FOREIGN KEY (`usu_id_reg`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `t_csextra`
--
ALTER TABLE `t_csextra`
  ADD CONSTRAINT `t_csextra_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  ADD CONSTRAINT `t_csextra_cont_id_foreign` FOREIGN KEY (`cont_id`) REFERENCES `t_contrato` (`cont_id`),
  ADD CONSTRAINT `t_csextra_sextra_id_foreign` FOREIGN KEY (`sextra_id`) REFERENCES `t_servicioextra` (`sextra_id`);

--
-- Filtros para la tabla `t_dbppago`
--
ALTER TABLE `t_dbppago`
  ADD CONSTRAINT `t_dbppago_bolde_id_foreign` FOREIGN KEY (`bolde_id`) REFERENCES `t_boletadetalle` (`bolde_id`),
  ADD CONSTRAINT `t_dbppago_ppago_id_foreign` FOREIGN KEY (`ppago_id`) REFERENCES `t_planpago` (`ppago_id`);

--
-- Filtros para la tabla `t_nicho`
--
ALTER TABLE `t_nicho`
  ADD CONSTRAINT `t_nicho_pab_id_foreign` FOREIGN KEY (`pab_id`) REFERENCES `t_pabellon` (`pab_id`);

--
-- Filtros para la tabla `t_pabellon`
--
ALTER TABLE `t_pabellon`
  ADD CONSTRAINT `t_pabellon_cement_id_foreign` FOREIGN KEY (`cement_id`) REFERENCES `t_cementerio` (`cement_id`);

--
-- Filtros para la tabla `t_planpago`
--
ALTER TABLE `t_planpago`
  ADD CONSTRAINT `t_planpago_conv_id_foreign` FOREIGN KEY (`conv_id`) REFERENCES `t_convenio` (`conv_id`);

--
-- Filtros para la tabla `t_traslado`
--
ALTER TABLE `t_traslado`
  ADD CONSTRAINT `t_traslado_cont_id_ant_foreign` FOREIGN KEY (`cont_id_ant`) REFERENCES `t_contrato` (`cont_id`),
  ADD CONSTRAINT `t_traslado_cont_id_nue_foreign` FOREIGN KEY (`cont_id_nue`) REFERENCES `t_contrato` (`cont_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
