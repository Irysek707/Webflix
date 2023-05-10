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
-- Table structure for table `tv_rev`
--

CREATE TABLE IF NOT EXISTS `tv_rev` (
  `post_id` int(10) NOT NULL,
  `rate` varchar(60) DEFAULT NULL,
  `message` text,
  `post_date` datetime DEFAULT NULL,
  `id` int(10) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `tvshow_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `id` (`id`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `tvshow_title` (`tvshow_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_rev`
--

INSERT INTO `tv_rev` (`post_id`, `rate`, `message`, `post_date`, `id`, `first_name`, `last_name`, `tvshow_title`) VALUES
(1, '3', 'Very weird, not sure.', '2023-05-05 09:34:02', 4, 'Anna', 'Podlasek', 'Cobra Kai'),
(2, '4', 'Very good!', '2023-05-05 20:02:37', 20, 'John', 'Doe', 'Friends');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tv_rev`
--
ALTER TABLE `tv_rev`
  ADD CONSTRAINT `tv_rev_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tv_rev_ibfk_2` FOREIGN KEY (`first_name`) REFERENCES `users` (`first_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tv_rev_ibfk_3` FOREIGN KEY (`last_name`) REFERENCES `users` (`last_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tv_rev_ibfk_4` FOREIGN KEY (`tvshow_title`) REFERENCES `tv_show` (`tvshow_title`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
