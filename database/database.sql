-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: May 22, 2011, 12:03 AM
-- 伺服器版本: 5.1.54
-- PHP 版本: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `crms_db`
--

-- --------------------------------------------------------

--
-- 資料表格式： `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `name` varchar(40) NOT NULL,
  `dorm` varchar(40) NOT NULL,
  `id` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 列出以下資料庫的數據： `equipment`
--


-- --------------------------------------------------------

--
-- 資料表格式： `shadow`
--

DROP TABLE IF EXISTS `shadow`;
CREATE TABLE IF NOT EXISTS `shadow` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `passwd` varchar(40) NOT NULL,
  `privilege` smallint(6) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 列出以下資料庫的數據： `shadow`
--

INSERT INTO `shadow` (`no`, `name`, `passwd`, `privilege`) VALUES
(1, 'kohsiangyu', 'admin', 0),
(3, 'admin', 'admin', 0),
(4, 'mkfsn', 'kanade', 0);
