-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 07:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shohoz_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(100) NOT NULL,
  `bus_no` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `bus_assigned` tinyint(1) NOT NULL,
  `bus_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_no`, `bus_assigned`, `bus_create`) VALUES
(19, 'CAS3300', 0, '2024-12-31 11:38:39'),
(20, 'NBS4455', 0, '2024-12-31 11:39:49'),
(21, 'SSX6633', 0, '2024-12-31 11:40:02'),
(22, 'LLL7699', 0, '2024-12-31 11:40:11'),
(23, 'MMM9969', 0, '2024-12-31 11:40:22'),
(24, 'TTH8888', 0, '2024-12-31 11:40:31'),
(25, 'RDH4255', 0, '2024-12-31 11:40:42'),
(26, 'BCC9999', 0, '2024-12-31 11:41:01'),
(27, '	XYZ7890', 0, '2024-12-31 11:41:13'),
(28, 'ABC0010', 0, '2024-12-31 11:41:26'),
(29, 'ABC0010', 0, '2024-12-31 11:43:51'),
(30, 'ABC0010', 0, '2024-12-31 11:45:40'),
(31, 'ABC0010', 0, '2024-12-31 11:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_no` varchar(155) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `seat_booked` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`, `type`) VALUES
(17, 'Imam Hossain', '01644269632', 'aminul@gmail.com', '$2y$10$dzr8qtXWpsJoA9uNSm9gc.QTxupMsK/VPlWk4S/xDf/6TPBRN0dpy', 'users'),
(18, 'Sins Mirja', '01832455578', 'sinsmirja@gmail.com', '$2y$10$xcl2Gxy/GAKNtkhWyYlw9.dQoQg5W.kRZzSNtv.3aMMbmfo3.rxq6', 'users'),
(19, 'Md Rafi', '01578456452', 'rafi@gmail.com', '$2y$10$EqwepJLjineZ5fCwCSj9TOEjqrNrS7thPsn.TRDxPRCCRq3Oe51U2', 'users'),
(21, 'Imam Hossain', '01644269632', 'md.imamhossain.bd4@gmail.com', '$2y$10$2wwFmaH7b33LOINalcdkzeVLbssz4FKmGKG/ajaP0dJqG6v9M3q1.', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
