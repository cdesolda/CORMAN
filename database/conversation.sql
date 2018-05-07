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
-- Struttura della tabella `conversation`
--

CREATE TABLE `conversation` (
  `id` int(10) NOT NULL,
  `user_one` int(10) NOT NULL,
  `user_two` int(10) NOT NULL,
  `last_messages` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`, `last_messages`) VALUES
(467, 4, 1, '2018-04-30 08:53:32'),
(468, 1, 4, '2018-04-30 08:53:32'),
(469, 4, 3, '2018-04-30 08:53:41'),
(470, 3, 4, '2018-04-30 08:53:41'),
(471, 1, 2, '2018-04-30 08:56:59'),
(472, 2, 1, '2018-04-30 08:56:59'),
(473, 1, 3, '2018-04-30 09:02:41'),
(474, 3, 1, '2018-04-30 09:02:41');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_one` (`user_one`,`user_two`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
