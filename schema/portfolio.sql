-- phpMyAdmin SQL Dump
-- version 4.2.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2015 at 07:20 AM
-- Server version: 10.1.0-MariaDB
-- PHP Version: 5.6.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(10) unsigned NOT NULL,
  `fullname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email er påkrævet, fordi vi gerne vil kunne have mulighed for at skrive tilbage, til folk.',
  `tlf` int(12) DEFAULT NULL COMMENT 'telefonnummer.\n\nIkke et krav',
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Overskrift',
  `txt` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Beskrivelse af ros/problem',
  `dato` datetime DEFAULT NULL COMMENT 'Hvornår beskeden blev sat ind',
  `status` char(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'Y eller N.\n\nchecker om beskeden er blevet set.',
  `deletedato` datetime DEFAULT NULL COMMENT 'Hvornår beskeden skal slette.\nNULL for ikke at slette beskeden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='feedback fra brugere';

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `tlf`, `title`, `txt`, `dato`, `status`, `deletedato`) VALUES
(5, 'Daniel Larsen æøå', 'daniellarsen725@hotmail.com', 88888888, 'Dis is a headline', 'Det gør heller ikke mere. Men hvor vi nu overbringer denne størrelse til det den handler om, så kan der fortælles op til 3 gange. Hvis det er træet til dit bord der får dig op, er det snarere varmen over de andre. Selv om hun har sat alt mere frem, og derfor ikke længere kan betragtes som den glade giver, er det en nem sammenstilling, som bærer ved i lang tid. Det går der så nogle timer ud, hvor det er indlysende, at virkeligheden bliver tydelig istandsættelse. Det er opmuntrende og anderledes, at det er dampet af kurset i morgen. Der indgives hvert år enorme strenge af blade af større eller mindre tilsnit.', '2015-02-19 10:27:03', 'N', NULL),
(6, 'Daniel Larsen æøå', 'daniellarsen725@hotmail.com', 0, 'Dette er en test2', 'Det gør heller ikke mere. Men hvor vi nu overbringer denne størrelse til det den handler om, så kan der fortælles op til 3 gange. Hvis det er træet til dit bord der får dig op, er det snarere varmen over de andre. Selv om hun har sat alt mere frem, og derfor ikke længere kan betragtes som den glade giver, er det en nem sammenstilling, som bærer ved i lang tid. Det går der så nogle timer ud, hvor det er indlysende, at virkeligheden bliver tydelig istandsættelse. Det er opmuntrende og anderledes, at det er dampet af kurset i morgen. Der indgives hvert år enorme strenge af blade af større eller mindre tilsnit.', '2015-02-19 10:27:03', 'N', '2015-02-20 00:00:00'),
(7, 'Daniel Larsen', 'daniellarsen725@yahoo.dk', 0, 'Dette er også en overskrift', 'Det gør heller ikke mere. Men hvor vi nu overbringer denne størrelse til det den handler om, så kan der fortælles op til 3 gange. Hvis det er træet til dit bord der får dig op, er det snarere varmen over de andre. Selv om hun har sat alt mere frem, og derfor ikke længere kan betragtes som den glade giver, er det en nem sammenstilling, som bærer ved i lang tid. Det går der så nogle timer ud, hvor det er indlysende, at virkeligheden bliver tydelig istandsættelse. Det er opmuntrende og anderledes, at det er dampet af kurset i morgen. Der indgives hvert år enorme strenge af blade af større eller mindre tilsnit.', '2015-02-19 10:27:03', 'N', NULL),
(8, 'Karlsson', 'test@test.com', 88888888, 'Dette er en overskrift', 'Masser af tekst\r\n', '2015-02-19 10:27:03', 'N', NULL);

--
-- Triggers `feedback`
--
DELIMITER //
CREATE TRIGGER `feedback_BEFORE_INSERT` BEFORE INSERT ON `feedback`
 FOR EACH ROW begin SET NEW.dato =  now();
    SET NEW.status = 'N';
    
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txt` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pageTitleID` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dokumentation og opgaver der er blevet lavet over skoleforløbet med evt. billeder tilhørende';

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `title`, `txt`, `img`, `pageTitleID`) VALUES
(5, 'TEsthest1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy. Proin mollis lorem non dolor. In hac habitasse platea dictumst. Nulla ultrices odio. Donec augue. Phasellus dui. Maecenas facilisis nisl vitae nibh. Proin vel est vitae eros pretium dignissim. Aliquam aliquam sodales orci. Suspendisse potenti. Nunc adipiscing euismod arcu. Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. Aliquam elementum imperdiet turpis. In id metus. Mauris eu nisl. Nam pharetra nisi nec enim. Nulla aliquam, tellus sed laoreet blandit, eros urna vehicula lectus, et vulputate mauris arcu ut arcu. Praesent eros metus, accumsan a, malesuada et, commodo vel, nulla. Aliquam sagittis auctor sapien. Morbi a nibh. ', 'SPACE.jpg', 1),
(6, 'TEsthest2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy. Proin mollis lorem non dolor. In hac habitasse platea dictumst. Nulla ultrices odio. Donec augue. Phasellus dui. Maecenas facilisis nisl vitae nibh. Proin vel est vitae eros pretium dignissim. Aliquam aliquam sodales orci. Suspendisse potenti. Nunc adipiscing euismod arcu. Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. Aliquam elementum imperdiet turpis. In id metus. Mauris eu nisl. Nam pharetra nisi nec enim. Nulla aliquam, tellus sed laoreet blandit, eros urna vehicula lectus, et vulputate mauris arcu ut arcu. Praesent eros metus, accumsan a, malesuada et, commodo vel, nulla. Aliquam sagittis auctor sapien. Morbi a nibh. ', 'KITTEH.png', 2),
(8, 'BilledeTest', 'Hyggebillede', 'SPACIOUS.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `page_title`
--

CREATE TABLE IF NOT EXISTS `page_title` (
`titleID` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `page` char(1) COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'Er det en side, eller tilhører det nyhedsindlægget'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Titler til opgaver siden, medfølgende dokumentation til opgaver';

--
-- Dumping data for table `page_title`
--

INSERT INTO `page_title` (`titleID`, `title`, `page`) VALUES
(1, 'Opgaver', 'N'),
(2, 'Dokumentation', 'N'),
(3, 'Billeder', 'N'),
(4, 'Om mig', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `responsemail`
--

CREATE TABLE IF NOT EXISTS `responsemail` (
  `id` int(10) unsigned NOT NULL COMMENT 'Sendte beskeder til folk, som brugte tid på, at give feedback til siden.',
  `fullname` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `txt` text COLLATE utf8_unicode_ci NOT NULL,
  `dato` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL,
  `mail` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `mail`, `password`, `name`, `active`) VALUES
(1, 'example@example.com', '$2a$08$AUiQpA8VJzEyoNxrzYhTMeFOCnRcYDi7ykJGem7aeVGOYsed6sWve', 'Daniel Larsen', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `dato_INDEX` (`dato`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`pageID`), ADD UNIQUE KEY `newsID_UNIQUE` (`pageID`), ADD UNIQUE KEY `title_UNIQUE` (`title`), ADD UNIQUE KEY `img_UNIQUE` (`img`), ADD KEY `newsTitleID_INDEX` (`pageTitleID`);

--
-- Indexes for table `page_title`
--
ALTER TABLE `page_title`
 ADD PRIMARY KEY (`titleID`), ADD UNIQUE KEY `titleID_UNIQUE` (`titleID`), ADD UNIQUE KEY `title_UNIQUE` (`title`) USING BTREE, ADD KEY `title_INDEX` (`title`);

--
-- Indexes for table `responsemail`
--
ALTER TABLE `responsemail`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `email_INDEX` (`email`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mail_UNIQUE` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_title`
--
ALTER TABLE `page_title`
MODIFY `titleID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
ADD CONSTRAINT `fk_news_1` FOREIGN KEY (`pageTitleID`) REFERENCES `page_title` (`titleID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
