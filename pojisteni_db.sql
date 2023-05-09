-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 09. kvě 2023, 09:29
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pojisteni_db`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `klient`
--

CREATE TABLE `klient` (
  `klient_id` int(11) NOT NULL,
  `jmeno` varchar(31) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(31) COLLATE utf8_czech_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `datum_narozeni` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `klient`
--

INSERT INTO `klient` (`klient_id`, `jmeno`, `prijmeni`, `telefon`, `datum_narozeni`) VALUES
(26, 'Adam', 'Adamovič', '777 888 999', '1985-12-12'),
(27, 'Bořivoj', 'Bujarý', '777 111 222', '1988-05-13'),
(28, 'Cecil', 'Cumlal', '777 888 555', '1977-01-11'),
(29, 'David', 'Dudek', '777 444 111', '1990-05-23');

-- --------------------------------------------------------

--
-- Struktura tabulky `sluzba`
--

CREATE TABLE `sluzba` (
  `sluzba_id` int(11) NOT NULL,
  `znacka` varchar(15) COLLATE utf8_czech_ci NOT NULL,
  `popis` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `kod` varchar(7) COLLATE utf8_czech_ci NOT NULL,
  `klient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `sluzba`
--

INSERT INTO `sluzba` (`sluzba_id`, `znacka`, `popis`, `kod`, `klient_id`) VALUES
(10, 'Pojištění proti', 'Utopení', 'Glo', NULL),
(12, 'Pojištění proti', 'Nenecháme nikoho potopit', 'Glo2', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`klient_id`);

--
-- Indexy pro tabulku `sluzba`
--
ALTER TABLE `sluzba`
  ADD PRIMARY KEY (`sluzba_id`),
  ADD KEY `klient_id` (`klient_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `klient`
--
ALTER TABLE `klient`
  MODIFY `klient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pro tabulku `sluzba`
--
ALTER TABLE `sluzba`
  MODIFY `sluzba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `sluzba`
--
ALTER TABLE `sluzba`
  ADD CONSTRAINT `sluzba_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`klient_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
