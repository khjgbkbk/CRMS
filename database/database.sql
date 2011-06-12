-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2011 at 10:40 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `name` varchar(40) NOT NULL,
  `dorm` int(15) NOT NULL,
  `id` varchar(40) NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`name`, `dorm`, `id`, `price`, `date`) VALUES
('router', 1, '1234567890987654321', 123456789, '2012-12-31'),
('switch', 3, '11061010552', 1234567, '2011-06-10'),
('switch', 3, '11061010550', 1234567, '2011-06-10'),
('switch', 3, '11061010548', 1234567, '2011-06-10'),
('switch', 3, '11061010545', 1234567, '2011-06-10'),
('switch', 3, '11061010126', 1234567, '2011-06-10'),
('switch', 3, '11061133952', 1234567, '2011-06-11'),
('switch', 3, '11061133950', 1234567, '2011-06-11'),
('switch', 3, '11061133942', 1234567, '2011-06-11'),
('switch', 3, '11061133939', 1234567, '2011-06-11'),
('switch', 3, '11061010725', 1234567, '2011-06-10'),
('switch', 3, '11061010662', 1234567, '2011-06-10'),
('switch', 3, '11061010663', 1234567, '2011-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `shadow`
--

CREATE TABLE IF NOT EXISTS `shadow` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  `privilege` smallint(6) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `shadow`
--

INSERT INTO `shadow` (`no`, `name`, `passwd`, `privilege`) VALUES
(1, 'kohsiangyu', 'admin', 0),
(3, 'admin', '123', 0),
(4, 'mkfsn', 'kanade', 0);
