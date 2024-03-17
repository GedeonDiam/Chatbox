-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 16 mars 2024 à 22:01
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--
CREATE database chatbox;
use chatbox;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `idm` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`idm`, `pseudo`, `date`, `message`) VALUES
(45, 'hamid', '2024-01-29 12:01:44', 'je me tue'),
(46, 'Fares ', '2024-01-29 12:02:40', 'Non pas besoin '),
(47, 'siphax ', '2024-01-29 12:02:53', 'on fait le groupe'),
(48, 'aymen', '2024-01-29 12:03:07', 'je me demande aussi'),
(49, 'prof', '2024-01-29 12:03:15', 'allez-y'),
(59, 'davis', '2024-01-29 13:05:59', 'je suis heureux'),
(60, 'syphax ', '2024-01-29 13:06:45', 'non'),
(61, 'Iris', '2024-01-29 13:07:56', 'Putain sa mere '),
(62, 'Benjamen', '2024-01-29 13:15:23', 'okay'),
(63, 'Benjamen', '2024-01-29 13:15:32', 'j\'ai faim'),
(64, 'farse', '2024-01-29 13:19:16', 'hhhhh'),
(65, 'aurel', '2024-01-29 13:23:05', 'j\'ai soif'),
(66, 'vvv', '2024-01-29 13:28:43', 'vvv'),
(67, 'ffffffffffff', '2024-01-29 13:32:16', 'f\'ares'),
(68, 'syphax', '2024-01-29 13:34:42', 'tu es  un bon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
