-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 12:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(2299, 'Sumant', 'asd'),
(2893, 'Sushant', 'qwert');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `roll_no` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`roll_no`, `Password`) VALUES
('CSM18024', 'L8i0TsXw3V'),
('CSM18025', 'XapdOpwejA'),
('CSM18028', 'YE1s2I3bEI'),
('CSM180345', '73o5jsljg2'),
('CSM180346', 'EcHo43PbFS'),
('CSM18035', 'UmHzJKPBQ1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `no` int(2) NOT NULL,
  `name` varchar(35) NOT NULL,
  `school` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`no`, `name`, `school`) VALUES
(1, 'Computer Science', 1),
(2, 'Civil Engineering', 1),
(3, 'Electronics & Communication', 1),
(4, 'Energy', 1),
(5, 'Food Engineering', 1),
(6, 'Mechanical Engineering', 1),
(7, 'Electrical Engineering', 1),
(8, 'Cultural Studies', 2),
(9, 'English & Foreign Languages', 2),
(10, 'Mass Comm & Journalism', 2),
(11, 'Sociology', 2),
(12, 'Hindi', 2),
(13, 'Social Work', 2),
(14, 'Education', 2),
(15, 'Law', 2),
(16, 'Business Administration', 3),
(17, 'Commerce', 3),
(18, 'Disaster Management', 3),
(19, 'Chemical Science', 4),
(20, 'Environmental Science', 4),
(21, 'Molecular Biology & BioTech', 4),
(22, 'Physics', 4),
(23, 'Mathematical Science', 4);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `Roll_no` varchar(10) NOT NULL,
  `first_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(10) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `school` varchar(30) DEFAULT NULL,
  `department` varchar(35) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `working_at` varchar(40) DEFAULT NULL,
  `Mobile` text DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`Roll_no`, `first_name`, `last_name`, `gender`, `school`, `department`, `course`, `year`, `working_at`, `Mobile`, `email`) VALUES
('CSM18025', 'Rohit', 'Rai', 'M', 'Engineering', 'Computer Science', 'MCA', 2016, '', '8759683458', 'rohitrai@gmail.com'),
('CSM180345', 'Anuj', 'Borah', 'M', 'Engineering', 'Civil Engineering', 'B.Tech', 2016, '', '9398475018', 'anuj@reddifmail.com'),
('CSM180346', 'Nabujjal', 'Saikia', 'M', 'Engineering', 'Civil Engineering', 'B.Tech', 2016, '', '9575958456', 'nabujjal@gmail.com'),
('CSM18035', 'Sumant', 'Tiwari', 'M', 'Engineering', 'Civil Engineering', 'B.Tech', 2016, '', '9875958485', 'sumant@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `roll_no` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`roll_no`, `email`) VALUES
('CSM16011', 'shivprasad@gmail.com'),
('CSM16034', 'rahul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `no` int(11) NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`no`, `name`) VALUES
(1, 'Engineering'),
(2, 'Humanities & Social Sciences'),
(3, 'Management Sciences'),
(4, 'Sciences');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`Roll_no`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
