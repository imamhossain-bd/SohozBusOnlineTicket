-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 07:50 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `customer_route` varchar(255) NOT NULL,
  `booked_amount` int(100) NOT NULL,
  `booked_seat` varchar(155) NOT NULL,
  `booking_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'NBS4455', 0, '2025-01-13 12:49:31'),
(20, 'QWQXF65', 0, '2024-12-31 11:39:49'),
(22, 'LLL769DG', 0, '2024-12-31 11:40:11'),
(23, 'MEH35KH', 0, '2024-12-31 11:40:22'),
(24, 'TTH8888', 0, '2024-12-31 11:40:31'),
(25, 'REYH4255', 0, '2024-12-31 11:40:42'),
(32, 'IUEJGKD7654', 0, '2025-01-13 10:16:32'),
(33, 'NBS4455', 0, '2025-01-15 23:24:22'),
(34, 'NBS4455', 0, '2025-01-15 23:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(100) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `route_cities` varchar(255) NOT NULL,
  `route_dep_date` date NOT NULL,
  `route_dep_time` time NOT NULL,
  `route_step_cost` int(100) NOT NULL,
  `route_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_id`, `bus_no`, `route_cities`, `route_dep_date`, `route_dep_time`, `route_step_cost`, `route_created`) VALUES
(1, 'RT-164161', 'IUEJD6K4', 'DHAKA, NOAKHALI', '2023-06-22', '02:45:00', 500, '2025-01-11 20:13:58'),
(2, 'RT-826842', 'YAFK34G5', 'DHAKA, CHITTAGONG', '2022-09-14', '04:20:00', 350, '2025-01-11 20:14:36'),
(5, 'RT-490665', 'YAFK34G5', 'DHAKA - BARISHAL', '2024-08-15', '02:20:00', 550, '2025-01-13 02:21:33'),
(6, 'RT-182486', 'IUEKD7654', 'DHAKA, RAMGOTI', '2024-09-25', '03:45:00', 650, '2025-01-13 09:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `seat_code` varchar(5) NOT NULL,
  `status` enum('available','booked') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `bus_id`, `seat_code`, `status`) VALUES
(1, 33, 'A1', 'available'),
(2, 33, 'A2', 'available'),
(3, 33, 'A3', 'available'),
(4, 33, 'A4', 'available'),
(5, 33, 'B1', 'available'),
(6, 33, 'B2', 'available'),
(7, 33, 'B3', 'available'),
(8, 33, 'B4', 'available'),
(9, 33, 'C1', 'available'),
(10, 33, 'C2', 'available'),
(11, 33, 'C3', 'available'),
(12, 33, 'C4', 'available'),
(13, 33, 'D1', 'available'),
(14, 33, 'D2', 'available'),
(15, 33, 'D3', 'available'),
(16, 33, 'D4', 'available'),
(17, 33, 'E1', 'available'),
(18, 33, 'E2', 'available'),
(19, 33, 'E3', 'available'),
(20, 33, 'E4', 'available'),
(21, 33, 'F1', 'available'),
(22, 33, 'F2', 'available'),
(23, 33, 'F3', 'available'),
(24, 33, 'F4', 'available'),
(25, 33, 'G1', 'available'),
(26, 33, 'G2', 'available'),
(27, 33, 'G3', 'available'),
(28, 33, 'G4', 'available'),
(29, 33, 'H1', 'available'),
(30, 33, 'H2', 'available'),
(31, 33, 'H3', 'available'),
(32, 33, 'H4', 'available'),
(33, 33, 'I1', 'available'),
(34, 33, 'I2', 'available'),
(35, 33, 'I3', 'available'),
(36, 33, 'I4', 'available'),
(37, 33, 'J1', 'available'),
(38, 33, 'J2', 'available'),
(39, 33, 'J3', 'available'),
(40, 33, 'J4', 'available'),
(41, 34, 'A1', 'available'),
(42, 34, 'A2', 'available'),
(43, 34, 'A3', 'available'),
(44, 34, 'A4', 'available'),
(45, 34, 'B1', 'available'),
(46, 34, 'B2', 'available'),
(47, 34, 'B3', 'available'),
(48, 34, 'B4', 'available'),
(49, 34, 'C1', 'available'),
(50, 34, 'C2', 'available'),
(51, 34, 'C3', 'available'),
(52, 34, 'C4', 'available'),
(53, 34, 'D1', 'available'),
(54, 34, 'D2', 'available'),
(55, 34, 'D3', 'available'),
(56, 34, 'D4', 'available'),
(57, 34, 'E1', 'available'),
(58, 34, 'E2', 'available'),
(59, 34, 'E3', 'available'),
(60, 34, 'E4', 'available'),
(61, 34, 'F1', 'available'),
(62, 34, 'F2', 'available'),
(63, 34, 'F3', 'available'),
(64, 34, 'F4', 'available'),
(65, 34, 'G1', 'available'),
(66, 34, 'G2', 'available'),
(67, 34, 'G3', 'available'),
(68, 34, 'G4', 'available'),
(69, 34, 'H1', 'available'),
(70, 34, 'H2', 'available'),
(71, 34, 'H3', 'available'),
(72, 34, 'H4', 'available'),
(73, 34, 'I1', 'available'),
(74, 34, 'I2', 'available'),
(75, 34, 'I3', 'available'),
(76, 34, 'I4', 'available'),
(77, 34, 'J1', 'available'),
(78, 34, 'J2', 'available'),
(79, 34, 'J3', 'available'),
(80, 34, 'J4', 'available');

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
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
