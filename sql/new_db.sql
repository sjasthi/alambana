CREATE SCHEMA `aalambana_db2`;

USE aalambana_db2;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    about TEXT,
    email VARCHAR(255) UNIQUE,
    hash VARCHAR(255),
    validation_code VARCHAR(10),
    role ENUM('Administrator', 'User', 'Moderator') DEFAULT 'User',
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('enabled', 'disabled') DEFAULT 'enabled'
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description VARCHAR(255),
    information TEXT,
    video_link VARCHAR(2048),
    event_date_start DATE NOT NULL,
    event_date_end DATE NOT NULL,
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    attendees INT DEFAULT 0,
    location VARCHAR(255),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description VARCHAR(255),
    content TEXT NOT NULL DEFAULT '',
    video_link VARCHAR(2048),
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    hidden TINYINT DEFAULT 0,
    visitor_count INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    blog_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE pictures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(2048),
    blog_id INT,
    user_id INT NOT NULL,
    event_id INT,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

ALTER TABLE
    users
ADD
    COLUMN picture_id INT,
ADD
    FOREIGN KEY (picture_id) REFERENCES pictures(id) ON DELETE CASCADE;

INSERT INTO `users` (`first_name`, `last_name`, `email`, `hash`, `validation_code`, `role`, `picture_id`, `status`) VALUES
('Siva', 'Jasthi', 'siva@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Mahesh', 'Sunkara', 'mahesh@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('SILC', 'CS320', 'cs320@silcmn.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Israel', 'Love', 'israel.love@my.metrostate.edu', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 'VALIDATED', 'User', NULL, 'enabled'),
('Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'User', NULL, 'enabled'),
('Varma', 'Alluri', 'test3@test.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('admin', 'admin', 'admin@aalambana.org', '$2y$10$hrX3CNhfnU6HHRGUSqMgrup9w9rniZjevhWOvoHoJx3h02xw6pk5i', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Deb', 'Holt', 'deb.holt@msn.com', '$2y$10$H0fNiNMEn5bKce8SSHILJuCT12WTLoSE.dJfZ94eh7FmUCgo9KBq6', 'VALIDATED', 'User', NULL, 'enabled'),
('Katie', 'Hall', 'k.hall13@gmail.com', '$2y$10$unCiGitfm3trxCp/w3AT3O0vzHZ/Zbgzh7fWWTV7pw6B1TE6Yn6Dy', 'VALIDATED', 'User', NULL, 'enabled'),
('Ram', 'YalamanChilli', 'test2@test.com', '$2y$10$PfqSBHUZLkUfrS1i4HFrD.WMet7ImU1Z3vHg8Jn108Hz.LfU4vBee', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Raju', 'Vatsavai', 'testing@test.com', '$2y$10$KIPooMP.raxiCdFl1u4AueYXqA9SfggwfqB6qUZzz02dS7QsXbEZ.', 'VALIDATED', 'Administrator', NULL, 'enabled');

INSERT INTO `blogs` ( `title`, `description`, `video_link`, `modified_time`, `created_time`, `user_id`, `hidden`, `visitor_count`) VALUES
( 'Blog Title 16', 'Description 12', 'https://youtu.be/3cZhu9hTals', '2023-11-21 02:28:31', '2023-11-19 20:42:06', 3, 0, 2),
( 'Blog Title 11', 'Description 11', NULL, '2023-11-20 20:44:55', '2023-11-19 20:43:04', 4, 0, 2),
( 'Blog Title 100', 'Description 100', 'https://youtu.be/NAmQ2zfH3jY', '2023-11-28 03:16:05', '2023-11-19 20:44:04', 4, 0, 1),
( 'Blog Title 9', 'Description 9', NULL, '2023-11-19 20:44:21', '2023-11-19 20:44:21', 4, 0, 1),
( 'Blog Title 8', 'Description 8', NULL, '2023-11-19 20:44:51', '2023-11-19 20:44:51', 4, 0, 1),
( 'Blog Title 77', 'Description 7', NULL, '2023-11-28 02:02:05', '2023-11-19 20:45:13', 4, 0, 2),
( 'Blog Title 6', 'Description 6', NULL, '2023-11-19 20:45:28', '2023-11-19 20:45:28', 4, 0, 26),
( 'Blog Title 5', 'Description 5', NULL, '2023-11-19 20:45:56', '2023-11-19 20:45:56', 4, 0, 0),
( 'Blog Title 4', 'Description 4', NULL, '2023-11-19 20:46:13', '2023-11-19 20:46:13', 4, 0, 0),
( 'Blog Title 3', 'Description 3', NULL, '2023-11-19 20:46:32', '2023-11-19 20:46:32', 4, 0, 1),
( 'Blog Title 2', 'Description 2', NULL, '2023-11-28 03:12:15', '2023-11-19 20:46:46', 4, 0, 19),
( 'Blog Title 1', 'Description 1', NULL, '2023-11-20 20:49:28', '2023-11-19 20:47:04', 4, 0, 3),
( 'Blog Title admin1', 'Description admin', 'https://youtu.be/k9em7Ey00xQ', '2023-11-30 20:47:21', '2023-11-19 21:11:03', 7, 0, 10),
( 'Blog Title New User', 'Description New User', NULL, '2023-11-19 21:16:28', '2023-11-19 21:16:28', 5, 0, 4),
( 'Title New X', 'Description X', NULL, '2023-11-28 03:18:09', '2023-11-28 03:18:09', 5, 0, 53);
