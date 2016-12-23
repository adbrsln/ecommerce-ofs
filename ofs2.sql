-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 11:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
  `imglink` varchar(40) NOT NULL,
  `tmpayment` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`num`, `transactionid`, `item_id`, `user_id`, `qty`, `total`, `ftotal`, `discount`, `tdisc`, `pos`, `status`, `imglink`, `tmpayment`) VALUES
(14, 'im23421ogglom8u70996frlkr3', 57, '16', 1, 130, 130, 0, 0, 'Your Postage is Free', 'Waiting Confirmation', '', '0000-00-00 00:00:00'),
(16, 'gaqpje2922mvg78kp1gp2800l7', 48, '16', 1, 40, 40, 0, 0, 'You have to pay RM 6 to cover the postage Fees', 'Waiting Confirmation', '', '0000-00-00 00:00:00'),
(15, 'p9f9ehg7i20bppl3m6nucem2i2', 57, '16', 1, 130, 130, 0, 0, 'Your Postage is Free', 'Waiting Confirmation', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `num` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `loginID` int(50) NOT NULL,
  `address` text NOT NULL,
  `notel` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`num`, `name`, `loginID`, `address`, `notel`) VALUES
(2, 'Muhammad Adib bin Ahmad Roslan', 7, '31 , Jalan Batu 2, BB4, Bukit Gambir ,48300 Selangor', '0176213816'),
(3, 'Cust1', 8, '', ''),
(4, 'Cust3', 9, '', ''),
(5, 'Cust33', 10, '', ''),
(6, '', 11, '', ''),
(7, 'Muhammad Kalatono', 12, 'Tambiro jalan kubur 2', '017626262'),
(8, '', 13, '', ''),
(9, 'Muhammad Iskandar Bin Jaafar', 14, '', ''),
(10, 'Muhammad Muinnudin', 15, '', ''),
(11, 'Coklet Boot', 16, '', ''),
(12, 'Pudding', 17, 'No 9 Taman Bahagia Jalan Pasar', '017'),
(13, 'Puding', 18, '', ''),
(14, 'Acap', 19, '', ''),
(15, 'Aminah', 20, '', ''),
(16, 'Customer', 21, '', '');

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `num` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`num`, `username`, `password`, `level`) VALUES
(4, 'user', '6ad14ba9986e3615423dfca256d04e3f', 2),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(21, 'cust', '3aad3506aa11f05f265ea8304b8152b3', 3);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`num`);

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
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `num` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
