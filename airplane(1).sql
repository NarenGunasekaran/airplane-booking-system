-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2015 at 03:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airplane`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
`id` int(10) NOT NULL,
  `flight_no` varchar(30) NOT NULL,
  `airline_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `flight_no`, `airline_name`) VALUES
(1, '', 'Kingfisher'),
(2, '', 'Jet Airways'),
(3, '', 'Indian Airlines'),
(4, '', 'Spice Jet'),
(5, '', 'Air India'),
(6, '', 'Fly Smart'),
(7, '', 'Air Asia'),
(8, '', 'Air India Express'),
(9, '', 'vistara'),
(10, '', 'jet konnect'),
(11, '', 'trujet'),
(12, '', 'air costa'),
(13, '', 'deccan shuttles'),
(14, '', 'indigo airlines'),
(15, '', 'jetlite');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`id` int(10) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pin` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `card_no`, `cvv`, `name`, `pin`) VALUES
(1, '9626', '958', 'PRABAL MAHATO', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`id` int(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `airline` varchar(50) NOT NULL,
  `flight_no` varchar(40) NOT NULL,
  `from_city` varchar(30) NOT NULL,
  `to_city` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `dep` varchar(30) NOT NULL,
  `travel_date` varchar(30) NOT NULL,
  `passenger` varchar(40) NOT NULL,
  `food` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `date`, `user_id`, `user`, `email`, `contact`, `airline`, `flight_no`, `from_city`, `to_city`, `arrival`, `dep`, `travel_date`, `passenger`, `food`, `price`, `status`) VALUES
(40, '2015-05-14 03:16:05', 1, 'naren', 'naren@gmail.com', '8888888888', 'Kingfisher', 'KF10', 'chennai', 'bangalore', '1:30am', '2:00am', '20-05-2015', '5', 'Non Veg', '2600', 'n'),
(39, '2015-05-13 12:15:51', 1, 'naren', 'naren@gmail.com', '8888888888', 'Kingfisher', 'KF10', 'chennai', 'bangalore', '1:30am', '2:00am', '23-05-2015', '5', 'Veg', '2600', 'n'),
(38, '2015-05-12 01:41:58', 1, 'naren', 'naren@gmail.com', '8888888888', 'Kingfisher', 'KF10', 'chennai', 'bangalore', '1:30am', '2:00am', '21-05-2015', '3', 'Non Veg', '2600', 't'),
(37, '2015-05-11 02:16:08', 1, 'naren', 'naren@gmail.com', '8888888888', 'Kingfisher', 'KF10', 'chennai', 'bangalore', '1:30am', '2:00am', '23-05-2015', '7', 'Non Veg', '2600', 't');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(10) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(6, 'chennai'),
(5, 'bangalore'),
(7, 'mumbai'),
(14, 'hydrabad'),
(9, 'mysore'),
(10, 'pondichery'),
(11, 'goa'),
(13, 'cochin');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
`id` int(10) NOT NULL,
  `airline` varchar(100) NOT NULL,
  `flight_number` varchar(30) NOT NULL,
  `from_city` varchar(50) NOT NULL,
  `to_city` varchar(50) NOT NULL,
  `arival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `seats` varchar(40) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `airline`, `flight_number`, `from_city`, `to_city`, `arival`, `departure`, `seats`, `price`) VALUES
(5, 'Kingfisher', 'KF10', 'chennai', 'bangalore', '1:30am', '2:00am', '50', '2600'),
(6, 'Jet Airways', 'JT01', 'mumbai', 'bangalore', '2:00am', '4:00am', '45', '2500'),
(7, '', 'IA09', 'hydrabad', 'bangalore', '3:30am', '4:00am', '50', '2200'),
(8, '', 'SP55', 'mysore', 'bangalore', '6:00am', '6:30am', '50', '2800');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
`id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `contact`, `question`, `answer`, `password`) VALUES
(1, 'naren', 'naren@gmail.com', '8888888888', '2', 'vijay', 'naren'),
(2, 'admin', 'admin@gmail.com', '8888888888', '2', 'ajith', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
`id` int(10) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(1, '1:00am'),
(2, '1:30am'),
(3, '2:00am'),
(4, '2:30am'),
(5, '3:00am'),
(6, '3:30am'),
(7, '4:00am'),
(8, '4:30am'),
(9, '5:00am'),
(10, '5:30am'),
(11, '6:00am'),
(12, '6:30am'),
(13, '7:00am'),
(14, '7:30am'),
(15, '8:00am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
