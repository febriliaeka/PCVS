-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare_centre`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `address`, `phone_number`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Merta Yoga', 'Ahmad Yani Street, Anugrah VII Number 17', '087855117273', 'admin', '$2y$10$qUomVEdKI1BF8l75rWUs1uuBsohxJQHa2WLJjM43WEIUNwxqKlDWC', '2021-11-29 18:10:53', '2021-12-06 17:45:10'),
(2, 'Merta Yoga 2', 'Ahmad Yani Street, Anugrah VII Number 17 2', '0878551172732', 'admin2', '$2y$10$ofi5mq9a.99DXsHUlEHh.erFUp2hJU.XPGktBE/IIuU2guxZFYcP6', '2021-12-02 16:59:20', '2021-12-02 16:59:20'),
(3, 'Merta Yoga 23', 'Ahmad Yani Street, Anugrah VII Number 17 23', '08785511727323', 'admin23', '$2y$10$lHqCaS.PjTXNAEjKIUUm6.3C4FnKBMLgORczjjnVLGXjXXDLfA6Ai', '2021-12-02 17:01:25', '2021-12-02 17:01:25');

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
-- Table structure for table `healthcare_centres`
--

CREATE TABLE `healthcare_centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `healthcare_centres`
--

INSERT INTO `healthcare_centres` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Centre 11', 'Address 11', '2021-11-29 19:02:24', '2021-11-29 19:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `healthcare_staff`
--

CREATE TABLE `healthcare_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `healthcare_centre_id` int(11) NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `healthcare_staff`
--

INSERT INTO `healthcare_staff` (`id`, `healthcare_centre_id`, `staff_id`, `name`, `address`, `phone_number`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, '123', 'staff 1', 'address', '85616512322', 'staff@gmail.com', 'staff', '$2y$10$P23dfP0EbLvGbdrwl4R98e9jnXjes/WPBOHqu4KxEbsnqC4qls.k.', '2021-12-02 16:02:21', '2021-12-02 16:02:21'),
(2, 1, '1234', 'staff2', 'efasawefd', '85416834', 'staff2@gmail.com', 'staff2', '$2y$10$c5PQp3mSNaJNhiZIAZQhT.5cuFYsV7ZhQ0N1PlnYjtlzch8deWHcC', '2021-12-02 17:06:32', '2021-12-02 17:06:32');

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
(4, '2021_07_03_064422_create_admins_table', 1),
(5, '2021_11_30_021957_create_vaccines_table', 2),
(6, '2021_11_30_022215_create_healthcare_centres_table', 2),
(7, '2021_11_30_063827_create_healthcare_staff_table', 3),
(8, '2021_12_02_020420_create_vaccine_batches_table', 3),
(9, '2021_12_03_030401_create_patients_table', 4),
(10, '2021_12_04_050117_create_vaccine_patients_table', 5);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ic_passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `ic_passport`, `name`, `address`, `phone_number`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(3, '123456', 'Merta Yoga', 'Ahmad Yani Street, Anugrah VII Number 17', '087855117273', 'mertayoga17.my@gmail.com', 'patient', '$2y$10$Xp5xlmxMKkUQbhigirzAcuKKVlK4q.yvBvAuvw4LYP4VICuZ9w1SO', '2021-12-02 22:12:50', '2021-12-02 22:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `manufacturer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vaccine 11', 'Manufacturer 11', 'inactive', '2021-11-29 18:51:07', '2021-11-29 18:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_batches`
--

CREATE TABLE `vaccine_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `healthcare_centre_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `qty_available` int(11) NOT NULL,
  `qty_administered` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccine_batches`
--

INSERT INTO `vaccine_batches` (`id`, `vaccine_id`, `healthcare_centre_id`, `code`, `start_date`, `end_date`, `qty_available`, `qty_administered`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kxx1', '2021-12-03', '2021-12-10', 2, 2, '2021-12-02 16:02:41', '2021-12-06 17:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_patients`
--

CREATE TABLE `vaccine_patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vaccine_batch_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `vaccine_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccine_patients`
--

INSERT INTO `vaccine_patients` (`id`, `vaccine_batch_id`, `patient_id`, `vaccine_date`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2021-12-07', 'confirmed', '-', '2021-12-05 20:01:52', '2021-12-06 17:09:14'),
(2, 1, 3, '2021-12-09', 'confirmed', '-', '2021-12-05 23:18:26', '2021-12-06 17:05:11'),
(3, 1, 3, '2021-12-08', 'pending', '-', '2021-12-06 17:17:33', '2021-12-06 17:17:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_name_unique` (`name`),
  ADD UNIQUE KEY `admins_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `healthcare_centres`
--
ALTER TABLE `healthcare_centres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthcare_staff`
--
ALTER TABLE `healthcare_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `healthcare_staff_staff_id_unique` (`staff_id`),
  ADD UNIQUE KEY `healthcare_staff_name_unique` (`name`),
  ADD UNIQUE KEY `healthcare_staff_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `healthcare_staff_email_unique` (`email`),
  ADD UNIQUE KEY `healthcare_staff_username_unique` (`username`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_ic_passport_unique` (`ic_passport`),
  ADD UNIQUE KEY `patients_name_unique` (`name`),
  ADD UNIQUE KEY `patients_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `patients_email_unique` (`email`),
  ADD UNIQUE KEY `patients_username_unique` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine_batches`
--
ALTER TABLE `vaccine_batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vaccine_batches_code_unique` (`code`);

--
-- Indexes for table `vaccine_patients`
--
ALTER TABLE `vaccine_patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `healthcare_centres`
--
ALTER TABLE `healthcare_centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `healthcare_staff`
--
ALTER TABLE `healthcare_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccine_batches`
--
ALTER TABLE `vaccine_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccine_patients`
--
ALTER TABLE `vaccine_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
