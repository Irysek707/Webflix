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
-- Table structure for table `tv_show`
--

CREATE TABLE IF NOT EXISTS `tv_show` (
  `tvshow_id` int(11) NOT NULL,
  `tvshow_title` varchar(255) DEFAULT NULL,
  `tvshow_description` text,
  `tvshow_trailer` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `num_seasons` int(11) DEFAULT NULL,
  `number_of_episodes` int(11) DEFAULT NULL,
  `genre_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tvshow_id`),
  KEY `genre_name` (`genre_name`),
  KEY `idx_tv_show_tvshow_title` (`tvshow_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_show`
--

INSERT INTO `tv_show` (`tvshow_id`, `tvshow_title`, `tvshow_description`, `tvshow_trailer`, `img`, `release_year`, `language`, `num_seasons`, `number_of_episodes`, `genre_name`) VALUES
(1, 'Breaking Bad', 'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his family future', 'https://www.youtube.com/embed/VFLkMDEO-Xc', 'img/tvshows/breakingbad.jpg', 2008, 'English', 5, 12, 'Crime'),
(2, 'Game of Thrones', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', 'https://www.youtube.com/embed/KPLWWIOCOOQ', 'img/tvshows/got.jpeg', 2011, 'English', 8, 12, 'Fantasy'),
(3, 'Stranger Things', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.', 'https://www.youtube.com/embed/b9EkMc79ZSU', 'img/tvshows/stranger.jpg', 2016, 'English', 4, 12, 'Horror'),
(4, 'Friends', 'Follows the personal and professional lives of six twenty to thirty-something-year-old friends living in Manhattan.', 'https://www.youtube.com/watch?v=hDNNmeeJs1Q', 'img/tvshows/friends.jpg', 1994, 'English', 10, 12, 'Comedy'),
(5, 'The Office', 'A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, and tedium.', 'https://www.youtube.com/watch?v=U6-xpUwVS_Y', 'img/tvshows/office.jpg', 2005, 'English', 9, 12, 'Comedy'),
(6, 'The Crown', 'Follows the political rivalries and romance of Queen Elizabeth II is reign and the events that shaped the second half of the twentieth century.', 'https://www.youtube.com/watch?v=KXV3_ND1MqU', 'img/tvshows/thecrown.jpg', 2016, 'English', 4, 12, 'Drama'),
(7, 'The Witcher', 'Geralt of Rivia, a solitary monster hunter, struggles to find his place in a world where people often prove more wicked than beasts.', 'https://www.youtube.com/watch?v=ndl1W4ltcmg', 'img/tvshows/thewitcher.jpg', 2019, 'English', 2, 20, 'Fantasy'),
(8, 'The Mandalorian', 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.', 'https://www.youtube.com/watch?v=aOC8E8z_ifw', 'img/tvshows/mandalorian.jpg', 2019, 'English', 2, 12, 'Science Fiction'),
(9, 'Narcos', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar, as well as the many other drug kingpins who plagued the country through the years.', 'https://www.youtube.com/watch?v=U7elNhHwgBU', 'img/tvshows/narcos.jpg', 2015, 'English', 3, 12, 'Crime'),
(10, 'Black Mirror', 'An anthology series exploring a twisted, high-tech world where humanity is devolving and where the consequences of technology misuse and abuse are catastrophic.', 'https://www.youtube.com/watch?v=0h-TVh1iZ7g', 'img/tvshows/mirror.jpg', 2011, 'English', 5, 12, 'Science Fiction'),
(11, 'The Boys', 'A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.', 'https://www.youtube.com/watch?v=tcrNsIaQkb4', 'img/tvshows/boys.jpg', 2019, 'English', 3, 12, 'Action'),
(12, 'Cobra Kai', 'Decades after the tournament that changed their lives, the rivalry between Johnny and Daniel reignites.', 'https://www.youtube.com/watch?v=xCwwxNbtK6Y', 'img/tvshows/cobra.jpg', 2018, 'English', 4, 12, 'Action'),
(13, 'Planet Earth', 'A documentary series about the natural world', 'https://www.youtube.com/watch?v=c8aFcHFu8QM', 'img/tvshows/planet.jpg', 2006, 'English', 1, 12, 'Documentary'),
(14, 'The World at War', 'A documentary series about World War II', 'https://www.youtube.com/watch?v=NB-tRbZegQ4', 'img/tvshows/war.jpg', 1973, 'English', 1, 12, 'Documentary'),
(15, 'The Bold Type', 'A glimpse into the outrageous lives of Jane, Kat and Sutton, who are working at the nation''s top women''s magazine, Scarlet, while navigating their careers, identities and individual voices.', 'https://www.youtube.com/watch?v=MRgjCM4S4D4', 'img/tvshows/bold.jpg', 2017, 'English', 5, 62, 'Romance'),
(16, 'Love', 'A program that follows a couple who must navigate the exhilarations and humiliations of intimacy, commitment and other things they were hoping to avoid.', 'https://www.youtube.com/watch?v=EYcVtweIQE4', 'img/tvshows/love.jpg', 2016, 'English', 3, 46, 'Romance'),
(17, 'Dexter', 'Dexter Morgan, a forensic blood spatter analyst for the Miami Metro Police Department, is secretly a serial killer.', 'https://www.youtube.com/watch?v=YQeUmSD1c3g', 'img/tvshows/dexter.jpg', 2006, 'English', 8, 12, 'Thriller'),
(18, 'Ozark', 'A financial advisor moves his family to the Ozarks to launder money for a drug cartel.', 'https://www.youtube.com/watch?v=5hAXVqrljbs', 'img/tvshows/ozark.jpg', 2017, 'English', 4, 12, 'Thriller'),
(19, 'This Is Us', 'This Is Us is an American romantic family drama television series created by Dan Fogelman.', 'https://www.youtube.com/watch?v=xvxxmvW8Wbs', 'img/tvshows/thisisus.jpg', 2016, 'English', 6, 12, 'Drama'),
(20, 'The Haunting of Hill House', 'A family confronts supernatural occurrences in their new home.', 'https://www.youtube.com/watch?v=G9OzG53VwIk', 'img/tvshows/haunting.jpg', 2018, 'English', 1, 12, 'Horror');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tv_show`
--
ALTER TABLE `tv_show`
  ADD CONSTRAINT `tv_show_ibfk_1` FOREIGN KEY (`genre_name`) REFERENCES `genre` (`genre_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
