-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2024 at 10:58 AM
-- Server version: 5.7.21-20-beget-5.7.21-20-1-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evamellow_dboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `act`
--
-- Creation: Feb 11, 2023 at 08:10 AM
--

DROP TABLE IF EXISTS `act`;
CREATE TABLE `act` (
  `id` int(11) NOT NULL,
  `cmd` text NOT NULL,
  `dboard_id` int(11) NOT NULL,
  `type` set('cmd','btn') NOT NULL DEFAULT 'cmd'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `act`
--

INSERT INTO `act` (`id`, `cmd`, `dboard_id`, `type`) VALUES
(20, 'echo \"Дискового пространства доступно: \"$(df -h --output=avail / | tr \"\\n\" \" \" | tr -s \" \" | cut -f 3 -d \" \")', 15, 'btn');

-- --------------------------------------------------------

--
-- Table structure for table `dboard`
--
-- Creation: Feb 28, 2023 at 11:22 PM
--

DROP TABLE IF EXISTS `dboard`;
CREATE TABLE `dboard` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` int(11) DEFAULT NULL,
  `colour` text,
  `refresh_time` int(11) DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dboard`
--

INSERT INTO `dboard` (`id`, `name`, `position`, `colour`, `refresh_time`) VALUES
(15, 'Дисковое пространство', NULL, 'card-header-primary', 5);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--
-- Creation: Jun 11, 2023 at 10:28 PM
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `cpu` text,
  `mem` text,
  `trafic` text,
  `disc` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Feb 16, 2023 at 06:24 AM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `pass`) VALUES
(1, 'admin', '$2y$13$IgCRUbN9tRDP998/vHEaR.OSdUN9mWSnW/EMN7R7.oZxi6TaB4oBS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dboard_id` (`dboard_id`);

--
-- Indexes for table `dboard`
--
ALTER TABLE `dboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
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
-- AUTO_INCREMENT for table `act`
--
ALTER TABLE `act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dboard`
--
ALTER TABLE `dboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `act`
--
ALTER TABLE `act`
  ADD CONSTRAINT `act_ibfk_1` FOREIGN KEY (`dboard_id`) REFERENCES `dboard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
