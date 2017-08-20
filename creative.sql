-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 07:39 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creative`
--
CREATE DATABASE IF NOT EXISTS `creative` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `creative`;

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `id_statistik` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `os` varchar(30) NOT NULL,
  `browser` varchar(130) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_statistik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `user`, `ip`, `os`, `browser`, `date_create`) VALUES
(11, 'FTTH 1', '192.168.100.52', 'Windows 8', 'Google Chrome v.59.0.3071.115', '2017-08-09 10:37:08'),
(12, 'FTTH 1', '192.168.100.52', 'Windows 8', 'Google Chrome v.59.0.3071.115', '2017-08-09 10:43:32'),
(13, 'FTTH 1', '192.168.100.52', 'Windows 8', 'Google Chrome v.59.0.3071.115', '2017-08-09 10:45:24'),
(14, 'FTTH 2', '192.168.100.52', 'Windows 8', 'Apple Safari v.5.1.7', '2017-08-09 11:17:37'),
(15, 'FTTH 3', '192.168.100.52', 'Windows 8', 'Apple Safari v.5.1.7', '2017-08-09 11:19:40'),
(16, 'FTTH 2', '192.168.100.52', 'Windows 8', 'Apple Safari v.5.1.7', '2017-08-09 11:21:39'),
(17, 'FTTH 3', '192.168.100.52', 'Windows 8', 'Apple Safari v.5.1.7', '2017-08-09 11:22:28'),
(18, 'FTTH 2', '192.168.100.55', 'iPhone', 'Apple Safari v.10.0', '2017-08-09 11:24:00'),
(19, 'FTTH 2', '192.168.100.55', 'iPhone', 'Apple Safari v.10.0', '2017-08-09 11:24:47'),
(20, 'FTTH 3', '192.168.100.55', 'iPhone', 'Apple Safari v.10.0', '2017-08-09 11:26:15'),
(21, 'FTTH 1', '::1', 'Unknown', 'Google Chrome v.60.0.3112.90', '2017-08-15 22:45:25'),
(22, 'FTTH 1', '::1', 'Unknown', 'Google Chrome v.60.0.3112.90', '2017-08-19 00:06:10'),
(23, 'FTTH 1', '192.168.100.25', 'Android', 'Google Chrome v.47.0.2526.83', '2017-08-19 02:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `level_user` varchar(25) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `pass`, `level_user`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin'),
(2, 'FTTH 1', 'ftth1', 'usersatu', 'member'),
(3, 'FTTH 2', 'ftth2', 'userdua', 'member'),
(4, 'FTTH 3', 'ftth3', 'usertiga', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `nama`, `nama_file`, `date_create`) VALUES
(10, '', 'HowMicroprocessorsWork_1.MP4', '2017-08-09 17:45:45'),
(11, 'Fast & Furious 7', 'ff7.mkv', '2017-08-09 17:47:02'),
(12, 'Ada Apa Dengan Cinta 2', 'aadc2.mp4', '2017-08-09 17:47:08'),
(13, 'Doraemon Stand By Me', 'doraemon.mp4', '2017-08-09 18:24:19'),
(14, 'Crows Zero 1', 'crow.mkv', '2017-08-19 00:50:24'),
(23, 'asddasd', 'HowMicroprocessorsWork_1.mp4', '2017-08-20 05:08:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
