-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2022-12-08 15:38:12
-- 服务器版本： 5.7.36
-- PHP 版本： 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `wholelink`
--
CREATE DATABASE IF NOT EXISTS `wholelink` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wholelink`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL,
  `Level` tinyint(4) DEFAULT NULL,
  `Create_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `commands`
--

DROP TABLE IF EXISTS `commands`;
CREATE TABLE IF NOT EXISTS `commands` (
  `Command_id` int(11) NOT NULL,
  `Command_Text` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Command_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `Device_id` int(11) NOT NULL,
  `Device_Name` varchar(45) DEFAULT NULL,
  `Device_Type` varchar(45) NOT NULL,
  `User_User_id` int(11) DEFAULT NULL,
  `User_User_id1` int(11) NOT NULL,
  `Rooms_Room number` int(11) NOT NULL,
  `Device_Status` tinyint(4) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Brightness` float DEFAULT NULL,
  `Modes` varchar(45) DEFAULT NULL,
  `Schedule` datetime DEFAULT NULL,
  PRIMARY KEY (`Device_id`,`Device_Type`),
  KEY `fk_Devices_User1_idx` (`User_User_id1`),
  KEY `fk_Devices_Rooms1_idx` (`Rooms_Room number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE IF NOT EXISTS `home` (
  `House_id` int(11) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `House_Name` varchar(45) DEFAULT NULL,
  `Room_Number` int(11) NOT NULL,
  `User_User_id` int(11) NOT NULL,
  PRIMARY KEY (`Room_Number`),
  KEY `fk_Home_User1_idx` (`User_User_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `title`, `keywords`, `description`) VALUES
(1, 'Whole-link', 'smart-house', 'NICKLE');

-- --------------------------------------------------------

--
-- 表的结构 `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `Room_Name` int(11) DEFAULT NULL,
  `Number_Of_Devices` varchar(45) DEFAULT NULL,
  `Room number` int(11) NOT NULL,
  `Home_Room_Number` int(11) NOT NULL,
  PRIMARY KEY (`Room number`),
  KEY `fk_Rooms_Home1_idx` (`Home_Room_Number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(20) DEFAULT NULL,
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `Password` varchar(32) DEFAULT NULL,
  `E-mail_Address` varchar(32) DEFAULT NULL,
  `User_Agreement` tinyint(4) DEFAULT NULL,
  `Phone_Number` int(11) DEFAULT NULL,
  `Data_Of_Birth` date DEFAULT NULL,
  `Register_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`Username`, `User_id`, `Password`, `E-mail_Address`, `User_Agreement`, `Phone_Number`, `Data_Of_Birth`, `Register_Time`) VALUES
('123', 1, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, '2022-12-08 16:31:27'),
('test', 2, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, '2022-12-08 16:31:27'),
('test1', 3, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, '2022-12-08 16:31:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
