-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 01:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(249) NOT NULL,
  `name` varchar(249) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Non-Food'),
(14, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `prod_name`, `expected_date`, `note`) VALUES
(15, 'Harry Bing Raba ', 'Butuan, Anini-y,Antique', '09092261099', '', '', '', ''),
(16, 'Lyren Mae Montano', 'San Jose, Antique', '09090909090', '', '', '', ''),
(21, 'Lorna Raba ', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `date_arrival` varchar(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `date_arrival`, `product_name`, `o_price`, `price`, `profit`, `supplier`, `qty`, `qty_sold`) VALUES
(70, 'TPC-09b6', 'Food', '2023-01-23', '200g COFFEE', '110', '140', '30', 'KINGS', 11, 26),
(71, 'TPC-4e4b', 'Food', '2023-01-23', '30g TEA BAG ', '25', '30', '5', 'ALE', 0, 10),
(72, 'TPC-75a3', 'Food', '2023-01-23', 'BANDI', '30', '35', '5', 'ALE', 0, 15),
(73, 'TPC-134b', 'Food', '2023-01-23', 'TARO CHIPS (s)', '40', '50', '10', 'KINGS', 0, 20),
(74, 'TPC-d872', 'Food', '2023-01-23', 'TARO CHIPS (L)', '45', '60', '15', 'KINGS', 0, 20),
(75, 'TPC-0a58', 'Food', '2023-01-23', 'AROMA OIL', '120', '140', '20', 'ARIANA', 0, 10),
(76, 'TPC-2b91', 'Food', '2023-01-23', 'PEANUT BITE 4\'S ', '80', '100', '20', 'ENRIQUETA\'S', 20, 20),
(77, 'TPC-9793', 'Food', '2023-01-23', '120g TURMERIC ', '60', '65', '5', 'ENRIQUETA\'S', 0, 20),
(78, 'TPC-0694', 'Food', '2023-01-23', 'GOURMENT TUYO', '150', '160', '10', 'COSINA M', 0, 10),
(79, 'TPC-2597', 'Food', '2023-01-23', 'GARLIC BREAD (L) ', '68', '75', '7', '3 ROSAS', 4, 5),
(80, 'TPC-9b10', 'Food', '2023-01-23', 'GARLIC BREAD (s) ', '38', '40', '2', '3 ROSAS', 37, 20),
(81, 'TPC-16e5', 'Non-Food', '2023-01-24', 'Cellphone', '1500', '2000', '500', '3 ROSAS', 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date`, `suplier`, `remarks`) VALUES
(59, 'Ryan Paderes ', '2023-01-24', '3 ROSAS', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `invoice`, `qty`, `cost`, `name`) VALUES
(68, 'abab', 1, '50', 'TPC-2614'),
(69, 'abab', 12, '600', 'TPC-2614'),
(70, 'Admin', 32, '-704', 'TPC-25de'),
(71, 'Admin', 32, '22752', 'TPC-2614'),
(72, 'Admin', 32, '22752', 'TPC-2614'),
(73, 'Ryan Paderes', 5, '7500', 'TPC-16e5');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `amount_tendered` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `amount_tendered`, `name`) VALUES
(204, 'RS-937007', 'hello', '2023-03-16', 'cash', '280', '60', '280', 'Lorna Raba '),
(205, 'RS-5303362', 'hello', '2023-03-16', 'cash', '420', '90', '420', 'Lyren Mae Montano'),
(206, 'RS-8223230', 'hello', '2023-03-16', 'cash', '280', '60', '280', 'Harry Bing Raba ');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(564, 'RS-2300832', '', '2', '280', '60', 'TPC-09b6', 'Food', '200g COFFEE', '140', '', '2023-03-16'),
(566, 'RS-5303362', '', '3', '420', '90', 'TPC-09b6', 'Food', '200g COFFEE', '140', '', '2023-03-16'),
(569, 'RS-8223230', '', '2', '280', '60', 'TPC-09b6', 'Food', '200g COFFEE', '140', '', '2023-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(7, 'ALE COFEE', 'Sibalom', '09358937998', '.', '.'),
(8, 'KINGS', '.', '09', '.', '.'),
(9, 'ARIANA', '.', '09', '.', '.\r\n\r\n\r\n'),
(10, 'ENRIQUETA\'S', 'Patnongon', '0915396982', 'Lene IWag', '.\r\n'),
(11, 'COSINA M', '.', '09', '.', ''),
(12, '3 ROSAS ', '.', '09', '.', ''),
(13, 'TWINS', '.', '09', '.', '.'),
(14, 'JOURNEY\'S', 'San Remigio', '09977617896', 'Delia', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(13, 'hello', 'e04142db93a360cb012b9af3e6704d03', 'hello', 'Admin'),
(14, 'hi', '4cf77569d70f4a7519b335de126c3a6d', 'Hi', 'Cashier'),
(15, 'hey', '8a8fd8a82036e69a18ff2a0679c85a4b', 'hey', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(249) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
