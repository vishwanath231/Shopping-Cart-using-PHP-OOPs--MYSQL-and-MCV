-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 03:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `P_Code` int(255) NOT NULL,
  `P_Img` varchar(255) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_Price` int(255) NOT NULL,
  `P_Qty` int(255) NOT NULL,
  `Total_Price` int(255) NOT NULL,
  `Is_Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `P_Code` int(255) NOT NULL,
  `P_Img` varchar(255) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `P_Qty` int(255) NOT NULL,
  `P_Price` int(255) NOT NULL,
  `Is_Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `P_Code`, `P_Img`, `P_Name`, `P_Qty`, `P_Price`, `Is_Created`) VALUES
(1, 945, 'product-1.jpeg', 'queen panel bed', 1, 2000, '2021-07-20 03:10:59'),
(2, 671, 'product-2.jpeg', 'king panel bed', 1, 5000, '2021-07-20 03:29:52'),
(3, 952, 'product-3.jpeg', 'single panel bed', 1, 4000, '2021-07-20 03:30:55'),
(4, 671, 'product-4.jpeg', 'twin panel bed', 1, 3000, '2021-07-20 03:31:13'),
(5, 611, 'product-5.jpeg', 'fridge', 1, 25000, '2021-07-20 03:31:59'),
(6, 386, 'product-6.jpeg', 'dresser', 1, 9000, '2021-07-20 03:32:17'),
(7, 171, 'product-7.jpeg', 'couch', 1, 18000, '2021-07-20 03:32:47'),
(8, 344, 'product-8.jpeg', 'table', 1, 4000, '2021-07-20 03:33:09'),
(9, 249, 'product-9.jpeg', 'cutton panel bed', 1, 9000, '2021-07-20 03:35:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
