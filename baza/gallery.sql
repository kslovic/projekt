-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 01:14 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pid` int(11) NOT NULL,
  `date_of_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_name` varchar(40) CHARACTER SET utf16 COLLATE utf16_croatian_ci NOT NULL,
  `p_dir` varchar(100) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `type` enum('public','private') NOT NULL DEFAULT 'public',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pid`, `date_of_pub`, `p_name`, `p_dir`, `description`, `type`, `uid`) VALUES
(53, '2016-11-26 14:09:52', 'gnaric selfi', 'gnaric selfi.jpg', 'hehehehehehe', 'private', 1),
(56, '2016-11-26 19:44:13', 'gnaric', 'gnaric.jpg', 'lolololo', 'private', 1),
(58, '2016-11-26 20:49:49', 'mega gnar', 'mega gnar.jpg', 'lelelelelle', 'private', 2),
(65, '2016-11-27 02:16:23', 'gnarnananna', 'gnarnananna.jpg', 'lallalalaretregeaefreg bgfb', 'private', 1),
(68, '2016-11-27 23:18:59', 'nananan slika', 'nananan slika.jpg', 'lalallallalalall allalla lalala lalalala laal', 'public', 2),
(69, '2016-11-27 23:53:37', 'jahskjadh', 'jahskjadh.jpg', 'jdaslkd ndlksandlk dlskdjl djaslkdaj', 'public', 1),
(70, '2016-11-27 23:55:43', 'slika slika', 'slika slika.jpg', 'lalalalalal nanann na', 'public', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kslovic94', 'kslovic@etfos.hr', '$2y$10$nmmxq4tXnRdS8NM6hGLth.ZLMPNUztGINAeoHFaGNZiPhVzCQYIeS', '65y0aZDoZoujmfRqcQD1NyOlwN5K5GXPtU5QzI4qR3G3YEfWG4a3YHMGIJuM', '2016-11-20 17:18:17', '2016-11-27 22:02:42'),
(2, 'Ivan94', 'ibartolin@etfos.hr', '$2y$10$DKgLeUyVWe0BepCoR1.KaezamzbtMM88XszEIG.zXa0VMlnJhjthC', 'LXyupCkhrR8zaytra8JOSCiSOhEVgjMnhr0r26ZhO5NhjzIpv3PRqtrvmLPj', '2016-11-26 18:34:01', '2016-11-27 22:49:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pid`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
