-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2013 at 12:33 PM
-- Server version: 5.5.31-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `refunite`
--
CREATE DATABASE IF NOT EXISTS `refunite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `refunite`;

-- --------------------------------------------------------

--
-- Table structure for table `lost_people`
--

CREATE TABLE IF NOT EXISTS `lost_people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `country_of_origin` varchar(40) NOT NULL,
  `last_sighting` varchar(40) NOT NULL,
  `year_separated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lost_people`
--

INSERT INTO `lost_people` (`id`, `fname`, `midname`, `lname`, `country_of_origin`, `last_sighting`, `year_separated`) VALUES
(1, 'David', 'Bwire', 'Israel', 'Kenya', 'Eldoret', 1990),
(2, 'Josee', 'Guru', 'Developer', 'Somalia', 'Mogadishu', 2000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
