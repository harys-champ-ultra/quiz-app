-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 12:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL,
  `acpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aemail`, `aname`, `apassword`, `acpassword`) VALUES
(1, 'johnsmith@gmail.com', 'John Smith', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'),
(2, 'harisamjad56@gmail.com', 'Haris Amjad', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f'),
(4, 'usama@gmail.com', 'Usama Iftikhar', '615ed7fb1504b0c724a296d7a69e6c7b2f9ea2c57c1d8206c5afdf392ebdfd25', '615ed7fb1504b0c724a296d7a69e6c7b2f9ea2c57c1d8206c5afdf392ebdfd25'),
(5, 'alexcosta@gmail.com', 'Alex Costa', 'ee79976c9380d5e337fc1c095ece8c8f22f91f306ceeb161fa51fecede2c4ba1', 'ee79976c9380d5e337fc1c095ece8c8f22f91f306ceeb161fa51fecede2c4ba1'),
(6, 'tom@gmail.com', 'Tom Cruise', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f');

-- --------------------------------------------------------

--
-- Table structure for table `aquiz`
--

CREATE TABLE `aquiz` (
  `aqid` int(11) NOT NULL,
  `aqtitle` varchar(500) NOT NULL,
  `aqchoicea` varchar(500) NOT NULL,
  `aqchoiceb` varchar(500) NOT NULL,
  `aqchoicec` varchar(500) NOT NULL,
  `aqchoiced` varchar(500) NOT NULL,
  `aqcorrect` varchar(500) NOT NULL,
  `aid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aquiz`
--

INSERT INTO `aquiz` (`aqid`, `aqtitle`, `aqchoicea`, `aqchoiceb`, `aqchoicec`, `aqchoiced`, `aqcorrect`, `aid`, `sid`) VALUES
(23, 'The Pseudocode is:', 'Algorithm', 'Flowchart', 'Object Code', 'Coding', 'Algorithm', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `pid` int(11) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `ppassword` varchar(255) NOT NULL,
  `pcpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`pid`, `pemail`, `pname`, `ppassword`, `pcpassword`) VALUES
(4, 'usamaiftikhar@gmail.com', 'Usama Iftikhar', 'ee79976c9380d5e337fc1c095ece8c8f22f91f306ceeb161fa51fecede2c4ba1', 'ee79976c9380d5e337fc1c095ece8c8f22f91f306ceeb161fa51fecede2c4ba1');

-- --------------------------------------------------------

--
-- Table structure for table `pquiz`
--

CREATE TABLE `pquiz` (
  `pqid` int(11) NOT NULL,
  `pqtitle` varchar(500) NOT NULL,
  `pqchoicea` varchar(500) NOT NULL,
  `pqchoiceb` varchar(500) NOT NULL,
  `pqchoicec` varchar(500) NOT NULL,
  `pqchoiced` varchar(500) NOT NULL,
  `pqcorrect` varchar(500) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(11) NOT NULL,
  `aqid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `panswer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `aqid`, `pid`, `panswer`) VALUES
(23, 23, 4, 'Flowchart');

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `sid` int(11) NOT NULL,
  `sname` varchar(500) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`sid`, `sname`, `aid`) VALUES
(1, 'Set A', 2),
(3, 'Set B', 2),
(5, 'Set C', 2),
(6, 'Set D', 2),
(7, 'Set Test', 6),
(8, 'Set Zz', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aemail` (`aemail`);

--
-- Indexes for table `aquiz`
--
ALTER TABLE `aquiz`
  ADD PRIMARY KEY (`aqid`),
  ADD UNIQUE KEY `aqtitle` (`aqtitle`),
  ADD KEY `aid` (`aid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pemail` (`pemail`);

--
-- Indexes for table `pquiz`
--
ALTER TABLE `pquiz`
  ADD PRIMARY KEY (`pqid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `aqid` (`aqid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sname` (`sname`),
  ADD KEY `aid` (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aquiz`
--
ALTER TABLE `aquiz`
  MODIFY `aqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pquiz`
--
ALTER TABLE `pquiz`
  MODIFY `pqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aquiz`
--
ALTER TABLE `aquiz`
  ADD CONSTRAINT `aquiz_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admin` (`aid`),
  ADD CONSTRAINT `aquiz_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `sets` (`sid`);

--
-- Constraints for table `pquiz`
--
ALTER TABLE `pquiz`
  ADD CONSTRAINT `pquiz_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `people` (`pid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`aqid`) REFERENCES `aquiz` (`aqid`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `people` (`pid`);

--
-- Constraints for table `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `sets_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admin` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
