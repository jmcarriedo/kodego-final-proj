-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2021 at 08:30 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `eventName` varchar(225) NOT NULL,
  `eventCategory` varchar(100) NOT NULL,
  `eventPackage` varchar(100) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` varchar(50) NOT NULL,
  `eventVenue` varchar(225) NOT NULL,
  `eventNotes` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_id`, `gallery_id`, `eventName`, `eventCategory`, `eventPackage`, `eventDate`, `eventTime`, `eventVenue`, `eventNotes`, `status`, `date_created`, `date_updated`) VALUES
(2, 1, NULL, 'Juan Birthday', 'Birthday', 'Classic Package', '2021-09-30', 'Afternoon Event', 'Davao City', 'Test', 0, '2021-09-27 05:01:52', '2021-09-30 03:47:36'),
(3, 4, NULL, 'Engagement', 'Engagement', 'Gold Package', '2021-09-29', 'Whole Day Event', 'Test', 'test', 1, '2021-09-27 10:33:59', '2021-09-30 03:48:06'),
(4, 4, NULL, 'Debut', 'Debut', 'Premium Package', '2021-09-29', 'Afternoon Event', 'Test', 'test', 0, '2021-09-27 10:34:08', '2021-09-30 03:50:16'),
(6, 1, NULL, 'Juan and Maria Wedding', 'Wedding', 'Gold Package', '2021-11-29', 'Morning Event', 'Davao City', 'Test', 1, '2021-09-29 07:09:16', '2021-09-30 06:13:34'),
(7, 7, NULL, 'Test', 'Wedding', 'Classic Package', '2021-09-29', 'Morning Event', 'Test', 'Test', 0, '2021-09-29 09:11:47', '2021-09-29 09:11:47'),
(8, 4, NULL, 'Juan and Maria Wedding', 'Engagement', 'Classic Package', '2021-09-30', 'Afternoon Event', 'Davao City', 'Test', 0, '2021-09-29 09:41:24', '2021-09-29 09:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(225) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`contact_id`, `name`, `email`, `subject`, `message`, `date_created`, `date_updated`) VALUES
(4, 'test', 'test@test.com', 'test', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque ipsa velit fugit vitae omnis quam sed nesciunt, blanditiis expedita. Obcaecati labore tenetur fugit vel at molestias reprehenderit unde? Ab, mollitia.', '2021-09-27 14:29:19', '2021-09-27 14:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `mobileNum` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `user_id`, `firstName`, `middleName`, `lastName`, `address`, `mobileNum`, `date_created`, `date_updated`) VALUES
(1, 1, 'John', 'Smith', 'Doe', 'Davao City, Philippines', '1234567890', '2021-09-23 09:30:14', '2021-09-27 06:35:03'),
(4, 4, 'Juan', 'dela', 'Cruz', 'Davao City, Philippines', '0199992929', '2021-09-27 06:56:10', '2021-09-27 10:31:02'),
(7, 7, 'Peter', 'Parker', 'Parker', 'test', 'test', '2021-09-28 05:00:05', '2021-09-28 05:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `imageName` varbinary(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`gallery_id`, `booking_id`, `imageName`, `date_created`, `date_updated`) VALUES
(10, 8, 0x32613238306563373061383234356364616538623763663933653061323933392e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(11, 8, 0x34653533383437336164356464656338663833333864663664346235653863632e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(12, 8, 0x37613765613239613566326237616136323863663534313363623138303166642e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(13, 8, 0x32386239323165306130303937313363333965373732383664366639363531372e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(14, 8, 0x39306339303739323534323063346361643738636363363563643062306235302e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(15, 8, 0x36333865346466393432646663363730623538363437363339356462343937652e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(16, 8, 0x36373062386166353631386663386132613932356662636530623331646164612e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(17, 8, 0x35393538653563366665343837636234653039613131373166346364636264352e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(18, 8, 0x38383736666264316361343632323139326331343735383732313630663465632e706e67, '2021-09-30 03:52:35', '2021-09-30 03:52:35'),
(19, 7, 0x38323735306463356361663439343530653636626131363630373561643062372e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(20, 7, 0x61336636353433316337643932373037616239366330643031323362316264662e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(21, 7, 0x61373163313738366136353436653234613335376564633730333237356364362e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(22, 7, 0x61313235633966316133303166303831643063343334633230663931633832642e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(23, 7, 0x61643761336564333334376465353833646563333631366630323232613266352e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(24, 7, 0x62613261366166306166623737393964326565636362616638373030373432302e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(25, 7, 0x63313961366637626562303565643564326332383433653334313633306335352e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(26, 7, 0x64303361666363396631626365643761323035356131353035643132326461352e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00'),
(27, 7, 0x64333161636537623235663061303835643536343739326364623233313065342e706e67, '2021-09-30 05:59:00', '2021-09-30 05:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `accessRole` varchar(30) NOT NULL DEFAULT 'guest',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `accessRole`, `date_created`, `date_updated`) VALUES
(1, 'test@test.com', '$2y$10$lpvMR7vTuz7z2KFHz8Q8XO8rROz8UXSxDmxZsQG.1pEc4K.MCcQsW', 'admin', '2021-09-23 04:41:34', '2021-09-23 06:05:16'),
(2, 'guest@guest.com', 'password1', 'guest', '2021-09-23 07:42:37', '2021-09-23 12:52:17'),
(4, 'guest@example.com', '$2y$10$dtg5EfJYAREtbh0Yicn.1.OhA6.6T20XH/wZqTwefS3MCX8rGCgo.', 'guest', '2021-09-23 12:55:23', '2021-09-27 06:36:32'),
(7, 'guest2@guest.com', '$2y$10$tfGPMgOX8BxyhUNCS46lPemfFX6nrnpHZ1pX.rpzt/BIMx/CRHqzG', 'guest', '2021-09-27 12:09:28', '2021-09-27 12:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `FK_customer_id_idx` (`customer_id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `FK_user_id_idx` (`user_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `FK_booking_id_idx` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `FK_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
