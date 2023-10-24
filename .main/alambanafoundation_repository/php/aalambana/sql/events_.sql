USE alambana_db;

CREATE TABLE `events`(
  `Event_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Video_Link` varchar(200) DEFAULT NULL,
  `Event_Date` datetime DEFAULT NULL,
  'Created_Time' datetime DEFAULT NULL,
  'Modified_Time' datetime DEFAULT NULL,
  PRIMARY KEY (`Event_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;