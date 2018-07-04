-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 02:22 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `p_id` int(30) NOT NULL,
  `p_fname` varchar(30) DEFAULT NULL,
  `p_lname` varchar(30) DEFAULT NULL,
  `p_age` varchar(30) DEFAULT NULL,
  `p_contact` varchar(20) DEFAULT NULL,
  `p_gender` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `t_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`p_id`, `p_fname`, `p_lname`, `p_age`, `p_contact`, `p_gender`, `email`, `password`, `t_no`) VALUES
(1, 'Rahul', 'Dravid', '42', '9090909090', 'Male', 'rahul@dravid.com', '123123123', 4971),
(2, 'Rahul', 'Dravid', '29', '1010101010', 'Male', 'qwe@w.cc', '123123123', NULL),
(4, 'qwe', 'qwe', '19', '1010101010', 'Male', '123@123.cc', '123123123', NULL),
(5, 'abc', 'sbc', '19', '9090909090', 'Male', 'abc@g.cc', '123123123', 12951),
(6, 'sumit', 'sharma', '20', '9999999999', 'Male', 'sharma@gmail.com', '123123123', 12951),
(7, 'dhruv', 'mehta', '20', '9191919191', 'Male', 'dhruv@gmail.com', '123123123', 16205);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `s_fname` varchar(10) DEFAULT NULL,
  `s_lname` varchar(10) DEFAULT NULL,
  `s_department` varchar(20) NOT NULL,
  `s_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `s_no` int(11) NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `s_no_of_platforms` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`s_no`, `s_name`, `s_no_of_platforms`) VALUES
(1, 'borivali', '8'),
(2, 'Baroda', '6'),
(3, 'Surat', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `PNR` decimal(10,0) NOT NULL,
  `t_status` varchar(20) NOT NULL DEFAULT 'Waiting',
  `t_fare` int(11) DEFAULT NULL,
  `p_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`PNR`, `t_status`, `t_fare`, `p_id`) VALUES
('26850280', '1', 200, 1),
('36993408', '1', 300, 1),
('45974731', '1', 100, 1),
('68114929', '1', 200, 1),
('80370178', '1', 200, 1),
('89760742', '1', 0, 1),
('98247680', '1', 200, 1),
('98744812', '1', 600, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE `ticket_info` (
  `pnr` int(60) NOT NULL,
  `train_no.` int(11) NOT NULL,
  `name` varchar(9) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `seatpref` varchar(10) NOT NULL,
  `senior` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`pnr`, `train_no.`, `name`, `age`, `gender`, `seatpref`, `senior`) VALUES
(0, 0, '', 0, '', '', 0),
(89760742, 12284, 'dffa', 12, 'male', '', 0),
(80370178, 12284, 'dffa', 12, 'male', '', 0),
(45974731, 4971, 'aas', 12, 'vfdfb', 'LB', 0),
(68114929, 12284, 'dffa', 12, 'vfdfb', 'MB', 0),
(26850280, 12284, 'dffa', 12, 'vfdfb', 'MB', 0),
(36993408, 12859, 'dffa', 12, 'male', 'LB', 0),
(98247680, 12284, 'dffa', 12, 'male', 'LB', 0),
(98744812, 12951, 'Aashish', 14, 'Male', 'LB', 0),
(98744812, 12951, 'Shanti', 76, 'Female', 'LB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `t_no` decimal(5,0) NOT NULL,
  `t_name` varchar(30) DEFAULT NULL,
  `t_source` varchar(30) DEFAULT NULL,
  `t_destination` varchar(30) DEFAULT NULL,
  `t_type` varchar(30) DEFAULT NULL,
  `t_status` varchar(20) DEFAULT 'On time',
  `no_of_seats` int(11) DEFAULT NULL,
  `t_duration` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`t_no`, `t_name`, `t_source`, `t_destination`, `t_type`, `t_status`, `no_of_seats`, `t_duration`, `price`) VALUES
('4971', 'garibrath', 'Udaipurr', 'Jammu Tawi', 'Express', 'On time', 550, 20, 100),
('12284', 'duronto', 'Mumbai central', 'Ernakulum', 'AC superfast', 'On time', 800, 24, 200),
('12859', 'geetanjali', 'CST', 'Kolkata', 'express', 'On time', 500, 25, 300),
('12951', 'rajdhani', 'Mumbai Central', 'Delhi', 'Superfast', 'On time', 700, 15, 400),
('16205', 'mysoreexp', 'Talguppa', 'Mysore JN', 'Express', 'On time', 475, 21, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD UNIQUE KEY `PNR` (`PNR`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`t_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `p_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
