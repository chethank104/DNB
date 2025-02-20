-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 02:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalnbnew_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tab`
--

CREATE TABLE `admin_tab` (
  `aid` int(11) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `upass` varchar(15) NOT NULL,
  `utype` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tab`
--

INSERT INTO `admin_tab` (`aid`, `uname`, `upass`, `utype`, `username`) VALUES
(1, 'admin', 'admin', 1, 'NAME1'),
(2, 'r123', 'r123', 2, 'NAME2'),
(3, 'g123', 'g123321', 2, 'NAME3SOMETHING'),
(4, 'M123', 'M123', 2, 'NAMENEWNAME');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_tab`
--

CREATE TABLE `candidate_tab` (
  `candid` int(11) NOT NULL,
  `candusn` varchar(12) NOT NULL,
  `candname` varchar(60) NOT NULL,
  `candbatch` varchar(12) NOT NULL,
  `candpicfile` varchar(20) NOT NULL,
  `candbdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news_tab`
--

CREATE TABLE `news_tab` (
  `nid` int(11) NOT NULL,
  `nphotofilename` varchar(60) NOT NULL,
  `datetodisplay` date NOT NULL,
  `datetilldisplay` date NOT NULL,
  `dateuploaded` date NOT NULL,
  `typenews` int(11) NOT NULL,
  `nnews` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_tab`
--

INSERT INTO `news_tab` (`nid`, `nphotofilename`, `datetodisplay`, `datetilldisplay`, `dateuploaded`, `typenews`, `nnews`) VALUES
(1, '', '2022-07-30', '2022-07-31', '2022-07-30', 1, ' This is sample horizontal news'),
(2, '', '2022-07-29', '2022-08-01', '2022-07-31', 1, ' monday class are suspended'),
(3, 'images/dishitha.jpg', '2022-07-29', '2022-08-01', '2022-07-31', 3, ''),
(4, '', '2022-07-30', '2022-07-31', '2022-07-31', 2, ' hh hh l; kl ljljl k kl lk lkj '),
(5, '', '2022-08-05', '2022-08-10', '2022-08-06', 1, ' this is one of my news  this is one of my news  this is one of my news  this is one of my news  this is one of my news  this is one of my news  this is one of my news '),
(6, '', '2022-08-05', '2022-08-08', '2022-08-06', 1, ' Hello'),
(7, '', '2022-08-06', '2022-08-09', '2022-08-07', 2, ' this is testing news  this is testing news  this is testing news  this is testing news '),
(8, 'images/logo.jpg', '2022-08-05', '2022-08-09', '2022-08-07', 3, ''),
(9, 'images/bihe.jpg', '2022-08-05', '2022-08-09', '2022-08-07', 3, ''),
(10, 'images/maxresdefault.jpg', '2022-08-05', '2022-08-09', '2022-08-07', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tab`
--
ALTER TABLE `admin_tab`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `candidate_tab`
--
ALTER TABLE `candidate_tab`
  ADD PRIMARY KEY (`candid`);

--
-- Indexes for table `news_tab`
--
ALTER TABLE `news_tab`
  ADD PRIMARY KEY (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tab`
--
ALTER TABLE `admin_tab`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_tab`
--
ALTER TABLE `candidate_tab`
  MODIFY `candid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `news_tab`
--
ALTER TABLE `news_tab`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
