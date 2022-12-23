-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 05:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'rabbi', 'rabbi@gmail.com', '123', '2021-07-17 06:56:58'),
(2, 'mehnaz', 'mehnaz@gmail.com', '123', '2021-07-17 06:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `user_id`, `created_at`, `post_id`) VALUES
(2, 'wkjbga;lvqwrv\r\n', 7, '2022-12-16 04:49:10', 1),
(3, 'adfbadf', 7, '2022-12-16 04:50:54', 1),
(4, 'kjvklyvlkihblknljbkuvijhyv', 7, '2022-12-16 04:57:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `name`, `created_at`) VALUES
(1, 'SPL', '2022-12-11 13:42:51'),
(2, 'APL', '2022-12-11 13:43:58'),
(3, 'DLD', '2022-12-11 13:43:58'),
(4, 'Accounting', '2022-12-11 13:43:58'),
(5, 'Economics', '2022-12-11 13:43:58'),
(6, 'Vector', '2022-12-11 13:43:58'),
(7, 'OOP', '2022-12-11 13:43:59'),
(8, 'Data Structure 2', '2022-12-11 13:43:59'),
(11, 'Electronics', '2022-12-23 07:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division_name`, `created_at`) VALUES
(1, 'CSE', '2021-07-18 15:56:00'),
(2, 'EEE', '2021-07-18 15:56:00'),
(3, 'DEPT', '2021-07-18 15:58:52'),
(4, 'ELectic', '2021-07-18 15:58:56'),
(5, 'Magical', '2021-07-18 15:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_issues`
--

CREATE TABLE `faculty_issues` (
  `id` int(11) NOT NULL,
  `issue` text NOT NULL,
  `reply` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_issues`
--

INSERT INTO `faculty_issues` (`id`, `issue`, `reply`, `status`, `user_id`) VALUES
(1, 'I have to insert the form data again and again give me a solution to this problem in the admin section for creating a exam portal', 'Taken Care of already\r\n', 1, 5),
(2, 'asdgasdfgadsfbv\r\n', 'We are lokking for this soluction', 1, 6),
(3, 'asdgasfdhasedtgwerfb', NULL, 0, 5),
(4, ';ikjhbvlikjhv', NULL, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `job_portal`
--

CREATE TABLE `job_portal` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `dept` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_portal`
--

INSERT INTO `job_portal` (`id`, `title`, `details`, `dept`, `deadline`, `created_at`, `company`, `position`) VALUES
(1, 'PHP Developer Wanted!', 'Job Description\r\nKey Accountabilities:\r\n\r\nï‚§ Achieve individual Sales target from existing and new accounts by building and developing relationships.  \r\n\r\nï‚§ Prepare account strategy and planning with regards to current ICT, Cloud & Data Center Colocation product portfolio to achieve sales target.  \r\n\r\nï‚§ Regular visit to potential clients to achieve set of KPI targets. \r\n\r\nï‚§ Provide Market insight for developing creative solutions to maximize business opportunity. \r\n\r\nï‚§ Ensure healthy payment habits of Customers.  \r\n\r\nï‚§ Ensure high standard of customer service to all existing accounts.\r\n\r\nï‚§ Collect accurate feedback on Client requirements and complaint. Subsequently develop and execute action plans to ensure client satisfaction and thus maximize revenue.', 'CSE', '2022-12-31', '2022-12-20 17:25:51', 'FANTECH', 'jr software Engineer'),
(2, 'Django Developer Wanted!', 'Job Description\r\nKey Accountabilities:\r\n\r\nï‚§ Achieve individual Sales target from existing and new accounts by building and developing relationships.  \r\n\r\nï‚§ Prepare account strategy and planning with regards to current ICT, Cloud & Data Center Colocation product portfolio to achieve sales target.  \r\n\r\nï‚§ Regular visit to potential clients to achieve set of KPI targets. \r\n\r\nï‚§ Provide Market insight for developing creative solutions to maximize business opportunity. \r\n\r\nï‚§ Ensure healthy payment habits of Customers.  \r\n\r\nï‚§ Ensure high standard of customer service to all existing accounts.\r\n\r\nï‚§ Collect accurate feedback on Client requirements and complaint. Subsequently develop and execute action plans to ensure client satisfaction and thus maximize revenue.', 'CSE', '2022-12-31', '2022-12-20 17:25:51', 'FANTECH 2', 'jr software Engineer 2');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `details`, `created_at`) VALUES
(2, 'Holiday Notice', 'No holiday allowed for all', '2022-12-23 05:16:34'),
(3, 'Going to Tour', 'Dept Tour', '2022-12-23 05:17:04'),
(4, 'Holiday Notice', 'No holiday allowed for all', '2022-12-23 05:16:34'),
(5, 'Going to Tour', 'Dept Tour', '2022-12-23 05:17:04'),
(6, 'Holiday Notice', 'No holiday allowed for all', '2022-12-23 05:16:34'),
(7, 'Going to Tour', 'Dept Tour', '2022-12-23 05:17:04'),
(8, 'Holiday Notice', 'No holiday allowed for all', '2022-12-23 05:16:34'),
(9, 'Going to Tour', 'Dept Tour', '2022-12-23 05:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `details`, `user_id`, `created_at`) VALUES
(1, 'Facing Lab Issues', 'for the last few month lab time is way to lengthy in this winter', 7, '2022-12-16 03:58:00'),
(2, 'kjhvljhvl', 'kgcklugv;lkhub;', 7, '2022-12-16 04:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `project_proposal`
--

CREATE TABLE `project_proposal` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `team` text NOT NULL,
  `supervisor` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `trimester` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_proposal`
--

INSERT INTO `project_proposal` (`id`, `title`, `user_id`, `team`, `supervisor`, `position`, `course_id`, `details`, `created_at`, `trimester`, `status`) VALUES
(1, 'Mini Drone', 7, 'x,y,z,d,df', 'Rim SIr', '2nd Runner up', 4, 'This a mini drone project', '2022-12-16 03:04:49', 'Spring 22', 1),
(2, 'Mini Drone 2', 1, 'J , T, E, S', 'Kasem Sir', 'Winner', 4, 'This project is based on IOT.', '2022-12-16 03:04:49', 'Spring 23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_answer_solutions`
--

CREATE TABLE `question_answer_solutions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `course_name` varchar(255) NOT NULL,
  `trimester` varchar(255) NOT NULL,
  `mid_final` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requisition_order_list`
--

CREATE TABLE `requisition_order_list` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_order_list`
--

INSERT INTO `requisition_order_list` (`id`, `item`, `user_id`, `quantity`, `details`, `created_at`, `status`) VALUES
(1, 'Pen', 5, '5', '1- kala, 2 -laal, 2-blue', '2022-12-23 06:19:07', 1),
(2, 'A4_paper', 5, '2', 'oiybvgopi', '2022-12-23 06:19:52', 1),
(3, 'Plastic_File', 5, '1', 'asdgasdf', '2022-12-23 06:52:37', 1),
(4, 'Duster', 3, '1', 'adsfg', '2022-12-23 16:34:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `created_at`) VALUES
(1, 'Mohammadpur Preparatory School', '2021-07-17 09:14:43'),
(2, 'BAF Shaheen College', '2021-07-17 09:14:43'),
(3, 'Milstone', '2021-07-18 15:37:58'),
(4, 'Kakoli School', '2021-07-18 15:39:17'),
(5, 'VNC', '2021-07-18 15:39:19'),
(6, 'DRMC', '2021-07-18 15:41:46'),
(7, 'Preparatory', '2021-07-18 15:46:26'),
(8, 'United International University', '2022-12-11 09:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `section_list`
--

CREATE TABLE `section_list` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_list`
--

INSERT INTO `section_list` (`id`, `url`) VALUES
(1, '../academic_section/_uA-selctn-Dec-9-2022.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ua_grader_application`
--

CREATE TABLE `ua_grader_application` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_grade` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ua_grader_application`
--

INSERT INTO `ua_grader_application` (`id`, `type`, `user_id`, `faculty_id`, `course_id`, `name`, `course_grade`, `phone`, `section`, `created_at`, `status`) VALUES
(3, 'GRADER', 7, 5, 3, 'S1', '2.18', '0175441124', 'B', '2022-12-20 16:26:35', 2),
(4, 'UA', 1, 5, 3, 'DFSD', '1.66', '0154441', 'D', '2022-12-23 05:45:25', 2),
(7, 'UA', 1, 3, 2, 'Helly', '2.33', '2134', 'A', '2022-12-23 16:43:23', 2),
(8, 'GRADER', 1, 5, 5, 'Helly', '1.2222222', 'asdf', 'asdf', '2022-12-23 16:43:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `school_division` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `cgpa` varchar(255) NOT NULL DEFAULT '3.19',
  `official_id` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `subscription` int(11) NOT NULL DEFAULT 0,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `password`, `user_type`, `school_division`, `status`, `cgpa`, `official_id`, `designation`, `subscription`, `created_id`) VALUES
(1, 'Helly', 'hlas@gmail.com', '0164465165', '123', 'STUDENT', '1', 1, '3.19', 111745, 'Professor', 2, '2021-07-17 09:39:41'),
(2, 'Rabbi', 'rabbi@gmail.com', '01736145515', '123', 'TEACHER', '1', 1, 'N/A', 1425, 'Manager XX', 0, '2021-07-17 09:40:13'),
(3, 'Yousuf', 'yousuf@gmail.com', '0135645665', '123', 'TEACHER', '1', 1, 'N/A', 12356478, 'CEO', 0, '2021-07-18 07:38:41'),
(4, 'Bejji', 'bejji@gmail.com', '123', '123', 'OFFICIAL', '4', 1, 'N/A', 111202289, 'Web Developer', 0, '2021-07-21 20:10:48'),
(5, 'JellyFish', 'jellyfish@gmail.com', '01832165416', '123', 'TEACHER', '1', 1, 'N/A', 12455781, 'Faculty', 0, '2022-12-11 09:13:40'),
(6, 'jelluy2', 'jellyfish2@gmail.com', '121212', '123', 'OFFICIAL', '1', 1, 'N/A', 12413, 'asdf', 0, '2022-12-11 09:26:06'),
(7, 's1', 's1@gmail.com', '0147744212', '123', 'STUDENT', '8', 1, '3.19', 14253135, 'student', 2, '2022-12-11 09:38:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_issues`
--
ALTER TABLE `faculty_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_portal`
--
ALTER TABLE `job_portal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_proposal`
--
ALTER TABLE `project_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answer_solutions`
--
ALTER TABLE `question_answer_solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_order_list`
--
ALTER TABLE `requisition_order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_list`
--
ALTER TABLE `section_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ua_grader_application`
--
ALTER TABLE `ua_grader_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_issues`
--
ALTER TABLE `faculty_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_portal`
--
ALTER TABLE `job_portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_proposal`
--
ALTER TABLE `project_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_answer_solutions`
--
ALTER TABLE `question_answer_solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requisition_order_list`
--
ALTER TABLE `requisition_order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section_list`
--
ALTER TABLE `section_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ua_grader_application`
--
ALTER TABLE `ua_grader_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
