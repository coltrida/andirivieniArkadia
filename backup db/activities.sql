-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 89.46.111.162:3306
-- Creato il: Lug 28, 2022 alle 22:07
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
-- Struttura della tabella `activities`
--


--
-- Dump dei dati per la tabella `activities`
--

INSERT INTO `activities` (`id`, `name`, `tipo`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'Cucina 1 volta', 'mensile', 96.00, '2021-01-02 17:47:30', '2021-01-02 17:47:30'),
(2, 'Durante noi', 'mensile', 0.00, '2021-01-02 17:47:42', '2021-01-02 17:47:42'),
(3, 'Molino', 'mensile', 160.00, '2021-01-02 17:48:27', '2021-01-02 17:48:27'),
(4, 'Cucina 2 volte', 'mensile', 192.00, '2021-01-02 17:48:36', '2021-01-02 17:48:36'),
(5, 'Musica', 'mensile', 80.00, '2021-01-02 17:49:35', '2021-01-02 17:49:35'),
(6, 'Piscina', 'mensile', 80.00, '2021-01-02 17:50:14', '2021-01-02 17:50:14'),
(7, 'Teatro', 'mensile', 80.00, '2021-01-02 17:50:39', '2021-01-02 17:50:39'),
(8, 'Lab Foto', 'mensile', 64.00, '2021-01-02 17:50:51', '2021-01-02 17:50:51'),
(9, 'Bocce', 'mensile', 80.00, '2021-01-02 17:51:13', '2021-01-02 17:51:13'),
(10, 'Individuale', 'orario', 20.00, '2021-01-02 17:51:30', '2021-01-02 17:51:30'),
(11, 'Yoga', 'mensile', 80.00, '2021-01-02 17:52:01', '2021-01-02 17:52:01'),
(12, 'Bocce1', 'mensile', 80.00, '2021-01-02 18:13:10', '2021-01-02 18:13:10'),
(13, 'yoga1', 'mensile', 80.00, '2021-01-02 18:22:42', '2021-01-02 18:22:42'),
(14, 'Musica 1', 'mensile', 80.00, '2021-01-02 18:26:54', '2021-01-02 18:26:54'),
(15, 'Socializzazione', 'mensile', 80.00, '2021-01-02 18:33:54', '2021-01-02 18:33:54'),
(16, 'GSC individuale', 'orario', 45.00, '2021-01-14 11:37:54', '2021-01-14 11:37:54'),
(17, 'GSC gruppo', 'orario', 20.00, '2021-01-14 11:38:08', '2021-01-14 11:38:08'),
(18, 'Ferie', 'mensile', 0.00, '2021-01-23 10:01:00', '2021-01-23 10:01:00'),
(19, 'Programmazione', 'mensile', 0.00, '2021-03-17 10:33:48', '2021-03-17 10:33:48'),
(21, 'Paterna', 'orario', 14.00, '2021-06-08 10:15:42', '2021-06-08 10:15:42'),
(22, 'Vacanze estive', 'mensile', 300.00, '2021-06-18 10:11:25', '2021-06-18 10:11:25'),
(23, 'Escursione', 'orario', 32.00, '2021-07-23 09:01:44', '2021-07-23 09:01:44'),
(24, 'Individuale durante noi', 'orario', 0.00, '2022-03-01 12:51:39', '2022-03-01 12:51:39');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `activities`
--

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `activities`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
