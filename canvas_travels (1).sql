-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 04:51 PM
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
-- Database: `canvas_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `travelers`
--

CREATE TABLE `travelers` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `aadhar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travelers`
--

INSERT INTO `travelers` (`id`, `trip_id`, `name`, `aadhar`) VALUES
(1, 1, 'Satyam Kumar', '12346987979987'),
(2, 2, 'Manish', '46479874164'),
(3, 2, 'Suresh', '654987695144'),
(4, 3, 'Krishan', '87234924234235'),
(5, 4, 'xyz', '34546457665');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `travel_date` date NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(20) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `destination`, `travel_date`, `status`, `created_at`, `phone`, `feedback`) VALUES
(1, 5, 'Japan', '2025-07-17', 'approved', '2025-07-02 13:00:37', '7488729665', ''),
(2, 5, 'Switzerland', '2025-07-01', 'travelled', '2025-07-02 14:55:30', '6666666668', ''),
(3, 6, 'Maldives', '2025-07-23', 'rejected', '2025-07-02 14:56:54', '6206840434', ''),
(4, 6, 'Switzerland', '2025-07-21', 'approved', '2025-07-03 02:34:17', '+917488729665', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `phone`, `is_admin`) VALUES
(5, 'Satyam Kumar', 'kumarrahul12062002@gmail.com', '123456', '2025-07-02 11:48:04', '6666666668', 0),
(6, 'Krishna Kumar', 'afhasfhaskj@gmail.com', '12345678', '2025-07-02 13:03:08', '6666666668', 0),
(8, 'Tiwari Satyam', 'satyamtiwari62068@gmail.com', '00000000', '2025-07-02 13:42:18', '4444444448', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travelers`
--
ALTER TABLE `travelers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travelers`
--
ALTER TABLE `travelers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `travelers`
--
ALTER TABLE `travelers`
  ADD CONSTRAINT `travelers_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
