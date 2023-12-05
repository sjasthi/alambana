-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 04:06 AM
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
  `Created_Time` datetime DEFAULT NULL,
  `hash` varchar(200) NOT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `Visitor_Count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`Blog_Id`, `Title`, `Author`, `Description`, `Video_Link`, `Modified_Time`, `Created_Time`, `hash`, `hidden`, `Visitor_Count`) VALUES
(84, 'Blog Title 16', 'CS320, SILC', 'Description 12', 'https://youtu.be/3cZhu9hTals', '2023-11-21 02:28:31', '2023-11-19 20:42:06', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 0, 2),
(85, 'Blog Title 11', 'Love, Israel', 'Description 11', '', '2023-11-20 20:44:55', '2023-11-19 20:43:04', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 2),
(86, 'Blog Title 100', 'Love, Israel', 'Description 100', 'https://youtu.be/NAmQ2zfH3jY', '2023-11-28 03:16:05', '2023-11-19 20:44:04', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 1),
(87, 'Blog Title 9', 'Love, Israel', 'Description 9', '', '2023-11-19 20:44:21', '2023-11-19 20:44:21', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 1),
(88, 'Blog Title 8', 'Love, Israel', 'Description 8', '', '2023-11-19 20:44:51', '2023-11-19 20:44:51', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 1),
(89, 'Blog Title 77', 'Love, Israel', 'Description 7', '', '2023-11-28 02:02:05', '2023-11-19 20:45:13', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 2),
(90, 'Blog Title 6', 'Love, Israel', 'Description 6', '', '2023-11-19 20:45:28', '2023-11-19 20:45:28', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 26),
(91, 'Blog Title 5', 'Love, Israel', 'Description 5', '', '2023-11-19 20:45:56', '2023-11-19 20:45:56', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 0),
(92, 'Blog Title 4', 'Love, Israel', 'Description 4', '', '2023-11-19 20:46:13', '2023-11-19 20:46:13', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 0),
(93, 'Blog Title 3', 'Love, Israel', 'Description 3', '', '2023-11-19 20:46:32', '2023-11-19 20:46:32', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 1),
(94, 'Blog Title 2', 'Love, Israel', 'Description 2', '', '2023-11-28 03:12:15', '2023-11-19 20:46:46', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 19),
(95, 'Blog Title 1', 'Love, Israel', 'Description 1', '', '2023-11-20 20:49:28', '2023-11-19 20:47:04', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0, 3),
(96, 'Blog Title admin1', 'admin, admin', 'Description admin', 'https://youtu.be/k9em7Ey00xQ', '2023-11-30 20:47:21', '2023-11-19 21:11:03', '$2y$10$hrX3CNhfnU6HHRGUSqMgrup9w9rniZjevhWOvoHoJx3h02xw6pk5i', 0, 10),
(97, 'Blog Title New User', 'Johnson, Tom', 'Description New User', '', '2023-11-19 21:16:28', '2023-11-19 21:16:28', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 0, 4),
(98, 'Title New X', 'Johnson, Tom', 'Description X', '', '2023-11-28 03:18:09', '2023-11-28 03:18:09', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 0, 53);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `Comment_Id` int(11) NOT NULL,
  `Blog_Id` int(11) DEFAULT NULL,
  `Paragraph` text NOT NULL,
  `Created_Time` timestamp NULL DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Subject_Id` int(11) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`Comment_Id`, `Blog_Id`, `Paragraph`, `Created_Time`, `Name`, `Subject_Id`, `email`, `url`) VALUES
(179, 95, 'Hey this is really a good site blog!', '2023-11-20 03:17:26', 'Tom', 1, 'tom.johnson@gmail.com', ''),
(180, 94, 'Very interesting read, hope to hear more from your post.', '2023-11-20 03:19:58', 'Tom', 1, 'tom.johnson@gmail.com', ''),
(181, 95, 'Are you going to make any more postings on this topic?', '2023-11-20 04:19:49', 'Tom', 2, 'tom.johnson@gmail.com', ''),
(182, 95, 'Yes, very soon!', '2023-11-20 04:21:58', 'Israel', 2, 'israel.love@my.metrostate.edu', ''),
(183, 96, 'Is this a Admin post?', '2023-11-20 04:22:39', 'Israel', 1, 'israel.love@my.metrostate.edu', ''),
(184, 97, 'Hi, is there a new post to this page', '2023-11-20 04:27:39', 'user name 1', 1, 'user1@gmail.com', ''),
(185, 97, 'I was wondering the same thing..', '2023-11-20 05:07:24', 'Deb', 1, 'deb.holt@msn.com', ''),
(186, 89, 'Hello there this is very interesting can you tell me more', '2023-11-20 23:00:07', 'Deb', 1, 'deb.holt@msn.com', ''),
(187, 89, 'Is this about planting just wondering', '2023-11-20 23:00:40', 'Deb', 2, 'deb.holt@msn.com', ''),
(188, 89, 'I\'ll come back later, looks like a good start though', '2023-11-20 23:01:07', 'Deb', 3, 'deb.holt@msn.com', ''),
(189, 89, 'Yes this is about planting and our ecosystem', '2023-11-20 23:02:12', 'Israel', 2, 'israel.love@my.metrostate.edu', ''),
(190, 89, 'I haven\'t written anything down yet but I will, thank you for your interest!', '2023-11-20 23:03:02', 'Israel', 1, 'israel.love@my.metrostate.edu', ''),
(191, 95, 'Please provide appropriate contact only. \r\nThank you', '2023-11-21 02:14:27', 'Administration', 3, 'cs320@silcmn.com', ''),
(192, 97, 'hi yu', '2023-11-22 02:37:21', 'Israel', 1, 'israel.love@my.metrostate.edu', ''),
(193, 93, 'test', '2023-11-28 07:59:10', 'user name 1', 1, 'ej7303tr@metrostate.edu', ''),
(194, 89, 'hi there!', '2023-11-28 08:02:31', 'Administration', 2, 'cs320@silcmn.com', ''),
(195, 94, 'hello to me', '2023-11-28 09:10:02', 'Tom', 1, 'tom.johnson@gmail.com', ''),
(196, 98, 'New comment!', '2023-11-28 09:19:15', 'Tom', 1, 'tom.johnson@gmail.com', ''),
(197, 97, 'tests', '2023-12-01 04:54:26', 'user name 1', 3, 'ej7303tr@metrostate.edu', '');

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
(28, 48, 'images/blog_pictures/6554f41890b446.42606833.jpg'),
(29, 49, 'images/blog_pictures/6554f621909a87.79369267.jpg'),
(30, 50, 'images/blog_pictures/6554f6a96b8172.66056853.jpg'),
(67, 87, 'images/blog_pictures/655a6595e8f2e8.47185645.jpg'),
(68, 88, 'images/blog_pictures/655a65b3cb1a05.94802641.jpg'),
(69, 89, 'images/blog_pictures/655a65c928b9e9.38424586.jpg'),
(70, 90, 'images/blog_pictures/655a65d89a0747.50571369.jpg'),
(71, 91, 'images/blog_pictures/655a65f40244d8.66522321.jpg'),
(72, 92, 'images/blog_pictures/655a6605445c31.60858895.jpg'),
(73, 93, 'images/blog_pictures/655a6618383d79.60594253.jpg'),
(76, 96, 'images/blog_pictures/655a6bd7db62e3.76003664.jpg'),
(77, 97, 'images/blog_pictures/655a6d1ca9e490.00244529.jpg'),
(81, 95, 'images/blog_pictures/655bafdef36a98.80008798.jpg'),
(82, 85, 'images/blog_pictures/655bb7156e38c0.95310575.jpg'),
(83, 84, 'images/blog_pictures/655c07bf2a2162.58934655.jpg'),
(84, 94, 'images/blog_pictures/65654c7f1bb254.75700699.jpg'),
(85, 86, 'images/blog_pictures/65654d65e78770.41360875.jpg'),
(86, 98, 'images/blog_pictures/65654de147b770.16995332.jpg');

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
(25, 51, 'Blog Paragraph', 'Author Description'),
(27, 95, 'In the serene embrace of nature, the morning sun casts a golden glow on dew-kissed petals, awakening a world of possibilities. As birds orchestrate a symphony overhead, a tranquil breeze whispers through the leaves. Amidst this ethereal canvas, each moment unfolds, offering a sanctuary for contemplation. Join me on this journey of reflection and discovery, where the beauty of simplicity dances with the profound, creating a tapestry of stories waiting to be explored.', 'Embark on a journey with a nature-inspired wordsmith who weaves tales of simplicity and reflection. With an affinity for life\'s '),
(28, 94, 'In the moment of a bustling city, where skyscrapers touch the clouds and the rhythm of life echoes through the streets, I find solace in the unexplored corners. Amidst the urban chaos, hidden gems of tranquility wait to be discovered. As I navigate this vibrant landscape, my pen becomes a guide, weaving stories that capture the essence of city life. Join me on a literary exploration, where the mundane transforms into the extraordinary, and every alleyway holds a narrative waiting to unfold.', 'Meet the author, a city dweller with a passion for uncovering the beauty within urban landscapes. With a keen eye for detail and'),
(29, 93, 'Within the realm of pixels and code, explore the digital landscapes where creativity knows no bounds. Join the author, a tech visionary, in crafting narratives that unfold in the virtual realms of innovation and imagination.', 'Journey alongside the author, a tech visionary, as they navigate the digital frontier. With a mind tuned to the frequencies of i'),
(30, 92, 'In the quiet hours of the night, delve into the realm of introspection and dreams. Join me, a nocturnal wordsmith, in weaving tales that unravel beneath the silver glow of the moon, where secrets are whispered and thoughts take flight.', 'Meet the author, a nocturnal wordsmith, whose pen dances with the rhythm of midnight musings.'),
(31, 89, 'Delve into the hidden wonders beneath our feet as we explore the intricate narrative of soil health. Join the author, a soil ecologist, in unraveling the mysteries of this living, breathing ecosystem. From microbial communities to nutrient cycles, embark on a journey that unveils the crucial role soil plays in sustaining life.', 'Embark on a soil-centric odyssey with the author, a soil ecologist, whose passion lies in decoding the secrets held by the Earth'),
(32, 98, 'New story', 'New Author');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_Id` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Video_Link` varchar(255) DEFAULT NULL,
  `Event_Date` datetime DEFAULT NULL,
  `Created_Time` datetime DEFAULT NULL,
  `Modified_Time` datetime DEFAULT NULL,
  `Event_Date_Close` datetime DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Attendees` int(11) DEFAULT NULL,
  `Paragraph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_Id`, `Title`, `Description`, `Video_Link`, `Event_Date`, `Created_Time`, `Modified_Time`, `Event_Date_Close`, `Address`, `Attendees`, `Paragraph`) VALUES
(2, 'Title2', 'Event Description2', '', '2024-02-14 16:09:00', '2023-11-19 23:09:19', '2023-11-23 00:30:43', NULL, '', NULL, 'Test Paragraph 2'),
(3, 'Title3', 'Event Description3', '', '2023-12-31 16:13:00', '2023-11-19 23:14:19', '2023-11-23 00:31:30', NULL, '', NULL, 'Test Paragraph 3'),
(4, 'Title4', 'Event Description4', '', '2024-02-24 16:08:00', '2023-11-19 23:08:43', '2023-11-23 00:31:49', NULL, '', NULL, 'Test Paragraph 4'),
(5, 'Title5', 'Event Description5', '', '2024-01-17 16:09:00', '2023-11-19 23:09:19', '2023-11-23 00:34:15', NULL, '', NULL, 'Test Paragraph 5'),
(6, 'Title6', 'Event Description6', 'https://youtu.be/NAmQ2zfH3jY', '2024-03-08 16:13:00', '2023-11-19 23:14:19', '2023-11-23 00:34:31', NULL, '', NULL, 'Test Paragraph 6');

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
(1, 'images/event_pictures/655c076b3ce83.'),
(2, 'images/event_pictures/655e8f23c49cf.jpg'),
(3, 'images/event_pictures/655e8f52c6871.jpg'),
(4, 'images/event_pictures/655e8f6549874.jpg'),
(5, 'images/event_pictures/655e8ff741a05.jpg'),
(6, 'images/event_pictures/655e90073ac17.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_comments`
--

CREATE TABLE `feedback_comments` (
  `Feedback_Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Paragraph` text NOT NULL,
  `Created_Time` timestamp NULL DEFAULT NULL,
  `Hidden` tinyint(4) NOT NULL DEFAULT 1,
  `Title` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_comments`
--

INSERT INTO `feedback_comments` (`Feedback_Id`, `Name`, `Email`, `Paragraph`, `Created_Time`, `Hidden`, `Title`) VALUES
(1, 'Administration', 'cs320@silcmn.com', 'My feedback.', '2023-12-05 07:43:22', 0, ''),
(2, 'Administration', 'cs320@silcmn.com', 'Hidden feedback!', '2023-12-05 07:44:20', 1, ''),
(3, 'Israel', 'israel.love@my.metrostate.edu', 'This is a good feedback!', '2023-12-05 10:03:04', 0, ''),
(4, 'Deb', 'deb.holt@msn.com', 'This is bad feedback', '2023-12-05 10:03:55', 1, '');

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
  `active` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `Picture_Id` int(11) DEFAULT NULL,
  `modified_time` date NOT NULL,
  `created_time` date NOT NULL,
  `status` enum('enabled','disabled') DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hash`, `active`, `role`, `Picture_Id`, `modified_time`, `created_time`, `status`) VALUES
(1, 'Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 26, '0000-00-00', '0000-00-00', 'enabled'),
(2, 'Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 27, '0000-00-00', '0000-00-00', 'enabled'),
(4, 'SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 25, '0000-00-00', '0000-00-00', 'enabled'),
(10, 'Israel', 'Love', 'israel.love@my.metrostate.edu', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 'yes', 'user', 24, '0000-00-00', '0000-00-00', 'enabled'),
(11, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'user', 28, '0000-00-00', '0000-00-00', 'enabled'),
(16, 'Varma', 'Alluri', 'test@test.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', 21, '0000-00-00', '0000-00-00', 'enabled'),
(17, 'admin', 'admin', 'admin@aalambana.org', '$2y$10$hrX3CNhfnU6HHRGUSqMgrup9w9rniZjevhWOvoHoJx3h02xw6pk5i', 'yes', 'admin', NULL, '0000-00-00', '0000-00-00', 'enabled'),
(18, 'Deb', 'Holt', 'deb.holt@msn.com', '$2y$10$H0fNiNMEn5bKce8SSHILJuCT12WTLoSE.dJfZ94eh7FmUCgo9KBq6', 'yes', 'user', NULL, '0000-00-00', '0000-00-00', 'enabled'),
(19, 'Katie', 'Hall', 'k.hall13@gmail.com', '$2y$10$unCiGitfm3trxCp/w3AT3O0vzHZ/Zbgzh7fWWTV7pw6B1TE6Yn6Dy', 'yes', 'user', NULL, '0000-00-00', '0000-00-00', 'enabled'),
(20, 'Ram', 'YalamanChilli', 'test@test.com', '$2y$10$PfqSBHUZLkUfrS1i4HFrD.WMet7ImU1Z3vHg8Jn108Hz.LfU4vBee', 'yes', 'admin', 22, '0000-00-00', '0000-00-00', 'enabled'),
(21, 'Raju', 'Vatsavai', 'testing@test.com', '$2y$10$KIPooMP.raxiCdFl1u4AueYXqA9SfggwfqB6qUZzz02dS7QsXbEZ.', 'yes', 'admin', 23, '0000-00-00', '0000-00-00', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `Picture_Id` int(11) NOT NULL,
  `Blog_Id` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`Picture_Id`, `Blog_Id`, `User_Id`, `Location`) VALUES
(6, 22, NULL, 'images/blog_pictures/65371530989501.90488542.jpg'),
(9, 26, NULL, 'images/blog_pictures/6538627d343777.61810942.jpg'),
(10, 27, NULL, 'images/blog_pictures/65386e301700c8.47196175.jpg'),
(11, 28, NULL, 'images/blog_pictures/653922fc26c3f9.52815194.jpg'),
(13, 30, NULL, 'images/blog_pictures/653a6d2e0afa26.08642205.jpg'),
(14, 31, NULL, 'images/blog_pictures/653a6e4b5f4bc8.42880896.jpg'),
(15, 32, NULL, 'images/blog_pictures/653a6e6ac89d49.28070896.jpg'),
(16, 33, NULL, 'images/blog_pictures/653a8b928d5797.54334947.jpg'),
(17, 34, NULL, 'images/blog_pictures/653a8bb88fb2f0.31269026.jpg'),
(19, 36, NULL, 'images/blog_pictures/653aec19e43e64.17197132.jpg'),
(20, 37, NULL, 'images/blog_pictures/653aec345f00e0.67092487.jpg'),
(21, NULL, 16, 'images/users_pictures/655aeb079ac723.71567649.jpg'),
(22, NULL, 20, 'images/users_pictures/655aeb21b1e6b9.53120516.jpg'),
(23, NULL, 21, 'images/users_pictures/655aeb32d29dd5.50836719.jpg'),
(24, NULL, 10, 'images/users_pictures/656e90e0b77ff6.47113219.jpg'),
(25, NULL, 4, 'images/users_pictures/656a5bd02876f4.39733113.jpg'),
(26, NULL, 1, 'images/users_pictures/656a5bc139a741.55560190.jpg'),
(27, NULL, 2, 'images/users_pictures/656a637fb5fa53.23798558.jpg'),
(28, NULL, 11, 'images/users_pictures/656e75991440d5.67882755.jpg');

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
-- Indexes for table `feedback_comments`
--
ALTER TABLE `feedback_comments`
  ADD PRIMARY KEY (`Feedback_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_user_photo` (`Picture_Id`);

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
  MODIFY `Blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `blog_pictures`
--
ALTER TABLE `blog_pictures`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `blog_story`
--
ALTER TABLE `blog_story`
  MODIFY `Story_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_pictures`
--
ALTER TABLE `event_pictures`
  MODIFY `Event_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_comments`
--
ALTER TABLE `feedback_comments`
  MODIFY `Feedback_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_photo` FOREIGN KEY (`Picture_Id`) REFERENCES `user_photos` (`Picture_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
