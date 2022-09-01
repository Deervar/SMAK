-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Czas generowania: 04 Gru 2018, 18:42
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `smak`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `login` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `liczba_postaci` int(11) NOT NULL,
  `nazwa_postaci1` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwa_postaci2` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwa_postaci3` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwa_postaci4` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwa_postaci5` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `postacie`
--

CREATE TABLE `postacie` (
  `nazwa_postaci` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `klasa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `level` text COLLATE utf8mb4_polish_ci NOT NULL,
  `intelekt` int(11) NOT NULL,
  `sila` int(11) NOT NULL,
  `wytrzymalosc` int(11) NOT NULL,
  `zrecznosc` int(11) NOT NULL,
  `charyzma` int(11) NOT NULL,
  `wiara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`login`);

--
-- Indeksy dla tabeli `postacie`
--
ALTER TABLE `postacie`
  ADD PRIMARY KEY (`nazwa_postaci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
