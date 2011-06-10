-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2011 at 04:45 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `building` varchar(15) NOT NULL,
  `desc` int(15) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`index`, `building`, `desc`) VALUES
(1, 'dorm_a', 1),
(2, 'dorm_b', 2),
(3, 'dorm_c', 3),
(4, 'dorm_d', 4),
(5, 'dorm_e', 5),
(6, 'dorm_f', 6),
(16, 'dorm_52', 11),
(15, 'dorm_51', 10),
(14, 'dorm_l', 9),
(13, 'dorm_h', 8),
(12, 'dorm_g', 7),
(17, 'dorm_53', 12),
(18, 'dorm_54', 13);
