-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juin 2020 à 12:09
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdspace`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(10) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `pays`, `ville`, `contact`, `id_user`) VALUES
(1, 'cote divoire', 'abidjan', '08-50-90-82', 'kosadmi2019-'),
(2, 'france', 'paris', '56-86-96-32', 'koaamir2019-'),
(3, 'ghana', 'accra', '77-41-02-46', 'taa12342015-'),
(4, 'mali', 'paris', '78-66-66-66', 'KoS12342020');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `de` varchar(20) NOT NULL,
  `pour` varchar(20) NOT NULL,
  `msg_chat` text NOT NULL,
  `datechat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`de`, `pour`, `msg_chat`, `datechat`) VALUES
('kosadmi2019-', 'koaamir2019-', 'saghg', '2019-02-13'),
('koaamir2019-', 'kosadmi2019-', 'salut', '2019-02-13'),
('koaamir2019-', 'kosadmi2019-', 'iuui', '2019-02-13'),
('kosadmi2019-', 'koaamir2019-', 'uiuÃ¨_', '2019-02-13'),
('kosadmi2019-', 'koaamir2019-', 'oooooooouio', '2019-02-13'),
('kosadmi2019-', 'taa12342015-', 'salut\r\n', '2019-03-13'),
('taa12342015-', 'kosadmi2019-', 'comment vas tu', '2019-03-13');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(10) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `datecom` date NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `contenu`, `datecom`, `id_post`, `id_user`) VALUES
(0, 'houmm', '2019-02-13', 1, 'koaamir2019-'),
(0, 'moins bon', '2019-03-13', 1, 'taa12342015-');

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

CREATE TABLE `dislikes` (
  `id_dislike` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evernement`
--

CREATE TABLE `evernement` (
  `id_ever` int(10) NOT NULL,
  `contenu` text NOT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `id_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id_info` int(11) NOT NULL,
  `nompere` varchar(100) NOT NULL,
  `nommere` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `domicile` varchar(100) NOT NULL,
  `nationnalite` varchar(100) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_likes` int(10) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_post` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_likes`, `id_user`, `id_post`) VALUES
(4, 'taa12342015-', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_msg` int(10) NOT NULL,
  `datemsg` date NOT NULL,
  `heurmsg` time NOT NULL,
  `de` varchar(20) NOT NULL,
  `pour` varchar(20) NOT NULL,
  `objetmsg` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `lu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_msg`, `datemsg`, `heurmsg`, `de`, `pour`, `objetmsg`, `message`, `lu`) VALUES
(1, '2019-02-13', '17:08:36', 'koaamir2019-', 'kouakou stephanie', '', 'salut', 1),
(2, '2019-03-14', '00:20:39', 'taa12342015-', 'kouakou stephanie', 'jkl', 'friends', 1),
(3, '2019-03-14', '00:21:22', 'kosadmi2019-', 'tape ange', 'jkl', 'hello', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niv` int(10) NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `niveau_fil` varchar(100) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id_niv`, `filiere`, `niveau_fil`, `id_user`) VALUES
(1, 'informatique Developpement', 'bts', 'kosadmi2019-'),
(2, 'informatique Developpement', 'bts', 'koaamir2019-'),
(3, 'informatique Developpement', 'bts2', 'taa12342015-'),
(4, 'informatique Developpement', 'bts', 'KoS12342020');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notifi` int(10) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_notifi` date NOT NULL,
  `id_membre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_post` int(10) NOT NULL,
  `contenu` varchar(100) DEFAULT NULL,
  `photopublier` varchar(100) DEFAULT NULL,
  `date_pub` date NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `contenu`, `photopublier`, `date_pub`, `id_user`) VALUES
(1, NULL, '0.jpg', '2019-02-11', 'kosadmi2019-'),
(2, NULL, '1.jpg', '2019-03-13', 'taa12342015-'),
(3, 'joie et paix', NULL, '2019-03-13', 'taa12342015-');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_prof` int(10) NOT NULL,
  `nom_prof` varchar(100) NOT NULL,
  `prenom_prof` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `nom_prof`, `prenom_prof`, `email`, `contact`) VALUES
(1, 'kouassi', 'gervain', 'kouassigmail.com', '02-96-32-54');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `date_naissance` varchar(100) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motpass` varchar(100) NOT NULL,
  `id_prof` varchar(20) NOT NULL,
  `etat` int(10) NOT NULL,
  `photo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `date_naissance`, `sexe`, `email`, `motpass`, `id_prof`, `etat`, `photo`) VALUES
('koaamir2019-', 'kone', 'amira', '2019-02-12', 'femme', 'amira@gmail.com', 'fd7d9a905de48f65b6ba5f8e1f266b751ec48ff6', 'kouassi gervain', 1, 'koaamir2019-.jpg'),
('KoS12342020', 'Kouakou', 'Stephanie', '2020-06-25', 'femme', 'Fannykouakou04@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'kouassi gervain', 1, 'KoS12342020.png'),
('kosadmi2019-', 'kouakou', 'stephanie', '2019-02-01', 'femme', 'fanny@gmail.com', 'cd5ea73cd58f827fa78eef7197b8ee606c99b2e6', 'TOURE AMIDOU', 0, 'kosadmi2019-.jpg'),
('taa12342015-', 'tape', 'ange', '2015-12-09', 'homme', 'ange@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'kouassi gervain', 1, 'taa12342015-.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD KEY `id_commentaire` (`id_commentaire`,`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id_dislike`);

--
-- Index pour la table `evernement`
--
ALTER TABLE `evernement`
  ADD PRIMARY KEY (`id_ever`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_likes`),
  ADD KEY `id_post` (`id_post`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_msg`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niv`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notifi`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_prof`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_prof` (`id_prof`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id_dislike` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_likes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_msg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notifi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_prof` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evernement`
--
ALTER TABLE `evernement`
  ADD CONSTRAINT `evernement_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
