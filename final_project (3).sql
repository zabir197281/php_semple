-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 07:30 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserName` varchar(99) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `UserType` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserName`, `Password`, `UserType`) VALUES
('saki11', '827ccb0eea8a706c4c34a16891f84e7b', 'RentTaker'),
('poroah11', '827ccb0eea8a706c4c34a16891f84e7b', 'RentTaker'),
('zabir11', '827ccb0eea8a706c4c34a16891f84e7b', 'RentTaker'),
('ashraful11', '827ccb0eea8a706c4c34a16891f84e7b', 'RentTaker'),
('sahil11', '827ccb0eea8a706c4c34a16891f84e7b', 'RentTaker'),
('saki12', '827ccb0eea8a706c4c34a16891f84e7b', 'RentGiver'),
('zabir12', '827ccb0eea8a706c4c34a16891f84e7b', 'RentGiver'),
('ashraful12', '827ccb0eea8a706c4c34a16891f84e7b', 'RentGiver'),
('porosh11', '827ccb0eea8a706c4c34a16891f84e7b', 'RentGiver'),
('sahil12', '827ccb0eea8a706c4c34a16891f84e7b', 'RentGiver'),
('zabir7', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `propertyinfo`
--

CREATE TABLE `propertyinfo` (
  `UserName` varchar(99) NOT NULL,
  `Price` varchar(99) NOT NULL,
  `Phone` varchar(99) NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Area` varchar(99) NOT NULL,
  `Address` varchar(99) NOT NULL,
  `Room` varchar(99) NOT NULL,
  `Size` varchar(99) NOT NULL,
  `Floor` varchar(99) NOT NULL,
  `Image` varchar(350) NOT NULL,
  `PropertyID` int(11) NOT NULL,
  `Sratus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertyinfo`
--

INSERT INTO `propertyinfo` (`UserName`, `Price`, `Phone`, `Email`, `Area`, `Address`, `Room`, `Size`, `Floor`, `Image`, `PropertyID`, `Sratus`) VALUES
('saki12', '30000', '01711838487', 'saki197281@gmail.com', 'Nayapolton', 'Nayapolton 76', '3-bed,1-kitchin', '1200', '4', 'House_pic/pexels-photo-280229.jpeg', 115, 'yes'),
('zabir12', '17000', '01234567890', 'zabir197281@gmail.com', 'Motijheel', 'Modhomita Cinema Hall', '3-bed', '2300', '9', 'House_pic/za.jpeg', 117, 'yes'),
('zabir12', '25000', '01234567890', 'zabir197281@gmail.com', 'Nayapolton', 'Shanti nogor', '5-bed,3-washroom', '4000', '4', 'House_pic/pexels-photo-280229.jpeg', 118, 'yes'),
('ashraful12', '    60000', '01711838487', 'as197281@gmail.com', 'Gulshan', 'Gulshan-12', '5-bed,3-washroom,2-kitchin', '50000', '11', 'House_pic/pexels-photo-280229.jpeg', 119, 'yes'),
('ashraful12', '16000', '01711838487', 'as197281@gmail.com', 'Nayapolton', 'naya polton-76/G', '3-bed', '900', '6', 'House_pic/pexels-photo-2089698.jpeg', 120, 'yes'),
('porosh11', '   16000', '01234567890', 'porosh197281@gmail.com', 'Nayapolton', 'naya polton-56', '2-bed,3-washroom', '800', '4', 'House_pic/za.jpeg', 121, 'yes'),
('sahil12', '28000', '01711838485', 'sa197281@gmail.com', 'Nayapolton', 'naya polton-56', '2-bed,3-washroom', '4500', '5', 'House_pic/download.jpg', 122, 'yes'),
('sahil12', '19000', '01711838485', 'sa197281@gmail.com', 'Motijheel', 'mothjheel-6', '6', '5000', ' 5', 'House_pic/download.jpg', 123, 'yes'),
('sahil12', '38000', '01711838485', 'sa197281@gmail.com', 'Gulshan', 'Gulshan-10', '2-bed,3-washroom', '3000', '4', 'House_pic/pexels-photo-2089698.jpeg', 124, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `rentgiverinfo`
--

CREATE TABLE `rentgiverinfo` (
  `FirstName` varchar(99) NOT NULL,
  `LastName` varchar(99) NOT NULL,
  `UserName` varchar(99) NOT NULL,
  `Phone` varchar(99) NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Password` varchar(99) NOT NULL,
  `Gender` varchar(99) NOT NULL,
  `Occupation` varchar(99) NOT NULL,
  `UserType` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentgiverinfo`
--

INSERT INTO `rentgiverinfo` (`FirstName`, `LastName`, `UserName`, `Phone`, `Email`, `Password`, `Gender`, `Occupation`, `UserType`) VALUES
('Sadman', 'Khan', 'saki12', '01711838487', 'saki197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Unemployed', 'RentGiver'),
('Abdullah-Al', 'Zabir', 'zabir12', '01234567890', 'zabir197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Businessman', 'RentGiver'),
('MD Islam', 'Ashraful', 'ashraful12', '01711838487', 'as197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Student', 'RentGiver'),
('Porosh', 'Islam', 'porosh11', '01234567890', 'porosh197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Student', 'RentGiver'),
('Big', 'Sahil', 'sahil12', '01711838485', 'sa197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', 'Student', 'RentGiver');

-- --------------------------------------------------------

--
-- Table structure for table `renttakerinfo`
--

CREATE TABLE `renttakerinfo` (
  `FirstName` varchar(99) NOT NULL,
  `LastName` varchar(99) NOT NULL,
  `UserName` varchar(99) NOT NULL,
  `Phone` varchar(99) NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Password` varchar(99) NOT NULL,
  `Gender` varchar(99) NOT NULL,
  `Occupation` varchar(99) NOT NULL,
  `UserType` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renttakerinfo`
--

INSERT INTO `renttakerinfo` (`FirstName`, `LastName`, `UserName`, `Phone`, `Email`, `Password`, `Gender`, `Occupation`, `UserType`) VALUES
('Shadman', 'Saki', 'saki11', '01711838485', 'zabir197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Survice holder', 'RentTaker'),
('Fuad ', 'Porosh', 'poroah11', '01711838487', 'asdf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', 'Student', 'RentTaker'),
('Zabir', 'Khan', 'zabir11', '01711838485', 'zabir197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Student', 'RentTaker'),
('Ashraful', 'Islam', 'ashraful11', '01711838481', 'ash19728@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Student', 'RentTaker'),
('Sahil ', 'Azis', 'sahil11', '01234567890', 'sahil197281@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', 'Student', 'RentTaker');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `PropertyID` int(11) NOT NULL,
  `renttakerUsername` varchar(99) NOT NULL,
  `rentgiverUsername` varchar(99) NOT NULL,
  `p_rize` varchar(99) NOT NULL,
  `Buy_request` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`PropertyID`, `renttakerUsername`, `rentgiverUsername`, `p_rize`, `Buy_request`) VALUES
(118, 'saki11', 'zabir12', '25000', 'pending'),
(122, 'saki11', 'sahil12', '28000', 'pending'),
(116, 'saki11', 'saki12', '15000', 'sold'),
(117, 'saki11', 'zabir12', '17000', 'pending'),
(120, 'sahil11', 'ashraful12', '16000', 'pending'),
(122, 'ashraful11', 'sahil12', '28000', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propertyinfo`
--
ALTER TABLE `propertyinfo`
  ADD PRIMARY KEY (`PropertyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `propertyinfo`
--
ALTER TABLE `propertyinfo`
  MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
