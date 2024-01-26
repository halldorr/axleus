-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 26, 2024 at 04:09 AM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axleus`
--

-- --------------------------------------------------------

--
-- Table structure for table `axl_user`
--

DROP TABLE IF EXISTS `axl_user`;
CREATE TABLE IF NOT EXISTS `axl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `profileImage` mediumtext DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthday` tinytext DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `race` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `mobileNumber` varchar(25) DEFAULT NULL,
  `officeNumber` varchar(25) DEFAULT NULL,
  `homeNumber` varchar(25) DEFAULT NULL,
  `street` text DEFAULT NULL,
  `aptNumber` varchar(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `webUrl` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `slack` text DEFAULT NULL,
  `sessionLength` int(11) NOT NULL DEFAULT 86400,
  `regDate` tinytext DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `prefsTheme` varchar(100) NOT NULL DEFAULT 'default',
  `regHash` varchar(255) DEFAULT NULL,
  `resetTimeStamp` varchar(255) DEFAULT NULL,
  `resetHash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
