-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 06:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print_vibe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', '', '', '', 1, NULL, NULL),
(2, 'Stickers', '', '', '', 1, NULL, NULL),
(3, 'Phone Cases', '', '', '', 1, NULL, NULL),
(4, 'Wall Arts', '', '', '', 1, NULL, NULL),
(5, 'Gifts', '', '', '', 1, NULL, NULL),
(6, 'Pets', '', '', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_likes` int(11) NOT NULL,
  `total_visit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_mature_content` int(11) NOT NULL DEFAULT 0 COMMENT '1=mature content',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `title`, `image`, `description`, `tags`, `user_id`, `total_likes`, `total_visit`, `status`, `is_mature_content`, `created_at`, `updated_at`) VALUES
(1, 'Test Title', 'test.png', 'This is test description', 'tag1, tag2', 2, 0, 0, 1, 0, '2023-07-17 06:51:56', '2023-07-21 11:40:21'),
(3, 'New Design', '1689678771.image.jpg', 'This is test description', 'tag1, tag2', 2, 0, 0, 1, 0, '2023-07-18 11:12:51', '2023-07-18 11:12:57'),
(4, 'New Design 2', '1689679320.demo.png', 'This is test description', 'tag1, tag2, tag3', 2, 0, 0, 1, 0, '2023-07-18 11:22:00', '2023-07-21 11:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `design_categories`
--

CREATE TABLE `design_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `followed_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `followed_by`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2023-07-17 06:54:15', '2023-07-17 06:54:15'),
(2, 2, 6, '2023-07-17 06:54:15', '2023-07-17 06:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `job_assignments`
--

CREATE TABLE `job_assignments` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(254) NOT NULL,
  `order_id` varchar(254) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `tax_amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=new, 2=assigned, 3=in progress, 4=completed, 5= cancelled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_assignments`
--

INSERT INTO `job_assignments` (`id`, `unique_id`, `order_id`, `vendor_id`, `amount`, `tax_amount`, `total_amount`, `status`, `created_at`, `deleted_at`) VALUES
(1, 'PV-000001', 'JOB-000001', 1, 300, 54, 354, 4, '2023-11-04 04:06:21', NULL),
(2, 'PV-000002', 'JOB-000002', 1, 200, 36, 236, 4, '2023-11-04 04:06:21', NULL),
(3, 'PV-000003', 'JOB-000003', 1, 300, 54, 354, 3, '2023-11-04 04:06:21', NULL),
(4, 'PV-000004', 'JOB-000004', 1, 200, 36, 236, 3, '2023-11-04 04:06:21', NULL),
(5, 'PV-000005', 'JOB-000005', 1, 300, 54, 354, 2, '2023-11-04 04:06:21', NULL),
(6, 'PV-000006', 'JOB-000006', 1, 200, 36, 236, 2, '2023-11-04 04:06:21', NULL),
(7, 'PV-000007', 'JOB-000007', 1, 300, 54, 354, 2, '2023-11-04 04:06:21', NULL),
(8, 'PV-000008', 'JOB-000008', 1, 200, 36, 236, 2, '2023-11-04 04:06:21', NULL),
(9, 'PV-000009', 'JOB-000009', 1, 300, 54, 354, 2, '2023-11-04 04:06:21', NULL),
(10, 'PV-000010', 'JOB-000010', 1, 200, 36, 236, 2, '2023-11-04 04:06:21', NULL);

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
(1, '2019_07_14_133537_create_admins_table', 1),
(2, '2023_07_16_092136_create_users_table', 2),
(3, '2023_07_16_101358_create_categories_table', 3),
(4, '2023_07_17_093030_create_designs_table', 4),
(5, '2023_07_17_093651_create_design_categories_table', 5),
(6, '2023_07_17_121627_create_visitors_table', 6),
(7, '2023_07_17_122255_create_followers_table', 7),
(8, '2023_07_17_122815_create_orders_table', 8),
(9, '2023_07_17_123724_create_user_transactions_table', 9),
(10, '2023_07_18_172653_create_notifications_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `notification`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test Notification 1', 'This is test notification', '2023-07-18 11:57:54', '2023-07-18 11:57:54'),
(2, 2, 'Test Notification 2', 'This is test notification', '2023-07-18 11:57:54', '2023-07-18 11:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounted_amount` double NOT NULL,
  `delivery_charge` double NOT NULL,
  `packing_price` double NOT NULL,
  `tax_amount` double NOT NULL,
  `total_amount` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=new,2=accepted,3=delivered,4=cancelled',
  `cancellation_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0 COMMENT '1=paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `unique_id`, `user_id`, `name`, `email`, `mobile`, `address`, `country`, `state`, `city`, `location`, `pin`, `amount`, `coupon_code`, `discounted_amount`, `delivery_charge`, `packing_price`, `tax_amount`, `total_amount`, `status`, `cancellation_reason`, `transaction_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'PV-000001', 3, 'Test Customer1', 'customer1@testmail.com', '9000000001', 'Test address', 'India', 'West Bengal', 'Kolkata', 'Test Location', '700001', 500, '', 0, 0, 0, 90, 590, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(2, 'PV-000002', 4, 'Test Customer2', 'customer2@testmail.com', '9000000002', 'Test address2', 'India', 'West Bengal', 'Kolkata', 'Test Location2', '700001', 400, '', 0, 0, 0, 72, 472, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(3, 'PV-000003', 3, 'Test Customer1', 'customer1@testmail.com', '9000000001', 'Test address', 'India', 'West Bengal', 'Kolkata', 'Test Location', '700001', 500, '', 0, 0, 0, 90, 590, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(4, 'PV-000004', 4, 'Test Customer2', 'customer2@testmail.com', '9000000002', 'Test address2', 'India', 'West Bengal', 'Kolkata', 'Test Location2', '700001', 400, '', 0, 0, 0, 72, 472, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(5, 'PV-000005', 3, 'Test Customer1', 'customer1@testmail.com', '9000000001', 'Test address', 'India', 'West Bengal', 'Kolkata', 'Test Location', '700001', 500, '', 0, 0, 0, 90, 590, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(6, 'PV-000006', 4, 'Test Customer2', 'customer2@testmail.com', '9000000002', 'Test address2', 'India', 'West Bengal', 'Kolkata', 'Test Location2', '700001', 400, '', 0, 0, 0, 72, 472, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(7, 'PV-000007', 3, 'Test Customer1', 'customer1@testmail.com', '9000000001', 'Test address', 'India', 'West Bengal', 'Kolkata', 'Test Location', '700001', 500, '', 0, 0, 0, 90, 590, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(8, 'PV-000008', 4, 'Test Customer2', 'customer2@testmail.com', '9000000002', 'Test address2', 'India', 'West Bengal', 'Kolkata', 'Test Location2', '700001', 400, '', 0, 0, 0, 72, 472, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(9, 'PV-000009', 3, 'Test Customer1', 'customer1@testmail.com', '9000000001', 'Test address', 'India', 'West Bengal', 'Kolkata', 'Test Location', '700001', 500, '', 0, 0, 0, 90, 590, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15'),
(10, 'PV-000010', 4, 'Test Customer2', 'customer2@testmail.com', '9000000002', 'Test address2', 'India', 'West Bengal', 'Kolkata', 'Test Location2', '700001', 400, '', 0, 0, 0, 72, 472, 1, '', 'test-pay-0001', 0, '2023-07-17 07:04:15', '2023-07-17 07:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `image` varchar(254) NOT NULL,
  `price` double NOT NULL,
  `offer_price` double NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1=customer,2=vendor,3=artist',
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `otp`, `password`, `country`, `city`, `type`, `status`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Vendor', '9898989898', 'vendor@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 2, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(2, 'Test Artist', '9797979797', 'artist@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 3, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(3, 'Test Customer1', '9000000001', 'customer1@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 1, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(4, 'Test Customer2', '9000000002', 'customer2@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 1, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(5, 'Test Customer3', '9000000003', 'customer3@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 1, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(6, 'Test Customer4', '9000000004', 'customer4@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 1, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(7, 'Test Customer5', '9000000005', 'customer5@testmail.com', 123456, '$2y$10$pQxV/x/zh1cn4CfNoE.tmeDqQi7rsijLPf4iFtqlSXVAGmMUjNi3a', 'India', 'Kolkta', 1, 1, 0, NULL, '2023-07-16 04:03:17', '2023-07-16 04:03:17'),
(12, 'Soham Ghosh', '8335852184', 'soham@onenesstechs.in', 1234, '$2y$10$8Jl/CPhk2QAQ6BnCq03sHez2yV9rwfyNFzGsIaS/D3tK7z/lopkCS', '', '', 3, 1, 0, NULL, '2023-07-18 10:44:34', '2023-07-18 10:44:34'),
(13, 'Soham Ghosh', '+918335852184', 'soham@onenesstechs.in', 1234, '$2y$10$d3gE8SPKk3wkREPm8wSUzO4eevIh8TiSt2puxTocv.HN2WxFEA7uW', '', '', 3, 1, 0, NULL, '2023-08-14 12:27:39', '2023-08-14 12:27:39'),
(14, 'Soham Ghosh', '+918335852184', 'gsoham.51@gmail.com', 1234, '$2y$10$auD31PpL8KtlXrd7XGeqXexHhlMNFKMaUEZDhD1NQrw.bbYkSTyxK', '', '', 3, 1, 0, NULL, '2023-08-14 12:36:54', '2023-08-14 12:36:54'),
(15, 'Soham Ghosh', '+918335852184', 'gsoham.51@gmail.com', 1234, '$2y$10$ABDZ.dEbIHe1u0SCo1yMM.F/RD/R/BJC3U.0lj53MpJDpLYnY7xCy', '', '', 3, 1, 0, NULL, '2023-08-20 03:57:02', '2023-08-20 03:57:02'),
(16, 'Soham Ghosh', '+918335852184', 'gsoham.51@gmail.com', 1234, '$2y$10$Xqhn7B9D18I6sLhZ4zQK.O22ZyxlrS8jsL9Ri9kLz/.qy6HCar/8S', '', '', 3, 1, 0, NULL, '2023-08-20 04:06:37', '2023-08-20 04:06:37'),
(17, 'Soham', '9898989898', 'soham@onenesstechs.in', 1234, '$2y$10$Hbq.CYPVVsvxqR8l..BwVOsgOMF9BFzXogfY5KhF.toJcItQUz1Bq', '', '', 3, 1, 0, NULL, '2023-08-20 04:08:14', '2023-08-20 04:08:14'),
(18, 'Soham', '76767676767', 'info.onenesstechs@gmail.com', 1234, '$2y$10$hFDWXiG2PY.egxhjcg6VY.ISaid7shrAQYKH1RB5SVpGftrbQ7SyG', '', '', 3, 1, 0, NULL, '2023-08-20 04:09:11', '2023-08-20 04:09:11'),
(19, 'Soham', '76767676767', 'soham@onenesstechs.in', 1234, '$2y$10$oUMiKXkBinjIiG9sFAYepeI9NDnKobF641ZG/WTm5MftXkP1nlmfO', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:12', '2023-08-20 04:13:12'),
(20, 'Soham', '76767676767', 'soham@onenesstechs.in', 1234, '$2y$10$riniX.LKKPMvjxnXV2rfpOxK9JgzsqL6QgvEj7g7ov2m0mpchoKXG', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:14', '2023-08-20 04:13:14'),
(21, 'Soham', '76767676767', 'soham@onenesstechs.in', 1234, '$2y$10$wgvT9BUoDz8RP7cPM6V2buyGEXQ46TvurHFDUSvdZqZmGxomW3mnS', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:15', '2023-08-20 04:13:15'),
(22, 'Soham', '76767676767', 'soham@onenesstechs.in', 1234, '$2y$10$mQZ1ZMuyfk447GCxvmgz4OPf784nzXp5hxFoO7nr3hrwPZRbqQHey', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:18', '2023-08-20 04:13:18'),
(23, 'Soham', '7676767676', 'soham@onenesstechs.in', 1234, '$2y$10$kjAZU4Gfc3C7clFPrUvWp.5rIuGsdZ78PPGPXeXdx4.6h/284iAMK', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:21', '2023-08-20 04:13:21'),
(24, 'Soham', '7676767676', 'soham@onenesstechs.in', 1234, '$2y$10$HBuV/ViNSBkC0X3aNQ0wmewZugXm3TzHGK4.yxjlm4FHRg5Y1eNea', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:24', '2023-08-20 04:13:24'),
(25, 'Soham Ghosh', '8335852184', 'gsoham.51@gmail.com', 1234, '$2y$10$vSXKM4HF23mpx4sgRtP4TORfH19k1qHp2cHoVKYxEWwK0Ca4YagAa', '', '', 3, 1, 0, NULL, '2023-08-20 04:13:47', '2023-08-20 04:13:47'),
(26, 'Soham Ghosh', '+918335852184', 'gsoham.51@gmail.com', 1234, '$2y$10$FXziXL84dFU5eqdWh3OLkOBqWD1xfnHH3LtCOmzyXAnZBy1.Psqna', '', '', 3, 1, 0, NULL, '2023-08-20 10:02:03', '2023-08-20 10:02:03'),
(27, 'Soham Ghosh', '+918335852184', 'gsoham.51@gmail.com', 1234, '$2y$10$aoTVLHTD3R6esdX8mwjiTO3yETiFocjpPyLcKoVunFEYvXCe.ZEaq', '', '', 3, 1, 0, NULL, '2023-08-20 10:02:50', '2023-08-20 10:02:50'),
(28, 'Soham Ghosh', '+918335852184', 'info.onenesstechs@gmail.com', 1234, '$2y$10$b740TmCxFMiOYoJGPK7eQemoipCnNM7NWC5djWJ2/EZW8QhGIU7nO', '', '', 3, 1, 0, NULL, '2023-08-20 10:03:32', '2023-08-20 10:03:32'),
(29, 'Prabir Das', '+919547960202', 'pbrdas82@gmail.com', 1234, '$2y$10$hKqOeHdY2lzC4Ap7HjpcBOCMuZrSHUBW5rfDXxXxmKbD2XCz6EQ8G', '', '', 3, 1, 0, NULL, '2023-08-20 10:04:33', '2023-08-20 10:04:33'),
(30, 'Soham Ghosh', '+918335852184', 'vp.bniwarriorz@gmail.com', 1234, '$2y$10$hdk3OmCSjxiNMQcUqgCCYe880J6pLsPeiFBrzppDMXX6SElW2OH0i', '', '', 3, 1, 0, NULL, '2023-08-20 10:11:34', '2023-08-20 10:11:34'),
(31, 'Soham Ghosh', '7676767676', 'gsoham.51@gmail.com', 1234, '$2y$10$DaqTwnBynWRCU.LmaLNy7uQH/sr.CnM8t0SIXJ45nQUWQErUHuRVq', '', '', 3, 1, 0, NULL, '2023-11-03 12:25:00', '2023-11-03 12:25:00'),
(32, 'Soham Ghosh', '7676767676', 'gsoham.51@gmail.com', 1234, '$2y$10$g9VvfQCh1Y0AcFRWpIQ6o.FtlQcEVOounGYZu3Y9ekl8L9S257Enq', '', '', 3, 1, 0, NULL, '2023-11-03 12:25:49', '2023-11-03 12:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE `user_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_amount` double NOT NULL,
  `commission_amount` double NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=credit,2=deduct',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`id`, `order_id`, `user_id`, `order_amount`, `commission_amount`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 500, 350, 2, 'Commission for order id : PV-000001', '2023-07-17 07:11:58', '2023-07-17 07:11:58'),
(2, 2, 2, 400, 280, 2, 'Commission for order id : PV-000002', '2023-07-17 07:11:58', '2023-07-17 07:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `artist_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, 2, '127.0.0.1', '2023-07-17 06:51:18', '2023-07-17 06:51:18'),
(2, 2, '127.0.0.1', '2023-07-17 06:51:18', '2023-07-17 06:51:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_categories`
--
ALTER TABLE `design_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_assignments`
--
ALTER TABLE `job_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `design_categories`
--
ALTER TABLE `design_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_assignments`
--
ALTER TABLE `job_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_transactions`
--
ALTER TABLE `user_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
