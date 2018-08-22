-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 02:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_firstname` varchar(30) NOT NULL,
  `admin_lastname` varchar(30) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_password`, `admin_email`) VALUES
(1, 'Precious', 'Precious', '$2y$04$Liha.hzd6HFmNs420J8x0eSnjhbrFjH38b9r/vkqSIbViDofMdM3S', 'uchendubozz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(20) NOT NULL,
  `staff_firstname` varchar(30) NOT NULL,
  `staff_lastname` varchar(30) NOT NULL,
  `staff_department` varchar(40) NOT NULL,
  `staff_items` text NOT NULL,
  `staff_purpose` text NOT NULL,
  `date_stamp_in` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_stamp_out` timestamp NULL DEFAULT NULL,
  `clock_in` varchar(5) DEFAULT NULL,
  `clock_out` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_firstname`, `staff_lastname`, `staff_department`, `staff_items`, `staff_purpose`, `date_stamp_in`, `date_stamp_out`, `clock_in`, `clock_out`) VALUES
(1, 'Ernest', 'Onuiri', 'CS', 'Books, laptop, charger', 'Teaching', '2018-03-14 20:25:53', '2018-03-14 20:27:27', 'YES', 'YES'),
(2, 'Kalu', 'John', 'EAH', 'Laptop, charger, bags', 'Meeting', '2018-03-14 20:28:37', '2018-03-14 20:28:57', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(20) NOT NULL,
  `student_firstname` varchar(30) NOT NULL,
  `student_lastname` varchar(30) NOT NULL,
  `student_department` varchar(40) NOT NULL,
  `student_items` text NOT NULL,
  `student_purpose` text NOT NULL,
  `date_stamp_in` timestamp NULL DEFAULT NULL,
  `date_stamp_out` timestamp NULL DEFAULT NULL,
  `clock_in` varchar(5) DEFAULT NULL,
  `clock_out` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_firstname`, `student_lastname`, `student_department`, `student_items`, `student_purpose`, `date_stamp_in`, `date_stamp_out`, `clock_in`, `clock_out`) VALUES
(1, 'Raphael', 'Agbojo', 'CS', 'Laptop, books, charger, bag', 'Going for a class', '2018-03-14 20:26:25', '2018-03-16 06:03:57', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(11) NOT NULL,
  `visitor_firstname` varchar(15) NOT NULL,
  `visitor_lastname` varchar(15) NOT NULL,
  `visitor_identity` text NOT NULL,
  `visitor_items` text NOT NULL,
  `visitor_purpose` text NOT NULL,
  `date_stamp_in` timestamp NULL DEFAULT NULL,
  `date_stamp_out` timestamp NULL DEFAULT NULL,
  `clock_in` varchar(5) NOT NULL,
  `clock_out` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `visitor_firstname`, `visitor_lastname`, `visitor_identity`, `visitor_items`, `visitor_purpose`, `date_stamp_in`, `date_stamp_out`, `clock_in`, `clock_out`) VALUES
(1, 'Igwe', 'John', 'National Identity Card', 'Books', 'Meeting', '2018-03-14 20:27:10', '2018-03-14 20:27:47', 'YES', 'YES'),
(2, 'Justice', 'Ebube', 'National Identity Card', 'Car, laptop, charger, bad', 'See my children', '2018-03-16 06:06:13', '2018-03-16 06:07:11', 'YES', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
