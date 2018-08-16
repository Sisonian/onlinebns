-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 09:30 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_phone` varchar(20) NOT NULL,
  `account_password` varchar(100) NOT NULL,
  `account_location` varchar(100) NOT NULL,
  `account_registration_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_phone`, `account_password`, `account_location`, `account_registration_date`, `account_image`, `account_type`) VALUES
(1, 'blazingdragon', '09099514698', '90d4d0a9f72fd96d2b9d01986e0b0735', 'Olongapo City', '2017-03-28 05:46:43.767484', 'dragon.jpg', 'user'),
(2, 'iansison', '09099514698', '90d4d0a9f72fd96d2b9d01986e0b0735', 'Olongapo City', '2017-03-26 02:43:14.707106', 'admin_2.jpg', 'user'),
(3, 'sisonian06', '09099514698', '90d4d0a9f72fd96d2b9d01986e0b0735', 'Olongapo City', '2017-03-26 02:43:22.456881', 'admin_2.jpg', 'admin'),
(4, 'jeremyarrabe', '09076806258', '621945e40756340be604c7aa420151fe', 'Olongapo City', '2017-03-26 02:43:29.983169', 'admin_1.jpg', 'user'),
(5, 'jennysison', '09099514698', 'be8330a7bfb15f860e93b4508c3527fd', 'Manila, Metro Manila (NCR)', '2017-03-25 14:55:47.000000', 'jenny.jpg', 'user'),
(6, 'karensison', '090909090909', 'b852d73c9718d94f640d7ed932132682', 'Olongapo City', '2017-03-26 01:31:17.000000', 'karen.jpg', 'user');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
