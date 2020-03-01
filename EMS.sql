-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2020 at 12:45 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(100) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_date` varchar(100) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `emp_date`, `birth_date`, `position`) VALUES
(4, 'dsdsds', '2020-03-11', '2020-03-25', 'management-assistant'),
(3, 'Salitha Nanayakkara', '2020-03-18', '2020-03-26', 'management-assistant');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `emp_id` int(100) NOT NULL,
  `leave_date` varchar(100) NOT NULL,
  `leave_month` varchar(100) NOT NULL,
  `leave_reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`emp_id`, `leave_date`, `leave_month`, `leave_reason`) VALUES
(4, '2020-03-10', 'January', 'xxxxxxxxxxxx'),
(3, '2020-03-10', 'March', 'sdadasdas'),
(4, '2020-03-04', 'January', 'dsdsdsd'),
(4, '2020-03-02', 'January', 'sssssssssssssswwwwwwwwww'),
(3, '2020-03-07', 'March', 'dsadasdsad'),
(3, '2020-01-14', 'January', 'ddasdadsad');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `emp_id` int(100) NOT NULL,
  `i_rate` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `installments` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`emp_id`, `i_rate`, `amount`, `installments`) VALUES
(4, 6, 500000, 43),
(3, 3, 2324343, 23);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `emp_id` int(100) NOT NULL,
  `salary_month` varchar(100) NOT NULL,
  `basic_salary` int(100) NOT NULL,
  `allowances` int(100) NOT NULL,
  `ot_hours` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`emp_id`, `salary_month`, `basic_salary`, `allowances`, `ot_hours`) VALUES
(4, 'January', 200000, 20000, 20),
(4, 'February', 100000, 20000, 10),
(3, 'January', 100000, 20000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `emp_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emp_id`, `username`, `user_type`, `password`) VALUES
(1, 'salitha11', 'user', ''),
(2, 'salitha11', 'user', ''),
(3, 'salitha12', 'user', '202cb962ac59075b964b07152d234b70'),
(4, 'salitha14', 'admin', '202cb962ac59075b964b07152d234b70'),
(5, 'salitha15', 'user', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `emp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
