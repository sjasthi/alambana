-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 02:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alambana_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `Blog_Id` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `Description` text NOT NULL,
  `Video_Link` varchar(200) DEFAULT NULL,
  `Modified_Time` datetime DEFAULT NULL,
  `Created_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`Blog_Id`, `Title`, `Author`, `Description`, `Video_Link`, `Modified_Time`, `Created_Time`) VALUES
(1, 'A1', 'A1', 'test test test1', '', '2023-10-17 18:58:14', '2023-10-17 18:58:14'),
(2, 'A2', 'A2', 'test test test2', '', '2023-10-17 18:58:14', '2023-10-17 18:58:14'),
(3, 'A3', 'A3', 'test test test3', '', '2023-10-17 18:58:14', '2023-10-17 18:58:14'),
(4, 'A4', 'A4', 'test test test4', '', '2023-10-17 18:58:14', '2023-10-17 18:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_pictures`
--

CREATE TABLE `blog_pictures` (
  `Picture_Id` int(11) NOT NULL,
  `Blog_Id` int(11) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_pictures`
--

INSERT INTO `blog_pictures` (`Picture_Id`, `Blog_Id`, `Location`) VALUES
(1, 1, 'images/blog_pictures/652ebd26a63459.77716501.jpg'),
(2, 2, 'images/blog_pictures/652ebd26a63459.77716501.jpg'),
(3, 3, 'images/blog_pictures/652ebd26a63459.77716501.jpg'),
(4, 4, 'images/blog_pictures/652ebd26a63459.77716501.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`Blog_Id`);

--
-- Indexes for table `blog_pictures`
--
ALTER TABLE `blog_pictures`
  ADD PRIMARY KEY (`Picture_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `Blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog_pictures`
--
ALTER TABLE `blog_pictures`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





--
-- TABLE STRUCTURE FOR TABLE 'events'

CREATE TABLE `events` (
  `Event_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Video_Link` varchar(200) DEFAULT NULL,
  `Event_Date` datetime DEFAULT NULL,
  `Created_Time` datetime DEFAULT NULL,
  `Modified_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`Event_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Dumping data for table `events`
INSERT INTO `events` (`Event_Id`, `Title`, `Description`, `Video_Link`, `Event_Date`, `Created_Time`, `Modified_Time`) VALUES
(1, 'Event 1', 'Description for Event 1', ' ', '2023-10-18 10:00:00', '2023-10-18 09:00:00', '2023-10-18 09:30:00'),
(2, 'Event 2', 'Description for Event 2', ' ', '2023-10-19 14:00:00', '2023-10-19 13:00:00', '2023-10-19 13:30:00');



  -- Create the event_pictures table
CREATE TABLE `event_pictures` (
  `Picture_Id` int(11) NOT NULL,
  `Event_Id` int(11) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Insert data into the event_pictures table
INSERT INTO `event_pictures` (`Event_Id`, `Location`) VALUES
(1, 'images/event_pictures/event1_picture.jpg'),
(1, 'images/event_pictures/event1_picture_2.jpg'),
(2, 'images/event_pictures/event2_picture.jpg'),
(3, 'images/event_pictures/event3_picture.jpg');
