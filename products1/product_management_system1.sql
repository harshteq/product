-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2023 at 07:05 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_tags` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_description`, `product_category`, `product_image`, `product_tags`, `status`, `created_date`, `modified_date`) VALUES
(7, 'chair', 'Lorem ipsum, in graphical and textual context,', 'chair', 'product-1-370x270.jpg', 'chair', 1, '2023-02-03 08:50:27', '2023-02-03 08:50:27'),
(8, 'chair', 'Lorem ipsum, in graphical and textual context,', 'bed', 'product-2-370x270.jpg', 'chair', 1, '2023-02-03 08:52:00', '2023-02-03 08:52:00'),
(9, 'bed', 'Lorem ipsum, in graphical and textual context,', 'chair', 'product-3-370x270.jpg', 'bed', 1, '2023-02-03 08:52:33', '2023-02-03 08:52:33'),
(10, 'tables', 'Lorem ipsum, in graphical and textual context,', 'chair', 'product-4-370x270.jpg', 'table', 1, '2023-02-03 08:53:28', '2023-02-03 08:53:28'),
(11, 'sofa', 'Lorem ipsum, in graphical and textual context,', 'bed', 'product-5-370x270.jpg', 'bed', 1, '2023-02-03 09:14:26', '2023-02-03 09:14:26'),
(12, 'bed', 'Lorem ipsum, in graphical and textual context,', 'bed', 'product-6-370x270.jpg', 'bed', 1, '2023-02-03 09:15:25', '2023-02-03 09:15:25'),
(13, 'sofa', 'When deleting entities, associated data can also be deleted.', 'sofa', 'product-2-370x270.jpg', 'sofa', 1, '2023-02-03 11:29:43', '2023-02-03 11:29:43'),
(14, 'bed', 'When deleting entities, associated data can also be deleted.', 'bed', 'product-5-370x270.jpg', 'bed', 1, '2023-02-03 11:30:15', '2023-02-03 11:30:15'),
(15, 'chair', 'When deleting entities, associated data can also be deleted.', 'chair', 'product-3-370x270.jpg', 'chair', 1, '2023-02-03 11:30:33', '2023-02-03 11:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `status`, `created_date`, `modified_date`) VALUES
(1, 'chair', 1, '2023-02-03 14:17:52', '2023-02-03 14:17:52'),
(3, 'bed', 1, '2023-02-03 14:18:01', '2023-02-03 14:18:01'),
(4, 'sofa', 1, '2023-02-03 14:18:11', '2023-02-03 14:18:11'),
(5, 'table', 1, '2023-02-03 11:46:54', '2023-02-03 11:46:54'),
(6, 'car', 1, '2023-02-03 12:48:54', '2023-02-03 12:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `name`, `comments`, `created_date`, `modified_date`) VALUES
(5, 7, 1, 'harsh', 'nice', '2023-02-03 12:15:26', '2023-02-03 12:15:26'),
(6, 7, 1, 'harsh', 'nice', '2023-02-03 12:17:00', '2023-02-03 12:17:00'),
(7, 7, 9, 'raman', 'nice', '2023-02-03 12:17:45', '2023-02-03 12:17:45'),
(8, 7, 9, 'raman', 'very nice', '2023-02-03 12:22:45', '2023-02-03 12:22:45'),
(9, 7, 9, 'raman', 'nice', '2023-02-03 12:41:42', '2023-02-03 12:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `created_date`, `modified_date`) VALUES
(1, 'hk244381@gmail.com', '$2y$10$zCeoYhC95iHiDWbM0wanlOpA1sYR9gvYIiO.81oCrQfSgds1jUPli', '1', 1, '2023-02-03 10:51:17', '2023-02-03 10:51:17'),
(9, 'raman@gmail.com', '$2y$10$3.qDc8SsUQ8/RKiYj1M4ROpZbPuy83LlQiA5ESX/kMLCNm17dVAti', '0', 1, '2023-02-03 11:22:45', '2023-02-03 11:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `profile_image`, `created_date`, `modified_date`) VALUES
(1, 1, 'harsh', 'kumar', 1234567895, 'khanna', 'bghg.jpeg', '2023-02-03 10:51:17', '2023-02-03 10:51:17'),
(9, 9, 'raman', 'singh', 1234567891, 'khanna', 'bghg.jpeg', '2023-02-03 11:22:45', '2023-02-03 11:22:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
