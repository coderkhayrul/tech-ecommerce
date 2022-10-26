-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2022 at 08:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `coupon` varchar(200) DEFAULT NULL,
  `product` varchar(200) DEFAULT NULL,
  `order` varchar(200) DEFAULT NULL,
  `other` varchar(200) DEFAULT NULL,
  `report` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `return` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `setting` varchar(200) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `type` int(15) DEFAULT NULL,
  `blog` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `email_verified_at`, `remember_token`, `category`, `coupon`, `product`, `order`, `other`, `report`, `role`, `return`, `contact`, `comment`, `setting`, `stock`, `type`, `blog`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '01835061968', 'admin@mail.com', '$2y$10$X0Wm0LI/9niRZCi74XLjq.WIbIBsHxAk4.j6h.ZmCZzDM0akYBDwW', NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '1', '2022-10-17 18:21:07', NULL),
(3, 'Portia Dalton', '+1 (912) 268-8529', 'child@mail.com', '$2y$10$j/WmQ2xOppHP35eW7Ekrg.lSoijqKcv2wlnLJevyj.nr/Z3KTZ1me', NULL, NULL, '1', '1', '1', NULL, '1', NULL, '1', '1', '1', NULL, '1', '1', 2, '1', '2022-10-17 18:22:22', '2022-10-14 18:51:08'),
(5, 'Brynne Spence', '+1 (549) 943-3114', 'kiqocaqi@mailinator.com', '$2y$10$rSA2eXFS36bRLYUs7BnrsO6yj49kNxg4ISqAn.mrlloqsZge.1ZW.', NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', 2, '1', '2022-10-17 18:21:13', '2022-10-15 17:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `brand_url`, `created_at`, `updated_at`) VALUES
(1, 'Sony', 'media/brand/1744782029359339.png', 'www.sony.com', '2022-09-23 11:23:29', '2022-09-23 11:23:34'),
(2, 'Livi\'s', 'media/brand/1744782188047139.png', 'www.livi\'s', '2022-09-23 11:26:00', '2022-09-23 11:26:00'),
(3, 'adidas', 'media/brand/1744782207412323.png', 'www.adidas.com', '2022-09-23 11:26:18', '2022-09-23 11:26:18'),
(4, 'Asus', 'media/brand/1744782224307205.png', 'www.asus.com', '2022-09-23 11:26:35', '2022-09-23 11:26:35'),
(5, 'canon', 'media/brand/1744782245077810.png', 'www.canon.com', '2022-09-23 11:26:54', '2022-09-23 11:26:54'),
(6, 'dell', 'media/brand/1744782260001117.png', 'www.dell.com', '2022-09-23 11:27:09', '2022-09-23 11:27:09'),
(7, 'lenovo', 'media/brand/1744782282060234.png', 'www.lenovo.com', '2022-09-23 11:27:30', '2022-09-23 11:27:30'),
(8, 'nike', 'media/brand/1744782301572320.png', 'www.nike.com', '2022-09-23 11:27:48', '2022-09-23 11:27:48'),
(9, 'rado', 'media/brand/1744782318577115.png', 'www.rado.com', '2022-09-23 11:28:04', '2022-09-23 11:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '', '2022-09-23 11:18:54', NULL),
(2, 'Woman Fashion', '', '2022-09-23 11:19:18', NULL),
(3, 'Mans Fashion', '', '2022-09-23 11:19:23', NULL),
(4, 'Sea Fish', '', '2022-09-23 11:19:30', NULL),
(5, 'Health', '', '2022-09-23 11:20:06', NULL),
(6, 'Watch', '', '2022-09-23 14:38:36', NULL),
(7, 'Childs', '', '2022-09-23 14:38:42', NULL),
(8, 'Furniture', '', '2022-09-23 14:38:52', NULL),
(9, 'Beauty', '', '2022-09-23 14:39:16', NULL),
(10, 'Sports & Outdoor', '', '2022-09-23 14:39:54', NULL),
(11, 'Home & Living', '', '2022-09-23 14:39:59', NULL),
(13, 'Monitor', '', '2022-09-27 04:08:07', NULL),
(14, 'Smart Watch', 'smart-watch', '2022-10-03 09:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Khayrul', 'khayrul@gmail.com', '01835061968', 'This Message', '2022-10-19 13:57:46', NULL),
(2, 'Shanto', 'shanto@gmail.com', '01303132067', 'Demo Text', '2022-10-19 13:58:55', NULL),
(3, 'Brenna Meyer', 'myka@mailinator.com', '+1 (911) 546-6028', 'Laborum tempor elige', '2022-10-19 13:59:30', NULL),
(4, 'Yuli Russell', 'rone@mailinator.com', '+1 (368) 578-3177', 'Veritatis veniam ut', '2022-10-19 14:22:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'BD', '25', '2022-09-23 11:28:25', '2022-10-02 14:20:37'),
(2, 'TEST', '10', '2022-09-23 11:28:33', NULL),
(3, 'HELLO', '5', '2022-09-23 11:28:50', NULL),
(4, 'FB', '2', '2022-10-03 10:34:54', NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_14_221611_create_admins_table', 1),
(6, '2022_09_15_183945_create_categories_table', 1),
(7, '2022_09_15_184029_create_sub_categories_table', 1),
(8, '2022_09_15_184046_create_brands_table', 1),
(9, '2022_09_20_180530_create_coupons_table', 1),
(10, '2022_09_20_185301_create_newslaters_table', 1),
(11, '2022_09_20_201006_create_products_table', 1),
(12, '2022_09_23_091613_create_post_category_table', 1),
(13, '2022_09_23_091725_create_posts_table', 1),
(14, '2022_09_28_192751_create_wishlists_table', 2),
(15, '2022_10_01_182142_create_settings_table', 3),
(16, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(17, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(18, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(19, '2016_06_01_000004_create_oauth_clients_table', 4),
(20, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(21, '2022_10_02_231203_create_orders_table', 5),
(22, '2022_10_02_231435_create_order_details_table', 6),
(23, '2022_10_02_231511_create_shipping_table', 6),
(24, '2022_10_05_163826_create_seo_table', 7),
(25, '2022_10_16_141916_create_sitesetting_table', 8),
(26, '2022_10_19_194511_create_contact_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `newslaters`
--

CREATE TABLE `newslaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newslaters`
--

INSERT INTO `newslaters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'taze@mailinator.com', NULL, NULL),
(5, 'majenelifu@mailinator.com', NULL, NULL),
(6, 'mixuqyrebe@mailinator.com', NULL, NULL),
(7, 'kabehu@mailinator.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '1nZhUPh1lEU3ziycN46dexbbbIzGEP9ZGXgAciR6', NULL, 'http://localhost', 1, 0, 0, '2022-10-02 07:21:41', '2022-10-02 07:21:41'),
(2, NULL, 'Laravel Password Grant Client', 'PDB5G8HcNn3szc2Txevy10gbP5fe9ARvM3KPpWFh', 'users', 'http://localhost', 0, 1, 0, '2022-10-02 07:21:41', '2022-10-02 07:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-02 07:21:41', '2022-10-02 07:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `return_order` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `status_code`, `paying_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `return_order`, `payment_type`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(6, '3', 'card_1LovBkJ1VeIVckU3uuy2fJqW', '63fb4d56d6a65', '207000', 'txn_3LovBlJ1VeIVckU30exw4ezV', '633b4500db43a', '2050.00', '15', '15', '2070', '3', '0', 'stripe', 'October', '20-10-22', '2022', NULL, NULL),
(7, '3', 'card_1LoxNVJ1VeIVckU3AD8cO66d', '63fb56d56d6a1', '77800', 'txn_3LoxNWJ1VeIVckU31Q8HiyJf', '633b65e23353a', '758.00', '15', '15', '778', '4', '0', 'stripe', 'October', '03-10-22', '2022', NULL, NULL),
(8, '3', 'card_1LoxRPJ1VeIVckU3IyIETpJy', '633b66d56d6a1', '87000', 'txn_3LoxRQJ1VeIVckU30EP4JgRo', '633b66d3c464c', '850.00', '15', '15', '870', '3', '2', 'stripe', 'October', '03-10-22', '2022', NULL, NULL),
(9, '2', 'card_1LpfU0J1VeIVckU38hd4gvPf', '633dfc2252d91', '87000', 'txn_3LpfU2J1VeIVckU30s2hL7Aw', '633dfc20737de', '845', '15', '15', '870', '3', '0', 'stripe', 'October', '05-10-22', '2022', NULL, NULL),
(10, '2', 'card_1Lpk4FJ1VeIVckU3nmboMuzq', '633e40f88b5f4', '97600', 'txn_3Lpk4HJ1VeIVckU31pjJm4wG', '633e40f6ae61b', '951', '15', '15', '976', '3', '0', 'stripe', 'October', '06-10-22', '2022', NULL, NULL),
(11, '3', 'card_1LwNlTJ1VeIVckU3UYxpaxFW', '635666e194e76', '72000', 'txn_3LwNlUJ1VeIVckU31375v5Gn', '635666dfa0fb8', '700.00', '15', '15', '720', '0', '0', 'stripe', 'October', '24-10-22', '2022', NULL, NULL),
(12, '3', NULL, '6356779ece5cc', NULL, NULL, NULL, '946', '15', '15', '976', '0', '0', 'oncash', 'October', '24-10-22', '2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(7, 6, 10, 'woman top collection', 'pink', 'm', '2', '700', '1400', NULL, NULL),
(9, 7, 3, 'New Product', 'red', 'm', '1', '758', '758', NULL, NULL),
(10, 8, 4, 'Mans T-sharts', 'red', 's', '1', '850', '850', NULL, NULL),
(11, 9, 4, 'Mans T-sharts', 'red', 's', '1', '850', '850', NULL, NULL),
(12, 10, 8, 'Ladis Drash', 'yellow', 's', '1', '956', '956', NULL, NULL),
(13, 11, 10, 'woman top collection', NULL, NULL, '1', '700', '700', NULL, NULL),
(14, 12, 8, 'Ladis Drash', 'yellow', 'm', '1', '956', '956', NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_in` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `post_title_en`, `post_title_in`, `post_image`, `details_en`, `details_in`, `created_at`, `updated_at`) VALUES
(1, 4, 'How to Install laravel on Ubuntu 20.04 Os', 'Ã Â¤â€°Ã Â¤Â¬Ã Â¤â€šÃ Â¤Å¸Ã Â¥â€š 20.04 Ã Â¤â€œÃ Â¤ÂÃ Â¤Â¸ Ã Â¤ÂªÃ Â¤Â° Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¥ÂÃ Â¤ÂµÃ Â¤Â¾ Ã Â¤â€¢Ã Â¥Ë†Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤Â¸Ã Â¥ÂÃ Â¤Â¥Ã Â¤Â¾Ã Â¤ÂªÃ Â¤Â¿Ã Â¤Â¤ Ã Â¤â€¢Ã Â¤Â°Ã Â¥â€¡Ã Â¤â€š?', 'media/post/1745578180032530.png', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 1em; color: rgb(71, 75, 81); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 16px;\">Laravel is a web application framework based on PHP for building enterprise web applications. It\'s a free and open web framework that follows model-view-controller (MVC) architecture and is based on Symfony. it provides elegant syntax that allows you to create applications with clean code and is easy to read and understand.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 1em; color: rgb(71, 75, 81); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 16px;\"><img src=\"https://www.itsolutionstuff.com/upload/laravel-6-resize-image.png?ezimgfmt=rs%3Adevice%2Frscb4-1\" style=\"width: 100%; float: none;\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 1em; color: rgb(71, 75, 81); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 16px;\">Laravel is an enterprise-grade web framework for building enterprise and robust full-stack web applications. Laravel applications can be delivered fastly without headaches, from the development process to the production.Pairing the Laravel web framework with another framework such as React or Vue allows you to create a beautiful and interactive frontend. Also, its supports multiple databases including MySQL, PostgreSQL, SQLite, and SQL Server. Laravel also provides scaffolding for secure authentication.In this tutorial, you will learn how to install the Laravel on the latest Ubuntu 22.04 LTS. This will also include how to set up the LAMP Stack for the Laravel development.</p>', '<p>Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â² Ã Â¤ÂÃ Â¤â€šÃ Â¤Å¸Ã Â¤Â°Ã Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¾Ã Â¤â€¡Ã Â¤Å“Ã Â¤Â¼ Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â¬ Ã Â¤â€¦Ã Â¤Â¨Ã Â¥ÂÃ Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¯Ã Â¥â€¹Ã Â¤â€”Ã Â¥â€¹Ã Â¤â€š Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â¨Ã Â¤Â¿Ã Â¤Â°Ã Â¥ÂÃ Â¤Â®Ã Â¤Â¾Ã Â¤Â£ Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â²Ã Â¤Â¿Ã Â¤Â PHP Ã Â¤ÂªÃ Â¤Â° Ã Â¤â€ Ã Â¤Â§Ã Â¤Â¾Ã Â¤Â°Ã Â¤Â¿Ã Â¤Â¤ Ã Â¤ÂÃ Â¤â€¢ Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â¬ Ã Â¤â€¦Ã Â¤Â¨Ã Â¥ÂÃ Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¯Ã Â¥â€¹Ã Â¤â€” Ã Â¤Â¢Ã Â¤Â¾Ã Â¤â€šÃ Â¤Å¡Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤ Ã Â¤Â¯Ã Â¤Â¹ Ã Â¤ÂÃ Â¤â€¢ Ã Â¤Â¸Ã Â¥ÂÃ Â¤ÂµÃ Â¤Â¤Ã Â¤â€šÃ Â¤Â¤Ã Â¥ÂÃ Â¤Â° Ã Â¤â€Ã Â¤Â° Ã Â¤â€“Ã Â¥ÂÃ Â¤Â²Ã Â¤Â¾ Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â¬ Ã Â¤Â¢Ã Â¤Â¾Ã Â¤â€šÃ Â¤Å¡Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë† Ã Â¤Å“Ã Â¥â€¹ Ã Â¤Â®Ã Â¥â€°Ã Â¤Â¡Ã Â¤Â²-Ã Â¤ÂµÃ Â¥ÂÃ Â¤Â¯Ã Â¥â€š-Ã Â¤â€¢Ã Â¤â€šÃ Â¤Å¸Ã Â¥ÂÃ Â¤Â°Ã Â¥â€¹Ã Â¤Â²Ã Â¤Â° (Ã Â¤ÂÃ Â¤Â®Ã Â¤ÂµÃ Â¥â‚¬Ã Â¤Â¸Ã Â¥â‚¬) Ã Â¤â€ Ã Â¤Â°Ã Â¥ÂÃ Â¤â€¢Ã Â¤Â¿Ã Â¤Å¸Ã Â¥â€¡Ã Â¤â€¢Ã Â¥ÂÃ Â¤Å¡Ã Â¤Â° Ã Â¤â€¢Ã Â¤Â¾ Ã Â¤â€¦Ã Â¤Â¨Ã Â¥ÂÃ Â¤Â¸Ã Â¤Â°Ã Â¤Â£ Ã Â¤â€¢Ã Â¤Â°Ã Â¤Â¤Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë† Ã Â¤â€Ã Â¤Â° Ã Â¤Â¸Ã Â¤Â¿Ã Â¤Â®Ã Â¥ÂÃ Â¤Â«Ã Â¤Â¨Ã Â¥â‚¬ Ã Â¤ÂªÃ Â¤Â° Ã Â¤â€ Ã Â¤Â§Ã Â¤Â¾Ã Â¤Â°Ã Â¤Â¿Ã Â¤Â¤ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤ Ã Â¤Â¯Ã Â¤Â¹ Ã Â¤Â¸Ã Â¥ÂÃ Â¤Â°Ã Â¥ÂÃ Â¤Å¡Ã Â¤Â¿Ã Â¤ÂªÃ Â¥â€šÃ Â¤Â°Ã Â¥ÂÃ Â¤Â£ Ã Â¤Â¸Ã Â¤Â¿Ã Â¤â€šÃ Â¤Å¸Ã Â¥Ë†Ã Â¤â€¢Ã Â¥ÂÃ Â¤Â¸ Ã Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¦Ã Â¤Â¾Ã Â¤Â¨ Ã Â¤â€¢Ã Â¤Â°Ã Â¤Â¤Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë† Ã Â¤Å“Ã Â¥â€¹ Ã Â¤â€ Ã Â¤ÂªÃ Â¤â€¢Ã Â¥â€¹ Ã Â¤Â¸Ã Â¥ÂÃ Â¤ÂµÃ Â¤Å¡Ã Â¥ÂÃ Â¤â€º Ã Â¤â€¢Ã Â¥â€¹Ã Â¤Â¡ Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â¸Ã Â¤Â¾Ã Â¤Â¥ Ã Â¤ÂÃ Â¤ÂªÃ Â¥ÂÃ Â¤Â²Ã Â¤Â¿Ã Â¤â€¢Ã Â¥â€¡Ã Â¤Â¶Ã Â¤Â¨ Ã Â¤Â¬Ã Â¤Â¨Ã Â¤Â¾Ã Â¤Â¨Ã Â¥â€¡ Ã Â¤â€¢Ã Â¥â‚¬ Ã Â¤â€¦Ã Â¤Â¨Ã Â¥ÂÃ Â¤Â®Ã Â¤Â¤Ã Â¤Â¿ Ã Â¤Â¦Ã Â¥â€¡Ã Â¤Â¤Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë† Ã Â¤â€Ã Â¤Â° Ã Â¤ÂªÃ Â¤Â¢Ã Â¤Â¼Ã Â¤Â¨Ã Â¥â€¡ Ã Â¤â€Ã Â¤Â° Ã Â¤Â¸Ã Â¤Â®Ã Â¤ÂÃ Â¤Â¨Ã Â¥â€¡ Ã Â¤Â®Ã Â¥â€¡Ã Â¤â€š Ã Â¤â€ Ã Â¤Â¸Ã Â¤Â¾Ã Â¤Â¨ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤</p><p>Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â² Ã Â¤â€°Ã Â¤Â¦Ã Â¥ÂÃ Â¤Â¯Ã Â¤Â® Ã Â¤Â¨Ã Â¤Â¿Ã Â¤Â°Ã Â¥ÂÃ Â¤Â®Ã Â¤Â¾Ã Â¤Â£ Ã Â¤â€Ã Â¤Â° Ã Â¤Â®Ã Â¤Å“Ã Â¤Â¬Ã Â¥â€šÃ Â¤Â¤ Ã Â¤ÂªÃ Â¥â€šÃ Â¤Â°Ã Â¥ÂÃ Â¤Â£-Ã Â¤Â¸Ã Â¥ÂÃ Â¤Å¸Ã Â¥Ë†Ã Â¤â€¢ Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â¬ Ã Â¤â€¦Ã Â¤Â¨Ã Â¥ÂÃ Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¯Ã Â¥â€¹Ã Â¤â€”Ã Â¥â€¹Ã Â¤â€š Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â²Ã Â¤Â¿Ã Â¤Â Ã Â¤ÂÃ Â¤â€¢ Ã Â¤â€°Ã Â¤Â¦Ã Â¥ÂÃ Â¤Â¯Ã Â¤Â®-Ã Â¤Â¶Ã Â¥ÂÃ Â¤Â°Ã Â¥â€¡Ã Â¤Â£Ã Â¥â‚¬ Ã Â¤â€¢Ã Â¤Â¾ Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â¬ Ã Â¤Â¢Ã Â¤Â¾Ã Â¤â€šÃ Â¤Å¡Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤ Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â² Ã Â¤â€¦Ã Â¤Â¨Ã Â¥ÂÃ Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¯Ã Â¥â€¹Ã Â¤â€”Ã Â¥â€¹Ã Â¤â€š Ã Â¤â€¢Ã Â¥â€¹ Ã Â¤ÂµÃ Â¤Â¿Ã Â¤â€¢Ã Â¤Â¾Ã Â¤Â¸ Ã Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤â€¢Ã Â¥ÂÃ Â¤Â°Ã Â¤Â¿Ã Â¤Â¯Ã Â¤Â¾ Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤Â²Ã Â¥â€¡Ã Â¤â€¢Ã Â¤Â° Ã Â¤â€°Ã Â¤Â¤Ã Â¥ÂÃ Â¤ÂªÃ Â¤Â¾Ã Â¤Â¦Ã Â¤Â¨ Ã Â¤Â¤Ã Â¤â€¢, Ã Â¤Â¬Ã Â¤Â¿Ã Â¤Â¨Ã Â¤Â¾ Ã Â¤Â¸Ã Â¤Â¿Ã Â¤Â°Ã Â¤Â¦Ã Â¤Â°Ã Â¥ÂÃ Â¤Â¦ Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â¤Ã Â¥â€¡Ã Â¤Å“Ã Â¥â‚¬ Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤ÂµÃ Â¤Â¿Ã Â¤Â¤Ã Â¤Â°Ã Â¤Â¿Ã Â¤Â¤ Ã Â¤â€¢Ã Â¤Â¿Ã Â¤Â¯Ã Â¤Â¾ Ã Â¤Å“Ã Â¤Â¾ Ã Â¤Â¸Ã Â¤â€¢Ã Â¤Â¤Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤</p><p>Laravel Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â¬ Ã Â¤Â«Ã Â¥ÂÃ Â¤Â°Ã Â¥â€¡Ã Â¤Â®Ã Â¤ÂµÃ Â¤Â°Ã Â¥ÂÃ Â¤â€¢ Ã Â¤â€¢Ã Â¥â€¹ Ã Â¤Â¦Ã Â¥â€šÃ Â¤Â¸Ã Â¤Â°Ã Â¥â€¡ Ã Â¤Â«Ã Â¥ÂÃ Â¤Â°Ã Â¥â€¡Ã Â¤Â®Ã Â¤ÂµÃ Â¤Â°Ã Â¥ÂÃ Â¤â€¢ Ã Â¤Å“Ã Â¥Ë†Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤Â°Ã Â¤Â¿Ã Â¤ÂÃ Â¤â€¢Ã Â¥ÂÃ Â¤Å¸ Ã Â¤Â¯Ã Â¤Â¾ Vue Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â¸Ã Â¤Â¾Ã Â¤Â¥ Ã Â¤ÂªÃ Â¥â€¡Ã Â¤Â¯Ã Â¤Â° Ã Â¤â€¢Ã Â¤Â°Ã Â¤Â¨Ã Â¥â€¡ Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤â€ Ã Â¤Âª Ã Â¤ÂÃ Â¤â€¢ Ã Â¤Â¸Ã Â¥ÂÃ Â¤â€šÃ Â¤Â¦Ã Â¤Â° Ã Â¤â€Ã Â¤Â° Ã Â¤â€¡Ã Â¤â€šÃ Â¤Å¸Ã Â¤Â°Ã Â¥â€¡Ã Â¤â€¢Ã Â¥ÂÃ Â¤Å¸Ã Â¤Â¿Ã Â¤Âµ Ã Â¤Â«Ã Â¥ÂÃ Â¤Â°Ã Â¤â€šÃ Â¤Å¸Ã Â¤ÂÃ Â¤â€šÃ Â¤Â¡ Ã Â¤Â¬Ã Â¤Â¨Ã Â¤Â¾ Ã Â¤Â¸Ã Â¤â€¢Ã Â¤Â¤Ã Â¥â€¡ Ã Â¤Â¹Ã Â¥Ë†Ã Â¤â€šÃ Â¥Â¤ Ã Â¤Â¸Ã Â¤Â¾Ã Â¤Â¥ Ã Â¤Â¹Ã Â¥â‚¬, Ã Â¤Â¯Ã Â¤Â¹ MySQL, PostgreSQL, SQLite Ã Â¤â€Ã Â¤Â° SQL Server Ã Â¤Â¸Ã Â¤Â¹Ã Â¤Â¿Ã Â¤Â¤ Ã Â¤â€¢Ã Â¤Ë† Ã Â¤Â¡Ã Â¥â€¡Ã Â¤Å¸Ã Â¤Â¾Ã Â¤Â¬Ã Â¥â€¡Ã Â¤Â¸ Ã Â¤â€¢Ã Â¥â€¹ Ã Â¤Â¸Ã Â¤ÂªÃ Â¥â€¹Ã Â¤Â°Ã Â¥ÂÃ Â¤Å¸ Ã Â¤â€¢Ã Â¤Â°Ã Â¤Â¤Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤ Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â² Ã Â¤Â¸Ã Â¥ÂÃ Â¤Â°Ã Â¤â€¢Ã Â¥ÂÃ Â¤Â·Ã Â¤Â¿Ã Â¤Â¤ Ã Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â®Ã Â¤Â¾Ã Â¤Â£Ã Â¥â‚¬Ã Â¤â€¢Ã Â¤Â°Ã Â¤Â£ Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â²Ã Â¤Â¿Ã Â¤Â Ã Â¤Â®Ã Â¤Å¡Ã Â¤Â¾Ã Â¤Â¨ Ã Â¤Â­Ã Â¥â‚¬ Ã Â¤ÂªÃ Â¥ÂÃ Â¤Â°Ã Â¤Â¦Ã Â¤Â¾Ã Â¤Â¨ Ã Â¤â€¢Ã Â¤Â°Ã Â¤Â¤Ã Â¤Â¾ Ã Â¤Â¹Ã Â¥Ë†Ã Â¥Â¤</p><p>Ã Â¤â€¡Ã Â¤Â¸ Ã Â¤Å¸Ã Â¥ÂÃ Â¤Â¯Ã Â¥â€šÃ Â¤Å¸Ã Â¥â€¹Ã Â¤Â°Ã Â¤Â¿Ã Â¤Â¯Ã Â¤Â² Ã Â¤Â®Ã Â¥â€¡Ã Â¤â€š, Ã Â¤â€ Ã Â¤Âª Ã Â¤Â¸Ã Â¥â‚¬Ã Â¤â€“Ã Â¥â€¡Ã Â¤â€šÃ Â¤â€”Ã Â¥â€¡ Ã Â¤â€¢Ã Â¤Â¿ Ã Â¤Â¨Ã Â¤ÂµÃ Â¥â‚¬Ã Â¤Â¨Ã Â¤Â¤Ã Â¤Â® Ã Â¤â€°Ã Â¤Â¬Ã Â¤â€šÃ Â¤Å¸Ã Â¥â€š 22.04 Ã Â¤ÂÃ Â¤Â²Ã Â¤Å¸Ã Â¥â‚¬Ã Â¤ÂÃ Â¤Â¸ Ã Â¤ÂªÃ Â¤Â° Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â² Ã Â¤â€¢Ã Â¥â€¹ Ã Â¤â€¢Ã Â¥Ë†Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤Â¸Ã Â¥ÂÃ Â¤Â¥Ã Â¤Â¾Ã Â¤ÂªÃ Â¤Â¿Ã Â¤Â¤ Ã Â¤â€¢Ã Â¤Â¿Ã Â¤Â¯Ã Â¤Â¾ Ã Â¤Å“Ã Â¤Â¾Ã Â¤ÂÃ Â¥Â¤ Ã Â¤â€¡Ã Â¤Â¸Ã Â¤Â®Ã Â¥â€¡Ã Â¤â€š Ã Â¤Â¯Ã Â¤Â¹ Ã Â¤Â­Ã Â¥â‚¬ Ã Â¤Â¶Ã Â¤Â¾Ã Â¤Â®Ã Â¤Â¿Ã Â¤Â² Ã Â¤Â¹Ã Â¥â€¹Ã Â¤â€”Ã Â¤Â¾ Ã Â¤â€¢Ã Â¤Â¿ Ã Â¤Â²Ã Â¤Â¾Ã Â¤Â°Ã Â¤ÂµÃ Â¥â€¡Ã Â¤Â² Ã Â¤ÂµÃ Â¤Â¿Ã Â¤â€¢Ã Â¤Â¾Ã Â¤Â¸ Ã Â¤â€¢Ã Â¥â€¡ Ã Â¤Â²Ã Â¤Â¿Ã Â¤Â LAMP Ã Â¤Â¸Ã Â¥ÂÃ Â¤Å¸Ã Â¥Ë†Ã Â¤â€¢ Ã Â¤â€¢Ã Â¥Ë†Ã Â¤Â¸Ã Â¥â€¡ Ã Â¤Â¸Ã Â¥ÂÃ Â¤Â¥Ã Â¤Â¾Ã Â¤ÂªÃ Â¤Â¿Ã Â¤Â¤ Ã Â¤â€¢Ã Â¤Â¿Ã Â¤Â¯Ã Â¤Â¾ Ã Â¤Å“Ã Â¤Â¾Ã Â¤ÂÃ Â¥Â¤</p>', '2022-09-23 14:05:59', '2022-10-02 07:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_in`, `created_at`, `updated_at`) VALUES
(1, 'Service', 'Ã Â¤Â¸Ã Â¥â€¡Ã Â¤ÂµÃ Â¤Â¾', '2022-09-23 11:15:31', NULL),
(2, 'Local', 'Ã Â¤Â¸Ã Â¥ÂÃ Â¤Â¥Ã Â¤Â¾Ã Â¤Â¨Ã Â¥â‚¬Ã Â¤Â¯', '2022-09-23 13:01:39', NULL),
(4, 'Education', 'Ã Â¤Â¶Ã Â¤Â¿Ã Â¤â€¢Ã Â¥ÂÃ Â¤Â·Ã Â¤Â¾', '2022-09-23 13:02:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `buyone_getone` int(11) DEFAULT NULL,
  `image_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `buyone_getone`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 12, 8, 'New Product', '4850395739', '142', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'red,blue', 'm,l,s', '758', NULL, 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, 1, 1, 1, 1, 1, 'media/product/1744794813767553.png', 'media/product/1744794813810370.png', 'media/product/1744794813845396.png', 1, '2022-09-23 14:46:41', '2022-09-28 10:48:40'),
(4, 3, 12, 9, 'Mans T-sharts', '4850395734', '343', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'red,black,white', 's,m,l', '956', '850', 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, 1, 1, 1, 1, 1, 'media/product/1744795159370899.png', 'media/product/1744795159414736.png', 'media/product/1744795159516382.png', 1, '2022-09-23 14:52:11', '2022-10-02 12:50:57'),
(5, 2, 14, 2, 'Woman T-shart', '4850395', '273', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'red,black,blue', 's,m,l', '1080', '342', 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, 1, 1, NULL, 1, NULL, 'media/product/1744795494132092.png', 'media/product/1744795494171783.png', 'media/product/1744795494207419.png', 1, '2022-09-23 14:57:30', '2022-10-02 13:24:50'),
(6, 6, 20, 2, 'waterprof watch', '48', '142', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'black,white,blue', 's,m,l', '758', '650', 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, NULL, NULL, 1, NULL, 1, 'media/product/1744795598463699.jpeg', 'media/product/1744795598547279.jpeg', 'media/product/1744795598596631.jpeg', 1, '2022-09-23 14:59:09', '2022-09-28 10:48:12'),
(7, 6, 22, 9, 'Golder Smart Watch', '48503957', '343', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'gold,red,gray', NULL, '350', NULL, 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, NULL, NULL, 1, 1, 1, 'media/product/1744795670871117.jpeg', 'media/product/1744795670910043.jpeg', 'media/product/1744795670973758.jpeg', 1, '2022-09-23 15:00:18', '2022-09-29 15:54:10'),
(8, 2, 14, 3, 'Ladis Drash', '485039573', '11', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'yellow,white', 's,m,l', '956', NULL, 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, 1, 1, 1, 1, NULL, 'media/product/1744795761592836.jpeg', 'media/product/1744795761665254.jpeg', 'media/product/1744795761730966.jpeg', 1, '2022-09-23 15:01:45', '2022-09-25 13:20:52'),
(9, 6, 22, 2, 'army analog watch', '4850395739', '142', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'green,blue,black', 's,m,l', '1222', '500', 'https://www.youtube.com/watch?v=1Dn9nBhxqac', 1, 1, 1, 1, 1, 1, NULL, 'media/product/1744876476513256.jpeg', 'media/product/1744795838700926.jpeg', 'media/product/1744795838772578.jpeg', 1, '2022-09-23 15:02:58', '2022-09-25 13:21:31'),
(10, 2, 15, 9, 'woman top collection', '4850395739', '140', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'pink,rose', 'm,l', '758', '700', 'https://www.youtube.com/watch?v=1Dn9nBhxqac', NULL, 1, 1, 1, 1, 1, NULL, 'media/product/1744878595563038.jpeg', 'media/product/1744878595633242.jpeg', 'media/product/1744878595742130.jpeg', 1, '2022-09-23 15:05:03', '2022-09-25 13:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Tech Store', 'khayrul shanto Shanto', 'shop', 'ecommerce website', 'google analytices', 'bing analytics', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` int(11) DEFAULT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, 5, '15', 'Khayrul Shop', 'khayrul@gmail.com', '01835061968', 'Araihazar, Narayangonj', NULL, '2022-10-01 18:27:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(6, 6, 'Khayrul Islam Shanto', '01835061968', 'khayrulshanto@gmail.com', 'Araihazar, Narayangonj, Dhaka-1450', 'Dhaka', NULL, NULL),
(7, 7, 'Karyn Hobbs', '+1 (256) 455-7287', 'cesyj@mailinator.com', '121 lampost road', 'London', NULL, NULL),
(8, 8, 'Fallon Crane', '+1 (312) 584-1216', 'tixyw@mailinator.com', 'Est rerum aut cupida', 'Ducimus enim error', NULL, NULL),
(9, 9, 'Ulric Nelson', '+1 (731) 908-6732', 'soniq@mailinator.com', 'Necessitatibus incid', 'Magnam voluptas cons', NULL, NULL),
(10, 10, 'Erich Finley', '+1 (197) 374-8959', 'wyzugytyfe@mailinator.com', 'Quidem natus numquam', 'Facilis aut at totam', NULL, NULL),
(11, 11, 'Brenna Meyer', '01303132067', 'cynosez@mailinator.com', 'Araihazar, Narayangonj, Dhaka-1450', 'Dhaka', NULL, NULL),
(12, 12, 'Bevis Walton', '+1 (711) 141-5627', 'neweqi@mailinator.com', 'Similique saepe in q', 'Facere pariatur Off', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instragram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook_link`, `youtube_link`, `instragram_link`, `twitter_link`, `created_at`, `updated_at`) VALUES
(1, '01835061968', '01303132067', 'ecommerce@mail.com', 'KB International', 'Araihazar, Narayangonj, Dhaka', 'facebook.com', 'youtube.com', 'instagram.com', 'twitter.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(12, 3, 'Gents Shirt', '2022-09-23 14:41:12', NULL),
(13, 3, 'Gents Pant', '2022-09-23 14:41:17', NULL),
(14, 2, 'Womens Tshirt', '2022-09-23 14:41:23', NULL),
(15, 2, 'Womens Shirt', '2022-09-23 14:41:30', NULL),
(16, 2, 'Womens Pant', '2022-09-23 14:41:36', NULL),
(17, 7, 'Child Dress & Footware', '2022-09-23 14:41:43', NULL),
(18, 7, 'Child Body Care', '2022-09-23 14:41:49', NULL),
(19, 7, 'Child Diaper', '2022-09-23 14:41:56', NULL),
(20, 6, 'Gents Watch', '2022-09-23 14:42:06', NULL),
(21, 6, 'Womans Watch', '2022-09-23 14:42:12', NULL),
(22, 6, 'Kids Watch', '2022-09-23 14:42:20', NULL),
(23, 9, 'Body Spray', '2022-09-23 14:42:28', NULL),
(24, 9, 'Finger Ring', '2022-09-23 14:42:35', NULL),
(25, 9, 'Jewelry', '2022-09-23 14:42:41', NULL),
(26, 11, 'Appliances', '2022-09-23 14:42:48', NULL),
(27, 11, 'Room Decoration', '2022-09-23 14:42:55', NULL),
(28, 11, 'Light and Lamp', '2022-09-23 14:43:02', NULL),
(29, 11, 'Security', '2022-09-23 14:43:09', NULL),
(30, 3, 'T-Shart', '2022-09-27 03:22:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avater`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'jack', 'jack@mail.com', '01303132067', NULL, '2022-09-26 13:21:33', '$2y$10$X0Wm0LI/9niRZCi74XLjq.WIbIBsHxAk4.j6h.ZmCZzDM0akYBDwW', NULL, '2022-09-26 13:20:18', '2022-09-26 13:21:33'),
(3, 'User', 'user@mail.com', '01835061968', NULL, '2022-09-26 13:38:55', '$2y$10$mfyZdKrQNhd6oiHHGwwhPezXrhi0RteP4iqh..VtWwdDZKkLkg61G', NULL, '2022-09-26 13:38:32', '2022-09-28 03:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 3, 10, NULL, NULL),
(10, 3, 8, NULL, NULL),
(11, 3, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslaters`
--
ALTER TABLE `newslaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_subcategory_name_unique` (`subcategory_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `newslaters`
--
ALTER TABLE `newslaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
