-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 03:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yummandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `yum_admin`
--

CREATE TABLE `yum_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yum_admin`
--

INSERT INTO `yum_admin` (`admin_id`, `admin_name`, `admin_password`, `admin_email`) VALUES
(1, 'test1212', 'admin', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `yum_comments`
--

CREATE TABLE `yum_comments` (
  `cmt_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yum_comments`
--

INSERT INTO `yum_comments` (`cmt_id`, `res_id`, `user_name`, `user_email`, `comment`, `rating`, `status`) VALUES
(38, 80, 'Bijen Maharjan', 'officiallybijen@gmail.com', 'loved it. the enviroment was great😍😍😍', 5, 1),
(39, 76, 'Jina', 'nccsbijen@gmail.com', 'Preety good enjoyed my time there.', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yum_contact`
--

CREATE TABLE `yum_contact` (
  `contact_id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `yum_menu`
--

CREATE TABLE `yum_menu` (
  `menu_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yum_menu`
--

INSERT INTO `yum_menu` (`menu_id`, `res_id`, `food`, `price`) VALUES
(35, 75, 'khaja set', 320),
(36, 76, 'ad', 120),
(41, 40, 'Pizza Roll', 120),
(44, 43, 'momo', 120),
(45, 43, 'Pizza Roll', 120);

-- --------------------------------------------------------

--
-- Table structure for table `yum_res`
--

CREATE TABLE `yum_res` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_owner` varchar(255) NOT NULL,
  `res_city` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `res_img` varchar(255) NOT NULL,
  `res_status` tinyint(1) NOT NULL,
  `res_desc` text NOT NULL,
  `res_pp` varchar(255) NOT NULL,
  `rating_total` int(255) NOT NULL,
  `rating_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yum_res`
--

INSERT INTO `yum_res` (`res_id`, `res_name`, `res_owner`, `res_city`, `res_email`, `res_img`, `res_status`, `res_desc`, `res_pp`, `rating_total`, `rating_count`) VALUES
(76, 'Panchos', 'asd', 'Pokhara', 'bijen390@gmail.com', 'cover102.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. TESTING WORD:zipra', 'pp4.jfif', 4, 1),
(78, 'Salam Guest House', 'Aftab Khan', 'Chitwan', 'aftab@gmail.com', 'cover103.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pp5.jpg', 0, 0),
(79, 'Shiraz', 'Rahul ji', 'Dharan', 'rahul@gmail.com', 'cover102.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pp6.jpg', 0, 0),
(80, 'St. Regis Hotel', 'Narayan Shrestha', 'Kathmandu', 'nccsbijen@gmail.com', 'cover103.jpg', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ppSt. Regis Hotels.jpg', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yum_admin`
--
ALTER TABLE `yum_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `yum_comments`
--
ALTER TABLE `yum_comments`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `yum_contact`
--
ALTER TABLE `yum_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `yum_menu`
--
ALTER TABLE `yum_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `yum_res`
--
ALTER TABLE `yum_res`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yum_comments`
--
ALTER TABLE `yum_comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `yum_contact`
--
ALTER TABLE `yum_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `yum_menu`
--
ALTER TABLE `yum_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `yum_res`
--
ALTER TABLE `yum_res`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
