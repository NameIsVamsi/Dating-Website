-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2020 at 04:21 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21
-- *IMP* Couldn't provide the insert statements for profiles table as it holds images as a blob datatype

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wink`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE IF NOT EXISTS `favourites` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `favusername` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sendername` varchar(200) NOT NULL,
  `receivername` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sendername`, `receivername`, `status`) VALUES
(6, 'NameIsVamc', 'ashley', 'removed');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(200) NOT NULL,
  `sendername` varchar(200) NOT NULL,
  `receivername` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `msg`, `sendername`, `receivername`, `date`) VALUES
(41, 'Hello', 'NameIsVamc', '', '2020-10-12 03:42:46'),
(40, 'Hello\r\n', 'NameIsVamsi', '', '2020-10-12 03:41:32'),
(39, 'Hey', 'NameIsVamsi', '', '2020-10-12 03:41:27'),
(38, '', 'NameIsVamsi', 'ashley', '2020-10-12 03:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `image` longblob,
  `work` varchar(200) DEFAULT NULL,
  `interests` varchar(200) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `premium` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `premium`) VALUES
(21, 'NameIsVamsi', 'vamsi.pinniboina@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'no'),
(22, 'NameIsVamc', '123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'yes'),
(23, 'ashley', 'ashley@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', 'no'),
(24, 'katelyn', 'katelyn@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `winkdata`
--

DROP TABLE IF EXISTS `winkdata`;
CREATE TABLE IF NOT EXISTS `winkdata` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sendername` varchar(200) NOT NULL,
  `receivername` varchar(200) NOT NULL,
  `description` varchar(50) NOT NULL DEFAULT 'Winked At',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winkdata`
--

INSERT INTO `winkdata` (`id`, `sendername`, `receivername`, `description`, `date`) VALUES
(10, 'NameIsVamc', 'NameIsVamc', 'Winked At', '2020-10-12 03:42:55'),
(9, 'NameIsVamsi', 'NameIsVamc', 'Winked At', '2020-10-12 03:41:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
