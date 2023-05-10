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
-- Table structure for table `episodes`
--

CREATE TABLE IF NOT EXISTS `episodes` (
  `episode_id` int(11) NOT NULL,
  `episode_number` int(11) DEFAULT NULL,
  `season` int(11) DEFAULT NULL,
  `episode_title` varchar(255) DEFAULT NULL,
  `episode_description` text,
  `episode_link` varchar(255) DEFAULT NULL,
  `tvshow_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`episode_id`),
  KEY `tvshow_id` (`tvshow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`episode_id`, `episode_number`, `season`, `episode_title`, `episode_description`, `episode_link`, `tvshow_id`) VALUES
(1, 1, 1, 'Pilot', 'Walter White, a high school chemistry teacher, is diagnosed with terminal lung cancer. He decides to use his knowledge of chemistry to cook and sell crystal meth in order to provide for his family after he is gone.', 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(2, 2, 1, 'Cat''s in the Bag...', 'Walt and Jesse attempt to dispose of the bodies of Emilio and Krazy-8 after a deal goes wrong. Meanwhile, Skyler grows suspicious of Walt''s behavior.', 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(3, 1, 2, 'Seven Thirty-Seven', 'Walt and Jesse attempt to ramp up their production to meet the demand for their product. Meanwhile, Skyler develops a new interest in Ted Beneke.', 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(4, 2, 2, 'Grilled', 'Walt and Jesse are taken captive by Tuco, a violent drug dealer. Meanwhile, Hank visits the Mexican border to investigate a drug cartel.', 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(5, 1, 3, 'No Mas', 'Walt attempts to leave the drug business behind, but finds it harder than he thought. Meanwhile, Hank investigates a murder and discovers a link to Walt.', 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(6, 2, 3, 'Full Measure', 'Walt and Jesse must make a difficult decision when their business partner, Gus Fring, makes them an offer they can''t refuse. Meanwhile, Hank gets closer to uncovering the truth about Walt.', 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(7, 1, 1, 'Winter Is Coming', 'Jon Arryn, the Hand of the King, is dead. King Robert Baratheon plans to ask his oldest friend, Eddard Stark, to take Jon''s place. Across the sea, Viserys Targaryen plans to wed his sister to a nomadic warlord in exchange for an army.', 'https://www.youtube.com/embed/bjqEWgDVPe0', 2),
(8, 2, 1, 'The Kingsroad', 'While Bran recovers from his fall, Ned takes only his daughters to Kings Landing. Jon Snow goes with his uncle Benjen to The Wall. Tyrion joins them.', 'https://www.youtube.com/embed/bjqEWgDVPe0', 2),
(9, 1, 2, 'The North Remembers', 'Robb Stark, King of the North, meets Talisa Maegyr, a healer from Volantis. Jon Snow is brought before Mance Rayder, the King Beyond the Wall, while the Night''s Watch survivors retreat south. Tyrion Lannister arrives in King''s Landing to take his father''s place as Hand of the King.', 'https://www.youtube.com/embed/bjqEWgDVPe0', 2),
(10, 2, 2, 'The Night Lands', 'Arya makes friends with Gendry. Tyrion tries to take control of the Small Council. Theon arrives at his home, Pyke, in order to persuade his father into helping Robb with the war. Jon tries to investigate Craster''s secret.', 'https://www.youtube.com/embed/bjqEWgDVPe0', 2),
(11, 1, 3, 'Valar Dohaeris', 'Jon is brought before Mance Rayder, the King Beyond the Wall, while the Night''s Watch survivors retreat south. In King''s Landing, Tyrion asks for his reward. Littlefinger offers Sansa a way out.', 'https://www.youtube.com/embed/bjqEWgDVPe0', 2),
(12, 2, 3, 'Dark Wings, Dark Words', 'Bran and company meet Jojen and Meera Reed. Arya, Gendry, and Hot Pie meet the Brotherhood. Jaime travels through the wilderness with Brienne. Sansa confesses her true feelings about Joffery to Margaery.', 'https://www.youtube.com/embed/bjqEWgDVPe0', 2),
(13, 1, 1, 'Chapter One: The Vanishing of Will Byers', 'On his way home from a friend''s house, young Will sees something terrifying. Nearby, a sinister secret lurks in the depths of a government lab.', 'https://www.youtube.com/embed/mnd7sFt5c3A', 3),
(14, 2, 1, 'Chapter Two: The Weirdo on Maple Street', 'The boys'' search for Will takes them to a familiar location, while Joyce visions a disturbing image.', 'https://www.youtube.com/embed/mnd7sFt5c3A', 3),
(15, 1, 2, 'Chapter One: MADMAX', 'As the town preps for Halloween, a high-scoring rival shakes things up at the arcade, and a skeptical Hopper inspects a field of rotting pumpkins.', 'https://www.youtube.com/embed/mnd7sFt5c3A', 3),
(16, 2, 2, 'Chapter Two: Trick or Treat, Freak', 'After Will sees something terrible on trick-or-treat night, Mike wonders whether Eleven''s still out there. Nancy wrestles with the truth about Barb''s death.', 'https://www.youtube.com/embed/mnd7sFt5c3A', 3),
(17, 1, 3, 'Chapter One: Suzie, Do You Copy?', 'Summer brings new jobs and budding romance. But the mood shifts when Dustin''s radio picks up a Russian broadcast, and Will senses something is wrong.', 'https://www.youtube.com/embed/mnd7sFt5c3A', 3),
(18, 2, 3, 'Chapter Two: The Mall Rats', 'The case of an unknown monster wreaking havoc on a local video store turns into a mystery of international proportions, while Nancy and Jonathan share their suspicions with their allies.', 'https://www.youtube.com/embed/mnd7sFt5c3A', 3),
(19, 1, 1, 'The One Where Monica Gets a Roommate', 'Monica and the gang introduce Rachel to the "real world" after she leaves her fiancé at the altar.', 'https://www.example.com/friends/s1e1', 4),
(20, 2, 1, 'The One with the Sonogram at the End', 'Ross finds out his ex-wife is pregnant. Rachel returns her engagement ring to Barry.', 'https://www.example.com/friends/s1e2', 4),
(21, 1, 2, 'The One with Ross''s New Girlfriend', 'Rachel gets a new job at Fortunata Fashions. Ross has a new girlfriend, Julie.', 'https://www.example.com/friends/s2e1', 4),
(22, 2, 2, 'The One with the Breast Milk', 'Phoebe considers becoming a surrogate mother for her brother and his wife. Joey gets a job at Chandler''s office.', 'https://www.example.com/friends/s2e2', 4),
(23, 1, 3, 'The One with the Princess Leia Fantasy', 'Ross reveals a fantasy to Rachel involving Princess Leia''s gold bikini. Monica tries to get over Richard by using his dirty talk tricks with Chandler.', 'https://www.example.com/friends/s3e1', 4),
(24, 2, 3, 'The One Where No One''s Ready', 'Ross is trying to get everyone ready to go out for his banquet speech while no one is cooperating.', 'https://www.example.com/friends/s3e2', 4),
(25, 1, 1, 'Pilot', 'The employees of Dunder Mifflin are introduced.', 'https://www.example.com/office/s01e01', 5),
(26, 2, 1, 'Diversity Day', 'Michael organizes a seminar on diversity.', 'https://www.example.com/office/s01e02', 5),
(27, 1, 2, 'Casual Friday', 'The employees have to follow a new dress code.', 'https://www.example.com/office/s02e01', 5),
(28, 2, 2, 'The Injury', 'Michael injures his foot and receives special treatment.', 'https://www.example.com/office/s02e02', 5),
(29, 1, 3, 'Gay Witch Hunt', 'Michael accidentally outs an employee.', 'https://www.example.com/office/s03e01', 5),
(30, 2, 3, 'The Convention', 'Michael and Dwight attend a paper convention in Philadelphia.', 'https://www.example.com/office/s03e02', 5),
(31, 1, 1, 'Wolferton Splash', 'A young Princess Elizabeth marries Prince Philip. As King George VI’s health worsens, Winston Churchill is elected prime minister for the second time.', 'episode1_link', 6),
(32, 2, 1, 'Hyde Park Corner', 'With King George VI’s health declining, Elizabeth rushes to Ghana to meet with President Kwame Nkrumah while Philip tries to cover up his affair.', 'episode2_link', 6),
(33, 1, 2, 'Misadventure', 'As Philip leaves for a long tour, Elizabeth makes an upsetting discovery. Prime Minister Eden wants to strike back after Egypt seizes the Suez Canal.', 'episode3_link', 6),
(34, 2, 2, 'A Company of Men', 'Elizabeth feels disconnected from Philip. Eden copes with international pressure and ill health. An interview stirs up harrowing memories for Philip.', 'episode4_link', 6),
(35, 1, 3, 'Beryl', 'With Wilson elected as the new prime minister, Queen Elizabeth must deal with his unconventional demands. Meanwhile, Prince Charles faces a dilemma.', 'episode5_link', 6),
(36, 2, 3, 'Margaretology', 'As the 1960s and ''70s unfold, the royal family contends with conflict and betrayal while striving to uphold tradition in the face of an evolving world.', 'episode6_link', 6),
(37, 1, 1, 'The End''s Beginning', 'Geralt takes on another Witcher''s unfinished business in a kingdom stalked by a ferocious beast. At a brutal cost, Yennefer forges a magical new future.', 'https://www.example.com/episodes/the-witcher/s01e01', 7),
(38, 2, 1, 'Four Marks', 'Bullied and neglected, Yennefer accidentally finds a means of escape. Geralt''s hunt for a so-called devil goes to hell. Ciri seeks safety in numbers.', 'https://www.example.com/episodes/the-witcher/s01e02', 7),
(39, 1, 2, 'What is Lost', 'Geralt''s travels take him to a remote mountain pass where he meets a mysterious warrior woman and confronts an ancient power.', 'https://www.example.com/episodes/the-witcher/s02e01', 7),
(40, 2, 2, 'Kaer Morhen', 'As Ciri finds her footing in her new world, Geralt and his allies search for a lifeline in a place of great magic.', 'https://www.example.com/episodes/the-witcher/s02e02', 7),
(41, 1, 1, 'The End''s Beginning', 'Geralt takes on another Witcher''s unfinished business in a kingdom stalked by a ferocious beast. At a brutal cost, Yennefer forges a magical new future.', 'https://www.example.com/witcher/s1e1', 7),
(42, 2, 1, 'Four Marks', 'Bullied and neglected, Yennefer accidentally finds a means of escape. Geralt''s hunt for a so-called devil goes to hell. Ciri seeks safety in numbers.', 'https://www.example.com/witcher/s1e2', 7),
(43, 1, 2, 'A Grain of Truth', 'With the help of a sorceress, Geralt tries to cure an unusual beast inflicted with a supernatural affliction. Yennefer charms her way into a royal ball.', 'https://www.example.com/witcher/s2e1', 7),
(44, 2, 2, 'Kaer Morhen', 'As Ciri finds her footing in her new surroundings, Geralt and Yennefer explore options on how to best protect her. The Witcher Season 2 Episode 2 is called Kaer Morhen.', 'https://www.example.com/witcher/s2e2', 7),
(45, 1, 3, 'A Winter''s Tale', 'While a cryptic message from Yennefer draws him northwards, Geralt''s past comes back to haunt him. A king''s epic battle sets the stage for an unexpected reunion.', 'https://www.example.com/witcher/s3e1', 7),
(46, 2, 3, 'Lords and Ladies', 'At a brutal cost, Yennefer forges a magical new future. Geralt contends with repercussions of his decisions as he prepares to face the Wild Hunt.', 'https://www.example.com/witcher/s3e2', 7),
(47, 1, 1, 'Chapter 1: The Mandalorian', 'A Mandalorian bounty hunter tracks a target for a well-paying client.', '', 8),
(48, 2, 1, 'Chapter 2: The Child', 'The Mandalorian retrieves an asset for a client, but complications ensue.', '', 8),
(49, 1, 2, 'Chapter 9: The Marshal', 'The Mandalorian helps a remote town rid itself of a Krayt dragon.', '', 8),
(50, 2, 2, 'Chapter 10: The Passenger', 'The Mandalorian transports a passenger with valuable cargo.', '', 8),
(51, 1, 3, 'Chapter 17: The Believer', 'The Mandalorian enlists an old ally to help rescue Grogu.', '', 8),
(52, 2, 3, 'Chapter 18: The Rescue', 'The Mandalorian and his allies attempt a daring rescue of Grogu.', '', 8),
(53, 1, 1, 'Descenso', 'Despite a new extradition treaty, the U.S. puts more money into fighting communism, creating new challenges for Murphy and Peña in the hunt for Pablo.', 'https://www.example.com/narcos/s1e1', 9),
(54, 2, 1, 'The Sword of Simon Bolivar', 'Murphy encounters the depths of government corruption when he and Peña try to derail Escobar''s political ambitions by proving he''s a narco.', 'https://www.example.com/narcos/s1e2', 9),
(55, 1, 2, 'Free at Last', 'Pablo goes into hiding as the political tide turns against him, but he finds a way to strike back. Murphy and Peña finally get the CIA to help them.', 'https://www.example.com/narcos/s2e1', 9),
(56, 2, 2, 'Cambalache', 'The Search Bloc gets a new leader. Javier loses faith in the system. Pablo brings Tata a new business idea. The Cali cartel poses a problem for the Rodriguez brothers.', 'https://www.example.com/narcos/s2e2', 9),
(57, 1, 3, 'The Kingpin Strategy', 'Paranoid about leaks, Miguel cracks down on his security. Pacho makes a decision about his new offer. Peña works on cultivating a witness.', 'https://www.example.com/narcos/s3e1', 9),
(58, 2, 3, 'Follow the Money', 'The Rodriguez brothers go into hiding during negotiations. Pacho meets with the Lord of the Skies in Mexico. Peña''s new DEA team visits Cali.', 'https://www.example.com/narcos/s3e2', 9),
(59, 1, 1, 'The National Anthem', 'Prime Minister Michael Callow faces a shocking dilemma when Princess Susannah, a much-loved member of the Royal Family, is kidnapped.', 'https://www.netflix.com/title/70264888', 10),
(60, 2, 1, 'Fifteen Million Merits', 'After failing to impress the judges on a singing competition show, a woman must either perform degrading acts or return to a slave-like existence.', 'https://www.netflix.com/title/70264888', 10),
(61, 1, 2, 'Be Right Back', 'Martha and Ash are a young couple who move to a remote cottage. The day after the move, Ash is killed, returning the hire van. At the funeral, Martha''s friend Sarah tells her about a new service that lets people stay in touch with the deceased.', 'https://www.netflix.com/title/70264888', 10),
(62, 2, 2, 'White Bear', 'Victoria wakes up and cannot remember anything about her life. Everyone she encounters refuses to communicate with her, and they all sport peculiar white symbols on their clothing.', 'https://www.netflix.com/title/70264888', 10),
(63, 1, 3, 'Nosedive', 'In a future where people rate their experiences on a five-star scale, Lacie Blacker (Bryce Dallas Howard) desperate to join her society''s elite, begins a mad, hapless journey to boost her rating and become a "5-star" member.', 'https://www.netflix.com/title/70264888', 10),
(64, 2, 3, 'Playtest', 'Cooper is a down-on-his-luck American who travels to the UK to get away from his problems. While taking part in a video game "playtest", he experiences strange and increasingly aggressive occurrences in his in-game environment.', 'https://www.netflix.com/title/70264888', 10),
(65, 1, 1, 'The Name of the Game', 'When a supe kills the love of his life, A/V salesman Hughie Campbell teams up with Billy Butcher, a vigilante hell-bent on punishing corrupt supers -- and Hughie''s life will never be the same again.', 'https://example.com/the-boys/s01e01', 11),
(66, 2, 1, 'Cherry', 'The Boys get themselves a Superhero, Starlight gets payback, Homelander gets naughty, and a Senator gets naughtier.', 'https://example.com/the-boys/s01e02', 11),
(67, 1, 2, 'The Big Ride', 'The Boys head to the "Believe" Expo to follow a promising lead in their ongoing war against the Supes. There might -- MIGHT -- be a homicidal infant, but you know what? The Boys have got this.', 'https://example.com/the-boys/s02e01', 11),
(68, 2, 2, 'Proper Preparation and Planning', 'The Boys take to the high seas to safeguard their prisoner. Homelander plays house, then pushes Ryan over the edge. Starlight is forced to make an impossible choice. Stormfront reveals her true character.', 'https://example.com/the-boys/s02e02', 11),
(69, 1, 3, 'Payback', 'The Boys take to the underground to stop the Seven, while Vought/Bought plans another move on the team.', 'https://example.com/the-boys/s03e01', 11),
(70, 2, 3, '???', 'Description for the second episode of Season 3 is not available yet.', 'https://example.com/the-boys/s03e02', 11),
(71, 1, 1, 'Ace Degenerate', 'Thirty years after the 1984 All Valley Karate Tournament, Johnny Lawrence''s life has taken a rocky turn as he tries to forget a past that constantly haunts him. He seeks redemption by reopening the Cobra Kai karate dojo, but the LaRusso-Lawrence rivalry of yesteryear is reignited when their lives become intertwined with the next generation of "karate kids."', 'https://www.example.com/episodes/ace-degenerate', 12),
(72, 2, 1, 'Strike First', 'Daniel tries to strike a shady deal to undermine Johnny''s dojo. Meanwhile, Johnny expands his enrollment ranks in the dojo. Miguel puts his karate practice into reality as Samantha faces rejection in school.', 'https://www.example.com/episodes/strike-first', 12),
(73, 3, 2, 'Fire and Ice', 'Daniel''s business suffers a setback. Johnny tries to recruit more students to join the dojo. Tommy encourages Miguel to face his fears.', 'https://www.example.com/episodes/fire-and-ice', 12),
(74, 4, 2, 'The Moment of Truth', 'The Cobra Kai students prepare for the All Valley Karate Tournament, while Daniel faces a difficult decision regarding his dojo.', 'https://www.example.com/episodes/the-moment-of-truth', 12),
(75, 5, 3, 'Aftermath', 'Johnny seeks forgiveness from his past. Daniel struggles to connect with his new student. Robby revisits his past while Miguel confronts his own.', 'https://www.example.com/episodes/aftermath', 12),
(76, 6, 3, 'King Cobra', 'The highly-anticipated All Valley Karate Tournament brings Johnny and Daniel on opposite sides again. This time, however, the stakes are higher as their dojos compete to prove which martial arts style is superior.', 'https://www.example.com/episodes/king-cobra', 12),
(77, 1, 1, 'From Pole to Pole', 'The first episode explores the Arctic and Antarctic, the greatest and least-known wildernesses of all.', 'https://example.com/planet-earth/s01e01', 13),
(78, 2, 1, 'Mountains', 'This episode journeys to the world''s highest peaks, examining how they were formed and the wildlife that thrives there.', 'https://example.com/planet-earth/s01e02', 13),
(79, 1, 2, 'Jungles', 'This episode explores the world''s richest habitats, revealing the amazing diversity of life they support.', 'https://example.com/planet-earth/s02e01', 13),
(80, 2, 2, 'Deserts', 'The planet''s driest places are home to animals adapted to harsh conditions, from scorpions to nesting birds.', 'https://example.com/planet-earth/s02e02', 13),
(81, 1, 3, 'Fresh Water', 'This episode looks at the world''s rivers, lakes and wetlands, and reveals how creatures have adapted to life in these environments.', 'https://example.com/planet-earth/s03e01', 13),
(82, 2, 3, 'Caves', 'The episode goes underground to explore the world''s deepest caves, home to creatures that have never seen daylight.', 'https://example.com/planet-earth/s03e02', 13),
(83, 1, 1, 'A New Germany', 'A documentary that chronicles Adolf Hitler''s rise, from his earliest beginnings as a struggling artist in Vienna to his suicide in Berlin.', 'https://example.com/episodes/the-world-at-war/s1e1', 14),
(84, 2, 1, 'Distant War', 'The outbreak of World War II in September 1939 finds Neville Chamberlain''s government in a state of paralysis and Winston Churchill a backbencher.', 'https://example.com/episodes/the-world-at-war/s1e2', 14),
(85, 1, 2, 'Barbarossa', 'Barbarossa, the invasion of Russia, is the largest and most costly campaign the world has ever seen.', 'https://example.com/episodes/the-world-at-war/s2e1', 14),
(86, 2, 2, 'Banzai', 'The Pacific theatre of war was one of the most brutal and unforgiving in history.', 'https://example.com/episodes/the-world-at-war/s2e2', 14),
(87, 1, 3, 'Nemesis', 'In this episode, the story of the final year of the war in Europe is told, as Russia advances relentlessly into Germany.', 'https://example.com/episodes/the-world-at-war/s3e1', 14),
(88, 2, 3, 'Pacific', 'This episode deals with the final months of the war in the Pacific, including the dropping of the atomic bombs on Hiroshima and Nagasaki.', 'https://example.com/episodes/the-world-at-war/s3e2', 14),
(89, 1, 1, 'Pilot', 'Newly promoted writer Jane is unsettled when Jacqueline assigns her a big story - writing about why her ex broke up with her. Kat chases a story about outspoken photographer Adena, but is confused by her strong connection to the woman. Meanwhile, Sutton tries not to feel left behind by her best friends as she still toils in the assistant ranks.', 'https://www.example.com/bold-type/s1e1', 15),
(90, 2, 1, 'O Hell No', 'Sutton is flustered when someone at Scarlet has the wrong impression of her professional background. Jane is determined to prove she can have a friends with benefits relationship without feelings getting in the way. And Kat and Adena continue growing closer.', 'https://www.example.com/bold-type/s1e2', 15),
(91, 1, 2, 'Feminist Army', 'Jane balances her fresh responsibilities and writing with her secret sex life. Kat examines boundaries in her life and her photography. Sutton leans into the single life and has a night out with the girls.', 'https://www.example.com/bold-type/s2e1', 15),
(92, 2, 2, 'Rose Colored Glasses', 'Sutton tries to network with a new social circle by attending a high tea. Jane comes to a realization about Pinstripe, and Jacqueline intervenes before she ruins something. And Kat learns that a prominent lesbian bar is closing and makes a bold decision.', 'https://www.example.com/bold-type/s2e2', 15),
(93, 1, 3, 'The New Normal', 'Pinstripe unexpectedly shows up at the Scarlet offices. Sutton struggles with her first day in a new role. Jane tries to put a stop to a potential lawsuit. Kat receives praise for a column she wrote and is asked to speak at a conference.', 'https://www.example.com/bold-type/s3e1', 15),
(94, 2, 3, 'Plus It Up', 'Jane starts her fertility treatments in preparation for freezing her eggs and is assigned an article to write about her experience, but with a very personal twist. Kat learns that a prominent lesbian bar is being closed down and replaced with condos and decides to throw a Queer Prom to fundraise its rescue. Sutton moves in with Richard but struggles to accept his help when Oliver’s mysterious absences force her to put in more hours at work.', 'https://www.example.com/bold-type/s3e2', 15),
(95, 1, 1, 'It Begins', 'Gus and Mickey navigate the exhilarations and humiliations of intimacy, commitment and love at the start of their relationship.', '', 16),
(96, 2, 1, 'One Long Day', 'As Mickey frets over the fallout from their date, a new guest shakes things up at Gus''s movie night jam session.', '', 16),
(97, 1, 2, 'Winners and Losers', 'Mickey and Gus face a whirlwind of new doubts, pitfalls and temptations as they take their relationship to the next level.', '', 16),
(98, 2, 2, 'Shrooms', 'While housesitting at a friend''s mansion, Gus and Mickey host a "Witchita" viewing party that takes an awkward turn.', '', 16),
(99, 1, 3, 'A Taste of Her Own Medicine', 'As Mickey tries to get her life back on track, Gus takes his date with Bertie to hilarious extremes.', '', 16),
(100, 2, 3, 'The End of the Beginning', 'As Gus prepares for his band''s first gig, Mickey tries to help her roommate deal with her breakup woes.', '', 16),
(101, 1, 1, 'Dexter', 'Dexter is a forensics expert by day and serial killer by night. In season 1, he struggles to balance his two identities and evade the Miami Metro Police Department.', 'https://www.example.com/dexter/s1e1', 17),
(102, 2, 1, 'Crocodile', 'Dexter hunts a man who killed three women and their unborn children in a hit-and-run accident. Meanwhile, he tries to keep his relationship with Rita a secret.', 'https://www.example.com/dexter/s1e2', 17),
(103, 1, 2, 'It''s Alive!', 'Dexter tries to find a balance between his family life and his extracurricular activities, while also dealing with the discovery of his brother Brian, who is also a serial killer.', 'https://www.example.com/dexter/s2e1', 17),
(104, 2, 2, 'Waiting to Exhale', 'Dexter tries to dispose of his brother''s body while also evading the FBI, who are hot on his trail. Meanwhile, Rita begins to suspect that Dexter is hiding something.', 'https://www.example.com/dexter/s2e2', 17),
(105, 1, 3, 'Our Father', 'Dexter''s life is further complicated when he becomes a father himself, and he struggles to balance his new role with his homicidal tendencies. Meanwhile, a new serial killer emerges in Miami.', 'https://www.example.com/dexter/s3e1', 17),
(106, 2, 3, 'Finding Freebo', 'Dexter tries to track down a man named Freebo, who he believes is responsible for a murder. However, he soon discovers that Freebo may be innocent, and he must find the real killer before it''s too late.', 'https://www.example.com/dexter/s3e2', 17),
(107, 1, 1, 'Sugarwood', 'Marty makes plans without telling Wendy. Darlene sends a message via Jonah. Wyatt learns the truth about his dad. Ruth realizes Cade must be stopped.', 'https://www.example.com/ozark/s1e1', 18),
(108, 2, 1, 'Blue Cat', 'Marty hires Ruth to pull off a heist. Agent Petty forges a relationship with a member of the Langmore family. Jonah exhibits disturbing behavior.', 'https://www.example.com/ozark/s1e2', 18),
(109, 1, 2, 'Once a Langmore...', 'Darlene makes one too many rash moves. Marty tries to free Rachel from Agent Petty''s grasp. Jonah helps his mom force Wilkes to continue his support.', 'https://www.example.com/ozark/s2e1', 18),
(110, 2, 2, 'The Precious Blood of Jesus', 'Rachel is hard at work on her new project, and Marty is approached by a suspicious security guard. Jonah does his best to help Buddy.', 'https://www.example.com/ozark/s2e2', 18),
(111, 1, 3, 'Kevin Cronin Was Here', 'Marty finds a way to control Ruth. Wendy worms her way into a job. Looking for another business to invest in, Marty digs for info on the strip bar.', 'https://www.example.com/ozark/s3e1', 18),
(112, 2, 3, 'Su Casa Es Mi Casa', 'Maya steps up her bid to turn Marty, whose eerily calm demeanor has Wendy worried. The Byrdes buy a horse farm on behalf of Navarro.', 'https://www.example.com/ozark/s3e2', 18),
(113, 1, 1, 'Pilot', 'The Pearson family''s generational story begins with Jack and Rebecca''s courtship in the late 1970s.', 'https://example.com/this-is-us/s1e1', 19),
(114, 2, 1, 'The Big Three', 'Kate contemplates a big gift for Toby; Jack and Rebecca talk about their future.', 'https://example.com/this-is-us/s1e2', 19),
(115, 1, 2, 'A Manny-Splendored Thing', 'Kate and Toby''s lives take an unexpected turn. Meanwhile, Rebecca encourages Kate''s singing aspirations.', 'https://example.com/this-is-us/s2e1', 19),
(116, 2, 2, 'Still There', 'Randall and Beth adjust to their new normal. Kate and Toby spend time with Toby''s family. Jack and Rebecca take the kids to the mall.', 'https://example.com/this-is-us/s2e2', 19),
(117, 1, 3, 'Nine Bucks', 'Randall, Kate and Kevin find themselves on new paths as they each celebrate their 38th birthdays.', 'https://example.com/this-is-us/s3e1', 19),
(118, 2, 3, 'A Philadelphia Story', 'The Pearsons gather to support Kevin at his movie premiere. The teenage Big Three confront college decisions.', 'https://example.com/this-is-us/s3e2', 19),
(119, 1, 1, 'Steven Sees a Ghost', 'While investigating a ghost story for his latest novel, a skeptical Steven receives a call from his sister that triggers a chain of fateful events.', 'https://www.example.com/episode1', 20),
(120, 2, 1, 'Open Casket', 'A devastating family tragedy stirs memories of traumatic losses, reminding Shirley of her first brush with death -- and awakening long-dormant fears.', 'https://www.example.com/episode2', 20),
(121, 1, 2, 'The Haunting of Bly Manor', 'A chilling ghost story unfolds as the ghostly inhabitants of an isolated English manor house reveal themselves -- and their dark pasts.', 'https://www.example.com/episode3', 20),
(122, 2, 2, 'The Great Good Place', 'Flashing between past and present, a fractured family confronts haunting memories of their old home and the terrifying events that drove them from it.', 'https://www.example.com/episode4', 20),
(123, 1, 3, 'Touch', 'A shocking incident at a wedding procession ignites a series of events entangling the lives of two families in the lawless city of Mirzapur.', 'https://www.example.com/episode5', 20),
(124, 2, 3, 'Guilt Trip', 'Flashbacks reveal haunting memories of Margaret that blur the lines between past and present. Despite her misgivings, Nellie agrees to Luke''s risky plan.', 'https://www.example.com/episode6', 20);

--
-- Triggers `episodes`
--
DROP TRIGGER IF EXISTS `count_episodes`;
DELIMITER //
CREATE TRIGGER `count_episodes` AFTER INSERT ON `episodes`
 FOR EACH ROW BEGIN
    UPDATE tv_show SET number_of_episodes = number_of_episodes + 1 WHERE tvshow_id = NEW.tvshow_id;
END
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`tvshow_id`) REFERENCES `tv_show` (`tvshow_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
