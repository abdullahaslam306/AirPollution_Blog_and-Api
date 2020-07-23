-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 04:34 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`username`, `email`, `msg`) VALUES
('Abdullah', 'abdullahaslam306@gmail.com', 'hi testing			'),
('Kendel', 'abcd@xyz.com', 'Hi testing contact us form					\r\n				');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pasword` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `postaladdress` varchar(80) DEFAULT NULL,
  `postalcode` varchar(5) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `username`, `pasword`, `firstname`, `lastname`, `dob`, `email`, `postaladdress`, `postalcode`, `country`) VALUES
(2, 'flyingfish', 'waoyh.jFbxUSY', 'Abdullah', 'COLLEGE', '2020-01-02', 'abdullahaslam306@gmail.com', 'smakdm, snald', '1234', 'antigua'),
(3, 'Abdullah', 'waS7SSGwZfMv.', 'Abdullah', 'Aslam', '2020-02-01', 'abdullahaslam306@gmail.com', 'AL MASOOM TOWN', '38000', 'antigua'),
(4, 'Abdullah306', 'wapDdaY8bxbdA', 'STUDENTS', 'COLLEGE', '2020-01-01', 'abdullahaslam306@gmail.com', '98/a people colony #1', '38000', 'antigua'),
(5, 'Kendall', 'wapDdaY8bxbdA', 'Kendall', 'Maraj', '2020-01-01', 'abcd306@gmail.com', 'P-312 RAJA PARK', '36050', 'antigua');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `heading` varchar(100) NOT NULL,
  `video` varchar(300) NOT NULL,
  `dataa` varchar(1000) NOT NULL,
  `afterread` varchar(1000) NOT NULL,
  `fb` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `linked` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`heading`, `video`, `dataa`, `afterread`, `fb`, `twitter`, `linked`) VALUES
('Air Pollution', 'vd1.mp4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/', 'https://twitter.com/', 'https://pk.linkedin.com/');

-- --------------------------------------------------------

--
-- Table structure for table `memberactivities`
--

CREATE TABLE `memberactivities` (
  `aid` int(11) NOT NULL,
  `activitytype` varchar(30) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberactivities`
--

INSERT INTO `memberactivities` (`aid`, `activitytype`, `category`) VALUES
(1, 'Clean-up Drives', 'Monthly Events'),
(2, 'Volunteering Opportunities', 'Daily Events'),
(3, 'Fund Raisers', 'Bi-annual Events');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `postdate` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `username`, `category`, `message`, `postdate`) VALUES
(1, 'admin', 'Monthly Events', 'm,mm', '2020-02-04 11:03:15'),
(2, 'admin', 'Monthly Events', 'jkkhhh', '2020-02-04 11:03:50'),
(3, 'Abdullah306', 'Monthly Events', 'asdsfaaf', '2020-02-04 11:32:17'),
(4, 'Abdullah306', 'Monthly Events', 'wdkqnjjjjjjjjjjjjjjjnqscncklnqclcq\r\n', '2020-02-04 12:51:09'),
(5, 'Abdullah306', 'Daily Events', 'My namem is Abd', '2020-02-08 06:52:46'),
(6, 'Abdullah306', 'Daily Events', 'asdaaaaaaaa', '2020-02-08 07:06:18'),
(8, 'Kendall', 'Monthly Events', 'Hi testing Monthely eventsss', '2020-02-10 10:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `pid` int(11) NOT NULL,
  `item` varchar(20) DEFAULT NULL,
  `purchaseamt` double DEFAULT NULL,
  `cid` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`,`username`);

--
-- Indexes for table `memberactivities`
--
ALTER TABLE `memberactivities`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `memberactivities`
--
ALTER TABLE `memberactivities`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
