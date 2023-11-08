-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 03:37 AM
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
-- Database: `aalambana_db`
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
(39, 'Blog Title1', 'Author1', 'Description1', 'https://youtu.be/k9em7Ey00xQ', '2023-11-06 20:33:09', '2023-11-06 20:33:09'),
(40, 'Blog Title2', 'Author2', 'Description2', '', '2023-11-06 20:33:37', '2023-11-06 20:33:37'),
(41, 'Blog Title3', 'Author3', 'Description3', '', '2023-11-06 20:34:08', '2023-11-06 20:34:08'),
(42, 'Blog Title4', 'Author4', 'Description4', '', '2023-11-06 20:34:37', '2023-11-06 20:34:37'),
(43, 'Blog Title5', 'Author5', 'Description5', '', '2023-11-06 20:35:24', '2023-11-06 20:35:24'),
(44, 'Blog Title6', 'Author6', 'Description6', '', '2023-11-06 20:35:46', '2023-11-06 20:35:46'),
(45, 'Blog Title7', 'Author7', 'Description7', '', '2023-11-06 20:36:11', '2023-11-06 20:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `Comment_Id` int(11) NOT NULL,
  `Blog_Id` int(11) DEFAULT NULL,
  `Paragraph` text NOT NULL,
  `Created_Time` timestamp NULL DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(21, 39, 'images/blog_pictures/65493f752f6947.00110101.jpg'),
(22, 40, 'images/blog_pictures/65493f91c4f978.64073287.jpg'),
(23, 41, 'images/blog_pictures/65493fb0147a34.50160538.jpg'),
(24, 42, 'images/blog_pictures/65493fcd93bd00.75092656.jpg'),
(25, 43, 'images/blog_pictures/65493ffc9b0a39.52529038.jpg'),
(26, 44, 'images/blog_pictures/654940129a4f76.32594610.jpg'),
(27, 45, 'images/blog_pictures/6549402b13df46.83020739.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_story`
--

CREATE TABLE `blog_story` (
  `Story_Id` int(11) NOT NULL,
  `Blog_Id` int(11) DEFAULT NULL,
  `Paragraph` text NOT NULL,
  `About_Author` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_story`
--

INSERT INTO `blog_story` (`Story_Id`, `Blog_Id`, `Paragraph`, `About_Author`) VALUES
(22, 39, 'Blog Paragraph1', 'Author Description1'),
(23, 45, 'Blog Paragraph7', 'Author Description7'),
(24, 44, 'Blog Paragraph6', 'Author Description6');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_Id` int(11) NOT NULL,
  `Title` int(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Video_Link` varchar(255) DEFAULT NULL,
  `Event_Date` datetime DEFAULT NULL,
  `Create_Time` datetime DEFAULT NULL,
  `Modified_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_pictures`
--

CREATE TABLE `event_pictures` (
  `Event_Id` int(11) NOT NULL,
  `Location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_pictures`
--

INSERT INTO `event_pictures` (`Event_Id`, `Location`) VALUES
(1, 'images/event_pictures/654abb793cf0d.'),
(2, 'images/event_pictures/654abb9ccf77a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `hash` varchar(200) NOT NULL,
  `active` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `modified_time` date NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hash`, `active`, `role`, `modified_time`, `created_time`) VALUES
(1, 'Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(2, 'Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(3, 'Ahala', '', 'ahala@abcd.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(4, 'SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(5, 'Happy', 'Josyula', 'happy@abcd.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(6, 'ics499', '12345', 'ics499@abcd.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(9, 'admin', 'admin', 'admin@admin.com', '$2y$10$6gPbUgQrTQjjUWWz2NwjNu3B3.fcZ9W.LkRL11CJar5UO3gCU1Mby', 'yes', 'admin', '0000-00-00', '0000-00-00'),
(10, 'Israel', 'Love', 'israel.love@my.metrostate.edu', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 'yes', 'user', '0000-00-00', '0000-00-00'),
(11, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$I2fp1ZFLTiKhonjteDCpBuI3i/o0s1H6CBgSeSyuc7PKexyamapgG', '81448138f5', 'user', '0000-00-00', '0000-00-00'),
(12, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$VLTZlUKTCGnkKsmMhrikOuzp1cB76ixaoIy4HPOMHWVrmXTTer55G', '8dd48d6a2e', 'user', '0000-00-00', '0000-00-00'),
(13, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$KYCYI.XEPt2d/XPVnzUV8OVsOFao/3rIHBBxr.DCBixyUgLpprCxS', '5737c6ec2e', 'user', '0000-00-00', '0000-00-00'),
(14, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$5o2DpsNy92iFJ4Cyktqi3.waUl6IwNfXm2fx8Y5yiVHP27ue.B7dG', '352fe25daf', 'user', '0000-00-00', '0000-00-00'),
(15, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$qI8NV39nOXSMEgxJOh.3P.BBBjCJEwKfijSADdUd6uKcMrodbeE4u', '8e98d81f82', 'user', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `Picture_Id` int(11) NOT NULL,
  `Blog_Id` int(11) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`Picture_Id`, `Blog_Id`, `Location`) VALUES
(6, 22, 'images/blog_pictures/65371530989501.90488542.jpg'),
(9, 26, 'images/blog_pictures/6538627d343777.61810942.jpg'),
(10, 27, 'images/blog_pictures/65386e301700c8.47196175.jpg'),
(11, 28, 'images/blog_pictures/653922fc26c3f9.52815194.jpg'),
(13, 30, 'images/blog_pictures/653a6d2e0afa26.08642205.jpg'),
(14, 31, 'images/blog_pictures/653a6e4b5f4bc8.42880896.jpg'),
(15, 32, 'images/blog_pictures/653a6e6ac89d49.28070896.jpg'),
(16, 33, 'images/blog_pictures/653a8b928d5797.54334947.jpg'),
(17, 34, 'images/blog_pictures/653a8bb88fb2f0.31269026.jpg'),
(19, 36, 'images/blog_pictures/653aec19e43e64.17197132.jpg'),
(20, 37, 'images/blog_pictures/653aec345f00e0.67092487.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`Blog_Id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`Comment_Id`);

--
-- Indexes for table `blog_pictures`
--
ALTER TABLE `blog_pictures`
  ADD PRIMARY KEY (`Picture_Id`);

--
-- Indexes for table `blog_story`
--
ALTER TABLE `blog_story`
  ADD PRIMARY KEY (`Story_Id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_Id`);

--
-- Indexes for table `event_pictures`
--
ALTER TABLE `event_pictures`
  ADD PRIMARY KEY (`Event_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`Picture_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `Blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_pictures`
--
ALTER TABLE `blog_pictures`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `blog_story`
--
ALTER TABLE `blog_story`
  MODIFY `Story_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_pictures`
--
ALTER TABLE `event_pictures`
  MODIFY `Event_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
