-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 89.46.111.162:3306
-- Creato il: Lug 28, 2022 alle 21:47
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
-- Struttura della tabella `clients`
--


--
-- Dump dei dati per la tabella `clients`
--

INSERT INTO `clients` (`id`, `name`, `voucher`, `scadenza`, `created_at`, `updated_at`) VALUES
(1, 'Bacci Claudio', -9180.00, NULL, '2021-01-02 17:52:37', '2022-07-22 08:02:23'),
(2, 'Ballestri Giulia', -4724.00, NULL, '2021-01-02 17:53:41', '2022-07-25 12:05:39'),
(3, 'Bazzini Tommaso', -6576.00, NULL, '2021-01-02 17:53:56', '2022-07-22 08:02:23'),
(4, 'Bettini Giulia', -6330.00, NULL, '2021-01-02 17:54:16', '2022-07-26 10:08:37'),
(5, 'Boschi Andrea', 0.00, NULL, '2021-01-02 17:54:28', '2021-01-02 18:00:41'),
(6, 'Butini Orazio', -2880.00, NULL, '2021-01-02 17:54:38', '2022-07-04 18:08:30'),
(7, 'Casalsoli Erika', -1565.00, NULL, '2021-01-02 17:54:53', '2022-07-08 05:33:36'),
(8, 'Chiarabini Riccardo', -1404.00, NULL, '2021-01-02 17:55:28', '2022-07-08 05:33:36'),
(9, 'Chierchia Fabio', -8208.00, NULL, '2021-01-02 17:55:39', '2022-07-19 06:18:17'),
(10, 'Chini Ariano', -640.00, NULL, '2021-01-02 17:55:48', '2022-03-01 14:02:27'),
(11, 'Ciapoi Rosa', 0.00, NULL, '2021-01-02 17:55:56', '2021-01-02 17:59:48'),
(12, 'Cocci Lorenzo', -2296.00, NULL, '2021-01-02 17:56:14', '2022-07-04 17:37:36'),
(13, 'Corsi Asia', -3313.00, NULL, '2021-01-02 17:56:41', '2022-07-06 13:02:40'),
(14, 'Crini Giovanna', -4645.00, NULL, '2021-01-02 17:56:52', '2022-07-08 05:33:36'),
(15, 'Del Piano David', -1852.00, NULL, '2021-01-02 17:57:40', '2022-07-04 17:47:10'),
(16, 'Delogu Alberto', -3232.00, NULL, '2021-01-02 17:57:47', '2022-07-05 12:20:31'),
(17, 'Diana Andrea', -2581.00, NULL, '2021-01-02 17:58:11', '2022-07-11 12:55:08'),
(18, 'Dotti Letizia', 420.00, NULL, '2021-01-02 17:58:47', '2022-06-09 11:00:52'),
(19, 'Esposito Sonny', -4949.00, NULL, '2021-01-02 17:59:19', '2022-07-11 11:02:57'),
(20, 'Fabbrini Laura', -4032.00, NULL, '2021-01-02 18:01:28', '2022-07-08 05:33:36'),
(21, 'Farina Raffaella', 0.00, NULL, '2021-01-02 18:01:36', '2021-01-02 18:01:36'),
(22, 'Fedele Michela', -6159.00, NULL, '2021-01-02 18:02:05', '2022-07-06 08:47:54'),
(23, 'Forzoni Luca', -5432.00, NULL, '2021-01-02 18:02:17', '2022-07-12 12:06:26'),
(24, 'Frederic', -480.00, NULL, NULL, '2022-05-24 06:07:10'),
(25, 'Gaggiani Filippo', -4928.00, NULL, '2021-01-02 18:02:55', '2022-07-14 11:09:33'),
(26, 'Genovese Samuel', -6456.00, NULL, '2021-01-02 18:03:02', '2022-07-12 07:23:57'),
(27, 'Liccardo Antonio', -220.00, NULL, '2021-01-02 18:03:22', '2022-07-04 12:03:58'),
(28, 'Liccardo Raffaele', -2001.00, NULL, '2021-01-02 18:03:38', '2022-07-06 13:02:40'),
(29, 'Londretti Silvia', -10360.00, NULL, '2021-01-02 18:03:48', '2022-07-08 12:00:36'),
(30, 'Lucaccini Alessandra', -6217.00, NULL, '2021-01-02 18:04:15', '2022-07-12 07:23:57'),
(31, 'Masini Marco', -3145.00, NULL, '2021-01-02 18:04:37', '2022-07-08 05:33:36'),
(32, 'Matassoni Romina', -5337.00, NULL, '2021-01-02 18:04:52', '2022-07-26 08:18:28'),
(33, 'Menicalli Maurizio', -8760.00, NULL, '2021-01-02 18:05:01', '2022-07-08 12:00:36'),
(34, 'Noferi Francesca', -6284.00, NULL, '2021-01-02 18:05:18', '2022-07-22 07:18:59'),
(35, 'Ottavi Tina', -1920.00, NULL, '2021-01-02 18:05:26', '2022-07-04 18:09:05'),
(36, 'Pasquini Simone', -5176.00, NULL, '2021-01-02 18:05:35', '2022-07-25 12:05:39'),
(37, 'Pianigiani Francesco', -3400.00, NULL, '2021-01-02 18:05:43', '2022-07-01 06:26:33'),
(38, 'Picco Lara', -7384.00, NULL, '2021-01-02 18:05:49', '2022-07-25 12:05:39'),
(39, 'Rapaccini Diletta', 960.00, NULL, '2021-01-02 18:06:09', '2021-06-11 05:55:12'),
(40, 'Rocchi Annalisa', -920.00, NULL, '2021-01-02 18:06:16', '2022-07-04 18:08:30'),
(41, 'Rossi Edoardo', -4100.00, NULL, '2021-01-02 18:06:45', '2022-07-04 17:47:10'),
(42, 'Rossi Marco', -2232.00, NULL, '2021-01-02 18:06:50', '2022-06-09 11:00:52'),
(43, 'Sacchetti Claudio', -4380.00, NULL, '2021-01-02 18:07:22', '2022-07-06 08:43:19'),
(44, 'Sacconi Filippo', -3912.00, NULL, NULL, '2022-05-24 06:07:30'),
(45, 'Senesi Alessio', -1520.00, NULL, '2021-01-02 18:07:38', '2022-07-26 12:05:29'),
(46, 'Sensini Marco', -6152.00, NULL, '2021-01-02 18:07:46', '2022-07-11 09:24:10'),
(47, 'Sottile Carmelo', -5096.00, NULL, '2021-01-02 18:08:05', '2022-07-06 08:43:19'),
(48, 'Spadafora Valentina', -3120.00, NULL, '2021-01-02 18:08:15', '2022-07-08 05:33:36'),
(49, 'Sponza Lucrezia', -1312.00, NULL, '2021-01-02 18:08:21', '2022-04-05 12:37:09'),
(50, 'Wunsche Gregor', -3560.00, NULL, '2021-01-02 18:08:30', '2022-07-18 12:03:22'),
(51, 'Milani Massimo', 0.00, NULL, '2021-01-02 18:15:55', '2021-01-02 18:15:55'),
(52, 'Palei Alessandro', -515.00, NULL, '2021-01-20 08:20:30', '2022-07-06 08:56:11'),
(53, 'Tazzari Isabella', 790.00, NULL, '2021-01-20 08:20:49', '2021-06-10 04:36:50'),
(54, 'Cantini Mery', -1815.00, NULL, '2021-01-20 08:21:05', '2022-07-06 13:02:40'),
(55, 'Benucci Francesco', 610.00, NULL, '2021-01-20 08:21:22', '2021-06-17 11:17:18'),
(56, 'Diego Minghi', -2108.00, NULL, '2021-04-30 10:21:11', '2022-07-04 17:47:10'),
(57, 'Alex Maria Borreani', -40.00, NULL, '2021-05-24 07:56:45', '2021-08-26 11:56:03'),
(58, 'Zazzeri Mirella', -378.00, NULL, NULL, '2022-05-24 06:07:41'),
(59, 'Elisa Vannucci', -378.00, NULL, NULL, '2022-05-24 06:07:05'),
(60, 'Valentini Simone', -336.00, NULL, NULL, '2022-05-24 06:07:38'),
(61, 'Verdi Davide', -3320.00, NULL, '2021-07-12 08:39:25', '2022-06-24 07:38:30'),
(62, 'Andreoni Cosimo', -1675.00, NULL, '2021-07-12 08:39:40', '2022-07-25 15:40:06'),
(63, 'Robert Buskha', -960.00, NULL, '2021-09-08 09:25:36', '2022-07-05 12:21:15'),
(64, 'Colletti Daniele', -1838.00, NULL, '2021-11-02 11:07:02', '2022-07-04 17:47:10'),
(65, 'Bianconi Daniele', -2220.00, NULL, '2022-01-19 15:06:32', '2022-07-26 08:39:35'),
(66, 'Lombardi Aurora', -280.00, NULL, '2022-03-01 12:52:07', '2022-05-11 13:09:06'),
(67, 'Sing Kuljit', 1010.00, NULL, '2022-03-04 14:15:33', '2022-04-30 14:34:34'),
(68, 'Castigliani Cristian', 0.00, NULL, NULL, '2022-05-24 06:06:40'),
(69, 'Alessio Grossi', -320.00, NULL, '2022-04-05 11:56:58', '2022-07-04 18:08:30');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `clients`
--


--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `clients`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
