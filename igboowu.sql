-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 02:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igboowu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `department`) VALUES
(1, 'olatunji', 'kadri@gmail.com', '090887666', 'olatunji', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `starts` date NOT NULL,
  `ends` date NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `credit` int(11) NOT NULL,
  `department_id` int(100) NOT NULL,
  `level` varchar(11) DEFAULT NULL,
  `tutor_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `course_name`, `credit`, `department_id`, `level`, `tutor_code`) VALUES
(1, 'csc100', 'intro 3', 3, 1, '100', NULL),
(2, 'csc200', 'intro 7', 2, 1, '100', NULL),
(3, 'csc109', 'intro9', 2, 1, '100', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_reg`
--

CREATE TABLE `course_reg` (
  `course_code` varchar(11) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `matric_no` varchar(20) NOT NULL,
  `test` int(100) DEFAULT NULL,
  `exams` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_reg`
--

INSERT INTO `course_reg` (`course_code`, `session`, `semester`, `matric_no`, `test`, `exams`) VALUES
('csc100', '', '', '2018/COM/0002', 0, 0),
('csc109', '', '', '2018/COM/0002', 0, 0),
('csc200', '', '', '2018/COM/0002', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `name`, `school_id`) VALUES
(1, 'computer science', 1),
(2, 'mass communcation', 1),
(3, 'idiat', 2),
(4, 'i dont know', 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `auth` varchar(16) DEFAULT NULL,
  `recip` varchar(16) DEFAULT NULL,
  `pm` char(1) DEFAULT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `teller_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `madeby` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `approved` int(2) DEFAULT NULL,
  `bank` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `teller_no`, `date`, `madeby`, `amount`, `approved`, `bank`) VALUES
(1, 'registration charge', '090909090', '2018-07-09', 'th@gmail.com', 10000, 1, NULL),
(2, 'registration charge', '97787789', '0000-00-00', 'gjghgkjgkjg', 88008, 0, 'gtb'),
(3, 'registration charge', '090909', '0000-00-00', 'th@naij.com', 78909, 1, 'gtb');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `user` varchar(16) DEFAULT NULL,
  `text` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_history`
--

CREATE TABLE `reg_history` (
  `id` int(11) NOT NULL,
  `session` varchar(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_session`
--

CREATE TABLE `semester_session` (
  `id` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `result_published` int(2) NOT NULL DEFAULT '0',
  `student_registration` int(2) NOT NULL DEFAULT '0' COMMENT '0 means resgistration is not goign and 1 means registration going on',
  `starting_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_session`
--

INSERT INTO `semester_session` (`id`, `session`, `type`, `result_published`, `student_registration`, `starting_timestamp`) VALUES
(1, 2015, 'even', 0, 0, '2014-12-31 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matric_no` varchar(15) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `department` int(3) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `parents_name` varchar(50) DEFAULT NULL,
  `parents_mobile` bigint(20) DEFAULT NULL,
  `home_address` text,
  `payment_verified` int(2) DEFAULT '1',
  `blocked` int(2) DEFAULT NULL,
  `approved` int(2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`id`, `email`, `matric_no`, `name`, `gender`, `department`, `session`, `mobile`, `parents_name`, `parents_mobile`, `home_address`, `payment_verified`, `blocked`, `approved`, `timestamp`) VALUES
(1, 'through@gmail.com', NULL, 'olatunji', 'male', 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2018-07-08 12:04:32'),
(2, 'th@gmail.com', '2018/COM/0002', 'liunt huuhuuhuh', 'NULL', 1, 'NULL', 0, 'NULL', 0, 'NULL', 0, 1, 1, '2018-07-08 12:04:32'),
(3, 'th@naij.com', '2018/COM/0003', 'jkihuhug jhjuhjughkj', 'NULL', 1, 'NULL', 0, 'NULL', 0, 'NULL', 0, 0, 0, '2018-08-28 11:25:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_reg`
--
ALTER TABLE `course_reg`
  ADD PRIMARY KEY (`course_code`,`session`,`semester`,`matric_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth` (`auth`(6)),
  ADD KEY `recip` (`recip`(6));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD KEY `user` (`user`(6));

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_session`
--
ALTER TABLE `semester_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester_session`
--
ALTER TABLE `semester_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
