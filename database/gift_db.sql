-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 08:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_user_list`
--

CREATE TABLE `registered_user_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_user_list`
--

INSERT INTO `registered_user_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `dob`, `contact`, `email`, `password`, `avatar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Daniel', ' Abebe', 'xxxx', 'Male', '1997-10-14', '0911372002', 'dani@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'uploads/rusers/1.jpg?v=1646607097', 1, 0, '2022-02-23 11:27:57', '2022-03-08 17:53:24'),
(2, 'teyayezen', 'Abebe', 'xxxxx', 'Male', '1997-07-15', '0923596538', 'mesge@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/rusers/2.jpg?v=1646607305', 1, 0, '2022-02-23 11:29:47', '2022-03-06 14:55:05'),
(3, 'Amin', 'Beshir', 'Beker', 'Male', '2022-03-01', '9999999999', 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/rusers/3.png?v=1646849621', 1, 0, '2022-03-09 06:13:41', '2022-03-09 06:13:41'),
(4, 'Amin', 'xxxx', 'xxxxx', 'Male', '1999-03-02', '9999999999', 'ab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/rusers/4.jpg?v=1646858686', 1, 0, '2022-03-09 08:44:46', '2022-03-09 08:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(30) NOT NULL,
  `fullname` varchar(255)  NOT NULL,
  `sex` varchar(255)  NOT NULL,
  `age` int(30) NOT NULL,
  `grade` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--


--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', ''),
(6, 'short_name', ''),
(11, 'logo', 'uploads/logo-1647062896.PNG?v=1647062896'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1647062896.PNG?v=1647062896'),
(15, 'company_name', 'Teyayezen Charitable Organization'),
(16, 'company_tel_no', '+456 789 1234'),
(17, 'company_mobile', '+639 102 456 7896'),
(18, 'company_email', 'info@sample.com'),
(19, 'company_address', 'Block 23 Lot 6, 14th St., Here Subd., There City, Anywhere, 2306, Ethiopia'),
(20, 'company_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum quam nulla, eu ultricies odio aliquet sit amet. Pellentesque ullamcorper magna vitae feugiat tempor. Phasellus efficitur, ligula non accumsan vulputate, felis lacus lobortis sem, commodo rutrum elit ligula vitae dolor. Cras tristique turpis nunc, vel porttitor ligula maximus ac. Quisque a vehicula felis. Aenean condimentum lectus et purus vulputate egestas. Duis quis scelerisque orci. Sed urna ligula, cursus quis turpis vitae, porta rhoncus arcu. Suspendisse gravida vulputate laoreet.'),
(21, 'company_name', 'Teyayezen Charitable Organization'),
(22, 'company_tel_no', '+456 789 1234'),
(23, 'company_mobile', '+639 102 456 7896'),
(24, 'company_email', 'info@sample.com'),
(25, 'company_address', 'Block 23 Lot 6, 14th St., Here Subd., There City, Anywhere, 2306, Ethiopia'),
(26, 'company_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum quam nulla, eu ultricies odio aliquet sit amet. Pellentesque ullamcorper magna vitae feugiat tempor. Phasellus efficitur, ligula non accumsan vulputate, felis lacus lobortis sem, commodo rutrum elit ligula vitae dolor. Cras tristique turpis nunc, vel porttitor ligula maximus ac. Quisque a vehicula felis. Aenean condimentum lectus et purus vulputate egestas. Duis quis scelerisque orci. Sed urna ligula, cursus quis turpis vitae, porta rhoncus arcu. Suspendisse gravida vulputate laoreet.'),
(27, 'company_name', 'Teyayezen Charitable Organization'),
(28, 'company_tel_no', '+456 789 1234'),
(29, 'company_mobile', '+639 102 456 7896'),
(30, 'company_email', 'info@sample.com'),
(31, 'company_address', 'Block 23 Lot 6, 14th St., Here Subd., There City, Anywhere, 2306, Ethiopia'),
(32, 'company_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum quam nulla, eu ultricies odio aliquet sit amet. Pellentesque ullamcorper magna vitae feugiat tempor. Phasellus efficitur, ligula non accumsan vulputate, felis lacus lobortis sem, commodo rutrum elit ligula vitae dolor. Cras tristique turpis nunc, vel porttitor ligula maximus ac. Quisque a vehicula felis. Aenean condimentum lectus et purus vulputate egestas. Duis quis scelerisque orci. Sed urna ligula, cursus quis turpis vitae, porta rhoncus arcu. Suspendisse gravida vulputate laoreet.'),
(33, 'company_name', 'teyayezen'),
(34, 'company_tel_no', '+251-923596538'),
(35, 'company_mobile', '+251-923596538'),
(36, 'company_email', 'teyayezen@gmail.com'),
(37, 'company_address', 'Adama Ethiopia'),
(38, 'company_description', 'our company is non governmental organization that used to help many Ethiopians.'),
(39, 'company_name', 'Teyayezen Ethiopia'),
(40, 'company_tel_no', '+251-923596538'),
(41, 'company_mobile', '+251-923596538'),
(42, 'company_email', 'teyayezen@gmail.com'),
(43, 'company_address', 'Adama Ethiopia'),
(44, 'company_description', 'our company is non governmental organization that used to help many Ethiopians.'),
(45, 'company_name', 'Teyayezen Ethiopia'),
(46, 'company_tel_no', '+251-908404040'),
(47, 'company_mobile', '+251-911835929'),
(48, 'company_email', 'teyayezen@gmail.com'),
(49, 'company_address', 'AddisAbaba Ethiopia'),
(50, 'company_description', 'Teyayezen Ethiopia Charitable Organization'),
(51, 'company_name', 'Teyayezen Ethiopia'),
(52, 'company_tel_no', '+251-908404040'),
(53, 'company_mobile', '+251-911835929'),
(54, 'company_email', 'teyayezen@gmail.com'),
(55, 'company_address', 'AddisAbaba Ethiopia'),
(56, 'company_description', 'Teyayezen Ethiopia Charitable Organization');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1645064505', NULL, 1, '2021-01-20 14:02:37', '2022-02-17 10:21:45'),
(5, 'Amin', 'Beshir', 'Beker', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/avatars/5.jpg?v=1646609755', NULL, 1, '2022-02-22 15:29:03', '2022-03-06 15:35:55'),
(7, 'Amin', 'Beshir', 'amin', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/avatars/7.jpg?v=1646858579', NULL, 2, '2022-03-09 08:42:59', '2022-03-09 08:42:59');

--
-- Indexes for dumped tables
--
ALTER TABLE student_list CONVERT TO CHARACTER SET utf8;
--
-- Indexes for table `registered_user_list`
--
ALTER TABLE `registered_user_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_user_list`
--
ALTER TABLE `registered_user_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
