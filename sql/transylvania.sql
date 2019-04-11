-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 07:46 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transylvania`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Sl` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `RoomNumber` int(11) NOT NULL,
  `TotalMember` int(11) NOT NULL,
  `Adult` int(11) NOT NULL,
  `Children` int(11) NOT NULL,
  `Infant` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BookedFor` varchar(20) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `status` enum('BOOKED','CANCELED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Sl`, `Name`, `RoomNumber`, `TotalMember`, `Adult`, `Children`, `Infant`, `DateTime`, `BookedFor`, `Contact`, `status`) VALUES
(1, 'Mr. ABC', 703, 2, 1, 1, 0, '2019-04-11 05:32:58', '2019-04-29', '6048854419', 'BOOKED'),
(2, 'Mr. ABC', 702, 4, 2, 1, 1, '2019-04-11 05:32:58', '2019-04-29', '6064102281', 'BOOKED'),
(3, 'Mr. ABC', 701, 7, 2, 3, 2, '2019-04-11 05:32:58', '2019-04-29', '6024822404', 'BOOKED'),
(4, 'Mr. ABC', 706, 6, 3, 1, 2, '2019-04-11 05:33:11', '2019-04-29', '6011506160', 'BOOKED'),
(5, 'Mr. ABC', 705, 6, 3, 1, 2, '2019-04-11 05:33:11', '2019-04-29', '6062930922', 'BOOKED'),
(6, 'Mr. ABC', 707, 5, 2, 2, 1, '2019-04-11 05:33:20', '2019-04-29', '6059156069', 'BOOKED'),
(7, 'Mr. ABC', 706, 3, 1, 1, 1, '2019-04-11 05:33:48', '2019-04-30', '6085468319', 'BOOKED'),
(8, 'Mr. ABC', 710, 3, 1, 1, 1, '2019-04-11 05:33:48', '2019-04-30', '6047328853', 'BOOKED'),
(9, 'Mr. ABC', 701, 3, 1, 1, 1, '2019-04-11 05:33:48', '2019-04-30', '6014401560', 'BOOKED'),
(10, 'Mr. ABC', 703, 6, 3, 2, 1, '2019-04-11 05:39:05', '2019-04-30', '6093558358', 'BOOKED'),
(11, 'Mr. ABC', 702, 5, 3, 2, 0, '2019-04-11 05:39:05', '2019-04-30', '6027567426', 'BOOKED'),
(12, 'Mr. ABC', 706, 3, 2, 1, 0, '2019-04-11 05:39:36', '2019-04-22', '6011192299', 'BOOKED'),
(13, 'Mr. ABC', 710, 5, 2, 3, 0, '2019-04-11 05:39:36', '2019-04-22', '6012430514', 'BOOKED'),
(14, 'Mr. ABC', 701, 6, 3, 0, 3, '2019-04-11 05:39:36', '2019-04-22', '6050285675', 'BOOKED'),
(15, 'Mr. ABC', 704, 7, 2, 3, 2, '2019-04-11 05:44:42', '2019-04-29', '6016168807', 'BOOKED'),
(16, 'Mr. ABC', 709, 6, 2, 2, 2, '2019-04-11 05:44:55', '2019-04-29', '6059999513', 'BOOKED'),
(17, 'Mr. ABC', 710, 3, 1, 1, 1, '2019-04-11 05:44:55', '2019-04-29', '6057910996', 'BOOKED'),
(18, 'Mr. ABC', 704, 5, 2, 2, 1, '2019-04-11 05:45:31', '2019-04-30', '6012051293', 'BOOKED'),
(19, 'Mr. ABC', 707, 3, 1, 1, 1, '2019-04-11 05:45:59', '2019-04-30', '6072796321', 'BOOKED'),
(20, 'Mr. ABC', 709, 3, 1, 1, 1, '2019-04-11 05:45:59', '2019-04-30', '6075932918', 'BOOKED');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Sl` int(11) NOT NULL,
  `RoomNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Sl`, `RoomNumber`) VALUES
(1, 701),
(2, 702),
(3, 703),
(4, 704),
(5, 705),
(6, 706),
(7, 707),
(8, 708),
(9, 709),
(10, 710);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Sl`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
