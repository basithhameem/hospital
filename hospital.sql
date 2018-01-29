-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 02:42 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital-room`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `dateofbirth` date NOT NULL,
  `bloodgroup` varchar(6) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '1',
  `address1` varchar(25) DEFAULT NULL,
  `address2` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT 'Trivandrum',
  `district` varchar(25) DEFAULT NULL,
  `state` varchar(25) NOT NULL DEFAULT 'Kerala',
  `country` varchar(25) NOT NULL DEFAULT 'India',
  `phone` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `username`, `password`, `dateofbirth`, `bloodgroup`, `gender`, `address1`, `address2`, `city`, `district`, `state`, `country`, `phone`, `timestamp`) VALUES
(270, 'Patient 1', 'user1@tharun.me', 'user1', '1995-05-17', 'O+ve', 1, 'Road 12', 'A Nagar3', 'Trivandrum', 'Thiruvananthapuram', 'Kerala', 'India', 9090909090, '2017-11-07 10:29:59'),
(272, 'Patient 2', 'user2@tharun.me', 'user2', '0000-00-00', 'O+ve', 1, 'User 2 address 1', 'user 2 address 2', 'City User 2', 'District2', 'Kerala', 'India', 242255552, '2017-11-07 13:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `patientname` varchar(25) DEFAULT NULL,
  `opnumber` varchar(25) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `number` varchar(10) NOT NULL,
  `building` varchar(50) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `ac` int(1) NOT NULL DEFAULT '0',
  `seaside` int(1) NOT NULL DEFAULT '0',
  `maid` int(1) NOT NULL DEFAULT '0',
  `fridge` int(1) NOT NULL DEFAULT '0',
  `kitchen` int(1) NOT NULL DEFAULT '0',
  `wifi` int(1) NOT NULL DEFAULT '0',
  `phone` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `patientname`, `opnumber`, `userid`, `number`, `building`, `type`, `ac`, `seaside`, `maid`, `fridge`, `kitchen`, `wifi`, `phone`, `active`, `date`) VALUES
(177, 'DEMO1', 'AAFJEU222', 270, '12554', 'Building 2', 1, 0, 0, 0, 0, 0, 0, 0, 1, '2017-11-07 10:37:28'),
(178, 'Demo 2', 'DD44566', 272, 'Z12', 'Block C', 2, 1, 1, 0, 0, 0, 1, 1, 1, '2017-11-07 11:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `username`, `password`, `name`) VALUES
(33, 'admin@admin.com', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
