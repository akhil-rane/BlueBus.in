-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2012 at 12:09 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE IF NOT EXISTS `bus_details` (
  `d` varchar(10) NOT NULL,
  `bus_no` int(3) NOT NULL,
  `travels` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `dept_time` varchar(10) NOT NULL,
  `seats` int(2) NOT NULL,
  `fare` varchar(10) NOT NULL,
  PRIMARY KEY (`d`,`bus_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`d`, `bus_no`, `travels`, `type`, `dept_time`, `seats`, `fare`) VALUES
('05-11-2012', 101, 'Paulo Travels', 'seater', '6.30 p.m', 25, 'Rs. 750'),
('05-11-2012', 102, 'Paulo Travels', 'seater', '6.30 p.m', 25, 'Rs. 750'),
('05-11-2012', 201, 'Neeta Travels', 'sleeper', '7.30 p.m', 16, 'Rs. 1000'),
('05-11-2012', 202, 'Neeta Travels', 'sleeper', '7.30 p.m', 16, 'Rs. 1000');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `ticket_no` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` int(2) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `card_no` int(10) NOT NULL,
  `card_name` varchar(20) NOT NULL,
  PRIMARY KEY (`ticket_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `bus_no` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`from`, `to`, `date`, `bus_no`) VALUES
('Goa', 'Bombay', '05-11-2012', 101),
('Goa ', 'Bombay', '05-11-2012', 201),
('Bombay', 'Goa', '05-11-2012', 102),
('Bombay', 'Goa', '05-11-2012', 202);

-- --------------------------------------------------------

--
-- Table structure for table `seat_details`
--

CREATE TABLE IF NOT EXISTS `seat_details` (
  `d` varchar(10) NOT NULL,
  `bus_no` int(3) NOT NULL,
  `seat_no` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ticket_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_details`
--

INSERT INTO `seat_details` (`d`, `bus_no`, `seat_no`, `status`, `ticket_no`) VALUES
('05-11-2012', 101, 1, 'available', 0),
('05-11-2012', 101, 2, 'available', 0),
('05-11-2012', 101, 3, 'available', 0),
('05-11-2012', 101, 4, 'available', 0),
('05-11-2012', 101, 5, 'available', 0),
('05-11-2012', 101, 6, 'available', 0),
('05-11-2012', 101, 7, 'available', 0),
('05-11-2012', 101, 8, 'available', 0),
('05-11-2012', 101, 9, 'available', 0),
('05-11-2012', 101, 10, 'available', 0),
('05-11-2012', 101, 11, 'available', 0),
('05-11-2012', 101, 12, 'available', 0),
('05-11-2012', 101, 13, 'available', 0),
('05-11-2012', 101, 14, 'available', 0),
('05-11-2012', 101, 15, 'available', 0),
('05-11-2012', 101, 16, 'available', 0),
('05-11-2012', 101, 17, 'available', 0),
('05-11-2012', 101, 18, 'available', 0),
('05-11-2012', 101, 19, 'available', 0),
('05-11-2012', 101, 20, 'available', 0),
('05-11-2012', 101, 21, 'available', 0),
('05-11-2012', 101, 22, 'available', 0),
('05-11-2012', 101, 23, 'available', 0),
('05-11-2012', 101, 24, 'available', 0),
('05-11-2012', 101, 25, 'available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_no`
--

CREATE TABLE IF NOT EXISTS `ticket_no` (
  `x` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_no`
--

INSERT INTO `ticket_no` (`x`) VALUES
(10010);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
