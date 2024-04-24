-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 24.Apr 2024, 12:14
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `bait`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `lake_temperatures`
--

CREATE TABLE `lake_temperatures` (
  `id` int(11) NOT NULL,
  `lake_name` varchar(100) NOT NULL,
  `temperature` decimal(5,2) NOT NULL,
  `reading_datetime` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `lake_temperatures`
--

INSERT INTO `lake_temperatures` (`id`, `lake_name`, `temperature`, `reading_datetime`, `deleted_at`) VALUES
(1, 'Testing1212221', 21.52, '2024-04-11 11:40:00', '2024-04-24 10:07:12'),
(2, 'testtt', 11.11, '2024-04-24 12:02:00', NULL),
(3, 'ttsttsst', 999.99, '2024-04-24 12:07:00', NULL),
(4, 'tstts1', 22.00, '2024-04-24 12:09:00', '2024-04-24 10:09:41');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `lake_temperatures`
--
ALTER TABLE `lake_temperatures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `lake_temperatures`
--
ALTER TABLE `lake_temperatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
