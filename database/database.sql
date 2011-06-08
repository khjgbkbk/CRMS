-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2011 at 11:31 PM
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
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `name` varchar(40) NOT NULL,
  `dorm` varchar(40) NOT NULL,
  `id` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`name`, `dorm`, `id`, `price`, `date`) VALUES
('router', 'dorm_f', '1234567890987654321', 123456789, '2012-12-31'),
('bbs', 'dorm_z', 'wtf', 9999999, '1750-06-01');

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
(3, 'admin', 'admin', 0),
(4, 'mkfsn', 'kanade', 0);
