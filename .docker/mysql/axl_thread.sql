-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 26, 2024 at 04:10 AM
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
-- Table structure for table `axl_thread`
--

DROP TABLE IF EXISTS `axl_thread`;
CREATE TABLE IF NOT EXISTS `axl_thread` (
  `threadId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `boardId` int(10) UNSIGNED NOT NULL COMMENT 'FK to board table boardId',
  `title` varchar(500) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL COMMENT 'FK to user table id',
  `created` int(10) UNSIGNED NOT NULL COMMENT 'created timestamp',
  `updated` int(10) UNSIGNED NOT NULL COMMENT 'updated timestamp',
  PRIMARY KEY (`threadId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
