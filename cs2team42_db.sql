-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2025 at 12:04 PM
-- Server version: 8.0.41-0ubuntu0.20.04.1
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs2team42_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket_items`
--

CREATE TABLE `basket_items` (
  `id` bigint UNSIGNED NOT NULL,
  `user` bigint UNSIGNED NOT NULL,
  `product` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basket_items`
--

INSERT INTO `basket_items` (`id`, `user`, `product`, `quantity`, `created_at`, `updated_at`) VALUES
(92, 1, 5, 3, '2025-03-24 10:06:26', '2025-03-24 10:44:35'),
(93, 1, 3, 1, '2025-03-24 10:08:03', '2025-03-24 10:08:03'),
(94, 1, 4, 2, '2025-03-24 10:29:59', '2025-03-24 10:30:47'),
(97, 5, 7, 1, '2025-03-24 11:27:58', '2025-03-24 11:27:58'),
(98, 5, 25, 4, '2025-03-24 11:28:11', '2025-03-24 11:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_04_122529_create_baskets_table', 1),
(5, '2024_12_05_145717_create_products_table', 1),
(6, '2024_12_05_195516_create_product_images_table', 1),
(7, '2024_12_09_123513_create_basket_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user` bigint UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `address_line_1` text COLLATE utf8mb4_general_ci NOT NULL,
  `address_line_2` text COLLATE utf8mb4_general_ci,
  `city` text COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` text COLLATE utf8mb4_general_ci NOT NULL,
  `country` enum('United Kingdom','United States','Canada','Australia') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'United Kingdom',
  `phone_number` text COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_method` enum('standard','express') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'standard',
  `status` enum('processing','in-transit','delivered') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `email`, `first_name`, `last_name`, `address_line_1`, `address_line_2`, `city`, `postcode`, `country`, `phone_number`, `shipping_method`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'test@test', 'fntest', 'lntest', 'test road', 'test building', 'test city', 'test postcode', 'United Kingdom', '+12345678901', 'standard', 'processing', '2025-03-20 00:30:47', '2025-03-20 00:30:47'),
(5, 1, 'test@test', 'fntest', 'lntest', 'test road', 'test building', 'test city', 'test postcode', 'United Kingdom', '+12345678901', 'standard', 'processing', '2025-03-20 00:34:37', '2025-03-20 00:34:37'),
(6, 1, 'test@test.com', 'test', 't', 't', 't', 't', 't', 'United Kingdom', '1234567890', 'standard', 'processing', '2025-03-20 00:38:17', '2025-03-20 00:38:17'),
(7, 1, 'test@test', 't', 'test33424', '35325', NULL, '35325', 'er', 'United Kingdom', '535235', 'standard', 'processing', '2025-03-22 08:19:14', '2025-03-22 08:19:14'),
(8, 1, 'test@test.com', 'tt', 'tttsd', 'sddfsfsf', NULL, 'sdfs', 'fsf', 'United Kingdom', '44354353', 'standard', 'processing', '2025-03-22 08:55:13', '2025-03-22 08:55:13'),
(9, 1, 'test@test', 'ts', 'ds', 'sddad', NULL, 'ada', 'dada', 'United Kingdom', 'd355345', 'standard', 'processing', '2025-03-22 09:05:50', '2025-03-22 09:05:50'),
(10, 1, 'test@test', 'fgd', 'fgdg', 'dg', NULL, 'gfd', 'gdfg', 'United Kingdom', 'dgf', 'express', 'processing', '2025-03-22 09:15:04', '2025-03-22 09:15:04'),
(11, 1, 'test@test', 'hg', 'ghg', 'hgh', NULL, 'hgh', 'ghg', 'United Kingdom', 'ghg', 'express', 'processing', '2025-03-22 09:17:05', '2025-03-22 09:17:05'),
(12, 1, 'test@test', 'fdf', 'sfsd', 'fdf', NULL, 'fds', 'sdf', 'United Kingdom', 'dsfsdf', 'express', 'processing', '2025-03-22 09:22:34', '2025-03-22 09:22:34'),
(13, 1, 'test@test', 'fdf', 'sfdfd', 'fdf', NULL, 'sf', 'sfds', 'United Kingdom', 'dfs', 'express', 'processing', '2025-03-22 09:25:37', '2025-03-22 09:25:37'),
(14, 1, 'test@test', 'df', 'dfd', 'fdfd', NULL, 'fd', 'dfd', 'United Kingdom', 'fdfd', 'express', 'processing', '2025-03-22 09:30:03', '2025-03-22 09:30:03'),
(15, 1, 'test@test', 'fdsf', 'dfd', 'fds', NULL, 'dfs', 'sfd', 'United Kingdom', 'fsdf', 'express', 'processing', '2025-03-22 09:31:17', '2025-03-22 09:31:17'),
(16, 1, 'test@test', 'kjhk', 'jkhk', 'hjk', NULL, 'khjk', 'hjkh', 'United Kingdom', 'kh', 'express', 'processing', '2025-03-22 09:32:05', '2025-03-22 09:32:05'),
(17, 1, 'test@test', 'jh', 'jhj', 'hj', NULL, 'hjg', 'jjhghj', 'United Kingdom', 'jhgj', 'express', 'processing', '2025-03-22 09:33:25', '2025-03-22 09:33:25'),
(18, 1, 'test@test', 'fdsf', 'sdff', 'dsf', NULL, 'dsfs', 'fsf', 'United Kingdom', 'sf', 'express', 'processing', '2025-03-22 09:35:14', '2025-03-22 09:35:14'),
(19, 1, 'test@test', 'fdsf', 'fsfdsf', 'dsfsd', NULL, 'sfsf', 'sfdsf', 'United Kingdom', 'dsfsdf', 'express', 'processing', '2025-03-22 17:32:18', '2025-03-22 17:32:18'),
(20, 1, 'test@test', 'test', 'fsfsdfgds', 'dsgfgsg', 'gdsgs', 'gsdg', 'sdgsddg', 'United Kingdom', 'fsgfsgsfgs', 'express', 'delivered', '2025-03-23 22:42:43', '2025-03-24 09:40:37'),
(21, 1, 'test@test.com', 'test', 'test', '87 Beta Street', NULL, 'Birmingham', 'B98 86G', 'United Kingdom', '0123456789', 'standard', 'processing', '2025-03-24 09:42:32', '2025-03-24 09:42:32'),
(22, 1, 'test@test.com', 'test', 'lastname', 'test place', NULL, 'fake city', 'made up postcode', 'United Kingdom', '5435363646436346', 'express', 'processing', '2025-03-24 10:24:51', '2025-03-24 10:25:41'),
(23, 1, 'owenlid14@outlook.com', 'test', 'Liddle', '31 Owens Croft', '31 owens croft', 'Birmingham', 'B38 9AF', 'United Kingdom', '07588721326', 'standard', 'in-transit', '2025-03-24 10:30:37', '2025-03-24 10:40:02'),
(24, 5, 'customer@test.com', 'customer', 'random', 'Test Avenue', NULL, 'Test City', 'TestCode', 'United Kingdom', '123', 'express', 'processing', '2025-03-24 11:12:12', '2025-03-24 11:12:12'),
(25, 5, 'customer@test.com', 'customer', 'random', 'fx', NULL, 'gf', 'xg', 'United Kingdom', 'g', 'standard', 'processing', '2025-03-24 11:14:13', '2025-03-24 11:14:13'),
(26, 5, 'customer@test.com', 'customer', 'random', 'fddf', NULL, 'df', 'dffd', 'United Kingdom', 'fdddf', 'standard', 'processing', '2025-03-24 11:15:36', '2025-03-24 11:15:36'),
(27, 5, 'customer@test.com', 'customer', 'randomf', 'fddf', NULL, 'df', 'dffd', 'United Kingdom', 'fdddf', 'express', 'processing', '2025-03-24 11:16:07', '2025-03-24 11:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `oid` bigint UNSIGNED NOT NULL,
  `product` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `discount` decimal(3,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`oid`, `product`, `quantity`, `discount`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 0.00, '2025-03-20 00:30:47', '2025-03-20 00:30:47'),
(5, 2, 2, 0.00, '2025-03-20 00:34:37', '2025-03-20 00:34:37'),
(5, 4, 1, 0.00, '2025-03-20 00:34:37', '2025-03-20 00:34:37'),
(6, 5, 2, 0.20, '2025-03-20 00:38:17', '2025-03-20 00:38:17'),
(6, 8, 1, 0.00, '2025-03-20 00:38:17', '2025-03-20 00:38:17'),
(7, 1, 1, 0.00, '2025-03-22 08:19:14', '2025-03-22 08:19:14'),
(7, 2, 1, 0.00, '2025-03-22 08:19:14', '2025-03-22 08:19:14'),
(7, 5, 1, 0.20, '2025-03-22 08:19:14', '2025-03-22 08:19:14'),
(8, 4, 1, 0.00, '2025-03-22 08:55:13', '2025-03-22 08:55:13'),
(8, 22, 1, 0.00, '2025-03-22 08:55:13', '2025-03-22 08:55:13'),
(9, 5, 3, 0.20, '2025-03-22 09:05:50', '2025-03-22 09:05:50'),
(9, 22, 7, 0.00, '2025-03-22 09:05:50', '2025-03-22 09:05:50'),
(10, 3, 1, 0.00, '2025-03-22 09:15:04', '2025-03-22 09:15:04'),
(10, 24, 1, 0.00, '2025-03-22 09:15:04', '2025-03-22 09:15:04'),
(11, 8, 1, 0.00, '2025-03-22 09:17:05', '2025-03-22 09:17:05'),
(12, 7, 1, 0.25, '2025-03-22 09:22:34', '2025-03-22 09:22:34'),
(13, 5, 1, 0.20, '2025-03-22 09:25:37', '2025-03-22 09:25:37'),
(13, 9, 1, 0.10, '2025-03-22 09:25:37', '2025-03-22 09:25:37'),
(14, 5, 1, 0.20, '2025-03-22 09:30:03', '2025-03-22 09:30:03'),
(15, 7, 1, 0.25, '2025-03-22 09:31:17', '2025-03-22 09:31:17'),
(16, 5, 1, 0.20, '2025-03-22 09:32:05', '2025-03-22 09:32:05'),
(17, 7, 1, 0.25, '2025-03-22 09:33:25', '2025-03-22 09:33:25'),
(18, 7, 1, 0.25, '2025-03-22 09:35:14', '2025-03-22 09:35:14'),
(19, 7, 2, 0.25, '2025-03-22 17:32:18', '2025-03-22 17:32:18'),
(20, 4, 2, 0.00, '2025-03-23 22:42:43', '2025-03-23 22:42:43'),
(20, 5, 1, 0.20, '2025-03-23 22:42:43', '2025-03-23 22:42:43'),
(20, 34, 1, 0.15, '2025-03-23 22:42:43', '2025-03-23 22:42:43'),
(21, 7, 1, 0.25, '2025-03-24 09:42:32', '2025-03-24 09:42:32'),
(21, 34, 1, 0.15, '2025-03-24 09:42:32', '2025-03-24 09:42:32'),
(22, 5, 2, 0.20, '2025-03-24 10:24:51', '2025-03-24 10:24:51'),
(23, 5, 2, 0.20, '2025-03-24 10:30:37', '2025-03-24 10:30:37'),
(24, 5, 1, 0.20, '2025-03-24 11:12:12', '2025-03-24 11:12:12'),
(25, 5, 1, 0.20, '2025-03-24 11:14:13', '2025-03-24 11:14:13'),
(26, 5, 1, 0.20, '2025-03-24 11:15:36', '2025-03-24 11:15:36'),
(27, 5, 1, 0.20, '2025-03-24 11:16:07', '2025-03-24 11:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('mice','keyboards','monitors','speakers','microphones') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` enum('wireless','wired','membrane','mechanical','144hz','240hz','gaming','ergonomic','stylus','bookshelf','soundbar','condenser','dynamic') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int UNSIGNED NOT NULL,
  `discount` decimal(3,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `stock` int UNSIGNED NOT NULL DEFAULT '10',
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `sub_category`, `price`, `discount`, `stock`, `description`, `created_at`, `updated_at`) VALUES
(1, 'wireless mouse', 'mice', 'wireless', 4000, 0.00, 9, 'description for wireless mouse', NULL, '2025-03-22 08:19:14'),
(2, 'wired mouse', 'mice', 'wired', 2999, 0.00, 7, 'description for wired mouse', NULL, '2025-03-22 08:19:14'),
(3, 'membrane keyboard', 'keyboards', 'membrane', 1999, 0.00, 9, 'description for membrane keyboard', NULL, '2025-03-22 09:15:04'),
(4, 'mechanical keyboard', 'keyboards', 'mechanical', 4999, 0.00, 6, 'description for mechanical keyboard', NULL, '2025-03-23 22:42:43'),
(5, 'high refresh monitor', 'monitors', '144hz', 10999, 0.20, 0, 'monitor with 144hz refresh rate', NULL, '2025-03-23 22:42:43'),
(6, 'ultra high refresh monitor', 'monitors', '240hz', 14999, 0.00, 10, 'monitor with 240hz refresh rate', NULL, NULL),
(7, 'gaming mouse', 'mice', 'gaming', 3999, 0.25, 3, 'mouse for gaming', NULL, '2025-03-24 09:42:32'),
(8, 'ergonomic mouse', 'mice', 'ergonomic', 4999, 0.00, 8, 'mouse for office use', NULL, '2025-03-22 09:17:05'),
(9, 'stylus mouse', 'mice', 'stylus', 5999, 0.10, 9, 'stylus mouse description', NULL, '2025-03-22 09:25:37'),
(10, 'generic speakers', 'speakers', 'bookshelf', 1499, 0.05, 10, 'wired computer speakers', NULL, NULL),
(11, 'professional speakers with subwoofer', 'speakers', 'bookshelf', 4999, 0.00, 10, 'high quality audio with subwoofer for extra bass ', NULL, NULL),
(17, '5.1 speakers', 'speakers', 'bookshelf', 24999, 0.05, 10, 'Surround sound for the media enthusiast', NULL, NULL),
(22, 'blue mechanical keyboard ', 'keyboards', 'mechanical', 7999, 0.00, 2, 'mechanical keyboard in blue with linear switches', NULL, '2025-03-22 09:05:50'),
(23, 'pink mechanical keyboard ', 'keyboards', 'mechanical', 7999, 0.00, 10, 'pink mechanical keyboard with linear switches', NULL, NULL),
(24, 'professional mechanical keyboard ', 'keyboards', 'mechanical', 11999, 0.00, 9, 'eSports ready keyboard with shortest actuation distance for the most responsive feel', NULL, '2025-03-22 09:15:04'),
(25, 'ergonomic keyboard ', 'keyboards', 'membrane', 3999, 0.15, 10, 'game in comfort ', NULL, NULL),
(26, 'value gaming monitor', 'monitors', '144hz', 8999, 0.01, 10, '144hz at our most affordable price ', NULL, NULL),
(27, 'Premium Fast 240hz IPS', 'monitors', '240hz', 34999, 0.45, 10, 'for a flicker free and true HDR experience ', NULL, NULL),
(28, '1080p 240hz monitor', 'monitors', '240hz', 12999, 0.00, 10, 'fast but affordable display perfect for eSports and competitive shooters', NULL, NULL),
(29, 'Mini Capsule Microphone (White)', 'microphones', 'condenser', 3999, 0.00, 12, 'A reliable microphone for professional-grade audio in a sleek white package. Compact, durable, and works great for recording in any situation. Get professional sound without needing a complex setup.', NULL, NULL),
(30, 'Mini Capsule Microphone (Black)', 'microphones', 'condenser', 3999, 0.05, 10, 'A compact, stylish, and user-friendly microphone, the Mini Capsule is a must-have for anyone seeking professional-grade audio quality without the complexity. Its design and portability make it a versatile addition to any setup, ensuring you capture sound with confidence, now in black for a more serious look.', NULL, NULL),
(31, 'Mini Capsule Microphone (Pink)', 'microphones', 'condenser', 4499, 0.10, 15, 'A compact, stylish, and user-friendly microphone, the Mini Capsule is a must-have for anyone seeking professional-grade audio quality without the complexity. Its design and portability make it a versatile addition to any setup, ensuring you capture sound with confidence.This new spin has an updated shell along with a vibrant pink finish, offering a modern and eye-catching aesthetic.', NULL, NULL),
(32, 'Broadcast Microphone (Black)', 'microphones', 'dynamic', 6999, 0.01, 13, 'A compact, durable, and high-quality microphone, the Broadcast Microphone is a must-have for any professional broadcaster, streamer or radio host. Its design and reliability make it a versatile addition to your setup, ensuring you capture sound with confidence and precision.', NULL, NULL),
(33, 'Broadcaster Microphone Limited Edition (Blue)', 'microphones', 'dynamic', 8999, 0.00, 14, 'A limited edition of the beloved Broadcaster Microphone, forgoing the serious black exterior in favour of a dazzling blue.', NULL, NULL),
(34, 'Mid-range Soundbar', 'speakers', 'soundbar', 7999, 0.15, 10, 'This simple-to-setup soundbar is both affordable without compromising on audio quality.', NULL, '2025-03-24 09:42:32'),
(37, 'Test Mouse', 'mice', 'wireless', 1000, 0.00, 10, 'test', '2025-03-24 10:03:11', '2025-03-24 10:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint NOT NULL,
  `product` bigint UNSIGNED NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'wireless1.png', NULL, NULL),
(2, 1, 'wireless2.png', NULL, NULL),
(3, 1, 'wireless3.png', NULL, NULL),
(4, 2, 'wired1.png', NULL, NULL),
(5, 2, 'wired2.png', NULL, NULL),
(6, 2, 'wired3.png', NULL, NULL),
(7, 8, 'ergonomic1.png', NULL, NULL),
(8, 8, 'ergonomic2.png', NULL, NULL),
(9, 8, 'ergonomic3.png', NULL, NULL),
(10, 7, 'gaming1.png', NULL, NULL),
(11, 7, 'gaming2.png', NULL, NULL),
(12, 4, 'mechanical1.png', NULL, NULL),
(13, 5, '144hz1.png', NULL, NULL),
(14, 6, '240hz1.png', NULL, NULL),
(15, 9, 'stylus1.png', NULL, NULL),
(16, 9, 'stylus2.png', NULL, NULL),
(17, 8, 'ergonomic3.png', NULL, NULL),
(26, 10, 'speaker1.png', NULL, NULL),
(27, 11, 'speaker2.png', NULL, NULL),
(31, 22, 'mechanical3.png', NULL, NULL),
(32, 23, 'mechanical4.png', NULL, NULL),
(33, 24, 'mechanical2.png', NULL, NULL),
(37, 32, 'black1.png', NULL, NULL),
(38, 32, 'black2.webp', NULL, NULL),
(39, 32, 'black3.png', NULL, NULL),
(40, 31, 'pink1.png', NULL, NULL),
(41, 31, 'pink2.png', NULL, NULL),
(42, 33, 'blue1.png', NULL, NULL),
(46, 29, 'whitemini1.png', NULL, NULL),
(47, 29, 'whitemini2.png', NULL, NULL),
(48, 29, 'whitemini3.png', NULL, NULL),
(49, 34, 'soundbar1.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `code` text COLLATE utf8mb4_general_ci NOT NULL,
  `discount` decimal(3,2) NOT NULL DEFAULT '0.00',
  `is_expired` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user` bigint UNSIGNED NOT NULL,
  `product` bigint UNSIGNED NOT NULL,
  `rating` tinyint NOT NULL DEFAULT '3',
  `text` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user`, `product`, `rating`, `text`, `created_at`, `updated_at`) VALUES
(4, 2, 4, 1, 'good keyboard but switches are loud', '2024-12-10 03:17:50', '2024-12-10 03:17:50'),
(5, 1, 4, 4, 'good', '2025-03-22 10:53:29', '2025-03-22 11:56:03'),
(6, 1, 22, 3, 'test', '2025-03-22 13:08:41', '2025-03-22 13:08:41'),
(7, 3, 7, 5, 'Great mouse, love how light it is', '2025-03-24 09:58:16', '2025-03-24 09:58:16'),
(8, 5, 5, 3, 'Stand cannot be adjusted', '2025-03-24 11:26:47', '2025-03-24 11:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0b4oNctg07Lcn17nin1fLaDlDucuTIiu2jcmY0H3', NULL, '188.29.111.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHl3OGoyQWhqQ3BrUEI3eEhCUVVPYlk2U0FvUjF2QlRQS3doVFVybyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cy9jYXRlZ29yeS9zd2lwZXItYnVuZGxlLm1pbi5jc3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742816959),
('3RG3bRpCXq9wNABHJwOawdTAY8Zpu540yJkrwy0w', NULL, '82.31.29.64', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/134.0.6998.99 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEF2b0c4dVg5a1VWSjNqQk9vMWdjbVVIOWZLQkQzYU85M09Oa2ZGaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742816875),
('448vb2L0EWUYFmDkQpnFi8oan7jNSawn101lUOD3', 1, '5.151.184.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 OPR/117.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib0lWSDlKRnI2cnl0dGlBQnRLTHpoTkE3dlN3UnVtcFBvZmVrRm9VWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9kZWFscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1742813086),
('6VuvyxM8cFBxhSXXhpxJtEhKOx7azG1TrSNustdC', NULL, '18.168.47.91', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV0tKSzVPOHRUZnpnblZoYmFjSGlrRVVVTWpOcld1TXN6TFBXVE41ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cy9jYXRlZ29yeS9zd2lwZXItYnVuZGxlLm1pbi5jc3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjU1OiJodHRwczovL2NzMnRlYW00Mi5jczI0MTAtd2ViMDFwdm0uYXN0b24uYWMudWsvZGFzaGJvYXJkIjt9fQ==', 1742811787),
('EkWwEpnQ88tYSLaMeLlTWApMYI4z0deIfcTEuws2', NULL, '82.31.29.64', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1lYeTdtdnpla3RmSVc2YUVScExFUk1TeTZ6bXZ2THBoMld4RWdsMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742816892),
('HALfk4B1dmn4ZyogcmeOWuDBVq3TTpgEX4JC3HMP', NULL, '5.151.184.180', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGdSWkY0aEhoYmJncTZZVXk1QkYxTWZYbndESVNNQUZkdUp0ZHhwWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cy9zd2lwZXItYnVuZGxlLm1pbi5jc3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742810002),
('oTNSYTcEnlYSSTWZqtmIo34CjKxI638na800Y2FK', NULL, '82.39.85.104', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT0lOOXQzdjU5U0syM2dVNTF3ZDFlWkQ1c2xBZ3hCWFJaUlYxaEdTMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cy9zd2lwZXItYnVuZGxlLm1pbi5jc3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjUzOiJodHRwczovL2NzMnRlYW00Mi5jczI0MTAtd2ViMDFwdm0uYXN0b24uYWMudWsvYWRkLzEvMSI7fX0=', 1742817462),
('prk2b4IMLjPbiCEaWgRnyICKTFPyrwzoGKkDRod0', NULL, '10.76.19.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUjE0M3FVR2lkVjJJcmEwdFpCQ1JmcnU5RkpYVmZQMEVyNkJCSVJNViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9sb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NTU6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9kYXNoYm9hcmQiO319', 1742817838),
('q7Uz5j29jLnrAVZmVrumtVC1ZvHm6e7OQaLuzE5t', NULL, '165.120.207.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1o3bW5xTDFYZlJZMWk4WDZuTzN1d3pZTXRUS1ZrRk9TMUFrb3ZieiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9sb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NTQ6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9jaGVja291dCI7fX0=', 1742813179),
('QEp05n3W7asNrkIgDLz62kX0AUJMZBH64lEhFRxX', NULL, '74.125.210.96', 'Mozilla/5.0 (Linux; Android 7.0; SM-G930V Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjI3QmJFdlF6VzNXM2daaFo0OURubzBUMGVyY1R4NWJvcE9nZTNzbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742809979),
('rK6T79v0YvnEm0ZTccweZagEunnzwEgWvf2HNNKF', NULL, '74.125.210.96', 'Mozilla/5.0 (Linux; Android 7.0; SM-G930V Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGlJajY2Y2tEMmJHcW9kRm1OcnZwbE1wbm1pTnFJbDJkTkZjQm50NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742809979),
('Rwed3Li9vVOTbO5LcDVo7x9oeg9Tg2mrUiaQla02', 5, '188.29.111.40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaGlMa1FYaVkyN0hJcUg2Z0dYR2tBcXpDa0dVUjVoeHl3R0hiZHF2eCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODU6Imh0dHBzOi8vY3MydGVhbTQyLmNzMjQxMC13ZWIwMXB2bS5hc3Rvbi5hYy51ay9wcm9kdWN0cy9jYXRlZ29yeS9zd2lwZXItYnVuZGxlLm1pbi5jc3MiO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjU1OiJodHRwczovL2NzMnRlYW00Mi5jczI0MTAtd2ViMDFwdm0uYXN0b24uYWMudWsvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1742816922);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `account_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test', NULL, '$2y$12$PkZXDdfh9tI/4XR04tDJZ.JCuRBJnZRkHNqvQhCXdknOnT5yX8p8W', 'admin', NULL, '2024-12-09 12:42:37', '2025-03-24 00:52:14'),
(2, 'test5', 'test2@test', NULL, '$2y$12$6hstpaU7VKDNqc9LW4ct1.Ss2IdDUIro5xbpNPTvP4heZrhXa0Og.', 'customer', NULL, '2024-12-10 02:08:16', '2025-03-20 02:30:51'),
(3, 'admin', 'admin@test.com', NULL, '$2y$12$LhS0InHXJJ9iUOIjyaft6eeDxE3mmzWxotQCBbROvPHIeVA2cOOg6', 'admin', NULL, '2025-03-24 08:16:17', '2025-03-24 08:16:17'),
(4, 'tayyab', 'tayyab-05@outlook.com', NULL, '$2y$12$rOHeLuRt12qYll/QyvPT1.KeVIU/6r8Urc.SLJHOnBgeXWoHg5u0G', 'customer', NULL, '2025-03-24 10:40:51', '2025-03-24 10:40:51'),
(5, 'customer random', 'customer@test.com', NULL, '$2y$12$6MMiQ4rm02XN4pnu3Mmv0eZpc4h4rHvSFp9BPPpS6ZQf/9bl7ThBG', 'customer', NULL, '2025-03-24 10:48:15', '2025-03-24 10:48:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket_items`
--
ALTER TABLE `basket_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`oid`,`product`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ibfk_1` (`user`),
  ADD KEY `reviews_ibfk_2` (`product`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket_items`
--
ALTER TABLE `basket_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket_items`
--
ALTER TABLE `basket_items`
  ADD CONSTRAINT `basket_items_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `basket_items_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
