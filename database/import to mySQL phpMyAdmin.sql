-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 12:50 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `template_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`, `template_id`) VALUES
(64, '', NULL, '', 0, '2017-12-27 09:30:16', 0, '2017-12-27 09:30:16', 1),
(65, '', 64, '', 0, '2017-12-27 09:36:10', 0, '2017-12-27 09:36:10', 1),
(66, '', 65, '', 0, '2017-12-27 09:50:17', 0, '2017-12-27 09:50:17', 2),
(67, '', 65, '', 0, '2017-12-27 10:03:20', 0, '2017-12-27 10:03:20', 1),
(68, '', 64, '', 0, '2017-12-27 10:15:25', 0, '2017-12-27 10:15:25', 2),
(70, '', NULL, '', 0, '2017-12-28 10:21:33', 0, '2017-12-28 10:21:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_languages`
--

CREATE TABLE `categories_languages` (
  `id` int(11) NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_languages`
--

INSERT INTO `categories_languages` (`id`, `categorie_id`, `language_id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `description`) VALUES
(197, 64, 1, 'news', '2017-12-27 13:30:16', 0, '2017-12-27 13:30:16', 0, 'all around the world'),
(198, 64, 2, 'الأخبار', '2017-12-27 13:30:16', 0, '2017-12-27 13:30:16', 0, 'أخبار من جميع انحاء العالم'),
(199, 65, 1, 'soprts', '2017-12-27 13:36:10', 0, '2017-12-27 13:36:10', 0, 'all kinds of sports and all champions'),
(200, 65, 2, 'رياضة', '2017-12-27 13:36:10', 0, '2017-12-27 13:36:10', 0, 'أخر اخبار الرياضة و البطولات في العالم'),
(201, 66, 1, 'football', '2017-12-27 13:50:17', 0, '2017-12-27 13:50:17', 0, 'all football matchs all around the world'),
(202, 66, 2, 'كرة قدم', '2017-12-27 13:50:17', 0, '2017-12-27 13:50:17', 0, 'أخبار كرة القدم جميع انحاء العالم'),
(203, 67, 1, 'basket ball', '2017-12-27 14:03:20', 0, '2017-12-27 14:03:20', 0, 'basket ball of syrian and american legu'),
(204, 67, 2, 'كرة السلة', '2017-12-27 14:03:20', 0, '2017-12-27 14:03:20', 0, 'اخبار الدوري السوري و الأمريكي'),
(205, 68, 1, 'economics', '2017-12-27 14:15:25', 0, '2017-12-27 14:15:25', 0, 'all global markets and methods'),
(206, 68, 2, 'اقتصادية', '2017-12-27 14:15:25', 0, '2017-12-27 14:15:25', 0, 'اخبار الامال '),
(209, 70, 1, 'form', '2017-12-28 14:21:33', 0, '2017-12-28 14:21:33', 0, 'form'),
(210, 70, 2, 'form', '2017-12-28 14:21:33', 0, '2017-12-28 14:21:33', 0, 'form');

-- --------------------------------------------------------

--
-- Table structure for table `categories_metas`
--

CREATE TABLE `categories_metas` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8,
  `keywords` mediumtext CHARACTER SET utf8,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories_metas`
--

INSERT INTO `categories_metas` (`id`, `cat_id`, `language_id`, `title`, `content`, `keywords`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(14, 64, 1, 'SANA-news', 'syrian news agancy tell stories from all around the world', 'SANA,hot,news,syria,global,truth', '2017-12-27 13:30:16', 0, '2017-12-27 13:30:16', 0),
(15, 64, 2, 'وكالة سانا للأنباء', 'الوكالة العربية السورية للأنباء', 'عاجل,حقيقة,مراسل,سوريا,مصداقية,حقيقة', '2017-12-27 13:30:16', 0, '2017-12-27 13:30:16', 0),
(16, 65, 1, 'hot-sports', 'top-sports', 'chanpions,wins,legu,players', '2017-12-27 13:36:10', 0, '2017-12-27 13:36:10', 0),
(17, 65, 2, 'أخبار الرياضة', 'أخر الأخبار الرياضية في العالم', 'بطولات,اندية,لاعبين,مباريات', '2017-12-27 13:36:10', 0, '2017-12-27 13:36:10', 0),
(18, 66, 1, 'hot-football news', 'football news', 'europ,legu,classico,FCB,real madrid,ronaldo', '2017-12-27 13:50:17', 0, '2017-12-27 13:50:17', 0),
(19, 66, 2, 'أخبار كرة القدم', 'أخبار كرة القدم جميع انحاء العالم', 'الدوري,السوري,الأوروبي,أبطال,برشلونة,ريال مدريد,بنزيما', '2017-12-27 13:50:17', 0, '2017-12-27 13:50:17', 0),
(20, 67, 1, 'basketball news', 'basket ball of syrian and american legu', 'NBA', '2017-12-27 14:03:21', 0, '2017-12-27 14:03:21', 0),
(21, 67, 2, 'أخبار كرة السلة', 'اخبار الدوري السوري و الأمريكي', 'الدوري,الوطني', '2017-12-27 14:03:21', 0, '2017-12-27 14:03:21', 0),
(22, 68, 1, 'economic news', 'all global markets and methods', 'stocks,mony,dowjons,nekai,', '2017-12-27 14:15:25', 0, '2017-12-27 14:15:25', 0),
(23, 68, 2, 'الأخبار الاقتصادية', 'اخبار الامال ', 'بورصة,مال,اعمال,داوجونز,نيكاي', '2017-12-27 14:15:25', 0, '2017-12-27 14:15:25', 0),
(26, 70, 1, 'form', 'form', 'form', '2017-12-28 14:21:33', 0, '2017-12-28 14:21:33', 0),
(27, 70, 2, 'form', 'form', 'form', '2017-12-28 14:21:33', 0, '2017-12-28 14:21:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customs_languages`
--

CREATE TABLE `customs_languages` (
  `id` int(11) NOT NULL,
  `custom_field_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customs_languages`
--

INSERT INTO `customs_languages` (`id`, `custom_field_id`, `language_id`, `name`) VALUES
(52, 56, 1, 'dsadsa'),
(53, 56, 2, ''),
(70, 62, 1, 'gggggggggg'),
(71, 62, 2, ''),
(107, 79, 1, 'toto'),
(108, 79, 2, ''),
(111, 81, 1, 'date'),
(112, 81, 2, 'nana'),
(113, 82, 1, 'bab'),
(114, 82, 2, ''),
(117, 84, 1, 'DATE'),
(118, 84, 2, 'تاريخ');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(4) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `type`, `category_id`) VALUES
(56, '', 'dsad', NULL),
(62, 'gggggggggg', 'gggg', NULL),
(79, '', 'str', NULL),
(81, 'date', 'str', 66),
(82, '', 'str', NULL),
(84, '', 'STR', 67);

-- --------------------------------------------------------

--
-- Table structure for table `dictionarys`
--

CREATE TABLE `dictionarys` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `English` varchar(255) NOT NULL,
  `Arabic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dictionarys`
--

INSERT INTO `dictionarys` (`id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `English`, `Arabic`) VALUES
(1, '2017-11-22 00:39:35', 0, '2017-11-22 00:39:35', 0, 'read more', 'إقرأ المزيد'),
(2, '2017-11-22 00:40:03', 0, '2017-11-22 00:40:03', 0, 'click here', 'انقر هنا');

-- --------------------------------------------------------

--
-- Table structure for table `fieldvalues`
--

CREATE TABLE `fieldvalues` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(50) NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fieldvalues`
--

INSERT INTO `fieldvalues` (`id`, `value`, `field_id`, `item_id`) VALUES
(237, '', 81, 120),
(238, '', 81, 121),
(239, '', 81, 122),
(240, '', 81, 123),
(241, '', 81, 124),
(242, '', 81, 125),
(243, '', 81, 126),
(244, '', 81, 127),
(245, '', 81, 128),
(246, '', 81, 129),
(247, '', 81, 130),
(248, '', 81, 131),
(249, '', 81, 132),
(250, '', 81, 133),
(251, '', 81, 134),
(252, '22-12-2017', 81, 135),
(253, '', 81, 136),
(254, 'vovo', 81, 137),
(255, '0', 81, 137),
(256, '', 82, 137),
(257, '14-3-2017', 81, 138),
(258, '0', 81, 138),
(259, '', 81, 139),
(260, '0', 81, 139),
(283, '', 84, 141),
(284, '', 84, 142);

-- --------------------------------------------------------

--
-- Table structure for table `fieldvalues_languages`
--

CREATE TABLE `fieldvalues_languages` (
  `id` int(11) NOT NULL,
  `fieldvalue_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `value` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fieldvalues_languages`
--

INSERT INTO `fieldvalues_languages` (`id`, `fieldvalue_id`, `language_id`, `value`) VALUES
(631, 237, 1, ''),
(632, 237, 2, ''),
(633, 238, 1, ''),
(634, 238, 2, ''),
(635, 239, 1, ''),
(636, 239, 2, ''),
(637, 240, 1, ''),
(638, 240, 2, ''),
(639, 241, 1, ''),
(640, 241, 2, ''),
(641, 242, 1, ''),
(642, 242, 2, ''),
(643, 243, 1, ''),
(644, 243, 2, ''),
(645, 244, 1, ''),
(646, 244, 2, ''),
(647, 245, 1, ''),
(648, 245, 2, ''),
(649, 246, 1, ''),
(650, 246, 2, ''),
(651, 247, 1, ''),
(652, 247, 2, ''),
(653, 248, 1, ''),
(654, 248, 2, ''),
(655, 249, 1, ''),
(656, 249, 2, ''),
(657, 250, 1, ''),
(658, 250, 2, ''),
(659, 251, 1, ''),
(660, 251, 2, ''),
(661, 252, 1, '22-12-2017'),
(662, 252, 2, ''),
(663, 254, 1, 'vovo'),
(664, 254, 2, ''),
(665, 256, 1, '22'),
(666, 256, 2, NULL),
(667, 257, 1, '14-3-2017'),
(668, 257, 2, ''),
(669, 259, 1, ''),
(670, 259, 2, ''),
(713, 283, 1, ''),
(714, 283, 2, ''),
(715, 284, 1, ''),
(716, 284, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `title`, `content`, `image`, `cat_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `description`) VALUES
(120, '', '', '', '', 66, 0, 0, '2017-12-27 10:25:56', '2017-12-27 10:25:56', NULL),
(121, '', '', '', '', 66, 0, 0, '2017-12-27 10:26:14', '2017-12-27 10:26:14', NULL),
(122, '', '', '', '', 66, 0, 0, '2017-12-27 10:26:41', '2017-12-27 10:26:41', NULL),
(123, '', '', '', '', 66, 0, 0, '2017-12-27 10:27:18', '2017-12-27 10:27:18', NULL),
(124, '', '', '', '', 66, 0, 0, '2017-12-27 10:27:30', '2017-12-27 10:27:30', NULL),
(125, '', '', '', '', 66, 0, 0, '2017-12-27 10:27:38', '2017-12-27 10:27:38', NULL),
(126, '', '', '', '', 66, 0, 0, '2017-12-27 10:27:41', '2017-12-27 10:27:41', NULL),
(127, '', '', '', '', 66, 0, 0, '2017-12-27 10:29:23', '2017-12-27 10:29:23', NULL),
(128, '', '', '', '', 66, 0, 0, '2017-12-27 10:30:12', '2017-12-27 10:30:12', NULL),
(129, '', '', '', '', 66, 0, 0, '2017-12-27 10:33:49', '2017-12-27 10:33:49', NULL),
(130, '', '', '', '', 66, 0, 0, '2017-12-27 10:34:25', '2017-12-27 10:34:25', NULL),
(131, '', '', '', '', 66, 0, 0, '2017-12-27 10:34:40', '2017-12-27 10:34:40', NULL),
(132, '', '', '', '', 66, 0, 0, '2017-12-27 10:37:54', '2017-12-27 10:37:54', NULL),
(133, '', '', '', '', 66, 0, 0, '2017-12-27 10:39:49', '2017-12-27 10:39:49', NULL),
(134, '', '', '', '', 66, 0, 0, '2017-12-27 10:40:19', '2017-12-27 10:40:19', NULL),
(135, 'mlsVSmanchister', 'manchister wins over MLS', '', '', 66, 0, 0, '2017-12-27 10:45:35', '2017-12-28 07:04:58', NULL),
(136, '', '', '', '', 66, 0, 0, '2017-12-27 10:46:37', '2017-12-27 10:46:37', NULL),
(137, 'sd', 'sdsd', '<p>Initial editor content.</p>\r\n', '', 66, 0, 0, '2017-12-27 10:48:15', '2017-12-27 10:48:49', NULL),
(138, 'nymarMoves', 'NYMAR moves to paris sant german', '<p>Initial editor content.</p>\r\n', '', 66, 0, 0, '2017-12-28 06:18:57', '2017-12-28 07:07:07', NULL),
(139, '', '', '', '', 66, 0, 0, '2017-12-28 07:10:52', '2017-12-28 07:10:52', NULL),
(141, '', '', '', '', 67, 0, 0, '2017-12-28 07:18:30', '2017-12-28 07:18:30', NULL),
(142, '', '', '', '', 67, 0, 0, '2017-12-28 07:21:17', '2017-12-28 07:21:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_languages`
--

CREATE TABLE `items_languages` (
  `id` int(11) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_title` varchar(255) DEFAULT NULL,
  `image_alt` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_languages`
--

INSERT INTO `items_languages` (`id`, `item_id`, `language_id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `title`, `content`, `description`, `image`, `image_title`, `image_alt`) VALUES
(219, 135, 1, 'mlsVSmanchister', '2017-12-27 14:45:35', 0, '2017-12-27 14:45:35', 0, 'manchister wins over MLS', '', 'manchister wins over MLS by 3 goal at 54th minutes , first goal scored by oscare and the second scored by ozel', 'img_5a4395ef85cea5.91158266.jpg', 'manchister wins', 'manVSMLS'),
(221, 138, 1, 'nymarMoves', '2017-12-28 10:18:58', 0, '2017-12-28 10:18:58', 0, 'NYMAR moves to paris sant german', '<p>Initial editor content.</p>\r\n', 'manchister wins over MLS by 3 goal at 54th minutes , first goal scored by oscare and the second scored by ozel', 'img_5a44a8f1f2c0f6.14603658.jpg', 'nymar&parisSG', 'nymar'),
(224, 141, 2, 'فوز1', '2017-12-28 11:18:30', 0, '2017-12-28 11:18:30', 0, 'فوز الفريق الأول على الثاني', '<p>Initial editor content.</p>\r\n', 'الفريق الأول يفوز على الفريق الثاني بنقاط 102 مقابل 90 و يتأهل للنهائي', 'img_5a44b6e65be600.43011764.jpg', 'slam', 'slam'),
(225, 142, 1, 'firstWins', '2017-12-28 11:21:17', 0, '2017-12-28 11:21:17', 0, 'the fisrt team wins over the second', '<p>Initial editor content.</p>\r\n', 'the fisrt team wins over the second by 120 over 90 point and get the cup', 'img_5a44b78d6b79a6.51444929.jpg', 'slam', 'slam');

-- --------------------------------------------------------

--
-- Table structure for table `items_metas`
--

CREATE TABLE `items_metas` (
  `id` int(11) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `keywords` mediumtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items_metas`
--

INSERT INTO `items_metas` (`id`, `item_id`, `language_id`, `title`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`, `keywords`) VALUES
(19, 135, 1, 'manchister wins over MLS', 'manchister wins over MLS', '2017-12-27 14:45:35', 0, '2017-12-27 14:45:35', 0, 'manchister,MLS,english,legu'),
(20, 137, 1, 'sdssd', 'sd', '2017-12-27 14:48:15', 0, '2017-12-27 14:48:15', 0, 'sd'),
(21, 138, 1, 'nymar', 'manchister wins over MLS by 3 goal at 54th minutes , first goal scored by oscare and the second scored by ozel', '2017-12-28 10:18:58', 0, '2017-12-28 10:18:58', 0, 'nymar,PSG'),
(22, 139, 1, 'we', 'wqe', '2017-12-28 11:10:53', 0, '2017-12-28 11:10:53', 0, 'we'),
(24, 141, 2, 'فوز الفريق الأول على الثاني', 'فوز الفريق الأول على الثاني', '2017-12-28 11:18:30', 0, '2017-12-28 11:18:30', 0, 'فوز الفريق الأول على الثاني'),
(25, 142, 1, 'the fisrt team wins over the second', 'the fisrt team wins over the second', '2017-12-28 11:21:17', 0, '2017-12-28 11:21:17', 0, 'the fisrt team wins over the second');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'English', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'Arabic', '0000-00-00 00:00:00', 0, '2017-11-13 20:03:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` enum('list of categories','navbar','footer','aside','category','item per page','form per page') NOT NULL,
  `position` tinyint(4) DEFAULT '1',
  `name` varchar(50) NOT NULL,
  `cat_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `type`, `position`, `name`, `cat_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `priority`) VALUES
(105, NULL, 'navbar', 0, '', NULL, '2017-11-21 17:57:08', 0, '2017-11-21 17:57:08', 0, 0),
(125, NULL, 'list of categories', 1, '', 65, '2017-12-27 11:36:10', 0, '2017-12-27 11:50:17', 0, 0),
(126, 125, 'category', 1, '', 66, '2017-12-27 11:50:17', 0, '2017-12-27 11:50:17', 0, 0),
(127, 125, 'category', 1, '', 67, '2017-12-27 12:03:20', 0, '2017-12-27 12:03:20', 0, 0),
(128, NULL, 'category', 1, '', 68, '2017-12-27 12:15:25', 0, '2017-12-27 12:15:25', 0, 0),
(130, 105, 'form per page', 0, '', 70, '2017-12-28 12:23:04', 0, '2017-12-28 12:23:04', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menus_languages`
--

CREATE TABLE `menus_languages` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus_languages`
--

INSERT INTO `menus_languages` (`id`, `menu_id`, `language_id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(122, 105, 1, 'navbar', '2017-11-21 19:57:08', 0, '2017-11-21 19:57:08', 0),
(123, 105, 2, 'navbarA', '2017-11-21 19:57:08', 0, '2017-11-21 19:57:08', 0),
(255, 125, 1, 'soprts', '2017-12-27 13:36:10', 0, '2017-12-27 13:36:10', 0),
(256, 125, 2, 'رياضة', '2017-12-27 13:36:10', 0, '2017-12-27 13:36:10', 0),
(257, 126, 1, 'football', '2017-12-27 13:50:17', 0, '2017-12-27 13:50:17', 0),
(258, 126, 2, 'كرة قدم', '2017-12-27 13:50:17', 0, '2017-12-27 13:50:17', 0),
(259, 127, 1, 'basket ball', '2017-12-27 14:03:20', 0, '2017-12-27 14:03:20', 0),
(260, 127, 2, 'كرة السلة', '2017-12-27 14:03:20', 0, '2017-12-27 14:03:20', 0),
(261, 128, 1, 'economics', '2017-12-27 14:15:25', 0, '2017-12-27 14:15:25', 0),
(262, 128, 2, 'اقتصادية', '2017-12-27 14:15:25', 0, '2017-12-27 14:15:25', 0),
(265, 130, 1, 'form', '2017-12-28 14:23:04', 0, '2017-12-28 14:23:04', 0),
(266, 130, 2, 'form', '2017-12-28 14:23:04', 0, '2017-12-28 14:23:04', 0);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'TemplateController@index'),
(2, 'TemplateController@showCategory'),
(3, 'TemplateController@showItemPerPage'),
(4, 'TemplateController@showCategoryList'),
(5, 'MenuController@index'),
(6, 'CategoryController@index'),
(7, 'PermissionController@index'),
(8, 'UserController@index'),
(9, 'MenuController@add'),
(10, 'MenuController@update'),
(11, 'MenuController@save'),
(12, 'MenuController@delete'),
(13, 'CategoryController@add'),
(14, 'CategoryController@update'),
(15, 'CategoryController@save'),
(16, 'CategoryController@delete'),
(17, 'ItemController@index'),
(18, 'ItemController@add'),
(19, 'ItemController@update'),
(20, 'ItemController@show'),
(21, 'ItemController@delete'),
(22, 'LanguageController@index'),
(23, 'LanguageController@add'),
(24, 'LanguageController@update'),
(25, 'LanguageController@save'),
(26, 'LanguageController@delete'),
(27, 'LanguageController@changeLanguageSession'),
(28, 'DictionaryController@index'),
(29, 'DictionaryController@update'),
(30, 'DictionaryController@save'),
(31, 'UserController@changeRole'),
(32, 'AuthController@showLoginForm');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Data Entry'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`) VALUES
(1, 'first'),
(2, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'mohammad mustafa', 'mohammad.e.mustafa@gmail.com', '$2y$10$AlsDUwyPiKyeQq8y6SGD5.gO1E1kjM9foDzO7vaq4fu6Voam8i7tm', 'wYyZKwPiZRTizYJrlbrVR2Sk7fLODGaWzhN0uqtmoLDp7xYtTB9eK5oYPMnP', '2017-10-19 09:09:44', '2017-11-22 06:43:12', 1),
(2, 'diaa', 'diaa@gmail.com', '$2y$10$HDtFyqkbESnfOPOfuSI9yORwFjdADfNjbdPLUJLL7vxZ.JsdYvk6G', 'cAwySSXEVYIol7RcrfeNdjcyZKAhz085MSmiJXMRybYNrma9oAKBYEp6gaMT', '2017-11-10 11:16:20', '2017-11-22 06:37:05', 2),
(4, 'ddddd', 'diaa2@gmail.com', '$2y$10$73eP1rDgPKHBaVjgxbufVuwQMSiEnBCbOMiNg6JNd9beJZ7PiZcDq', 'elp1scTcUBgY7JoN6HwhakundfZVOmz08GgPunvpLlTeemTiEBtUSRtfFm1V', '2017-12-26 21:35:12', '2017-12-27 05:00:33', 1),
(5, 'manar', 'manar02@windowslive.com', '$2y$10$8L29eXhK3RG6WooMbI64HedZAspT2LbrAGHcW.KGLbWuP.NQbhW.q', NULL, '2017-12-27 05:08:36', '2017-12-27 05:08:36', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_index` (`parent_id`),
  ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `categories_languages`
--
ALTER TABLE `categories_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_languages_ibfk_1` (`language_id`),
  ADD KEY `categories_languages_ibfk_2` (`categorie_id`);

--
-- Indexes for table `categories_metas`
--
ALTER TABLE `categories_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `customs_languages`
--
ALTER TABLE `customs_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `customs_languages_ibfk_2` (`custom_field_id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coustomField_category_fk` (`category_id`);

--
-- Indexes for table `dictionarys`
--
ALTER TABLE `dictionarys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fieldvalues`
--
ALTER TABLE `fieldvalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fieldValue_field2_fk` (`field_id`),
  ADD KEY `fieldValue_item2_fk` (`item_id`);

--
-- Indexes for table `fieldvalues_languages`
--
ALTER TABLE `fieldvalues_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `fieldvalue_id` (`fieldvalue_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_item_index` (`cat_id`);

--
-- Indexes for table `items_languages`
--
ALTER TABLE `items_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items_metas`
--
ALTER TABLE `items_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_index` (`parent_id`),
  ADD KEY `cat_index` (`cat_id`);

--
-- Indexes for table `menus_languages`
--
ALTER TABLE `menus_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_languages_ibfk_1` (`language_id`),
  ADD KEY `menus_languages_ibfk_2` (`menu_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_fk_idx` (`role_id`),
  ADD KEY `permission_fk_idx` (`permission_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_fk_idx_2` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `categories_languages`
--
ALTER TABLE `categories_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `categories_metas`
--
ALTER TABLE `categories_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customs_languages`
--
ALTER TABLE `customs_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `dictionarys`
--
ALTER TABLE `dictionarys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fieldvalues`
--
ALTER TABLE `fieldvalues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT for table `fieldvalues_languages`
--
ALTER TABLE `fieldvalues_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `items_languages`
--
ALTER TABLE `items_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
--
-- AUTO_INCREMENT for table `items_metas`
--
ALTER TABLE `items_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `menus_languages`
--
ALTER TABLE `menus_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_parent-cat` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `categories_languages`
--
ALTER TABLE `categories_languages`
  ADD CONSTRAINT `categories_languages_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_languages_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories_metas`
--
ALTER TABLE `categories_metas`
  ADD CONSTRAINT `categories_metas_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_metas_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_metas_ibfk_3` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customs_languages`
--
ALTER TABLE `customs_languages`
  ADD CONSTRAINT `customs_languages_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customs_languages_ibfk_2` FOREIGN KEY (`custom_field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD CONSTRAINT `custom_fields_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fieldvalues`
--
ALTER TABLE `fieldvalues`
  ADD CONSTRAINT `fieldValue2_item_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fieldvalues_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fieldvalues_languages`
--
ALTER TABLE `fieldvalues_languages`
  ADD CONSTRAINT `fieldvalues_languages_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fieldvalues_languages_ibfk_2` FOREIGN KEY (`fieldvalue_id`) REFERENCES `fieldvalues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_cat_items` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_languages`
--
ALTER TABLE `items_languages`
  ADD CONSTRAINT `items_languages_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_languages_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_metas`
--
ALTER TABLE `items_metas`
  ADD CONSTRAINT `items_metas_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_metas_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_cat_menus_tables` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_parent-menues` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus_languages`
--
ALTER TABLE `menus_languages`
  ADD CONSTRAINT `menus_languages_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_languages_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `permission_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
