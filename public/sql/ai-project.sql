-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 08:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'home', NULL, 'any description', 1, NULL, 1, NULL),
(2, 'about', NULL, 'any description', 1, NULL, 1, NULL),
(3, 'football', 4, 'any description', 1, NULL, 1, NULL),
(4, 'sport', NULL, 'test', 1, NULL, 1, NULL),
(5, 'basketball', 4, 'dasdsa', 1, NULL, 1, NULL),
(6, 'mohammad mustafa', 1, 'mohammad', 0, '2017-11-03 18:52:40', 0, '2017-11-03 19:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `title`, `content`, `image`, `cat_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 1, 11, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` enum('list of categories','navbar','footer','aside','category') NOT NULL,
  `position` tinyint(4) DEFAULT '1',
  `name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `type`, `position`, `name`, `cat_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, NULL, 'navbar', 1, 'navbar', 0, '2017-10-19 21:05:52', 0, '2017-11-06 18:16:16', 0),
(2, 1, 'category', NULL, 'home', 1, '2017-10-19 21:05:52', 0, '2017-10-19 21:05:30', 0),
(3, 1, 'list of categories', NULL, 'about', 2, '2017-10-19 18:06:00', 0, '2017-10-21 19:05:08', 0),
(4, 1, 'list of categories', NULL, 'news', 0, '2017-10-20 17:09:43', 0, '2017-10-20 17:09:43', 0),
(5, 4, 'list of categories', NULL, 'sports', 4, '2017-10-20 20:25:58', 0, '2017-10-20 20:25:58', 0),
(6, 4, 'category', NULL, 'economic', 0, '2017-10-20 20:25:58', 0, '2017-10-20 20:25:58', 0),
(7, 5, 'category', NULL, 'football', 3, '2017-10-20 20:35:51', 0, '2017-10-20 20:35:51', 0),
(8, 5, 'category', NULL, 'basketball', 0, '2017-10-20 20:35:51', 0, '2017-10-20 20:35:51', 0),
(9, NULL, 'footer', 2, 'footer', 0, '2017-10-20 21:57:13', 0, '2017-10-20 21:57:13', 0),
(10, 9, 'category', 1, 'about', 0, '2017-10-20 21:57:58', 0, '2017-10-20 21:57:58', 0),
(11, 9, 'category', 1, 'sport', 0, '2017-10-20 21:57:58', 0, '2017-10-20 21:57:58', 0),
(12, 1, 'category', NULL, 'contact us', 0, '2017-10-20 21:55:39', 0, '2017-10-20 21:55:39', 0),
(13, 4, 'category', NULL, 'politics', 0, '2017-10-20 21:56:07', 0, '2017-10-20 21:56:07', 0),
(14, 1, 'category', NULL, 'events', 0, '2017-10-20 21:58:24', 0, '2017-10-20 21:58:24', 0),
(15, 5, 'category', NULL, 'tennis', 0, '2017-10-20 21:59:01', 0, '2017-10-20 21:59:01', 0),
(18, 5, 'category', NULL, 'tests', 0, '2017-10-21 19:02:50', 0, '2017-10-21 19:02:50', 0),
(21, 3, 'category', NULL, 'vision', 0, '2017-10-21 19:05:08', 0, '2017-10-21 19:05:08', 0),
(28, 11, 'category', 1, 'e', 0, '2017-11-03 20:52:18', 0, '2017-11-03 23:07:32', 0),
(30, 3, 'category', 1, 'mohammad', 0, '2017-11-03 20:57:18', 0, '2017-11-03 22:28:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_10_28_201522_create_categories_table', 2),
('2017_10_30_201900_create_item_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'mohammad mustafa', 'mohammad.e.mustafa@gmail.com', '$2y$10$AlsDUwyPiKyeQq8y6SGD5.gO1E1kjM9foDzO7vaq4fu6Voam8i7tm', 'NHT1OCYlmxouW3QokjB1tkcNjWzs1wtGMKQfFCtz6aaEc54B2Rdu1qLMXCc7', '2017-10-19 09:09:44', '2017-10-31 17:05:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;










