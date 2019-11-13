-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 06:29 AM
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
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
  `name` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `NRIC` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `name`, `username`, `password`, `contact_no`, `NRIC`) VALUES
(1, 'jingyong', 'cefed8806f481b2768a65bfa2fe7d38e', 'cefed8806f481b2768a65bfa2fe7d38e', 1110011001, 2147483647);

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
(1, 'Fried Rice', 1, 1, 'S1_Fried Rice.jpg?t=1569292667', 6.00, '1'),
(2, 'Nasi Lemak', 1, 1, 'S1_Nasi Lemak.jpg', 4.00, '1'),
(3, 'Mee Siam', 1, 2, 'S1_Mee Siam.jpg', 4.00, '1'),
(4, 'Laksa', 1, 2, 'S1_Laksa.jpg', 6.00, '1'),
(5, 'Prawn Noodle', 1, 2, 'S1_Prawn Noodle.jpg', 6.00, '1'),
(6, 'Nasi Pattaya', 1, 1, 'S1_Nasi Pattaya.jpg', 5.00, '1'),
(7, 'Wan Tan Mee', 1, 2, 'S1_Wan Tan Mee.jpg', 6.00, '1'),
(8, 'Maggi Mee', 1, 2, 'S1_Maggi Mee.jpg', 4.00, '1'),
(10, 'nasi lemak kampung', 4, 1, 'S4_nasi lemak kampung.jpg', 6.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `order_number` int(4) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`order_number`, `status`) VALUES
(1, 'free'),
(2, 'free'),
(3, 'free'),
(4, 'free'),
(5, 'free'),
(6, 'free'),
(7, 'free'),
(8, 'free'),
(9, 'free'),
(10, 'free'),
(11, 'free'),
(12, 'free'),
(13, 'free'),
(14, 'free'),
(15, 'free'),
(16, 'free'),
(17, 'free'),
(18, 'free'),
(19, 'free'),
(20, 'free'),
(21, 'free'),
(22, 'free'),
(23, 'free'),
(24, 'free'),
(25, 'free'),
(26, 'free'),
(27, 'free'),
(28, 'free'),
(29, 'free'),
(30, 'free'),
(31, 'free'),
(32, 'free'),
(33, 'free'),
(34, 'free'),
(35, 'free'),
(36, 'free'),
(37, 'free'),
(38, 'free'),
(39, 'free'),
(40, 'free'),
(41, 'free'),
(42, 'free'),
(43, 'free'),
(44, 'free'),
(45, 'free'),
(46, 'free'),
(47, 'free'),
(48, 'free'),
(49, 'free'),
(50, 'free'),
(51, 'free'),
(52, 'free'),
(53, 'free'),
(54, 'free'),
(55, 'free'),
(56, 'free'),
(57, 'free'),
(58, 'free'),
(59, 'free'),
(60, 'free'),
(61, 'free'),
(62, 'free'),
(63, 'free'),
(64, 'free'),
(65, 'free'),
(66, 'free'),
(67, 'free'),
(68, 'free'),
(69, 'free'),
(70, 'free'),
(71, 'free'),
(72, 'free'),
(73, 'free'),
(74, 'free'),
(75, 'free'),
(76, 'free'),
(77, 'free'),
(78, 'free'),
(79, 'free'),
(80, 'free'),
(81, 'free'),
(82, 'free'),
(83, 'free'),
(84, 'free'),
(85, 'free'),
(86, 'free'),
(87, 'free'),
(88, 'free'),
(89, 'free'),
(90, 'free'),
(91, 'free'),
(92, 'free'),
(93, 'free'),
(94, 'free'),
(95, 'free'),
(96, 'free'),
(97, 'free'),
(98, 'free'),
(99, 'free'),
(100, 'free'),
(101, 'free'),
(102, 'free'),
(103, 'free'),
(104, 'free'),
(105, 'free'),
(106, 'free'),
(107, 'free'),
(108, 'free'),
(109, 'free'),
(110, 'free'),
(111, 'free'),
(112, 'free'),
(113, 'free'),
(114, 'free'),
(115, 'free'),
(116, 'free'),
(117, 'free'),
(118, 'free'),
(119, 'free'),
(120, 'free'),
(121, 'free'),
(122, 'free'),
(123, 'free'),
(124, 'free'),
(125, 'free'),
(126, 'free'),
(127, 'free'),
(128, 'free'),
(129, 'free'),
(130, 'free'),
(131, 'free'),
(132, 'free'),
(133, 'free'),
(134, 'free'),
(135, 'free'),
(136, 'free'),
(137, 'free'),
(138, 'free'),
(139, 'free'),
(140, 'free'),
(141, 'free'),
(142, 'free'),
(143, 'free'),
(144, 'free'),
(145, 'free'),
(146, 'free'),
(147, 'free'),
(148, 'free'),
(149, 'free'),
(150, 'free'),
(151, 'free'),
(152, 'free'),
(153, 'free'),
(154, 'free'),
(155, 'free'),
(156, 'free'),
(157, 'free'),
(158, 'free'),
(159, 'free'),
(160, 'free'),
(161, 'free'),
(162, 'free'),
(163, 'free'),
(164, 'free'),
(165, 'free'),
(166, 'free'),
(167, 'free'),
(168, 'free'),
(169, 'free'),
(170, 'free'),
(171, 'free'),
(172, 'free'),
(173, 'free'),
(174, 'free'),
(175, 'free'),
(176, 'free'),
(177, 'free'),
(178, 'free'),
(179, 'free'),
(180, 'free'),
(181, 'free'),
(182, 'free'),
(183, 'free'),
(184, 'free'),
(185, 'free'),
(186, 'free'),
(187, 'free'),
(188, 'free'),
(189, 'free'),
(190, 'free'),
(191, 'free'),
(192, 'free'),
(193, 'free'),
(194, 'free'),
(195, 'free'),
(196, 'free'),
(197, 'free'),
(198, 'free'),
(199, 'free'),
(200, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `ID` int(10) NOT NULL,
  `stall_ID` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`ID`, `stall_ID`, `date`, `description`) VALUES
(5, 'stall01', '2019-09-19', 'We will closed form september 20 to 22'),
(6, 'stall01', '2019-10-02', 'jjyy');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(32) NOT NULL,
  `recipient_id` int(32) NOT NULL,
  `sender_id` int(32) NOT NULL,
  `unread` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) NOT NULL,
  `parameter` text NOT NULL,
  `reference_id` int(32) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `customer_ID` varchar(32) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `number` int(11) NOT NULL,
  `completed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `customer_ID`, `stall_ID`, `date`, `number`, `completed`) VALUES
(92, 'test', 1, '2019-10-06 17:50:56', 0, 0),
(93, 'test', 1, '2019-10-10 15:12:44', 0, 0),
(94, 'test', 1, '2019-10-13 15:47:47', 0, 0),
(95, 'cefed8806f481b2768a65bfa2fe7d38e', 1, '2019-10-15 12:58:03', 0, 0),
(96, 'cefed8806f481b2768a65bfa2fe7d38e', 1, '2019-10-23 15:35:26', 0, 0),
(97, 'cefed8806f481b2768a65bfa2fe7d38e', 1, '2019-10-23 15:36:10', 0, 0),
(98, 'cefed8806f481b2768a65bfa2fe7d38e', 1, '2019-10-31 13:37:18', 0, 0),
(99, 'cefed8806f481b2768a65bfa2fe7d38e', 1, '2019-10-31 13:58:18', 0, 0),
(100, 'cefed8806f481b2768a65bfa2fe7d38e', 1, '2019-11-08 11:28:25', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(6) NOT NULL,
  `order_ID` int(7) NOT NULL,
  `food_ID` int(6) NOT NULL,
  `quantity` int(2) NOT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`ID`, `order_ID`, `food_ID`, `quantity`, `remark`) VALUES
(166, 92, 6, 2, NULL),
(167, 92, 7, 1, NULL),
(168, 93, 1, 2, NULL),
(169, 94, 1, 2, NULL),
(170, 95, 2, 2, NULL),
(171, 95, 8, 1, NULL),
(172, 96, 5, 2, NULL),
(173, 97, 5, 2, NULL);

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
  `address` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` int(7) NOT NULL,
  `available` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `name`, `NRIC`, `image`, `stall_ID`, `contact_no`, `address`, `username`, `password`, `position`, `salary`, `available`) VALUES
(2, 'Jy', 12345678, 'S1_Jy.jpg', '1', '0123456789', 'etgwgt', 'jy', 'jy', 'dishwasher', 200, '1'),
(5, 'Si Comel', 2147483647, 'as.jpg', '1', '01110011001', 'canteen', 'as', 'pa', 'Counter', 3000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE `stall` (
  `ID` int(6) NOT NULL,
  `username` varchar(32) NOT NULL,
  `stall_image` varchar(255) NOT NULL,
  `owner_image` varchar(255) NOT NULL,
  `stall_name` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `NRIC` int(12) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`ID`, `username`, `stall_image`, `owner_image`, `stall_name`, `owner_name`, `NRIC`, `contact_no`, `email`, `password`, `status`) VALUES
(1, 'stall01', 'stall.jpg', 'owner.jpg', 'stall01', 'stall01Owner', 2147483647, '0123456789', 'stall01@gmail.com', 'b2ca12dcc3fc922a59956e9b9a4c1484', 1),
(4, 'stall02', 'stall.jpg', 'owner.jpg', 'bbbb', 'victor', 2147483647, '01110011001', 'stall02@gmail.com', 'e7994bc07b3d3cc596624c07c9966bad', 0),
(5, 'llc0202', 'stall.jpg', 'owner.jpg', 'Chicken Duck Shop', 'llc', 2147483647, '0187801201', 'liangjun487@gmail.co', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stall_ID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `ID` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `amount` double(6,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`ID`, `username`, `amount`) VALUES
(1, 'cefed8806f481b2768a65bfa2fe7d38e', 850.00);

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
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `timeable`
--
ALTER TABLE `timeable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
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
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `order_number` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

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
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeable`
--
ALTER TABLE `timeable`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
