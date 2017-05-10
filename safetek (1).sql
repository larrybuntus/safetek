-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2017 at 07:42 AM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safetek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'placeholder.jpg',
  `password` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `sessions` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `img`, `password`, `number`, `email`, `role`, `sessions`) VALUES
(1, 'larrybuntus', 'Lawrence Kweku Adu', 'placeholder.jpg', '$2y$10$JK4nmgr9wx06SKz1cLoue.W3cqpOEhR4kqsSHhrLPNFQUWm/J6xPS', '0501384208', 'larrybuntus@gmail.com', 0, 2),
(2, 'nutakor.eldad', 'Eldad Nutakor', 'placeholder.jpg', '$2y$10$W4fhzibx1JaSNqngIUS1xuREaMkzvqejak7/GH7T8OEFPe8Jdsjsq', '0201111111', 'nutakor.eldad@gmail.com', 0, 0),
(3, 'aejay', 'John Appiah', 'curate.jpg', '$2y$10$soFDYnhPMSVLwskXccJKQu1rLNl5sKvAa7tKXjLWTV29sgkFjVl/C', '0000000000', 'aejay@hackprogh.com', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `message` text,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'safe group',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL,
  `hostels_meetpoints_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups_students`
--

CREATE TABLE `groups_students` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL,
  `emergency` tinyint(1) NOT NULL DEFAULT '0',
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `emergencyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `name`, `location_id`, `deleted`) VALUES
(1, 'Adom-bi', 1, 0),
(2, 'Westend', 1, 0),
(3, 'Master Brains', 1, 1),
(4, 'Amandah Hostel', 1, 0),
(5, 'R&B Hostel', 1, 0),
(6, 'Frontline Inn', 1, 0),
(7, 'Shalom Hostel', 1, 0),
(14, 'Larry Buntus', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hostels_meetpoints`
--

CREATE TABLE `hostels_meetpoints` (
  `id` int(11) NOT NULL,
  `meetpoint_id` int(11) NOT NULL,
  `hostel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostels_meetpoints`
--

INSERT INTO `hostels_meetpoints` (`id`, `meetpoint_id`, `hostel_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 1, 1),
(4, 2, 1),
(8, 1, 3),
(9, 2, 3),
(13, 1, 14),
(14, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Ayeduase'),
(2, 'Kotei'),
(3, 'Newsite'),
(4, 'Campus'),
(5, 'Kentinkrono');

-- --------------------------------------------------------

--
-- Table structure for table `meetpoints`
--

CREATE TABLE `meetpoints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetpoints`
--

INSERT INTO `meetpoints` (`id`, `name`, `location_id`) VALUES
(1, 'Eng. Gate', 1),
(2, 'Ayeduase Gate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `id` int(11) NOT NULL,
  `cipher_date` varchar(255) NOT NULL,
  `cipher_iv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`id`, `cipher_date`, `cipher_iv`) VALUES
(2, 'It00rEPb8E/IgSDE1JuM3Ma/Wg==', 'MTc0NzA3ODI3NTMwODAxMw=='),
(3, 'mw0jEe8q6e6NS66KEwcJXbXUKA==', 'NDA0NjA5NDA4NjAyMTE4NQ==');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT 'Student',
  `number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `reference_number` int(8) NOT NULL,
  `index_number` int(7) NOT NULL,
  `img` varchar(255) DEFAULT 'placeholder.jpg',
  `dateCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `number`, `email`, `password`, `reference_number`, `index_number`, `img`, `dateCreated`) VALUES
(1, 'Larry Buntus', NULL, 'larrybuntus@gmail.com', '$2y$09$JTTRRtcohzvizD3pMWPVHe2dlPrhzHrnRTx7rluQrUnug0gDBa4Y.', 20222701, 1113113, 'placeholder.jpg', '2017-01-27 09:41:36'),
(2, 'Eldad Nutakor', NULL, 'king@gmail.com', '$2y$09$53vawlujurfqwVtbxcmLwOJtKsmM6QOIc8bT6f2vTS6imS3m2VhS6', 20335101, 1120213, 'placeholder.jpg', '2017-04-04 15:35:09'),
(3, 'Pearl', NULL, 'pearl@gmail.com', '$2y$09$NjrDXLGwO1bJDwFr1glKluUm509elCS0.HAKiZ/29QFo7mHUIACE2', 20340722, 1122113, 'placeholder.jpg', '2017-04-06 18:53:26'),
(4, 'Seth', NULL, 'seth@gmail.com', '$2y$09$0mnh5EhMNlf2kqZ6lzp87eDl9XVk31hni7P8WHVdGFLFXDn81Ge3u', 20342481, 1137813, 'placeholder.jpg', '2017-04-06 18:54:30'),
(5, 'Daniel', NULL, 'daniel@gmail.com', '$2y$09$2YqlDUypW2hRIAI5POXpEOGfatjO4ajHZnECECuJsOoJCA46X/oEa', 20354850, 1125413, 'placeholder.jpg', '2017-04-06 18:55:33'),
(6, 'Michael', NULL, 'michael@gmail.com', '$2y$09$zqChI7Mq0lcPrjSEqHOu9eW5SrX5d/rPZ./UmQkn1vfDAE/frE83i', 20220760, 1136013, 'placeholder.jpg', '2017-04-06 18:56:55'),
(7, 'Irene', NULL, 'irene@gmail.com', '$2y$09$va8tC49H16cfmjQfLfAvZudS3MlfuyJhGwe0po22ayk.IeOSZosDq', 20346211, 1135813, 'placeholder.jpg', '2017-04-06 18:58:22'),
(8, 'John', NULL, 'john@afari.kwasi', '$2y$09$NO7TRoCRFGBB9yRjxIW1bOOJS4KRm7tmSzPZbvBLgM8uyH27Cz572', 20143221, 1123913, 'placeholder.jpg', '2017-04-06 18:59:08'),
(9, 'Stefan Rubayiza', NULL, 'stefan@gmail.com', '$2y$09$KicMknoJ2sU7yr1qr55Cou3BBm5/yAXzh5xr1bcaxo19MdTw6VX3i', 20390503, 4712315, 'placeholder.jpg', NULL),
(10, 'Miss Quain', '0202002020', 'missquain@gmail.com', '$2y$09$J4wFv1RQ5pTHCRI10Y0BhuQrSwYAehy4hatTJ/WDbhh0s4TdLUZly', 20226778, 1122313, 'placeholder.jpg', '2017-04-07 09:13:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostels_meetpoints_id` (`hostels_meetpoints_id`);

--
-- Indexes for table `groups_students`
--
ALTER TABLE `groups_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `hostels_meetpoints`
--
ALTER TABLE `hostels_meetpoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetpoint_id` (`meetpoint_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetpoints`
--
ALTER TABLE `meetpoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups_students`
--
ALTER TABLE `groups_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hostels_meetpoints`
--
ALTER TABLE `hostels_meetpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meetpoints`
--
ALTER TABLE `meetpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`hostels_meetpoints_id`) REFERENCES `hostels_meetpoints` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups_students`
--
ALTER TABLE `groups_students`
  ADD CONSTRAINT `groups_students_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostels`
--
ALTER TABLE `hostels`
  ADD CONSTRAINT `hostels_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostels_meetpoints`
--
ALTER TABLE `hostels_meetpoints`
  ADD CONSTRAINT `hostels_meetpoints_ibfk_1` FOREIGN KEY (`meetpoint_id`) REFERENCES `meetpoints` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostels_meetpoints_ibfk_2` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meetpoints`
--
ALTER TABLE `meetpoints`
  ADD CONSTRAINT `meetpoints_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
