-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 06:36 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `property_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(51, 'uncategorized', '2012-10-14 10:23:13', '2012-10-14 10:23:13'),
(52, 'House', '2012-10-14 10:25:21', '2012-10-14 10:25:21'),
(53, 'Apartment-and-Unit', '2012-10-14 10:25:26', '2012-10-14 11:15:27'),
(54, 'Apartment', '2012-10-14 10:25:32', '2012-10-14 10:25:32'),
(55, 'Unit', '2012-10-14 10:25:35', '2012-10-14 10:25:35'),
(56, 'Townhouse', '2012-10-14 10:25:39', '2012-10-14 10:25:39'),
(57, 'Villa', '2012-10-14 10:25:41', '2012-10-14 10:25:41'),
(58, 'Block-of-Units', '2012-10-14 10:25:48', '2012-10-14 11:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'administrator', '2012-09-20 04:10:12', '2012-09-20 04:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ranking` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `updated_at`, `ranking`) VALUES
(27, 'fasfasfa', 'fsaf', '2012-10-22 07:49:42', '2012-10-22 07:49:42', 33),
(28, 'fas', 'fsaf', '2012-10-22 07:50:02', '2012-10-22 07:50:02', 33);

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE IF NOT EXISTS `news_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `name`, `news_id`, `created_at`, `updated_at`) VALUES
(9, '85e17f92667b5fa75293fa43fdd3ffca.JPG', 20, '2012-10-22 07:23:54', '2012-10-22 07:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rooms` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date_sold` datetime NOT NULL,
  `post_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ranking` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state`),
  KEY `category_id` (`category_id`),
  KEY `state_id_2` (`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `location`, `rooms`, `price`, `state`, `category_id`, `date_sold`, `post_code`, `created_at`, `updated_at`, `ranking`) VALUES
(50, 'property122', 'description togas', 'legazpi, daragaas', 344, 450000044, 'Albaydsada', 55, '0000-00-00 00:00:00', '450144', '2012-10-13 08:23:55', '2012-10-22 07:37:13', 33),
(51, 'prop2', 'de', 'asdas', 4, 4, '4', 52, '0000-00-00 00:00:00', 'q421', '2012-10-14 03:47:41', '2012-10-14 10:26:04', 0),
(52, 'property3', 'dasdas', 'manila', 4, 4300000, 'legazpi', 53, '0000-00-00 00:00:00', '45601', '2012-10-14 09:40:50', '2012-10-14 10:26:10', 0),
(53, 'property99', 'qwerty', 'manila', 5, 2147483647, '4600000', 53, '0000-00-00 00:00:00', '124', '2012-10-14 09:41:18', '2012-10-14 10:26:15', 0),
(54, 'property title', 'cheap house located in dms', 'bicol', 6, 1500000, 'albay', 54, '0000-00-00 00:00:00', '4701', '2012-10-14 09:42:01', '2012-10-14 10:26:21', 0),
(55, 'property title 4', 'cheap', 'bicol', 6, 1500000, 'albay', 54, '0000-00-00 00:00:00', '4701', '2012-10-14 09:42:56', '2012-10-14 10:26:26', 0),
(56, 'property999', 'desc999', 'location999', 9, 9999000, 'arizona', 55, '0000-00-00 00:00:00', '98011', '2012-10-14 09:45:41', '2012-10-14 10:26:33', 0),
(57, 'property8', 'desc8', 'manila', 8, 45000, 'legazpi', 55, '0000-00-00 00:00:00', '46001', '2012-10-14 09:46:05', '2012-10-14 10:26:39', 0),
(58, 'property66', 'desc66', 'manila', 1, 1500000, 'legazpi', 56, '0000-00-00 00:00:00', '70111', '2012-10-14 09:46:48', '2012-10-14 10:26:44', 0),
(59, 'house 4 sale', 'desc99', 'manila', 99, 151521555, 'legazpi', 56, '0000-00-00 00:00:00', '4504', '2012-10-14 09:47:25', '2012-10-14 10:26:49', 0),
(60, 'property44', 'desc44', 'location99944', 414, 460010111, 'albay', 57, '0000-00-00 00:00:00', '99911', '2012-10-14 09:47:58', '2012-10-14 10:26:57', 0),
(61, 'prop12', 'desc12', 'mania', 10, 5000000, 'masbate', 58, '0000-00-00 00:00:00', '412512', '2012-10-14 09:48:42', '2012-10-14 10:27:04', 0),
(62, 'property1000', 'desc', 'dasdsa', 41, 41241, 'legazpi', 51, '0000-00-00 00:00:00', '4151', '2012-10-14 11:19:51', '2012-10-14 11:19:51', 0),
(63, 'fasfasf', 'fasfas', 'fasf', 4, 4, 'fa', 52, '0000-00-00 00:00:00', '33', '2012-10-22 07:33:14', '2012-10-22 07:33:14', 33);

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE IF NOT EXISTS `property_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `name`, `property_id`, `created_at`, `updated_at`) VALUES
(87, '15be6fb300f86a2d388c3252c359029d.jpg', 50, '2012-10-13 08:23:55', '2012-10-13 08:23:55'),
(88, 'd69c8054c32bef7d2ff8294f0e0d19c2.jpg', 50, '2012-10-13 08:23:55', '2012-10-13 08:23:55'),
(89, 'b53dc05dc3660b3fc6f7caeaca9c5cf2.jpg', 50, '2012-10-13 08:23:55', '2012-10-13 08:23:55'),
(90, 'ce66fe4d77d2e501c8cac4f84f839df0.jpg', 50, '2012-10-13 08:23:55', '2012-10-13 08:23:55'),
(91, '930cf264f3c491150c8f51eaa7c2a476.jpg', 50, '2012-10-13 08:23:55', '2012-10-13 08:23:55'),
(92, '90ca67227f5593d17b68a1618532dde4.jpg', 50, '2012-10-13 08:24:25', '2012-10-13 08:24:25'),
(93, '72a0fcfcae7c1e2698da4747afd0bc00.jpg', 50, '2012-10-13 08:24:30', '2012-10-13 08:24:30'),
(94, '8e8e7538d5223559a07f23d35b5bd407.jpg', 50, '2012-10-13 08:24:35', '2012-10-13 08:24:35'),
(95, '7da0d42a64ba1a0ea1f78aa5b17bf608.jpg', 50, '2012-10-13 08:24:39', '2012-10-13 08:24:39'),
(96, '714c308eab8ec3682ca4c039565216c6.jpg', 50, '2012-10-13 08:24:40', '2012-10-13 08:24:40'),
(97, 'c4501be4d987feebfbccb391d56603c0.jpg', 50, '2012-10-13 08:24:45', '2012-10-13 08:24:45'),
(98, '2490af37f07ce4ca1845c2cea6499494.jpg', 50, '2012-10-13 08:24:49', '2012-10-13 08:24:49'),
(99, 'b3bb6010e4ca6eb141cd590ca0d7f5f7.jpg', 50, '2012-10-13 08:24:53', '2012-10-13 08:24:53'),
(100, 'c28e1a21d9dbac3b07cedf7c9a7aadad.jpg', 50, '2012-10-13 08:25:06', '2012-10-13 08:25:06'),
(101, '5b99b58c579357041873c362ccfe8f46.jpg', 50, '2012-10-13 08:25:10', '2012-10-13 08:25:10'),
(102, '63e9035e22e29073c200490380f3aa1f.jpg', 50, '2012-10-13 08:25:14', '2012-10-13 08:25:14'),
(103, 'd32c87c4ba466f317d730148048ae30b.jpg', 50, '2012-10-13 08:25:18', '2012-10-13 08:25:18'),
(104, 'f222b2314978cba0dea1fabc32f39cf2.jpg', 50, '2012-10-13 08:30:37', '2012-10-13 08:30:37'),
(105, '52ee3983801f5f77e3075051a0c0dae2.jpg', 50, '2012-10-13 08:30:43', '2012-10-13 08:30:43'),
(106, 'b5afd9887cb312e1e6aa5dc80b28558a.jpg', 50, '2012-10-13 08:30:46', '2012-10-13 08:30:46'),
(107, 'c6dceb1b207eb90c15cb70832fb610fe.jpg', 50, '2012-10-13 08:30:50', '2012-10-13 08:30:50'),
(108, 'c5c1a8f8ec6eb002f36aa80fce53df56.jpg', 50, '2012-10-13 08:30:53', '2012-10-13 08:30:53'),
(109, 'ae8e6d67992d4234b670ade808e858c9.jpg', 50, '2012-10-13 08:30:57', '2012-10-13 08:30:57'),
(110, '460e3100b4c79095aedf6afd4a468fbd.jpg', 50, '2012-10-13 08:31:00', '2012-10-13 08:31:00'),
(111, '119febd962f7d571cf4b97d6f0ab6e50.jpg', 51, '2012-10-14 03:47:41', '2012-10-14 03:47:41'),
(112, '8fb9f42151abdb2172f0c08dea6d77a8.jpg', 51, '2012-10-14 03:47:42', '2012-10-14 03:47:42'),
(113, '45a658f471c8dfcd1bce8747e20e956d.jpg', 51, '2012-10-14 03:47:42', '2012-10-14 03:47:42'),
(114, '68e53859b1973168fb7e5c2a1d0c53b4.jpg', 52, '2012-10-14 09:40:50', '2012-10-14 09:40:50'),
(115, '1ae29e706c7f904ff0679adc7ca6e8a6.jpg', 53, '2012-10-14 09:41:18', '2012-10-14 09:41:18'),
(116, '2f546ba4d62d54b8d4423eba3adf3cf4.jpg', 54, '2012-10-14 09:42:01', '2012-10-14 09:42:01'),
(117, 'f9849685bcba61bb7d470ea98b68a1f9.jpg', 54, '2012-10-14 09:42:01', '2012-10-14 09:42:01'),
(118, 'fd366096552dc9a56de9b943253063b7.jpg', 55, '2012-10-14 09:42:56', '2012-10-14 09:42:56'),
(119, '80e1c021ba8d4b7213748243dc83da64.jpg', 55, '2012-10-14 09:42:56', '2012-10-14 09:42:56'),
(120, '9d9cf1d1de13bc1856f88810feaffd82.jpg', 56, '2012-10-14 09:45:42', '2012-10-14 09:45:42'),
(121, 'cbabca28e2b2172c1396eda88e9a9548.jpg', 57, '2012-10-14 09:46:05', '2012-10-14 09:46:05'),
(122, 'b9b70c0267dca52d4835600ddb52b132.jpg', 58, '2012-10-14 09:46:48', '2012-10-14 09:46:48'),
(123, '2aaa7228eb05c1b198250357785e194b.jpg', 59, '2012-10-14 09:47:25', '2012-10-14 09:47:25'),
(124, '46029d1d0ea2749680fd30bbfbb2d976.jpg', 60, '2012-10-14 09:47:59', '2012-10-14 09:47:59'),
(125, '8ad21ea75291311861a9a0a3c04d184b.jpg', 61, '2012-10-14 09:48:43', '2012-10-14 09:48:43'),
(126, '2926189df8fffb958a14764526dc5b8e.jpg', 62, '2012-10-14 11:19:51', '2012-10-14 11:19:51'),
(127, 'dc4298d40631ddf13263aa993ba728d7.JPG', 63, '2012-10-22 07:33:16', '2012-10-22 07:33:16'),
(128, 'c28b9779f9ce270b48289b33aedc5a6a.JPG', 63, '2012-10-22 07:33:17', '2012-10-22 07:33:17'),
(129, 'cc30aba43a75ba21a2bdca49e6cc6802.JPG', 63, '2012-10-22 07:33:19', '2012-10-22 07:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(40) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `last_activity`, `data`) VALUES
('6hELGkTzbGJXvYQsqHSo6yn4e3C2xfOjxDOtHFFe', 1350898722, 'a:3:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"h6a5zFTl2TsPDuUlANwJcmjc9kxR3twZtdB3FTEL";}'),
('EaZLmWvFH2ImA3FAJYUCULgo1GBrua58UOJNwJNH', 1350900744, 'a:3:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"UkvbnsdH4ZivoZo8hfm17tzJndqbRNgCcBsLucQU";}'),
('JPFgIEBu49foUCtKMkMjPIWD4i6R2stGvpYYqjgU', 1350900387, 'a:3:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"mpKN9fjcwiXPk0z8I4xPAp7NrEp0BfzyixGCoyD5";}'),
('sHSx7MWojQ3nV16qNez0XFgudU4PUCov6xf7Dy9H', 1350900246, 'a:3:{s:5:":new:";a:0:{}s:5:":old:";a:0:{}s:10:"csrf_token";s:40:"A8gqUjaaVYXBZrhM9pxkMq2Jk6pnrdcLThEa3V3Q";}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `group_id`, `created_at`, `updated_at`) VALUES
(5, 'kebs', '$2a$08$ZWdpTWFmNXFwU3FXc3R6YOz39VoV7cpPAm/T2fWmagke8rIhsmXcu', 'kebs@gmail.com', 'kevin', 'basco', 6, '2012-09-20 15:34:37', '2012-09-20 15:34:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
