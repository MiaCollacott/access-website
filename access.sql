-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 03:54 PM
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
-- Database: `access`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `locations_id` int(2) NOT NULL,
  `NAME` varchar(78) DEFAULT NULL,
  `ADDRESS` varchar(64) DEFAULT NULL,
  `URL` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`locations_id`, `NAME`, `ADDRESS`, `URL`) VALUES
(1, 'Appuldurcombe House ', 'Appuldurcombe Road, Wroxall, Isle of Wight, PO38 3EW', 'https://www.english-heritage.org.uk/visit/places/appuldurcombe-house/'),
(2, 'Abingdon County Hall Museum', 'Abingdon, Oxfordshire, OX14 3HG', 'https://www.english-heritage.org.uk/visit/places/abingdon-county-hall-museum/'),
(3, 'Abbotsbury, St Catherine\'s Chapel', 'Chapel Hill, Abbotsbury, Weymouth, Dorset, DT3 4JH', 'https://www.english-heritage.org.uk/visit/places/abbotsbury-st-catherines-chapel/'),
(4, 'Abbotsbury Abbey Remains ', 'Abbotsbury, Dorset, DT3 4JR', 'https://www.english-heritage.org.uk/visit/places/abbotsbury-abbey-remains/'),
(5, 'Ambleside Roman Fort ', 'Ambleside, Cumbria, LA22 0EN', 'https://www.english-heritage.org.uk/visit/places/ambleside-roman-fort/'),
(6, 'Acton Burnell Castle', 'Acton Burnell, Shrewsbury, Shropshire, SY5 7PE', 'https://www.english-heritage.org.uk/visit/places/acton-burnell-castle/'),
(7, 'Arthur\'s Stone ', 'Arthur\'s Stone Lane , Dorstone, Hereford, Herefordshire, HR3 6AX', 'https://www.english-heritage.org.uk/visit/places/arthurs-stone/'),
(8, 'Arbor Low Stone Circle and Gib Hill Barrow', 'Long Rake, Monyash, Bakewell, Derbyshire, DE45 1JS', 'https://www.english-heritage.org.uk/visit/places/arbor-low-stone-circle-and-gib-hill-barrow/'),
(9, 'Avebury', 'Avebury, Marlborough, Wiltshire, SN8 1RF', 'https://www.english-heritage.org.uk/visit/places/avebury/'),
(10, 'Auckland Castle Deer House', 'Auckland Castle Deer Park, Bishop Auckland, Co Durham, DL14 7QJ', 'https://www.english-heritage.org.uk/visit/places/auckland-castle-deer-house/'),
(11, 'Bant\'s Carn Burial Chamber and Halangy Down Ancient Village', 'St Mary\'s, Isles of Scilly, TR21 0NS', 'https://www.english-heritage.org.uk/visit/places/bants-carn-burial-chamber-and-halangy-down-ancient-village/'),
(12, 'Banks East Turret - Hadrian\'s Wall', 'Pike Hill, Brampton, Cumbria, CA8 2BX', 'https://www.english-heritage.org.uk/visit/places/banks-east-turret-hadrians-wall/');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `locations_id` int(11) NOT NULL,
  `Review` longtext NOT NULL,
  `Stars` varchar(11) NOT NULL,
  `Bathroom` varchar(1) NOT NULL DEFAULT 'N',
  `HearingLoop` varchar(1) NOT NULL DEFAULT 'N',
  `StepFree` varchar(1) NOT NULL DEFAULT 'N',
  `ramp` varchar(1) DEFAULT 'N',
  `seating` varchar(1) DEFAULT 'N',
  `lift` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `locations_id`, `Review`, `Stars`, `Bathroom`, `HearingLoop`, `StepFree`, `ramp`, `seating`, `lift`) VALUES
(6, 11, 'seating near entrace. not completel step free as some small ledges', 'on', 'N', 'N', 'N', 'N', 'N', 'N'),
(7, 11, 'pretty good', 'on', 'N', 'Y', 'Y', 'N', 'N', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`locations_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_location_id` (`locations_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `locations_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_location_id` FOREIGN KEY (`locations_id`) REFERENCES `addresses` (`locations_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
