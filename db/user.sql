-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2016 at 03:24 PM
-- Server version: 5.5.53-0+deb7u1-log
-- PHP Version: 5.3.3-7+squeeze29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `second_name`, `e_mail`) VALUES
(14, 'John', 'Doe', 'john@mail.com'),
(27, 'Joe', 'Shmoe', 'joe@gmail.com'),
(28, 'Peter', 'Parker', 'peter@mail.ru'),
(29, 'Tom', 'Raider', 'tom_raider@mail.ru'),
(30, 'Melisa', 'Raider', 'mel_raider@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
