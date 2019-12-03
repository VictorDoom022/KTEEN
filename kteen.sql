-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 05:15 AM
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
  `password` varchar(32) NOT NULL,
  `position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`, `position`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ID` int(200) NOT NULL,
  `bill_number` varchar(200) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `bill_date` varchar(200) NOT NULL,
  `bill_amount` varchar(200) NOT NULL,
  `bill_file` text NOT NULL,
  `date_add` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID`, `bill_number`, `stall_ID`, `supplier_name`, `bill_date`, `bill_amount`, `bill_file`, `date_add`) VALUES
(10, 'BILL001', 5, 'Supplier1 Sdn Bhd', '2019-12-04', '1243', 'MathQuizPanel.zip', '2019-12-03 10:12:05');

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
(1, 'jingyong', 'cefed8806f481b2768a65bfa2fe7d38e', 'cefed8806f481b2768a65bfa2fe7d38e', 1110011001, 2147483647),
(2, 'victor tan', 'ae2b1fca515949e5d54fb22b8ed95575', 'ae2b1fca515949e5d54fb22b8ed95575', 1116264, 1010010111),
(3, 'Bobo', 'fa7efac14f396ba1d4d5f26209493574', 'e10adc3949ba59abbe56e057f20f883e', 197290964, 1023011891);

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
(29, 'Fried Rice', 5, 1, 'S5_Fried Rice.jpg', 5.00, '1'),
(30, 'Mee Siam', 5, 2, 'S5_Mee Siam.jpg', 4.00, '1'),
(31, 'Nasi Lemak', 5, 1, 'S5_Nasi Lemak.jpg', 5.00, '1'),
(32, 'Nasi Pattaya', 5, 1, 'S5_Nasi Pattaya.jpg', 6.00, '1'),
(34, 'Laksa', 6, 2, 'S6_Laksa.jpg', 7.00, '1'),
(35, 'Maggi Mee', 6, 2, 'S6_Maggi Mee.jpg', 4.00, '1'),
(36, 'Mee Pok', 6, 2, 'S6_Mee Pok.jpg', 6.00, '1'),
(37, 'Prawn Noodle', 6, 2, 'S6_Prawn Noodle.jpg', 7.00, '1'),
(38, 'Wan Tan Mee', 6, 2, 'S6_Wan Tan Mee.jpg', 7.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID` int(200) NOT NULL,
  `invoice_number` varchar(200) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `invoice_due` varchar(200) NOT NULL,
  `invoice_amount` varchar(200) NOT NULL,
  `invoice_file` varchar(200) NOT NULL,
  `date_add` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID`, `invoice_number`, `stall_ID`, `supplier_name`, `invoice_date`, `invoice_due`, `invoice_amount`, `invoice_file`, `date_add`) VALUES
(11, 'INV01', 5, 'Supplier1 Sdn Bhd', '2019-12-04', '2019-12-06', '1230', 'INDIVIDUAL EXERCISE 220519.docx', '2019-12-03 10:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu_approve`
--

CREATE TABLE `menu_approve` (
  `menu_approve_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `category_ID` int(6) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(5,2) NOT NULL,
  `available` varchar(1) NOT NULL,
  `approve` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_approve`
--

INSERT INTO `menu_approve` (`menu_approve_id`, `name`, `stall_ID`, `category_ID`, `image`, `price`, `available`, `approve`) VALUES
(5, 'kali mee', 1, 2, 'S1_kali mee.jpg', 6.00, '1', '1'),
(6, 'testing', 1, 1, 'S1_testing.jpg', 6.00, '1', '1'),
(7, 'Fried Rice', 5, 1, 'S5_Fried Rice.jpg', 5.00, '1', '1'),
(8, 'Mee Siam', 5, 2, 'S5_Mee Siam.jpg', 4.00, '1', '1'),
(9, 'Nasi Lemak', 5, 1, 'S5_Nasi Lemak.jpg', 5.00, '1', '1'),
(10, 'Nasi Pattaya', 5, 1, 'S5_Nasi Pattaya.jpg', 6.00, '1', '1'),
(11, '6.00', 5, 2, 'S5_6.00.jpg', 0.00, '1', '1'),
(12, 'Laksa', 6, 2, 'S6_Laksa.jpg', 7.00, '1', '1'),
(13, 'Maggi Mee', 6, 2, 'S6_Maggi Mee.jpg', 4.00, '1', '1'),
(14, 'Mee Pok', 6, 2, 'S6_Mee Pok.jpg', 6.00, '1', '1'),
(15, 'Prawn Noodle', 6, 2, 'S6_Prawn Noodle.jpg', 7.00, '1', '1'),
(16, 'Wan Tan Mee', 6, 2, 'S6_Wan Tan Mee.jpg', 7.00, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `ID` int(10) NOT NULL,
  `stall_ID` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`ID`, `stall_ID`, `date`, `description`) VALUES
(5, 'stall01', '2019-09-19', 'We will closed form september 20 to 22');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(32) NOT NULL,
  `recipient_id` int(32) NOT NULL,
  `sender_id` int(32) NOT NULL,
  `unread` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `parameter` text NOT NULL,
  `reference_id` int(32) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`ID`, `recipient_id`, `sender_id`, `unread`, `title`, `parameter`, `reference_id`, `created_date`) VALUES
(10, 1, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-11-25 00:18:33'),
(11, 1, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-11-25 00:18:37'),
(12, 1, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-12-03 08:57:53'),
(18, 6, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-12-03 10:29:51'),
(19, 6, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-12-03 10:29:52'),
(20, 6, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-12-03 10:30:21'),
(21, 6, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-12-03 10:31:21'),
(22, 6, 0, 1, 'approve', 'You menu has been approve by Administrator', 0, '2019-12-03 10:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `number`
--

CREATE TABLE `number` (
  `order_number` int(4) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `number`
--

INSERT INTO `number` (`order_number`, `status`) VALUES
(1, 'busy'),
(2, 'busy'),
(3, 'busy'),
(4, 'busy'),
(5, 'busy'),
(6, 'busy'),
(7, 'busy'),
(8, 'busy'),
(9, 'busy'),
(10, 'busy'),
(11, 'busy'),
(12, 'busy'),
(13, 'busy'),
(14, 'busy'),
(15, 'busy'),
(16, 'busy'),
(17, 'busy'),
(18, 'busy'),
(19, 'busy'),
(20, 'busy'),
(21, 'busy'),
(22, 'busy'),
(23, 'busy'),
(24, 'busy'),
(25, 'busy'),
(26, 'busy'),
(27, 'busy'),
(28, 'busy'),
(29, 'busy'),
(30, 'busy'),
(31, 'busy'),
(32, 'busy'),
(33, 'busy'),
(34, 'busy'),
(35, 'busy'),
(36, 'busy'),
(37, 'busy'),
(38, 'busy'),
(39, 'busy'),
(40, 'busy'),
(41, 'busy'),
(42, 'busy'),
(43, 'busy'),
(44, 'busy'),
(45, 'busy'),
(46, 'busy'),
(47, 'busy'),
(48, 'busy'),
(49, 'busy'),
(50, 'busy'),
(51, 'busy'),
(52, 'busy'),
(53, 'busy'),
(54, 'busy'),
(55, 'busy'),
(56, 'busy'),
(57, 'busy'),
(58, 'busy'),
(59, 'busy'),
(60, 'busy'),
(61, 'busy'),
(62, 'busy'),
(63, 'busy'),
(64, 'busy'),
(65, 'busy'),
(66, 'busy'),
(67, 'busy'),
(68, 'busy'),
(69, 'busy'),
(70, 'busy'),
(71, 'busy'),
(72, 'busy'),
(73, 'busy'),
(74, 'busy'),
(75, 'busy'),
(76, 'busy'),
(77, 'busy'),
(78, 'busy'),
(79, 'busy'),
(80, 'busy'),
(81, 'busy'),
(82, 'busy'),
(83, 'busy'),
(84, 'busy'),
(85, 'busy'),
(86, 'busy'),
(87, 'busy'),
(88, 'busy'),
(89, 'busy'),
(90, 'busy'),
(91, 'busy'),
(92, 'busy'),
(93, 'busy'),
(94, 'busy'),
(95, 'busy'),
(96, 'busy'),
(97, 'busy'),
(98, 'busy'),
(99, 'busy'),
(100, 'busy'),
(101, 'busy'),
(102, 'busy'),
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `customer_username` varchar(32) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `number` int(11) NOT NULL,
  `completed` int(1) NOT NULL,
  `taken` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `customer_username`, `stall_ID`, `date`, `number`, `completed`, `taken`) VALUES
(14, 'cefed8806f481b2768a65bfa2fe7d38e', 5, '2019-12-03 10:31:17', 96, 1, '1'),
(15, 'cefed8806f481b2768a65bfa2fe7d38e', 5, '2019-12-03 10:32:23', 97, 1, '1'),
(16, 'cefed8806f481b2768a65bfa2fe7d38e', 5, '2019-12-03 10:32:33', 98, 1, '1'),
(17, 'cefed8806f481b2768a65bfa2fe7d38e', 5, '2019-12-03 10:32:44', 99, 1, '0'),
(18, 'cefed8806f481b2768a65bfa2fe7d38e', 5, '2019-12-03 10:51:12', 100, 1, '0'),
(19, 'fa7efac14f396ba1d4d5f26209493574', 6, '2019-12-03 11:13:08', 101, 0, '0'),
(20, 'cefed8806f481b2768a65bfa2fe7d38e', 6, '2019-12-03 11:14:46', 102, 0, '0');

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
(22, 14, 31, 2, NULL),
(23, 15, 29, 2, NULL),
(24, 16, 32, 8, NULL),
(25, 16, 31, 1, NULL),
(26, 17, 29, 2, NULL),
(27, 17, 31, 2, NULL),
(28, 18, 29, 1, NULL),
(29, 19, 37, 1, NULL),
(30, 20, 35, 1, NULL),
(31, 20, 34, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double(10,2) NOT NULL,
  `order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `method`, `date`, `total`, `order_ID`) VALUES
(6, 'e-wallet', '0000-00-00 00:00:00', 10.00, 14),
(7, 'cash', '0000-00-00 00:00:00', 10.00, 15),
(8, 'cash', '0000-00-00 00:00:00', 53.00, 16),
(9, 'cash', '0000-00-00 00:00:00', 20.00, 17),
(10, 'e-wallet', '0000-00-00 00:00:00', 5.00, 18),
(11, '', '0000-00-00 00:00:00', 7.00, 19),
(12, '', '2019-12-03 11:14:46', 11.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `ID` int(10) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `date` date NOT NULL,
  `supplier_ID` int(6) NOT NULL,
  `content` text NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`ID`, `stall_ID`, `date`, `supplier_ID`, `content`, `product_name`, `price`, `quantity`, `total`) VALUES
(3, 1, '2019-10-04', 0, 'This is a question we get from time to time. There are instances when youâ€™re given an assignment, not by word count, but assigned by the number of pages. For example, â€œWrite a paper four pages long.â€ If you get an assignment to write four pages, one of the first questions that will likely come to mind is, â€œHow many words are in four pages?â€ If you need to figure out words per page, you can use a words per page calculator.\nThe truth is there is no definitive answer to this question. The number of words it will take to fill a page will depend on a number of factors including the type of font used, the font size, spacing elements, the margins used on the paper, the paragraph length, etc. For example, if the assignment says the writing should be in 10-point font, itâ€™s going to take a greater number of words to fill a page than if the assignment requires a 12-point font.\n\nFor those who need a general rule of thumb, a typical page which has 1-inch margins and is typed in 12 point font with standard spacing elements will be approximately 500 words when typed single spaced. For assignments that require double spacing, it would take approximately 250 words to fill the page. For an assignment that requires you to write four pages, you can make the estimation that youâ€™ll need to write approximately 2000 words for a single spaced paper, or 1000 words if the assignment is double spaced. Again, the type of font used can make the word count higher or lower, but itâ€™s a good rule of thumb for those who are simply looking for a general estimation.\n\nSince there can be a large variation on the number of words needed to fill a page, most papers are no longer assigned by page count. They are instead assigned by word count. That is, an assignment, essay or paper will likely be assigned as 1500 â€“ 2000 words rather than 3 â€“ 4 pages. This way it is much more difficult for the writer to â€œgame the systemâ€ by using large fonts and excessive spacing to meet the writing criteria.\n\nIf you are given a writing assignment with a page number, the best thing to do is go directly to the person who made the assignment and ask for a word count. This will take away all the variations and help ensure your writing assignment meets expectations. If itâ€™s for something informal and you simply need a general guideline, you can find it below.\n\nHow many pages isâ€¦\nThe below list is an approximation, and actual pages will differ depending on a number of factors mentioned earlier in this article. Use the below information for a general reference, but donâ€™t assume it will be the case at all times. Here are basic word to pages conversions:\n\n500 words is 1 page single spaced, 2 pages double spaced.\n1,000 words is 2 pages single spaced 4 pages double spaced.\n1,500 words is 3 pages single spaced, 6 pages double spaced.\n2,000 words is 4 pages single spaced, 8 pages double spaced.\n2,500 words is 5 pages single spaced, 10 pages double spaced.\n3,000 words is 6 pages single spaced, 12 pages double spaced.\n4,000 words is 8 pages single spaced, 16 pages double spaced.\n5,000 words is 10 pages single spaced, 20 pages double spaced.\n7,500 words is 15 pages single spaced, 30 pages double spaced.\n10,000 words is 20 pages single spaced, 40 pages double spaced.\n20,000 words is 40 pages single spaced, 80 pages double spaced.\n25,000 words is 50 pages single spaced, 100 pages double spaced.\n30,000 words is 60 pages single spaced, 120 pages double spaced.\n40,000 words is 80 pages single spaced, 160 pages double spaced.\n50,000 words is 100 pages single spaced, 200 pages double spaced.\n60,000 words is 120 pages single spaced, 240 pages double spaced.\n70,000 words is 140 pages single spaced, 280 pages double spaced.\n75,000 words is 150 pages single spaced, 300 pages double spaced.\n80,000 words is 160 pages single spaced, 320 pages double spaced.\n90,000 words is 180 pages single spaced, 360 pages double spaced.\n100,000 words is 200 pages single spaced, 400 pages double spaced.\nBelow are basic pages to words conversions:\n\n1 page is 500 words single spaced, 250 words double spaced.\n2 pages is 1,000 words single spaced, 500 words double spaced.\n3 pages is 1,500 words single spaced, 750 words double spaced.\n4 pages is 2,000 words single spaced, 1,000 words double spaced.\n5 pages is 2,500 words single spaced, 1,250 words double spaced.\n6 pages is 3,000 words single spaced, 1,500 words double spaced.\n7 pages is 3,500 words single spaced, 1,750 words double spaced.\n8 pages is 4,000 words single spaced, 2,000 words double spaced.\n9 pages is 4,500 words single spaced, 2,250 words double spaced.\n10 pages is 5,000 words single spaced, 2,500 words double spaced.\n15 pages is 7,500 words single spaced, 3,750 words double spaced.\n20 pages is 10,000 words single spaced, 5,000 words double spaced.\n25 pages is 12,500 words single spaced, 6,250 words double spaced.\n30 pages is 15,000 words single spaced, 7,500 words double spaced.\n40 pages is 20,000 words single spaced, 10,000 words double spaced.\n50 pages is 25,000 words single spaced, 12,500 words double spaced.\n60 pages is 30,000 words single spaced, 15,000 words double spaced.\n70 pages is 35,000 words single spaced, 17,500 words double spaced.\n75 pages is 37,500 words single spaced, 18,750 words double spaced.\n80 pages is 40,000 words single spaced, 20,000 words double spaced.\n90 pages is 45,000 words single spaced, 22,500 words double spaced.\n100 pages is 50,000 words single spaced, 25,000 words double spaced.\n(Photo courtesy of Horia Varlan)\n\nShare:FACEBOOKTWITTERPINTERESTLINKEDIN\n126\nSHARES\n78 comments\n \nTop rated\n comments first\nEnter your comment...\nJill R\nJanuary 16, 2017\nMy teacher told me that I needed to write an essay that had 2500 words. I wrote an essay which had 2498 words. I got marks off for not writing an essay with exactly 2500 words. Thatâ€™s completely ridiculous but my teacher refuse to reinstate the point she took off because she said 2500 words and not 2498 words. I couldâ€™ve just said that my was 2500 words and she wouldâ€™ve never known the difference. I donâ€™t understand why Iâ€™m being punished for being honest.\n\nVote:  27  7 \nShare \nReply to Jill R\njake\nJanuary 31, 2017\nIt is pretty petty of your teacher to do that (usually they will give you a range of words to keep within) but itâ€™s also an important lesson in learning to read and follow directions as stated.\n\nVote:  14  15 \nShare \nReply to jake\nasti\nAugust 24, 2019\nthatâ€™s stupid, how would YOU feel if your teacher said around 2500 words and you wrote 2499 and you got points nicked off?!\n\nVote:  0  2 \nShare \nReply to asti\nkj\nMarch 6, 2018\nQuite petty of your teacher to subtract points for being 2 words short of 2500, but I will say that you could have added a summary sentence. There are many, many programs and online word counters that you could have used to know you were just short. Learn this lesson and donâ€™t make the same mistake in the future. best of luck!\n\nVote:  13  4 \nShare \nReply to kj\nSherry Orton\nJune 30, 2018\nNeeded 2 more words? U shouldâ€™ve just ended it with\nâ€œUp yours!â€ LOL!!!\nNo, seriously, life is WAY TOO SHORT to worry if this petty teacher took off a few points!\nIâ€™d just be PROUD of myself that I got it DONE & that Iâ€™m in school & not a drop-out doing drugs!\n\nVote:  18  3 \nShare \nReply to Sherry Orton\nEllie\nJuly 26, 2018\nAs a teacher, I would have taken off points too. You didnâ€™t meet the minimum requirement, and then you told on yourself. Now, if you went over by 2 words, that wouldnâ€™t have mattered.\n\nVote:  8  41 \nShare \nReply to Ellie\nSydney Clark\nSeptember 4, 2018\nWell as a 10-year-old author of a new book I am writing called Mirrors truth 2 words is not a big deal so calm down your teacher was being petty and kinda stupid 2 words does not matter. Letâ€™s just say my book was 50,998 words long. That makes no sense that someone would criticize me for that\n\nVote:  11  5 \nShare \nReply to Sydney Clark\nEliah\nSeptember 9, 2018\nIâ€™m a young writer too and people are impressed that I have over 1,000 words soâ€¦\n\nVote:  4  1 \nShare \nReply to Eliah\nmax\nFebruary 10, 2019\ni donâ€™t think so\n\nVote:  0  2 \nShare \nReply to max\nKevin Lynch\nMarch 5, 2019\nwell you should reconsider being a teacher, haha\n\nVote:  2  2 \nShare \nReply to Kevin Lynch\nAllgar\nSeptember 18, 2018\nYou should have ended your essay with any acceptable two words English exclamation;)\n\nVote:  3  1 \nShare \nReply to Allgar\nJosh\nJanuary 29, 2018\nThis is a great guide, but people should be aware that these are just estimates. For example, I am currently writing a paper and have 5,000 words, but only 17 pages (double spaced). Things like paragraph size and headers need to be taken into account as well.\n\nVote:  18  2 \nShare \nReply to Josh\nanon\nApril 17, 2018\nhey good idea josh\n\nVote:  13  1 \nShare \nReply to anon\nLove\nOctober 30, 2017\nAye how many words do I have to put if Iâ€™m typing a 14 page essay.\n\nVote:  8  16 \nShare \nReply to Love\nkj\nMarch 6, 2018\nWhy donâ€™t you use the 15 page word count and subtract just a bit? Your question is quite easily self-answered, as the author has given an extensive guide.\n\nVote:  18  2 \nShare \nReply to kj\nGina\nDecember 8, 2016\nI donâ€™t get why everyone is so obsessed with word count and page count. Just write a good essay and donâ€™t worry about it. There are more important things to worry about in life!\n\nVote:  8  12 \nShare \nReply to Gina\nDaniel\nDecember 12, 2016\nSome of us get marked down points if we do not hit a certain word count or page count. If Iâ€™m assigned a paper and it has to be a minimum number of words, I worry about hitting that number.\n\nVote:  17  1 \nShare \nReply to Daniel\nValacia\nDecember 21, 2016\nI agree that there are a lot of people who are overly concerned with word count, but there are legitimate reasons to keep it in mind as well. @Daniel gives a good example. I wouldnâ€™t worry about it too much. If itâ€™s not something important to you and your writing, you can ignore it.\n\nVote:  3  1 \nShare \nReply to Valacia\nmax\nFebruary 10, 2019\nyour right!\n\nVote:  2  0 \nShare \nReply to max\nKieya\nNovember 21, 2017\nThanks for this!\n\nVote:  6  0 \nShare \nReply to Kieya\nsteph steph\nJuly 2, 2016\nWhy is everything word count these days instead of page count? Page count is so much easier. When I was in school when I was younger, all assignments were page count. Write a 5 page essay. Write a 10 page paper. Now itâ€™s all about words and number of words. Itâ€™s so much more complicated.\n\nVote:  5  2 \nShare \nReply to steph steph\nGeorge W\nJuly 13, 2016\nPage count was great when there were only typewriters and each page was basically the same, but now itâ€™s easy to manipulate page count by changing font size and fonts. You can also adjust margins with a computer. Word count is just a lot more accurate.\n\nVote:  2  0 \nShare \nReply to George W\nSteph on meeeee\nMay 4, 2018\nAgreed.\n\nVote:  0  1 \nShare \nReply to Steph on meeeee\nmax\nFebruary 10, 2019\nis your real name steph steph\n\nVote:  1  3 \nShare \nReply to max\nevie\nApril 1, 2019\nI had page count once, just made my text abnormally large ha\n\nVote:  0  0 \nShare \nReply to evie\nKim Payne\nAugust 3, 2018\nThis is not accurate for academic papers with 1â€³ margins. It is closer to 320 per page.\n\nVote:  2  0 \nShare \nReply to Kim Payne\nDebbie\nNovember 2, 2016\nDo teachers really count the number of words when an assignment is given? They donâ€™t actually count each individual word, so can I just make up a number of words for each page and use that. How would the teacher ever know?\n\nVote:  1  3 \nShare \nReply to Debbie\nMcKenna\nMarch 8, 2018\nMost of my professors require that we submit things online. This makes it really easy because the computer counts the number of words for them.\n\nVote:  3  0 \nShare \nReply to McKenna\nM V Jean-Pierre\nMarch 30, 2018\nHi would garberick be familiar to you?\n\nVote:  0  0 \nShare \nReply to M V Jean-Pierre\nEllie\nJuly 26, 2018\nItâ€™s very easy to highlight a portion of text and use technology to tell you the word count. This is how I made sure my students hit the word count. (And if a student is way below word count, teachers can tell without even checking because it seems short in comparison to the other studentsâ€™ essays.)\n\nVote:  0  0 \nShare \nReply to Ellie\ncederick\nJune 11, 2016\nI find these estimates to be off. I write longer words than most, so most of my pages have less words than the estimates on this page. They are off. You should change them so they are more accurate for people who use longer vocabulary words.\n\nVote:  1  5 \nShare \nReply to cederick\nadmin', '', '', 0, 0),
(8, 1, '2019-10-10', 0, 'Testing', 'IDK', '50', 200, 0),
(9, 1, '2019-10-10', 0, 'Testing', 'IDK', '50', 200, 0),
(10, 1, '2019-10-10', 0, 'Testing', 'IDK', '50', 200, 0),
(11, 1, '2019-10-10', 0, 'Testing', 'IDK', '50', 200, 0),
(22, 5, '2019-10-11', 0, 'eegewgg', 'IDK123', '10', 10, 100),
(23, 1, '2019-12-03', 0, '', 'tt', '0', 0, 0),
(24, 1, '2019-12-03', 0, 'jjyy', 'choong jing yong', '1', 1, 1);

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
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ID` int(200) NOT NULL,
  `receipt_number` varchar(200) NOT NULL,
  `stall_ID` int(6) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `receipt_date` varchar(100) NOT NULL,
  `receipt_amount` varchar(200) NOT NULL,
  `receipt_file` varchar(200) NOT NULL,
  `date_add` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`ID`, `receipt_number`, `stall_ID`, `supplier_name`, `receipt_date`, `receipt_amount`, `receipt_file`, `date_add`) VALUES
(8, 'RE01', 5, 'Supplier1 Sdn Bhd', '2019-12-05', '100', 'Doc1.docx', '2019-12-03 11:56:45');

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
  `available` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `name`, `NRIC`, `image`, `stall_ID`, `contact_no`, `address`, `username`, `password`, `position`, `salary`, `available`) VALUES
(8, 'jing yong', 1999101010, 'jingyong.jpg', '5', '01110011001', 'jln', 'jingyong', 'jingyong', 'head chef', 300, '1');

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
(5, 'stall01', 'stall.jpg', 'owner.jpg', 'Stall01', 'Tuan Hee', 2147483647, '0125648965', 'stall01@gmail.com', 'b2ca12dcc3fc922a59956e9b9a4c1484', 1),
(6, 'stall02', 'stall.jpg', 'owner.jpg', 'Stall02', 'Victor', 999999, '999-9999999', 'stall02@gmail.com', 'e7994bc07b3d3cc596624c07c9966bad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `stall_ID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID`, `name`, `company_name`, `contact_no`, `address`, `stall_ID`, `email`) VALUES
(1, 'test', 'test', '345678', 'dfytui', 0, 'victordoom022@gmail.com'),
(2, 'test', 'test', '0123345678', 'adada', 0, 'victordoom022@gmail.com'),
(3, 'fs', 'fs', 'fdsf', 'sfs', 0, 'fd@grihs'),
(4, 'test', 'test', '0123345678', 'sdad', 0, 'victordoom022@gmail.com'),
(5, 'test', 'test', '0123345678', 'adad', 0, 'victordoom022@gmail.com'),
(6, 'Supplier 1', 'Supplier1 Sdn Bhd', '0187801201', 'Southern University', 5, 'victordoom022@gmail.com');

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
(1, 'cefed8806f481b2768a65bfa2fe7d38e', 629.00),
(2, 'ae2b1fca515949e5d54fb22b8ed95575', 20.00),
(3, 'fa7efac14f396ba1d4d5f26209493574', 20.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
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
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu_approve`
--
ALTER TABLE `menu_approve`
  ADD PRIMARY KEY (`menu_approve_id`);

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
-- Indexes for table `number`
--
ALTER TABLE `number`
  ADD PRIMARY KEY (`order_number`);

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
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_approve`
--
ALTER TABLE `menu_approve`
  MODIFY `menu_approve_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `number`
--
ALTER TABLE `number`
  MODIFY `order_number` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
