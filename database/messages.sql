-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 30, 2018 alle 11:38
-- Versione del server: 10.1.31-MariaDB
-- Versione PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corman`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_from` int(10) NOT NULL,
  `user_to` int(10) NOT NULL,
  `msg` text CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `user_to`, `msg`, `date`, `status`, `attachment`) VALUES
(423, 1, 2, 'Ciao', '2018-04-24 11:34:14', 1, NULL),
(424, 1, 2, 'Roger', '2018-04-24 11:34:18', 1, NULL),
(427, 1, 3, 'Ciao David', '2018-04-24 11:38:37', 1, NULL),
(428, 1, 4, 'Ciao Richard', '2018-04-24 11:38:46', 1, NULL),
(429, 1, 4, 'Ciao Richard, domani pomeriggio sei disponibile per un aperitivo', '2018-04-26 08:00:41', 1, NULL),
(448, 4, 1, 'ciao Paolo', '2018-04-27 14:27:30', 1, NULL),
(459, 4, 1, 'Paolo, non credo di esserci', '2018-04-30 08:53:18', 0, NULL),
(460, 4, 1, 'Chiamami', '2018-04-30 08:53:32', 0, NULL),
(461, 4, 3, 'Ciao David', '2018-04-30 08:53:41', 0, NULL),
(462, 1, 2, '', '2018-04-30 08:56:59', 0, 'prova_allegato.txt'),
(463, 1, 3, '', '2018-04-30 09:02:41', 0, 'prova_allegato.txt');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
