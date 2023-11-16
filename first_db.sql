-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 05:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_tbl`
--

CREATE TABLE `list_tbl` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `date_posted` varchar(30) NOT NULL,
  `time_posted` time NOT NULL,
  `date_edited` varchar(30) NOT NULL,
  `time_edited` time NOT NULL,
  `public` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_tbl`
--

INSERT INTO `list_tbl` (`id`, `details`, `date_posted`, `time_posted`, `date_edited`, `time_edited`, `public`) VALUES
(21, 'Public Data 1', '2023-11-17', '12:00:00', '2023-11-17', '14:30:00', 'yes'),
(22, 'Public Data 2', '2023-11-18', '14:30:00', '2023-11-18', '16:45:00', 'yes'),
(23, 'Public Data 3', '2023-11-19', '09:00:00', '2023-11-19', '11:20:00', 'yes'),
(24, 'Public Data 4', '2023-11-20', '10:30:00', '2023-11-20', '12:45:00', 'yes'),
(25, 'Private Data 1', '2023-11-21', '08:45:00', '2023-11-21', '10:15:00', 'no'),
(26, 'Private Data 2', '2023-11-22', '13:15:00', '2023-11-22', '15:30:00', 'no'),
(27, 'Private Data 3', '2023-11-23', '11:00:00', '2023-11-23', '13:20:00', 'no'),
(28, 'Private Data 4', '2023-11-24', '09:30:00', '2023-11-24', '11:45:00', 'no'),
(29, 'Private Data 5', '2023-11-25', '14:00:00', '2023-11-25', '16:15:00', 'no'),
(30, 'Private Data 6', '2023-11-26', '10:45:00', '2023-11-26', '12:00:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `password`) VALUES
(1, 'test1', 'test1'),
(2, 'test2', 'test2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_tbl`
--
ALTER TABLE `list_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_tbl`
--
ALTER TABLE `list_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
