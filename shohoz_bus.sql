-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 08:05 AM
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
(20, 'NBS4455', 0, '2024-12-31 11:39:49'),
(22, 'LLL769DG', 0, '2024-12-31 11:40:11'),
(23, 'MEH35KH', 0, '2024-12-31 11:40:22'),
(24, 'TTH8888', 0, '2024-12-31 11:40:31'),
(25, 'REYH4255', 0, '2024-12-31 11:40:42'),
(32, 'IUEJGKD7654', 0, '2025-01-13 10:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `bus_seats`
--

CREATE TABLE `bus_seats` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `seat_code` varchar(10) NOT NULL,
  `status` enum('available','booked') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_seats`
--

INSERT INTO `bus_seats` (`id`, `bus_id`, `seat_code`, `status`) VALUES
(5, 1, 'A1', 'available'),
(6, 1, 'A2', 'available'),
(7, 1, 'A3', 'available'),
(8, 1, 'A4', 'available'),
(9, 1, 'B1', 'available'),
(10, 1, 'B2', 'available'),
(11, 1, 'B3', 'available'),
(12, 1, 'B4', 'available'),
(13, 1, 'C1', 'available'),
(14, 1, 'C2', 'available'),
(15, 1, 'C3', 'available'),
(16, 1, 'C4', 'available'),
(17, 1, 'D1', 'available'),
(18, 1, 'D2', 'available'),
(19, 1, 'D3', 'available'),
(20, 1, 'D4', 'available'),
(21, 1, 'E1', 'available'),
(22, 1, 'E2', 'available'),
(23, 1, 'E3', 'available'),
(24, 1, 'E4', 'available'),
(25, 1, 'F1', 'available'),
(26, 1, 'F2', 'available'),
(27, 1, 'F3', 'available'),
(28, 1, 'F4', 'available'),
(29, 1, 'G1', 'available'),
(30, 1, 'G2', 'available'),
(31, 1, 'G3', 'available'),
(32, 1, 'G4', 'available'),
(33, 1, 'H1', 'available'),
(34, 1, 'H2', 'available'),
(35, 1, 'H3', 'available'),
(36, 1, 'H4', 'available'),
(37, 1, 'I1', 'available'),
(38, 1, 'I2', 'available'),
(39, 1, 'I3', 'available'),
(40, 1, 'I4', 'available'),
(41, 1, 'J1', 'available'),
(42, 1, 'J2', 'available'),
(43, 1, 'J3', 'available'),
(44, 1, 'J4', 'available'),
(45, 1, 'A1', 'available'),
(46, 1, 'A2', 'available'),
(47, 1, 'A3', 'available'),
(48, 1, 'A4', 'available'),
(49, 1, 'B1', 'available'),
(50, 1, 'B2', 'available'),
(51, 1, 'B3', 'available'),
(52, 1, 'B4', 'available'),
(53, 1, 'C1', 'available'),
(54, 1, 'C2', 'available'),
(55, 1, 'C3', 'available'),
(56, 1, 'C4', 'available'),
(57, 1, 'D1', 'available'),
(58, 1, 'D2', 'available'),
(59, 1, 'D3', 'available'),
(60, 1, 'D4', 'available'),
(61, 1, 'E1', 'available'),
(62, 1, 'E2', 'available'),
(63, 1, 'E3', 'available'),
(64, 1, 'E4', 'available'),
(65, 1, 'F1', 'available'),
(66, 1, 'F2', 'available'),
(67, 1, 'F3', 'available'),
(68, 1, 'F4', 'available'),
(69, 1, 'G1', 'available'),
(70, 1, 'G2', 'available'),
(71, 1, 'G3', 'available'),
(72, 1, 'G4', 'available'),
(73, 1, 'H1', 'available'),
(74, 1, 'H2', 'available'),
(75, 1, 'H3', 'available'),
(76, 1, 'H4', 'available'),
(77, 1, 'I1', 'available'),
(78, 1, 'I2', 'available'),
(79, 1, 'I3', 'available'),
(80, 1, 'I4', 'available'),
(81, 1, 'J1', 'available'),
(82, 1, 'J2', 'available'),
(83, 1, 'J3', 'available'),
(84, 1, 'J4', 'available'),
(85, 1, 'A1', 'available'),
(86, 1, 'A2', 'available'),
(87, 1, 'A3', 'available'),
(88, 1, 'A4', 'available'),
(89, 1, 'B1', 'available'),
(90, 1, 'B2', 'available'),
(91, 1, 'B3', 'available'),
(92, 1, 'B4', 'available'),
(93, 1, 'C1', 'available'),
(94, 1, 'C2', 'available'),
(95, 1, 'C3', 'available'),
(96, 1, 'C4', 'available'),
(97, 1, 'D1', 'available'),
(98, 1, 'D2', 'available'),
(99, 1, 'D3', 'available'),
(100, 1, 'D4', 'available'),
(101, 1, 'E1', 'available'),
(102, 1, 'E2', 'available'),
(103, 1, 'E3', 'available'),
(104, 1, 'E4', 'available'),
(105, 1, 'F1', 'available'),
(106, 1, 'F2', 'available'),
(107, 1, 'F3', 'available'),
(108, 1, 'F4', 'available'),
(109, 1, 'G1', 'available'),
(110, 1, 'G2', 'available'),
(111, 1, 'G3', 'available'),
(112, 1, 'G4', 'available'),
(113, 1, 'H1', 'available'),
(114, 1, 'H2', 'available'),
(115, 1, 'H3', 'available'),
(116, 1, 'H4', 'available'),
(117, 1, 'I1', 'available'),
(118, 1, 'I2', 'available'),
(119, 1, 'I3', 'available'),
(120, 1, 'I4', 'available'),
(121, 1, 'J1', 'available'),
(122, 1, 'J2', 'available'),
(123, 1, 'J3', 'available'),
(124, 1, 'J4', 'available'),
(125, 1, 'A1', 'available'),
(126, 1, 'A2', 'available'),
(127, 1, 'A3', 'available'),
(128, 1, 'A4', 'available'),
(129, 1, 'B1', 'available'),
(130, 1, 'B2', 'available'),
(131, 1, 'B3', 'available'),
(132, 1, 'B4', 'available'),
(133, 1, 'C1', 'available'),
(134, 1, 'C2', 'available'),
(135, 1, 'C3', 'available'),
(136, 1, 'C4', 'available'),
(137, 1, 'D1', 'available'),
(138, 1, 'D2', 'available'),
(139, 1, 'D3', 'available'),
(140, 1, 'D4', 'available'),
(141, 1, 'E1', 'available'),
(142, 1, 'E2', 'available'),
(143, 1, 'E3', 'available'),
(144, 1, 'E4', 'available'),
(145, 1, 'F1', 'available'),
(146, 1, 'F2', 'available'),
(147, 1, 'F3', 'available'),
(148, 1, 'F4', 'available'),
(149, 1, 'G1', 'available'),
(150, 1, 'G2', 'available'),
(151, 1, 'G3', 'available'),
(152, 1, 'G4', 'available'),
(153, 1, 'H1', 'available'),
(154, 1, 'H2', 'available'),
(155, 1, 'H3', 'available'),
(156, 1, 'H4', 'available'),
(157, 1, 'I1', 'available'),
(158, 1, 'I2', 'available'),
(159, 1, 'I3', 'available'),
(160, 1, 'I4', 'available'),
(161, 1, 'J1', 'available'),
(162, 1, 'J2', 'available'),
(163, 1, 'J3', 'available'),
(164, 1, 'J4', 'available'),
(165, 1, 'A1', 'available'),
(166, 1, 'A2', 'available'),
(167, 1, 'A3', 'available'),
(168, 1, 'A4', 'available'),
(169, 1, 'B1', 'available'),
(170, 1, 'B2', 'available'),
(171, 1, 'B3', 'available'),
(172, 1, 'B4', 'available'),
(173, 1, 'C1', 'available'),
(174, 1, 'C2', 'available'),
(175, 1, 'C3', 'available'),
(176, 1, 'C4', 'available'),
(177, 1, 'D1', 'available'),
(178, 1, 'D2', 'available'),
(179, 1, 'D3', 'available'),
(180, 1, 'D4', 'available'),
(181, 1, 'E1', 'available'),
(182, 1, 'E2', 'available'),
(183, 1, 'E3', 'available'),
(184, 1, 'E4', 'available'),
(185, 1, 'F1', 'available'),
(186, 1, 'F2', 'available'),
(187, 1, 'F3', 'available'),
(188, 1, 'F4', 'available'),
(189, 1, 'G1', 'available'),
(190, 1, 'G2', 'available'),
(191, 1, 'G3', 'available'),
(192, 1, 'G4', 'available'),
(193, 1, 'H1', 'available'),
(194, 1, 'H2', 'available'),
(195, 1, 'H3', 'available'),
(196, 1, 'H4', 'available'),
(197, 1, 'I1', 'available'),
(198, 1, 'I2', 'available'),
(199, 1, 'I3', 'available'),
(200, 1, 'I4', 'available'),
(201, 1, 'J1', 'available'),
(202, 1, 'J2', 'available'),
(203, 1, 'J3', 'available'),
(204, 1, 'J4', 'available'),
(205, 1, 'A1', 'available'),
(206, 1, 'A2', 'available'),
(207, 1, 'A3', 'available'),
(208, 1, 'A4', 'available'),
(209, 1, 'B1', 'available'),
(210, 1, 'B2', 'available'),
(211, 1, 'B3', 'available'),
(212, 1, 'B4', 'available'),
(213, 1, 'C1', 'available'),
(214, 1, 'C2', 'available'),
(215, 1, 'C3', 'available'),
(216, 1, 'C4', 'available'),
(217, 1, 'D1', 'available'),
(218, 1, 'D2', 'available'),
(219, 1, 'D3', 'available'),
(220, 1, 'D4', 'available'),
(221, 1, 'E1', 'available'),
(222, 1, 'E2', 'available'),
(223, 1, 'E3', 'available'),
(224, 1, 'E4', 'available'),
(225, 1, 'F1', 'available'),
(226, 1, 'F2', 'available'),
(227, 1, 'F3', 'available'),
(228, 1, 'F4', 'available'),
(229, 1, 'G1', 'available'),
(230, 1, 'G2', 'available'),
(231, 1, 'G3', 'available'),
(232, 1, 'G4', 'available'),
(233, 1, 'H1', 'available'),
(234, 1, 'H2', 'available'),
(235, 1, 'H3', 'available'),
(236, 1, 'H4', 'available'),
(237, 1, 'I1', 'available'),
(238, 1, 'I2', 'available'),
(239, 1, 'I3', 'available'),
(240, 1, 'I4', 'available'),
(241, 1, 'J1', 'available'),
(242, 1, 'J2', 'available'),
(243, 1, 'J3', 'available'),
(244, 1, 'J4', 'available'),
(245, 1, 'A1', 'available'),
(246, 1, 'A2', 'available'),
(247, 1, 'A3', 'available'),
(248, 1, 'A4', 'available'),
(249, 1, 'B1', 'available'),
(250, 1, 'B2', 'available'),
(251, 1, 'B3', 'available'),
(252, 1, 'B4', 'available'),
(253, 1, 'C1', 'available'),
(254, 1, 'C2', 'available'),
(255, 1, 'C3', 'available'),
(256, 1, 'C4', 'available'),
(257, 1, 'D1', 'available'),
(258, 1, 'D2', 'available'),
(259, 1, 'D3', 'available'),
(260, 1, 'D4', 'available'),
(261, 1, 'E1', 'available'),
(262, 1, 'E2', 'available'),
(263, 1, 'E3', 'available'),
(264, 1, 'E4', 'available'),
(265, 1, 'F1', 'available'),
(266, 1, 'F2', 'available'),
(267, 1, 'F3', 'available'),
(268, 1, 'F4', 'available'),
(269, 1, 'G1', 'available'),
(270, 1, 'G2', 'available'),
(271, 1, 'G3', 'available'),
(272, 1, 'G4', 'available'),
(273, 1, 'H1', 'available'),
(274, 1, 'H2', 'available'),
(275, 1, 'H3', 'available'),
(276, 1, 'H4', 'available'),
(277, 1, 'I1', 'available'),
(278, 1, 'I2', 'available'),
(279, 1, 'I3', 'available'),
(280, 1, 'I4', 'available'),
(281, 1, 'J1', 'available'),
(282, 1, 'J2', 'available'),
(283, 1, 'J3', 'available'),
(284, 1, 'J4', 'available'),
(285, 1, 'A1', 'available'),
(286, 1, 'A2', 'available'),
(287, 1, 'A3', 'available'),
(288, 1, 'A4', 'available'),
(289, 1, 'B1', 'available'),
(290, 1, 'B2', 'available'),
(291, 1, 'B3', 'available'),
(292, 1, 'B4', 'available'),
(293, 1, 'C1', 'available'),
(294, 1, 'C2', 'available'),
(295, 1, 'C3', 'available'),
(296, 1, 'C4', 'available'),
(297, 1, 'D1', 'available'),
(298, 1, 'D2', 'available'),
(299, 1, 'D3', 'available'),
(300, 1, 'D4', 'available'),
(301, 1, 'E1', 'available'),
(302, 1, 'E2', 'available'),
(303, 1, 'E3', 'available'),
(304, 1, 'E4', 'available'),
(305, 1, 'F1', 'available'),
(306, 1, 'F2', 'available'),
(307, 1, 'F3', 'available'),
(308, 1, 'F4', 'available'),
(309, 1, 'G1', 'available'),
(310, 1, 'G2', 'available'),
(311, 1, 'G3', 'available'),
(312, 1, 'G4', 'available'),
(313, 1, 'H1', 'available'),
(314, 1, 'H2', 'available'),
(315, 1, 'H3', 'available'),
(316, 1, 'H4', 'available'),
(317, 1, 'I1', 'available'),
(318, 1, 'I2', 'available'),
(319, 1, 'I3', 'available'),
(320, 1, 'I4', 'available'),
(321, 1, 'J1', 'available'),
(322, 1, 'J2', 'available'),
(323, 1, 'J3', 'available'),
(324, 1, 'J4', 'available');

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
-- Indexes for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bus_seats`
--
ALTER TABLE `bus_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD CONSTRAINT `bus_seats_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
