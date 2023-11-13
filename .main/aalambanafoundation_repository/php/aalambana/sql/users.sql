-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 07:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aalambana`
--

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
  `token` int(11) NOT NULL,
  `modified_time` date NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hash`, `active`, `role`, `token`, `modified_time`, `created_time`) VALUES
(1, 'Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(2, 'Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(3, 'Ahala', '', 'ahala@abcd.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(4, 'SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(5, 'Happy', 'Josyula', 'happy@abcd.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(6, 'ics499', '12345', 'ics499@abcd.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(9, 'admin', 'admin', 'admin@admin.com', '$2y$10$6gPbUgQrTQjjUWWz2NwjNu3B3.fcZ9W.LkRL11CJar5UO3gCU1Mby', 'yes', 'admin', 0, '0000-00-00', '0000-00-00'),
(10, 'Israel', 'Love', 'israel.love@my.metrostate.edu', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 'yes', 'user', 0, '0000-00-00', '0000-00-00'),
(11, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$I2fp1ZFLTiKhonjteDCpBuI3i/o0s1H6CBgSeSyuc7PKexyamapgG', '81448138f5', 'user', 0, '0000-00-00', '0000-00-00'),
(12, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$VLTZlUKTCGnkKsmMhrikOuzp1cB76ixaoIy4HPOMHWVrmXTTer55G', '8dd48d6a2e', 'user', 0, '0000-00-00', '0000-00-00'),
(13, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$KYCYI.XEPt2d/XPVnzUV8OVsOFao/3rIHBBxr.DCBixyUgLpprCxS', '5737c6ec2e', 'user', 0, '0000-00-00', '0000-00-00'),
(14, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$5o2DpsNy92iFJ4Cyktqi3.waUl6IwNfXm2fx8Y5yiVHP27ue.B7dG', '352fe25daf', 'user', 0, '0000-00-00', '0000-00-00'),
(15, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$qI8NV39nOXSMEgxJOh.3P.BBBjCJEwKfijSADdUd6uKcMrodbeE4u', '8e98d81f82', 'user', 0, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
