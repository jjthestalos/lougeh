-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 07:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lougeh_u_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_credits` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `total_credits`) VALUES
(1, 'Information Technology', 99),
(2, 'Mathematics', 102),
(3, 'Mechanical Engineering', 112);

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

CREATE TABLE `course_subjects` (
  `cs_id` int(255) NOT NULL,
  `cs_course_id` int(255) NOT NULL,
  `cs_subject_id` int(255) NOT NULL,
  `yr` int(5) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`cs_id`, `cs_course_id`, `cs_subject_id`, `yr`, `semester`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 2),
(3, 1, 3, 2, 1),
(4, 2, 7, 1, 1),
(5, 2, 8, 1, 2),
(6, 2, 9, 2, 1),
(7, 3, 4, 1, 1),
(8, 3, 5, 1, 2),
(9, 3, 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(25) NOT NULL,
  `student_id` int(25) NOT NULL,
  `cs_id` int(25) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `mark` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `student_id`, `cs_id`, `grade`, `mark`) VALUES
(1, 1, 1, 'B', 60),
(2, 1, 2, 'A', 80);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `sy_enrolled` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `dob`, `sy_enrolled`) VALUES
(1, 'Janele', 'Cabe', '1992-01-11', 2019),
(2, 'Apple', 'Mabini', '1993-02-04', 2019),
(3, 'Andrea', 'Bonifacio', '1993-12-04', 2019),
(4, 'Mar', 'Lino', '1994-05-21', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `sc_id` int(255) NOT NULL,
  `sc_student_id` int(11) NOT NULL,
  `sc_course_id` int(11) NOT NULL,
  `year_started` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`sc_id`, `sc_student_id`, `sc_course_id`, `year_started`) VALUES
(1, 1, 1, 2019),
(2, 2, 2, 2016),
(3, 3, 3, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject_grade`
--

CREATE TABLE `student_subject_grade` (
  `ssg_id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_subject_grade`
--

INSERT INTO `student_subject_grade` (`ssg_id`, `student_id`, `course_id`, `subject_id`, `grade`, `mark`, `semester`) VALUES
(1, 1, 1, 1, 'B', 80, 'Semester 1'),
(2, 1, 1, 2, 'A', 88, 'Semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit_point` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `name`, `credit_point`) VALUES
(1, 'Introduction to Programming 101', 12),
(2, 'Introduction to Machine Learning', 12),
(3, 'Introduction to UX/UI', 12),
(4, 'Math 17', 12),
(5, 'Math 51', 12),
(6, 'Math 71', 12),
(7, 'Statistics', 12),
(8, 'Fundamental Concepts of Mathematics', 12),
(9, 'Differential Equations', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `student_subject_grade`
--
ALTER TABLE `student_subject_grade`
  ADD PRIMARY KEY (`ssg_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_subjects`
--
ALTER TABLE `course_subjects`
  MODIFY `cs_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `sc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_subject_grade`
--
ALTER TABLE `student_subject_grade`
  MODIFY `ssg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
