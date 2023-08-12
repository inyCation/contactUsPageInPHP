-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2023 at 08:30 AM
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
-- Database: `contactUs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sl` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `salt` varchar(400) NOT NULL,
  `passwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sl`, `name`, `email`, `salt`, `passwd`) VALUES
(1, 'admin', 'admin@gmail.com', '56e0d07b2f24a2270dc8517f03eff6c0', '$2y$10$H8.t288/D7gbDOsbjveCYOJK7oHF1Ap6BCSngPtDwdmbxwoe4RJ0i');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sl` int(11) NOT NULL,
  `name` text NOT NULL DEFAULT '',
  `email` text NOT NULL DEFAULT '',
  `message` text NOT NULL DEFAULT '',
  `contact_query_no` text NOT NULL DEFAULT '',
  `status` text DEFAULT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sl`, `name`, `email`, `message`, `contact_query_no`, `status`, `dt`) VALUES
(2, 'Priya Sharma', 'priya@example.com', 'Hello! I\'m reaching out because I need assistance with a certain matter. Can you guide me through the process?', '7A5B3C1D9E', 'oh kt', '2023-08-09 12:30:00'),
(4, 'Sneha Gupta', 'sneha@example.com', 'Hey there! I seem to have encountered a roadblock while trying to access my account. Could you assist me in resolving this?', '9A7B5C3D1E', 'Absolutely!', '2023-08-09 16:45:00'),
(5, 'Neha Patel', 'neha@example.com', 'Greetings! I\'m interested in your services and would like to learn more. Can you share some insights about what you offer?', '0F1E2D3C4B', '', '2023-08-09 18:20:00'),
(6, 'Rajesh Singh', 'rajesh@example.com', 'Hello! I\'m intrigued by your products and have a specific question. Could you provide some clarity on this matter?', '5A4B3C2D1E', 'Certainly!', '2023-08-09 20:30:00'),
(7, 'Kavita Reddy', 'kavita@example.com', 'Hi! I\'m considering your services and would appreciate some additional details. Can you shed light on the unique benefits you provide?', '9F8E7D6C5B', '', '2023-08-09 22:15:00'),
(8, 'Aarav Deshmukh', 'aarav@example.com', 'Greetings! I\'ve encountered some confusion while managing my account settings. Could you assist me in navigating through this?', '1A2B3C4D5E', 'Sure thing!', '2023-08-09 23:45:00'),
(9, 'Tanvi Chauhan', 'tanvi@example.com', 'Hello! I\'m interested in your services and would like to know if there\'s a customer support number I can reach out to for queries.', '6F7E8D9C0B', '', '2023-08-10 09:30:00'),
(10, 'Ishaan Joshi', 'ishaan@example.com', 'Hey there! I\'m facing issues while trying to log into my account. Could you help me troubleshoot this issue?', '2A3B4C5D6E', 'hello , ill solve you query', '2023-08-10 11:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
