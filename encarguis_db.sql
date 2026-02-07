-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2026 at 04:17 PM
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
-- Database: `university_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `max_students` int(11) DEFAULT NULL,
  `fee` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `credits`, `department`, `start_date`, `end_date`, `max_students`, `fee`) VALUES
(1, 'CS101', 'Introduction to Programming', 3, 'Computer Science', '2024-01-15', '2024-05-15', 50, 1200.00),
(2, 'CS201', 'Data Structures', 4, 'Computer Science', '2024-01-15', '2024-05-15', 40, 1500.00),
(3, 'CS301', 'Database Systems', 4, 'Computer Science', '2024-01-15', '2024-05-15', 35, 1600.00),
(4, 'CS401', 'Advanced Databases', 3, 'Computer Science', '2024-01-15', '2024-05-15', 30, 1800.00),
(5, 'MATH101', 'Calculus I', 4, 'Mathematics', '2024-01-15', '2024-05-15', 60, 1100.00),
(6, 'MATH201', 'Linear Algebra', 3, 'Mathematics', '2024-01-15', '2024-05-15', 45, 1300.00),
(7, 'ENG101', 'Composition I', 3, 'English', '2024-01-15', '2024-05-15', 55, 1000.00),
(8, 'ENG201', 'Literature Survey', 3, 'English', '2024-01-15', '2024-05-15', 40, 1200.00),
(9, 'PHYS101', 'Physics I', 4, 'Physics', '2024-01-15', '2024-05-15', 50, 1400.00),
(10, 'CHEM101', 'General Chemistry', 4, 'Chemistry', '2024-01-15', '2024-05-15', 55, 1400.00),
(11, 'BUS101', 'Introduction to Business', 3, 'Business', '2024-01-15', '2024-05-15', 65, 1100.00),
(12, 'BUS201', 'Marketing Principles', 3, 'Business', '2024-01-15', '2024-05-15', 50, 1300.00),
(13, 'PSY101', 'Introductory Psychology', 3, 'Psychology', '2024-01-15', '2024-05-15', 70, 1000.00),
(14, 'ART101', 'Art History', 3, 'Arts', '2024-01-15', '2024-05-15', 45, 1200.00),
(15, 'HIST101', 'World History', 3, 'History', '2024-01-15', '2024-05-15', 60, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `enrollment_date` datetime DEFAULT NULL,
  `gpa` decimal(3,2) DEFAULT NULL,
  `credits_earned` int(11) DEFAULT NULL,
  `annual_fee` decimal(10,2) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `phone`, `birth_date`, `enrollment_date`, `gpa`, `credits_earned`, `annual_fee`, `address`, `created_at`) VALUES
(1, 'John', 'Smith', 'john.smith@email.com', '123-456-7890', '2000-05-15', '2023-09-01 09:00:00', 3.75, 45, 15000.00, '123 Main St, Springfield', '2026-02-06 15:02:20'),
(2, 'Maria', 'Garcia', 'maria.g@email.com', '234-567-8901', '2001-02-28', '2023-09-01 10:30:00', 3.92, 60, 15000.00, '456 Oak Ave, Springfield', '2026-02-06 15:02:20'),
(3, 'David', 'Johnson', 'david.j@email.com', '345-678-9012', '1999-11-10', '2022-09-05 08:45:00', 3.45, 90, 14000.00, '789 Pine Rd, Springfield', '2026-02-06 15:02:20'),
(4, 'Sarah', 'Williams', 'sarah.w@email.com', '456-789-0123', '2000-07-22', '2023-09-01 11:15:00', 3.88, 48, 15000.00, '321 Elm St, Springfield', '2026-02-06 15:02:20'),
(5, 'Robert', 'Brown', 'robert.b@email.com', '567-890-1234', '2001-03-18', '2023-09-01 13:20:00', 3.20, 42, 15000.00, '654 Maple Dr, Springfield', '2026-02-06 15:02:20'),
(6, 'Jennifer', 'Davis', 'jennifer.d@email.com', '678-901-2345', '2000-12-05', '2022-09-05 14:00:00', 3.95, 96, 14000.00, '987 Cedar Ln, Springfield', '2026-02-06 15:02:20'),
(7, 'Michael', 'Miller', 'michael.m@email.com', '789-012-3456', '1999-08-30', '2022-09-05 09:30:00', 3.65, 88, 14000.00, '147 Birch St, Springfield', '2026-02-06 15:02:20'),
(8, 'Lisa', 'Wilson', 'lisa.w@email.com', '890-123-4567', '2000-04-12', '2023-09-01 15:45:00', 3.78, 50, 15000.00, '258 Walnut Ave, Springfield', '2026-02-06 15:02:20'),
(9, 'James', 'Taylor', 'james.t@email.com', '901-234-5678', '2001-01-25', '2023-09-01 16:10:00', 3.30, 44, 15000.00, '369 Spruce Blvd, Springfield', '2026-02-06 15:02:20'),
(10, 'Emily', 'Anderson', 'emily.a@email.com', '012-345-6789', '2000-09-08', '2022-09-05 10:00:00', 3.85, 92, 14000.00, '741 Oakwood Dr, Springfield', '2026-02-06 15:02:20'),
(11, 'Thomas', 'Moore', 'thomas.m@email.com', '123-987-6543', '1998-06-14', '2021-09-06 08:00:00', 3.50, 120, 13000.00, '852 Redwood Ct, Springfield', '2026-02-06 15:02:20'),
(12, 'Jessica', 'Jackson', 'jessica.j@email.com', '234-876-5432', '2000-03-30', '2023-09-01 12:30:00', 3.91, 52, 15000.00, '963 Sequoia Way, Springfield', '2026-02-06 15:02:20'),
(13, 'Christopher', 'Martin', 'chris.m@email.com', '345-765-4321', '1999-10-17', '2022-09-05 11:45:00', 3.42, 85, 14000.00, '159 Magnolia St, Springfield', '2026-02-06 15:02:20'),
(14, 'Amanda', 'Lee', 'amanda.l@email.com', '456-654-3210', '2001-08-03', '2023-09-01 14:15:00', 3.67, 46, 15000.00, '357 Dogwood Ln, Springfield', '2026-02-06 15:02:20'),
(15, 'Daniel', 'White', 'daniel.w@email.com', '567-543-2109', '2000-11-11', '2023-09-01 17:00:00', 3.25, 40, 15000.00, '456 Sycamore Ave, Springfield', '2026-02-06 15:02:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
