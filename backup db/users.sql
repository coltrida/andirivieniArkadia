-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 89.46.111.162:3306
-- Creato il: Lug 28, 2022 alle 21:02
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
-- Struttura della tabella `users`
--

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `oresettimanali`, `oresaldo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Barbara Coltrioli', '1', 'barbara.coltrioli@arkadiaonlus.it', NULL, 38.00, 1114.50, '$2y$10$wPx5mRKDJ2N8dkK.nQo7WuRfiYiHcPNwLA3ACkIyQVVmMvFAr8JAu', 'phl4IEKfDd1Dm8n4hUGazBnyQAqww4JVLXKQuGMVVuBTMdj7PqOzG5FwqYxn', '2021-01-02 15:59:21', '2022-07-24 22:14:45'),
(2, 'Manuela', NULL, 'manuela.tofanelli@arkadiaonlus.it', NULL, 6.00, -815.50, '$2y$10$.sAoaMkBLMWAHTDU6.//R.hylvsMPZhL2DtAM3QOa3UBqzpRS2kuy', 'ald25vdiOq9V4WZDJfu5FjpW0d1cFdCNsNrYnh22q55xQ2QQ0op9mD2ksbI9', '2021-01-10 16:40:30', '2022-07-24 22:14:45'),
(3, 'Jacopo Bonciani', NULL, 'jacopo.bonciani@arkadiaonlus.it', NULL, 12.00, -587.00, '$2y$10$Q6RI2pNL0VYl9iKH/ULxje4ManuMFobTmj6KxYlGsaw1s5Aw5wQ8q', 'Y4NCsQ97XpB6OfORtTCYDcuNS7ThKFMyj4z3SInlifZQE7x4CBJNbZZVrJF5', '2021-01-11 08:31:22', '2022-07-26 08:39:49'),
(4, 'Enrico Zappalorti', NULL, 'enrico.zappalorti@arkadiaonlus.it', NULL, 23.00, -1051.00, '$2y$10$IdOKFB6.aZhs52EA0IWJiuID3xD4xA9x0HVR2A2uWLXJzuFZpk77q', 'IUNYv7jmoMCQLsZ24JRidT7ANCihTvkNHPPd5sbx3IhZ394f6RgyxhpZq1qP', '2021-01-11 08:31:38', '2022-07-27 08:03:01'),
(5, 'Daniele Lapi', NULL, 'daniele.lapi@arkadiaonlus.it', NULL, 38.00, 1140.00, '$2y$10$exawqEcKL4JuJalwaBxRmuU940BALMKHHKBwTd.rvzm5D9kgZzh/G', '8PFczDZkh90ugphAOyZqhMJnoIrfZMJ08Adi9VyEurypQjj1ymEahoLGs0MF', '2021-01-11 08:55:09', '2022-07-24 22:14:45'),
(6, 'Costantino Mugnai', NULL, 'Costantino.mugnai@arkadiaonlus.it', NULL, 20.00, -150.00, '$2y$10$nTEiZMx7b0qza3CFbO7Jg.dROUxLEXqXgUHaKe4r0cBtNQqwftbCm', 'VdOpu4Gshpv7RSx2FOQtpar0Vm951x4JGVKnMYa0xObWQ7QHBX7hVzNbqbOH', '2021-01-11 08:58:08', '2022-07-24 22:14:45'),
(8, 'StefanoP', NULL, 'Stefpini04@gmail.com', NULL, NULL, 0.00, '$2y$10$i36OoA9f3pHKrk4.Qql53e170cLuJRYi3QrkDZpv74g2GJdALBc82', NULL, '2021-01-14 11:36:51', '2021-01-26 18:19:26'),
(12, 'luca', NULL, 'lucagra13@libero.it', NULL, NULL, 0.00, '$2y$10$YlPlkgkWTdPG5oJqU1Bb9.IDjyUICsVuALxq3nL0W5bf2vbj096VK', NULL, '2021-03-22 16:45:50', '2021-03-28 15:27:41'),
(13, 'Martina', NULL, 'm.cioncolini@gmail.com', NULL, NULL, 0.00, '$2y$10$1w2B7mldEqKXPU.jrVZgquvTrbo12cZkymYNAFPEpgB5JLEetRbDW', NULL, '2021-03-22 16:49:23', '2021-03-28 15:27:41'),
(18, 'Linda mugnai', NULL, '99linda.mugnai@gmail.com', NULL, 12.00, -581.50, '$2y$10$aTNuGFDXOjKKZbXJXa/kjeth.6d/Na3ad2VLjfzFO9gK8wC1KKFhq', 'ETHEGBZRoBL2VeJppvERUdZ32wFwsq1nJmSeBFUxrq4e1WCOc07ZOier9uka', '2021-06-08 08:52:40', '2022-07-27 12:15:06'),
(23, 'Giada Biliotti', NULL, 'giada.biliotti@gmail.com', NULL, 12.00, -392.50, '$2y$10$/2rVvJoWpSI0fcG7zfm4nODQ88vE8J8I4dUE1tI3sUxx.loUtV.hS', 'yWRQpOuTRLKEhstY92LYE99Qkf2o6OqsbopuK1JwfU97nbRLlyV8hF7MIwcA', '2021-10-01 11:03:11', '2022-07-27 07:23:54'),
(30, 'Debora Parisi', NULL, 'debora.parisi@arkadiaonlus.it', NULL, 12.00, -229.00, '$2y$10$QkwPOqAe6wjrbmxr4GxQWu6LMYn4q81CyEDK4/Y3vPqsyqoZ9TR.6', 'sVKbMwtVC3oAaG3lSeQ0BvGPM948UszUhNZ53ecPJepdSXvNzpilOiglVOvN', '2022-01-14 10:49:47', '2022-07-26 14:40:55'),
(31, 'Matteo Bartoli', NULL, 'matteo.bartoli@student.unisi.it', NULL, NULL, -124.50, '$2y$10$Psr93Xs.AjFg.MUJZpVhFe3et03JDsFfjKVNRavP3Ql3uikEE0IgW', NULL, '2022-04-05 13:11:00', '2022-07-27 14:04:52'),
(32, 'Matteo Butini', NULL, 'butinimatteo@gmail.com', NULL, NULL, -129.00, '$2y$10$Dwdkuuz1guwlomar6JLDSe2EWUrDv5TcEjEaKb2QfFHJIN5Rvcx/i', 'lBzl1BNJVoggC5s6t2CXy0mUAuAR4AhDCYipd3RoQVLx1BoyYyb4HYafWtuX', '2022-04-26 12:07:05', '2022-07-22 07:15:39'),
(33, 'Stefano Pini', NULL, 'stefpini@linero.it', NULL, NULL, NULL, '$2y$10$GiiNFTwRfJYUCYk4vw0mSecCe20ArEU0t4nTL6l4wiYDF2L9ewUWS', NULL, '2022-07-06 08:19:01', '2022-07-06 08:19:01');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `users`
--


--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
