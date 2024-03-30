-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 03:31 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_catecory_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `features` varchar(522) DEFAULT NULL,
  `ad_image1` varchar(255) DEFAULT NULL,
  `ad_image_temp` varchar(1024) DEFAULT NULL,
  `ad_image2` varchar(255) DEFAULT NULL,
  `ad_image3` varchar(255) DEFAULT NULL,
  `date` timestamp(6) NULL DEFAULT NULL,
  `approved` int(1) DEFAULT 0,
  `published` tinyint(4) DEFAULT 0,
  `sub category.` varchar(255) DEFAULT NULL,
  `csrf_code` varchar(32) DEFAULT NULL,
  `slugt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `category_id`, `sub_catecory_id`, `user_id`, `price`, `language_id`, `description`, `features`, `ad_image1`, `ad_image_temp`, `ad_image2`, `ad_image3`, `date`, `approved`, `published`, `sub category.`, `csrf_code`, `slugt`) VALUES
(1, 'laptop', 7, NULL, 4, 67854, NULL, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 'uploads/ads/1711545934Rolls-Royce.jpg', '', NULL, NULL, '2024-03-27 11:24:50.000000', 0, 0, NULL, 'd6bf1a0631b3ae0a4f094f9209afed74', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `disabled`) VALUES
(1, 'IPands & Tamblets', 'ipands-tamblets', 0),
(2, 'cars', 'cars', 0),
(3, 'Real Estates', 'real-estates', 0),
(4, 'Smart Watches', 'smart-watches', 0),
(5, 'Holidays', 'holidays', 0),
(6, 'Cell Phones', 'cell-phones', 0),
(7, 'Computer Sience', 'computer-sience', 0),
(8, 'Decoration', 'decoration', 0),
(9, 'Motors', 'motors', 0),
(10, 'Shoes', 'shoes', 0),
(26, 'Trucks', 'trucks', 0),
(29, ' Smart wares', 'smart-wares', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `disabled`) VALUES
(1, 'Kenya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `delivery_address` varchar(2024) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `country` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `state` varchar(20) DEFAULT NULL,
  `tax` double DEFAULT 0,
  `shipping` double NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `session_id`, `delivery_address`, `total`, `country`, `username`, `email`, `phone`, `state`, `tax`, `shipping`, `date`) VALUES
(1, '1', 54844229, 'fat1spfg2gio5kfjs66uvjpphe', 'kabarak rafiki', 3200, 'Kenya', 'Glady', 'jackmutiso37@gmail.com', '254745378674', 'Nakuru', 0, 0, '2023-03-21 00:44:53'),
(2, '', 46361410, 'd4032dr7s9m2k2u0c64bppc452', 'kkk', 1, 'Kenya', 'Jack', 'jack@gmail.com', '0759996556', 'Nakuru', 0, 0, '2024-03-20 00:32:53'),
(3, '', 24075689, 'd4032dr7s9m2k2u0c64bppc452', 'jhbajsc', 1, 'Kenya', 'Jack', 'jack@gmail.com', '079865432', 'Nakuru', 0, 0, '2024-03-20 01:01:19'),
(4, '', 48286152, 'd4032dr7s9m2k2u0c64bppc452', 'Ngong 111', 1, 'Kenya', 'Jack', 'jack@gmail.com', '0793712942', 'Nakuru', 0, 0, '2024-03-20 01:03:08'),
(5, '', 47378383, 'd4032dr7s9m2k2u0c64bppc452', 'Ngong 111', 1008, 'Kenya', 'kaboomsanto', 'kaboom@gmail.com', '0793712942', 'Nakuru', 0, 0, '2024-03-20 02:17:35'),
(6, '', 13125326, 'd4032dr7s9m2k2u0c64bppc452', 'jhbajsc', 1008, 'Kenya', 'kaboomsanto', 'kaboom@gmail.com', '0793712942', 'Nakuru', 0, 0, '2024-03-20 02:19:50'),
(7, '4', 51450745, 'irldtnih2qf2131ltfishd61r9', 'SDCFGHJF', 67854, 'Kenya', 'Elvis', 'elvis@gmail.com', '0786754324', 'Nakuru', 0, 0, '2024-03-26 23:27:08'),
(8, '4', 25191174, 'irldtnih2qf2131ltfishd61r9', 'SDCFGHJF', 67854, 'Kenya', 'Elvis', 'elvis@gmail.com', '0786754324', 'Nakuru', 0, 0, '2024-03-26 23:28:49'),
(9, '4', 87369366, 'irldtnih2qf2131ltfishd61r9', 'SDCFGHJF', 67854, 'Kenya', 'Elvis', 'elvis@gmail.com', '0786754324', 'Nakuru', 0, 0, '2024-03-26 23:31:47'),
(10, '11', 15344161, 'irldtnih2qf2131ltfishd61r9', 'SDCFGHJF', 67854, 'Kenya', 'Bezoes', 'jackmutiso37@gmail.com', '0786754324', 'Nakuru', 0, 0, '2024-03-26 23:54:50'),
(11, '11', 88426206, 'irldtnih2qf2131ltfishd61r9', 'SDCFGHJF', 67854, 'Kenya', 'Bezoes', 'jackmutiso37@gmail.com', '0786754324', 'Nakuru', 0, 0, '2024-03-27 00:07:33'),
(12, '11', 28938267, 'irldtnih2qf2131ltfishd61r9', 'SDCFGHJF', 67854, 'Kenya', 'Bezoes', 'jackmutiso37@gmail.com', '0786754324', 'Nakuru', 0, 0, '2024-03-27 00:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(700) NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `description`, `amount`, `total`) VALUES
(1, 54844229, 1, 1, 'new                    ', 200, 200),
(2, 54844229, 2, 1, 'yes ths is new product\r\n                    ', 3000, 3000),
(3, 46361410, 6, 1, 'iphone 15', 1, 1),
(4, 24075689, 6, 1, 'iphone 15', 1, 1),
(5, 48286152, 6, 1, 'iphone 15', 1, 1),
(6, 47378383, 4, 1, 'lll', 1008, 1008),
(7, 13125326, 4, 1, 'lll', 1008, 1008),
(8, 51450745, 1, 1, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 67854, 67854),
(9, 25191174, 1, 1, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 67854, 67854),
(10, 87369366, 1, 1, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 67854, 67854),
(11, 15344161, 1, 1, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 67854, 67854),
(12, 88426206, 1, 1, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 67854, 67854),
(13, 28938267, 1, 1, 'Jacob, a passionate web developer dedicated to creating engaging and user-friendly websites. With a strong foundation in coding and design principles, I strive to deliver high-quality solutions that meet client needs.', 67854, 67854);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `TransactionDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PhoneNumber` varchar(15) NOT NULL,
  `MpesaReceiptNumber` varchar(30) NOT NULL,
  `Amount` double(10,2) NOT NULL,
  `MerchantRequestID` varchar(50) NOT NULL,
  `CheckoutRequestID` varchar(50) NOT NULL,
  `ResultDesc` varchar(50) NOT NULL,
  `ResultCode` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `TransactionDate`, `PhoneNumber`, `MpesaReceiptNumber`, `Amount`, `MerchantRequestID`, `CheckoutRequestID`, `ResultDesc`, `ResultCode`, `order_id`, `status`) VALUES
(1, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(2, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(3, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(4, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(5, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(6, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(7, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(8, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(9, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(10, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(11, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '78624574', NULL),
(12, '2023-03-19 07:33:52', '254745378674', 'RCJ46VH9K6', 1.00, '25719-103546334-1', 'ws_CO_19032023193331820745378674', 'The service request is processed successfully.', 0, '54844229', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `disabled` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission`, `disabled`) VALUES
(1, 2, 'add_categories', 1),
(2, 1, 'delete_roles', 0),
(3, 1, 'view_roles', 0),
(4, 2, 'delete_roles', 1),
(5, 2, 'edit_categories', 1),
(6, 1, 'edit_roles', 0),
(7, 2, 'edit_roles', 1),
(8, 2, 'view_roles', 1),
(9, 2, 'delete_categories', 1),
(10, 2, 'view_categories', 1),
(11, 2, 'add_roles', 1),
(12, 1, 'view_categories', 0),
(13, 1, 'edit_categories', 1),
(14, 1, 'delete_categories', 0),
(15, 1, 'add_roles', 0),
(16, 1, 'add_categories', 0),
(17, 1, 'view_dashbord', 0),
(18, 1, 'view_user', 0),
(19, 1, 'add_user', 0),
(20, 1, 'edit_user', 0),
(21, 1, 'view_order', 0),
(22, 1, 'view_ads', 0);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dissabled` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `name`, `dissabled`) VALUES
(1, '2000', 0),
(2, '400', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expire` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset`
--

INSERT INTO `reset` (`id`, `email`, `code`, `expire`) VALUES
(1, 'muasamusa123@gmail.com', '48582', 1708472585),
(2, 'frashasanto111@gmail.com', '93189', 1708474396),
(3, 'mutisojacob86@gmail.com', '53799', 1708514849),
(4, 'jackmutiso37@gmail.com', '97067', 1711548367);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(40) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `disabled`) VALUES
(1, 'user', 0),
(2, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `disabled`) VALUES
(1, 'Nakuru', 0),
(2, 'Nairobi', 0),
(3, 'Machakos', 0),
(4, 'Mombasa', 0),
(5, 'Meru', 0),
(6, 'Eldoret', 0),
(7, 'Thika', 0),
(8, 'Kitale', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp(6) NULL DEFAULT NULL,
  `about` varchar(225) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `image`, `date`, `about`, `lastname`, `country`, `address`, `phone`, `slug`, `facebook_link`, `twitter_link`, `instagram_link`) VALUES
(1, 'Jack', 'jack@gmail.com', 2, '12345', 'uploads/images/1675916119armchair2.png', '2022-10-03 05:01:58.000000', 'Try and fail , but remember one day everything and i mean everything will be alright ,take it ease', 'Guru', 'Kenya', 'w', '', NULL, '', '', ''),
(2, 'Dennis', 'dennis@gmail.com', 1, 'Dennis', NULL, '2022-10-03 05:02:14.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'John', 'john@gmail.com', 1, 'John', NULL, '2022-10-03 05:23:12.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Elvis', 'elvis@gmail.com', 1, '12345', NULL, '2023-01-25 12:10:23.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Linda', 'linda@gmail.com', 2, '1234J', NULL, '2023-01-29 15:47:06.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'lonpach', 'mahlihep@gmail.com', 1, 'Mahlonlon@7', NULL, '2023-01-31 11:12:58.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Evans', 'elvis1@gmail.com', 1, '1234Hjj', NULL, '2023-02-04 18:44:20.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Oriel', 'oriel@gmail.com', 1, '1234J', NULL, '2023-02-06 17:00:38.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'john', 'john@gmail.com', 1, 'John123', NULL, '2023-02-23 09:49:32.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'gld', 'kamaugladys@gmail.com', 1, '12354G', 'uploads/images/1677253877agri3.jpg', '2023-02-24 04:47:08.000000', 'marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing ', 'Kamau', 'Kenya', 'kabarak', '0712345678', NULL, '', '', ''),
(11, 'Bezoes', 'jackmutiso37@gmail.com', 1, '12345', NULL, '2024-02-03 20:11:06.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Frasha Santo', 'frashasanto111@gmail.com', 1, 'Frasha', NULL, '2024-02-13 08:39:05.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'kaboomsanto', 'kaboomsanto@gmail.com', 1, 'Kaboom', NULL, '2024-03-18 19:12:35.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'kaboomsanto', 'kaboom@gmail.com', 1, 'Kaboom', NULL, '2024-03-20 14:08:16.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `sub_catecory_id` (`sub_catecory_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `price_id` (`price`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `date` (`date`),
  ADD KEY `approved` (`approved`),
  ADD KEY `published` (`published`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permission`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dissabled` (`dissabled`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `date` (`date`),
  ADD KEY `phone` (`phone`),
  ADD KEY `address` (`address`),
  ADD KEY `country` (`country`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `about` (`about`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
