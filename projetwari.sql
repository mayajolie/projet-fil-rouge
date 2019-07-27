-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2019 at 12:54 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_wari`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte_bancaire`
--

CREATE TABLE `compte_bancaire` (
  `id` int(11) NOT NULL,
  `numero_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` double NOT NULL,
  `date_depot` datetime NOT NULL,
  `partenaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190723164804', '2019-07-23 16:48:27'),
('20190724104832', '2019-07-24 10:49:17'),
('20190726094911', '2019-07-26 09:49:32'),
('20190726102951', '2019-07-26 10:30:05'),
('20190726105917', '2019-07-26 10:59:28'),
('20190726144519', '2019-07-26 14:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `raison_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ninea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partenaires`
--

INSERT INTO `partenaires` (`id`, `raison_social`, `ninea`, `adresse`, `telephone`, `etat`) VALUES
(1, 'sonatel', 'sona1235874587', 'mermoz', 338645897, 'debloquer'),
(2, 'tigo', 'tigo1235874587', 'sacre-coeur', 338645897, 'debloquer'),
(3, 'wariMbaye', 'tigo1235874587', 'sacre-coeur', 338645897, 'bloquer'),
(4, 'bambamultiservice', 'bamba1235874587', 'Nord-Foire', 338645897, 'bloquer'),
(5, 'gayeService', 'gaye1235874587', 'Ouest-Foire', 338645897, 'bloquer'),
(6, 'JolieService', 'jolie1235874587', 'Ouest-Foire', 338685897, 'bloquer'),
(7, 'JolieService', 'jolie1235874587', 'Ouest-Foire', 338685897, 'debloquer'),
(8, 'JolieService', 'jolie1235874587', 'Ouest-Foire', 338685897, 'debloquer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `nom`, `prenom`, `telephone`, `adresse`, `email`, `etat`) VALUES
(1, 'superadmin', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=6,p=1$za0u2r3L5YyKIezTAfwszA$kR265iDTEJ14BsR5kE+G/lrtbzWU+sm5Bo63SASSXrk', '', '', 0, '', NULL, ''),
(2, 'adminsystem', '[\"superadmin\"]', '$argon2id$v=19$m=65536,t=6,p=1$BCGQcBwslHY7rV8azTzvig$d8N5zRHycd54mFJOIBrEILb5LGdWy04lfuLEJbPoQEA', '', '', 0, '', NULL, ''),
(5, 'adminpart', '[\"superadmin\"]', '$argon2id$v=19$m=65536,t=6,p=1$vE+u+Hz2f/4gnMP4v6ixaw$Fu24aXYbG0m1TjrFzqiwxK6FDrSRqCxuJIze+WCDlVk', '', '', 0, '', NULL, ''),
(6, 'admi', '[\"user\"]', '$argon2id$v=19$m=65536,t=6,p=1$0NYJplMLZ1x1ftdywasgvg$K0DAj0ftsm+BvH2206WNu3I7Z3846PSMYtRH1IMGLWA', '', '', 0, '', NULL, ''),
(7, 'admi45', '[\"user\"]', '$argon2id$v=19$m=65536,t=6,p=1$I5U6K1o4fe+YRIL+WYpy8A$UVhdxmPRtvB0brOdUqujwC6EXBP4JkZPaEaheA+SWu0', '', '', 0, '', NULL, ''),
(9, 'mbacke', '[\"user\"]', '$argon2id$v=19$m=65536,t=6,p=1$aqcmcA7E3hhAxlJjPho98w$iLMCSACYdWrTYNbmm140wZoYTRU3M+wY/i/pbpLNPWY', '', '', 0, '', NULL, ''),
(10, 'lena', '[\"user,superadmin,adminp\"]', '$argon2id$v=19$m=65536,t=6,p=1$jo3SkUA3Jz4Loc5fF+R7/w$PaObUbYQH5rQehI/tbtNkhQMvOYU0j+TlXIZzuWJuYo', '', '', 0, '', NULL, ''),
(11, 'maya', '[\"user,superadmin,adminp\"]', '$argon2id$v=19$m=65536,t=6,p=1$zRGRLLdPMv/Zb1daoHbjng$BISTat6J59rON3PPh1e282loXRhMWdb+/KslPRsQ33s', '', '', 0, '', NULL, ''),
(12, 'juniorlaye', '[\"user,superadmin,adminp\"]', '$argon2id$v=19$m=65536,t=6,p=1$iKm72g6rJTPTwbVe5iJN3g$XYUHkjdPEL0Srs6//I1D1qnp4Cw5AGgyIfZ5WHruvjA', '', '', 0, '', NULL, ''),
(13, 'cheikh', '[\"user,superadmin,adminp\"]', '$argon2id$v=19$m=65536,t=6,p=1$vzWz7TqIMFxhspgZZ2drJg$KYaaXUdRzwpLKvpOeDi04hnQI2WbRisxzEP1pMFzZaA', '', '', 0, '', NULL, ''),
(16, 'jolie', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=6,p=1$93JnDLi6kBfxuwjzdaM9lw$CfzA7E8PdGAGN8nCtZWmOlJ8wwyPxPpSneEhW2UWFXQ', '', '', 0, '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_50BC21DE98DE13AC` (`partenaire_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `compte_bancaire`
--
ALTER TABLE `compte_bancaire`
  ADD CONSTRAINT `FK_50BC21DE98DE13AC` FOREIGN KEY (`partenaire_id`) REFERENCES `partenaires` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
