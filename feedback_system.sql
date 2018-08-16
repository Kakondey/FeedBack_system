-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 06:19 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `Admin_name` text NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Admin_name`, `Admin_Password`) VALUES
(1, 'hitesh', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `fa_id` int(11) NOT NULL,
  `Facility_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`fa_id`, `Facility_name`) VALUES
(1, 'Classroom'),
(2, 'Sanitation'),
(3, 'Indoor Stadium'),
(4, 'Cultural Facilities'),
(5, 'Girls, Boys Common Room');

-- --------------------------------------------------------

--
-- Table structure for table `facility_feedback`
--

CREATE TABLE `facility_feedback` (
  `Student_name` text NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `F_id` int(11) NOT NULL,
  `Faculty_name` varchar(100) NOT NULL,
  `Gender` text NOT NULL,
  `Phone_no` varchar(50) NOT NULL,
  `Department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`F_id`, `Faculty_name`, `Gender`, `Phone_no`, `Department`) VALUES
(1, 'Mohini Das', 'Female', '1234567890', 'MBA'),
(2, 'bheem', 'Male', '1234567890', 'btech');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_feedback`
--

CREATE TABLE `faculty_feedback` (
  `Student_name` varchar(100) NOT NULL,
  `Faculty_name` varchar(100) NOT NULL,
  `Total_marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_feedback`
--

INSERT INTO `faculty_feedback` (`Student_name`, `Faculty_name`, `Total_marks`) VALUES
('himadari', 'Mohini Das', '12'),
('ram', 'Mohini Das', '13'),
('himadari', 'bheem', '20'),
('pari', 'Mohini Das', '12');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_questions`
--

CREATE TABLE `faculty_questions` (
  `Fa_qId` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_questions`
--

INSERT INTO `faculty_questions` (`Fa_qId`, `Question`) VALUES
(1, 'Teacher Attendance'),
(2, 'Teaching Skills'),
(3, 'Behaviour'),
(4, 'Communication with Students'),
(5, 'Friendlyness ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_id` int(11) NOT NULL,
  `Student_name` varchar(100) NOT NULL,
  `Department_name` text NOT NULL,
  `Phone_no` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_id`, `Student_name`, `Department_name`, `Phone_no`, `password`) VALUES
(1, 'himadari', 'BCA', '1234567890', '1234'),
(2, 'ram', 'btech', '1234567890', '1234'),
(3, 'pari', 'comp', '1234567897', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`F_id`);

--
-- Indexes for table `faculty_questions`
--
ALTER TABLE `faculty_questions`
  ADD PRIMARY KEY (`Fa_qId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `F_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_questions`
--
ALTER TABLE `faculty_questions`
  MODIFY `Fa_qId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
