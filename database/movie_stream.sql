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
-- Table structure for table `movie_stream`
--

CREATE TABLE IF NOT EXISTS `movie_stream` (
  `id` int(11) NOT NULL,
  `movie_title` varchar(255) DEFAULT NULL,
  `movie_description` text,
  `movie_trailer` varchar(255) DEFAULT NULL,
  `movie_stream` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `genre_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `genre_name` (`genre_name`),
  KEY `idx_movie_stream_movie_title` (`movie_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_stream`
--

INSERT INTO `movie_stream` (`id`, `movie_title`, `movie_description`, `movie_trailer`, `movie_stream`, `img`, `release_year`, `language`, `duration`, `genre_name`) VALUES
(16, 'The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'https://www.youtube.com/embed/UaVTIH8mujA', 'https://www.youtube.com/embed/sY1S34973zA', 'img/movies/godfather.jpg', 1972, 'English', 175, 'Crime'),
(17, 'Forrest Gump', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.', 'https://www.youtube.com/embed/XHhAG-YLdk8', 'https://www.youtube.com/embed/bLvqoHBptjg', 'img/movies/forrest.jpg', 1994, 'English', 142, 'Drama'),
(18, 'The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'https://www.youtube.com/embed/NmzuHjWmXOc', 'https://www.youtube.com/embed/6hB3S9bIaco', 'img/movies/shawshank.jpg', 1994, 'English', 142, 'Drama'),
(19, 'The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/embed/LDG9bisJEaI', 'img/movies/darkknight.jpg', 2008, 'English', 152, 'Action'),
(20, 'The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'https://www.youtube.com/embed/vKQi3bBA1y8', 'https://www.youtube.com/embed/m8e-FF8MsqU', 'img/movies/matrix.jpg', 1999, 'English', 136, 'Science Fiction'),
(21, 'The Silence of the Lambs', 'A young F.B.I. cadet must confide in an incarcerated and manipulative killer to receive his help on catching another serial killer who skins his victims.', 'https://www.youtube.com/embed/RuX2MQeb8UM', 'https://www.youtube.com/embed/W6Mm8Sbe__o', 'img/movies/silence.jpg', 1991, 'English', 118, 'Crime'),
(22, 'Interstellar', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity''s survival.', 'https://www.youtube.com/embed/2LqzF5WauAw', 'https://www.youtube.com/embed/Lm8p5rlrSkY', 'img/movies/interstellar.jpg', 2014, 'English', 169, 'Science Fiction'),
(23, 'The Hangover', 'Three friends wake up from a bachelor party in Las Vegas, with no memory of the previous night and the bachelor missing. They make their way around the city in order to find their friend before his wedding.', 'https://www.youtube.com/embed/tcdUhdOlz9M', 'https://www.youtube.com/embed/xlrqaAjBwS4', 'img/movies/hangover.jpg', 2009, 'English', 100, 'Comedy'),
(24, 'Bridesmaids', 'Competition between the maid of honor and a bridesmaid, over who is the bride''s best friend, threatens to upend the life of an out-of-work pastry chef.', 'https://www.youtube.com/embed/JgacDwgKiZg', 'https://www.youtube.com/embed/FNppLrmdyug', 'img/movies/bridesmaids.jpg', 2011, 'English', 125, 'Comedy'),
(25, 'The Grand Budapest Hotel', 'The adventures of Gustave H, a legendary concierge at a famous hotel from the fictional Republic of Zubrowka between the first and second World Wars, and Zero Moustafa, the lobby boy who becomes his most trusted friend.', 'https://www.youtube.com/embed/mXRztrOK47I', 'https://www.youtube.com/embed/zru-1DbbcsA', 'img/movies/budapest.jpg', 2014, 'English', NULL, 'Comedy'),
(26, 'Superbad', 'Two co-dependent high school seniors are forced to deal with separation anxiety after their plan to stage a booze-soaked party goes awry.', 'https://www.youtube.com/embed/4eaZ_48ZYog', 'https://www.youtube.com/embed/zFjaJbihWwcY', 'img/movies/superbad.jpg', 2007, 'English', 100, 'Comedy'),
(27, 'The 40-Year-Old Virgin', 'Goaded by his buddies, a nerdy guy who''s never "done the deed" only finds the pressure mounting when he meets a single mother.', 'https://www.youtube.com/embed/b9TeAHszSh0', 'https://www.youtube.com/embed/YnDeJn-BX5Q', 'img/movies/40year.jpg', 2005, 'English', 116, 'Comedy'),
(28, 'The Social Dilemma', 'Explores the dangerous human impact of social networking, with tech experts sounding the alarm on their own creations', 'https://www.youtube.com/embed/uaaC57tcci0', 'https://www.youtube.com/embed/rvg0eY_Ls4Y', 'img/movies/dilemma.jpg', 2020, 'English', 94, 'Documentary'),
(29, 'My Octopus Teacher', 'A filmmaker forges an unusual friendship with an octopus living in a South African kelp forest, learning as the animal shares the mysteries of her world.', 'https://www.youtube.com/embed/3s0LTDhqe5A', 'https://www.youtube.com/embed/b-lbIJHlmbE', 'img/movies/octopus.jpg', 2020, 'English', 85, 'Documentary'),
(30, 'Fyre', 'An exclusive behind the scenes look at the infamous unraveling of the Fyre music festival.', 'https://www.youtube.com/embed/uZ0KNVU2fV0', 'https://www.youtube.com/embed/7_omekVr9fE', 'img/movies/fyre.jpg', 2019, 'English', 97, 'Documentary'),
(31, 'The Ivory Game', 'Wildlife activists in take on poachers in an effort to end illegal ivory trade in Africa', 'https://www.youtube.com/embed/3GPEKKaSmZY', 'https://www.youtube.com/embed/lzxef8eAFUU', 'img/movies/ivory-game.jpg', 2016, 'English', 112, 'Documentary'),
(32, 'Minimalism', 'A documentary about the important things.', 'https://www.youtube.com/embed/0Co1Iptd4p4', 'https://www.youtube.com/embed/WJWVADbD3yY', 'img/movies/minimalism.jpg', 2016, 'English', 78, 'Documentary'),
(33, 'Mission: Impossible - Fallout', 'Ethan Hunt and his IMF team must stop a nuclear disaster.', 'https://www.youtube.com/embed/wb49-oV0F78', 'https://www.youtube.com/embed/XiHiW4N7-bo', 'img/movies/mi.jpeg', 2018, 'English', 147, 'Action'),
(34, 'John Wick: Chapter 2', 'Legendary hitman John Wick is forced out of retirement once again.', 'https://www.youtube.com/embed/XGk2EfbD_Ps', 'https://www.youtube.com/embed/ChpLV9AMqm4', 'img/movies/john.jpg', 2017, 'English', 122, 'Action'),
(35, 'The Raid: Redemption', 'A SWAT team must fight their way through a high-rise building filled with criminals.', 'https://www.youtube.com/embed/m6Q7KnXpNOg', 'https://www.youtube.com/embed/pdGkZGrBImk', 'img/movies/raid.jpg', 2011, 'English', 101, 'Action'),
(36, 'The Bourne Identity', 'A man is rescued at sea by the crew of a fishing boat. He is suffering from amnesia and cannot remember who he is or how he got there.', 'https://www.youtube.com/embed/FpKaB5dvQ4g', 'https://www.youtube.com/embed/v71ce1Dqqns', 'img/movies/bourne.jpg', 2002, 'English', 119, 'Action'),
(37, 'Heat', 'A group of professional bank robbers start to feel the heat from police when they unknowingly leave a clue at their latest heist.', 'https://www.youtube.com/embed/0xbBLJ1WGwQ', 'https://www.youtube.com/embed/14oNcFxiVaQ', 'img/movies/heat.jpg', 1995, 'English', 170, 'Crime'),
(38, 'The Departed', 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.', 'https://www.youtube.com/embed/iojhqm0JTW4', 'https://www.youtube.com/embed/iQpb1LoeVUc', 'img/movies/departed.jpg', 2006, 'English', 151, 'Crime'),
(39, 'Goodfellas', 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.', 'https://www.youtube.com/embed/2ilzidi_J8Q', 'https://www.youtube.com/embed/qo5jJpHtI1Y', 'img/movies/goodfellas.jpg', 1990, 'English', 146, 'Crime'),
(40, 'The Notebook', 'A poor and passionate young man falls in love with a rich young woman and gives her a sense of freedom. They soon are separated by their social differences.', 'https://www.youtube.com/embed/FC6biTjEyZw', 'https://www.youtube.com/embed/BjJcYdEOI0k', 'img/movies/notebook.jpg', 2004, 'English', 123, 'Drama'),
(41, 'A Star is Born', 'A musician helps a young singer find fame, even as age and alcoholism send his own career into a downward spiral.', 'https://www.youtube.com/embed/nSbzyEJ8X9E', 'https://www.youtube.com/embed/0gWeEk2QjdY', 'img/movies/astarisborn.jpg', 2018, 'English', 135, 'Drama'),
(42, 'The Fault in Our Stars', 'Two teenagers with cancer fall in love and embark on a journey to visit a reclusive author in Amsterdam.', 'https://www.youtube.com/embed/9ItBvH5J6ss', 'https://www.youtube.com/embed/C99rqP-lMjM', 'img/movies/tfios.png', 2014, 'English', 125, 'Drama'),
(43, 'The Bridges of Madison County', 'Photographer Robert Kincaid wanders into the life of housewife Francesca Johnson for four days in the 1960s.', 'https://www.youtube.com/embed/Up-oN4NtvbM', 'https://www.youtube.com/embed/9cqPXi-pnSQ', 'img/movies/madison.jpg', 1995, 'English', 135, 'Drama'),
(44, 'Blade Runner 2049', 'A young blade runner''s discovery of a long-buried secret leads him to track down former blade runner Rick Deckard, who''s been missing for thirty years.', 'https://www.youtube.com/embed/eogpIG53Cis', 'hhttps://www.youtube.com/embed/qoEyZoOTtss', 'img/movies/blade.jpg', 2017, 'English', 163, 'Science Fiction'),
(45, 'Arrival', 'When twelve mysterious spacecraft appear around the world, linguistics professor Louise Banks is tasked with interpreting the language of the apparent alien visitors.', 'https://www.youtube.com/embed/tFMo3UJ4B4g', 'https://www.youtube.com/embed/ZLO4X6UI8OY', 'img/movies/arrival.jpg', 2016, 'English', 116, 'Science Fiction'),
(46, 'Elysium', 'In the year 2154, the very wealthy live on a man-made space station while the rest of the population resides on a ruined Earth. A man takes on a mission that could bring equality to the polarized worlds.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=7YvRaoRQavo', 'img/movies/elysium.jpg', 2013, 'English', 109, 'Science Fiction'),
(47, 'The Lord of the Rings: The Fellowship of the Ring', 'A young hobbit named Frodo sets out on a perilous journey to destroy a powerful ring and save Middle-earth from the Dark Lord Sauron.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=V75dMMIW2B4', 'img/movies/lotr.jpg', 2001, 'English', 178, 'Fantasy'),
(48, 'Harry Potter and the Sorcerer''s Stone', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=1bq0qff4iF8', 'img/movies/hp.jpg', 2001, 'English', 152, 'Fantasy'),
(49, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'Four kids travel through a wardrobe to the land of Narnia and learn of their destiny to free it with the guidance of a mystical lion.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=_LKwIhOoAbM', 'img/movies/narnia.jpg', 2005, 'English', 143, 'Fantasy'),
(50, 'Pan''s Labyrinth', 'In the falangist Spain of 1944, the bookish young stepdaughter of a sadistic army officer escapes into an eerie but captivating fantasy world.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=EYsDwDSxWxk', 'img/movies/pans_labyrinth.jpg', 2006, 'English', 118, 'Fantasy'),
(51, 'The NeverEnding Story', 'A troubled boy dives into a wondrous fantasy world through the pages of a mysterious book.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=UeFni9dOv7c', 'img/movies/neverending_story.jpg', 1984, 'English', 102, 'Fantasy'),
(52, 'Scream', 'A killer stalks a group of teenagers.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=AWm_mkbdpCA', 'img/movies/scream.jpg', 1996, 'English', 111, 'Horror'),
(53, 'The Ring', 'A cursed videotape brings death to all who watch it.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=WPaJFxdyXMM', 'img/movies/ring.jpg', 2002, 'English', 115, 'Horror'),
(54, 'Final Destination', 'A group of teenagers cheat death, but death comes back for them.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=RKs6ikmrLgg', 'img/movies/destination.jpg', 2000, 'English', 98, 'Horror'),
(55, 'The Conjuring', 'Paranormal investigators try to help a family haunted by a dark presence.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=k10ETZ41q5o', 'img/movies/conjuring.jpg', 2013, 'English', 112, 'Horror'),
(56, 'Get Out', 'A black man visits his white girlfriend''s family, and uncovers a sinister plot.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.youtube.com/watch?v=sRfnevzM9kQ', 'img/movies/getout.jpg', 2017, 'English', 104, 'Horror'),
(57, 'Before Sunrise', 'A young man and woman meet on a train in Europe, and wind up spending one romantic evening together in Vienna. Unfortunately, both know that this will probably be their only night together.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.netflix.com/watch/60001026', 'img/movies/sunrise.jpg', 1995, 'English', 101, 'Romance'),
(58, 'Her', 'In a near future, a lonely writer develops an unlikely relationship with an operating system designed to meet his every need.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.netflix.com/watch/70299284', 'img/movies/her.jpg', 2013, 'English', 126, 'Romance'),
(59, 'Blue Valentine', 'The relationship of a contemporary married couple, charting their evolution over a span of years by cross-cutting between time periods.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.netflix.com/watch/70129415', 'img/movies/blue.jpg', 2010, 'English', 112, 'Romance'),
(60, 'Eternal Sunshine of the Spotless Mind', 'When their relationship turns sour, a couple undergoes a medical procedure to have each other erased from their memories.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.netflix.com/watch/60034756', 'img/movies/sunshine.jpg', 2004, 'English', 108, 'Romance'),
(61, '500 Days of Summer', 'An offbeat romantic comedy about a woman who doesn''t believe true love exists, and the young man who falls for her.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.netflix.com/watch/70113164', 'img/movies/500.jpg', 2009, 'English', 95, 'Romance'),
(62, 'Gone Girl', 'With his wife''s disappearance having become the focus of an intense media circus, a man sees the spotlight turned on him when it''s suspected that he may not be innocent.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.amazon.com/Gone-Girl-Ben-Affleck/dp/B00O4FUJOM', 'img/movies/gone.jpg', 2014, 'English', 149, 'Thriller'),
(63, 'Memento', 'A man with short-term memory loss attempts to track down his wife''s murderer.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.amazon.com/Memento-Guy-Pearce/dp/B003I3P3Q2', 'img/movies/memento.jpg', 2000, 'English', 113, 'Thriller'),
(64, 'The Girl with the Dragon Tattoo', 'Journalist Mikael Blomkvist is aided in his search for a woman who has been missing for forty years by Lisbeth Salander, a young computer hacker.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.amazon.com/Girl-Dragon-Tattoo-Michael-Nyqvist/dp/B006TTC7V4', 'img/movies/tattoo.jpg', 2011, 'English', 158, 'Thriller'),
(65, 'Shutter Island', 'In 1954, a U.S. Marshal investigates the disappearance of a murderer who escaped from a hospital for the criminally insane.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.amazon.com/Shutter-Island-Leonardo-DiCaprio/dp/B0034G4P7G', 'img/movies/shutter.jpg', 2010, 'English', 138, 'Thriller'),
(66, 'The Prestige', 'Two stage magicians engage in competitive one-upmanship in an attempt to create the ultimate stage illusion.', 'https://www.youtube.com/embed/EXeTwQWrcwY', 'https://www.amazon.com/Prestige-Hugh-Jackman/dp/B0012NLCDE', 'img/movies/prestige.jpg', 2006, 'English', 130, 'Thriller');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_stream`
--
ALTER TABLE `movie_stream`
  ADD CONSTRAINT `movie_stream_ibfk_1` FOREIGN KEY (`genre_name`) REFERENCES `genre` (`genre_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
