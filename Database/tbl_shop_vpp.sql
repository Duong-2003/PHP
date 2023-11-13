-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 12:24 PM
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
-- Database: `tbl_shop_vpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_code` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_description` varchar(300) DEFAULT NULL,
  `product_description_details` varchar(300) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_quantity` int(250) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_code`, `category_name`, `product_name`, `product_price`, `product_description`, `product_description_details`, `product_image`, `product_quantity`, `created_at`, `updated_at`) VALUES
(0, 'daasds', 'sdsd', '20000', 'dsadas', 'dwdadwda', '', 1, '2023-11-13 08:54:11', '2023-11-13 08:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `role`, `created_at`, `updated_at`) VALUES
(21, 'Dươnggg', 'Admin1@gmail.com', '1234', '12233', 'user', '2023-11-13 03:22:56', '2023-11-13 03:22:56'),
(22, 'Dươnggg', 'admin3@gmail.com', '1234', '1234', 'user', '2023-11-13 03:24:14', '2023-11-13 03:24:14'),
(23, 'Dươngggg', 'Admin2000@gmail.com', '1234', '1234', 'user', '2023-11-13 03:25:21', '2023-11-13 03:25:21'),
(24, 'Dươngggg', 'admin1@gmail.com', '1234', '12345', 'user', '2023-11-13 03:27:37', '2023-11-13 03:27:37'),
(27, 'Dươnggg', 'anhtustyle31200331@gmail.com', '1234', 'adwdw', 'user', '2023-11-13 03:59:16', '2023-11-13 03:59:16'),
(28, 'Dươnggg', 'anhtustyle31200331333@gmail.com', '1234', 'adwdw', 'user', '2023-11-13 03:59:51', '2023-11-13 03:59:51'),
(29, 'Dươnggg', 'Admin2000@gmail.com', '1234', '1234', 'admin', '2023-11-13 04:08:38', '2023-11-13 04:08:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
