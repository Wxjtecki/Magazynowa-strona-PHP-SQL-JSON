-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql8
-- Generation Time: Wrz 26, 2024 at 07:07 PM
-- Wersja serwera: 8.0.33-25
-- Wersja PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `01061926_dworcowapub`
--
CREATE DATABASE IF NOT EXISTS `01061926_dworcowapub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `01061926_dworcowapub`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kalendarz_pracowniczy`
--

CREATE TABLE `kalendarz_pracowniczy` (
  `id` int NOT NULL,
  `pracownik_id1` int DEFAULT NULL,
  `pracownik_id2` int DEFAULT NULL,
  `pracownik_id3` int DEFAULT NULL,
  `obecnosc_pracownik1` enum('obecny','nieobecny','pomoc') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `obecnosc_pracownik2` enum('obecny','nieobecny','pomoc') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `obecnosc_pracownik3` enum('obecny','nieobecny','pomoc') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dzien` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalendarz_pracowniczy`
--

INSERT INTO `kalendarz_pracowniczy` (`id`, `pracownik_id1`, `pracownik_id2`, `pracownik_id3`, `obecnosc_pracownik1`, `obecnosc_pracownik2`, `obecnosc_pracownik3`, `dzien`) VALUES
(1, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 1),
(2, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 2),
(3, 1, 2, 3, 'obecny', 'obecny', 'obecny', 3),
(4, 1, 2, 3, 'obecny', 'nieobecny', 'obecny', 4),
(5, 1, 2, 3, 'nieobecny', 'nieobecny', 'nieobecny', 5),
(6, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 6),
(7, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 7),
(8, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 8),
(9, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 9),
(10, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 10),
(11, 1, 2, 3, 'pomoc', 'obecny', 'nieobecny', 11),
(12, 1, 2, 3, 'nieobecny', 'nieobecny', 'nieobecny', 12),
(13, 1, 2, 3, 'obecny', 'nieobecny', 'nieobecny', 13),
(14, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 14),
(15, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 15),
(16, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 16),
(17, 1, 2, 3, 'obecny', 'nieobecny', 'nieobecny', 17),
(18, 1, 2, 3, 'nieobecny', 'nieobecny', 'nieobecny', 18),
(19, 1, 2, 3, 'obecny', 'obecny', 'nieobecny', 19),
(20, 1, 2, 3, 'obecny', 'obecny', 'nieobecny', 20),
(21, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 21),
(22, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 22),
(23, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 23),
(24, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 24),
(25, 1, 2, 3, 'pomoc', 'obecny', 'obecny', 25),
(26, 1, 2, 3, 'obecny', 'obecny', 'nieobecny', 26),
(27, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 27),
(28, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 28),
(29, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 29),
(30, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 30),
(31, 1, 2, 3, 'pomoc', 'nieobecny', 'obecny', 31);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'piwo'),
(2, 'napoje'),
(3, 'wodka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kreska`
--

CREATE TABLE `kreska` (
  `id` int NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dlug` decimal(10,2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kreska`
--

INSERT INTO `kreska` (`id`, `nazwa`, `dlug`, `data`) VALUES
(28, 'gazetka', 6.00, '2024-05-11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `log`
--

CREATE TABLE `log` (
  `id` int NOT NULL,
  `data_czas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opis` text COLLATE utf8mb4_general_ci,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `data_czas`, `opis`, `username`, `password`, `name`) VALUES
(1, '2024-04-23 21:47:36', NULL, 'a', 'a', 'a'),
(2, '2024-04-25 21:31:44', NULL, 'kornelia', '1710', 'kornelcia'),
(3, '2024-04-25 21:32:50', NULL, 'ola', 'pub2137', 'Ola'),
(4, '2024-04-25 21:34:35', NULL, 'wojtas79', 'pub79', 'Wojtek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `napoje`
--

CREATE TABLE `napoje` (
  `id` int NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ilosc` int NOT NULL,
  `cena_bar` decimal(10,2) NOT NULL,
  `cena_det` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `napoje`
--

INSERT INTO `napoje` (`id`, `nazwa`, `ilosc`, `cena_bar`, `cena_det`) VALUES
(1, 'Pepsi', 46, 5.50, 2.00),
(2, 'Kinley', 0, 6.50, 2.00),
(3, 'woda kryniczka', 58, 0.00, 0.00),
(4, 'cola', 0, 7.00, 4.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `piwo`
--

CREATE TABLE `piwo` (
  `id` int NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ilosc` int NOT NULL,
  `cena_bar` decimal(10,2) NOT NULL,
  `cena_det` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `piwo`
--

INSERT INTO `piwo` (`id`, `nazwa`, `ilosc`, `cena_bar`, `cena_det`) VALUES
(1, 'Tatra', 3, 9.00, 2.50),
(2, 'Warka strong', 12, 11.00, 4.00),
(3, 'Perła', 31, 10.00, 2.99),
(4, 'Żywiec', 47, 11.00, 2.50),
(5, 'Warka radler cyt', 4, 9.50, 2.50),
(6, 'Zatecky 0.0', 0, 10.00, 4.00),
(7, 'Warka radler GP', 17, 10.00, 4.00),
(8, 'Heineken', 12, 11.00, 3.29),
(9, 'lomza miod', 18, 11.00, 3.99),
(10, 'pilsner', 0, 17.00, 9.99),
(11, 'kozel', 0, 11.00, 4.50),
(12, 'kozel biel', 2, 11.00, 4.50),
(13, 'Tyskie', 96, 10.00, 4.00),
(14, 'Zatecky', 18, 11.00, 3.99),
(15, 'Żywiec biel', 7, 12.00, 4.00),
(16, 'Książęce pszen', 0, 12.00, 4.00),
(17, 'książęce pszen 0.0', 1, 10.00, 4.00),
(18, 'Żywiec biel 0.0', 0, 11.00, 3.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id` int NOT NULL,
  `imie` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `imie`) VALUES
(1, 'Kamil'),
(2, 'Kornelia'),
(3, 'Ola');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wodka`
--

CREATE TABLE `wodka` (
  `id` int NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ilosc` int NOT NULL,
  `cena_bar` decimal(10,2) NOT NULL,
  `cena_det` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wodka`
--

INSERT INTO `wodka` (`id`, `nazwa`, `ilosc`, `cena_bar`, `cena_det`) VALUES
(1, 'holba', 12, 8.00, 6.00),
(2, 'soplica pigwa', 1, 8.00, 6.00),
(3, 'stock', 0, 8.00, 6.00),
(4, 'zubrowka', 1, 0.00, 0.00),
(5, 'zubrowka bg', 1, 0.00, 0.00),
(6, 'golden rum', 2, 0.00, 0.00),
(7, 'lubuski gin', 1, 0.00, 0.00),
(8, 'lubelska cytr', 1, 0.00, 0.00);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kalendarz_pracowniczy`
--
ALTER TABLE `kalendarz_pracowniczy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kreska`
--
ALTER TABLE `kreska`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `napoje`
--
ALTER TABLE `napoje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `piwo`
--
ALTER TABLE `piwo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wodka`
--
ALTER TABLE `wodka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalendarz_pracowniczy`
--
ALTER TABLE `kalendarz_pracowniczy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kreska`
--
ALTER TABLE `kreska`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `napoje`
--
ALTER TABLE `napoje`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `piwo`
--
ALTER TABLE `piwo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wodka`
--
ALTER TABLE `wodka`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
