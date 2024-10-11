-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 12:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taswit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `roleID` tinyint(4) NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Date` date NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `companyID` int(11) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`UserID`, `Name`, `Password`, `Email`, `roleID`, `Status`, `Date`, `avatar`, `companyID`, `Position`, `Phone`) VALUES
(1, 'admin', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'khaled@taswit.io', 1, 1, '2022-03-17', '', 1, 'CEO', ''),
(2, 'test', '', 'test@test.com', 1, 0, '2022-03-30', '', 11, 'test', '124124124124'),
(4, 'test USER', '', 'test@test.com', 2, 0, '2022-03-30', '', 1, 'test', '242424242424');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `adminID` int(11) NOT NULL,
  `regDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `Name`, `Description`, `adminID`, `regDate`) VALUES
(1, 'CocaCola', 'Evil Company', 1, '2022-03-17'),
(2, 'Pepsi', 'Good Company', 1, '2022-03-17'),
(3, 'test', 'test', 1, '2022-03-30'),
(4, 'aa', 'aa', 0, '2022-03-30'),
(6, 'sss', 'ssss', 0, '2022-03-30'),
(7, 'sss', 'ssss', 0, '2022-03-30'),
(8, 'aaaa', 'aaaa', 0, '2022-03-30'),
(9, 'aaaa', 'aaaa', 0, '2022-03-30'),
(10, 'aaaa', 'aaaa', 0, '2022-03-30'),
(11, 'teststst', 'teststst', 0, '2022-03-30'),
(12, 'TestX', 'hello', 0, '2022-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `regDate` date NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `companyID` int(11) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Password`, `Email`, `Status`, `regDate`, `avatar`, `companyID`, `Position`, `Phone`) VALUES
(2, 'khaled', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'khaled@taswit.io', 1, '2022-03-17', '', 1, 'CEO', ''),
(3, 'test', '', 'test@test.com', 1, '2022-03-30', '', 6, 'test', '2315125215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Name`,`Email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Name`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
