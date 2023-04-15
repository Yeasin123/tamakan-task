-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2023 at 03:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.28

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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `verification_token`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yeasin', 'imranyeasin75@gmail.com', '12345678910', '$2y$10$7qv/djW3XAdDMDFFZUoqXu9sYv1CacDLE4QNVNVxuNkYyjy443I4m', NULL, '2023-04-15 08:26:40', NULL, '2023-04-15 08:26:32', '2023-04-15 08:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `delivery_charge` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area`, `city_id`, `delivery_charge`, `created_at`, `updated_at`) VALUES
(1, 'Uttara', 1, 40, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(2, 'Adabor', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(3, 'Aftabnagar', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(4, 'Agargaon', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(5, 'Aminbazar', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(6, 'Azimpur', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(7, 'Babubazar', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(8, 'Badda', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(9, 'Banani', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(10, 'Banasree', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(11, 'Bangshal', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(12, 'Baridhara', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(13, 'Baridhara J Block', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(14, 'Basundhara RA', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(15, 'Bawnia', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(16, 'Bosila', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(17, 'BSCIC, Narayanganj', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(18, 'Cantonment', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(19, 'Chashara, Narayanganj', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(20, 'Dakshin Khan', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(21, 'Dayaganj', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(22, 'Deobhog Narayanganj', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(23, 'Dhaka University', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(24, 'Dhalpur', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(25, 'Dhanmondi', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(26, 'Dholaipar', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(27, 'DOHS Banani', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(28, 'DOHS Baridhara', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(29, 'DOHS Mirpur', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(30, 'DOHS Mohakhali', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(31, 'Eskaton', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(32, 'Faridabad', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(33, 'Farmgate', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(34, 'Fatullah, Narayanganj', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(35, 'Gabtoli', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(36, 'Gandaria', 1, 32, '2023-04-15 00:15:49', '2023-04-15 00:15:49'),
(37, 'Gulshan', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(38, 'Indira Road', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(39, 'Jalkury, Narayanganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(40, 'Jatrabari', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(41, 'Jurain', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(42, 'Kafrul', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(43, 'Kakrail', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(44, 'Kalabagan', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(45, 'Kallyanpur', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(46, 'Kalshi', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(47, 'Kamrangir Char', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(48, 'Kashipur, Narayanganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(49, 'Kathalbagan', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(50, 'Kawla', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(51, 'Kazipara', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(52, 'Khanpur, Narayanganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(53, 'Khilgaon', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(54, 'Khilkhet', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(55, 'Kotwali', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(56, 'Kuril', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(57, 'Lalbagh', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(58, 'Lalmatia', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(59, 'Malibagh', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(60, 'Maniknagar', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(61, 'Masdair, Narayanganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(62, 'Matikata', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(63, 'Matuail', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(64, 'Merul Badda', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(65, 'Mirpur', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(66, 'Moghbazaar', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(67, 'Mohakhali', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(68, 'Mohammadpur', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(69, 'Motijheel', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(70, 'Mridhabari', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(71, 'Munshiganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(72, 'Niketan', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(73, 'Nikunja', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(74, 'Nitaigonj, Narayanganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(75, 'Pagla, Narayanganj', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(76, 'Paikpara', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(77, 'Pallabi', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(78, 'Paltan', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(79, 'Panthapath', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(80, 'Pink City', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(81, 'Ramna', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(82, 'Rampura', 1, 32, '2023-04-15 00:15:50', '2023-04-15 00:15:50'),
(83, 'Rayerbagh', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(84, 'Sadarghat', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(85, 'Sankar', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(86, 'Shahbagh', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(87, 'Shaymoli', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(88, 'Shewrapara', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(89, 'Shiddhirganj, Narayanganj', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(90, 'Shonir akra', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(91, 'Sibu Market, Narayanganj', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(92, 'Sutrapur', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(93, 'Tejgaon', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(94, 'Tongi', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(95, 'Uttar Khan', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(96, 'Uttara', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(97, 'Vatara', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(98, 'Vatulia', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51'),
(99, 'Wari', 1, 32, '2023-04-15 00:15:51', '2023-04-15 00:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(2, 'Samsung', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(3, 'OPPO', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(4, 'Huawei', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(5, 'Microsoft Surface', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(6, 'Infinix', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(7, 'HP Pavilion', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(8, 'Impression of Acqua Di Gio', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(9, 'Royal_Mirage', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(10, 'Fog Scent Xpressio', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(11, 'Al Munakh', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(12, 'Lord - Al-Rehab', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(13, 'L\'Oreal Paris', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(14, 'Hemani Tea', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(15, 'Dermive', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(16, 'ROREC White Rice', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(17, 'Fair & Clear', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(18, 'Saaf & Khaas', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(19, 'Bake Parlor Big', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(20, 'Baking Food Items', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(21, 'fauji', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(22, 'Dry Rose', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(23, 'Boho Decor', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(24, 'Flying Wooden', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(25, 'LED Lights', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(26, 'luxury palace', '2023-04-14 17:17:26', '2023-04-14 17:17:26'),
(27, 'Golden', '2023-04-14 17:17:26', '2023-04-14 17:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'smartphones', '2023-04-14 17:15:57', '2023-04-14 17:15:57'),
(2, 'laptops', '2023-04-14 17:15:57', '2023-04-14 17:15:57'),
(3, 'fragrances', '2023-04-14 17:15:57', '2023-04-14 17:15:57'),
(4, 'skincare', '2023-04-14 17:15:57', '2023-04-14 17:15:57'),
(5, 'groceries', '2023-04-14 17:15:57', '2023-04-14 17:15:57'),
(6, 'home-decoration', '2023-04-14 17:15:57', '2023-04-14 17:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2023-04-15 00:14:34', '2023-04-15 00:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_16_114601_create_roles_table', 1),
(6, '2021_09_18_030842_create_brands_table', 1),
(7, '2021_09_18_031234_create_categories_table', 1),
(8, '2021_09_18_091916_create_coupons_table', 1),
(9, '2021_09_19_150126_create_products_table', 1),
(10, '2021_09_27_031956_create_wishlists_table', 1),
(11, '2021_10_10_142244_create_orders_table', 1),
(12, '2021_10_11_065946_create_order_details_table', 1),
(13, '2021_10_11_070704_create_cities_table', 1),
(14, '2021_10_11_070705__create_areas_table', 1),
(15, '2021_10_11_070706_create_shippings_table', 1),
(16, '2021_10_16_062154_create_main_sliders_table', 1),
(17, '2021_10_17_065602_create_admins_table', 1),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(26, '2016_06_01_000004_create_oauth_clients_table', 2),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('31b505cb5b3146175498018c2bbe8bd08688ac7a5136437db531e9677cc46eb459fe062a50923d21', 2, 1, 'MarnbazarAdmin', '[]', 0, '2023-04-15 05:35:56', '2023-04-15 05:35:56', '2024-04-15 11:35:56'),
('46e5a1f922dc22a797832e0c36394d1f50db3af81a303598f0e44597942d0070f8a539e5dd499f8b', 2, 1, 'tamakan', '[]', 0, '2023-04-15 05:33:21', '2023-04-15 05:33:21', '2024-04-15 11:33:21'),
('b083df31394b5507822a902745bce665f345f5ba3ead5314e7a7a592104f9c34e19590a191f67363', 5, 1, 'authToken', '[]', 0, '2023-04-15 04:54:57', '2023-04-15 04:54:57', '2024-04-15 10:54:57'),
('bbc98cb3c97f73ca21259913636a98b59595b1b587441015a06e4207b25eb5d9a267590c65ca0764', 6, 1, 'authToken', '[]', 0, '2023-04-15 05:09:12', '2023-04-15 05:09:12', '2024-04-15 11:09:12'),
('f27db5b665418c959a5ed9ef7c58ccf0ffafed1de3aa71842b7936eb1ef885423a0d311cb8fcffe6', 6, 1, 'tamakan', '[]', 0, '2023-04-15 04:59:42', '2023-04-15 04:59:42', '2024-04-15 10:59:42'),
('fb9d7b2c5a7ded46a538b6069f331ad326f0fd5bfcd134377ef3fac38ae58bccac7cc32cfa594326', 6, 1, 'authToken', '[]', 0, '2023-04-15 05:06:37', '2023-04-15 05:06:37', '2024-04-15 11:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, NULL, 'AmarInfo Personal Access Client', 'zGDPsrWhjM3NyyvAbEWaNocSh5p7MybnCsL1htY3', NULL, 'http://localhost', 1, 0, 0, '2023-04-15 04:40:39', '2023-04-15 04:40:39'),
(2, NULL, 'AmarInfo Password Grant Client', 'VNs9HGsVxS6WTKKe82Jn7dortDeIflhtPPRrvsLQ', 'users', 'http://localhost', 0, 1, 0, '2023-04-15 04:40:39', '2023-04-15 04:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-15 04:40:39', '2023-04-15 04:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `payment_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_return` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bl_transtraction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `order_return`, `payment_type`, `order_invoice`, `stripe_order_id`, `paying_amout`, `bl_transtraction`, `subtotal`, `total`, `status`, `month`, `day`, `year`, `order_status_code`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '0', 'cash', 'AMARINFO#483751', NULL, '1762', NULL, '1762', '1762', '0', 'April', '15-04-23', '2023', '611711', NULL, NULL),
(2, 1, NULL, '0', 'cash', 'AMARINFO#894548', NULL, '5', NULL, '5', '5', '0', 'April', '15-04-23', '2023', '114063', NULL, NULL),
(3, 1, NULL, '0', 'cash', 'AMARINFO#310451', NULL, '30', NULL, '30', '30', '0', 'April', '15-04-23', '2023', '168162', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` int DEFAULT NULL,
  `single_price` int DEFAULT NULL,
  `totalprice` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_qty`, `single_price`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'iPhone X', 2, 881, 1762, NULL, NULL),
(2, 2, 13, 'Fog Scent Xpressio Perfume', 1, 5, 5, NULL, NULL),
(3, 3, 21, '- Daal Masoor 500 grams', 2, 15, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discountPercentage` decimal(8,2) DEFAULT NULL,
  `rating` decimal(8,2) DEFAULT NULL,
  `stock` int NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `brand`, `title`, `description`, `price`, `discountPercentage`, `rating`, `stock`, `thumbnail`, `images`, `created_at`, `updated_at`) VALUES
(1, 'smartphones', 'Apple', 'iPhone 9', 'An apple mobile which is nothing like apple', 549.00, 12.96, 4.69, 94, '643a749c05752.jpg', '[\"643a7677506da.jpg\", \"643a76798568b.jpg\", \"643a767b99c4d.jpg\", \"643a767da118c.jpg\", \"643a767f9fa06.jpg\"]', '2023-04-15 03:55:13', '2023-04-15 04:03:45'),
(2, 'smartphones', 'Apple', 'iPhone X', 'SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...', 899.00, 17.94, 4.44, 34, '643a749e26434.jpg', '[\"643a7681aea0d.jpg\", \"643a76843b895.jpg\", \"643a7686466fe.jpg\", \"643a7688c8379.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:03:54'),
(3, 'smartphones', 'Samsung', 'Samsung Universe 9', 'Samsung\'s new variant which goes beyond Galaxy to the Universe', 1249.00, 15.46, 4.09, 36, '643a74a040a1a.jpg', '[\"643a768ad31cf.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:03:56'),
(4, 'smartphones', 'OPPO', 'OPPOF19', 'OPPO F19 is officially announced on April 2021.', 280.00, 17.91, 4.30, 123, '643a74a2570e1.jpg', '[\"643a768cdb41d.jpg\", \"643a768f63423.jpg\", \"643a76916502e.jpg\", \"643a7693e96bc.jpg\", \"643a7695f0a75.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:04:08'),
(5, 'smartphones', 'Huawei', 'Huawei P30', 'Huawei’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.', 499.00, 10.58, 4.09, 32, '643a74a4d1235.jpg', '[\"643a76988be64.jpg\", \"643a769b13d1d.jpg\", \"643a769d241e4.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:04:15'),
(6, 'laptops', 'Apple', 'MacBook Pro', 'MacBook Pro 2021 with mini-LED display may launch between September, November', 1749.00, 11.02, 4.57, 83, '643a74a764a0b.png', '[\"643a769faa728.png\", \"643a76a1ada06.jpg\", \"643a76a3aedb3.png\", \"643a76a5b3aec.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:04:23'),
(7, 'laptops', 'Samsung', 'Samsung Galaxy Book', 'Samsung Galaxy Book S (2020) Laptop With Intel Lakefield Chip, 8GB of RAM Launched', 1499.00, 4.15, 4.25, 50, '643a74a978fa0.jpg', '[\"643a76a7bc9c7.jpg\", \"643a76a9c2d6e.jpg\", \"643a76abc360f.jpg\", \"643a76add2c17.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:04:31'),
(8, 'laptops', 'Microsoft Surface', 'Microsoft Surface Laptop 4', 'Style and speed. Stand out on HD video calls backed by Studio Mics. Capture ideas on the vibrant touchscreen.', 1499.00, 10.23, 4.43, 68, '643a74ab87c88.jpg', '[\"643a76afdd48f.jpg\", \"643a76b1e5e4b.jpg\", \"643a76b4004f5.jpg\", \"643a76b6afed4.jpg\", \"643a76b8b60a5.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:04:42'),
(9, 'laptops', 'Infinix', 'Infinix INBOOK', 'Infinix Inbook X1 Ci3 10th 8GB 256GB 14 Win10 Grey – 1 Year Warranty', 1099.00, 11.83, 4.54, 96, '643a74ada0af2.jpg', '[\"643a76bacac4d.jpg\", \"643a76bcd55f3.png\", \"643a76c06cf2f.png\", \"643a76c2b40a0.jpg\", \"643a76c4c27ab.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:04:54'),
(10, 'laptops', 'HP Pavilion', 'HP Pavilion 15-DK1056WM', 'HP Pavilion 15-DK1056WM Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10', 1099.00, 6.18, 4.43, 89, '643a74afb4881.jpeg', '[\"643a76c6d0e90.jpg\", \"643a76c95c3b0.jpg\", \"643a76cbc8c86.jpg\", \"643a76ce551ad.jpeg\"]', '2023-04-15 03:55:14', '2023-04-15 04:05:04'),
(11, 'fragrances', 'Impression of Acqua Di Gio', 'perfume Oil', 'Mega Discount, Impression of Acqua Di Gio by GiorgioArmani concentrated attar perfume Oil', 13.00, 8.40, 4.26, 65, '643a74b1c6e13.jpg', '[\"643a76d06d211.jpg\", \"643a76d27e1df.jpg\", \"643a76d6395da.jpg\", \"643a76d8bb3ec.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:05:15'),
(12, 'fragrances', 'Royal_Mirage', 'Brown Perfume', 'Royal_Mirage Sport Brown Perfume for Men & Women - 120ml', 40.00, 15.66, 4.00, 52, '643a74b452ef6.jpg', '[\"643a76db48585.jpg\", \"643a76de8304e.jpg\", \"643a76e10cc8c.png\", \"643a76f5be9eb.jpg\", \"643a76f844108.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:05:47'),
(13, 'fragrances', 'Fog Scent Xpressio', 'Fog Scent Xpressio Perfume', 'Product details of Best Fog Scent Xpressio Perfume 100ml For Men cool long lasting perfumes for Men', 13.00, 8.14, 4.59, 61, '643a74b6eb6e9.webp', '[\"643a76fb1174f.jpg\", \"643a76fd21579.png\", \"643a76ff283ed.jpg\", \"643a77013b948.jpg\", \"643a7703c78e6.webp\"]', '2023-04-15 03:55:14', '2023-04-15 04:06:00'),
(14, 'fragrances', 'Al Munakh', 'Non-Alcoholic Concentrated Perfume Oil', 'Original Al Munakh® by Mahal Al Musk | Our Impression of Climate | 6ml Non-Alcoholic Concentrated Perfume Oil', 120.00, 15.60, 4.21, 114, '643a74b98108a.jpg', '[\"643a7708544ae.jpg\", \"643a770ad7215.jpg\", \"643a770ce71d2.jpg\", \"643a770f7604e.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:06:10'),
(15, 'fragrances', 'Lord - Al-Rehab', 'Eau De Perfume Spray', 'Genuine  Al-Rehab spray perfume from UAE/Saudi Arabia/Yemen High Quality', 30.00, 10.99, 4.70, 105, '643a74bc19e44.jpg', '[\"643a771240196.jpg\", \"643a7714c1126.jpg\", \"643a77174cfd5.jpg\", \"643a7719ccdf4.jpg\", \"643a771bd71fb.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:06:21'),
(16, 'skincare', 'L\'Oreal Paris', 'Hyaluronic Acid Serum', 'L\'OrÃ©al Paris introduces Hyaluron Expert Replumping Serum formulated with 1.5% Hyaluronic Acid', 19.00, 13.31, 4.83, 110, '643a74be2c286.jpg', '[\"643a771de8e7e.png\", \"643a77207538c.webp\", \"643a772280a1b.jpg\", \"643a772487f44.jpg\", \"643a7727170aa.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:06:33'),
(17, 'skincare', 'Hemani Tea', 'Tree Oil 30ml', 'Tea tree oil contains a number of compounds, including terpinen-4-ol, that have been shown to kill certain bacteria,', 12.00, 4.09, 4.52, 78, '643a74c0386e0.jpg', '[\"643a772929afa.jpg\", \"643a772b9c3a1.jpg\", \"643a772e28e58.jpg\", \"643a7730a6b00.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:06:42'),
(18, 'skincare', 'Dermive', 'Oil Free Moisturizer 100ml', 'Dermive Oil Free Moisturizer with SPF 20 is specifically formulated with ceramides, hyaluronic acid & sunscreen.', 40.00, 13.10, 4.56, 88, '643a74c24eccc.jpg', '[\"643a7732b1f7a.jpg\", \"643a7734bf7db.jpg\", \"643a7736cef39.jpg\", \"643a7738de762.jpg\", \"643a773bbad59.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:06:54'),
(19, 'skincare', 'ROREC White Rice', 'Skin Beauty Serum.', 'Product name: rorec collagen hyaluronic acid white face serum riceNet weight: 15 m', 46.00, 10.68, 4.42, 54, '643a74c4d4fc8.jpg', '[\"643a773e56587.jpg\", \"643a77405fc7f.jpg\", \"643a7742d4e31.png\", \"643a77455ef6f.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:07:03'),
(20, 'skincare', 'Fair & Clear', 'Freckle Treatment Cream- 15gm', 'Fair & Clear is Pakistan\'s only pure Freckle cream which helpsfade Freckles, Darkspots and pigments. Mercury level is 0%, so there are no side effects.', 70.00, 16.99, 4.06, 140, '643a74c7630b3.jpg', '[\"643a7747e29f2.jpg\", \"643a774a70aec.jpg\", \"643a774c7bf59.jpg\", \"643a774f012f0.jpg\", \"643a77517fa63.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:07:15'),
(21, 'groceries', 'Saaf & Khaas', '- Daal Masoor 500 grams', 'Fine quality Branded Product Keep in a cool and dry place', 20.00, 4.81, 4.44, 133, '643a74c97b7a2.png', '[\"643a77539131a.png\", \"643a77561c24b.jpg\", \"643a7758a3572.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:07:23'),
(22, 'groceries', 'Bake Parlor Big', 'Elbow Macaroni - 400 gm', 'Product details of Bake Parlor Big Elbow Macaroni - 400 gm', 14.00, 15.58, 4.57, 146, '643a74cc0784c.jpg', '[\"643a775b39cfe.jpg\", \"643a775db1c7a.jpg\", \"643a7760303ab.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:07:30'),
(23, 'groceries', 'Baking Food Items', 'Orange Essence Food Flavou', 'Specifications of Orange Essence Food Flavour For Cakes and Baking Food Item', 14.00, 8.04, 4.85, 26, '643a74ce1ddf0.jpg', '[\"643a776241c74.jpg\", \"643a77644b18c.jpg\", \"643a7766c99a2.jpg\", \"643a7768d8083.jpg\", \"643a776ae3575.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:07:40'),
(24, 'groceries', 'fauji', 'cereals muesli fruit nuts', 'original fauji cereal muesli 250gm box pack original fauji cereals muesli fruit nuts flakes breakfast cereal break fast faujicereals cerels cerel foji fouji', 46.00, 16.80, 4.94, 113, '643a74d02e337.jpg', '[\"643a776cf0b5e.jpg\", \"643a776f73ff9.jpg\", \"643a7771ec762.jpg\", \"643a77746e9a8.jpg\", \"643a77773a251.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:07:53'),
(25, 'groceries', 'Dry Rose', 'Gulab Powder 50 Gram', 'Dry Rose Flower Powder Gulab Powder 50 Gram • Treats Wounds', 70.00, 13.58, 4.87, 47, '643a74d2ae625.jpg', '[\"643a7779d02e9.png\", \"643a777c4d25d.jpg\", \"643a777ec3daa.png\", \"643a778148306.jpg\", \"643a7783cbf52.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:08:06'),
(26, 'home-decoration', 'Boho Decor', 'Plant Hanger For Home', 'Boho Decor Plant Hanger For Home Wall Decoration Macrame Wall Hanging Shelf', 41.00, 17.86, 4.08, 131, '643a74d5364d2.jpg', '[\"643a77865e203.jpg\", \"643a7788d69de.jpg\", \"643a778b5e72c.jpg\", \"643a778de17a6.jpg\", \"643a77906564d.jpg\", \"643a7792e8ac2.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:08:21'),
(27, 'home-decoration', 'Flying Wooden', 'Flying Wooden Bird', 'Package Include 6 Birds with Adhesive Tape Shape: 3D Shaped Wooden Birds Material: Wooden MDF, Laminated 3.5mm', 51.00, 15.58, 4.41, 17, '643a74d7c29dd.webp', '[\"643a779578a6e.jpg\", \"643a779785ba6.jpg\", \"643a779a0aa2c.jpg\", \"643a779c17d52.jpg\", \"643a779e1f190.webp\"]', '2023-04-15 03:55:14', '2023-04-15 04:08:32'),
(28, 'home-decoration', 'LED Lights', '3D Embellishment Art Lamp', '3D led lamp sticker Wall sticker 3d wall art light on/off button  cell operated (included)', 20.00, 16.49, 4.82, 54, '643a74d9cac53.jpg', '[\"643a77a031553.jpg\", \"643a77a2b35cc.jpg\", \"643a77a54f2c6.png\", \"643a77a7d7b3d.jpg\", \"643a77aa61055.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:08:44'),
(29, 'home-decoration', 'luxury palace', 'Handcraft Chinese style', 'Handcraft Chinese style art luxury palace hotel villa mansion home decor ceramic vase with brass fruit plate', 60.00, 15.34, 4.44, 7, '643a74dc50aeb.webp', '[\"643a77ace2671.jpg\", \"643a77af6a4f8.jpg\", \"643a77b1ee20d.webp\", \"643a77b47ea44.webp\", \"643a77b78947d.webp\"]', '2023-04-15 03:55:14', '2023-04-15 04:08:58'),
(30, 'home-decoration', 'Golden', 'Key Holder', 'Attractive DesignMetallic materialFour key hooksReliable & DurablePremium Quality', 30.00, 2.92, 4.92, 54, '643a74df56d06.jpg', '[\"643a77ba96db9.jpg\", \"643a77bd21a5c.jpg\", \"643a77c024b59.jpg\", \"643a77c230ea0.jpg\"]', '2023-04-15 03:55:14', '2023-04-15 04:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `delivery_charge` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `delivery_charge`, `name`, `email`, `phone`, `address`, `city_name`, `area`, `order_note`, `created_at`, `updated_at`) VALUES
(1, 1, 30, 'Yeasin', 'imranyeasin75@gmail.com', '12345678910', 'Road 11', 'Dhaka', 'Agargaon', NULL, NULL, NULL),
(2, 1, 30, 'Imran', 'imranimu0066@gmail.com', '12345678910', '11', 'Dhaka', 'Aftabnagar', NULL, NULL, NULL),
(3, 2, 30, 'Imran', 'imranimu0066@gmail.com', '12345678910', '11', 'Dhaka', 'Bosila', NULL, NULL, NULL),
(4, 3, 30, 'Imran', 'imranimu0066@gmail.com', '12345678910', 'Road 11', 'Dhaka', 'BSCIC, Narayanganj', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `verification_token`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imran', 'imranimu0066@gmail.com', '12345678910', '2023-04-15 09:19:03', NULL, '$2y$10$HcV5agugZMBAfur9y1BXceF93/0YEEOzMZw/M9UC3CRVLljwvp/9e', NULL, '2023-04-15 09:18:52', '2023-04-15 09:19:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_delivery_charge_foreign` (`delivery_charge`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_delivery_charge_foreign` FOREIGN KEY (`delivery_charge`) REFERENCES `areas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
