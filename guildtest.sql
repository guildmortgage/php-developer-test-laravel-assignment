-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 09:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guildtest`
--
CREATE DATABASE IF NOT EXISTS `guildtest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `guildtest`;

-- --------------------------------------------------------

--
-- Table structure for table `bank_acs`
--

DROP TABLE IF EXISTS `bank_acs`;
CREATE TABLE `bank_acs` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc_owner_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_no` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_acs`
--

INSERT INTO `bank_acs` (`id`, `acc_owner_id`, `acc_no`, `created_at`, `updated_at`) VALUES
(1, '1234561669641323', 1234567890, '2022-11-28 07:45:23', NULL),
(3, '1234561669641424', 4567890, '2022-11-28 07:47:04', NULL),
(4, '1234561669649823', 555444333222, '2022-11-28 10:07:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

DROP TABLE IF EXISTS `borrowers`;
CREATE TABLE `borrowers` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_employed` tinyint(1) DEFAULT 0,
  `has_bank` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `b_name`, `is_employed`, `has_bank`, `created_at`, `updated_at`) VALUES
('1234561669641323', 'Supriya Karmakar', 1, 1, '2022-11-28 07:45:23', NULL),
('1234561669641424', 'William Henry', 0, 1, '2022-11-28 07:47:04', NULL),
('1234561669649823', 'Tom Hanks', 1, 1, '2022-11-28 10:07:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deleteditems`
--

DROP TABLE IF EXISTS `deleteditems`;
CREATE TABLE `deleteditems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleteditem_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deleteditems`
--

INSERT INTO `deleteditems` (`id`, `deleteditem_id`, `created_at`, `updated_at`) VALUES
(1, '1234561669641359', '2022-11-28 07:48:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Table structure for table `job_details`
--

DROP TABLE IF EXISTS `job_details`;
CREATE TABLE `job_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_holder_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_income` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`id`, `job_holder_id`, `annual_income`, `created_at`, `updated_at`) VALUES
(1, '1234561669641323', 555666, '2022-11-28 07:45:23', NULL),
(3, '1234561669641424', 0, '2022-11-28 07:47:04', NULL),
(4, '1234561669649823', 4567890, '2022-11-28 10:07:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_appls`
--

DROP TABLE IF EXISTS `loan_appls`;
CREATE TABLE `loan_appls` (
  `id` int(10) UNSIGNED NOT NULL,
  `loan_appl_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_appls`
--

INSERT INTO `loan_appls` (`id`, `loan_appl_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '666555444', '1234561669641323', '2022-11-28 07:45:23', NULL),
(3, '888777444', '1234561669641424', '2022-11-28 07:47:04', NULL),
(4, '777888999', '1234561669649823', '2022-11-28 10:07:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
(5, '2022_11_19_000000_create_loan_appls_table', 1),
(6, '2022_11_20_000000_create_bank_acs_table', 1),
(7, '2022_11_20_000000_create_borrowers_table', 1),
(8, '2022_11_20_000000_create_job_details_table', 1),
(9, '2022_11_28_125256_create_deleteditems_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_acs`
--
ALTER TABLE `bank_acs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleteditems`
--
ALTER TABLE `deleteditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_appls`
--
ALTER TABLE `loan_appls`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `bank_acs`
--
ALTER TABLE `bank_acs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deleteditems`
--
ALTER TABLE `deleteditems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_appls`
--
ALTER TABLE `loan_appls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
