-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 05:03 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_event_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `Cat_Id` int(11) NOT NULL,
  `Cat_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`Cat_Id`, `Cat_Name`) VALUES
(11, 'basketball'),
(3, 'Cricket'),
(9, 'Cycling'),
(5, 'Football'),
(12, 'Running'),
(10, 'swimming'),
(7, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `Name` varchar(150) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Enable',
  `Featured` varchar(5) NOT NULL DEFAULT 'No',
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`Name`, `Description`, `Date`, `Image`, `Category`, `Status`, `Featured`, `Id`) VALUES
('FIFA World Cup', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-07-15', 'photo-1551385093-ad3fb362dc43.jpg', 'Football', 'enable', 'No', 7),
('Roland Garros', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-07-07', 'NEW-aim_cover-interna1100x416_sport.jpg', 'Tennis', 'enable', 'No', 8),
('ICC World Cup', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-07-31', 'photo-1593766788306-28561086694e.jpg', 'Cricket', 'enable', 'No', 9),
('The Berlin Six', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-08-12', 'photo-1530818021323-3d2bf2af7a87.jpg', 'Cycling', 'enable', 'No', 10),
('backstroke', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-09-10', 'photo-1519209233471-a93512eebb72.jpg', 'swimming', 'enable', 'No', 11),
('Junkanoo Jam', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-07-17', 'photo-1533923156502-be31530547c4.jpg', 'basketball', 'disable', 'No', 12),
('The Big Five Marathon', 'Sporting event means an athletic activity requiring skill or physical prowess', '2021-07-23', 'photo-1452626038306-9aae5e071dd3.jpg', 'Running', 'disable', 'No', 13);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`, `phone`) VALUES
('shahan', '123', 1703844436);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`Cat_Id`),
  ADD UNIQUE KEY `Cat_Name` (`Cat_Name`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `Cat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
