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
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_name` varchar(50) NOT NULL,
  `genre_description` text,
  PRIMARY KEY (`genre_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_name`, `genre_description`) VALUES
('Action', 'Movies that involve a lot of physical activity, fighting, or exciting, often dangerous events'),
('Comedy', 'Movies that are meant to make the audience laugh'),
('Crime', 'Movies that focus on criminal activities, including theft, murder, and other illegal acts'),
('Documentary', 'Movies that present factual information about real-world subjects'),
('Drama', 'Movies that are serious in tone and often explore human relationships and emotions'),
('Fantasy', 'Movies that feature magic or other supernatural elements'),
('Horror', 'Movies that are designed to frighten and unsettle the audience'),
('Romance', 'Movies that focus on romantic relationships and emotional connections between characters'),
('Science Fiction', 'Movies that explore the potential consequences of scientific and other innovations'),
('Thriller', 'Movies that create suspense and tension in the audience, often through plot twists or unexpected events');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
