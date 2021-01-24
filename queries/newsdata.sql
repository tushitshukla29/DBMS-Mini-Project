-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 05:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsdata`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `display` (IN `ed` VARCHAR(15))  NO SQL
BEGIN
select e.ename,e.eaddr,e.gender,e.did,e.salary,e.dob,e.email,s.sh from employee e inner join shift s on e.eid=s.eid where e.eid=ed;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` varchar(11) NOT NULL,
  `aname` varchar(20) NOT NULL,
  `pswd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `pswd`) VALUES
('101', 'Apoorva', 'apple'),
('102', 'Bhramari', 'grapes'),
('103', 'Supriksha', '1234'),
('104', 'Akshata', '12345'),
('105', 'Rasik', '123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` int(11) NOT NULL,
  `dname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `dname`) VALUES
(1, 'News Anchor'),
(2, 'Reporter'),
(3, 'Socialmediamanager'),
(4, 'producer');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `eaddr` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `did` int(11) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `eid`, `ename`, `eaddr`, `gender`, `did`, `salary`, `dob`, `email`) VALUES
(14, 'em123', 'darshan', 'udupi', 'male', 2, '1151', '2019-10-30', 'appukaranth9482@gmai'),
(18, 'emp111', 'b', 'APOORVA K N,', 'male', 1, '12', '2019-10-28', 'appukaranth9482@gmai'),
(17, 'emp123', 'noeif', 'APOORVA K N,', 'male', 2, '10', '2019-10-29', 'appukaranth9482@gmai');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `trigger` AFTER INSERT ON `employee` FOR EACH ROW BEGIN
INSERT INTO `emp_log` (`emp_name`, `time`) VALUES ((select ename from employee order by id desc limit 1), current_timestamp());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_log`
--

CREATE TABLE `emp_log` (
  `emp_name` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_log`
--

INSERT INTO `emp_log` (`emp_name`, `time`) VALUES
('aruna', '2019-11-29 11:20:24'),
('darshan', '2019-11-29 11:40:58'),
('noeif', '2019-11-29 12:03:11'),
('b', '2019-11-29 12:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `localuser`
--

CREATE TABLE `localuser` (
  `lid` int(5) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localuser`
--

INSERT INTO `localuser` (`lid`, `eid`, `uname`, `psw`) VALUES
(23, 'em123', 'darshan', 'appukaranth9482@gmail.com'),
(24, 'em123', 'darshan', 'appukaranth9482@gmail.com'),
(25, 'emp123', 'noeif', 'appukaranth9482@gmail.com'),
(26, 'emp111', 'b', 'appukaranth9482@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `sid` int(5) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `did` int(11) NOT NULL,
  `sh` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `localuser`
--
ALTER TABLE `localuser`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `did` (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `localuser`
--
ALTER TABLE `localuser`
  MODIFY `lid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `localuser`
--
ALTER TABLE `localuser`
  ADD CONSTRAINT `eid` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE;

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `did` FOREIGN KEY (`did`) REFERENCES `department` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shift_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
