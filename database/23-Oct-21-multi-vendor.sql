-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 01:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi-vendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Mamdouh', 'admin@admin.com', 'uploads/images/admins/2.jpeg', '$2y$10$xYvZxRXZhF1gFLrjHewimemNE.J/yBmC7qVw8bCNMlGZ56iHgHmE2', '2021-06-18 05:47:01', '2021-09-22 07:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `condition` enum('promo','banner') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `slug`, `title`, `description`, `photo`, `status`, `condition`, `created_at`, `updated_at`) VALUES
(7, 'banners', '{\"ar\":\"\\u0628\\u0627\\u0646\\u0631\",\"en\":\"Banners\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"DESC\"}', 'uploads/images/banners/young-people-buying-christmas-gifts_23-2148351052.jpg', 'active', 'banner', '2021-07-18 08:00:25', '2021-10-20 20:16:33'),
(8, 'banr-2', '{\"ar\":\"\\u0628\\u0627\\u0646\\u0631\",\"en\":\"Banner\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"DESC\"}', 'uploads/images/banners/ajio.jpg', 'active', 'banner', '2021-07-18 08:21:15', '2021-07-18 08:21:15'),
(15, 'banr', '{\"ar\":\"\\u0628\\u0627\\u0646\\u0631\",\"en\":\"Banner\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"DESC\"}', 'uploads/images/banners/12434575.jpg', 'active', 'banner', '2021-10-20 19:10:13', '2021-10-20 19:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `main_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `slug`, `name`, `description`, `photo`, `status`, `main_category_id`, `created_at`, `updated_at`) VALUES
(3, 'samsong', '{\"ar\":\"\\u0632\\u0627\\u0631\\u0627\",\"en\":\"Zara\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"fg\"}', 'uploads/images/brands/512px-Samsung_Logo.svg.png', 'active', 2, '2021-06-20 13:45:29', '2021-08-27 14:50:10'),
(4, 'town-team', '{\"ar\":\"\\u0632\\u0627\\u0631\\u0627\",\"en\":\"Zara\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"fg\"}', 'uploads/images/brands/Town-Team-Egypt-18463-1553938509.png', 'active', 1, '2021-07-07 12:35:55', '2021-08-27 14:48:47'),
(5, 'mens-club', '{\"ar\":\"\\u0632\\u0627\\u0631\\u0627\",\"en\":\"Zara\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"fg\"}', 'uploads/images/brands/54799413_2358245754227037_9200884601705201664_n.png', 'active', 1, '2021-08-23 07:08:50', '2021-08-27 15:58:19'),
(10, 'zara', '{\"ar\":\"\\u0632\\u0627\\u0631\\u0627\",\"en\":\"Zara\"}', '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"fg\"}', 'uploads/images/brands/2786743.jpg', 'active', 1, '2021-10-20 21:07:27', '2021-10-20 21:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(11, '{\"ar\":\"\\u0623\\u0633\\u0648\\u062f\",\"en\":\"black\"}', '#000000', '2021-09-18 12:50:54', '2021-10-21 06:08:37'),
(12, '{\"ar\":\"\\u0644\\u0648\\u0646\",\"en\":\"color\"}', '#ff0000', '2021-09-18 12:51:14', '2021-09-18 12:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` enum('percent','fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `start_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `free_shipping` tinyint(1) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_category` bigint(20) UNSIGNED DEFAULT NULL,
  `minimum_spend` double(8,2) DEFAULT NULL,
  `maximum_spend` double(8,2) DEFAULT NULL,
  `usage_limit_per_limit` int(11) DEFAULT NULL,
  `usage_limit_per_customer` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `discount_type`, `status`, `start_at`, `end_at`, `free_shipping`, `quantity`, `main_category`, `minimum_spend`, `maximum_spend`, `usage_limit_per_limit`, `usage_limit_per_customer`, `created_at`, `updated_at`) VALUES
(1, 'كوبون جديد بقيمة 35% .. الحق دلوقتي', 'ABCD', '35', 'fixed', 'active', '2021-09-22', '2021-09-29', 1, '5', 1, 20.00, 500000.00, 10, 2, '2021-07-10 06:43:27', '2021-09-22 09:55:30'),
(2, '30% off', 'Ass30', '30', 'percent', 'active', '2021-09-23', '2021-09-30', 1, '1', NULL, 5000.00, NULL, 4, 2, '2021-07-24 07:45:42', '2021-09-23 19:02:40'),
(3, 'Non possimus.', 'tempore', '300', 'fixed', 'active', '2016-01-01', '2011-01-29', 0, '6', 54, 726.00, 10325.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:24:42'),
(4, 'Placeat dolore.', 'distinctio-vel', '3', 'percent', 'inactive', '2002-09-14', '1987-03-08', 0, '9', 55, 483.00, 20733.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:24:42'),
(5, 'Porro est porro.', 'beatae', '5', 'percent', 'inactive', '2012-06-11', '1997-08-27', 0, '4', 61, 265.00, 97214.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:24:42'),
(6, 'Pariatur qui est.', 'incidunt-dolores', '7', 'percent', 'active', '1971-10-23', '1988-11-01', 0, '7', 55, 727.00, 32810.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:24:42'),
(7, 'Sed earum in ea.', 'eum-praesentium', '80', 'fixed', 'active', '1978-07-11', '1982-06-15', 0, '10', 14, 512.00, 70906.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:24:42'),
(8, 'Quae rerum.', 'autem', '5', 'percent', 'active', '2021-09-23', '2021-09-30', 0, '5', 2, 800.00, 44429.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:42:29'),
(9, 'Eos est sit in.', 'iusto', '3000', 'fixed', 'active', '1989-11-20', '1980-07-18', 0, '15', NULL, 8000.00, 38688.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:24:42'),
(10, 'At corporis.', 'velit', '5', 'percent', 'active', '1976-04-13', '1995-02-26', 0, '7', NULL, 186.00, 19153.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-29 19:24:42'),
(11, 'Excepturi est eum.', 'et-dolores', '10', 'percent', 'active', '2021-09-24', NULL, 0, '10', NULL, 2902.00, 36170.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-23 19:37:03'),
(12, 'Quae similique et.', 'et-consequatur', '7', 'percent', 'active', '1970-04-17', '1973-04-15', 0, '1', 4, 318.00, 99530.00, NULL, NULL, '2021-09-23 19:24:42', '2021-09-30 19:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `exchange_rate` float NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbr` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `native` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` enum('ltr','rtl') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rtl',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `abbr`, `status`, `native`, `direction`, `created_at`, `updated_at`) VALUES
(1, 'العربية', 'ar', 'active', NULL, 'rtl', '2021-06-18 06:18:33', '2021-06-18 06:18:33'),
(2, 'English', 'en', 'active', NULL, 'ltr', '2021-06-18 07:20:55', '2021-06-18 07:20:55'),
(3, 'france', 'fr', 'inactive', NULL, 'ltr', '2021-08-23 08:42:31', '2021-08-23 08:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `slug`, `name`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'clothes', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633\",\"en\":\"clothes\"}', 'uploads/images/main_categories/1624408234.jpg', 'active', '2021-06-18 07:22:52', '2021-10-21 07:04:58'),
(2, 'electronics', '{\"ar\":\"\\u0625\\u0644\\u064a\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0627\\u062a\",\"en\":\"Electronics\"}', 'uploads/images/main_categories/1624408207.jpg', 'active', '2021-06-18 07:23:07', '2021-10-21 07:05:26'),
(4, 'furniture', '{\"ar\":\"\\u0623\\u062b\\u0627\\u062b\",\"en\":\"furniture\"}', 'uploads/images/main_categories/Furniture-Stores.jpg', 'active', '2021-06-23 12:59:34', '2021-10-21 07:06:09'),
(14, 'health-and-beauty', '{\"ar\":\"\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0648\\u0635\\u062d\\u0629\",\"en\":\"Health and Beauty\"}', 'uploads/images/main_categories/8bb7bbd600716ef6778824007987cf20_kWA1wAv.jpg', 'active', '2021-06-24 09:11:54', '2021-10-21 07:06:45'),
(26, 'aator', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'active', '2021-08-22 19:28:18', '2021-08-22 19:44:10'),
(49, 'dolor-et-doloremque', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:02:46', '2021-09-19 07:02:46'),
(52, 'rerum-minima-magnam', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:19:53', '2021-09-19 07:19:53'),
(53, 'sint-odit', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'active', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(54, 'est-fuga', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(55, 'aut-vero-quia', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'active', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(56, 'hic-odio', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(57, 'eligendi-occaecati', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(58, 'atque-architecto', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(59, 'non-sit-et', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'inactive', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(60, 'quam-perspiciatis', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'active', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(61, 'distinctio-pariatur-recusandae', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'active', '2021-09-19 07:21:08', '2021-09-19 07:21:08'),
(62, 'deserunt-reprehenderit-et', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kids clothes\"}', 'uploads/images/main_categories/190424-PACO-RABANNE66821-3_0.jpg', 'active', '2021-09-19 07:21:08', '2021-09-19 07:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_02_152449_create_banners_table', 1),
(5, '2021_06_03_091153_create_categories_table', 1),
(6, '2021_06_09_045632_create_admins_table', 1),
(7, '2021_06_09_100211_create_languages_table', 1),
(8, '2021_06_09_101002_create_main_categories_table', 1),
(9, '2021_06_12_211858_category_translations', 1),
(10, '2021_06_15_180621_create_vendors_table', 1),
(11, '2021_06_15_210602_create_sub_category', 1),
(12, '2021_06_16_012743_create_sub_categories_translations_table', 1),
(13, '2021_06_17_204851_create_brands_table', 1),
(14, '2021_06_17_205707_create_brands_translations_table', 1),
(15, '2021_06_17_215541_create_products_table', 1),
(16, '2021_06_18_205707_create_products_translations_table', 2),
(17, '2021_06_20_203827_create_settings_table', 3),
(18, '2018_09_05_132600_create_colors_table', 4),
(19, '2018_09_14_125751_create_sizes_table', 5),
(20, '2018_09_21_132711_create_weights_table', 5),
(26, '2021_07_02_185212_create_product_images_table', 6),
(27, '2021_07_07_222244_create_banners_translations', 6),
(29, '2021_07_09_165732_create_copouns_table', 7),
(30, '2021_07_24_151245_create_shippings_table', 8),
(31, '2019_05_03_000001_create_customer_columns', 9),
(32, '2019_05_03_000002_create_subscriptions_table', 9),
(33, '2019_05_03_000003_create_subscription_items_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `billing_discount` int(11) NOT NULL DEFAULT 0,
  `billing_discount_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_subtotal` int(11) NOT NULL,
  `billing_tax` int(11) NOT NULL,
  `billing_total` int(11) NOT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `payment_status` enum('paid','unpaid','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `condition` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `shipping_charge` float NOT NULL,
  `shipped` tinyint(1) NOT NULL DEFAULT 0,
  `error` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_postalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_discount`, `billing_discount_code`, `billing_subtotal`, `billing_tax`, `billing_total`, `payment_gateway`, `payment_status`, `condition`, `shipping_charge`, `shipped`, `error`, `billing_email`, `billing_name`, `billing_address`, `billing_city`, `billing_province`, `billing_postalcode`, `billing_phone`, `billing_name_on_card`, `created_at`, `updated_at`) VALUES
(5, 1, 0, NULL, 680, 0, 780, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 05:41:53', '2021-08-04 05:41:53'),
(6, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:44:18', '2021-08-04 09:44:18'),
(7, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:45:35', '2021-08-04 09:45:35'),
(8, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:45:51', '2021-08-04 09:45:51'),
(9, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:46:08', '2021-08-04 09:46:08'),
(10, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:46:25', '2021-08-04 09:46:25'),
(11, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:46:49', '2021-08-04 09:46:49'),
(12, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:48:13', '2021-08-04 09:48:13'),
(13, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:48:31', '2021-08-04 09:48:31'),
(14, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:48:43', '2021-08-04 09:48:43'),
(15, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:49:37', '2021-08-04 09:49:37'),
(16, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:50:32', '2021-08-04 09:50:32'),
(17, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:51:41', '2021-08-04 09:51:41'),
(18, NULL, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:52:23', '2021-08-04 09:52:23'),
(19, 1, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:56:17', '2021-08-04 09:56:17'),
(20, 1, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'pending', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:57:36', '2021-08-04 09:57:36'),
(21, 1, 0, NULL, 542, 0, 622, 'cod', 'paid', '', 0, 1, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 09:58:57', '2021-08-23 15:17:39'),
(22, 1, 0, NULL, 542, 0, 622, 'cod', 'unpaid', 'cancelled', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 10:00:22', '2021-08-04 10:00:22'),
(23, 1, 0, NULL, 542, 0, 622, 'cod', 'unpaid', '', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 10:00:32', '2021-08-04 10:00:32'),
(24, 1, 0, NULL, 542, 0, 622, 'cod', 'unpaid', '', 0, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-04 10:04:37', '2021-08-16 18:53:58'),
(30, 1, 0, NULL, 8000, 12, 9040, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'muhammad@gmail.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-22 14:06:09', '2021-08-22 14:06:09'),
(31, 1, 0, NULL, 8000, 12, 9040, 'cod', 'paid', '', 100, 1, NULL, 'muhammad@gmail.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-08-22 14:09:32', '2021-08-23 15:13:45'),
(33, 1, 0, NULL, 8000, 12, 6358, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'muhammad@gmail.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-09-09 14:40:07', '2021-09-09 14:40:07'),
(34, 1, 0, NULL, 8000, 12, 9040, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'muhammadmamdouh93@gmail.com', 'Muhammad', 'address', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-09-12 15:30:57', '2021-09-12 15:30:57'),
(35, NULL, 0, NULL, 4000, 12, 4480, 'stripe', 'paid', 'pending', 100, 0, NULL, 'MUHAMMADMAMDOUH93@GMAIL.COM', 'Muhammad', 'بلقطر الشرقية', 'Nasr City', 'we', '22459', '0170770561', NULL, '2021-09-13 20:04:11', '2021-09-13 20:04:11'),
(52, NULL, 0, NULL, 4200, 12, 4684, 'stripe', 'paid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'hassan', 'Homa', 'Nasr City', 'we', '221125', '01270770613', 'mohammad', '2021-09-14 06:50:26', '2021-09-14 06:50:26'),
(53, NULL, 0, NULL, 151, 12, 147, 'stripe', 'paid', 'pending', 100, 0, NULL, 'muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'بلقطر الشرقية', 'Nasr City', 'we', '221125', '01270770613', 'mohammad', '2021-09-14 07:17:09', '2021-09-14 07:17:09'),
(54, NULL, 0, NULL, 400000, 12, 447965, 'stripe', 'paid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'بلقطر الشرقية', 'Nasr City', 'we', '221125', '01270770613', 'محمد ممدوح عبد الرحمن', '2021-09-26 18:45:00', '2021-09-26 18:45:00'),
(55, NULL, 0, NULL, 4061, 12, 4509, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '221125', '0170770561', 'محمد ممدوح عبد الرحمن', '2021-09-26 19:24:14', '2021-09-26 19:24:14'),
(56, NULL, 0, NULL, 34906, 12, 39056, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad', 'address', 'Nasr City', 'we', '221125', '0170770561', 'محمد ممدوح عبد الرحمن', '2021-09-26 19:50:43', '2021-09-26 19:50:43'),
(57, NULL, 0, NULL, 350, 12, 353, 'stripe', 'paid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'بلقطر الشرقية', 'Nasr City', 'we', '221125', '01270770613', 'mohammad', '2021-09-26 20:10:03', '2021-09-26 20:10:03'),
(58, NULL, 0, NULL, 350, 12, 353, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad Mamdouh', 'address', 'Nasr City', 'we', '221125', '0170770561', NULL, '2021-09-26 20:19:33', '2021-09-26 20:19:33'),
(59, NULL, 0, NULL, 350, 12, 353, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad Mamdouh', 'address', 'Nasr City', 'we', '221125', '0170770561', NULL, '2021-09-26 20:20:57', '2021-09-26 20:20:57'),
(60, NULL, 0, NULL, 350, 12, 353, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad Mamdouh', 'address', 'Nasr City', 'we', '221125', '0170770561', 'محمد ممدوح عبد الرحمن', '2021-09-26 20:21:45', '2021-09-26 20:21:45'),
(61, NULL, 0, NULL, 350, 12, 353, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad Mamdouh', 'address', 'Nasr City', 'we', '221125', '0170770561', 'محمد ممدوح عبد الرحمن', '2021-09-26 20:29:41', '2021-09-26 20:29:41'),
(62, NULL, 0, NULL, 350, 12, 353, 'stripe', 'paid', 'pending', 100, 0, NULL, 'admin@admin.com', 'Muhammad Mamdouh', 'address', 'Nasr City', 'we', '221125', '0170770561', 'محمد ممدوح عبد الرحمن', '2021-09-26 20:32:34', '2021-09-26 20:32:34'),
(63, NULL, 0, NULL, 100153, 12, 112132, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'Homa', 'Nasr City', 'Cairo', '221125', '01270770613', NULL, '2021-09-27 09:39:52', '2021-09-27 09:39:52'),
(64, NULL, 0, NULL, 100153, 12, 112132, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'Homa', 'Nasr City', 'Cairo', '221125', '01270770613', NULL, '2021-09-27 09:43:45', '2021-09-27 09:43:45'),
(65, NULL, 0, NULL, 100153, 12, 112132, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'Homa', 'Nasr City', 'Cairo', '221125', '01270770613', NULL, '2021-09-27 09:47:55', '2021-09-27 09:47:55'),
(66, NULL, 0, NULL, 1894, 12, 2121, 'cod', 'paid', 'completed', 100, 1, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammad Mamdouh', 'Homa', 'Nasr City', 'we', '221125', '01270770613', NULL, '2021-10-02 13:02:56', '2021-10-04 21:26:11'),
(67, NULL, 0, NULL, 8200, 12, 9184, 'cod', 'unpaid', 'pending', 100, 0, NULL, 'Muhammadmamdouh93@gmail.Com', 'Muhammadmamdouh93@Gmail.Com', 'Homa', 'Nasr City', 'we', '221125', '01270770613', NULL, '2021-10-05 17:34:07', '2021-10-05 17:34:07'),
(68, NULL, 0, NULL, 4000, 12, 4480, 'stripe', 'paid', 'pending', 100, 0, NULL, 'muhammadmamdouh93@gmail.com', 'Muhammad Mamdouh', 'Homa', 'Nasr City', 'we', '221125', '01270770613', 'mohammad', '2021-10-22 20:38:43', '2021-10-22 20:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `attributes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `attributes`) VALUES
(1, 4, 23, 2, 0, NULL),
(2, 4, 22, 4, 0, NULL),
(3, 5, 23, 2, 0, NULL),
(4, 5, 22, 4, 0, NULL),
(5, 6, 22, 2, 0, NULL),
(6, 6, 23, 2, 0, NULL),
(7, 6, 25, 2, 0, NULL),
(8, 7, 22, 2, 0, NULL),
(9, 7, 23, 2, 0, NULL),
(10, 7, 25, 2, 0, NULL),
(11, 8, 22, 2, 0, NULL),
(12, 8, 23, 2, 0, NULL),
(13, 8, 25, 2, 0, NULL),
(14, 9, 22, 2, 0, NULL),
(15, 9, 23, 2, 0, NULL),
(16, 9, 25, 2, 0, NULL),
(17, 10, 22, 2, 0, NULL),
(18, 10, 23, 2, 0, NULL),
(19, 10, 25, 2, 0, NULL),
(20, 11, 22, 2, 0, NULL),
(21, 11, 23, 2, 0, NULL),
(22, 11, 25, 2, 0, NULL),
(23, 12, 22, 2, 0, NULL),
(24, 12, 23, 2, 0, NULL),
(25, 12, 25, 2, 0, NULL),
(26, 13, 22, 2, 0, NULL),
(27, 13, 23, 2, 0, NULL),
(28, 13, 25, 2, 0, NULL),
(29, 14, 22, 2, 0, NULL),
(30, 14, 23, 2, 0, NULL),
(31, 14, 25, 2, 0, NULL),
(32, 15, 22, 2, 0, NULL),
(33, 15, 23, 2, 0, NULL),
(34, 15, 25, 2, 0, NULL),
(35, 16, 22, 2, 0, NULL),
(36, 16, 23, 2, 0, NULL),
(37, 16, 25, 2, 0, NULL),
(38, 17, 22, 2, 0, NULL),
(39, 17, 23, 2, 0, NULL),
(40, 17, 25, 2, 0, NULL),
(41, 18, 22, 2, 0, NULL),
(42, 18, 23, 2, 0, NULL),
(43, 18, 25, 2, 0, NULL),
(44, 19, 22, 2, 0, NULL),
(45, 19, 23, 2, 0, NULL),
(46, 19, 25, 2, 0, NULL),
(47, 20, 22, 2, 0, NULL),
(48, 20, 23, 2, 0, NULL),
(49, 20, 25, 2, 0, NULL),
(50, 21, 22, 2, 0, NULL),
(51, 21, 23, 2, 0, NULL),
(52, 21, 25, 2, 0, NULL),
(53, 22, 22, 2, 0, NULL),
(54, 22, 23, 2, 0, NULL),
(55, 22, 25, 2, 0, NULL),
(56, 23, 22, 2, 0, NULL),
(57, 23, 23, 2, 0, NULL),
(58, 23, 25, 2, 0, NULL),
(59, 24, 22, 2, 0, NULL),
(60, 24, 23, 2, 0, NULL),
(61, 24, 25, 2, 0, NULL),
(62, 30, 26, 2, 4000, NULL),
(63, 31, 26, 2, 4000, NULL),
(64, 33, 26, 2, 4000, NULL),
(65, 34, 26, 2, 4000, NULL),
(66, 35, 26, 1, 4000, NULL),
(94, 52, 23, 2, 100, NULL),
(95, 52, 26, 1, 4000, NULL),
(96, 53, 25, 1, 51, NULL),
(97, 53, 23, 1, 100, NULL),
(98, 54, 11009, 4, 400000, '{\"size\":\"15.6\",\"color\":\"black\"}'),
(99, 55, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(100, 55, 19, 1, 4000, '{\"size\":\"15.6\",\"color\":\"red\"}'),
(101, 55, 27, 1, 11.1, '{\"size\":\"\",\"color\":\"red\"}'),
(102, 56, 24, 1, 17000, '{\"size\":\"\",\"color\":\"red\"}'),
(103, 56, 23, 1, 100, '{\"size\":\"large\",\"color\":\"\"}'),
(104, 56, 23, 4, 400, '{\"size\":\"large\",\"color\":\"\"}'),
(105, 56, 24, 1, 17000, '{\"size\":\"\",\"color\":\"red\"}'),
(106, 56, 23, 1, 100, '{\"size\":\"large\",\"color\":\"\"}'),
(107, 56, 25, 3, 153, '{\"size\":\"x-large\",\"color\":\"black\"}'),
(108, 56, 25, 3, 153, '{\"size\":\"x-large\",\"color\":\"black\"}'),
(109, 57, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(110, 57, 23, 3, 300, '{\"size\":\"medium\",\"color\":\"\"}'),
(111, 58, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(112, 58, 23, 3, 300, '{\"size\":\"medium\",\"color\":\"\"}'),
(113, 59, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(114, 59, 23, 3, 300, '{\"size\":\"medium\",\"color\":\"\"}'),
(115, 60, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(116, 60, 23, 3, 300, '{\"size\":\"medium\",\"color\":\"\"}'),
(117, 61, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(118, 61, 23, 3, 300, '{\"size\":\"medium\",\"color\":\"\"}'),
(119, 62, 22, 1, 50, '{\"size\":\"\",\"color\":\"\"}'),
(120, 62, 23, 3, 300, '{\"size\":\"medium\",\"color\":\"\"}'),
(121, 63, 11009, 1, 100000, '{\"size\":\"15.6\",\"color\":\"\\u0623\\u0633\\u0648\\u062f\"}'),
(122, 63, 25, 3, 153, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\\u0623\\u062d\\u0645\\u0631\"}'),
(123, 64, 11009, 1, 100000, '{\"size\":\"15.6\",\"color\":\"\\u0623\\u0633\\u0648\\u062f\"}'),
(124, 64, 25, 3, 153, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\\u0623\\u062d\\u0645\\u0631\"}'),
(125, 65, 11009, 1, 100000, '{\"size\":\"15.6\",\"color\":\"\\u0623\\u0633\\u0648\\u062f\"}'),
(126, 65, 25, 3, 153, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\\u0623\\u062d\\u0645\\u0631\"}'),
(127, 66, 25, 6, 1194, '{\"size\":\"x-large\",\"color\":\"black\"}'),
(128, 66, 11072, 5, 600, '{\"size\":null,\"color\":\"\"}'),
(129, 66, 11072, 5, 100, '{\"size\":\"large\",\"color\":\"black\"}'),
(130, 67, 11073, 1, 20, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\"}'),
(131, 67, 11073, 1, 4000, '{\"size\":null,\"color\":\"\"}'),
(132, 67, 11073, 3, 60, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\\u0623\\u0633\\u0648\\u062f\"}'),
(133, 67, 11073, 3, 60, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\\u0623\\u0633\\u0648\\u062f\"}'),
(134, 67, 11073, 3, 60, '{\"size\":\"\\u0623\\u0643\\u0633 \\u0644\\u0627\\u0631\\u062c\",\"color\":\"\\u0623\\u0633\\u0648\\u062f\"}'),
(135, 67, 11073, 1, 4000, '{\"size\":null,\"color\":\"\"}'),
(136, 68, 11089, 1, 4000, '{\"size\":null,\"color\":\"\"}');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `offer_price` double(8,2) DEFAULT 0.00,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_offer_at` date DEFAULT NULL,
  `end_offer_at` date DEFAULT NULL,
  `conditions` enum('new','popular','winter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `main_categories_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `name`, `description`, `information`, `stock`, `price`, `offer_price`, `images`, `start_offer_at`, `end_offer_at`, `conditions`, `status`, `main_categories_id`, `sub_category_id`, `brand_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(11087, 'lenovo-legion-5', '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', '', '{\"ar\":\"<p>d<\\/p>\",\"en\":\"<p>d<\\/p>\"}', 25, 4300.00, 4000.00, '', NULL, NULL, 'new', 'active', 2, 9, 3, 1, '2021-10-22 19:48:30', '2021-10-22 19:48:30'),
(11088, 'lenovo-legion-5-137', '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', '{\"ar\":\"<p>d<\\/p>\",\"en\":\"<p>d<\\/p>\"}', '{\"ar\":\"<p>d<\\/p>\",\"en\":\"<p>d<\\/p>\"}', 25, 4300.00, 4000.00, '[\"uploads\\/images\\/products\\/11089\\/\\/13698197.jpg\"]', NULL, NULL, 'new', 'active', 2, 9, 3, 1, '2021-10-22 19:49:13', '2021-10-22 19:49:13'),
(11089, 'lenovo-legion-5-104', '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', '{\"ar\":\"<p>qw<\\/p>\",\"en\":\"<p>qw<\\/p>\"}', '{\"ar\":\"<p>qw<\\/p>\",\"en\":\"<p>qw<\\/p>\"}', 25, 4300.00, 4000.00, '[\"uploads\\/images\\/products\\/11089\\/\\/13698197.jpg\"]', NULL, NULL, 'new', 'active', 1, 5, 4, 3, '2021-10-22 19:51:37', '2021-10-22 19:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `products_colors`
--

CREATE TABLE `products_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `original_price` double(8,2) DEFAULT NULL,
  `offer_price` double(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `product_id`, `size_id`, `original_price`, `offer_price`, `stock`) VALUES
(167, 11087, 4, NULL, NULL, NULL),
(168, 11088, 4, NULL, NULL, NULL),
(169, 11089, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `original_price` double(8,2) NOT NULL,
  `offer_price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(4) DEFAULT 0,
  `review` text DEFAULT NULL,
  `status` enum('pending','accepted','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `rate` tinyint(4) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` int(255) DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `email`, `mobile`, `description`, `photo`, `favicon`, `meta_description`, `meta_keywords`, `facebook_url`, `twitter_url`, `instagram_url`, `created_at`, `updated_at`) VALUES
(1, 'BigDeal', 'admin@admin.com', '0170770561', NULL, 'electronics.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-17 06:02:43', '2021-10-05 15:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` double(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `delivery_time`, `delivery_charge`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pepsicola', '1 week', 100.00, 'active', '2021-08-03 10:23:47', '2021-08-03 10:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `is_public`, `category_id`, `created_at`, `updated_at`) VALUES
(4, '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', 'yes', 2, '2021-07-03 17:32:19', '2021-07-03 17:32:19'),
(5, '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', 'yes', 1, '2021-07-12 15:08:24', '2021-07-12 15:08:24'),
(6, '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', 'yes', 1, '2021-07-12 15:08:49', '2021-07-12 15:08:49'),
(7, '{\"ar\":\"\\u0644\\u064a\\u0646\\u0648\\u0641\\u0648 \\u0644\\u064a\\u062c\\u0648\\u0646 5\",\"en\":\"Lenovo legion 5\"}', 'yes', 1, '2021-07-12 15:09:05', '2021-07-12 15:09:05'),
(8, '{\"ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"en\":\"small\"}', 'yes', 1, '2021-07-12 15:09:21', '2021-10-21 08:42:53'),
(9, '{\"ar\":\"15.6\",\"en\":\"15.6\"}', 'yes', 2, '2021-10-21 08:29:02', '2021-10-21 08:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `sizes_translations`
--

CREATE TABLE `sizes_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes_translations`
--

INSERT INTO `sizes_translations` (`id`, `size_id`, `lang_id`, `name`) VALUES
(1, 2, 1, 'لارج'),
(2, 2, 2, 'large'),
(3, 3, 1, '15.6'),
(4, 3, 2, '15.6'),
(5, 4, 1, '17 '),
(6, 4, 2, '17 '),
(7, 5, 1, 'أكس لارج'),
(8, 5, 2, 'x-large'),
(9, 6, 1, 'اكس اكس لارج'),
(10, 6, 2, 'xx-large'),
(11, 7, 1, 'متوسط'),
(12, 7, 2, 'medium'),
(13, 8, 1, 'صغير'),
(14, 8, 2, 'small');

-- --------------------------------------------------------

--
-- Table structure for table `size_colors`
--

CREATE TABLE `size_colors` (
  `id` int(11) NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `main_categories_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `slug`, `name`, `photo`, `status`, `main_categories_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(5, '-381', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u062f\\u0627\\u062e\\u0644\\u064a\\u0629\",\"en\":\"under ware clothes\"}', 'uploads/images/sub_categories/image.jpg', 'active', 1, NULL, '2021-06-19 07:04:48', '2021-08-23 06:28:22'),
(7, 'sports-clothes', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0631\\u064a\\u0627\\u0636\\u064a\\u0629\",\"en\":\"sports clothes\"}', 'uploads/images/sub_categories/out-run-full-length-young-260nw-738806251.jpg', 'active', 1, NULL, '2021-06-19 07:28:25', '2021-10-21 07:43:11'),
(8, 'kids-clothes', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u0623\\u0637\\u0641\\u0627\\u0644\",\"en\":\"kids clothes\"}', 'uploads/images/sub_categories/H67a05db383314baab03bbf20b34175431.jpg', 'active', 1, 7, '2021-06-19 07:33:06', '2021-10-21 07:41:50'),
(9, '-468', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u062f\\u0627\\u062e\\u0644\\u064a\\u0629\",\"en\":\"under ware clothes\"}', NULL, 'active', 2, NULL, '2021-06-19 11:58:46', '2021-06-19 11:58:46'),
(10, '-495', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u062f\\u0627\\u062e\\u0644\\u064a\\u0629\",\"en\":\"under ware clothes\"}', NULL, 'active', 2, 9, '2021-06-19 12:00:29', '2021-06-19 12:00:29'),
(11, '-284', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u062f\\u0627\\u062e\\u0644\\u064a\\u0629\",\"en\":\"under ware clothes\"}', NULL, 'active', 2, 9, '2021-06-19 12:59:05', '2021-06-19 12:59:05'),
(14, '-190', '{\"ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633 \\u062f\\u0627\\u062e\\u0644\\u064a\\u0629\",\"en\":\"under ware clothes\"}', NULL, 'active', 2, NULL, '2021-06-19 13:02:34', '2021-06-19 13:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','vendor','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `mobile`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Proff Muhammad', 'proffMuhammad', 'muhammad@gmail.com', NULL, '$2y$10$xYvZxRXZhF1gFLrjHewimemNE.J/yBmC7qVw8bCNMlGZ56iHgHmE2', 'uploads/images/users/pretty (8).jpg', NULL, 'Balaqter Al sharkia ,Abouhommes, Albuhaira, Egypt', 'customer', 'active', NULL, '2021-09-08 14:41:27', '2021-09-09 20:19:52', NULL, NULL, NULL, NULL),
(2, 'Muhammad Abo Ali', 'mohammed-abo-ali', 'muhammadmamdouh93@gmail.Com', NULL, '$2y$10$AAswL2VUOO7JUSoy8Zff6uH71AhdzM66nFXmZ1TBN.7RX1J/t92/e', NULL, NULL, NULL, 'customer', 'active', 'u9tbKtFkxAhFgvPLelFyKND2Zst6A1fInuF6pCZ3bZPH0y6I5yNJ8o1KUeaV', NULL, '2021-09-18 18:40:20', NULL, NULL, NULL, NULL),
(3, 'Muhammad', NULL, 'hamel_elmesk75@Yahoo.com', NULL, '$2y$10$FdmCK1z4KRgZMBSjsjgg8uBeoysc9ZuGDgwPCHUSgVzElQtnEBTT2', NULL, NULL, NULL, 'customer', 'active', NULL, '2021-10-02 21:08:10', '2021-10-02 21:08:10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `main_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `mobile`, `address`, `email`, `password`, `photo`, `status`, `main_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad ', '480-812-8793', '450 Schultz Ford\nAbelardoland, NJ 69061', 'muhammad@gmail.com', '$2y$10$xYvZxRXZhF1gFLrjHewimemNE.J/yBmC7qVw8bCNMlGZ56iHgHmE2', 'https://via.placeholder.com/640x480.png/00ee66?text=ut', 'active', 2, '2021-06-18 09:33:26', '2021-10-21 07:05:27'),
(2, 'Dr. Elaina West Jr.', '430.330.8964', '95641 Fahey Viaduct\nWest Amari, ID 08486', 'pietro18@example.net', '$2y$10$S62BS7DipYqbjG0vX6dTF.mZfq7mt5Ag4Tz5PVLLjN.5lGpPHdxG6', 'https://via.placeholder.com/640x480.png/00ccbb?text=rerum', 'active', 2, '2021-06-18 09:33:26', '2021-10-21 07:05:27'),
(3, 'Ramon Schmidt', '480.944.3857', '83684 Schowalter Center\nLessieberg, MA 63492', 'gonzalo10@example.net', '$2y$10$0W8./utK5gJgESrXTK/Ple9ba7qxU1RtTwzZhWWNbxCJGXNrfHMi2', 'https://via.placeholder.com/640x480.png/000088?text=dolorum', 'active', 1, '2021-06-18 09:33:26', '2021-10-21 07:04:58'),
(4, 'Moises Shanahan', '(239) 257-6696', '37833 Blanda Fields Suite 638\nMaxiemouth, NE 10532-6742', 'jacobson.logan@example.net', '$2y$10$CyaSJQOfLgUw4kyKHE9JiOxgsFkowg.9qlLDrWRhNxWgRFJll1oaq', 'https://via.placeholder.com/640x480.png/00ff22?text=aliquid', 'active', 2, '2021-06-18 09:33:26', '2021-10-21 07:05:27'),
(5, 'Dr. Dessie Rowe', '(360) 561-9441', '655 Abshire Brooks Suite 586\nPort Harmony, HI 13049-0363', 'halvorson.loma@example.net', '$2y$10$yJ6POLbv5pqkUDzyfuAPruCUGp1ayo/plUCnT2A38ilRbMB1RlpqW', 'https://via.placeholder.com/640x480.png/0000aa?text=sunt', 'active', 1, '2021-06-18 09:33:26', '2021-10-21 07:04:58'),
(6, 'Mr. Francesco Ernser', '+1 (859) 850-0307', '1473 Lorine Drives Apt. 320\nPort Erling, SD 17691', 'jacobs.kenneth@example.org', '$2y$10$oXKvmKP0m9F9qDSmV4xxxurha1bgrLg/TXeernN4nmsk8vAJKDU/S', 'https://via.placeholder.com/640x480.png/00aa00?text=expedita', 'active', 2, '2021-06-18 09:33:26', '2021-10-21 07:05:27'),
(7, 'Jarred Gaylord', '+1 (843) 343-4115', '183 Karlee Mews\nStreichmouth, DC 01607-5135', 'shanny69@example.com', '$2y$10$8vYgFtpUpdwNUdibgwnjFOvKMIJXNUuwxV.F4iedkqtTobKBJq8zq', 'https://via.placeholder.com/640x480.png/002233?text=deserunt', 'active', 2, '2021-06-18 09:33:26', '2021-10-21 07:05:27'),
(8, 'Stephany Jast', '+1-336-710-9021', '21493 Lang Mountain Suite 063\nTheaside, OR 12380-3981', 'demond.jacobson@example.org', '$2y$10$TzJql70zJs0JKc74bt7sgOzZZlLgxPlaC8fU0PQMjWlFsdSOlEKwu', 'https://via.placeholder.com/640x480.png/00bb99?text=quod', 'active', 1, '2021-06-18 09:33:26', '2021-10-21 07:04:58'),
(9, 'Mr. Karson Cormier', '816.961.8989', '12029 Elenor Station Suite 053\nLake Berthaside, PA 03512', 'terry.delbert@example.org', '$2y$10$WicLGqNOCEDPl1Q8LLRJ.OfAJ6PnMPC3tNNBKGMyESbDpftTwg/IG', 'https://via.placeholder.com/640x480.png/00ee99?text=suscipit', 'active', 1, '2021-06-18 09:33:26', '2021-10-21 07:04:58'),
(10, 'Amely Mertz', '213.738.2695', '791 Marianne Roads\nHowellmouth, NC 92637-5531', 'melba.marquardt@example.com', '$2y$10$SVTfO530EZcwlyNgy/vzo.fqUg0B9oaNS2P2i77Oi42Y2OiXSlcH6', 'https://via.placeholder.com/640x480.png/00ffff?text=exercitationem', 'active', 1, '2021-06-18 09:33:26', '2021-10-21 07:04:58'),
(11, 'Grace Ferry', '+1 (657) 556-5106', '971 Weber Views Apt. 745\nLake Treyton, VT 04941-4856', 'harmony.dickinson@example.net', '$2y$10$H1e1KwZ2hQnIz8zCwNnAi.l2Y5m/K.6Jz347t5NQEaP4koq7ztq9.', 'https://via.placeholder.com/640x480.png/004488?text=unde', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(12, 'Avery Purdy', '+1-380-778-7661', '8415 Cecil Shore Apt. 593\nEast Jaylinhaven, AL 12223-6763', 'kip.jacobs@example.org', '$2y$10$svQvMePuzitkYSAWo9Ay9O9l9rILnlA36z6YoCQMZqtuo53HxzhYK', 'https://via.placeholder.com/640x480.png/008899?text=omnis', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(13, 'Prof. Dannie McCullough IV', '+1-858-591-6901', '348 Jaron Inlet Apt. 711\nJaylanbury, IL 00441-9006', 'ferne.stoltenberg@example.com', '$2y$10$tqMxdq5HamD36LXnLGSc8.WhW5GqEUuWzFmY6xGTLHXd4OPROdTL2', 'https://via.placeholder.com/640x480.png/008899?text=qui', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(14, 'Judy Ankunding II', '520.293.3116', '9161 Monty Courts\nJacklynhaven, ND 43523', 'mayer.antonietta@example.net', '$2y$10$uygXuxt58Psv8BnHPoTFX.rvJ58pkCIAHaTuKZUluBA19.lrMvh0m', 'https://via.placeholder.com/640x480.png/009900?text=suscipit', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(15, 'Alana McGlynn', '689-717-1600', '6614 Wolf Flats\nWehnerton, VT 27573', 'mwelch@example.com', '$2y$10$WXkYtGUTf6g5ZyV7edNa/uRk/oy8lmvgPBNI55lyWtmKTqw6sbiZW', 'https://via.placeholder.com/640x480.png/00dd33?text=impedit', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(16, 'Prof. Pete Ondricka', '1-262-220-6956', '4263 Randal Vista\nGutmanntown, MA 99415-8728', 'goreilly@example.com', '$2y$10$8Lpq0f0PTrh7r.242yXxzOwj1sMOePvy/Rxqvsqhlim8BVBT9EMA2', 'https://via.placeholder.com/640x480.png/0066ff?text=sint', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(17, 'Prof. Arvel Senger MD', '+1-903-759-6405', '799 Stroman Forks Apt. 572\nPort Caterina, LA 53590-1513', 'fausto.pacocha@example.net', '$2y$10$GauTx.PS6d3shFEd.8RKyOdNgfVBGOBmI/K60pm5g0scW2drcIdci', 'https://via.placeholder.com/640x480.png/0044aa?text=fugit', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(18, 'Miss Brandyn Reinger', '(878) 628-3490', '844 Rhoda Street\nHumbertoburgh, HI 50084', 'lulu74@example.org', '$2y$10$vqcA5roZvdJS9AsinWBGG./9H5AMI.ImUgDJeNwx45ps23z6hzA46', 'https://via.placeholder.com/640x480.png/00dddd?text=dolore', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(19, 'Deshawn Lesch', '+1.231.374.0220', '10474 Hazel Center\nJulietburgh, DE 35607', 'jerald.gutkowski@example.net', '$2y$10$knY3gGVv7f0jD4VooVmrFOVfjd7Jyl7CRZ/hy9EfJQJYX4KDObuD.', 'https://via.placeholder.com/640x480.png/00ff55?text=accusantium', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(20, 'Myah Cummerata', '+1 (804) 505-2265', '772 Joan Forks Apt. 273\nNorth Lonnietown, IL 33093-4267', 'bailee.bergnaum@example.org', '$2y$10$GtzcHHWGdRqDTSynKK4Rteu8Jxvl2aDghPRX0o2FUHIdCwcNI3Nom', 'https://via.placeholder.com/640x480.png/0033dd?text=et', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(21, 'Zoie Krajcik', '1-901-258-1121', '1098 Mavis Crossing Apt. 295\nNew Samanthafort, IA 99443', 'mina.ritchie@example.net', '$2y$10$KnLuNRDZFvF7qQS42gK6F.7lFtgoCDyE8XvGFxmZ7H8Tpbe0wocJG', 'https://via.placeholder.com/640x480.png/0044ee?text=odit', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(22, 'Leonard Jones', '(641) 791-1708', '452 Newell Inlet\nPort Hubertport, CA 51772-8051', 'ilindgren@example.net', '$2y$10$941Uuug8O7SAjNvTIBs2sePlupPJBp57j36U15l.0KyrbF0ONP6pW', 'https://via.placeholder.com/640x480.png/00bb88?text=vel', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(23, 'Kaleigh Klein', '415-343-8994', '598 Annamarie Forges Apt. 261\nHandfort, ND 83676-9018', 'brendon.hudson@example.org', '$2y$10$o/uTWj9LAi7tJQSqNUWuV.qt.XwM8T1FOPrAFcUorADywBzHZChnu', 'https://via.placeholder.com/640x480.png/00aa44?text=aut', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(24, 'Maia Corkery', '651.755.4565', '64592 McDermott Lodge Apt. 169\nAngelafurt, VA 23549-1969', 'jamal12@example.com', '$2y$10$ybh9rMdi.5pWrCgRl.qpOucHPl9LOoqdK.vyksMCChm80xSIJRmpu', 'https://via.placeholder.com/640x480.png/009999?text=accusamus', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(25, 'Corene Bins', '(216) 956-6414', '6467 Gabe Terrace Apt. 452\nLayneport, TX 93057-8201', 'vheathcote@example.net', '$2y$10$.Skh8R3QSxyLXF8EigRIkeBTEAf5RVpkhv9KydGM5tb6Kr15de1x.', 'https://via.placeholder.com/640x480.png/004466?text=et', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(26, 'Rosalyn Rippin', '+17018465880', '5269 Welch Club Suite 266\nAbelside, CT 94587-1049', 'harris.evangeline@example.com', '$2y$10$SkbjAQkj1o0gl1k4cbbkHuhbOvc7Jf5Kr/2lCwUJoWWgyilhdX47m', 'https://via.placeholder.com/640x480.png/009933?text=molestias', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(27, 'Jazmin Funk', '+1-240-730-1810', '237 Kerluke Corners Apt. 804\nMcDermottborough, GA 46155', 'wilbert99@example.com', '$2y$10$reEfIAcdryI4U2de2IZ6Oe82g2ckvCBoueY3/Ukj2FHhWIc7tijla', 'https://via.placeholder.com/640x480.png/005500?text=inventore', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(28, 'Shyann Hintz', '551.973.8515', '30728 Makenzie Plains Apt. 369\nTimothyberg, IL 40566-1855', 'malika.nitzsche@example.com', '$2y$10$IJv8eD0Vk3JfPb1TWg9agO2WEfHK/Ts/95Q8Y0TGStgXqo/DbcghC', 'https://via.placeholder.com/640x480.png/0066ff?text=voluptate', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(29, 'Lincoln Mosciski', '+1-325-461-7216', '26929 Tremblay Cliff\nRosenbaumland, OH 53243-9521', 'erdman.kurtis@example.org', '$2y$10$ij//FTIxu977LTkR/gQgJ.xy0NvFPWQ91s2tmV/Ay3LRnkJ3mkmD6', 'https://via.placeholder.com/640x480.png/003366?text=eos', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(30, 'Orie Considine', '765-899-4968', '66932 Sunny Brook\nGeorgianafurt, OK 72818', 'lesch.erika@example.org', '$2y$10$kn9b4GJVqSj3/KWaaJXVIOqUIPIEwZ7/TxtTwcT0FUBsvg6XhCnt6', 'https://via.placeholder.com/640x480.png/00cc88?text=et', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(31, 'Harrison Moen', '+1 (820) 515-3359', '88121 Bashirian Shoals\nLockmanfurt, WA 57381-9928', 'maci.conroy@example.net', '$2y$10$dbBTLY5K5leUgx4tzT3eFOSRa3oqMhkeYoVIO8MIrE.gXc0kLPKKq', 'https://via.placeholder.com/640x480.png/009933?text=aut', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(32, 'Dr. Jazlyn Klein', '810-933-7251', '41187 Langworth Brook\nNorth Tyreseshire, AR 57774-7558', 'murphy.lucas@example.org', '$2y$10$pLqqkt/J2BLOLesrgOKTNeymEPpEOeRcMZry7GTkUhKu0lBHXLzRO', 'https://via.placeholder.com/640x480.png/002233?text=omnis', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(33, 'Mrs. Iva Cartwright II', '952.521.5312', '501 Guy Inlet Suite 838\nStiedemannbury, SD 65784-9790', 'savanna91@example.net', '$2y$10$VD2m3G0TeZDLkx9uOjXc4OgODKz0COYCjtGQpGVb462RPNvQrhMJK', 'https://via.placeholder.com/640x480.png/00bbcc?text=nemo', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(34, 'Ramon Fay', '1-858-313-4361', '2455 Raynor Track\nJonview, OK 30605', 'hartmann.stephen@example.com', '$2y$10$xHau1QbzIK1r0BpfLy0cLuxrq37IfCFLQFfe9JoyG9zuuxdUOpBVC', 'https://via.placeholder.com/640x480.png/000055?text=quam', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(35, 'Jennyfer Steuber', '424-466-9677', '6067 Shakira Radial\nWest Jean, MN 16754-7867', 'dylan.keeling@example.net', '$2y$10$VNZ9uyr7Pn1to5vxgkJIbuG9ANWcICV4ZM8K./.9nfa3tpObqO9H.', 'https://via.placeholder.com/640x480.png/0033bb?text=accusantium', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(36, 'Domenick Douglas', '+1 (838) 328-7774', '5922 Harmony Squares\nLilianmouth, AL 64287', 'hertha.champlin@example.net', '$2y$10$ut8029hSemJERffzrpvx.eWYWuMvgOcaDTJa/gdSOCTm668CZBNSW', 'https://via.placeholder.com/640x480.png/0099ff?text=ut', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(37, 'Cleora Turcotte', '872-979-5113', '5535 Jaime Ports\nCummingston, UT 54130', 'viviane93@example.org', '$2y$10$GV3JU4S2zXJXannYCm.JuOVhn9MbscHFW359SbqYF8V3.ujLXNLB6', 'https://via.placeholder.com/640x480.png/0099dd?text=ut', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(38, 'Don Bechtelar DVM', '786-317-2034', '745 Sarah Islands\nDenesikhaven, CO 94528-5551', 'conn.albin@example.org', '$2y$10$.B44Ht9Yc.21zFClqtI4DO9tQK1vykaAz5o6WMInCpj5AFUyIGr96', 'https://via.placeholder.com/640x480.png/0011ff?text=commodi', 'active', 1, '2021-06-18 09:33:27', '2021-10-21 07:04:58'),
(39, 'Nelle Harber', '+1 (520) 326-4408', '218 Runolfsdottir Road\nNew Demarcusland, DC 45744', 'dach.milo@example.net', '$2y$10$sD7D2CUdVQC85EnYtYXtD.4KCvYSzCMSituaUkSHatxhWVVNfQqoa', 'https://via.placeholder.com/640x480.png/0022cc?text=sunt', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(40, 'Hollie Trantow', '+1.985.872.0080', '56371 Schoen Turnpike Apt. 246\nFeestton, LA 09599', 'feeney.darryl@example.net', '$2y$10$dStNjbVvclKpgnZ6icYhh.NLZppAbsiOGHcU/wzALmdnMCxuxyIpy', 'https://via.placeholder.com/640x480.png/00aaee?text=labore', 'active', 2, '2021-06-18 09:33:27', '2021-10-21 07:05:27'),
(41, 'Prof. William Beier', '458.969.1941', '58864 Walsh Well\nTorphychester, ME 89284', 'feest.ashly@example.com', '$2y$10$2XGatk8/0UAvV1cvLlcN2Og.hN.ReTXD1SYS9IPrwIIoqJUmL0vcO', 'https://via.placeholder.com/640x480.png/00dd99?text=aut', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(42, 'Alf McClure DVM', '+19845675542', '82516 Leola Courts Suite 746\nCummeratafurt, AL 26352', 'maria68@example.org', '$2y$10$MyebzqHuz2069CtdcLTAdedhDVxD7gcdM.vsSXDEpAsB9MO9uMUTe', 'https://via.placeholder.com/640x480.png/009944?text=quis', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(43, 'Elouise Durgan', '231.448.4213', '6417 Jacobi Forge\nSouth Jodyfort, IL 46686-0265', 'mara.gerhold@example.net', '$2y$10$hZcSnj31STcZlV0mNLEeGOE0E4WjoTmheK8Q9UIi2z5tRP05o2SuO', 'https://via.placeholder.com/640x480.png/00aaff?text=nisi', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(44, 'Ms. Jaqueline Beer DVM', '+1-959-650-8891', '905 Kailey Mills\nWest Ayana, NM 54353-6158', 'wilhelmine.rau@example.net', '$2y$10$2ziEmI2QGlG1XkgUmNazpO6Eklh3cI7H.JjcQ59qXfe/SMzTAXvWq', 'https://via.placeholder.com/640x480.png/00ffff?text=quibusdam', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(45, 'Kenya Wiza', '(845) 519-6185', '945 Zack Alley Suite 220\nPort Susanberg, IN 60695-9438', 'connelly.rose@example.net', '$2y$10$FOrm3VWu0O3g4fBNS4HGf.o0Jtui0f9OUKJr7aC5FKxkugCnIBFQW', 'https://via.placeholder.com/640x480.png/0088ee?text=a', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(46, 'Mrs. Kelli Heller Jr.', '1-847-877-4009', '82020 Legros Mission Suite 990\nLake Cleo, IN 90372-5469', 'lockman.cordie@example.org', '$2y$10$QJ4hJbkgqAtdNMdevDw3PuyMS0xJDt4YN3eLJUqQr2dNwILszXLo2', 'https://via.placeholder.com/640x480.png/000011?text=itaque', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(47, 'Ludwig Heller IV', '1-918-628-7541', '7945 Beahan Burg\nTreutelshire, ME 10272-0498', 'msawayn@example.org', '$2y$10$e.EBsXdMAP3wYMEr5OP3keIqYFUoczZIAldzN/i1ySBo.Z.0hxMxm', 'https://via.placeholder.com/640x480.png/007799?text=iusto', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(48, 'Antone Weimann', '915-704-1651', '22329 Hessel Greens\nPort Marinashire, UT 67971', 'eudora08@example.org', '$2y$10$cab.BKASXjwO3W3C9m22Fec39yQ11u9H6snPK/SCZC/jOUYOkzv9q', 'https://via.placeholder.com/640x480.png/00dddd?text=aut', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(49, 'Clint Borer', '1-938-501-3494', '5039 Prohaska Canyon Apt. 164\nLake Delaney, NE 87389-6558', 'tyrese81@example.org', '$2y$10$M6MJ3girPr/x7PGyrGWJ3OkxjZVVz3URAY8wc13RyFgY0QI09Hv/i', 'https://via.placeholder.com/640x480.png/008877?text=saepe', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(50, 'Brianne Bailey', '253-771-1101', '9319 Fay Island Suite 122\nLake Chadview, WI 25402-1496', 'eichmann.alexys@example.org', '$2y$10$EIVlFhtUQHWMStMh22N80eG8/ZYTk45075n1xXdYvSFmjthqkax3C', 'https://via.placeholder.com/640x480.png/001100?text=minima', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(51, 'Shad Jakubowski', '701.547.2124', '28247 Weimann Field Suite 174\nEast Jamarcusside, NY 71357', 'barrett.mertz@example.net', '$2y$10$xr7qkncW/G5626VYdnodOeOfThU3WlHiQWgak0PWVQtqBfnvC4Rhi', 'https://via.placeholder.com/640x480.png/009933?text=error', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(52, 'Prof. Orion Ullrich', '(351) 973-0445', '5353 Gutkowski Locks\nNorth Adaline, AR 52239', 'daisy00@example.org', '$2y$10$szNNgwYDouPoaF4qwMnjW.Jbp94EIqqij1Vf7RbnYqXs0aXvLKf/y', 'https://via.placeholder.com/640x480.png/0099ee?text=velit', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(53, 'Nia Bahringer II', '1-223-924-0110', '647 Allene Villages\nEast Antonietta, CO 08637', 'schowalter.hoyt@example.com', '$2y$10$9i/0NBrY2oA65fsdmdCajOFlGv9P9cFwq8Fzi4A/MhzWcF.aAtZ/y', 'https://via.placeholder.com/640x480.png/0011ff?text=unde', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(54, 'Mercedes Feest', '770-963-8339', '5057 Abernathy Locks\nKasandrafort, CA 24083-3396', 'enrico.larson@example.com', '$2y$10$5jLYeOucjdsXnjuYmHmwieIcDirCchdzPjIYtOnfLsDqqwzVdcNSm', 'https://via.placeholder.com/640x480.png/0077aa?text=commodi', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(55, 'Dewayne Casper', '1-309-728-6322', '896 Julia Light Apt. 414\nLake Rubyehaven, FL 73452-2279', 'hdeckow@example.org', '$2y$10$Smbo6sRMMeHWdPwLPQoYsO25rWjFmuN6CAs0O.JOD89iu4shtUBX2', 'https://via.placeholder.com/640x480.png/0077ff?text=eum', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(56, 'Uriel Graham', '+1-616-289-3557', '483 Stephan Coves\nHuelsmouth, IN 93875', 'osanford@example.com', '$2y$10$bR3/fAyritWBc7BlYR6Rx.vf6nUoPFyL2cmXR/O3D1mXzjRVAqMG.', 'https://via.placeholder.com/640x480.png/00ffdd?text=eum', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(57, 'Ali Howell', '979-368-3983', '63184 Borer Burg Apt. 994\nBrianahaven, MI 71663-9952', 'brice32@example.org', '$2y$10$Ni/VD2gSCaNAhsZOXFyHGuuxkMSsMxBuKpY8rlu8IAGcxAPY0NzFa', 'https://via.placeholder.com/640x480.png/005511?text=tempore', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(58, 'Prof. Maci McClure', '(228) 752-2981', '14351 Hettinger Hills\nVernonfurt, OR 52295', 'vallie46@example.com', '$2y$10$ION18Bun84hQKUbFDDQThO/fuxtpD7sMuqOpBSj1TRYgW94/EFlI2', 'https://via.placeholder.com/640x480.png/00aa88?text=voluptatibus', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(59, 'Tristin Sipes PhD', '+1.774.333.9385', '260 Johnston Land\nSouth Alexzander, UT 48041-0634', 'norris38@example.com', '$2y$10$GMDVuKwKg65CYwJmYw/0uugfM.LeW6Xca6Uhjh3U7jhpAywuCD8CS', 'https://via.placeholder.com/640x480.png/00eedd?text=expedita', 'active', 1, '2021-06-18 09:33:28', '2021-10-21 07:04:58'),
(60, 'Aisha Runte', '1-513-638-9658', '467 Altenwerth Lodge Apt. 458\nSouth Kamronchester, MD 11771', 'sigrid.kulas@example.net', '$2y$10$Soxu3RG67ucVinvKWBOmpOB97GSyDPkF4cKeSQKawv.eCzqGa1kra', 'https://via.placeholder.com/640x480.png/00ddbb?text=temporibus', 'active', 2, '2021-06-18 09:33:28', '2021-10-21 07:05:27'),
(61, 'Patrick Hagenes DVM', '+1.262.252.6129', '225 Fritsch Row\nLake Cecilia, MI 40954-9923', 'kilback.jarred@example.org', '$2y$10$3ukNxWCZpwX4oTABovxdcOQQueBaZt4bzh/rm9JeOx1OhEiinGwim', 'https://via.placeholder.com/640x480.png/00ff77?text=nesciunt', 'active', 2, '2021-06-18 09:59:16', '2021-10-21 07:05:27'),
(62, 'Clair Jacobi', '+1 (458) 519-6688', '1564 Wiegand Roads Suite 093\nPort Axel, MO 25279-0349', 'kkris@example.com', '$2y$10$HrrANjlcFjnHxaIbyPwSbOuWp2W5sgBCZJT8QHvN2kads64Rhqvvi', 'https://via.placeholder.com/640x480.png/00cc77?text=consectetur', 'active', 1, '2021-06-18 09:59:16', '2021-10-21 07:04:58'),
(63, 'Dr. Elbert Torphy', '+1.979.492.2952', '1293 Aleen Port\nNew Zita, ID 89490-6094', 'wade90@example.com', '$2y$10$gqE7OIDvwAcXxKsXTCq1kuvGlfRP7Q92dLZOewd8AV4UurspHFTNG', 'https://via.placeholder.com/640x480.png/004455?text=eligendi', 'active', 1, '2021-06-18 09:59:16', '2021-10-21 07:04:58'),
(64, 'Miss Mylene Muller III', '815.206.2205', '779 Vaughn Lodge Suite 184\nLake Sophie, FL 14455', 'leannon.cydney@example.org', '$2y$10$yAW2nKdlq0gb2vR/VDAqueGmgOIZ7FbXh5US6W4LeiciuXfmNL7ve', 'https://via.placeholder.com/640x480.png/00eeee?text=et', 'active', 2, '2021-06-18 09:59:16', '2021-10-21 07:05:27'),
(65, 'Darwin Dare', '224.441.3373', '286 O\'Kon Lock\nLake Elbertfurt, AZ 93757', 'antonio90@example.org', '$2y$10$S2mSPqVueikuSCEahWNmD.TNCXML3fqhUQZ1/6KDa39uYzCRu.WyW', 'https://via.placeholder.com/640x480.png/00ccee?text=quos', 'active', 2, '2021-06-18 09:59:16', '2021-10-21 07:05:27'),
(66, 'Ivy Pollich Sr.', '1-938-594-5304', '9760 Feest Cliff Apt. 689\nLake Cielostad, MS 48860-1682', 'luciano08@example.com', '$2y$10$O2CR.iJeJ5O/EyOnRO8RHe58tszyCCaRCwte8psErSBjRELpisaVi', 'https://via.placeholder.com/640x480.png/00bbff?text=et', 'active', 2, '2021-06-18 09:59:16', '2021-10-21 07:05:27'),
(67, 'Webster Yost', '+1.765.559.9046', '6128 Annabelle Park\nDavischester, IL 30690-5061', 'nwitting@example.net', '$2y$10$msN6nquRw1nFkYBv7M1P6O6RpEmeuhl/OmVK2P30w6QgPOaIrP79G', 'https://via.placeholder.com/640x480.png/006699?text=et', 'active', 1, '2021-06-18 09:59:16', '2021-10-21 07:04:58'),
(68, 'Miss Roberta Dickens DDS', '(254) 784-4160', '353 Kihn Valleys Suite 477\nNew Terrance, OH 95127-5410', 'brock.schuster@example.com', '$2y$10$EatFdHoIU.SI6VpFBKNKWeh4p77fMVaDdCpJLhtG2Ae5Y9jIxUD7S', 'https://via.placeholder.com/640x480.png/006633?text=libero', 'active', 1, '2021-06-18 09:59:16', '2021-10-21 07:04:58'),
(69, 'Mr. Luciano Blick', '(240) 673-5822', '53401 Dawn Plaza\nErnestbury, HI 70350', 'white.vito@example.org', '$2y$10$xrWUHGxyzNbQgMNI1v1YveL352UWLkWY1kxCgVBuMt5ENy.cSM3Ai', 'https://via.placeholder.com/640x480.png/00ee55?text=molestiae', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(70, 'Kristy Padberg', '(760) 691-3488', '958 Lizeth Springs\nSouth Grady, IN 84264-2455', 'garnet68@example.org', '$2y$10$39p2uboKmPdWJEaANcm19uBg1juOPBayLrPzsalijOvBAA5yKm.76', 'https://via.placeholder.com/640x480.png/00ffee?text=harum', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(71, 'Miss Alexandra Hauck', '+1-424-715-6484', '6407 Durgan Extension\nNew Torranceborough, VA 21550-0452', 'sunny76@example.net', '$2y$10$NM97nSzNz99r2/j8v53cxuI7./8k.IRC4gE7fzeEOEyomEgicTAZe', 'https://via.placeholder.com/640x480.png/004488?text=sunt', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(72, 'Esteban Heaney', '+1.207.604.9538', '74496 Kurt Forge Suite 736\nCierrachester, WI 51447', 'schumm.joe@example.com', '$2y$10$Goe/KzJkv7kpS7PGe2p3VOFkyYxcfvO4LFMTJYIVqBbnHFzalnaIe', 'https://via.placeholder.com/640x480.png/00bb11?text=qui', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(73, 'Mr. Elton Rippin PhD', '+1 (909) 215-5285', '654 Green Union\nLake Brannon, SD 84160', 'wkozey@example.org', '$2y$10$ZOgBFXiZ0bVD4YvbCQc8HeHftKg0WtdM3XcCF.x8OzIievaGWUO0e', 'https://via.placeholder.com/640x480.png/000033?text=quis', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(74, 'Santino Ledner', '+1-878-872-7266', '3871 Lauretta Shoal\nNorth Dallasfort, WY 91386', 'esperanza36@example.net', '$2y$10$gwOerLxIBCsyu4NwsOkBiOTQLfiTxOFPfvWjuohrKLpVwliJKk9qy', 'https://via.placeholder.com/640x480.png/00ee33?text=aut', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(75, 'Thad McDermott', '(334) 882-3433', '159 Cartwright Circle Suite 090\nWest Deon, MS 77343-3640', 'kub.jacklyn@example.org', '$2y$10$u85kYRvQb694NgFlE59SoOEnv1o2K4rq8IYoJkdu7MdZ87tsuqKOW', 'https://via.placeholder.com/640x480.png/00bb66?text=aut', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(76, 'Thaddeus Denesik', '423-250-8592', '5170 Schuppe Station Apt. 950\nPort Dawn, GA 33728', 'qabernathy@example.net', '$2y$10$siRTQZBcd1o9wuCXdS7vNeSh59FI/Zr1zlkXLeZFLVeOlkJXxmL92', 'https://via.placeholder.com/640x480.png/00ff55?text=aut', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(77, 'Prof. Katlyn Walsh DDS', '+1.262.512.9524', '27139 Morissette Rue Apt. 267\nSouth Leorabury, MD 69634', 'cummerata.felix@example.org', '$2y$10$z6FiLU.jDdW3n2ndJn.c2u3MZP7wEU//YbQN.HjX/ouPRx1Vk.GV6', 'https://via.placeholder.com/640x480.png/005599?text=cum', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(78, 'Arno Miller', '1-870-408-1600', '848 Charity Grove\nMarcelinobury, NC 59781-4979', 'mnader@example.net', '$2y$10$CqI0w0bav4Cl0ji8iuInk.CHspcw1Fry7y.zhI16L.CcnMkUOTvJe', 'https://via.placeholder.com/640x480.png/007755?text=in', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(79, 'Eli Erdman', '470.781.7990', '958 Verda Bridge\nNew Kadeton, MI 05897', 'selena.nikolaus@example.com', '$2y$10$fwfSD.Urr3s0Afq9AVphUurp.Ymtjox.2WjoN1EWU3M1rC7Xf0one', 'https://via.placeholder.com/640x480.png/000022?text=soluta', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(80, 'Santina Mitchell', '+1.629.599.1865', '39323 O\'Reilly Ferry Suite 300\nPort Bennettmouth, IL 56534-5710', 'ylesch@example.net', '$2y$10$Gn/.wh6LJKkm73x.KNuETe9dqWAgJ/0ikMHs4tXZV8wLl4tVPG/8m', 'https://via.placeholder.com/640x480.png/001188?text=eum', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(81, 'Prof. Kiley O\'Conner III', '1-863-934-5727', '525 Powlowski Green\nWest Dinofurt, MO 68015', 'ubeer@example.net', '$2y$10$k6JuXfrZExsoEKMpFJTds.9ruYqXgfrN/lUO/eeQhNoIkeJ9Z7EZa', 'https://via.placeholder.com/640x480.png/00bb44?text=quod', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(82, 'Dusty Botsford', '419-698-4737', '4464 Roberts Shore\nSouth Jamarcus, DE 10650-3786', 'ohoeger@example.com', '$2y$10$abQcalls6z/k8AMXEn4AouFThHidLNuNPxHe7Vl9vNhZBt/73.wf6', 'https://via.placeholder.com/640x480.png/008844?text=maxime', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(83, 'Pete O\'Connell', '+1.517.290.2862', '5878 McCullough Loop Apt. 460\nLindseystad, NY 21235-4078', 'hschultz@example.org', '$2y$10$RGhBjFcSZHIcx6BQ9G3rEuUc6sISVwnFrdngkCls4kp5RkO3IT1VO', 'https://via.placeholder.com/640x480.png/0044bb?text=eaque', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(84, 'Miss Vita Zemlak I', '+1-380-377-2804', '56263 Schulist Square\nLake Tessie, MI 09652-0721', 'mayer.bart@example.net', '$2y$10$LjbgnngEOTvCeSvb81nPLuiE5El6lV15OuOEf9MA7MbFIf5i.mR.W', 'https://via.placeholder.com/640x480.png/009977?text=illo', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(85, 'Cathy Nolan', '(660) 650-3531', '66571 Armand Field Suite 186\nLake Bernardland, KY 97108', 'lempi.blick@example.org', '$2y$10$DmQpuTX7mXJxasve8epIBe4roBf4A8UssSwDScvJP71LXqkDYzSJa', 'https://via.placeholder.com/640x480.png/0011aa?text=voluptatem', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(86, 'Emily Cummings', '(534) 940-5947', '30240 Sanford Club Suite 077\nSauerbury, OR 25779-4260', 'geo69@example.com', '$2y$10$k3KOCLtXwnu0X1pnTLjvnei4yUgL7N5Be.zpAI6GLkfQw6SDvpPgK', 'https://via.placeholder.com/640x480.png/0088cc?text=ut', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(87, 'Corene Wunsch', '1-630-314-3425', '76368 Parker Motorway Apt. 432\nNorth Jeromy, VT 46073-5951', 'goldner.newell@example.net', '$2y$10$olHo9sDVfCTaSJoSv9RE6.fUawIkvOnvvWszt1gP0ogTrOBapPs2y', 'https://via.placeholder.com/640x480.png/00dd88?text=aut', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(88, 'Scarlett Donnelly', '(463) 788-4087', '718 Karine Inlet Suite 044\nJarretstad, MT 26900', 'tdeckow@example.net', '$2y$10$0E9WBYsXt8CwwL.fgIiBuu9O8vXhAfKPcB/9XYpvFDjfENOo0wxYC', 'https://via.placeholder.com/640x480.png/004400?text=iste', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(89, 'Jaiden Cruickshank', '+1.947.214.0798', '69325 Izabella Radial\nHubertbury, MT 72570-7484', 'jayne78@example.org', '$2y$10$BPodlcffocIhEKyBziW3Z.u5NJm6RqIVOyFdiMS9lqm/qlBJ2xrhS', 'https://via.placeholder.com/640x480.png/0022bb?text=dolorem', 'active', 1, '2021-06-18 09:59:17', '2021-10-21 07:04:58'),
(90, 'Laverna Hermann DVM', '252.570.9854', '29219 Emil Springs Apt. 325\nEast Stevie, ID 81189', 'everardo.crona@example.net', '$2y$10$SeD6VoTGc2YUT2qnq.SaI.tghhqTg85pqHVbe0Q2ZRb9uviZG6umu', 'https://via.placeholder.com/640x480.png/002288?text=at', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(91, 'Mr. Soledad Wintheiser', '+1-234-938-8788', '89245 Wisoky Center Suite 161\nLefflertown, UT 47655', 'ubode@example.com', '$2y$10$xpgM1wQuJz20SAzT.x0OwOi15khsxkWuPTAMuSS406inOZCPA/kZ.', 'https://via.placeholder.com/640x480.png/00bbcc?text=tenetur', 'active', 2, '2021-06-18 09:59:17', '2021-10-21 07:05:27'),
(92, 'Kenton Hirthe', '+14803894460', '61366 Kuhn Garden\nSouth Agnesburgh, TX 16641-6362', 'alia.graham@example.com', '$2y$10$LLH7ZNiFioVPl7Ptr6HcXOnGfvNuinhYtu2eqvNd8LvZ3T.33m0dC', 'https://via.placeholder.com/640x480.png/001133?text=quibusdam', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(93, 'Sonny Volkman', '539.848.4206', '79324 Bruen Valleys\nLake Keith, OR 45905-8561', 'blaise.waelchi@example.net', '$2y$10$XH5PS9Ui4LD.K9MoJ67RcOrCaOoycrfytJoXSkk2O4lpQGzTGzXr.', 'https://via.placeholder.com/640x480.png/004400?text=dolor', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(94, 'Clinton Greenfelder', '(608) 325-8471', '52858 Kolby Views\nNorth Kaileetown, MT 79142', 'fhodkiewicz@example.org', '$2y$10$/SI0SJvhD53u6KgWI0c75elXu50hg3R.xiudqAM/CGj8lo5iFS3le', 'https://via.placeholder.com/640x480.png/0011bb?text=veniam', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(95, 'Octavia Williamson', '+1 (239) 546-0606', '98195 Lennie Mountains\nLake Katharinahaven, TN 56927-9245', 'lula.kiehn@example.net', '$2y$10$Y33lEZw2gk/JEC2xR8TjQO5AIiwIkzuqddZrjbMFSt930STU9sZqC', 'https://via.placeholder.com/640x480.png/000077?text=qui', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(96, 'Lucile Marquardt', '+1 (813) 312-3610', '1663 Simeon Burgs Apt. 117\nKozeyton, NV 91203', 'orland60@example.net', '$2y$10$3cciBzRhvvuhSZGhbLz/LeSLR3zTfgJu1LOTkRSVnPCEI7Ua08/U2', 'https://via.placeholder.com/640x480.png/00aabb?text=consequatur', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(97, 'Mrs. Pauline Kuhlman V', '+1 (959) 715-6815', '9298 Fay Forest Suite 593\nChanelletown, NM 48459', 'stephany69@example.org', '$2y$10$cmHcVv0CFwDEoZltm8Y4yOyAkZ/215XJ6VvS06Fn2O6wjZDWa9k7q', 'https://via.placeholder.com/640x480.png/0077bb?text=temporibus', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(98, 'Kurt Homenick', '+1-484-661-2476', '75672 Effertz Plaza Suite 448\nAiyanabury, NJ 64915-5188', 'earnestine50@example.org', '$2y$10$eNb1OiNdDNa0vtku8pxSUOfT1/4jgHk3XYRsFVan8/3gSEQjlFXU2', 'https://via.placeholder.com/640x480.png/0044bb?text=nostrum', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(99, 'Rossie Barrows', '+15096393532', '76284 Elmer Valleys\nMaximusborough, NM 21847-3566', 'rutherford.chris@example.net', '$2y$10$2o5mfPJkHovXCrRFQdxreOqtGBlsftblUsp0oE3Aiv1jJafYoUBPe', 'https://via.placeholder.com/640x480.png/00eeee?text=iusto', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(100, 'Esther Gibson', '501.757.5077', '136 Klocko Extensions Suite 103\nPort Amaya, MT 50762-8695', 'mcorkery@example.net', '$2y$10$T9VmMgtXyH/yJ2IjAPxODOkiIckYndOSoeOM78uCfCRzwgpOPoG4e', 'https://via.placeholder.com/640x480.png/009966?text=ipsum', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(101, 'Jannie Reilly', '+14157436940', '6524 Batz Route\nGradyshire, PA 38669', 'kari31@example.net', '$2y$10$HWbUf1ajXzPVfaneT.yWM.q1Z/4jcPyOZwbr0VjIwNv.h/EudGUbq', 'https://via.placeholder.com/640x480.png/00ff99?text=labore', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(102, 'Odessa Haley', '360-380-4429', '3613 Claire Cliffs Suite 109\nPort Carmelaton, CT 83452-9762', 'pablo.boyer@example.org', '$2y$10$P7VEx06EoW5rIM6Y33nHFehGHO9nJ3Y45gKZmHE/T1Ss48gSxZDge', 'https://via.placeholder.com/640x480.png/00aa11?text=molestias', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(103, 'Samir Ondricka', '320-899-0075', '244 Brandyn Ranch Suite 589\nHeidenreichchester, TN 96996', 'jaida92@example.net', '$2y$10$by415.G7JJKsY5Fjlyqiue0pXSvekrBss1eZ7KdK2KbGPQIPpjEZ2', 'https://via.placeholder.com/640x480.png/0066aa?text=similique', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(104, 'Dr. Harley Corwin', '+13047902982', '531 Morris Flat Apt. 033\nPort Lizethland, SC 13889-3856', 'santa.heidenreich@example.org', '$2y$10$4qFzaynEvj8pfj9iXlR1BOk0Ffj/1MUrwQ5GV2w56lGPe3.BMzZtm', 'https://via.placeholder.com/640x480.png/003377?text=rerum', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(105, 'Margaretta Will', '1-445-952-2341', '92379 Schmeler Branch Suite 973\nSchultzville, AK 48167-8982', 'santa44@example.org', '$2y$10$SBIbeTV3JwvvRazmS6wsiehhWz2zDsBJjPlG9S2hGIz0ByMNiRskW', 'https://via.placeholder.com/640x480.png/00ff44?text=veritatis', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(106, 'Name Rohan IV', '520-760-0413', '2357 Susan Drive Suite 897\nEdnaside, ID 92438-7692', 'vlowe@example.org', '$2y$10$I3Re0AoxYkYa4xHqWajMs.tGd8IiW1izBPljaeTjzedITW13fzLH2', 'https://via.placeholder.com/640x480.png/008877?text=harum', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(107, 'Ms. Marcelle Zemlak', '+14085834650', '515 Enrico Plains Apt. 484\nPort Sanfordstad, IA 34683-1801', 'carole87@example.net', '$2y$10$p0pQIHHiltpkMTzZiBVVqOOBbI4VZXv6dIoX6ZFazNcc/4OlQP2Eq', 'https://via.placeholder.com/640x480.png/0099cc?text=qui', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(108, 'Prof. Rosamond Bergnaum V', '+13079702853', '656 Kaelyn Tunnel\nNorth Karleeside, IA 78428-6227', 'dmurazik@example.net', '$2y$10$7hJQueah.hIzd3G9bDzneu87S1Dtq8ge9y6jXOLibKAxiPbmMC9mK', 'https://via.placeholder.com/640x480.png/00ff33?text=earum', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(109, 'Mrs. America Kuhic', '445.518.9778', '321 Hane Trail Suite 883\nLydaside, ND 87276-6357', 'ckuhn@example.org', '$2y$10$K.ELpSlpyn7fbSEY21MZ.uwvR2nO/ecHYzhrWwaBDZn./1N.2G4.2', 'https://via.placeholder.com/640x480.png/0000cc?text=excepturi', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(110, 'Hayden Kihn', '1-828-878-2372', '4402 Jacobi Mountain Apt. 195\nAraland, UT 80534-7211', 'lesly66@example.net', '$2y$10$EyoZscsRstj6MMz.R/cmLujPv40X7dT4gdYX/Wvf1r4tuWAOqFZKC', 'https://via.placeholder.com/640x480.png/00ff33?text=vel', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(111, 'Edison Larson', '+1-283-897-4668', '73566 Morar Via\nPort Kayleyberg, NC 88363-4834', 'giovanni.leffler@example.com', '$2y$10$8so.GW2xPmezDQWFY3FZeeIJtmCQzBWBa7oSN/c9HdfxD5hrmVsoC', 'https://via.placeholder.com/640x480.png/001188?text=voluptatibus', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(112, 'Lyla Greenfelder', '+1-870-948-4368', '7443 Aleen Pine Suite 302\nNorth Kip, LA 69626-7296', 'istehr@example.org', '$2y$10$Gl5b0w.QIPrva7ERWNgFaelLMNdvIv.lwaux5ldnorX682tBp8WNa', 'https://via.placeholder.com/640x480.png/00eeff?text=minus', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(113, 'Tiara Harber', '785.504.1771', '275 Ladarius Junctions\nLefflerstad, NM 74500-4744', 'gconsidine@example.com', '$2y$10$Fvnj6cxS1W6kyfVxG4PMV.jZJBoxG7GyRuO6OI2rO60QFe74MSsMS', 'https://via.placeholder.com/640x480.png/00eecc?text=culpa', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(114, 'Caleb Strosin', '(820) 487-2863', '153 Murl Walk\nNew Kody, CO 45557-1433', 'ruecker.precious@example.net', '$2y$10$zACiHgxlNbsSvX9TTlN2E.b.LGa3ycT4YYoMlYFfvbNbk.Hb8i7f2', 'https://via.placeholder.com/640x480.png/0077cc?text=magni', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(115, 'Ned Pouros', '(934) 403-2598', '655 Zieme Estate\nNorth Haileyshire, VT 68183-3247', 'spencer59@example.com', '$2y$10$25jVe6lCkyMEOBAcIRDz4ORmQn6LsNI0GyAirG11VTuBY5nhwcm8e', 'https://via.placeholder.com/640x480.png/00ddbb?text=ea', 'active', 2, '2021-06-18 09:59:18', '2021-10-21 07:05:27'),
(116, 'Thomas Kilback', '949-295-0132', '55174 Duncan Knoll Apt. 528\nLake Khalilhaven, NH 44472', 'nmayer@example.org', '$2y$10$R1fjL4tvt7Eyt299AzFo3usoPrptDiQEgtgNwzKKEETTVwDTTGb5S', 'https://via.placeholder.com/640x480.png/00cc33?text=sequi', 'active', 1, '2021-06-18 09:59:18', '2021-10-21 07:04:58'),
(117, 'Miss Beryl Christiansen I', '+1.715.777.7658', '37411 Gladyce Turnpike Suite 902\nNew Otisburgh, IN 18126-0565', 'glang@example.org', '$2y$10$xItdc58jYDCS.qqdAULbz.5A4OkWBIO7fvIYpYIwVFajXulmVuMr.', 'https://via.placeholder.com/640x480.png/000066?text=natus', 'active', 1, '2021-06-18 09:59:19', '2021-10-21 07:04:58'),
(118, 'Miss Brandyn Olson', '1-317-841-1645', '454 Romaguera Square Suite 562\nWymanport, HI 21277-2701', 'frippin@example.net', '$2y$10$U5frmb3K1FyYdm9iOnt48ub1POFDASbGugJco1gBt91UA.sPZvhia', 'https://via.placeholder.com/640x480.png/002266?text=voluptatem', 'active', 1, '2021-06-18 09:59:19', '2021-10-21 07:04:58'),
(119, 'Shawna Blick', '(832) 755-0315', '434 Josiane Crest\nNorth Pabloton, PA 41233', 'prince.watsica@example.net', '$2y$10$Z.llPO1ealsyqUduEtHSSeJqzDK4kAAgPUu9IGO36NU6wAALdx.De', 'https://via.placeholder.com/640x480.png/0033ff?text=reiciendis', 'active', 2, '2021-06-18 09:59:19', '2021-10-21 07:05:27'),
(120, 'Alden Little', '253-860-0712', '4247 Johns Ports Apt. 838\nMetzfort, WY 92937', 'alba.rau@example.org', '$2y$10$4tlwLcLH2rnjU6ZWSZ6TH.WP806HQYgtlgnfSolU4ZX0ajFhG8Fnu', 'https://via.placeholder.com/640x480.png/0099dd?text=laborum', 'active', 2, '2021-06-18 09:59:19', '2021-10-21 07:05:27'),
(121, 'mohammad', '0170770561', 'address', 'muhammadas@gmail.com', '$2y$10$Ir8NPVKerm9q0fYYbo9COOYsg20pUhf1yLGI5uuA.8rKidAXGGXKu', '1.jpg', 'active', 1, '2021-10-03 07:05:09', '2021-10-21 07:04:58'),
(122, 'mohammad', '01707705621', 'بلقطر الشرقية', 'muhamawsmad@gmail.com', '$2y$10$ZplVU57GyBt/tV/E.8ICpeFr3cO7kI1tcrO2aUyB3abcAWp5joGKe', 'uploads/images/sellers/1.jpg', 'active', 2, '2021-10-03 07:23:29', '2021-10-21 07:05:27'),
(123, 'mohammad', '01705770561', 'muhammad@gmail.com', 'muhammaswqqad@gmail.com', '$2y$10$dwwYG7AeCfA1EpjLLclNwOZZ4djT023R6j1cOw7ZirQHJqRJrq3.6', 'uploads/images/sellers/225560312_3038607416409212_6814511244552686678_n.jpg', 'active', 1, '2021-10-04 07:24:37', '2021-10-21 07:04:58'),
(124, 'mohammad', '01707702561', 'muhammad@gmail.com', 'muhammaawwed@gmail.com', '$2y$10$CBAaAYuYHD1YgnrHvllN9eqRlAHrctfL7fsZY2AusQOH6C9t6crU.', 'uploads/images/sellers/225560312_3038607416409212_6814511244552686678_n.jpg', 'active', 2, '2021-10-04 07:27:11', '2021-10-21 07:05:27'),
(125, 'mohammad', '01707705611', 'muhammad@gmail.com', 'muhaqqmmad@gmail.com', '$2y$10$wUqsgs8YIDQgyRonY2XcVuhGTV74sm8smtkLVRWktfDh2b3TINAWe', 'uploads/images/sellers/273802_0.png', 'active', 1, '2021-10-04 07:27:59', '2021-10-21 07:04:58'),
(126, 'mohammad', '01707705617987', 'muhammad@gmail.com', 'muqhamqmad@gmail.com', '$2y$10$N.2Qbpre2.802tt/QA3JrOllbqnCah/giijkTu4WLED02sM9WafRK', 'uploads/images/seller/273802_0.png', 'active', 2, '2021-10-04 07:33:28', '2021-10-21 07:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_category_id` (`main_category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_main_category_foreign` (`main_category`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_categories_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `main_categories_id` (`main_categories_id`);

--
-- Indexes for table `products_colors`
--
ALTER TABLE `products_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_category_id_foreign` (`category_id`);

--
-- Indexes for table `sizes_translations`
--
ALTER TABLE `sizes_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_colors`
--
ALTER TABLE `size_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_main_categories_id_foreign` (`main_categories_id`),
  ADD KEY `sub_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11090;

--
-- AUTO_INCREMENT for table `products_colors`
--
ALTER TABLE `products_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2081;

--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sizes_translations`
--
ALTER TABLE `sizes_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `size_colors`
--
ALTER TABLE `size_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_main_category_foreign` FOREIGN KEY (`main_category`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`main_categories_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_colors`
--
ALTER TABLE `products_colors`
  ADD CONSTRAINT `products_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `products_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `size_colors`
--
ALTER TABLE `size_colors`
  ADD CONSTRAINT `size_colors_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `products_sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_main_categories_id_foreign` FOREIGN KEY (`main_categories_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
