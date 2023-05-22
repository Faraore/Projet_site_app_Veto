-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mai 2023 à 17:19
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

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `death_date` date DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `id_family` int(11) DEFAULT NULL,
  `id_veterinarians` int(11) DEFAULT NULL,
  `id_animals_gender` int(11) DEFAULT NULL,
  `id_weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `birth_date`, `death_date`, `id_owner`, `id_family`, `id_veterinarians`, `id_animals_gender`, `id_weight`) VALUES
(1, 'Simba', '2021-05-15', NULL, 7, 2, NULL, 1, 1),
(24, 'simba', '2023-03-09', NULL, 8, 2, NULL, 1, 24),
(27, 'simba', '2021-05-15', NULL, 12, 2, NULL, 1, 27),
(36, 'titi', '2023-05-02', NULL, 15, 2, NULL, 2, 36),
(37, 'tutu', '2023-05-09', NULL, 15, 2, NULL, 1, 37);

-- --------------------------------------------------------

--
-- Structure de la table `animals_gender`
--

CREATE TABLE `animals_gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animals_gender`
--

INSERT INTO `animals_gender` (`id`, `gender`) VALUES
(1, 'Mâle'),
(2, 'Femelle');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `secret_question` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `mail`, `password`, `secret_question`) VALUES
(7, 'test@test.fr', '$2y$10$mTclxa//FG3EHLe3IMfNM.k9CI9RST8pPIrm2xMrlkl3uMKb7hqvS', NULL),
(9, 'pou@pou.fr', '$2y$10$syBXpVLx540WBv4L54BvjuTWrn3JlC36rQUdpTmkiTqUvrlpwAKke', NULL),
(10, 'ballet.bryan4@gmail.com', '$2y$10$Qsc7Vc8L0Q3SsyfXAFdMDOsq9pBWyC72pz5/2ks2Z6DfsyhAUyhS.', NULL),
(12, 'ballet.bryan@gmail.com', '$2y$10$WGITbSgW5IsW0dMuBKqxEeZYyysYS907TXzkww/Az5/P42Zgqh3xu', NULL),
(15, 'test@test.com', '$2y$10$XZAYLwFaANDV84JBoSykx.k1ZjMOj56.CGWtOvd1L1OWuJ8yvvLmW', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `family_type` varchar(200) DEFAULT NULL,
  `breed` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `family`
--

INSERT INTO `family` (`id`, `family_type`, `breed`) VALUES
(1, 'Chien', NULL),
(2, 'Chat', NULL),
(3, 'Chien', 'Labrador'),
(4, 'Chien', 'Berger Allemand'),
(5, 'Chien', 'Teckel');

-- --------------------------------------------------------

--
-- Structure de la table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `address_number` int(11) DEFAULT NULL,
  `street_address` varchar(200) DEFAULT NULL,
  `id_connexion` int(11) NOT NULL,
  `post_code` int(5) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `owner`
--

INSERT INTO `owner` (`id`, `last_name`, `first_name`, `address_number`, `street_address`, `id_connexion`, `post_code`, `city`) VALUES
(7, 'test', 'test', 12, 'Rue de roses', 7, 55555, 'Fleurs'),
(8, '', 'bryan', 106, 'Avenue de la liberation', 8, 33700, 'MERIGNAC'),
(9, 'poupou', 'pou', 1, 'poupou', 9, 0, 'poupou'),
(12, 'ballet', 'bryan', 102, 'Avenue de la libé', 12, 33700, 'MERIGNAC'),
(15, 'test', 'test', 1, 'azerty', 15, 11112, 'AZERTY');

-- --------------------------------------------------------

--
-- Structure de la table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL,
  `specialty_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `veterinarians`
--

CREATE TABLE `veterinarians` (
  `id` int(11) NOT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `address_number` int(11) DEFAULT NULL,
  `street_address` varchar(200) DEFAULT NULL,
  `phone_number` int(10) DEFAULT NULL,
  `id_specialty` int(11) DEFAULT NULL,
  `post_code` int(5) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `weight`
--

CREATE TABLE `weight` (
  `id` int(11) NOT NULL,
  `weight` int(4) DEFAULT NULL,
  `mesure_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `weight`
--

INSERT INTO `weight` (`id`, `weight`, `mesure_date`) VALUES
(1, 6, '2023-02-20 00:00:00'),
(2, 21, '2023-02-21 11:10:38'),
(3, 5, '2023-02-23 15:51:32'),
(6, 20, '2023-02-27 11:50:20'),
(7, 20, '2023-02-27 11:53:10'),
(24, 50, '2023-03-13 17:04:35'),
(25, 5, '2023-05-05 15:04:12'),
(27, 5, NULL),
(28, 6, NULL),
(36, 10, NULL),
(37, 20, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animaux_proprietaires_FK` (`id_owner`),
  ADD KEY `animaux_famille0_FK` (`id_family`),
  ADD KEY `animaux_veterinaire1_FK` (`id_veterinarians`),
  ADD KEY `animaux_sexe_des_animaux2_FK` (`id_animals_gender`),
  ADD KEY `id_poids` (`id_weight`);

--
-- Index pour la table `animals_gender`
--
ALTER TABLE `animals_gender`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprietaires_connexion_FK` (`id_connexion`);

--
-- Index pour la table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinaires_specialite_FK` (`id_specialty`);

--
-- Index pour la table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `animals_gender`
--
ALTER TABLE `animals_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `veterinarians`
--
ALTER TABLE `veterinarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `weight`
--
ALTER TABLE `weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`id_weight`) REFERENCES `weight` (`id`),
  ADD CONSTRAINT `animaux_famille0_FK` FOREIGN KEY (`id_family`) REFERENCES `family` (`id`),
  ADD CONSTRAINT `animaux_proprietaires_FK` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id`),
  ADD CONSTRAINT `animaux_sexe_des_animaux2_FK` FOREIGN KEY (`id_animals_gender`) REFERENCES `animals_gender` (`id`),
  ADD CONSTRAINT `animaux_veterinaire1_FK` FOREIGN KEY (`id_veterinarians`) REFERENCES `veterinarians` (`id`);

--
-- Contraintes pour la table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `proprietaires_connexion_FK` FOREIGN KEY (`id_connexion`) REFERENCES `connexion` (`id`);

--
-- Contraintes pour la table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD CONSTRAINT `veterinaires_specialite_FK` FOREIGN KEY (`id_specialty`) REFERENCES `specialties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
