-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 12:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pid` int(11) NOT NULL,
  `date_of_pub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_name` varchar(40) CHARACTER SET utf16 COLLATE utf16_croatian_ci NOT NULL,
  `p_dir` varchar(100) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `type` enum('public','private') NOT NULL DEFAULT 'public',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pid`, `date_of_pub`, `p_name`, `p_dir`, `description`, `type`, `uid`) VALUES
(53, '2016-11-26 14:09:52', 'gnaric selfi', 'gnaric selfi.jpg', 'hehehehehehe', 'private', 1),
(56, '2016-11-26 19:44:13', 'gnaric', 'gnaric.jpg', 'lolololo', 'private', 1),
(58, '2016-11-26 20:49:49', 'mega gnar', 'mega gnar.jpg', 'lelelelelle', 'private', 2),
(65, '2016-11-27 02:16:23', 'gnarnananna', 'gnarnananna.jpg', 'lallalalaretregeaefreg bgfb', 'private', 1),
(68, '2016-11-27 23:18:59', 'nananan slika', 'nananan slika.jpg', 'lalallallalalall allalla lalala lalalala laal', 'public', 2),
(69, '2016-11-27 23:53:37', 'jahskjadh', 'jahskjadh.jpg', 'jdaslkd ndlksandlk dlskdjl djaslkdaj', 'public', 1),
(70, '2016-11-27 23:55:43', 'slika slika', 'slika slika.jpg', 'lalalalalal nanann na', 'public', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
