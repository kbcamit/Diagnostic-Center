-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 01:40 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diagnostic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(155) NOT NULL,
  `admin_email` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_email`, `password`, `role`, `status`) VALUES
(4, 'Kalyan Brata Chakraborty', 'kalyan@mail.com', '$2y$10$1k465HYVNZ9AREZpKoL1He/By5C15sQ4IobxsmEtVeOzJofB7.5Qi', 'admin', 1),
(10, 'Rahat Hossain', 'rahat@gmail.com', '$2y$10$kiUuVihz78Lni.5i2bp0meduVsWU.j14QYRJlLPehu5EYDBmLeoy.', 'admin', 1),
(21, 'Admin', 'admin@example.com', '$2y$10$KyedG6/iIUnFH8kxx48/leKNm3EBl9d8JoC5sbMWZoVeIT9fDa.um', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `status`) VALUES
(29, 'X-ray', 1),
(30, 'Blood', 1),
(31, 'PSA Test', 1),
(32, 'Laptop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clear_payment`
--

CREATE TABLE `tbl_clear_payment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `due` double(18,3) NOT NULL,
  `paid` double(18,3) NOT NULL,
  `invoice_no` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_clear_payment`
--

INSERT INTO `tbl_clear_payment` (`id`, `patient_id`, `due`, `paid`, `invoice_no`) VALUES
(6, 15, 0.000, 1200.000, '5555');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `id` int(11) NOT NULL,
  `image` varchar(155) NOT NULL,
  `doctor_name` varchar(155) NOT NULL,
  `father_name` varchar(155) NOT NULL,
  `mother_name` varchar(155) NOT NULL,
  `email` varchar(100) NOT NULL,
  `doc_dob` date NOT NULL,
  `mobile_no` varchar(16) NOT NULL,
  `contact_address` text NOT NULL,
  `designation` text NOT NULL,
  `doc_join_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id`, `image`, `doctor_name`, `father_name`, `mother_name`, `email`, `doc_dob`, `mobile_no`, `contact_address`, `designation`, `doc_join_date`, `status`) VALUES
(13, 'fecddabbbc.png', 'Kalyan Chakraborty', 'Kajal Chakraborty', 'Sobita Chakraborty', 'kalyan@yahoo.com', '1995-01-09', '01712440471', 'Sylhet, Bangladesh', 'MBBS', '2018-03-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(11) NOT NULL,
  `expense_name` varchar(155) NOT NULL,
  `expense_desc` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`id`, `expense_name`, `expense_desc`, `status`) VALUES
(10, 'Food', 'For food\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_invoice`
--

CREATE TABLE `tbl_expense_invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `expense_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` double(10,3) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense_invoice`
--

INSERT INTO `tbl_expense_invoice` (`id`, `invoice_no`, `date`, `expense_id`, `description`, `amount`, `admin_id`) VALUES
(7, 2211, '2018-03-05', 10, 'Biriyani', 200.000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_info`
--

CREATE TABLE `tbl_patient_info` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(155) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `mobile_no` varchar(16) NOT NULL,
  `delivery_date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `invoice_no` varchar(155) NOT NULL,
  `invoice_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient_info`
--

INSERT INTO `tbl_patient_info` (`id`, `patient_name`, `age`, `sex`, `mobile_no`, `delivery_date`, `time`, `doctor_id`, `description`, `invoice_no`, `invoice_type`) VALUES
(15, 'Mrs. X', 23, 'male', '01911923456', '2018-03-05', '1:30am', 13, 'sssssssssss', '5555', 'income');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_info`
--

CREATE TABLE `tbl_payment_info` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `sub_test_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `invoice_no` varchar(155) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment_info`
--

INSERT INTO `tbl_payment_info` (`id`, `patient_id`, `sub_test_id`, `date`, `qty`, `total`, `invoice_no`, `admin_id`) VALUES
(13, 15, 14, '2018-03-05', 1, '1200.000', '5555', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(155) NOT NULL,
  `phone_no` varchar(16) NOT NULL,
  `logo_image` varchar(255) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `choose_currency` varchar(20) NOT NULL,
  `initial_balance` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `address`, `email`, `phone_no`, `logo_image`, `currency`, `choose_currency`, `initial_balance`) VALUES
(1, 'Synchronise IT', 'GEC, chittagong', 'sychronise@gmail.com', '01819081185', 'b358e809ec.png', '$', 'before', '50000.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_test` varchar(155) NOT NULL,
  `lab_id` varchar(155) NOT NULL,
  `sub_test_price` decimal(10,3) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`id`, `category_id`, `sub_test`, `lab_id`, `sub_test_price`, `status`) VALUES
(14, 29, 'Mammography', '1122', '1200.000', 1),
(15, 30, 'Complete Blood Count', '114', '500.000', 1),
(16, 31, 'Colonoscopy', '221', '600.000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clear_payment`
--
ALTER TABLE `tbl_clear_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expense_invoice`
--
ALTER TABLE `tbl_expense_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_id` (`expense_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `sub_test_id` (`sub_test_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_id_2` (`admin_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_clear_payment`
--
ALTER TABLE `tbl_clear_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_expense_invoice`
--
ALTER TABLE `tbl_expense_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_expense_invoice`
--
ALTER TABLE `tbl_expense_invoice`
  ADD CONSTRAINT `tbl_expense_invoice_ibfk_1` FOREIGN KEY (`expense_id`) REFERENCES `tbl_expense` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_expense_invoice_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  ADD CONSTRAINT `tbl_patient_info_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `tbl_doctor` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment_info`
--
ALTER TABLE `tbl_payment_info`
  ADD CONSTRAINT `tbl_payment_info_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient_info` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_payment_info_ibfk_2` FOREIGN KEY (`sub_test_id`) REFERENCES `tbl_sub_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_payment_info_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD CONSTRAINT `tbl_sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
