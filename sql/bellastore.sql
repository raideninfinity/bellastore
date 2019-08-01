-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2019 at 05:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8238479_bellastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `name`, `address`, `phone`) VALUES
(3, 'hazry_apexi96@yahoo.com', '123456', 'Syed Hazry ', 'Pangsapuri Al- Jazari, Durian Tunggal, Melaka. ', '0174341776'),
(4, 'julizaismail1@gmail.com', '123456', 'Juliza Ismail', 'Pangsapuri Sri Utama, Ayer Keroh, Melaka', '0173596035'),
(5, 'hasnida96@gmail.com', '123456', 'Hasnida Binti Malim', 'No 14 TTU 30, Taman Tasik Utama, Ayer Keroh, Melaka. ', '0139004709'),
(6, 'fatinhazeerah96@gmail.com', '123456', 'Fatin Hazeerah', 'No 14, Jalan TU 30, Taman Tasik Utama, Ayer Keroh, Melaka. ', '0173784008'),
(7, 'nurhazimaah@gmail.com', '123456', 'Nur Hazimah ', 'No 12 Jalan Desa Idaman 2, Taman Durian Tunggal, Melaka. ', '0108836005'),
(11, 'aaaa@bbbb.com', 'abc', 'abc', 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `units`) VALUES
(14, 3, 14, 1),
(15, 3, 17, 1),
(17, 3, 23, 3),
(19, 3, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `number` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `category` varchar(255) NOT NULL,
  `age_range` varchar(64) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `number`, `name`, `gender`, `category`, `age_range`, `description`, `price`, `image`, `status`) VALUES
(6, 'BT01 ', 'Fish Blue Stripe ', 'Male', 'Shirt', '1 to 3 years', 'Fish Blue Stripe', '15.00', 'rsz_organic-fish-blue-stripe-tshirt_ssafish.png', 'AVAILABLE'),
(7, 'BT02', 'Snowman Kids ', 'Male', 'Shirt', '4 to 6 years', 'Snowman Kids ', '150.00', 'rsz_snowman-kids-tshirt.jpg', 'AVAILABLE'),
(8, 'BT03 ', 'Red Best Kid Ever', 'Male', 'Shirt', '1 to 3 years', 'Red Best Kid Ever ', '20.00', 'rsz_front.jpg', 'AVAILABLE'),
(9, 'BT04', 'We Go High Shirt', 'Male', 'Shirt', '7 to 9 years', 'We Go High Shirt', '25.00', 'rsz_wegohigh-ss-yellow_2048x.jpg', 'AVAILABLE'),
(10, 'BT05', 'Braver, Smarter, Stronger ', 'Male', 'Shirt', '4 to 6 years', 'Braver, Smarter, Stronger', '25.00', 'rsz_file_d5241904.jpg', 'AVAILABLE'),
(11, 'GT01', 'Blue Girl Mama ', 'Female', 'Shirt', '4 to 6 years', 'Blue Girl Mama ', '15.00', 'rsz_71bzowvtfkl_ux385_.jpg', 'AVAILABLE'),
(12, 'GT02', 'Black Fancy Butterfly ', 'Female', 'Shirt', '1 to 3 years', 'Black Fancy Butterfly ', '30.01', 'rsz_5df9adb3-0e6c-4142-86db-86bf1b6167911538981295607-gap-toddler-girl-graphic-t-shirt-751538981295564-1.jpg', 'AVAILABLE'),
(13, 'GT03', 'Smart Girl Club T-Shirt ', 'Female', 'Shirt', 'Below 1 year', 'Smart Girl Club ', '20.00', 'rsz_smartgirlsclub-ss-pink_2048x.jpg', 'AVAILABLE'),
(14, 'GT04', 'I love mom', 'Female', 'Shirt', 'Below 1 year', 'I love mom', '15.00', 'rsz_jumping-beans-girls-blouses-t-shirts-boys.jpg', 'AVAILABLE'),
(15, 'GT05', 'Pink Blouse', 'Female', 'Shirt', '1 to 3 years', 'Pink Blouse ', '35.00', 'rsz_81gmxzkybql_ux679_.jpg', 'AVAILABLE'),
(16, 'GH01 ', 'Flowering Hat ', 'Female', 'Hat', '4 to 6 years', 'Pink Flowering Hat ', '25.00', 'rsz_flowering-chill-cap_53300_1_lg.png', 'AVAILABLE'),
(17, 'GH02', 'Kitty Hat ', 'Unisex', 'Hat', 'Below 1 year', 'Kids Kitty Hat ', '19.95', 'rsz_2936-2.jpg', 'AVAILABLE'),
(18, 'BH01 ', 'Duck Hat ', 'Male', 'Hat', 'Below 1 year', 'Yellow Duck Cap ', '15.00', 'rsz_kids-cap-250x250.jpg', 'AVAILABLE'),
(19, 'BH02', 'Thomas boy hat ', 'Male', 'Hat', 'Below 1 year', 'Thomas boy hat ', '50.00', 'rsz_images.jpg', 'AVAILABLE'),
(20, 'GD01 ', 'Pink Dresses ', 'Female', 'Dress', '7 to 9 years', 'Pink Dresses for Kids ', '60.00', 'rsz_11507798544238-naughty-ninos-girls-magenta-solid-fit-and-flare-dress-4091507798544135-1.jpg', 'AVAILABLE'),
(21, 'GD02 ', 'Hello Kitty Dress ', 'Female', 'Dress', '4 to 6 years', 'Hello Kitty Dress ', '40.00', 'rsz_hello-kitty-girls-dress-dresses-kids-girls-clothes-children-clothing-summer-2017-toddler-girl-clothing-sets-600x600.jpg', 'AVAILABLE'),
(23, 'GD04', 'Elegant Kids Dress', 'Female', 'Dress', 'Above 12 years', 'Elegant Kids Dress ', '80.00', 'rsz_1164772905g_400-w_g.jpg', 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `units` int(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `product_id`, `price`, `units`, `date`) VALUES
(6, 3, 7, '15.00', 2, '2018-12-17 19:07:18'),
(7, 3, 10, '25.00', 3, '2018-12-17 19:07:18'),
(8, 3, 12, '30.01', 1, '2018-12-17 19:07:18'),
(9, 7, 6, '15.00', 1, '2018-12-18 02:32:16'),
(10, 11, 7, '150.00', 300, '2018-12-19 03:15:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id_o` (`customer_id`),
  ADD KEY `fk_product_id_o` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id_t` (`customer_id`),
  ADD KEY `fk_product_id_t` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customer_id_o` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_product_id_o` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_customer_id_t` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_product_id_t` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
