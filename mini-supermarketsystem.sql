-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 02:17 PM
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
-- Database: `mini-supermarketsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(255) NOT NULL,
  `Customer_Name` varchar(20) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL,
  `Location` varchar(40) NOT NULL,
  `Discount_ID` int(70) NOT NULL,
  `s_ID` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discountsandofferce`
--

CREATE TABLE `discountsandofferce` (
  `Discount_ID` int(255) NOT NULL,
  `discount_name` varchar(20) NOT NULL,
  `price` int(100) NOT NULL,
  `s_ID` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discountsandofferce`
--

INSERT INTO `discountsandofferce` (`Discount_ID`, `discount_name`, `price`, `s_ID`, `user_name`) VALUES
(15, 'D1', 20, 0, ''),
(16, 'D2', 200, 0, ''),
(17, 'D3', 100, 0, ''),
(18, 'D4', 150, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(255) NOT NULL,
  `date` date NOT NULL,
  `total_price` int(100) NOT NULL,
  `customer_ID` int(255) NOT NULL,
  `s_ID` int(255) NOT NULL,
  `discounts_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `date`, `total_price`, `customer_ID`, `s_ID`, `discounts_ID`) VALUES
(28, '2025-05-14', 1500, 0, 0, 0),
(29, '2025-05-14', 600, 0, 0, 0),
(30, '2025-05-14', 0, 0, 0, 0),
(31, '2025-05-14', 3000, 0, 0, 0),
(32, '2025-05-14', 600, 0, 0, 0),
(33, '2025-05-14', 3000, 0, 0, 0),
(34, '2025-05-14', 2100, 0, 0, 0),
(35, '2025-05-15', 1500, 0, 0, 0),
(36, '2025-05-15', 0, 0, 0, 0),
(37, '2025-05-29', 1500, 0, 0, 0),
(38, '2025-05-30', 2100, 0, 0, 0),
(39, '2025-05-30', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(255) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`id`, `bar_code`, `quantity`, `order_id`, `price`) VALUES
(50, '4792210100194', 5, 28, 1500),
(57, '4792210100194', 2, 29, 600),
(59, '4792210100194', 5, 31, 1500),
(60, '4792210100194', 5, 31, 1500),
(64, '4792210100194', 2, 32, 600),
(65, '4792210100194', 5, 33, 1500),
(66, '4792210100194', 5, 33, 1500),
(67, '4792210100194', 5, 34, 1500),
(68, '4792210100194', 2, 34, 600),
(70, '4792210100194', 5, 35, 1500),
(72, '4792210100194', 5, 37, 1500),
(74, '4792210100194', 5, 38, 1500),
(75, '4792210100194', 2, 38, 600);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_ID` int(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` int(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` int(20) NOT NULL,
  `taken_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `su_ID` int(255) NOT NULL,
  `customerID` int(255) NOT NULL,
  `pre_order_ID` int(255) NOT NULL,
  `order_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_ID`, `barcode`, `name`, `brand`, `price`, `description`, `category`, `quantity`, `taken_date`, `expire_date`, `su_ID`, `customerID`, `pre_order_ID`, `order_ID`) VALUES
(28, '4792210100194', 'apple', 'zomato', 300, 'hello', 'fruits', 1673, '2025-04-20', '2025-05-01', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_ID` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `sallery` int(100) NOT NULL,
  `number1` int(30) NOT NULL,
  `number2` int(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `registerDateTime` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpassword` varchar(20) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `birthday` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_ID`, `name`, `gender`, `sallery`, `number1`, `number2`, `address`, `registerDateTime`, `password`, `confirmpassword`, `userName`, `user_name`, `birthday`) VALUES
(24, 'sasika prabhashwara', 'Male', 1000, 1234, 12345678, 'homagama', '2025-05-29 23:15:49', '200', '200', 'sasika', '', '2025-05-05'),
(25, 'sasika prabhashwara', 'Male', 1000, 98765432, 1234, 'godagama', '2025-05-30 16:11:14', '200', '200', 'kamal', '', '2025-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `su_ID` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `TelephoneNumber1` varchar(20) NOT NULL,
  `TelephoneNumber2` varchar(20) NOT NULL,
  `e-mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `discountsandofferce`
--
ALTER TABLE `discountsandofferce`
  ADD PRIMARY KEY (`Discount_ID`),
  ADD KEY `F13` (`s_ID`),
  ADD KEY `F15` (`user_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `F8` (`customer_ID`),
  ADD KEY `F9` (`s_ID`),
  ADD KEY `F10` (`discounts_ID`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `F5` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_ID`),
  ADD KEY `F3` (`pre_order_ID`),
  ADD KEY `F4` (`order_ID`),
  ADD KEY `product_ibfk_1` (`su_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_ID`),
  ADD KEY `F12` (`user_name`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`su_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `discountsandofferce`
--
ALTER TABLE `discountsandofferce`
  MODIFY `Discount_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `su_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD CONSTRAINT `c` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
