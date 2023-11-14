USE alambana_db;

CREATE TABLE blogs (
	Blog_Id int NOT NULL,
	Title varchar(100) DEFAULT NULL,
	Author varchar(50) DEFAULT NULL,
	Description text,
	Video_Link varchar(200) DEFAULT NULL,
	Modified_Time datetime DEFAULT NULL,
	Created_Time datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

