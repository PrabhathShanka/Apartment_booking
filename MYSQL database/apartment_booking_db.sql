-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 05:21 AM
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
-- Database: `apartment_booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `adminID` int(20) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`adminID`, `uname`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `Apartment_ID` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `gps_tag` varchar(1000) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `TeleNo` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `adminApproving` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`Apartment_ID`, `location`, `gps_tag`, `image`, `TeleNo`, `price`, `description`, `email`, `adminApproving`) VALUES
(1, 'Hikkaduwa', 'https://www.youtube.com/watch?v=d5YOoBogzeU', '66f584db737b3.jpg', '0789675835', '6000', 'xzXzxzXzX', 'shiran@gmail.com', 'pending'),
(2, 'galle', '789edw', '66f59a031e63b.jpg', '044876998', '25000', 'good', 'prabhath@gmail.com', 'Approved'),
(3, 'Mathara', 'sdd44', '66f9676ccb56a.jpg', '0776489515', '2500', 'xakosnckjdnsvjkbcdjv cjbv cb vbdb  jcndjsncjdsnc  cdsjncjsdnNSIQ SABASXNSJN CJNDJCDJS', 'prabhath@gmail.com', 'Approved'),
(4, 'Colombo', 'swwdd44', '66f96ccd48599.jpg', '077699823', '2566', 'skckkdmcm kkcm d mm m jnaknsxka', 'prabhath@gmail.com', 'NOT Approved'),
(5, 'Baddegama', 'awed14566', '66f9a06ea39dc.jpg', '077669822', '2600', ' What are HTML color codes?\r\n\r\nColor codes are ways of representing the colors we see everyday in a format that a computer can interpret and display. Commonly used in websites and other software applications, there are a variety of formats, including Hex color codes, RGB and HSL values, and HTML color names, amongst others.\r\nHex color codes\r\n\r\nThe most popular are Hex color codes; three byte hexadecimal numbers (meaning they consist of six digits), with each byte, or pair of characters in the Hex code, representing the intensity of red, green and blue in the color respectively.  What are HTML color codes?\r\n\r\nColor codes are ways of representing the colors we see everyday in a format that a computer can interpret and display. Commonly used in websites and other software applications, there are a variety of formats, including Hex color codes, RGB and HSL values, and HTML color names, amongst others.\r\nHex color codes\r\n\r\nThe most popular are Hex color codes; three byte hexadecimal numbers ', 'shiran@gmail.com', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `ID` int(11) NOT NULL,
  `Apartment_ID` int(11) NOT NULL,
  `Private_bathroom` varchar(3) NOT NULL,
  `Toilet` varchar(3) NOT NULL,
  `Room_Amenities_Bed` varchar(3) NOT NULL,
  `Room_Amenities_Mattress` varchar(3) NOT NULL,
  `Room_Amenities_Table` varchar(3) NOT NULL,
  `Room_Amenities_Chair` varchar(3) NOT NULL,
  `Living_area_Dining_area` varchar(3) NOT NULL,
  `Living_area_Sitting_area` varchar(3) NOT NULL,
  `Accommodation` varchar(3) NOT NULL,
  `Parking` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`ID`, `Apartment_ID`, `Private_bathroom`, `Toilet`, `Room_Amenities_Bed`, `Room_Amenities_Mattress`, `Room_Amenities_Table`, `Room_Amenities_Chair`, `Living_area_Dining_area`, `Living_area_Sitting_area`, `Accommodation`, `Parking`) VALUES
(1, 4, 'YES', 'NO', 'YES', 'NO', 'YES', 'NO', 'YES', 'YES', 'NO', 'YES'),
(2, 1, 'YES', 'NO', 'YES', 'NO', 'YES', 'NO', 'YES', 'YES', 'YES', 'YES'),
(4, 2, 'YES', 'NO', 'YES', 'NO', 'YES', 'NO', 'YES', 'YES', 'YES', 'YES'),
(5, 3, 'YES', 'NO', 'YES', 'NO', 'YES', 'NO', 'YES', 'YES', 'YES', 'YES'),
(6, 4, 'YES', 'NO', 'YES', 'NO', 'YES', 'YES', 'YES', 'YES', 'YES', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel_number` int(10) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `password1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `address`, `tel_number`, `user_role`, `password1`) VALUES
('prabhath@gmail.com', 'prabhath', 'galee', 776998567, 'apartmentOwner', '123'),
('shanka@gmail.com', 'shanka', 'galle', 776939081, 'students', '123'),
('shiran@gmail.com', 'Shiran', 'Hikkaduwa', 776398091, 'apartmentOwner', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`Apartment_ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Apartment_ID` (`Apartment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `adminID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `Apartment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`Apartment_ID`) REFERENCES `apartments` (`Apartment_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
