-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 08:30 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organisation`
--
CREATE DATABASE IF NOT EXISTS `organisation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `organisation`;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `idcountry` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`idcountry`, `name`) VALUES
(1, 'BiH'),
(2, 'Srbija'),
(3, 'Grcka'),
(4, 'Njemacka');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `idorganisations` int(11) NOT NULL,
  `idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `idmembership` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `datum_uplate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `datum_isteka` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`idmembership`, `idusers`, `price`, `datum_uplate`, `datum_isteka`) VALUES
(1, 2, 10, '2014-08-12 22:00:00', '2015-08-13 00:00:00'),
(2, 2, 15, '2015-10-12 22:00:00', '2016-10-13 00:00:00'),
(3, 2, 20, '2016-11-12 23:00:00', '2017-11-13 00:00:00'),
(4, 2, 18.5, '2017-11-25 23:00:00', '2018-11-26 00:00:00'),
(18, 2, 12, '2019-09-06 12:27:21', '2019-09-28 00:00:00'),
(20, 5, 54, '2019-07-31 22:00:00', '2019-08-10 00:00:00'),
(21, 7, 23, '2019-08-08 22:00:00', '2019-08-31 00:00:00'),
(22, 5, 45, '2019-08-22 12:07:08', '2020-08-22 14:07:08'),
(23, 10, 45, '2019-08-27 07:57:26', '2020-08-27 09:57:26'),
(24, 11, 34, '2019-08-27 08:15:42', '2020-08-27 10:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idnews` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `short_description` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idnews`, `idusers`, `title`, `short_description`, `description`, `date`) VALUES
(18, 2, 'The plight of a US dairy farm', 'fff', 'The plight of a US dairy farm', '2016-11-10 10:08:44'),
(19, 2, 'North Korea snubs peace talks with South Korea over war drills ff', 'North Korea has rejected any further talks with South Korea, calling its decision \"completely the fault of South Korea\'s actions\".ff', 'It issued a statement in response to a speech by South Korea President Moon Jae-in on Thursday.\r\n\r\nMeanwhile, early on Friday North Korea test-fired two missiles into the sea off its eastern coast, the South Korean military said.\r\n\r\nIt is the sixth such test in less than a month.\r\n\r\nThe two \"unidentified projectiles\" were fired about 08:00 (23:00 GMT Thursday) and travelled 230km (140 miles) reaching an altitude of 30km (18 miles), South Korea\'s Joint Chiefs of Staff said.dfdf\r\n\r\nSix days ago, North Korea fired two short-range ballistic missiles into the Sea of Japan/East Sea.\r\nThe series of tests comes after US President Donald Trump and North Korean leader Kim Jong-un agreed during a meeting in June to restart denuclearisation negotiations.\r\n\r\nNorth Korea has faced international sanctions for its development of nuclear weapons.\r\n\r\nNorth Korea\'s missile and nuclear programme\r\nCrisis in 300 words\r\nAre Pyongyang\'s missiles a risk to planes?\r\nWhat did South Korea say?\r\nIn a speech markin', '2017-09-15 09:08:44'),
(20, 6, 'fffffffff', 'ddddddddd', 'gggggggg', '2018-10-10 09:08:44'),
(21, 7, 'sascazx ', 'xcxcxccccccc', 'bbbbbbbbb', '2018-09-12 09:08:44'),
(22, 2, 'ttt', 'yyy', 'hhh', '2019-08-28 09:08:44'),
(23, 2, 'ttt', 'ggg', 'bbb', '2019-08-28 09:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `idorganisations` int(11) NOT NULL,
  `idcountry` int(11) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `organization_type` varchar(100) NOT NULL,
  `founding_date` date DEFAULT NULL,
  `contact_person` varchar(40) NOT NULL,
  `website` varchar(40) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `idcountry` int(11) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `city` varchar(20) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `jmbg` varchar(30) NOT NULL,
  `personal_number` varchar(30) NOT NULL,
  `approve` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `idcountry`, `first_name`, `last_name`, `gender`, `phone_number`, `email`, `password`, `city`, `is_active`, `user_type`, `jmbg`, `personal_number`, `approve`) VALUES
(1, 1, 'Stefan', 'Grujicic', 'Male', '066/069-413', 'stefangrujicic996@gmail.com', '1677stef', 'Sarajevo', 1, 1, '', '', 1),
(2, 2, 'Markan', 'Markovic', 'Male', '066 786 543', 'm.markovic@gmail.com', 'marko123', 'Novi Sad', 0, 2, '', '', 0),
(5, 4, 'Janko', 'Jankovic', 'Male', '066 789 987', 'janko@gamil.com', '123', 'Berlin', 1, 2, '', '', 1),
(6, 1, 'Petar', 'Petrovic', 'Male', '066 349 987', 'petar.petrovic@gmail.com', '123', 'Mostar', 0, 2, '', '', 0),
(7, 2, 'Ana', 'Ivanovic', 'Female', '066 789 987', 'ana.ivanovic@gmail.com', '123', 'Beograd', 0, 2, '', '', 0),
(10, 2, 'Jovana', 'Jovanovic', 'Female', '064 537 839', 'jovana@gmail.com', '123', 'Nis', 1, 2, '38384829922', '39393KL393M', 0),
(11, 1, 'Petar', 'Jankovic', 'Male', '065 637 832', 'petar@gmail.com', '123', 'Banja Luka', 1, 2, '7372891031', '193829KL', 1),
(15, 1, 'Uros', 'Peric', 'Male', '08639220', 'uros@gmail.com', '123', 'Mostar', 0, 2, '333HK789', '1313LK97', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idcountry`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idorganisations`,`idusers`),
  ADD KEY `fk_member_of_the_organisation2` (`idusers`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`idmembership`),
  ADD KEY `fk_pay_membership` (`idusers`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`),
  ADD KEY `fk_makes_news` (`idusers`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`idorganisations`),
  ADD KEY `fk_is_placed` (`idcountry`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD KEY `fk_user_country` (`idcountry`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `idcountry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `idmembership` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `idorganisations` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_member_of_the_organisation` FOREIGN KEY (`idorganisations`) REFERENCES `organisations` (`idorganisations`),
  ADD CONSTRAINT `fk_member_of_the_organisation2` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `fk_pay_membership` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_makes_news` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `organisations`
--
ALTER TABLE `organisations`
  ADD CONSTRAINT `fk_is_placed` FOREIGN KEY (`idcountry`) REFERENCES `country` (`idcountry`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_country` FOREIGN KEY (`idcountry`) REFERENCES `country` (`idcountry`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
