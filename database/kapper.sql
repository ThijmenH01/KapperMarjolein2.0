-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 11:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapper`
--

-- --------------------------------------------------------

--
-- Table structure for table `afspraakkt`
--

CREATE TABLE `afspraakkt` (
  `afspraak_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `afspraken`
--

CREATE TABLE `afspraken` (
  `afspraak_id` int(11) NOT NULL,
  `klanten_id` int(11) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afspraken`
--

INSERT INTO `afspraken` (`afspraak_id`, `klanten_id`, `datum`) VALUES
(192, 215, '2022-12-20 10:19:00'),
(193, 216, '2022-12-20 10:19:00'),
(194, 217, '2022-12-20 10:19:00'),
(195, 218, '2022-12-20 10:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefoon` varchar(13) NOT NULL,
  `notities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `naam`, `email`, `telefoon`, `notities`) VALUES
(215, 'siempostmus@ziggo.nl', 'muhamedshamsaddin@gmail.com', '+313123123123', '321312312312'),
(216, 'siempostmus@ziggo.nl', 'muhamedshamsaddin@gmail.com', '+313123123123', '321312312312'),
(217, 'siempostmus@ziggo.nl', 'muhamedshamsaddin@gmail.com', '+313123123123', '321312312312'),
(218, 'siempostmus@ziggo.nl', 'muhamedshamsaddin@gmail.comww', '+313123123123', '31312');

-- --------------------------------------------------------

--
-- Table structure for table `servicekt`
--

CREATE TABLE `servicekt` (
  `medewerker_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicekt`
--

INSERT INTO `servicekt` (`medewerker_id`, `service_id`) VALUES
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `serviceduur` int(11) NOT NULL,
  `serviceprijs` decimal(50,0) NOT NULL,
  `servicenaam` varchar(50) NOT NULL,
  `servicescategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serviceduur`, `serviceprijs`, `servicenaam`, `servicescategorie`) VALUES
(21, 30, '10', 'Puntjes knippen', 7),
(22, 30, '15', 'Kort haar', 7),
(23, 30, '20', 'Haar tot schouders', 7),
(24, 30, '25', 'Lang haar', 7),
(71, 30, '10', 'Puntjes knippen', 8),
(72, 30, '10', 'Puntjes knippen', 9),
(73, 30, '10', 'Puntjes knippen', 11),
(74, 30, '15', 'Kort haar', 8),
(75, 30, '15', 'Kort haar', 9),
(76, 30, '15', 'Kort haar', 11),
(77, 30, '20', 'Haar tot schouders\n', 9),
(78, 30, '20', 'Haar tot schouders', 9),
(79, 30, '20', 'Haar tot schouders', 11),
(80, 30, '25', 'Lang haar', 8),
(81, 30, '25', 'Lang haar', 9),
(82, 30, '25', 'Lang haar', 11);

-- --------------------------------------------------------

--
-- Table structure for table `servicescategorie`
--

CREATE TABLE `servicescategorie` (
  `servicescategorie_id` int(11) NOT NULL,
  `categorienaam` varchar(255) NOT NULL,
  `categorieprijs` decimal(50,0) NOT NULL,
  `categorieduur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicescategorie`
--

INSERT INTO `servicescategorie` (`servicescategorie_id`, `categorienaam`, `categorieprijs`, `categorieduur`) VALUES
(7, 'wassen', '10', 15),
(8, 'föhnen', '10', 15),
(9, 'wassen & föhnen', '20', 30),
(11, 'geen', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userkt`
--

CREATE TABLE `userkt` (
  `afspraak_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userkt`
--

INSERT INTO `userkt` (`afspraak_id`, `user_id`, `service_id`) VALUES
(194, 1, 77),
(195, 1, 77);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rol`, `naam`, `email`, `wachtwoord`) VALUES
(1, 'admin', 'mo', 'a@gmail.om', '123'),
(2, 'admin', 'thijmen', 'thij@men.com', '123'),
(8, 'admin', 'mo', 'a@gmail.com', '$2y$10$p8CsRTCFzz9BxkJpAX.KwuttYIQGXXbb/LrRqnrUTZdB2aR/8owcm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afspraakkt`
--
ALTER TABLE `afspraakkt`
  ADD UNIQUE KEY `afspraak_id` (`afspraak_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`afspraak_id`),
  ADD UNIQUE KEY `klanten_id` (`klanten_id`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicekt`
--
ALTER TABLE `servicekt`
  ADD KEY `service_id` (`service_id`),
  ADD KEY `medewerker_id` (`medewerker_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicescategorie` (`servicescategorie`);

--
-- Indexes for table `servicescategorie`
--
ALTER TABLE `servicescategorie`
  ADD PRIMARY KEY (`servicescategorie_id`);

--
-- Indexes for table `userkt`
--
ALTER TABLE `userkt`
  ADD UNIQUE KEY `afspraak_id` (`afspraak_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `userkt_ibfk_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `afspraak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `servicescategorie`
--
ALTER TABLE `servicescategorie`
  MODIFY `servicescategorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afspraken`
--
ALTER TABLE `afspraken`
  ADD CONSTRAINT `afspraken_ibfk_1` FOREIGN KEY (`klanten_id`) REFERENCES `klanten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicekt`
--
ALTER TABLE `servicekt`
  ADD CONSTRAINT `servicekt_ibfk_1` FOREIGN KEY (`medewerker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicekt_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`servicescategorie`) REFERENCES `servicescategorie` (`servicescategorie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userkt`
--
ALTER TABLE `userkt`
  ADD CONSTRAINT `userkt_ibfk_1` FOREIGN KEY (`afspraak_id`) REFERENCES `afspraken` (`afspraak_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userkt_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userkt_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
