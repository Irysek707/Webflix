-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2023 at 07:47 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDSOFTS2A15`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `security_question_1` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_number` int(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `permissions` enum('registered','blocked') DEFAULT 'registered',
  `avatar` varchar(255) DEFAULT 'img/user.jpg',
  PRIMARY KEY (`user_id`),
  KEY `idx_users_first_name` (`first_name`),
  KEY `idx_users_last_name` (`last_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`, `security_question_1`, `dob`, `contact_number`, `country`, `permissions`, `avatar`) VALUES
(4, 'Anna', 'Podlasek', 'ap@ap.pl', 'f29f07cb1071cf6ecb04456f11c7d5abe8f2454a87f8f402380a8e0e353b544a', '2022-10-12 13:22:45', 'Fastyn', '1994-06-30', 2147483647, 'United Kingdom', 'registered', 'https://i.imgur.com/n1cY0QP.png'),
(20, 'John', 'Doe', 'john@doe.com', 'd808cfd66215b9ca25d0d02778e1931c7055e2a21bde4a695b9df4ab522ff3cf', '2023-05-05 19:22:41', 'Smith', '1988-03-09', 123456789, 'United Kingdom', 'registered', 'https://i.imgur.com/UC0kS9b.png'),
(21, 'Janette', 'McDonald', 'j.d@gmail.com', '43b5952d5cadb3e2d35ea2e3ce2cc6bcf36dffaa536fcc1cacc4eaccfe60b190', '2023-05-10 02:51:23', 'McDonald', '1989-11-20', 1234567890, 'United Kingdom', 'registered', 'img/user.jpg'),
(22, 'Donna', 'Noble', 'donna@gm.com', 'ed62c6fd9f1b99007f2f0e108e1c5c97184fa69f3c43feb8038b389d80896476', '2023-05-10 02:54:49', 'Noble', '1980-11-11', 1234567890, 'United Kingdom', 'registered', 'img/user.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
