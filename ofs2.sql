-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 12:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofs2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(30) NOT NULL,
  `timepayment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `num` int(50) NOT NULL,
  `name` varchar(70) NOT NULL,
  `catdesc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`num`, `name`, `catdesc`) VALUES
(3, 'Wall Fan', 'Mounted on wall fan'),
(4, 'Table Fan', 'Fan that you can put on the table'),
(5, 'Ceiling Fan', 'Fan that you can put on the ceiling'),
(6, 'Stand Fan', 'Fan that can stand itself! its magic!');

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

CREATE TABLE `corder` (
  `num` int(50) NOT NULL,
  `transactionid` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `ftotal` int(100) NOT NULL,
  `discount` int(20) NOT NULL,
  `tdisc` int(40) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `billID` varchar(25) NOT NULL,
  `imglink` varchar(40) NOT NULL,
  `tmpayment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`num`, `transactionid`, `item_id`, `user_id`, `qty`, `total`, `ftotal`, `discount`, `tdisc`, `pos`, `status`, `billID`, `imglink`, `tmpayment`) VALUES
(1, 'e7r16uphgcr7kqd1mvt730ri15', 44, '3', 1, 100, 100, 0, 0, 'You have to pay RM 6 to cover the postage Fees', '3', '', '', '2017-05-24 09:30:25'),
(3, '3q60k3ov320v1ka4p81h5121n1', 46, '3', 1, 60, 178, 0, 0, 'Your Postage is Free', '3', '', '', '2017-05-24 11:09:34'),
(2, 'sldkug91tdm0cntglt73hevfv2', 56, '3', 1, 150, 150, 0, 0, 'Your Postage is Free', '3', '', '', '2017-05-24 09:53:10'),
(4, '3q60k3ov320v1ka4p81h5121n1', 33, '3', 2, 118, 178, 0, 0, 'Your Postage is Free', '3', '', '', '2017-05-24 11:09:34'),
(5, 'ig3664l1d4slrl13ficbf353b4', 47, '3', 1, 45, 45, 0, 0, 'You have to pay RM 6 to cover the postage Fees', '3', '', '', '2017-05-24 11:23:34'),
(6, '5apafiu29koqe82v6nlmm2l861', 46, '3', 1, 60, 60, 0, 0, 'You have to pay RM 6 to cover the postage Fees', '3', '', '', '2017-05-24 11:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `num` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `notel` varchar(15) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`num`, `name`, `username`, `password`, `email`, `address`, `notel`, `level`) VALUES
(1, 'Muhammad Adib', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adbroslan@gmail.com', 'no 31, jalan kemboja 2', '0176213816', 1),
(2, 'Muhammad Iskandar', 'staff', '1253208465b1efa876f982d8a9e73eef', 'staff@gmail.com', 'no 44, jalan nilai utara, ', '0128882992', 2),
(3, 'Iyad Mizwaruddin Bin Yaccob', 'cust', '3aad3506aa11f05f265ea8304b8152b3', 'cust@gmail.com', 'no 22/2  jalan purnama 4.', '019888282', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `num` int(50) NOT NULL,
  `itemName` varchar(150) NOT NULL,
  `itemPrice` int(51) NOT NULL,
  `itemDesc` text NOT NULL,
  `imglink` varchar(100) NOT NULL,
  `categ` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`num`, `itemName`, `itemPrice`, `itemDesc`, `imglink`, `categ`) VALUES
(44, 'WF001', 100, 'Black and yellow', '1.jpg', 'Wall Fan'),
(33, 'WF002', 59, 'WHITE/BLACK', '2.png', 'Wall Fan'),
(34, 'WF003', 92, 'SILVER/BROWN/BLACK', '3.png', 'Wall Fan'),
(35, 'WF004', 66, 'BLACK/BLUE/YELLOW', '4.jpg', 'Wall Fan'),
(36, 'WF005', 45, 'RED/YELLOW/GREEN', '5.png', 'Wall Fan'),
(37, 'WF006', 150, 'BROWN/SILVER', '6.png', 'Wall Fan'),
(38, 'WF007', 45, 'BLUE/WHITE/RED', '7.png', 'Wall Fan'),
(39, 'WF008', 200, 'BROWN/BLACK', '8.jpg', 'Wall Fan'),
(40, 'WF009', 76, 'BLACK/BROWN', '9.jpg', 'Wall Fan'),
(41, 'WF010', 98, 'WHITE', '10.png', 'Wall Fan'),
(42, 'WF011', 77, 'WHITE', '11.png', 'Wall Fan'),
(43, 'WF012', 160, 'BROWN/BLACK', '12.png', 'Wall Fan'),
(46, 'TF001', 60, 'APPLE/PEAR/PINEAPPLE/ORANGE/WATERMELON', 'TF001.jpg', 'Table Fan'),
(47, 'TF002', 45, 'BLACK/WHITE/BLUE', 'TF002.jpg', 'Table Fan'),
(48, 'TF003', 40, 'RED/BLUE/GREEN (BLADE ONLY)', 'TF003.jpg', 'Table Fan'),
(49, 'TF004', 30, 'BLACK/BLUE/GREEN/PINK/YELLOW', 'TF004.jpg', 'Table Fan'),
(50, 'TF005', 73, 'BLACK/WHITE/RED', 'TF005.jpg', 'Table Fan'),
(51, 'TF006', 57, 'MINION/SPONGEBOB/MONSTER INC./MICKEY MOUSE', 'TF006.jpg', 'Table Fan'),
(52, 'TF007', 350, 'BRONZE/GOLD/SILVER/BRUSHED ALUMINIUM', 'TF007.jpg', 'Table Fan'),
(53, 'TF008', 120, 'BLUE/RED/GREEN/YELLOW/TURQOISE/MAGENTA/CYAN', 'TF008.jpg', 'Table Fan'),
(54, 'TF009', 63, 'BLACK/WHITE/RED/YELLOW/PURPLE/GREEN', 'TF009.jpg', 'Table Fan'),
(55, 'TF010', 43, 'PINK/GREEN/YELLOW/TURQOISE', 'TF010.jpg', 'Table Fan'),
(56, 'CF001', 150, 'BLACK/BROWN', 'CF001.jpg', 'Ceiling Fan'),
(57, 'CF002', 130, 'WHITE GOLD/ROSE GOLD/BLACK GOLD', 'CF002.jpg', 'Ceiling Fan'),
(58, 'CF003', 230, 'OAK/MAPLE', 'CF003.jpg', 'Ceiling Fan'),
(59, 'CF004', 260, '5 BLADE/4 BLADE', 'CF004.jpg', 'Ceiling Fan'),
(60, 'CF005', 130, 'BLACK/DARK BROWN', 'CF005.jpg', 'Ceiling Fan'),
(61, 'CF006', 100, 'WHITE/BLACK/RED', 'CF006.jpg', 'Ceiling Fan'),
(62, 'CF007', 270, 'BROWN GOLD/BLACK WHITE/RED GOLD/BLACK GOLD', 'CF007.jpg', 'Ceiling Fan'),
(63, 'CF008', 310, 'MAPLE WOOD', 'CF008.jpg', 'Ceiling Fan'),
(64, 'CF009', 270, 'BAMBOO/OAK/MAPLE', 'CF009.jpg', 'Ceiling Fan'),
(65, 'CF010', 670, 'BAMBOO/OAK/MAPLE', 'CF010.jpg', 'Ceiling Fan'),
(66, 'SF01', 67, 'BROWN/BLACK', 'SF01.jpg', 'Stand Fan'),
(67, 'SF02', 89, 'BLACK/SILVER', 'SF02.jpg', 'Stand Fan'),
(68, 'SF03', 67, 'BLACK', 'SF03.jpg', 'Stand Fan'),
(77, 'SF04', 129, 'BROWN/BLACK/SILVER', 'SF00.jpg', 'Stand Fan'),
(70, 'SF05', 90, 'BLUE/WHITE', 'SF05.jpg', 'Stand Fan'),
(71, 'SF06', 99, 'WHITE/BLUE', 'SF06.jpg', 'Stand Fan'),
(72, 'SF08', 99, 'WHITE/RED', 'SF08.jpg', 'Stand Fan'),
(73, 'SF07', 120, 'BLACK', 'SF07.jpg', 'Stand Fan'),
(75, 'SF09', 116, 'RED', 'SF09.jpg', 'Stand Fan'),
(83, 'SF12', 120, 'RED/WHITE', '8.jpg', 'Stand Fan'),
(81, 'SF10', 100, 'WHITE/PINK', '6.jpg', 'Stand Fan'),
(82, 'SF11', 111, 'BLACK', '7.jpg', 'Stand Fan'),
(84, 'SF13', 50, 'PURPLE', '2.jpg', 'Stand Fan'),
(85, 'SF14', 60, 'WHITE', '5.jpg', 'Stand Fan'),
(86, 'SF15', 123, 'BLACK', '9.jpg', 'Stand Fan'),
(87, 'SF16', 160, 'GOLDEN WOOD', '4.jpg', 'Stand Fan'),
(88, 'SF17', 66, 'PURPLE', '1.jpg', 'Stand Fan'),
(89, 'SF18', 74, 'RED', '3.jpg', 'Stand Fan');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(10) NOT NULL,
  `statusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `statusName`) VALUES
(1, 'Waiting Payment'),
(2, 'Complete'),
(3, 'Waiting Confirmation'),
(4, 'Payment Made'),
(5, 'Cancel'),
(6, 'Waiting Customer Payment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`),
  ADD UNIQUE KEY `billID` (`billID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `corder`
--
ALTER TABLE `corder`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `num` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
