-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 06:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(6) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `category_ID` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(5,2) NOT NULL,
  `available` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE `stall` (
  `ID` int(6) NOT NULL,
  `stall_name` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`ID`, `stall_name`, `owner_name`, `contact_no`, `email`, `password`, `status`) VALUES
(1, 'stall 01', 'xxx', '011-1111111', 'stall01@gmail.com', 'b2ca12dcc3fc922a59956e9b9a4c1484', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stall`
--
ALTER TABLE `stall`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
