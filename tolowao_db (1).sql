-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 21 mars 2021 à 11:27
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tolowao_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `channel_id` varchar(18) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `date_reg` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE IF NOT EXISTS `channel` (
  `channel_id` varchar(18) NOT NULL,
  `nom_channel` text NOT NULL,
  `desc_channel` varchar(200) NOT NULL,
  `date_reg` datetime NOT NULL,
  `user_reg` varchar(15) NOT NULL,
  `nb_followers` int(7) NOT NULL,
  `channel_statut` int(1) NOT NULL,
  `password` varchar(12) NOT NULL,
  `pseudo` int(12) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `channel`
--

INSERT INTO `channel` (`channel_id`, `nom_channel`, `desc_channel`, `date_reg`, `user_reg`, `nb_followers`, `channel_statut`, `password`, `pseudo`, `photo`) VALUES
('20200312', 'seye', 'ssss', '2021-03-12 21:01:59', '2325678', 1, 1, 'gtrgtt', 245, 'yyhny');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(24) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `date_reg` datetime NOT NULL,
  `u_id` varchar(12) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `video_id` (`video_id`),
  KEY `video_id_2` (`video_id`),
  KEY `u_id` (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`comment_id`, `video_id`, `libelle`, `date_reg`, `u_id`) VALUES
(16, '324354rere', '', '2021-03-20 01:37:35', '122341'),
(15, '324354rere', '', '2021-03-20 01:37:16', '122341'),
(14, '324354rere', '', '2021-03-20 01:36:28', '122341'),
(13, '324354rere', '', '2021-03-20 01:34:39', '122341'),
(37, '324354rere', '', '2021-03-21 11:02:42', '123'),
(36, '324354rere', 'ass', '2021-03-21 10:05:48', '123'),
(35, '324354rere', '', '2021-03-20 22:20:14', '123'),
(34, '324354rere', 'ss', '2021-03-20 22:09:38', '123'),
(33, '324354rere', '', '2021-03-20 01:48:35', '122341');

-- --------------------------------------------------------

--
-- Structure de la table `dislike`
--

DROP TABLE IF EXISTS `dislike`;
CREATE TABLE IF NOT EXISTS `dislike` (
  `id_dislike` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(12) NOT NULL,
  `video_id` int(12) NOT NULL,
  `date_reg` timestamp NOT NULL,
  PRIMARY KEY (`id_dislike`),
  KEY `u_id` (`u_id`,`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_jaime` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(12) NOT NULL,
  `u_id` varchar(12) NOT NULL,
  `date_reg` timestamp NOT NULL,
  PRIMARY KEY (`id_jaime`),
  KEY `video_id` (`video_id`,`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_jaime`, `video_id`, `u_id`, `date_reg`) VALUES
(6, '324354rere', '122341', '2021-03-20 01:42:21'),
(5, '324354rere', '122341', '2021-03-20 01:30:30'),
(7, '324354rere', '122341', '2021-03-20 09:53:34'),
(8, '324354rere', '122341', '2021-03-20 09:55:23'),
(9, '324354rere', '123', '2021-03-21 10:58:40'),
(10, '324354rere', '123', '2021-03-21 10:58:42'),
(11, '324354rere', '123', '2021-03-21 10:58:42'),
(12, '324354rere', '123', '2021-03-21 10:58:42'),
(13, '324354rere', '123', '2021-03-21 10:58:42'),
(14, '324354rere', '123', '2021-03-21 10:58:43'),
(15, '324354rere', '123', '2021-03-21 10:58:43'),
(16, '324354rere', '123', '2021-03-21 10:58:43'),
(17, '324354rere', '123', '2021-03-21 10:58:43'),
(18, '324354rere', '123', '2021-03-21 10:58:44'),
(19, '324354rere', '123', '2021-03-21 10:58:44'),
(20, '324354rere', '123', '2021-03-21 10:59:18'),
(21, '324354rere', '123', '2021-03-21 11:08:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` varchar(12) NOT NULL,
  `pseudo` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `age` int(2) NOT NULL,
  `sexe` text NOT NULL,
  `date_reg` datetime NOT NULL,
  `photo` varchar(50) NOT NULL,
  `user_statut` int(1) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`u_id`, `pseudo`, `email`, `password`, `age`, `sexe`, `date_reg`, `photo`, `user_statut`) VALUES
('123', 'seye', 'dadfhh@gmail.com', 'seye', 12, 'H', '2021-03-13 21:05:05', '1', 1),
('1234', 'sdds', 'fdsf@gmail.com', '234', 23, 'H', '2021-03-13 21:10:50', '1', 1),
('12234', 'cdfds', 'xvdfvf@gmail.com', '123', 12, 'H', '2021-03-17 19:23:48', '1', 1),
('122341', 'sas', 'sass@gmail.com', '236', 23, 'H', '2021-03-19 22:10:08', '1', 1),
('1223413', 'xcvc', 'iokkk@gmail.com', '7890', 24, 'H', '2021-03-19 22:14:45', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `video_id` varchar(14) NOT NULL,
  `u_id` varchar(12) NOT NULL,
  `description` varchar(200) NOT NULL,
  `miniature` varchar(50) NOT NULL,
  `date_reg` datetime NOT NULL,
  `titre` varchar(50) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`video_id`, `u_id`, `description`, `miniature`, `date_reg`, `titre`) VALUES
('324354rere', '123', 'dffdsfs', 'newsletter.jpg', '2021-03-12 21:47:41', 'la premiere video'),
('esfserwfgr', '1234', 'grregf', 'vide8.png', '2021-03-12 22:31:34', 'deuxieme');

-- --------------------------------------------------------

--
-- Structure de la table `videos_favorites`
--

DROP TABLE IF EXISTS `videos_favorites`;
CREATE TABLE IF NOT EXISTS `videos_favorites` (
  `video_id` int(18) NOT NULL,
  `date_reg` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
