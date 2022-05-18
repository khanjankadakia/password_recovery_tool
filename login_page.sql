-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 02:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Serial_Number` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `admin/user` varchar(5) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `pin` int(4) NOT NULL,
  `locked` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Serial_Number`, `username`, `password`, `first_name`, `last_name`, `admin/user`, `mobile_number`, `email_id`, `pin`, `locked`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Fname1', 'Lname1', 'admin', 9999999991, 'admin@gmail.com', 1234, ''),
(2, 'User1', '24c9e15e52afc47c225b757e7bee1f9d', 'Fname2', 'Lname2', 'user', 99999999, 'user1@gmail.com', 9999, '');

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE `passwords` (
  `Sr_No` int(11) NOT NULL,
  `Serial_Number` int(11) NOT NULL,
  `Site` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`Sr_No`, `Serial_Number`, `Site`, `Username`, `Password`) VALUES
(23, 2, 'Facebook', 'Facebook_User', 'facebookispass'),
(24, 2, 'Google', 'username', 'password'),
(26, 2, 'Amazon', 'usr1@amazon.com', 'amazonispass'),
(27, 2, 'Google', 'Google_user', 'User@10023'),
(35, 2, 'Amazon', 'Google_user', 'password'),
(36, 2, 'Facebook', 'User1', 'facebook'),
(37, 2, 'Snapchat', 'Snap_User1', 'snapchat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Serial_Number`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`Sr_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Serial_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `Sr_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
