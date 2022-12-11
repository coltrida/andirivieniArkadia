-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 89.46.111.162:3306
-- Creato il: Lug 28, 2022 alle 21:49
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
-- Struttura della tabella `cars`
--

--
-- Dump dei dati per la tabella `cars`
--

INSERT INTO `cars` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pulmino', '2021-01-02 17:43:21', '2021-01-02 17:43:21'),
(2, 'Doblo crema', '2021-01-02 17:43:31', '2021-01-02 17:43:31'),
(3, 'Doblo rosso', '2021-01-02 17:43:38', '2021-01-02 17:43:38'),
(4, 'Coltrioli', '2021-01-02 17:43:45', '2021-01-02 17:43:45'),
(5, 'Zappalorti', '2021-01-02 17:43:54', '2021-01-02 17:43:54'),
(6, 'Bonciani', '2021-01-02 17:44:06', '2021-01-02 17:44:06'),
(7, 'Tofanelli', '2021-01-02 17:44:12', '2021-01-02 17:44:12'),
(8, 'Lapi', '2021-01-02 17:44:17', '2021-01-02 17:44:17'),
(9, 'Mugnai', '2021-01-02 17:44:23', '2021-01-02 17:44:23'),
(10, 'Biliotti', '2021-10-01 11:07:46', '2021-10-01 11:07:46'),
(11, 'Parisi', '2022-02-01 14:10:02', '2022-02-01 14:10:02'),
(12, 'Bartoli', '2022-04-05 13:11:27', '2022-04-05 13:11:27'),
(13, 'Butini', '2022-04-26 12:07:20', '2022-04-26 12:07:20');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cars`
--


--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cars`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
