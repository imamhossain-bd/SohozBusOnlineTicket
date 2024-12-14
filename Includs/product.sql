-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 06:51 AM
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
-- Database: `product`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_brand` (IN `name` VARCHAR(100), IN `price` DOUBLE, IN `id` INT)   BEGIN
INSERT INTO addproduct(name, price, brand_id)VALUES(name, price, id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `brand_insert` (IN `n` VARCHAR(100), IN `con` VARCHAR(100))   BEGIN
INSERT INTO brand SET id= null, name = n, contact= con;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(50) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `brand_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`id`, `name`, `price`, `brand_id`) VALUES
(2, 'Apple', '300000', 1),
(3, 'snsumg', '6700000', 7),
(4, 'snsumg', '6700000', 7),
(5, 'Realme', '60000', 9),
(6, 'coky', '300000', 10),
(7, 'adfar', '6700000', 1),
(8, '', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `contact`) VALUES
(1, 'Apple', '1234455676786'),
(2, 'Redmi', '546456'),
(7, 'Samsung', '1234455676786'),
(8, 'Rabbi', '546456'),
(9, 'Realme', '1025420'),
(10, 'coky', '54645610254'),
(11, 'Redmi', '21312.01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_display`
-- (See below for the actual view)
--
CREATE TABLE `product_display` (
`name` varchar(100)
,`contact` varchar(100)
,`p_name` varchar(150)
,`price` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `product_display`
--
DROP TABLE IF EXISTS `product_display`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_display`  AS SELECT `brand`.`name` AS `name`, `brand`.`contact` AS `contact`, `addproduct`.`name` AS `p_name`, `addproduct`.`price` AS `price` FROM (`brand` join `addproduct`) WHERE `brand`.`id` = `addproduct`.`brand_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
