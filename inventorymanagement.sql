-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 07:39 PM
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
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagory_id` int(20) NOT NULL,
  `catagory_name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(1, 'operational'),
(2, 'on-going-development');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `serverhid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_sname`, `details`, `implementing_office`, `dev_mode`, `developer`, `frontend`, `backend`, `status`, `remarks`, `serverhid`) VALUES
(27, 'Computer Science', 'CS', 'BS Computer Science', 'BLDG 5201', 'to follow', 'Jun Reyes', 'none', 'none', 'In-progress', 'OJT ongoing, March 9, 2023', 'BLDG 5201'),
(28, 'Consolidated Annual Audit Report System', 'CCAARS', 'Online web-based reporting', 'Management Division', '', 'Jazmine Joaquin', 'HTML, CSS', 'MS SQL', 'In-progress', 'slow generation of reports due to large vool', '123.abc.432'),
(29, 'St. Clare College', 'SCC', 'School of life skills', 'Zabarte Rd', 'college', 'Nicole', 'none', 'none', 'In-progress', 'Camarin Caloocan', '123.abc'),
(31, 'Thesis 2 Word Replacement for English Profanity Words', 'CS304', 'Thesis project for automatic replacing of english profanity words in a public chat.', 'BLDG 5', 'BLDG 5', 'Jazmine Joaquin', 'React', 'Python', 'On-going Development', 'Prepare for completing chapter 4 and collect 100 respondents, 50 each technical and non technical respondents. Prepare survey using ISO 2501 as the standard form.', 'BLDG 5'),
(44, 'Commission on Audit', 'COA', 'The Commission on Audit (COA; Filipino: Komisyon ng Pagsusuri) is an independent constitutional commission established by the Constitution of the Philippines. It has the primary function to examine, audit and settle all accounts and expenditures of the fu', 'Management Division', 'Management Division', 'Juan', 'PHP', 'Java', 'Operational', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Management Division'),
(50, 'Consolidated Annual Audit Report System', 'SCC', 'Thesis project for automatic replacing of english profanity words in a public chat.', 'Management Division', 'In-house', 'Jazmine Joaquin', 'PHP,Python,Java,.Net,MS SQL,Ruby', 'MySQL,Firebase,Mariadb,JavaScript,C#,Ruby', 'On-going Development', 'asdasdasdas', ''),
(53, 'wtf', 'wtf', 'wtf', 'wtf', 'In-house', 'Jazmine', 'PHP,Python,Java', 'MySQL,Firebase,Mariadb', 'Operational', 'asdfasd', 'asdfa'),
(54, 'asdfasd', 'asdfasd', 'asdfas', 'asdfsad', 'Outsource', 'John Christian', 'PHP,Python', 'MySQL,Firebase', 'Operational', 'asdfasdf', 'asdf'),
(55, 'bitch indahouse', 'bitchindahouse', 'asdfasdfsdfa', 'asdfasdf', 'In-house', 'Jazmine', 'PHP,Python', 'MySQL,Firebase', '', 'asdfa', 'asdfa');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `Number_received` int(10) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
('qejcmartin', 'Edlar John', 'Martin', 910212121, 'qejcmartin@tip.edu.ph', '7fb41c3abb18261ce302b70ffca09c24'),
('qjtjoaquin', 'Jazmine', 'Joaquin', 2147483647, 'iamjajajoaquin@gmail.com', 'cff4d7621fd246d086c4e0509d36f210');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `Stock_count` int(10) NOT NULL,
  `stock_min_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagory_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
