-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2023 at 04:57 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `c_id` int NOT NULL,
  `c_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`c_id`, `c_name`) VALUES
(445, '&#39; &#39;select * from exams &#39;'),
(331, 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd222222222222222211111111111111111111111111111111111111112222222222w wwwwwwwwwrewrew'),
(433, 'fa solid bicnic row'),
(441, 'fds'),
(426, 'fdsfds'),
(522, 'fdsfdsfds'),
(523, 'fdsfdsfdstttttttttttt'),
(443, 'Jjj'),
(437, 'lk'),
(403, 'nbb'),
(438, 'oiu'),
(429, 'salah'),
(442, 'تقافي'),
(444, 'هن\\دسة');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `e_id` int NOT NULL,
  `e_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secs` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`e_id`, `e_name`, `secs`, `c_id`) VALUES
(1, '32ds', '3.5', 433),
(38, 'ggggggg', '4', 437),
(40, 'can do it', '2', 433),
(41, 'moremore1', '3.12', 433),
(42, 'salah muyammad nazeer teg', '4.16', 437),
(44, 'rom', '2', 437),
(45, 'kor', '6.7', 437),
(46, 'im', '9', 437),
(49, 'one', '1.1', 433),
(50, 'tow', '180', 433),
(52, 'four', '240', 433),
(53, 'fiveee eeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeezzvcx', '312', 433),
(55, 'seven7', '7.432', 437),
(56, 'be', '138', 433),
(58, 'الحضارة الفرعونية', '3.25', 442),
(64, 'الدئرة', '3', 444),
(65, 'he ho ha ha', '30', 433),
(71, 'fsdfdsf', '1920', 433);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `user_id` int NOT NULL,
  `e_id` int NOT NULL,
  `date` date DEFAULT (now()),
  `duration_by_secs` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`user_id`, `e_id`, `date`, `duration_by_secs`, `percentage`) VALUES
(1, 53, '2023-02-18', '43.69', '28.57'),
(1, 53, '2023-02-18', '5.25', '42.86'),
(1, 53, '2023-02-18', '12.88', '28.57'),
(1, 53, '2023-02-18', '4.96', '28.57'),
(3, 53, '2023-02-19', '4.91', '0.00'),
(3, 53, '2023-02-19', '5.19', '42.86'),
(3, 53, '2023-02-19', '4.51', '14.29'),
(3, 53, '2023-02-19', '239.23', '42.86'),
(3, 53, '2023-02-20', '5.27', '14.29'),
(1, 56, '2023-02-20', '1.25', '0.00'),
(1, 56, '2023-02-20', '1.46', '50.00'),
(1, 56, '2023-02-20', '1.91', '0.00'),
(1, 56, '2023-02-20', '1.72', '50.00'),
(1, 53, '2023-02-21', '6.82', '0.00'),
(1, 53, '2023-02-21', '4.37', '0.00'),
(1, 53, '2023-02-21', '16.21', '22.22'),
(1, 53, '2023-02-21', '6.76', '11.11'),
(1, 53, '2023-02-21', '333.83', '22.22'),
(3, 53, '2023-02-21', '9.29', '33.33');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int NOT NULL,
  `question` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selections` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question`, `selections`, `answer`, `e_id`) VALUES
(164, 'q1, how old are you', '7&#13;&#103&#13;&#106', '5, five', 53),
(165, 'how are, you', 'fine&#13;&#10;good&#13;&#10;ready', 'nice, omg', 53),
(166, 'how do you go to , shcool !?', 'bus&#13;&#10walk', 'run, gry', 53),
(171, 'نق الدائرة', 't&#13;&#103&#13;&#106&#13;&#10n', '2', 64),
(174, 'how are, , you, , ?, d', 'fine&#13;&#10;&#13;&#10;good&#13;&#10;&#13;&#10;thanks', 'bkheer', 53),
(177, '3aml ayh', 'tmam&#13;&#10;alhamdolilah', 'koys', 53),
(178, 'ayh a5barkhh', 's1&#13;&#10s5', 's3, s2', 53),
(179, 'hiii&#13;&#10;ggg&#13;&#10;fdsfdsfsd  dsad&#13;&#10;aaaaaaaaa', 'hi&#13;&#10;hello&#13;&#10;bbbbbbbbbb', 'thanks&#13;&#10;gfd&#13;&#10;cccccccccccc', 53),
(181, 'b1', 'b1&#13;&#10b4&#13;&#10b6', 'b8', 56),
(182, 'how are you', 'good&#13;&#10thanks&#13;&#10fine', 'too', 56),
(183, 'new question 1&#13;&#10;2', 'selection 1&#13;&#10;selection 2&#13;&#10;s3&#13;&#10;s4 s5 s6', 's8&#13;&#10;s9 s0', 53),
(184, 'new question 2&#13;&#10;/2', 's1&#13;&#10;s2&#13;&#10;s3, s5', 's7&#13;&#10;s9, 66', 53);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `admin`) VALUES
(1, 'admin salah', '91a9814e3d6ad682e008c3b9d76605a0cb4f459e', 1),
(3, 'admin', '91a9814e3d6ad682e008c3b9d76605a0cb4f459e', 0),
(5, 'adminn', '91a9814e3d6ad682e008c3b9d76605a0cb4f459e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_name` (`e_name`),
  ADD KEY `exams_classifications_fk` (`c_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `exams_logs_fk` (`e_id`),
  ADD KEY `users_logs_fk` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `question_exams_fk` (`e_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `e_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_classifications_fk` FOREIGN KEY (`c_id`) REFERENCES `classifications` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `exams_logs_fk` FOREIGN KEY (`e_id`) REFERENCES `exams` (`e_id`),
  ADD CONSTRAINT `users_logs_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `question_exams_fk` FOREIGN KEY (`e_id`) REFERENCES `exams` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
