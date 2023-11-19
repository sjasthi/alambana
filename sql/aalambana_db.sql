-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 11:35 PM
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
  `hidden` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`Blog_Id`, `Title`, `Author`, `Description`, `Video_Link`, `Modified_Time`, `Created_Time`, `hash`, `hidden`) VALUES
(84, 'Blog Title 12', 'CS320, SILC', 'Description 12', 'https://youtu.be/3cZhu9hTals', '2023-11-19 20:42:06', '2023-11-19 20:42:06', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 0),
(85, 'Blog Title 11', 'Love, Israel', 'Description 11', '', '2023-11-19 20:43:04', '2023-11-19 20:43:04', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(86, 'Blog Title 10', 'Love, Israel', 'Description 10', '', '2023-11-19 20:44:04', '2023-11-19 20:44:04', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(87, 'Blog Title 9', 'Love, Israel', 'Description 9', '', '2023-11-19 20:44:21', '2023-11-19 20:44:21', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(88, 'Blog Title 8', 'Love, Israel', 'Description 8', '', '2023-11-19 20:44:51', '2023-11-19 20:44:51', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(89, 'Blog Title 7', 'Love, Israel', 'Description 7', '', '2023-11-19 20:45:13', '2023-11-19 20:45:13', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(90, 'Blog Title 6', 'Love, Israel', 'Description 6', '', '2023-11-19 20:45:28', '2023-11-19 20:45:28', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(91, 'Blog Title 5', 'Love, Israel', 'Description 5', '', '2023-11-19 20:45:56', '2023-11-19 20:45:56', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(92, 'Blog Title 4', 'Love, Israel', 'Description 4', '', '2023-11-19 20:46:13', '2023-11-19 20:46:13', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 1),
(93, 'Blog Title 3', 'Love, Israel', 'Description 3', '', '2023-11-19 20:46:32', '2023-11-19 20:46:32', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(94, 'Blog Title 2', 'Love, Israel', 'Description 2', '', '2023-11-19 20:46:46', '2023-11-19 20:46:46', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(95, 'Blog Title 1', 'Love, Israel', 'Description 1', '', '2023-11-19 20:47:04', '2023-11-19 20:47:04', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 0),
(96, 'Blog Title admin', 'admin, admin', 'Description admin', 'https://youtu.be/k9em7Ey00xQ', '2023-11-19 21:11:03', '2023-11-19 21:11:03', '$2y$10$hrX3CNhfnU6HHRGUSqMgrup9w9rniZjevhWOvoHoJx3h02xw6pk5i', 0),
(97, 'Blog Title New User', 'Johnson, Tom', 'Description New User', '', '2023-11-19 21:16:28', '2023-11-19 21:16:28', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 0);

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
(185, 97, 'I was wondering the same thing..', '2023-11-20 05:07:24', 'Deb', 1, 'deb.holt@msn.com', '');

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
(64, 84, 'images/blog_pictures/655a650e7168c9.57985351.jpg'),
(65, 85, 'images/blog_pictures/655a654807a544.18347308.jpg'),
(66, 86, 'images/blog_pictures/655a658406b7c9.48144260.jpg'),
(67, 87, 'images/blog_pictures/655a6595e8f2e8.47185645.jpg'),
(68, 88, 'images/blog_pictures/655a65b3cb1a05.94802641.jpg'),
(69, 89, 'images/blog_pictures/655a65c928b9e9.38424586.jpg'),
(70, 90, 'images/blog_pictures/655a65d89a0747.50571369.jpg'),
(71, 91, 'images/blog_pictures/655a65f40244d8.66522321.jpg'),
(72, 92, 'images/blog_pictures/655a6605445c31.60858895.jpg'),
(73, 93, 'images/blog_pictures/655a6618383d79.60594253.jpg'),
(74, 94, 'images/blog_pictures/655a6626cb90c4.51601587.jpg'),
(75, 95, 'images/blog_pictures/655a66383f7709.15555490.jpg'),
(76, 96, 'images/blog_pictures/655a6bd7db62e3.76003664.jpg'),
(77, 97, 'images/blog_pictures/655a6d1ca9e490.00244529.jpg');

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
(28, 94, 'In the heart of a bustling city, where skyscrapers touch the clouds and the rhythm of life echoes through the streets, I find solace in the unexplored corners. Amidst the urban chaos, hidden gems of tranquility wait to be discovered. As I navigate this vibrant landscape, my pen becomes a guide, weaving stories that capture the essence of city life. Join me on a literary exploration, where the mundane transforms into the extraordinary, and every alleyway holds a narrative waiting to unfold.', 'Meet the author, a city dweller with a passion for uncovering the beauty within urban landscapes. With a keen eye for detail and'),
(29, 93, 'Within the realm of pixels and code, explore the digital landscapes where creativity knows no bounds. Join the author, a tech visionary, in crafting narratives that unfold in the virtual realms of innovation and imagination.', 'Journey alongside the author, a tech visionary, as they navigate the digital frontier. With a mind tuned to the frequencies of i'),
(30, 92, 'In the quiet hours of the night, delve into the realm of introspection and dreams. Join me, a nocturnal wordsmith, in weaving tales that unravel beneath the silver glow of the moon, where secrets are whispered and thoughts take flight.', 'Meet the author, a nocturnal wordsmith, whose pen dances with the rhythm of midnight musings.');

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
  `Created_Time` datetime DEFAULT NULL,
  `Modified_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_Id`, `Title`, `Description`, `Video_Link`, `Event_Date`, `Created_Time`, `Modified_Time`) VALUES
(4, 0, 'Event Description1', '', '2023-11-29 16:08:00', '2023-11-19 23:08:43', '2023-11-19 23:08:43'),
(5, 0, 'Event Description2', '', '2023-11-22 16:09:00', '2023-11-19 23:09:19', '2023-11-19 23:09:19'),
(6, 0, 'Event Description 3', 'https://youtu.be/NAmQ2zfH3jY', '2023-12-29 16:13:00', '2023-11-19 23:14:19', '2023-11-19 23:14:19');

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
(2, 'images/event_pictures/654abb9ccf77a.jpg'),
(3, 'images/event_pictures/6552d0b8d31ea.'),
(4, 'images/event_pictures/655a876b93b68.jpg'),
(5, 'images/event_pictures/655a878f0c78c.jpg'),
(6, 'images/event_pictures/655a88bb40c4c.png');

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
  `Picture_Id` int(11) DEFAULT NULL,
  `modified_time` date NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `hash`, `active`, `role`, `Picture_Id`, `modified_time`, `created_time`) VALUES
(1, 'Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', NULL, '0000-00-00', '0000-00-00'),
(2, 'Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', NULL, '0000-00-00', '0000-00-00'),
(4, 'SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', NULL, '0000-00-00', '0000-00-00'),
(10, 'Israel', 'Love', 'israel.love@my.metrostate.edu', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 'yes', 'user', NULL, '0000-00-00', '0000-00-00'),
(11, 'Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'user', NULL, '0000-00-00', '0000-00-00'),
(16, 'Varma', 'Alluri', 'test@test.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'yes', 'admin', NULL, '0000-00-00', '0000-00-00'),
(17, 'admin', 'admin', 'admin@aalambana.org', '$2y$10$hrX3CNhfnU6HHRGUSqMgrup9w9rniZjevhWOvoHoJx3h02xw6pk5i', 'yes', 'admin', NULL, '0000-00-00', '0000-00-00'),
(18, 'Deb', 'Holt', 'deb.holt@msn.com', '$2y$10$H0fNiNMEn5bKce8SSHILJuCT12WTLoSE.dJfZ94eh7FmUCgo9KBq6', 'yes', 'user', NULL, '0000-00-00', '0000-00-00'),
(19, 'Katie', 'Hall', 'k.hall13@gmail.com', '$2y$10$unCiGitfm3trxCp/w3AT3O0vzHZ/Zbgzh7fWWTV7pw6B1TE6Yn6Dy', '5487315b12', 'user', NULL, '0000-00-00', '0000-00-00');

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
  MODIFY `Blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `blog_pictures`
--
ALTER TABLE `blog_pictures`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `blog_story`
--
ALTER TABLE `blog_story`
  MODIFY `Story_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
