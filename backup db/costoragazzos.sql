-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 89.46.111.162:3306
-- Creato il: Lug 28, 2022 alle 21:45
-- Versione del server: 5.7.32-35-log
-- Versione PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Sql1398890_3`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `costoragazzos`
--


--
-- Dump dei dati per la tabella `costoragazzos`
--

INSERT INTO `costoragazzos` (`id`, `client_id`, `mese`, `anno`, `contributo`, `totale`, `saldo`, `created_at`, `updated_at`) VALUES
(2, 2, 7, 2021, 80, 556, 476, '2021-08-16 08:59:18', '2021-08-16 06:59:18'),
(3, 2, 8, 2021, 80, 256, 176, '2021-08-16 09:08:46', '2021-08-16 07:08:46'),
(4, 6, 6, 2021, 80, 160, 80, '2021-09-27 12:46:52', '2021-09-27 12:46:52');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `costoragazzos`
--


--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `costoragazzos`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
