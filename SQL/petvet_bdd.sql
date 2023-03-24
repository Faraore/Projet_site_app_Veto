-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 mars 2023 à 15:11
-- Version du serveur : 5.7.17
-- Version de PHP : 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `petvet_bdd`
--
CREATE DATABASE IF NOT EXISTS `petvet_bdd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `petvet_bdd`;

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `date_de_deces` date DEFAULT NULL,
  `id_proprietaires` int(11) NOT NULL,
  `id_famille` int(11) NOT NULL,
  `id_veterinaires` int(11) DEFAULT NULL,
  `id_sexe_des_animaux` int(11) NOT NULL,
  `id_poids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nom`, `date_de_naissance`, `date_de_deces`, `id_proprietaires`, `id_famille`, `id_veterinaires`, `id_sexe_des_animaux`, `id_poids`) VALUES
(1, 'Simba', '2021-05-15', NULL, 7, 2, NULL, 1, 1),
(24, '^po^po', '2023-03-09', NULL, 8, 2, NULL, 1, 24);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `question_secrete` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `mail`, `password`, `question_secrete`) VALUES
(7, 'test@test.fr', '$2y$10$mTclxa//FG3EHLe3IMfNM.k9CI9RST8pPIrm2xMrlkl3uMKb7hqvS', NULL),
(8, 'ballet.bryan4@gmail.com', '$2y$10$h4WHaDx2JPQbcvBZvpbGXuLy0/z/Me/QfIup4HgEU8gj.zyaCgBZG', NULL),
(9, 'pou@pou.fr', '$2y$10$syBXpVLx540WBv4L54BvjuTWrn3JlC36rQUdpTmkiTqUvrlpwAKke', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `type_animal` varchar(200) NOT NULL,
  `race` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `type_animal`, `race`) VALUES
(1, 'Chien', NULL),
(2, 'Chat', NULL),
(3, 'Chien', 'Labrador'),
(4, 'Chien', 'Berger Allemand'),
(5, 'Chien', 'Teckel');

-- --------------------------------------------------------

--
-- Structure de la table `poids`
--

CREATE TABLE `poids` (
  `id` int(11) NOT NULL,
  `poids` int(4) DEFAULT NULL,
  `date_mesure` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `poids`
--

INSERT INTO `poids` (`id`, `poids`, `date_mesure`) VALUES
(1, 6, '2023-02-20 00:00:00'),
(2, 21, '2023-02-21 11:10:38'),
(3, 5, '2023-02-23 15:51:32'),
(6, 20, '2023-02-27 11:50:20'),
(7, 20, '2023-02-27 11:53:10'),
(24, 50, '2023-03-13 17:04:35');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaires`
--

CREATE TABLE `proprietaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `numero_adresse` int(11) NOT NULL,
  `nom_adresse` varchar(250) NOT NULL,
  `complement_adresse` varchar(250) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `id_connexion` int(11) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proprietaires`
--

INSERT INTO `proprietaires` (`id`, `nom`, `prenom`, `numero_adresse`, `nom_adresse`, `complement_adresse`, `telephone`, `id_connexion`, `codePostal`, `ville`) VALUES
(7, 'test', 'test', 12, 'Rue de roses', NULL, NULL, 7, '55555', 'Fleurs'),
(8, 'b', 'bryan', 102, 'Avenue de la libération', NULL, NULL, 8, '33700', 'MERIGNAC'),
(9, 'poupou', 'pou', 1, 'poupou', NULL, NULL, 9, '0', 'poupou');

-- --------------------------------------------------------

--
-- Structure de la table `sexe_des_animaux`
--

CREATE TABLE `sexe_des_animaux` (
  `id` int(11) NOT NULL,
  `sexe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sexe_des_animaux`
--

INSERT INTO `sexe_des_animaux` (`id`, `sexe`) VALUES
(1, 'Mâle'),
(2, 'Femelle');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `type_specialite` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `veterinaires`
--

CREATE TABLE `veterinaires` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `numero_adresse` varchar(50) NOT NULL,
  `nom_adresse` varchar(200) NOT NULL,
  `complement_adresse` varchar(50) DEFAULT NULL,
  `telephone` int(10) NOT NULL,
  `id_specialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animaux_proprietaires_FK` (`id_proprietaires`),
  ADD KEY `animaux_famille0_FK` (`id_famille`),
  ADD KEY `animaux_veterinaire1_FK` (`id_veterinaires`),
  ADD KEY `animaux_sexe_des_animaux2_FK` (`id_sexe_des_animaux`),
  ADD KEY `id_poids` (`id_poids`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `poids`
--
ALTER TABLE `poids`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprietaires_connexion_FK` (`id_connexion`);

--
-- Index pour la table `sexe_des_animaux`
--
ALTER TABLE `sexe_des_animaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `veterinaires`
--
ALTER TABLE `veterinaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinaires_specialite_FK` (`id_specialite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `poids`
--
ALTER TABLE `poids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `sexe_des_animaux`
--
ALTER TABLE `sexe_des_animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `veterinaires`
--
ALTER TABLE `veterinaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `animaux_famille0_FK` FOREIGN KEY (`id_famille`) REFERENCES `famille` (`id`),
  ADD CONSTRAINT `animaux_ibfk_1` FOREIGN KEY (`id_poids`) REFERENCES `poids` (`id`),
  ADD CONSTRAINT `animaux_proprietaires_FK` FOREIGN KEY (`id_proprietaires`) REFERENCES `proprietaires` (`id`),
  ADD CONSTRAINT `animaux_sexe_des_animaux2_FK` FOREIGN KEY (`id_sexe_des_animaux`) REFERENCES `sexe_des_animaux` (`id`),
  ADD CONSTRAINT `animaux_veterinaire1_FK` FOREIGN KEY (`id_veterinaires`) REFERENCES `veterinaires` (`id`);

--
-- Contraintes pour la table `proprietaires`
--
ALTER TABLE `proprietaires`
  ADD CONSTRAINT `proprietaires_connexion_FK` FOREIGN KEY (`id_connexion`) REFERENCES `connexion` (`id`);

--
-- Contraintes pour la table `veterinaires`
--
ALTER TABLE `veterinaires`
  ADD CONSTRAINT `veterinaires_specialite_FK` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
