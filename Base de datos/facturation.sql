-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2018 a las 11:39:22
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturation`
--
CREATE DATABASE IF NOT EXISTS `facturation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `facturation`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `cuit`, `company_id`, `created_at`, `updated_at`) VALUES
(26, 'Feliciano Ortega', '27102551236', 19, '2018-10-19 12:35:00', '2018-10-19 12:35:00'),
(27, 'Juan Ramon Benitez', '21002551236', 17, '2018-10-19 12:35:19', '2018-10-19 12:35:19'),
(28, 'Marta Ledesma', '27102246236', 24, '2018-10-19 12:35:44', '2018-10-19 12:35:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `businessName`, `cuit`, `created_at`, `updated_at`) VALUES
(16, 'Fargo', 'Fargo', '27102551236', '2018-10-19 12:31:53', '2018-10-19 12:31:53'),
(17, 'Cachamate', 'Cachamate', '27112551236', '2018-10-19 12:32:13', '2018-10-19 12:32:13'),
(18, 'Don Felipe', 'Don Felipe', '27102551237', '2018-10-19 12:32:34', '2018-10-19 12:32:34'),
(19, 'AOC', 'AOC', '27192551236', '2018-10-19 12:32:54', '2018-10-19 12:32:54'),
(20, 'Lenovo', 'Lenovo', '27109951236', '2018-10-19 12:33:09', '2018-10-19 12:33:09'),
(21, 'Corven', 'Corven', '27195651236', '2018-10-19 12:33:26', '2018-10-19 12:33:26'),
(22, 'Olmos', 'Olmos', '24102551236', '2018-10-19 12:33:42', '2018-10-19 12:33:42'),
(23, 'Samsung', 'Samsumg', '27102551239', '2018-10-19 12:34:09', '2018-10-19 12:34:09'),
(24, 'Crystal', 'Crystal', '29502551236', '2018-10-19 12:34:36', '2018-10-19 12:34:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subTotal` decimal(8,2) NOT NULL,
  `iva` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`id`, `number`, `subTotal`, `iva`, `total`, `company_id`, `client_id`, `created_at`, `updated_at`) VALUES
(35, 'B-10001-1000001', '1000.00', '210.00', '1210.00', 19, 26, '2018-10-19 12:36:37', '2018-10-19 12:36:37'),
(36, 'B-10001-1000002', '1000.00', '210.00', '1210.00', 17, 27, '2018-10-19 12:36:54', '2018-10-19 12:36:54'),
(37, 'B-10001-1000003', '1000.00', '210.00', '1210.00', 24, 28, '2018-10-19 12:37:08', '2018-10-19 12:37:08'),
(38, 'B-10001-1000004', '1000.00', '210.00', '1210.00', 24, 28, '2018-10-19 12:37:22', '2018-10-19 12:37:22'),
(39, 'B-10001-1000005', '1000.00', '210.00', '1210.00', 17, 27, '2018-10-19 12:37:37', '2018-10-19 12:37:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2018_10_16_022152_create_company_table', 1),
(5, '2018_10_16_022427_create_client_table', 1),
(6, '2018_10_16_022438_create_invoice_table', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_company_id_foreign` (`company_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_company_id_foreign` (`company_id`),
  ADD KEY `invoice_client_id_foreign` (`client_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `invoice_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
