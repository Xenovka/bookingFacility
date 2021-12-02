-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 06:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingfacility`
--

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `FacilityID` int(11) NOT NULL,
  `FacilityName` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `FacilityDetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`FacilityID`, `FacilityName`, `Image`, `FacilityDetail`) VALUES
(1, 'Colaborative Lab', 'colaborative_lab.jpg', 'A laboratory equipped with technological tools that can help students hold discussions and design concepts. Here, UMN obligates students to work and learn together. In this collaborative laboratory, students actively interact with one another by sharing their experiences and knowledge. Discussions are also held digitally (online forums, chat rooms and more).'),
(2, 'Lab Computer', 'lab_computer.jpg', 'This laboratory is used to operate various designing activities, construction, development, and testing mobile applications, both native application (Android, iOS), hybrid, or mobile web.'),
(3, 'Lecture Theater', 'lecture_theater.jpg', 'With a larger capacity compared to the other halls, the Lecture Theatre can accommodate up to 500 people running various activities such as seminars, workshops, lectures with guest lecturers, and UKM shows (Student Activity Unit) which are all displayed in this theater room.'),
(4, 'Meeting Room', 'meeting_room.jpg', 'A room for meeting'),
(5, 'Studio Greenscreen', 'studio_greenscreen.jpg', 'This studio is specifically designed to make films and animations. Recording a scene can be taken from 3 different angles by utilizing various facilities, such as towing (tools for lifting people), lights, costumes, point sensors motion, and green screen.'),
(6, 'Studio Photo', 'studio_photo.jpg', 'This photography studio is used for lectures, academic assignments, research, and final project. With a studio equipped with a high resolution DSLR camera attached with a zooming lens, wide lens, fixed lens and macro lens, students can explore in producing photo works towards journalism, products, fashion, and others. This studio is also contains backdrop, flash lighting, flash trigger, umbrella, soft box, snoot, new door, filter, and honey comb.');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `RequestID` int(11) NOT NULL,
  `RequesterID` int(11) NOT NULL,
  `ReqFacilityID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`RequestID`, `RequesterID`, `ReqFacilityID`, `Date`, `StartTime`, `EndTime`) VALUES
(1, 3, 4, '2021-12-03', '13:29:00', '16:29:00'),
(2, 1, 3, '2021-12-03', '19:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reserveduser`
--

CREATE TABLE `reserveduser` (
  `RequestID` int(11) NOT NULL,
  `RequesterID` int(11) NOT NULL,
  `ReqFacilityID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserveduser`
--

INSERT INTO `reserveduser` (`RequestID`, `RequesterID`, `ReqFacilityID`, `Date`, `StartTime`, `EndTime`, `Status`) VALUES
(1, 3, 4, '2021-12-03', '13:29:00', '16:29:00', 'Wait'),
(2, 1, 3, '2021-12-03', '19:00:00', '21:00:00', 'Declined'),
(4, 1, 4, '2021-12-23', '19:00:00', '21:00:00', ''),
(5, 1, 3, '2021-12-08', '19:00:00', '21:00:00', ''),
(6, 1, 4, '2021-12-08', '19:00:00', '21:00:00', 'Wait'),
(7, 1, 5, '2021-12-16', '19:00:00', '21:00:00', 'Wait'),
(8, 1, 3, '2021-12-18', '19:00:00', '21:00:00', 'Wait'),
(9, 1, 2, '2021-12-17', '19:00:00', '22:00:00', 'Wait'),
(12, 1, 2, '2021-12-29', '19:00:00', '21:00:00', 'Wait'),
(13, 1, 6, '2021-12-21', '09:00:00', '11:00:00', 'Wait'),
(14, 1, 3, '2021-12-31', '19:00:00', '11:00:00', 'Wait'),
(15, 1, 2, '2021-12-30', '19:00:00', '21:00:00', 'Wait'),
(17, 1, 4, '2021-12-08', '19:00:00', '11:00:00', 'Wait'),
(18, 1, 1, '2021-12-08', '19:00:00', '21:00:00', 'Wait'),
(19, 1, 1, '2021-12-21', '19:00:00', '21:00:00', 'Wait');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Management'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Email`, `Password`, `Role`, `Image`) VALUES
(1, 'agung123', 'agung@umn.ac.id', '$2y$10$2UCelXL./iuwRY0Nv6NuPuJcnBy/nfsSOrnsGJaI1./baKzz2OPNe', 1, ''),
(3, 'Vallencius', 'vallencius.siswanto@student.umn.ac.id', '$2y$10$CRUpdchAR9sLJa8AUczWEu2TjnV4SUtxcjMIoqVPaIdfc09R5gFaa', 1, 'ceef7-fotovallen.jpg'),
(4, 'Vallencius111', 'admin@umn.ac.id', '$2y$10$TFqJB.YMtoZr.TwIovywduvkaeHHe5nc1nn5coypaJub6ljfoEjZq', 2, ''),
(6, 'CobaCoba', 'vallencius1901@gmail.com', '$2y$10$Ca847wTzkmk20pItyT0mUOwrdxYEsXwtn74A.v6CzF5PmxNX//qki', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`FacilityID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `ReqFacilityID` (`ReqFacilityID`),
  ADD KEY `RequesterID` (`RequesterID`);

--
-- Indexes for table `reserveduser`
--
ALTER TABLE `reserveduser`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `RequesterID` (`RequesterID`),
  ADD KEY `ReqFacilityID` (`ReqFacilityID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Role` (`Role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `FacilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reserveduser`
--
ALTER TABLE `reserveduser`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`ReqFacilityID`) REFERENCES `facility` (`FacilityID`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`RequesterID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `reserveduser`
--
ALTER TABLE `reserveduser`
  ADD CONSTRAINT `reserveduser_ibfk_1` FOREIGN KEY (`RequesterID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `reserveduser_ibfk_2` FOREIGN KEY (`ReqFacilityID`) REFERENCES `facility` (`FacilityID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
