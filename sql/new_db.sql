CREATE SCHEMA IF NOT EXISTS `aalambana_db2`;

USE aalambana_db2;

CREATE TABLE IF NOT EXISTS users (
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

CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description VARCHAR(255),
    category ENUM('Education','Wild-life','Environment', 'Water', 'Human-Rights'),
    information TEXT,
    video_link VARCHAR(2048),
    event_date_start DATETIME NOT NULL,
    event_date_end DATETIME,
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    attendees INT DEFAULT 0,
    location VARCHAR(255),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description VARCHAR(255),
    content TEXT,
    video_link VARCHAR(2048),
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    hidden TINYINT DEFAULT 0,
    visitor_count INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    modified_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    blog_id INT,
    user_id INT NOT NULL,
    FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

ALTER TABLE comments
MODIFY COLUMN blog_id INT NULL,
ADD CONSTRAINT fk_blog_id FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE;

CREATE TABLE IF NOT EXISTS pictures (
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
('Test', 'Account', 'test@test.com', '$2y$10$VAQh8eyE88WklU6HW5ydF.AtuD0QHJk5EO9mYt/aPYMJiaRehrmtm', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Israel', 'Love', 'israel.love@my.metrostate.edu', '$2y$10$RE2YqufUEbyc66NQLqD9XOVycSKn4PDr2oxNTV5qj2svUHGk9z326', 'VALIDATED', 'User', NULL, 'enabled'),
('Tom', 'Johnson', 'tom.johnson@gmail.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'User', NULL, 'enabled'),
('Varma', 'Alluri', 'test3@test.com', '$2y$10$zFAG5GBNtf.5BpowMqZSputSLeG8OzfKACpjAMsePjZhu.TnvU/Bu', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('admin', 'admin', 'admin@aalambana.org', '$2y$10$hrX3CNhfnU6HHRGUSqMgrup9w9rniZjevhWOvoHoJx3h02xw6pk5i', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Deb', 'Holt', 'deb.holt@msn.com', '$2y$10$H0fNiNMEn5bKce8SSHILJuCT12WTLoSE.dJfZ94eh7FmUCgo9KBq6', 'VALIDATED', 'User', NULL, 'enabled'),
('Katie', 'Hall', 'k.hall13@gmail.com', '$2y$10$unCiGitfm3trxCp/w3AT3O0vzHZ/Zbgzh7fWWTV7pw6B1TE6Yn6Dy', 'VALIDATED', 'User', NULL, 'enabled'),
('Ram', 'YalamanChilli', 'test2@test.com', '$2y$10$PfqSBHUZLkUfrS1i4HFrD.WMet7ImU1Z3vHg8Jn108Hz.LfU4vBee', 'VALIDATED', 'Administrator', NULL, 'enabled'),
('Raju', 'Vatsavai', 'testing@test.com', '$2y$10$KIPooMP.raxiCdFl1u4AueYXqA9SfggwfqB6qUZzz02dS7QsXbEZ.', 'VALIDATED', 'Administrator', NULL, 'enabled');

INSERT INTO `blogs` ( `title`, `description`,`content`, `video_link`, `modified_time`, `created_time`, `user_id`, `hidden`, `visitor_count`) VALUES
( 'Blog Title 16', 'Description 12','This is a blog!!1', 'https://youtu.be/3cZhu9hTals', '2023-11-21 02:28:31', '2023-11-19 20:42:06', 3, 0, 2),
( 'Blog Title 11', 'Description 11','This is a blog!!2', NULL, '2023-11-20 20:44:55', '2023-11-19 20:43:04', 4, 0, 2),
( 'Blog Title 100', 'Description 100','This is a blog!!3', 'https://youtu.be/NAmQ2zfH3jY', '2023-11-28 03:16:05', '2023-11-19 20:44:04', 4, 0, 1),
( 'Blog Title 9', 'Description 9','This is a blog!!4', NULL, '2023-11-19 20:44:21', '2023-11-19 20:44:21', 4, 0, 1),
( 'Blog Title 8', 'Description 8','This is a blog!!5', NULL, '2023-11-19 20:44:51', '2023-11-19 20:44:51', 4, 0, 1),
( 'Blog Title 77', 'Description 7','This is a blog!!6', NULL, '2023-11-28 02:02:05', '2023-11-19 20:45:13', 4, 0, 2),
( 'Blog Title 6', 'Description 6','This is a blog!!7', NULL, '2023-11-19 20:45:28', '2023-11-19 20:45:28', 4, 0, 26),
( 'Blog Title 5', 'Description 5','This is a blog!!8', NULL, '2023-11-19 20:45:56', '2023-11-19 20:45:56', 4, 0, 0),
( 'Blog Title 4', 'Description 4','This is a blog!!9', NULL, '2023-11-19 20:46:13', '2023-11-19 20:46:13', 4, 0, 0),
( 'Blog Title 3', 'Description 3','This is a blog!!10', NULL, '2023-11-19 20:46:32', '2023-11-19 20:46:32', 4, 0, 1),
( 'Blog Title 2', 'Description 2','This is a blog!!11', NULL, '2023-11-28 03:12:15', '2023-11-19 20:46:46', 4, 0, 19),
( 'Blog Title 1', 'Description 1','This is a blog!!12', NULL, '2023-11-20 20:49:28', '2023-11-19 20:47:04', 4, 0, 3),
( 'Blog Title admin1', 'Description admin','This is a blog!!13', 'https://youtu.be/k9em7Ey00xQ', '2023-11-30 20:47:21', '2023-11-19 21:11:03', 7, 0, 10),
( 'Blog Title New User', 'Description New User','This is a blog!!14', NULL, '2023-11-19 21:16:28', '2023-11-19 21:16:28', 5, 0, 4),
( 'Title New X', 'Description X','This is a blog!!15', NULL, '2023-11-28 03:18:09', '2023-11-28 03:18:09', 5, 0, 53);

INSERT INTO `comments` (`blog_id`,`user_id`, `content`) VALUES
(1,2,'Hey this is really a good site blog!'),
(2,4,'Very interesting read, hope to hear more from your post.'),
(3,4,'Are you going to make any more postings on this topic?'),
(4,12,'Yes, very soon!'),
(5,11,'Is this a Admin post?'),
(6,10,'Hi, is there a new post to this page'),
(7,9,'I was wondering the same thing..'),
(8,5,'Hello there this is very interesting can you tell me more'),
(9,4,'Is this about planting just wondering'),
(10,7,"I'll come back later, looks like a good start though"),
(11,6,'Yes this is about planting and our ecosystem'),
(12,2,"I haven't written anything down yet but I will, thank you for your interest!"),
(13,1,"Please provide appropriate contact only. Thank you"),
(14,1,'hi yu'),
(15,8,'test'),
(2,8,'hi there!'),
(2,9,'hello to me'),
(2,11,'New comment!'),
(2,4,'tests');


INSERT INTO `events` (`title`, `description`, `information`, `video_link`, `event_date_start`, `event_date_end`, `attendees`, `location`, `user_id`) VALUES
('Event1', 'Event Description1', 'This is a sample event! 1', NULL, '2024-02-14 16:00:00', '2024-02-14 18:00:00', 2, '123 Nowhere st, St. Paul, MN', 3),
('Title2', 'Event Description2', 'This is a sample event! 2', NULL, '2024-02-17 16:00:00', NULL, 2, 'online', 4),
('Title3', 'Event Description3', 'This is a sample event! 3', NULL, '2024-02-18 14:00:00', '2024-02-18 18:00:00', 2, 'online', 4),
('Title4', 'Event Description4', 'This is a sample event! 4', NULL, '2024-02-22 16:00:00', '2024-02-22 18:00:00', 2, 'online', 4),
('Title5', 'Event Description5', 'This is a sample event! 5', NULL, '2024-03-14 15:00:00', '2024-03-14 17:00:00', 2, 'online', 4),
('Title6', 'Event Description6', 'This is a sample event! 6', NULL, '2024-03-15 13:00:00', '2024-02-15 15:00:00', 2, 'online', 7);


INSERT INTO `pictures` ( `location`, `blog_id`, `user_id`, `event_id`) VALUES 
('images/blog_pictures/6554f41890b446.42606833.jpg',1,3,NULL),
('images/blog_pictures/6554f621909a87.79369267.jpg',2,4,NULL),
('images/blog_pictures/6554f6a96b8172.66056853.jpg',3,4,NULL),
('images/blog_pictures/655a6595e8f2e8.47185645.jpg',4,4,NULL),
('images/blog_pictures/655a65b3cb1a05.94802641.jpg',5,4,NULL),
('images/blog_pictures/655a65c928b9e9.38424586.jpg',6,4,NULL),
('images/blog_pictures/655a65d89a0747.50571369.jpg',7,4,NULL),
('images/blog_pictures/655a65f40244d8.66522321.jpg',8,4,NULL),
('images/blog_pictures/655a6605445c31.60858895.jpg',9,4,NULL),
('images/blog_pictures/655a6618383d79.60594253.jpg',10,4,NULL),
('images/blog_pictures/655a6bd7db62e3.76003664.jpg',11,4,NULL),
('images/blog_pictures/655a6d1ca9e490.00244529.jpg',12,4,NULL),
('images/blog_pictures/655bafdef36a98.80008798.jpg',13,7,NULL),
('images/blog_pictures/655bb7156e38c0.95310575.jpg',14,5,NULL),
('images/blog_pictures/655c07bf2a2162.58934655.jpg',15,5,NULL),

('images/event_pictures/655c076b3ce83.jpg',NULL,3,1),
('images/event_pictures/655e8f23c49cf.jpg',NULL,4,2),
('images/event_pictures/655e8f52c6871.jpg',NULL,4,3),
('images/event_pictures/655e8f6549874.jpg',NULL,4,4),
('images/event_pictures/655e8ff741a05.jpg',NULL,4,5),
('images/event_pictures/655e90073ac17.png',NULL,4,6),

('images/users_pictures/655aeb079ac723.71567649.jpg',NULL,3,NULL),
('images/users_pictures/655aeb21b1e6b9.53120516.jpg',NULL,4,NULL),
('images/users_pictures/655aeb32d29dd5.50836719.jpg',NULL,4,NULL),
('images/users_pictures/656e90e0b77ff6.47113219.jpg',NULL,4,NULL),
('images/users_pictures/656a5bd02876f4.39733113.jpg',NULL,4,NULL),
('images/users_pictures/656a5bc139a741.55560190.jpg',NULL,4,NULL),
('images/users_pictures/656a637fb5fa53.23798558.jpg',NULL,4,NULL),
('images/users_pictures/656e75991440d5.67882755.jpg',NULL,4,NULL);