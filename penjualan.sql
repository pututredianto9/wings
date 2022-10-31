-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User`, `Password`) VALUES
('putut', 'putut');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Code` varchar(18) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Price` int(6) NOT NULL,
  `Currency` varchar(5) NOT NULL,
  `Discount` int(6) NOT NULL,
  `Dimension` varchar(50) NOT NULL,
  `Unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Code`, `Product_Name`, `Price`, `Currency`, `Discount`, `Dimension`, `Unit`) VALUES
('SKUSKILNP', 'So Klin Pewangi', 15000, 'IDR', 10, '13 cm x 10 cm', 'PCS'),
('SKUSKILNW', 'So Klin Pewangi', 20000, 'IDR', 20, '13 cm x 10 cm', 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `Document_Code` varchar(3) NOT NULL,
  `Document_Number` varchar(10) NOT NULL,
  `Product_Code` varchar(18) NOT NULL,
  `Price` int(6) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Unit` varchar(5) NOT NULL,
  `Sub_Total` int(10) NOT NULL,
  `Currency` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`Document_Code`, `Document_Number`, `Product_Code`, `Price`, `Quantity`, `Unit`, `Sub_Total`, `Currency`) VALUES
('TRX', '5', 'So Klin Pewangi', 13500, 2, 'PCS', 27000, 'IDR'),
('TRX', '5', 'So Klin Pewangi', 16000, 1, 'PCS', 16000, 'IDR'),
('TRX', '6', 'So Klin Pewangi', 13500, 7, 'PCS', 94500, 'IDR'),
('TRX', '6', 'So Klin Pewangi', 16000, 1, 'PCS', 16000, 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_header`
--

CREATE TABLE `transaction_header` (
  `Document_Code` varchar(3) NOT NULL,
  `Document_Number` varchar(10) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Total` int(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_header`
--

INSERT INTO `transaction_header` (`Document_Code`, `Document_Number`, `User`, `Total`, `Date`) VALUES
('TRX', '5', 'Putut', 67000, '2022-10-31'),
('TRX', '6', 'Putut', 110500, '2022-10-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Code`);

--
-- Indexes for table `transaction_header`
--
ALTER TABLE `transaction_header`
  ADD PRIMARY KEY (`Document_Number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
