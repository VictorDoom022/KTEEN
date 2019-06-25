-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 10:11 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(6) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'Rice'),
(2, 'Noodles'),
(3, 'Drink'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(6) NOT NULL,
  `name` int(50) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `password` varchar(32) NOT NULL
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

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `name`, `stall_ID`, `category_ID`, `image`, `price`, `available`) VALUES
(73, 'Maggi Goreng Mee', 1, 2, 'S1_Maggi Goreng Mee.jpg', 5.00, '0'),
(76, 'Fried Rice', 1, 1, 'S1_Fried Rice.jpg', 5.00, '0'),
(77, 'Nasi Pattaya', 1, 1, 'S1_Nasi Pattaya.jpg', 6.00, '1'),
(78, 'Nasi Lemak', 1, 1, 'S1_Nasi Lemak.jpg', 5.00, '1'),
(79, 'Mee Siam', 1, 2, 'S1_Mee Siam.jpg', 5.00, '1'),
(80, 'Laksa', 1, 2, 'S1_Laksa.jpg', 6.00, '1'),
(82, 'Maggi Goreng', 1, 2, 'S1_Maggi Goreng.jpg', 5.00, '1'),
(83, '123', 1, 1, 'S1_123.jpg', 999.00, '0'),
(84, 'Fried Rice', 1, 1, 'S1_Fried Rice.jpg', 234.00, '0');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `ID` int(10) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `date` date NOT NULL,
  `notice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `customer_ID` int(6) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `date` date NOT NULL,
  `number` int(11) NOT NULL,
  `completed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(20) NOT NULL,
  `order_ID` int(7) NOT NULL,
  `food_ID` int(6) NOT NULL,
  `quantity` int(2) NOT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `total` double(10,2) NOT NULL,
  `order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `ID` int(11) NOT NULL,
  `payment_ID` int(11) NOT NULL,
  `food_ID` int(6) NOT NULL,
  `price` double(5,2) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `ID` int(10) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `date` date NOT NULL,
  `supplier_ID` int(6) NOT NULL,
  `total_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `ID` int(10) NOT NULL,
  `ingredient_ID` int(6) NOT NULL,
  `quantity` int(10) NOT NULL,
  `purchase_ID` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `NRIC` int(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stall_ID` varchar(10) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` int(7) NOT NULL,
  `available` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `name`, `NRIC`, `image`, `stall_ID`, `contact_no`, `birthday`, `address`, `password`, `position`, `salary`, `available`) VALUES
(1, 'hongyee', 215, 'S1_ Nasi Lemak.jpg', '1', '123456789', '0000-00-00', 'etgwgt', '', 'Counter', 500, '1'),
(2, 'victor', 215, 'S1_ Nasi Lemak.jpg', '1', '132961599', '0000-00-00', 'etgwgt', 'victor', 'dishwasher', 500, '1'),
(3, 'kaizhi', 215, 'S1_ Nasi Lemak.jpg', '1', '142', '0000-00-00', 'etgwgt', '', 'Kitchen Porter', 500, '1'),
(4, 'jingyong', 215, 'S1_ Nasi Lemak.jpg', '1', '142', '0000-00-00', 'etgwgt', '', 'Kitchen Porter', 500, '1'),
(5, 'chuangxi', 215, 'S1_ Nasi Lemak.jpg', '1', '142', '0000-00-00', 'etgwgt', '', 'Head Chef', 500, '1'),
(6, 'hongyee', 215, 'S1_hongyee.jpg', '0', '123456789', '0000-00-00', 'etgwgt', '', 'head chef', 600, ''),
(7, 'hongyee', 215, 'S1_hongyee.jpg', '0', '123456789', '0000-00-00', 'etgwgt', '', 'head chef', 600, ''),
(8, 'hongye', 215, 'S1_hongye.jpg', '0', '123456789', '0000-00-00', 'etgwgt', '', 'head chef', 600, ''),
(9, 'hongyee', 215, 'S1_hongyee.jpg', '0', '123456789', '0000-00-00', 'etgwgt', '', 'head chef', 600, ''),
(10, 'hongyee', 215, 'S1_hongyee.jpg', '0', '123456789', '0000-00-00', 'etgwgt', '', 'head chef', 800, ''),
(11, 'hongyee', 215, 'S1_hongyee.jpg', '0', '123456789', '0000-00-00', 'etgwgt', '', 'head chef', 600, '');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE `stall` (
  `ID` int(6) NOT NULL,
  `stall_name` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `NRIC` int(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`ID`, `stall_name`, `owner_name`, `NRIC`, `image`, `contact_no`, `email`, `password`, `status`) VALUES
(1, 'stall 01', 'xxx', 0, '', '011-1111111', 'stall01@gmail.com', 'b2ca12dcc3fc922a59956e9b9a4c1484', 1),
(2, 'Fried Rice', 'Tuan Hee', 0, '', '4567890', 'tuanheekuehdiao@gmai', '202cb962ac59075b964b07152d234b70', 1),
(3, 'SWERTE', 'lesen/ body check-up', 0, '', '2345', 'tuanheekuehdiao@gmai', '202cb962ac59075b964b07152d234b70', 1),
(4, 'add stall ID or user', 'Tuan Hee', 0, '', '21345', 'tuanheekuehdiao@gmai', '74c43b7ec689955c9c1517294e92500f', 0),
(5, 'zhenghao', 'zhenghao', 0, '', '0123456789', 'zhenghao@gmail.com', '53cad2e8b932f58a5755a03e92f8df61', 1),
(6, 'stall02', 'zhenghao', 2147483647, '.jpg', '0222222222', 'teotuanhee0726@outlo', '202cb962ac59075b964b07152d234b70', 1),
(7, 'stall02', 'zhenghao', 2147483647, 'stall02.jpg', '0222222222', 'teotuanhee0726@outlo', '202cb962ac59075b964b07152d234b70', 1),
(8, 'stall02', 'zhenghao', 2147483647, 'stall02.jpg', '022222222', 'stall02@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeable`
--

CREATE TABLE `timeable` (
  `ID` int(10) NOT NULL,
  `staff_ID` int(6) NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stall`
--
ALTER TABLE `stall`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `timeable`
--
ALTER TABLE `timeable`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timeable`
--
ALTER TABLE `timeable`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
