-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 08:10 AM
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
-- Database: `muthomi-firm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('superAdmin','moderator','editor') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_id`, `name`, `email`, `role`, `status`, `created_at`, `updated_at`, `password`) VALUES
(2, 'admin_675ea14408a65', 'Livingstone Apeli', 'LIVINGSTONEAPELI@GMAIL.COM', 'moderator', 'active', '2024-12-15 09:28:36', '2024-12-15 09:50:26', ''),
(3, 'admin_675ebd8e2dab6', 'Tonny Apeli', 'tonnyapeli@gmail.com', 'superAdmin', 'active', '2024-12-15 11:29:18', '2024-12-15 11:29:18', '$2y$10$xSiDWn2oDjndjntVaO8/UOc3syHYmAdevuhULKq6xGTR02Xscu35q'),
(4, 'admin_675fa1e727098', 'admin', 'admin@gmail.com', 'superAdmin', 'active', '2024-12-16 03:43:35', '2024-12-16 03:43:35', '$2y$10$pw8vJkButJwWFALcokNDr.ToHHVWjHdrShwQX1xaPGHqVHXEaE5Eq');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` enum('pending','confirmed','completed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments_ly`
--

CREATE TABLE `appointments_ly` (
  `appointment_id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `case_type` varchar(255) DEFAULT NULL,
  `appointment_datetime` datetime DEFAULT NULL,
  `status` enum('Confirmed','Pending','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_cases`
--

CREATE TABLE `assigned_cases` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_cases`
--

INSERT INTO `assigned_cases` (`id`, `case_id`, `client_id`, `lawyer_id`, `assigned_at`) VALUES
(1, 2, 1, 1, '2024-12-16 04:42:22'),
(2, 4, 1, 2, '2024-12-16 06:28:04'),
(3, 6, 1, 2, '2024-12-16 06:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `case_title` varchar(255) NOT NULL,
  `case_details` text NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Under Review','Approved','Declined') NOT NULL DEFAULT 'Under Review'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_title`, `case_details`, `specialization_id`, `contact_info`, `user_id`, `created_at`, `status`) VALUES
(1, 'land dispute', 'HAVING DISPUTE WITH LANDS', 4, '0703416091', 1, '2024-12-15 23:42:32', 'Declined'),
(2, 'Land Dispute', '', 1, '', 1, '2024-12-16 04:42:22', 'Declined'),
(3, 'money laundering', 'was accused of misuse of funds', 2, '703416091', 1, '2024-12-16 05:20:56', 'Declined'),
(4, 'child trafficking', '', 2, '', 1, '2024-12-16 06:28:03', ''),
(5, 'pollution of environment', 'accused of noise pollution.....', 9, '791430983', 4, '2024-12-16 06:31:28', 'Declined'),
(6, 'Pollution', '', 2, '', 1, '2024-12-16 06:35:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `case_documents`
--

CREATE TABLE `case_documents` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `document_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_documents`
--

INSERT INTO `case_documents` (`id`, `case_id`, `document_name`, `description`, `user_id`, `created_at`, `document_path`) VALUES
(1, 1, 'land dispute_PYTHON PROGRAMMING NOTES.pdf', 'ID', 1, '2024-12-15 23:42:32', ''),
(2, 3, 'money laundering_PYTHON PROGRAMMING NOTES.pdf', 'evidence', 1, '2024-12-16 05:20:56', ''),
(3, 5, 'pollution of environment_PYTHON PROGRAMMING NOTES.pdf', 'evidence', 4, '2024-12-16 06:31:29', ''),
(4, 5, 'pollution of environment_PYTHON PROGRAMMING NOTES.pdf', 'ID', 4, '2024-12-16 06:31:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `email`, `phone`, `id_number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Livingstone Apeli', 'livingstoneapeli@gmail.com', '0703416091', '40194335', '$2y$10$lWy97DORacSbgnJNomAWL.pHAUvDWZXXoYlzVM76Kc0938chjq7I.', '2024-12-15 10:03:53', '2024-12-16 06:20:31'),
(4, 'Caren Maru', 'carenmaru@gmail.com', '0714835381', '835381', '$2y$10$QNBBzNFljk6g5c85ycjkgedq1o00H7M411QLMJStnjVFqrVuM0xtO', '2024-12-16 06:18:46', '2024-12-16 06:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `status` enum('active','inactive','pending') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `name`, `email`, `phone`, `specialization_id`, `status`, `created_at`, `updated_at`, `password`) VALUES
(1, 'Livingstone Apeli', 'lingstoneapeli@gmail.com', '0703416091', 1, 'active', '2024-12-15 13:03:39', '2024-12-15 13:03:39', '$2y$10$VM0.AJpEa05boksQX/P4H.imjCEb2EEVMRJkOvGv7Jy9Hfj/f7m0a'),
(2, 'Caren Maru', 'carenmaru@gmail.com', '0754497441', 5, 'active', '2024-12-16 06:25:01', '2024-12-16 06:25:01', '$2y$10$Ovj4KnJqTK0KEkbG198y/uePLK4zs4mx9G0lxtIN2pZwYMU359vIO'),
(4, 'Tonnyv Trevix', 'tonnytrevix@gmail.com', '0754467441', 6, 'active', '2024-12-16 06:34:33', '2024-12-16 06:34:33', '$2y$10$5xpo8HpqhDZmoCmQfim7ZOvTIez2HsBbcTTpvE.xfgHKDSAegUYSy');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` enum('Pending','Completed','Failed') NOT NULL DEFAULT 'Pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `case_id`, `user_id`, `amount`, `payment_method`, `payment_status`, `payment_date`, `transaction_reference`) VALUES
(1, 1, 1, 500.00, '0', 'Completed', '2024-12-16 00:53:46', ''),
(2, 1, 1, 4000.00, '0', 'Completed', '2024-12-16 01:03:02', ''),
(3, 1, 1, 4000.00, '0', 'Completed', '2024-12-16 01:05:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(11) NOT NULL,
  `specialization_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `specialization_name`, `description`) VALUES
(1, 'Corporate Law', 'tdctfyf'),
(2, 'Criminal Law', 'cgvhvbh'),
(3, 'Family Law', ''),
(4, 'Intellectual Property', ''),
(5, 'Immigration Law', ''),
(6, 'Tax Law', ''),
(7, 'Real Estate Law', ''),
(9, 'environmental law', 'helps gather......');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `appointments_ly`
--
ALTER TABLE `appointments_ly`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `assigned_cases`
--
ALTER TABLE `assigned_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialization_id` (`specialization_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `case_documents`
--
ALTER TABLE `case_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments_ly`
--
ALTER TABLE `appointments_ly`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigned_cases`
--
ALTER TABLE `assigned_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_documents`
--
ALTER TABLE `case_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`);

--
-- Constraints for table `assigned_cases`
--
ALTER TABLE `assigned_cases`
  ADD CONSTRAINT `assigned_cases_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_cases_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_cases_ibfk_3` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`),
  ADD CONSTRAINT `cases_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `case_documents`
--
ALTER TABLE `case_documents`
  ADD CONSTRAINT `case_documents_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `case_documents_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD CONSTRAINT `lawyers_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
