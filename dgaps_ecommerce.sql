-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 12:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgaps_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_meta_title` varchar(255) NOT NULL,
  `category_meta_description` varchar(500) NOT NULL,
  `category_meta_tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_meta_title`, `category_meta_description`, `category_meta_tags`) VALUES
(4, 'Food', 'food', 'food meta title', 'food meta description', 'food,tasty food'),
(5, 'Drinks', 'drinks', 'Drinks meta title', 'Drinks meta description', 'drinks,sweet drinks'),
(6, 'Electronics', 'electronics', 'electronics meta title', 'electronics meta description', 'electronics,amazing electronics');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`product_id`, `user_id`) VALUES
(18, 1),
(11, 1),
(13, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `meta_title`, `meta_description`, `meta_tags`) VALUES
(1, 'Ecommerce | Shop online every thing', 'Shop online Electronics, food and much more', 'apple,iphone,laptop,samsung,shoes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `paymentMethod` text NOT NULL,
  `name_on_cc` text NOT NULL,
  `cc_number` int(100) NOT NULL,
  `cc_expiration` varchar(255) NOT NULL,
  `cc_cvv` varchar(255) NOT NULL,
  `total` int(5) NOT NULL,
  `order_date` date NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `user_name`, `user_email`, `user_address`, `country`, `state`, `zip_code`, `paymentMethod`, `name_on_cc`, `cc_number`, `cc_expiration`, `cc_cvv`, `total`, `order_date`, `product_ids`, `user_id`) VALUES
(2, 'Muhammad Qaisar Khan', 'Muhammad Qaisar Khan', 'yasir99', 'yasir@gmail.com', 'house 18 bhutta chowk khanewal', 'United States', 'California', '58120', 'credit_card', 'Qaisar Khan', 11234, '111', '111', 2907, '2019-03-07', '8,3,1,2', 1),
(3, 'Muhammad Qaisar Khan', 'Muhammad Qaisar Khan', 'yaseen99', 'yahoo@gmail.com', 'house 18 bhutta chowk khanewal', 'United States', 'California', '58120', 'credit_card', 'Qaisar Khan', 134, '345', '456', 1335, '2019-03-07', '13,12,15,14,11,18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_meta_title` varchar(255) NOT NULL,
  `product_meta_description` varchar(255) NOT NULL,
  `product_meta_tags` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_slug`, `product_meta_title`, `product_meta_description`, `product_meta_tags`, `product_category`, `product_price`) VALUES
(9, 'Laptop', 'laptop', 'dell laptop', 'Fastest Dell Gaming laptop', 'dell laptop', '6', '800'),
(10, 'Samosa', 'samosa', 'samosa', 'samosa', 'samosa', '4', '10'),
(11, 'Rice', 'rice', 'rice', 'rice', 'rice', '4', '15'),
(12, 'Chicken', 'chicken', 'chicken', 'chicken', 'chicken', '4', '30'),
(13, 'Coca cola', 'coca-cola', 'coka cola', 'coca cola', 'coca cola', '5', '40'),
(14, 'Pepsi', 'pepsi', 'pepsi', 'pepsi', 'pepsi', '5', '50'),
(15, 'Iphone', 'iphone', 'iphone', 'iphone', 'iphone', '6', '1000'),
(16, 'Ipad', 'ipad', 'ipad', 'ipad', 'ipad', '6', '1600'),
(17, 'Washing machine', 'washing-machine', 'washing machine', 'washing machine', 'waching machine', '6', '1900'),
(18, 'galaxy s5', 'galaxy-s5', 'galaxy s5', 'galaxy s5', 'galaxy s5', '6', '200'),
(19, 'asus 8', 'asus-8', 'asus 8', 'asus 8', 'asus 8', '6', '300'),
(20, 'Nokia c8', 'nokia-c8', 'nokia c8', 'nokia c8', 'nokia c8', '6', '500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_city` text CHARACTER SET latin1 NOT NULL,
  `user_address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_role` text CHARACTER SET latin1 NOT NULL,
  `user_status` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_city`, `user_address`, `user_password`, `user_role`, `user_status`) VALUES
(1, 'Qaisar', 'qaisar@gmail.com', 'Mianwali', 'this is my new home address', '$2y$10$DWM7mkuRZU05XOeT1DWkq.1UwcyXs84NgJGpdsHj2ZyibXNbh6RMi', 'admin', 'unblocked'),
(2, 'Yaseen', 'yaseen@gmail.com', 'Lahore', 'bhutta chowk kalma street house 14', '$2y$10$unXPuxE8R8Ijc9kl9idIme.Pr8KS7pvzi.mDcPOyc2IdLpRIp6xkS', 'customer', 'blocked'),
(3, 'kamran', 'kamran@gmail.com', 'Peshawar', 'village bolan house 5', '$2y$10$mMrdChiUNb4aebTd1VpFeeYvBzXOQeQDBrSRSCAPZYFgy3bYzT7uu', 'customer', 'unblocked');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
