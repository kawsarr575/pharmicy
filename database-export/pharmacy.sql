-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 06:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_user_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_user_id`, `cat_name`, `created_at`, `updated_at`) VALUES
(9, 0, 'Capsule', '2021-02-13 04:10:56', '2021-02-13 04:10:56'),
(10, 0, 'Tablet', '2021-02-13 04:11:06', '2021-02-13 04:11:06'),
(11, 11, 'Napa', '2021-02-13 11:06:13', '2021-02-13 11:06:13'),
(12, 12, 'ddd', '2021-02-13 11:08:53', '2021-02-13 11:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `created_at`, `updated_at`) VALUES
(4, 'Mirpur', '2021-02-10 03:58:00', '2021-02-10 03:58:00'),
(5, 'Uttara', '2021-02-10 06:06:34', '2021-02-10 06:06:34'),
(6, 'Dhanmondi', '2021-02-10 06:06:47', '2021-02-10 06:06:47'),
(7, 'Kalabagan', '2021-02-10 06:07:02', '2021-02-10 06:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `o_product_name` varchar(250) NOT NULL,
  `o_price` int(11) NOT NULL,
  `o_sub_total` int(11) NOT NULL,
  `o_quantity` int(11) NOT NULL,
  `o_vendor_id` int(11) NOT NULL,
  `o_customer_id` int(11) NOT NULL,
  `o_product_id` int(11) NOT NULL,
  `o_status` varchar(250) NOT NULL,
  `o_prescription_img` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `o_product_name`, `o_price`, `o_sub_total`, `o_quantity`, `o_vendor_id`, `o_customer_id`, `o_product_id`, `o_status`, `o_prescription_img`, `created_at`, `updated_at`) VALUES
(1, 'capsule', 30, 30, 1, 14, 13, 6, 'Completed', '', '2021-02-10 19:15:46', '2021-02-10 13:57:29'),
(2, 'capsule', 30, 60, 2, 14, 13, 6, 'Completed', '', '2021-02-10 18:59:29', '2021-02-10 14:15:54'),
(4, 'Napa', 10, 30, 3, 14, 15, 7, 'Completed', '', '2021-02-10 18:57:24', '2021-02-10 18:00:34'),
(5, 'Napa', 10, 60, 6, 14, 15, 7, 'Pending', '', '2021-02-10 19:23:14', '2021-02-10 19:23:14'),
(6, 'Napa22', 20, 100, 5, 11, 13, 4, 'Pending', '', '2021-02-11 06:27:18', '2021-02-11 06:27:18'),
(7, 'capsule', 30, 360, 12, 14, 13, 9, 'Pending', '', '2021-02-13 02:57:45', '2021-02-13 02:57:45'),
(9, 'Sargel', 20, 40, 2, 11, 13, 14, 'Pending', '1613232431rehub.jpg', '2021-02-13 16:07:11', '2021-02-13 16:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(2000) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_sale_price` int(11) NOT NULL,
  `product_cagetory` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_des` varchar(2000) NOT NULL,
  `product_restricted` varchar(250) NOT NULL,
  `product_prescription` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_sale_price`, `product_cagetory`, `vendor_id`, `product_img`, `product_des`, `product_restricted`, `product_prescription`, `created_at`, `updated_at`) VALUES
(4, 'Napa22', 20, 0, 9, 11, '1612936359Enfold.jpg', 'test', 'on', '', '2021-02-13 06:34:40', '2021-02-10 05:52:39'),
(5, 'tablet', 20, 0, 8, 14, '1612942256wordpress-booking-design.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to', '', '', '2021-02-10 07:30:56', '2021-02-10 07:30:56'),
(6, 'capsule', 30, 0, 8, 14, '1612942317wordpress-site.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to', '', '', '2021-02-10 07:31:57', '2021-02-10 07:31:57'),
(7, 'Napa', 10, 0, 8, 14, '161294238771IcJyAzeFL._AC_SL1500_.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to', '', '', '2021-02-10 07:33:07', '2021-02-10 07:33:07'),
(9, 'capsule', 30, 0, 8, 14, '1612975426duster killer_1.jpg', '', '', '', '2021-02-10 16:43:46', '2021-02-10 16:43:46'),
(10, 'Test', 20, 0, 8, 14, '161297553971Shd8YpPUL._AC_SL1500_.jpg', '', '', '', '2021-02-10 16:45:39', '2021-02-10 16:45:39'),
(11, 'Paracitimal', 20, 0, 9, 11, '1613196333XStore.jpg', '', '', '', '2021-02-13 06:27:27', '2021-02-13 06:05:33'),
(12, 'napa', 20, 0, 9, 11, '1613197297rehub.jpg', '', 'on', '', '2021-02-13 06:34:47', '2021-02-13 06:21:37'),
(13, 'Napa2', 20, 0, 9, 11, '1613197661rehub.jpg', '', '', '', '2021-02-13 06:34:22', '2021-02-13 06:27:41'),
(14, 'Sargel', 20, 0, 11, 11, '1613232311wordpress-booking-design.jpg', 'test', 'on', '', '2021-02-13 16:05:11', '2021-02-13 16:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_img` varchar(2000) NOT NULL,
  `user_role` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_phone` varchar(250) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_img`, `user_role`, `user_pass`, `user_phone`, `user_address`, `created_at`, `updated_at`) VALUES
(11, 'vendor', 'vendor@gmail.com', 'c73a9a4ec9f40a35b151edeec188416f.jpg', 'vendor', '1', '01987850400', '4', '2021-02-10 04:47:37', '2021-02-10 03:55:17'),
(12, 'admin', 'admin@gmail.com', '', 'admin', '1', '', '', '2021-02-10 05:12:15', '2021-02-10 05:00:09'),
(13, 'customer', 'customer@gmail.com', '', 'customer', '1', '018', 'mirpur', '2021-02-10 17:42:14', '2021-02-10 05:26:31'),
(14, 'Laz pharma', 'laz@gmail.com', '8a818a41bbae03e843fff80e14d3b2d6.jpg', 'vendor', '1', '0193', '4', '2021-02-10 07:01:12', '2021-02-10 07:01:12'),
(15, 'Kawsar', 'kawsar@gmail.com', '', 'customer', '1', '017833', 'Mirpur', '2021-02-10 17:41:18', '2021-02-10 17:41:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
