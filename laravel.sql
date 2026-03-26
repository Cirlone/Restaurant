-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'shipping',
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'US',
  `phone` varchar(255) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `type`, `street_address`, `city`, `state`, `postal_code`, `country`, `phone`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 13, 'shipping', 'Aleea Emil Botta bloc M107 sc2 ap 44', 'bucuresti', 'Dolj', '031073', 'UK', '0768821806', 1, '2026-02-10 08:10:07', '2026-02-10 08:10:07'),
(2, 13, 'billing', 'Aleea Emil Botta bloc M107 sc2 ap 44', 'bucuresti', 'Dolj', '031073', 'KG', '0768821806', 0, '2026-02-10 10:05:01', '2026-02-10 10:05:01'),
(3, 16, 'shipping', 'Aleea Emil Botta bloc M107 sc2 ap 44', 'bucuresti', 'Dolj', '031073', 'RO', '0768821806', 0, '2026-02-12 06:12:39', '2026-02-12 11:33:30'),
(4, 16, 'shipping', 'Aleea Emil Botta bloc M107 sc2 ap 44', 'bucuresti', 'addwa', '031073', 'RO', '0768821806', 1, '2026-02-12 07:49:58', '2026-02-12 11:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2025_11_04_122756_add_two_factor_columns_to_users_table', 2),
(8, '2025_11_05_082512_add_profile_photo_path_to_users_table', 2),
(9, '2025_11_20_094649_add_google_fields_to_users_table', 2),
(10, '2025_11_25_122901_add_facebook_id_to_users_table', 2),
(11, '2025_11_26_094340_create_newsletter_table', 2),
(12, '2025_12_02_082315_create_reservations_table', 3),
(13, '2025_12_18_081721_add_role_to_users_table', 4),
(14, '2026_02_10_100636_create_addresses_table', 5),
(15, '2026_02_12_083238_create_payment_methods_table', 6),
(16, '2026_02_12_095959_add_stripe_columns_to_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('cirlaandrei@gmail.com', '$2y$10$wwP3eMZQW60ly6KpaAmB0eZgV1O7qsf0AUsGkECcmeY7r/YgEMt7.', '2025-12-16 10:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_payment_method_id` varchar(255) NOT NULL,
  `card_brand` varchar(255) NOT NULL,
  `card_last_four` varchar(4) NOT NULL,
  `card_exp_month` varchar(2) NOT NULL,
  `card_exp_year` varchar(4) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'cirla', '6921cf71d07758ce9fd364570a021ea512a9b89f8f3efd08f3654f94b3512cec', '[\"read\",\"update\",\"delete\"]', NULL, NULL, '2025-12-16 06:07:54', '2025-12-16 06:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guests` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `date`, `time`, `guests`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1221', '2112', '2025-12-12', '10:34:00', 4, '2114', '2025-12-02 06:30:24', '2025-12-02 06:30:24'),
(2, 'ad', 'wdwa', '2025-12-03', '15:41:00', 2, '142', '2025-12-05 11:39:15', '2025-12-05 11:39:15'),
(3, 'da', '07668180', '2025-12-03', '14:33:00', 2, '121', '2025-12-09 10:30:26', '2025-12-09 10:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eg1Z6fh1bqfBk7ijvsFwmmEimlTswAN0xlYfX11f', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNmpydVFNQUVtWDlXcjBlUVdOUlV6TlRqSHMzc05jY0RXalV3QjV0YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e2k6MjthOjU6e3M6MjoiaWQiO2k6MjtzOjQ6Im5hbWUiO3M6MTU6IlBlcHBlcm9uaSBQaXp6YSI7czo1OiJwcmljZSI7aTo0MjtzOjg6InF1YW50aXR5IjtpOjE7czo1OiJpbWFnZSI7czoyMzoiaW1hZ2luaS9tZW51L3BpenphMi5zdmciO319fQ==', 1771316150),
('IEyPYHp25r1rdUgQ9qBvHJ9lzKAORTobITNQTCAo', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUHRvMnBiUGE5a0l4YXMyZWExTnF3Q1d4d2Z3d2dNTFpkZmQ0ZlhDVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51L2l0ZW0vMjAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6InN0YXRlIjtzOjQwOiJPZFV0dTdYVmlMaERBa2tlTThxUlJ5TmYwakxWWHRMZTdndDN4dVZJIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHY0dmJSR0Q4RFdMUlEyazNRQWxhRHV5T3dWS2FLNUpHUUxWMXVUWlZSS1AuZXNJZFVnaXc2IjtzOjQ6ImNhcnQiO2E6MDp7fX0=', 1770976226),
('pgYZCWZhfTwosjqNV67nKBWOeaWZBtz1JQyzcsfj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlpaNnNtSkd5RkxlSWZkbFdJbDVYd010VGxPbVprcW02ZU9LSUlJayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51L2l0ZW0vMjYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771242638);

-- --------------------------------------------------------

--
-- Table structure for table `tabela_newsletter_restaurant`
--

CREATE TABLE `tabela_newsletter_restaurant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT 'client',
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `facebook_id`, `name`, `email`, `profile_photo_path`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `role`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, NULL, NULL, 'awdaw', 'vrafcastor@yahoo.com', 'profile-photos/veFoHx6Uj0eQuxMhEbTtjbvRklw9epgtRXtgByMO.jpg', '2025-12-09 10:34:57', '$2y$10$2vJVFlP.ZPh4CBMGyeRm6ejV2WK1QY0QH0423hjbt32FE6giyaUy6', NULL, NULL, NULL, NULL, '2025-12-09 10:31:27', '2025-12-18 09:41:14', 'admin', NULL, NULL, NULL, NULL),
(2, '115412734592234912689', NULL, 'Andrei Basescu Traian', 'cirlaandrei@gmail.com', 'profile-photos/iY8422a8Up6hP3VmAdmpnnCYNCYa6OfNP7xkpykU.jpg', '2025-12-09 10:48:59', '$2y$10$v4vbRGD8DWLRQ2k3QAlaDuyOwVKaK5JGQLV1uTZVRKP.esIdUgiw6', NULL, NULL, NULL, NULL, '2025-12-09 10:48:20', '2026-01-05 06:45:35', 'admin', NULL, NULL, NULL, NULL),
(9, NULL, NULL, 'maduro', 'nike@venezuela.com', NULL, NULL, '$2y$10$9nezG3TtYC25P8ZR5i9Sd.Z7E22HtwYpsDIMUqgD02dLvq9bwJVae', NULL, NULL, NULL, NULL, '2026-01-12 07:40:25', '2026-01-19 10:52:13', 'bartender', NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'aa', 'cirladrei@gmail.com', NULL, NULL, '$2y$10$y7w3HgLTz/4ITrIWAWnIlek/W58zqFyZaVjGqtdrKLj.h1B3L5VgS', NULL, NULL, NULL, NULL, '2026-01-19 06:36:12', '2026-01-19 06:36:12', 'cook', NULL, NULL, NULL, NULL),
(11, NULL, NULL, 'gordonramsay', 'gordonramsay@gmail.com', NULL, '2026-01-19 10:44:45', '$2y$10$ep/aXKFoEzg27kxn795ZKOKSfIoOfANw5vB4JR8AHCTR7OQgiVheS', NULL, NULL, NULL, NULL, '2026-01-19 10:43:04', '2026-01-19 10:44:45', 'chef', NULL, NULL, NULL, NULL),
(12, NULL, NULL, 'manager', 'manager@gmail.com', NULL, '2026-01-19 10:51:46', '$2y$10$aV3FOq5qmZUlkfeKzcYQ9.TF9A3rYkHJrJNgFSLUI48i/3nyLz1DK', NULL, NULL, NULL, NULL, '2026-01-19 10:51:09', '2026-01-19 10:51:46', 'manager', NULL, NULL, NULL, NULL),
(13, NULL, NULL, 'clientul', 'cirlaandrddwaei@gmail.com', NULL, '2026-02-10 07:14:34', '$2y$10$3j7Pg/DL4sZrijppEkj8ee/Jtcr/zHnSdumP6QMctAemQvVhvPC5W', NULL, NULL, NULL, NULL, '2026-02-10 07:13:40', '2026-02-10 07:14:34', 'client', NULL, NULL, NULL, NULL),
(14, NULL, NULL, 'client', 'client@gmail.com', NULL, '2026-02-10 11:49:32', '$2y$10$6/U2gRJdhC8.9Ro5Xoh4pO6N2RjCdPCdkKidw/zJrK0bj3SEKDtPC', NULL, NULL, NULL, NULL, '2026-02-10 11:49:02', '2026-02-10 11:49:32', 'client', NULL, NULL, NULL, NULL),
(15, NULL, NULL, 'name', 'dwawda@gmail.com', NULL, '2026-02-10 11:53:53', '$2y$10$0yqIU82K8GShsbor3QYj5OpRLIO4yuRlbRA3fQN9nvPUgyv/Zo4ai', NULL, NULL, NULL, NULL, '2026-02-10 11:53:35', '2026-02-10 11:53:53', 'client', NULL, NULL, NULL, NULL),
(16, NULL, NULL, 'dwadwa', '32132132@gmail.com', NULL, '2026-02-10 11:57:38', '$2y$10$kFmxg.Cp7tId2.B36w1jJusj.2DXonivHrwFDmJK/LGQJ.FFSle52', NULL, NULL, NULL, NULL, '2026-02-10 11:57:30', '2026-02-12 08:37:56', 'client', 'cus_Txt30rASpnvEqM', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_methods_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tabela_newsletter_restaurant`
--
ALTER TABLE `tabela_newsletter_restaurant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tabela_newsletter_restaurant_mail_unique` (`mail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabela_newsletter_restaurant`
--
ALTER TABLE `tabela_newsletter_restaurant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
