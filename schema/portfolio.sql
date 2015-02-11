-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2015 at 10:42 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tlf` int(12) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txt` text COLLATE utf8_unicode_ci NOT NULL,
  `dato` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `index3` (`dato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='feedback fra brugere' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `tlf`, `title`, `txt`, `dato`) VALUES
(5, 'Daniel Larsen æøå', 'daniellarsen725@hotmail.com', 88888888, 'æøå', 'æøå', '0000-00-00 00:00:00'),
(6, 'Daniel Larsen æøå', 'daniellarsen725@hotmail.com', 0, 'Dette er en test2', 'læp', '0000-00-00 00:00:00'),
(7, 'Daniel Larsen', 'daniellarsen725@yahoo.dk', 0, 'damn', 'Test\r\n', '2015-02-10 16:51:25');

--
-- Triggers `feedback`
--
DROP TRIGGER IF EXISTS `feedback_BEFORE_INSERT`;
DELIMITER //
CREATE TRIGGER `feedback_BEFORE_INSERT` BEFORE INSERT ON `feedback`
 FOR EACH ROW begin SET NEW.dato =  now();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txt` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `newsTitleID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`newsID`),
  UNIQUE KEY `newsID_UNIQUE` (`newsID`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  UNIQUE KEY `img_UNIQUE` (`img`),
  KEY `newsTitleID_INDEX` (`newsTitleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dokumentation og opgaver der er blevet lavet over skoleforløbet med evt. billeder tilhørende' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `title`, `txt`, `img`, `newsTitleID`) VALUES
(5, 'TEsthest1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy. Proin mollis lorem non dolor. In hac habitasse platea dictumst. Nulla ultrices odio. Donec augue. Phasellus dui. Maecenas facilisis nisl vitae nibh. Proin vel est vitae eros pretium dignissim. Aliquam aliquam sodales orci. Suspendisse potenti. Nunc adipiscing euismod arcu. Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. Aliquam elementum imperdiet turpis. In id metus. Mauris eu nisl. Nam pharetra nisi nec enim. Nulla aliquam, tellus sed laoreet blandit, eros urna vehicula lectus, et vulputate mauris arcu ut arcu. Praesent eros metus, accumsan a, malesuada et, commodo vel, nulla. Aliquam sagittis auctor sapien. Morbi a nibh. ', 'SPACE.jpg', 1),
(6, 'TEsthest2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis lectus quis sem lacinia nonummy. Proin mollis lorem non dolor. In hac habitasse platea dictumst. Nulla ultrices odio. Donec augue. Phasellus dui. Maecenas facilisis nisl vitae nibh. Proin vel est vitae eros pretium dignissim. Aliquam aliquam sodales orci. Suspendisse potenti. Nunc adipiscing euismod arcu. Quisque facilisis mattis lacus. Fusce bibendum, velit in venenatis viverra, tellus ligula dignissim felis, quis euismod mauris tellus ut urna. Proin scelerisque. Nulla in mi. Integer ac leo. Nunc urna ligula, gravida a, pretium vitae, bibendum nec, ante. Aliquam ullamcorper iaculis lectus. Sed vel dui. Etiam lacinia risus vitae lacus. Aliquam elementum imperdiet turpis. In id metus. Mauris eu nisl. Nam pharetra nisi nec enim. Nulla aliquam, tellus sed laoreet blandit, eros urna vehicula lectus, et vulputate mauris arcu ut arcu. Praesent eros metus, accumsan a, malesuada et, commodo vel, nulla. Aliquam sagittis auctor sapien. Morbi a nibh. ', 'KITTEH.png', 2),
(8, 'BilledeTest', 'Hyggebillede', 'SPACIOUS.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_title`
--

CREATE TABLE IF NOT EXISTS `news_title` (
  `titleID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`titleID`),
  UNIQUE KEY `titleID_UNIQUE` (`titleID`),
  UNIQUE KEY `title_UNIQUE` (`title`) USING BTREE,
  KEY `title_INDEX` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Titler til opgaver siden, medfølgende dokumentation til opgaver' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news_title`
--

INSERT INTO `news_title` (`titleID`, `title`) VALUES
(3, 'Billeder'),
(1, 'Dokumentation'),
(2, 'Opgaver');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `mail`, `password`, `name`, `active`) VALUES
(1, 'daniellarsen725@hotmail.com', '$2a$08$AUiQpA8VJzEyoNxrzYhTMeFOCnRcYDi7ykJGem7aeVGOYsed6sWve', 'Daniel Larsen', 'Y');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_1` FOREIGN KEY (`newsTitleID`) REFERENCES `news_title` (`titleID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
