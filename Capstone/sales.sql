-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 10:45 AM
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
(3, 'Food');

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
(16, 'Lyren Mae Montano', 'San Jose, Antique', '09090909090', '', '', '', '');

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
(64, 'TPC-2614', 'Food', '2023-01-10', 'Coke', '50', '75', '25', 'University of Antique', 96, 100),
(66, 'TPC-7824', 'Food', '2023-01-10', 'Sprite', '50', '75', '25', 'University of Antique', 194, 100);

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
(34, 'Lyren Mae', '2023-01-10', 'University of Antique', '');

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
(16, 'RBH-0398', 1, '25', 'sds'),
(18, 'RBH-0398', 19, '475', 'fyuf'),
(19, 'RBH-0398', 10, '250', 'fyuf'),
(22, 'RBH-ba0a', 10, '250', 'Harry'),
(23, 'RBH-0398', 12, '300', 'adad'),
(24, 'RBH-0398', 1, '25', 'dada'),
(27, 'RBH-0398', 1, '25', 'hkj'),
(28, 'RBH-0398', 1, '15', 'aada'),
(29, 'RBH-0398', 100, '1500', 'Harry Bing'),
(30, 'RBH-ba0a', 100, '1500', 'Lyren Mae'),
(32, 'Lyren Mae', 100, '5000', 'TPC-7824');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
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
(156, 'RS-2303622', 'harry', '01/08/23', 'cash', '2500', '1000', '3000', 'Harry Bing Raba '),
(157, 'RS-2028253', 'harry', '01/10/23', 'cash', '75', '25', '100', 'Harry Bing Raba ');

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
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(315, 'RS-02522522', '58', '9', '225', '90', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(316, 'RS-0009290', '58', '9', '225', '90', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(317, 'RS-2229323', '58', '98', '2450', '980', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(318, 'RS-2333303', '58', '94', '2350', '940', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(320, 'RS-3032533', '58', '1', '25', '10', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(321, 'RS-3032533', '58', '2', '50', '20', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(322, 'RS-3032533', '58', '1', '25', '10', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(323, 'RS-2230303', '58', '1', '25', '10', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(324, 'RS-2230303', '58', '1', '25', '10', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(325, 'RS-2230303', '58', '1', '25', '10', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(326, 'RS-2230303', '58', '80', '2000', '800', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(331, 'RS-36233330', '58', '13', '325', '130', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(332, 'RS-43333', '58', '1', '25', '10', 'RBH-d714', 'Non-Food', 'Coke   ', '25', '', '12/28/22'),
(336, 'RS-39209032', '60', '1', '25', '10', 'RBH-6484', 'Non-Food', 'Coke', '25', '', '12/28/22'),
(339, 'RS-903395', '60', '1', '25', '19', 'RBH-6484', 'Non-Food', 'Coke', '25', '', '12/28/22'),
(353, 'RS-62390503', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '12/29/22'),
(354, 'RS-62390503', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '12/29/22'),
(355, 'RS-0300434', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '12/30/22'),
(358, 'RS-7322309', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/05/23'),
(359, 'RS-3204333', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/05/23'),
(360, 'RS-3204333', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/05/23'),
(361, 'RS-3204333', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/05/23'),
(362, 'RS-06992000', '61', '15', '375', '150', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/05/23'),
(363, 'RS-2922', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/05/23'),
(364, 'RS-5230320', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/05/23'),
(365, 'RS-320234', '59', '20', '500', '200', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/06/23'),
(366, 'RS-353732', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/06/23'),
(367, 'RS-828703', '61', '90', '2250', '900', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/06/23'),
(368, 'RS-20800533', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/06/23'),
(369, 'RS-30726', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/06/23'),
(370, 'RS-32086', '59', '1', '25', '10', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/06/23'),
(371, 'RS-2303622', '59', '100', '2500', '1000', 'RBH-0398', 'Food', 'Sprite', '25', '', '01/08/23'),
(372, 'RS-60230302', '61', '1', '25', '10', 'RBH-ba0a', 'Non-Food', 'Coke', '25', '', '01/10/23'),
(373, 'RS-2028253', '66', '1', '75', '25', 'TPC-7824', 'Food', 'Sprite', '75', '', '01/10/23'),
(374, 'RS-203233', '64', '1', '75', '25', 'TPC-2614', 'Food', 'Coke', '75', '', '01/10/23'),
(375, 'RS-203233', '66', '2', '150', '50', 'TPC-7824', 'Food', 'Sprite', '75', '', '01/10/23'),
(376, 'RS-203233', '64', '1', '75', '25', 'TPC-2614', 'Food', 'Coke', '75', '', '01/10/23'),
(377, 'RS-236322', '64', '1', '75', '25', 'TPC-2614', 'Food', 'Coke', '75', '', '01/10/23'),
(378, 'RS-3333332', '66', '1', '75', '25', 'TPC-7824', 'Food', 'Sprite', '75', '', '01/10/23'),
(386, 'RS-20262023', '66', '1', '75', '25', 'TPC-7824', 'Food', 'Sprite', '75', '', '01/10/23'),
(387, 'RS-222022', '66', '1', '75', '25', 'TPC-7824', 'Food', 'Sprite', '75', '', '01/10/23'),
(388, 'RS-08222340', '64', '1', '75', '25', 'TPC-2614', 'Food', 'Coke', '75', '', '01/10/23');

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
(6, 'University of Antique', 'San Jose', '09092261099', 'Lyren Mae Montano', '');

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
(1, 'test2', 'test2', 'bing', 'Cashier'),
(2, 'test1', 'test1', 'yrrah', 'Inventory Staff'),
(3, 'abab', 'abab1', 'harry', 'Admin');

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
  MODIFY `id` int(249) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
