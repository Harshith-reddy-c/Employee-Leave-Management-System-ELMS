-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 05:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeeleavedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `fullname`, `email`, `updationDate`) VALUES
(4, 'harshith', '25d55ad283aa400af464c76d713c07ad', 'Harshith Reddy C', 'harshithreddyc2003@gmail.com', '2023-11-12 15:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(2, 'Information Technology', 'IT', 'IT807', '2023-11-11 21:28:56'),
(5, 'Marketing', 'MK', 'MK369', '2023-11-11 21:28:56'),
(6, 'Finance', 'FI', 'FI123', '2023-11-11 21:28:56'),
(7, 'Sales', 'SS', 'SS469', '2023-11-11 21:28:56'),
(8, 'Research', 'RS', 'RS666', '2023-11-11 21:28:56'),
(9, 'Human Resource', 'HR', 'HR160', '2023-11-21 09:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`) VALUES
(9, '563125', 'Harshith ', 'Reddy C', 'harshithreddyc2003@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '2003-02-15', 'Human Resource', 'Chintamani, Chikkaballapura, Karnataka', 'Chintamani', 'India', '8088056626', 1, '2023-11-12 15:17:16'),
(10, '2', 'Harsha', 'C', 'harsha2003@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '2003-01-01', 'Information Technology', 'Karnataka', 'Chintamani', 'India', '9035525052', 1, '2023-11-21 09:26:49'),
(11, '3', 'Bharat', 'B', 'invalid@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Male', '', 'Sales', ' Karnataka', 'Bangalore', 'India', 'afehkj', 0, '2023-11-22 03:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`) VALUES
(25, 'Casual Leave', '2020-03-05', '2020-03-05', 'nothing', '2023-11-14 06:27:09', 'No proper Leave Conditions', '2023-11-21 14:59:21 ', 2, 1, 9),
(26, 'Medical Leave', '2020-03-05', '2020-03-05', 'abd', '2023-11-14 06:27:19', 'k\r\n', '2023-11-16 9:12:29 ', 1, 1, 9),
(27, 'Casual Leave', '2020-03-03', '2020-03-05', '', '2023-11-16 03:47:31', 'NA', '2023-11-21 14:51:58 ', 1, 1, 9),
(28, 'Casual Leave', '2020-03-05', '2020-03-06', '', '2023-11-21 09:01:03', 'invalid info', '2023-11-21 14:36:33 ', 2, 1, 9),
(29, 'Casual Leave', '2020-03-05', '2020-03-05', '.', '2023-11-21 09:38:51', NULL, NULL, 0, 1, 9),
(30, 'Religious Holidays', '2023-11-25', '2023-11-30', '.', '2023-11-21 09:39:30', 'No proper Leave Conditions', '2023-11-22 8:56:58 ', 2, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(1, 'Casual Leave', 'Provided for urgent or unforeseen matters to the employees.', '2023-11-11 23:35:06'),
(3, 'Restricted Holiday', 'Holiday that is optional', '2023-11-11 23:35:06'),
(7, 'Compensatory Leave', 'For Overtime workers', '2023-11-11 23:35:06'),
(9, 'Religious Holidays', 'Based on employee\'s followed religion', '2023-11-11 23:35:06'),
(10, 'Adverse Weather Leave', 'In terms of extreme weather conditions', '2023-11-11 23:35:06'),
(11, 'Voting Leave', 'For official election day', '2023-11-11 23:35:06'),
(12, 'Self-Quarantine Leave', 'Related to COVID-19 issues', '2023-11-11 23:35:06'),
(13, 'Personal Time Off', 'To manage some private matters', '2023-11-11 23:35:06'),
(14, 'Medical Leave', 'Related to Health Problems of Employee', '2023-11-21 09:14:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
