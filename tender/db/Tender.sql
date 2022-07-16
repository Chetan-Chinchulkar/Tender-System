-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2022 at 06:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tender`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(12) NOT NULL,
  `username` char(12) NOT NULL,
  `password` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `username`, `password`) VALUES
(1122, 'admin', 'admin123'),
(1128, 'aaaa', 'aaaa'),
(1130, 'chetan', 'chetan');

-- --------------------------------------------------------

--
-- Table structure for table `tender_table`
--

CREATE TABLE `tender_table` (
  `userid` int(11) DEFAULT NULL,
  `SerialNo` int(11) NOT NULL,
  `City` text DEFAULT NULL,
  `States` text DEFAULT NULL,
  `ClientName` text DEFAULT NULL,
  `Descriptions` text DEFAULT NULL,
  `TenderNumber` text DEFAULT NULL,
  `TenderDate` date DEFAULT NULL,
  `TenderNIT` blob DEFAULT NULL,
  `WebLink` text DEFAULT NULL,
  `PreBidDate` date DEFAULT NULL,
  `PreBidTime` time DEFAULT NULL,
  `LastDate` date DEFAULT NULL,
  `SubmissionTime` mediumtext DEFAULT NULL,
  `ModeSubmission` text DEFAULT NULL,
  `HardcopyType` int(11) DEFAULT NULL,
  `SoftcopyEmail` text DEFAULT NULL,
  `SoftcopyLink` text DEFAULT NULL,
  `SoftCopyFile` blob DEFAULT NULL,
  `TenderFee` text DEFAULT NULL,
  `ModePayment` text DEFAULT NULL,
  `Amount` float DEFAULT NULL,
  `InFavourOf` text DEFAULT NULL,
  `UTR` blob DEFAULT NULL,
  `TenderEMD` text DEFAULT NULL,
  `ModePay` text DEFAULT NULL,
  `EMDAmount` float DEFAULT NULL,
  `EMDInFavour` text DEFAULT NULL,
  `EMDFile` blob DEFAULT NULL,
  `ManPower` text DEFAULT NULL,
  `ManpowerOption` text DEFAULT NULL,
  `Personal Required` text DEFAULT NULL,
  `PPT` text DEFAULT NULL,
  `pptDate` date DEFAULT NULL,
  `pptTime` time DEFAULT NULL,
  `Venue` text DEFAULT NULL,
  `Allocation` text DEFAULT NULL,
  `TechOpening` date DEFAULT NULL,
  `StatusUpdate` text DEFAULT NULL,
  `FinancialOpening` date DEFAULT NULL,
  `Remarks` double DEFAULT NULL,
  `Refund` text DEFAULT NULL,
  `Performance` text DEFAULT NULL,
  `ContractSign` text DEFAULT NULL,
  `ContractPeriod` text DEFAULT NULL,
  `Expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tender_table`
--

INSERT INTO `tender_table` (`userid`, `SerialNo`, `City`, `States`, `ClientName`, `Descriptions`, `TenderNumber`, `TenderDate`, `TenderNIT`, `WebLink`, `PreBidDate`, `PreBidTime`, `LastDate`, `SubmissionTime`, `ModeSubmission`, `HardcopyType`, `SoftcopyEmail`, `SoftcopyLink`, `SoftCopyFile`, `TenderFee`, `ModePayment`, `Amount`, `InFavourOf`, `UTR`, `TenderEMD`, `ModePay`, `EMDAmount`, `EMDInFavour`, `EMDFile`, `ManPower`, `ManpowerOption`, `Personal Required`, `PPT`, `pptDate`, `pptTime`, `Venue`, `Allocation`, `TechOpening`, `StatusUpdate`, `FinancialOpening`, `Remarks`, `Refund`, `Performance`, `ContractSign`, `ContractPeriod`, `Expiry`) VALUES
(1122222, 14, 'sadfdsf', 'sdfsda', 'fsdafdas', 'fads', '', '2022-07-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 15, 'asdfasdf', 'asdfads', 'fadsfasdf', 'sdafasdfad', '44', '2022-07-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 16, 'asdfasd', 'fsdaf', 'sdafasd', 'fsdaf', '21', '2022-07-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 17, 'asdfsd', 'fsdfsdafsdf', 'dsfdsafd', 'safsdfsda', '222', '2022-07-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 18, 'sdfsadfds', 'fdsfdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 19, 'fasdfsdaf', 'sdfsdfasd', 'fasdfsadf', 'staff', '21', '2022-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 20, 'fasdfsdaf', 'sdfsdfasd', 'fasdfsadf', 'staff', '21', '2022-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 21, 'sdfs', 'sdfads', 'sdfsdaf', 'dsafsd', '2222', '2022-07-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 22, 'sdfsd', 'dskajf', 'fkjsdlaf', 'fksjdl', '32', '2022-07-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 23, 'wani', 'sdfas', 'sdfasd', 'fsdafk', '23', '2022-07-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 24, 'sadfsda', 'fasdfsdaf', 'sdfsad', 'fasdfsd', 'asdfasd', '2022-07-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 25, 'asdf', 'asdfsdaf', 'sdfasdf', 'sdfsdf', '12', '2022-07-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 26, 'adsaf', 'asdf', 'asdf', 'dsfads', '1111', '2022-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1128, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, 28, 'dsafdas', 'fdsaf', 'sadfsdafsd', 'afdasfsda', 'fsadfdsa', '2022-07-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0x30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tender_table`
--
ALTER TABLE `tender_table`
  ADD PRIMARY KEY (`SerialNo`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1131;

--
-- AUTO_INCREMENT for table `tender_table`
--
ALTER TABLE `tender_table`
  MODIFY `SerialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
