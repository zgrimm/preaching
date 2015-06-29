-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 06:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `preach`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Url` varchar(150) NOT NULL,
  `YtId` varchar(50) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Vid1` varchar(50) NOT NULL,
  `Vid2` varchar(50) NOT NULL,
  `Vid3` varchar(50) NOT NULL,
  `imgUrl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `Title`, `Url`, `YtId`, `Description`, `Vid1`, `Vid2`, `Vid3`, `imgUrl`) VALUES
(1, 'Amazing Animal Relationships', 'amazing-animal-relationships', 'CRldCVq0k7U', 'Amazing animal relationships show us what we are doing wrong with our lives.', 'wfwf', 'wfwf', 'wfwf', 'friends.jpg'),
(2, 'Incredible Animal Hybrids', 'incredible-animal-hybrids', 'aMXuJuFg3pY', 'These are some of the most amazing hybrid animals you can find!', 'wfwef', 'wfwf', 'wfwf', 'Horse.jpg'),
(3, '5 HUGE Crocs', '5-huge-crocs', '7IYMK22QCMA', 'These crocs are Huuuuge!', 'eeee', 'cccc', 'eeee', 'croc.jpg'),
(4, 'Cute Baby Goats Compilation', 'cute-baby-goats', 'QL6Ws4i07is', 'Cute ass baby goats jumping around and having a great time!', 'dfjdn', 'knfksdnf', 'kndwkndf', 'goat.jpg'),
(5, 'Cute Babeh Pigs', 'cute-babeh-pigs', 'U_4XWcDSR8w', 'The cuter they are, the tastier the bacon. (No piglets were harmed yada yada...)', 'aa', 'aa', 'aa', 'pig.jpg'),
(6, 'World''s Smartest Animals', 'worlds-smartest-animals', 'VmCc40RmQKs', 'These animals might be smarter than you', 'ddf', 'fdf', 'sfsf', 'squirrel.jpg'),
(7, 'Venomous Snakes', 'venomous-snakes', 'zQtu_3DO314', 'Deadly and beautiful snakes', 'jknjkn', 'jknkn', 'knkn', 'snake.jpg'),
(8, '10 Most Colorful Creatures', '10-most-colorful-creatures', 'J11uu8L8FTY', 'These colors are so vibrant youll shit', 'scsc', 'scsc', 'scsc', 'chameleon.jpg'),
(9, 'Beautiful Animals', 'beautiful-animals', 'o00kEZpnMnQ', 'Some of the most gorgeous creatures on the planet', 'sdsd', 'sdsd', 'sdsd', 'bear.jpg'),
(10, 'Happy Cows', 'happy-cows', 'onWzeDElz6w', 'Happy Cows make tasty cheese', 'ddv', 'dvdvd', 'dvdv', 'cow.jpg'),
(11, 'Gorillas', 'gorillas', 'vo9KLep4WqM', 'So much like us', 'sdfbsdfb', 'sgnsgn', 'sgnbsgdbn', 'gorilla.jpg'),
(12, 'This Bear Exists', 'this-bear-exists', 'jqKPswqyPrc', 'This bear is more coordinated than the average person', 'dvdv', 'dvdv', 'dvdvd', 'bear2.jpg'),
(13, 'Amazing Insects', 'amazing-insects', 'TEvtMuQWwkk', 'Look at these fucking things', 'tt', 'tt', 'tt', 'bug.jpg'),
(14, 'Dolphin', 'dolphin', 'fB3FT3t6_sE', 'Dolphins yo', 'ss', 'ss', 'ss', 'dolphins.jpg'),
(15, 'Jumpy The Dog', 'jumpy-the-dog', '5I_QzPLEjM4', 'Incredible dog tricks', 'ss', 'ssss', 'ss3', 'jumpy.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
