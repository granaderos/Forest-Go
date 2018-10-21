-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2016 at 12:21 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forestgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentId` int(11) NOT NULL,
  `dataId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `dataId`, `userId`, `comment`) VALUES
(1, NULL, 2, ''),
(2, 1, 2, ''),
(3, 1, 2, 'They!!!!'),
(4, 1, 2, 'Image will be updated soom.'),
(5, 1, 2, 'Soon I mean!'),
(6, 1, 2, 'hjasgdhjsdkas'),
(7, 1, 2, 'hjasgdhjsdkashahahahha'),
(8, 1, 2, 'pogi ko haha'),
(9, 1, 12, 'This is me Really'),
(10, 1, 12, 'Ha ha'),
(11, 1, 12, 'What?'),
(12, 5, 12, 'This'),
(13, 7, 12, 'hahahhaa'),
(14, 8, 12, 'ahhahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `dataId` int(11) NOT NULL,
  `forestId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`dataId`, `forestId`, `userId`, `title`, `description`, `photo`, `dateAdded`, `status`) VALUES
(2, 1, 2, 'Another Post For Testing', 'Another Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For TestingAnother Post For Testing', '1328305023.JPG', '2016-08-27', 0),
(3, 1, NULL, 'fore testing', 'kjkj', '1123774967.JPG', '2016-08-27', 0),
(4, 1, 2, 'fore ted', 'hjkhjkh hjhjh', '104653292.JPG', '2016-08-27', 1),
(7, 1, 12, 'Hackathon', 'Inaantok nko', '657912903.JPG', '2016-08-27', 0),
(8, 1, 12, 'What?', 'Almost done! Wanna sleep me.', '489744702.png', '2016-08-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `flupcoins`
--

CREATE TABLE IF NOT EXISTS `flupcoins` (
  `flupId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `coins` int(11) DEFAULT NULL,
  `equivalent` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flupcoins`
--

INSERT INTO `flupcoins` (`flupId`, `userId`, `coins`, `equivalent`) VALUES
(1, 11, 0, 0),
(2, 12, 0, 0),
(3, 13, 0, 0),
(4, 14, 0, 0),
(5, 15, 0, 0),
(6, 16, 0, 0),
(7, 17, 0, 0),
(8, 18, 0, 0),
(9, 19, 0, 0),
(10, 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forests`
--

CREATE TABLE IF NOT EXISTS `forests` (
  `forestId` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forests`
--

INSERT INTO `forests` (`forestId`, `name`, `location`, `province`, `region`, `area`) VALUES
(1, 'Abasig-Matogdon-Mananap Watershed Forest Reserve', 'Labo, San Lorenzo Ruiz and San Vicente', 'Camarines Norte', 'R 5', '5, 545'),
(2, 'Abulug River forest Reserve', 'Calanasan, Kabugao, Pudtol, Flora, Conner, Abulug', 'Apayao and Cagayan', 'CAR', '195,659'),
(3, 'Adlay Watershed forest Reserve', 'Carrascal', 'Surigao del Sur', 'R 13', '27'),
(4, 'Aklan River Watershed forest Reserve ', 'Madalag and Libucao ', 'Aklan', 'R 6', '23,185 '),
(5, 'Alabat Watershed forest Reserve', 'Alabat', 'Quezon', 'R 4A', '688'),
(6, 'Alamio River Watershed', 'Cantilan', 'Surigao del Sur', 'R 13', '5,085'),
(7, 'Alfred Spring Watershed forest Reserve', 'Bunawan', 'Agusan del Sur', 'R 13', '100'),
(8, 'Alijawan-Cansujay-Anibongan River Watershed forest Reserve', 'Duero, Jagna', 'Bohol', 'R7', '3,630'),
(9, 'Allah Watershed forest Reserve', 'Isulan, Banga, Surallah, Kiamba', 'South Cotabato', 'R 12', '92,450'),
(10, 'Ambayawan River forest Reserve', 'Pangasinan', 'Pangasinan', 'R 1', '33,688'),
(11, 'Ambogoc Watershed forest Reserve', 'Dapitan City', 'Zamboanga del Norte', 'R 9', '176');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `likeId` int(11) NOT NULL,
  `dataId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeId`, `dataId`, `userId`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2),
(5, 1, 12),
(6, 1, 12),
(7, 5, 12),
(8, 5, 12),
(9, 5, 12),
(10, 5, 12),
(11, 5, 12),
(12, 5, 12),
(13, 5, 12),
(14, 5, 12),
(15, 5, 12),
(16, 7, 12),
(17, 7, 12),
(18, 7, 12),
(19, 7, 12),
(20, 7, 12),
(21, 7, 12),
(22, 7, 12),
(23, 7, 12),
(24, 7, 12),
(25, 7, 12),
(26, 7, 12),
(27, 7, 12),
(28, 7, 12),
(29, 7, 12),
(30, 7, 12),
(31, 7, 12),
(32, 7, 12),
(33, 7, 12),
(34, 7, 12),
(35, 7, 12),
(36, 7, 12),
(37, 7, 12),
(38, 7, 12),
(39, 7, 12),
(40, 8, 12),
(41, 8, 12),
(42, 8, 12),
(43, 8, 12),
(44, 8, 12),
(45, 8, 12),
(46, 8, 12),
(47, 8, 12),
(48, 8, 12),
(49, 8, 12),
(50, 8, 12),
(51, 8, 12),
(52, 8, 12),
(53, 8, 12),
(54, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`) VALUES
(11, 'Anj', 'Anj', 'Anj', '*DBE46ABB057770C5D17DF71259F915A3A157BF46'),
(12, 'alex', 'alex', 'alex', '*8258F2618980E77E5220ECD738182656223809C1'),
(13, 'me', 'me', 'me', '*363DEFBA9260F526CC56DEE2DF67578A9B8387A5'),
(14, 'po', 'po', 'po', '*94FA279529E22CB1388896BC8767356EEFAE0AD3'),
(15, 'lo', 'lo', 'lo', '*939E34565547D497800D3BB0BB27E46EE7FFBF25'),
(16, 'ml', 'ml', 'ml', '*8C57502841C21D59B86DA5EB73116C86093064FE'),
(17, 'mk', 'mk', 'mk', '*974E783E6D2A7DE8DAF728309C8B5A505CEFCFD9'),
(18, 'l', 'l', 'l', '*894549142A2819BC7952B608F00C489C989212E8'),
(19, 'p', 'p', 'p', '*7B9EBEED26AA52ED10C0F549FA863F13C39E0209'),
(20, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`dataId`);

--
-- Indexes for table `flupcoins`
--
ALTER TABLE `flupcoins`
  ADD PRIMARY KEY (`flupId`);

--
-- Indexes for table `forests`
--
ALTER TABLE `forests`
  ADD PRIMARY KEY (`forestId`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `dataId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `flupcoins`
--
ALTER TABLE `flupcoins`
  MODIFY `flupId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `forests`
--
ALTER TABLE `forests`
  MODIFY `forestId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
