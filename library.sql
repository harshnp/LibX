-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 05:58 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `price` int(1) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `price`, `year`) VALUES
('1234567890', 'Da Vinci Code', 'Dan Brown', 850, 1987),
('1236547890', 'dsadsdx', 'sdcsdxsad', 550, 2015),
('1245789630', 'Fifty Shdes of Grey', 'James E.', 2547, 2010),
('2587419630', 'Harry Potter 7', 'J.K. Rowling', 546, 2011),
('5784693210', 'Angels and Demons', 'Dan Brown', 5520, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `isbn` varchar(10) NOT NULL,
  `cust_id` varchar(10) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cust_id` varchar(10) NOT NULL,
  `fine` int(1) NOT NULL,
  `books_issued` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `cust_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`cust_id`, `name`, `password`, `phone`, `address`, `dob`) VALUES
('1620150566', 'Harsh', 'ASDFGHJKL', '7322858587', 'ABCDE', '1998-11-30'),
('1620150569', 'Aniket', 'Aniket@123', '8369475115', 'A/2, 702, Saraf Choudhary Nagar, Thakur Complex, Kandivali-East', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `isbn` (`isbn`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_id` (`cust_id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `card` (`cust_id`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `student` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
