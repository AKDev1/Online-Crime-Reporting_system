-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 02:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `station`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_crash`
--

CREATE TABLE `car_crash` (
  `fullName` varchar(100) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `report_id` int(15) NOT NULL,
  `description` text NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_crash`
--

INSERT INTO `car_crash` (`fullName`, `phoneNumber`, `report_id`, `description`, `Address`) VALUES
('Aman Kumar', 2147483647, 1, 'car accident', 'sh49, chennai'),
('Shirsh Chatterjee', 2147483647, 2, 'car accident on NH6', 'NH6, kolkata'),
('Shaurya Singh', 2147483647, 3, 'car accident onNoida expressway', 'Noida-greater Noida expressway');

-- --------------------------------------------------------

--
-- Table structure for table `car_status`
--

CREATE TABLE `car_status` (
  `crash_id` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_status`
--

INSERT INTO `car_status` (`crash_id`, `status`) VALUES
(1, 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `setting`, `value`) VALUES
(1, 'site_name', 'Speak Up'),
(2, 'site_url', 'localhost/policeStation/'),
(3, 'site_email', 'speakUp@gmail.com'),
(4, 'cookie_name', 'authID'),
(5, 'cookie_path', '/'),
(6, 'cookie_domain', NULL),
(7, 'cookie_secure', '0'),
(8, 'cookie_http', '0'),
(9, 'site_key', 'fghuior.)/%dgdhjUyhdbv7867HVHG7777ghg'),
(10, 'cookie_remember', '+1 month'),
(11, 'cookie_forget', '+30 minutes'),
(12, 'bcrypt_cost', '10'),
(13, 'table_attempts', 'attempts'),
(14, 'table_requests', 'requests'),
(15, 'table_sessions', 'sessions'),
(16, 'table_users', 'users'),
(17, 'site_timezone', 'nairobu');

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `Crime_No` int(9) NOT NULL,
  `Status` char(100) NOT NULL DEFAULT 'No action',
  `Category` char(100) NOT NULL,
  `Description` char(100) NOT NULL,
  `Crime_Scene` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`Crime_No`, `Status`, `Category`, `Description`, `Crime_Scene`) VALUES
(1, 'No action', 'robbery', 'Robbery in my area', 'sector 100, Uttar Pradesh, India.'),
(3, 'No action', 'rape', 'A girl raped and murdered. body found in the bushes', 'Park Street, Kolkalta, India.'),
(4, 'No action', 'Murder', 'Murder', 'mad street den, Tamil Nadu, India.'),
(5, 'No action', 'robbery', 'robbery', 'Azeez Nagar, Reddiyarpalayam, C-202, PUDUCHERRY, India.');

-- --------------------------------------------------------

--
-- Table structure for table `crime_status`
--

CREATE TABLE `crime_status` (
  `crime_id` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime_status`
--

INSERT INTO `crime_status` (`crime_id`, `status`) VALUES
(2, 'Granted'),
(10, 'Granted'),
(11, 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `fire_acc`
--

CREATE TABLE `fire_acc` (
  `fire_id` int(10) NOT NULL,
  `fullName` char(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fire_acc`
--

INSERT INTO `fire_acc` (`fire_id`, `fullName`, `Address`, `phoneNumber`, `Description`, `Date`) VALUES
(1, 'Shaurya', 'Lotus Boulevard Espacia, Sector -100, Noida, UP, India', 2147483647, 'Fire in the opposite building', '2021-05-25'),
(2, 'Shirsh', 'park street, kolkata', 2147483647, 'neighbouring house is on fire', '2021-05-23'),
(3, 'Aman', 'Srinivase towers, Azeez Nagar, Reddiyarpalayam', 2147483647, 'Fire', '2021-05-23'),
(4, 'Aman', 'No. 347, P-Block, gorbachev road, VIT University', 2147483647, 'fire', '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `fire_status`
--

CREATE TABLE `fire_status` (
  `fire_id` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fire_status`
--

INSERT INTO `fire_status` (`fire_id`, `status`) VALUES
(9, 'Granted'),
(10, 'Denied'),
(11, 'Granted');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_NO` int(6) NOT NULL,
  `Description` char(100) NOT NULL,
  `Last_Seen` date NOT NULL,
  `Item_Name` varchar(1000) NOT NULL,
  `category` char(100) NOT NULL,
  `status` char(100) NOT NULL DEFAULT 'Not found'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_NO`, `Description`, `Last_Seen`, `Item_Name`, `category`, `status`) VALUES
(1, 'Lets see this one', '2015-03-07', 'Phone', 'found', ''),
(2, 'I want my phone back', '0000-00-00', 'Phone', 'Lost', 'Not found'),
(3, 'blackberry', '0000-00-00', 'phone', 'Lost', 'Not found'),
(4, 'mlkkl', '0000-00-00', 'phone', 'found', 'Not found'),
(5, 'good pen', '0000-00-00', 'pens', 'Lost', 'Not found'),
(6, 'mnj,km', '0000-00-00', 'phone', 'Lost', 'Not found'),
(7, 'hp', '0000-00-00', 'laptop', 'Lost', 'Not found'),
(8, 'mobile lost', '2021-05-22', 'mobile', 'Lost', 'Not found');

-- --------------------------------------------------------

--
-- Table structure for table `lost_valuables`
--

CREATE TABLE `lost_valuables` (
  `id` int(10) NOT NULL,
  `item_name` char(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `firstName` char(100) NOT NULL,
  `lastName` char(100) NOT NULL,
  `ID_Number` int(16) NOT NULL,
  `Location` char(100) NOT NULL,
  `Gender` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`firstName`, `lastName`, `ID_Number`, `Location`, `Gender`) VALUES
('a', 'a', 0, 'kenya', 'm'),
('shaurya', 'singh', 123, 'Italy', 'm'),
('a', 'a', 222, 'kenya', 'm'),
('James', 'Boaz', 2131231, 'Eldoret', 'm'),
('Brian', 'Chemutai', 3242342, 'Kisumu', 'm'),
('Johnson', 'Didinya', 12345678, 'Kisumu', 'm'),
('Fabian', 'ocham', 19828292, 'kenya', 'm'),
('Alfred', 'Mwangi', 30194285, 'Kisumu', 'm'),
('Emmauel', 'Steve', 30234231, 'Kisumu', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(0, 1, '66442538ef7c20ded1ac034cfe791747b2280509', '2015-03-23 20:17:36', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', '0d9a3acc2cef71e12f75719cb343f1f1010db5a0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`) VALUES
(0, 'aaaa', 'fab@gmail.com'),
(123, '123456', 'shaurya.singh2019@vitstudent.ac.in'),
(222, '11', 'didinkaj@gmail.com'),
(1000000, 'admin1234', 'admin@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_crash`
--
ALTER TABLE `car_crash`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `car_status`
--
ALTER TABLE `car_status`
  ADD PRIMARY KEY (`crash_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`Crime_No`);

--
-- Indexes for table `crime_status`
--
ALTER TABLE `crime_status`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `fire_acc`
--
ALTER TABLE `fire_acc`
  ADD PRIMARY KEY (`fire_id`);

--
-- Indexes for table `fire_status`
--
ALTER TABLE `fire_status`
  ADD PRIMARY KEY (`fire_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Item_NO`);

--
-- Indexes for table `lost_valuables`
--
ALTER TABLE `lost_valuables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `car_crash`
--
ALTER TABLE `car_crash`
  MODIFY `report_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `Crime_No` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fire_acc`
--
ALTER TABLE `fire_acc`
  MODIFY `fire_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Item_NO` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lost_valuables`
--
ALTER TABLE `lost_valuables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
