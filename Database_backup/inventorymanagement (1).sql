-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 02:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `backend`
--

CREATE TABLE `backend` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `backend`
--

INSERT INTO `backend` (`id`, `name`) VALUES
(1, 'Node.js'),
(2, 'Ruby '),
(3, 'Django'),
(4, 'MS SQL'),
(5, '.NET '),
(12, 'Jazmine');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'In-House'),
(2, 'Outsourced');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `column1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id`, `name`, `column1`) VALUES
(1, 'EJ', ''),
(2, 'Jazmie', ''),
(3, 'Angel', ''),
(4, 'Domdom', '');

-- --------------------------------------------------------

--
-- Table structure for table `devmode`
--

CREATE TABLE `devmode` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devmode`
--

INSERT INTO `devmode` (`id`, `name`) VALUES
(2, 'In-House'),
(3, 'Outsourced');

-- --------------------------------------------------------

--
-- Table structure for table `frontend`
--

CREATE TABLE `frontend` (
  `id` int(244) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frontend`
--

INSERT INTO `frontend` (`id`, `name`) VALUES
(3, 'Php'),
(4, 'Python'),
(5, 'HTML'),
(6, 'JQuery'),
(7, 'React'),
(8, 'JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(1, 'Operational'),
(2, 'On-Going-Development'),
(3, 'Closed'),
(6, 'ej');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_sname` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `implementing_office` varchar(255) NOT NULL,
  `dev_mode` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `frontend` varchar(255) NOT NULL,
  `backend` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `serverhid` varchar(255) NOT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_sname`, `details`, `implementing_office`, `dev_mode`, `developer`, `frontend`, `backend`, `status`, `remarks`, `serverhid`, `IsDeleted`) VALUES
(85, 'malapit na ba talaga please', 'bitchindahouse', 'dddddddddd', '', '1', 'JAZMINE', 'Python,HTML,React', 'Node.js,Django', 'Jazmine', 'adsfdsa', 'adsfa', 1),
(86, 'close to final testing', 'asdfas', 'fasdfas', 'dfasdfas', '1', 'EJ', 'Python,HTML,JQuery', 'Node.js,Django,MS SQL', 'On-Going-Development', 'adsfasdf', 'asdfa', 1),
(87, 'Department of Environment and Natural Resources', 'DENR', 'asdfasdfasdasdasdfasdf', 'fdsafasdfas', '2', 'STEPH', 'HTML,JQuery,React', 'Ruby ', 'Operational', 'dsfgsadf', 'asdfasdfa', 1),
(88, 'deped', 'sdfgsdfgdsf', 'dfsgsdf', 'sdfgsdfgsdf', '1', '', 'Php,Python,HTML', 'Ruby ,Django,Jazmine', 'Operational', 'sdfgsdfg', 'sdfgsd', 1),
(89, 'basbsh', 'asdfsd', 'asdfsadf', 'asdfsdafsda', '1', '', 'Python,HTML,React', 'Node.js,Django', 'On-Going-Development', 'asdfsda', 'asdfdsafsda', 1),
(90, 'nitch', 'asdfasdf', 'asdfasdfads', 'asdfdasfa', '1', 'EJ', 'Python,HTML', 'Ruby ,Django,.NET ', 'On-Going-Development', 'asdfasd', 'fasdfas', 1),
(92, 'NLEX', 'NLEX', 'sadsadsa', 'sadsadsa', '1', 'EJ', 'Python,JQuery', 'Ruby ', 'Operational', 'asdsa', 'sadsa', 1),
(95, 'nnitro 5', 'nnitro 5', 'nnitro 5', 'asd', '1', 'EJ', 'Php,Python,HTML', 'Django', 'On-Going-Development', 'sadasd', 'asdas', 1),
(96, 'VVVVVVVVVVVVVVVVV', 'VVVVVVVVVVVVVV', 'VVVVVVVVVVVVVV', 'VVVVVVVVVVVVVV', '1', 'EJ', 'Php,HTML', 'Node.js,Django', 'Operational', 'SADASD', 'SADASDAS', 1),
(97, 'basbsh', 'SDFSDFSD', 'SDFSDFSD', 'FSDFSDFDSD', '1', 'EJ', 'Python,JQuery', 'Django', 'On-Going-Development', 'SDFSDF', 'SDFDS', 1),
(98, 'cccccccccccccccccc', 'cccccccccccccccccc', 'cccccccccccccccccc', 'cccccccccccccccccc', '1', 'EJ', 'Php', 'Ruby ', 'On-Going-Development', 'asdsa', 'asdas', 1),
(99, 'nnnnnnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnn', 'nnnnnnnnnnnnnnnnnnnnnnnn', '2', 'STEPH', 'Php,HTML', 'Ruby ,MS SQL', 'On-Going-Development', 'asdasdasasdas', 'asdasdasasdas', 1),
(100, 'hayysss', 'hayysss', 'hayysss', 'hayysss', '2', 'JOSEPH', 'Python,HTML', 'Ruby ,Django', 'Operational', 'asdasd', 'sadas', 1),
(101, 'martin', 'asdfasdfsdfsadfsd', 'asdfasdfsdfsadfsd', 'asdfasdfas', '', '', 'Python,HTML', 'Django,MS SQL', 'On-Going-Development', 'sadsadas', 'asdsa', 1),
(102, 'mark', 'asdfsadfasd', 'fasdfsad', 'fasdfad', '', '', 'Python,JQuery', 'Ruby ,Django,.NET ', 'Closed', 'asdfasdf', 'asdfas', 1),
(103, 'bragads', 'adwfasdf', 'asdfasd', 'afewafasdvasd', 'In-House', 'JAZMINE', 'Python,JQuery', 'Ruby ', 'Operational', 'asdfasd', 'fasdfas', 1),
(104, 'COA Consolidated Annual Audit Report', 'CCAARS', 'Online web-based reporting system for submissions of audit reports', 'Management Division', 'In-House', 'EJ', 'Php,HTML', 'Node.js,Django', 'Operational', '', '112312321', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password_1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `first_name`, `last_name`, `mobile`, `email`, `password_1`) VALUES
('admin', 'Edlar John', 'Martin', 2147483647, 'edlarjohnmartin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
('qejcmartin', 'Edlar John', 'Martin', 910212121, 'qejcmartin@tip.edu.ph', '7fb41c3abb18261ce302b70ffca09c24'),
('qjtjoaquin', 'Jazmine', 'Joaquin', 2147483647, 'iamjajajoaquin@gmail.com', 'cff4d7621fd246d086c4e0509d36f210');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(1, 'EJ', 1),
(2, 'JAZMINE', 1),
(3, 'JOSEPH', 2),
(4, 'STEPH', 2),
(12, 'echo', 2),
(13, 'echo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backend`
--
ALTER TABLE `backend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devmode`
--
ALTER TABLE `devmode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend`
--
ALTER TABLE `frontend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backend`
--
ALTER TABLE `backend`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `devmode`
--
ALTER TABLE `devmode`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frontend`
--
ALTER TABLE `frontend`
  MODIFY `id` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
