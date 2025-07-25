-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 05:54 PM
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
-- Database: `task-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `username`, `password`, `email`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(5, 'test', '$2y$10$b7jwRwJxiexvlzjoLhZzWu3ionfpJMJ3y3bs158rCnRdZRSpijbi2', 'test@email.com', NULL, NULL),
(9, 'nerner', '$2y$10$4oSeZ08dRFPEmvFWCTsqzuyhPllxAKPncz1616zToTVbIiOkvzSI2', 'nerner@email.com', NULL, NULL),
(11, 'rjbrts', '$2y$10$A9hhQAaQfUjPS.RlcoF/5OyFy3gZtAImdjaTJjx7WFeE3d5DryaHy', 'britosranieljohn@gmail.com', '4976467ca1e42a6bab533c6217615ee82ccd01bb10d601fce452449196148cbf', '2025-07-23 14:19:06'),
(12, 'Admin', '$2y$10$e.EmIECAXwmq8ZFCjll6MuNCCEoL6hsy3ynTWZMZhqm2LHk6eaxgW', 'admin@email.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(255) NOT NULL,
  `notes_title` varchar(1000) NOT NULL,
  `notes_description` mediumtext NOT NULL,
  `task_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `notes_title`, `notes_description`, `task_id`, `user_id`) VALUES
(7, 'test', 'test', 1, 9),
(13, 'testtest', 'teste', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(255) NOT NULL,
  `task_name` varchar(1000) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `user_id`) VALUES
(1, 'test', 9),
(3, 'testing123', 5),
(5, 'PHP', 12),
(6, 'Physics', 12);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `file_id` int(255) NOT NULL,
  `file_name` varchar(1000) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `notes_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`file_id`, `file_name`, `file_path`, `notes_id`) VALUES
(16, 'fiona.jpg', '../../assets/uploads/fiona.jpg', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`) USING BTREE,
  ADD KEY `userf` (`user_id`),
  ADD KEY `notes_ibfk_1` (`task_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `foreign` (`user_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `notesid` (`notes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `file_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userf` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `notesid` FOREIGN KEY (`notes_id`) REFERENCES `notes` (`notes_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
