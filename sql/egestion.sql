-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Novembre 2017 à 02:01
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `egestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `Id_Ecole` int(11) NOT NULL,
  `NomEcole` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ecole`
--

INSERT INTO `ecole` (`Id_Ecole`, `NomEcole`, `Adresse`, `logo`) VALUES
(1, 'EPSI', '23-25 Rue du dépôt 62000 Arras', NULL),
(2, 'OSS', 'PARIS', NULL),
(3, 'WIS', 'PARIS', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_Emprunt` int(11) NOT NULL,
  `DateEmprunt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DatePrevRetour` date DEFAULT NULL,
  `DateRetour` date DEFAULT NULL,
  `QuantiteEmprunter` int(11) DEFAULT NULL,
  `id_Emprunteur` int(11) NOT NULL,
  `id_Etat` int(11) NOT NULL,
  `id_Materiels` int(11) NOT NULL,
  `id_Etat_1` int(11) NOT NULL,
  `EtatEmprunt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id_Emprunt`, `DateEmprunt`, `DatePrevRetour`, `DateRetour`, `QuantiteEmprunter`, `id_Emprunteur`, `id_Etat`, `id_Materiels`, `id_Etat_1`, `EtatEmprunt`) VALUES
(105, '2017-11-28 17:22:34', '2017-12-06', '2017-11-28', 2, 1, 1, 1, 1, 1),
(106, '2017-11-15 20:31:26', '2017-11-08', NULL, 3, 1, 1, 2, 1, 0),
(128, '2017-11-28 22:05:01', '2017-12-06', NULL, 3, 1, 1, 3, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `emprunteur`
--

CREATE TABLE `emprunteur` (
  `id_Emprunteur` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emprunteur`
--

INSERT INTO `emprunteur` (`id_Emprunteur`, `Nom`, `Prenom`, `id`) VALUES
(1, 'BOULOUH', 'MUSTAPHA', 1),
(2, 'Carpene', 'Mickael', 1),
(3, 'Kurzawa', 'Pierro', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id_Etat` int(11) NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`id_Etat`, `Libelle`) VALUES
(1, 'BON'),
(2, 'MOYEN'),
(3, 'MEDIOCRE'),
(4, 'MAUVAIS');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `nom_marque` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`) VALUES
(1, 'DELL'),
(2, 'LOGITECH'),
(3, 'ACER'),
(4, 'LENOVO');

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE `materiels` (
  `id_Materiels` int(11) NOT NULL,
  `QuantiteMateriels` int(11) DEFAULT NULL,
  `ModelMateriel` varchar(255) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_Etat` int(11) DEFAULT NULL,
  `id_marque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `materiels`
--

INSERT INTO `materiels` (`id_Materiels`, `QuantiteMateriels`, `ModelMateriel`, `id_type`, `id_Etat`, `id_marque`) VALUES
(1, 12, 'B200 MOUSE O', 1, 1, 2),
(2, 34, 'U400 KEYBORD U', 2, 1, 1),
(3, 5, 'E238 SERIES 23 POUCES', 1, 1, 2),
(12, 4, 'u41 KNL', 1, 1, 2),
(13, 2, 'E series 7000', 1, 1, 2),
(14, 4, 'E238 SERIES 23', 4, 1, 1),
(18, 2, 'Ecran test', 4, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `AnneePromotion` varchar(255) DEFAULT NULL,
  `Id_Ecole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`id`, `Promo`, `AnneePromotion`, `Id_Ecole`) VALUES
(1, 'B1', '2017', 1),
(2, 'B2', '2017', 1),
(3, 'B3', '2017', 2),
(5, 'I4', '2017', 1),
(6, 'I5', '2017', 1),
(7, 'Prof', '2017', 1),
(8, 'UDEV', '2017', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `TypeMateriel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `TypeMateriel`) VALUES
(1, 'Souris'),
(2, 'Clavier'),
(4, 'Ecran');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token_forget` varchar(255) DEFAULT NULL,
  `date_forget` varchar(255) DEFAULT NULL,
  `Id_Ecole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `role`, `email`, `password`, `token_forget`, `date_forget`, `Id_Ecole`) VALUES
(1, 'MUSTAPHA', 'BOULOUH', 'Mustapha', 'admin', 'mustapha.boulouh@icloud.com', '$2y$10$n9KRv8ghKr6Ui4y2pYomCuvuqcPpUZTvV60rp15dZhlE7hmL4woKW', NULL, NULL, 1),
(2, 'Mickaël', 'Carpené', 'Mikc', 'user', 'mickael@gmail.com', '$2y$10$gJscm7ccdnORrRCcxJD4B.zMZWpSgTpIGOnpuaEegC2YIGuTTlCeu', NULL, NULL, 2),
(3, 'Pierre', 'Kurzawa', 'Pierro', 'user', 'Kurzawa@gmail.com', '$2y$10$dazwzUtdO1O/2BFoDthCtOdiY.zR0l1pmVE0jZStG0cpU7Uceuu7q', NULL, NULL, 2),
(7, 'Guillaume', 'Lefetz', 'GuiGui', 'user', 'guillaumelefetz@epsi.com', '$2y$10$UlJ34kH.jbV4M6LXdRC1aul1BpNcXodg3MjdJul5qEiZZwR3bX.dS', NULL, NULL, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`Id_Ecole`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_Emprunt`,`id_Emprunteur`,`id_Etat`,`id_Materiels`,`id_Etat_1`),
  ADD KEY `FK_Emprunt_id_Emprunteur` (`id_Emprunteur`),
  ADD KEY `FK_Emprunt_id_Etat` (`id_Etat`),
  ADD KEY `FK_Emprunt_id_Materiels` (`id_Materiels`),
  ADD KEY `FK_Emprunt_id_Etat_1` (`id_Etat_1`);

--
-- Index pour la table `emprunteur`
--
ALTER TABLE `emprunteur`
  ADD PRIMARY KEY (`id_Emprunteur`),
  ADD KEY `FK_Emprunteur_id` (`id`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id_Etat`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id_Materiels`),
  ADD KEY `FK_Materiels_id_type` (`id_type`),
  ADD KEY `FK_Materiels_id_Etat` (`id_Etat`),
  ADD KEY `FK_Materiels_id_marque` (`id_marque`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Promotion_Id_Ecole` (`Id_Ecole`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`token_forget`),
  ADD KEY `FK_users_Id_Ecole` (`Id_Ecole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `Id_Ecole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_Emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT pour la table `emprunteur`
--
ALTER TABLE `emprunteur`
  MODIFY `id_Emprunteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id_Etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id_Materiels` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_Emprunt_id_Emprunteur` FOREIGN KEY (`id_Emprunteur`) REFERENCES `emprunteur` (`id_Emprunteur`),
  ADD CONSTRAINT `FK_Emprunt_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `etat` (`id_Etat`),
  ADD CONSTRAINT `FK_Emprunt_id_Etat_1` FOREIGN KEY (`id_Etat_1`) REFERENCES `etat` (`id_Etat`),
  ADD CONSTRAINT `FK_Emprunt_id_Materiels` FOREIGN KEY (`id_Materiels`) REFERENCES `materiels` (`id_Materiels`);

--
-- Contraintes pour la table `emprunteur`
--
ALTER TABLE `emprunteur`
  ADD CONSTRAINT `FK_Emprunteur_id` FOREIGN KEY (`id`) REFERENCES `promotion` (`id`);

--
-- Contraintes pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD CONSTRAINT `FK_Materiels_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `etat` (`id_Etat`),
  ADD CONSTRAINT `FK_Materiels_id_marque` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`),
  ADD CONSTRAINT `FK_Materiels_id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_Promotion_Id_Ecole` FOREIGN KEY (`Id_Ecole`) REFERENCES `ecole` (`Id_Ecole`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_Id_Ecole` FOREIGN KEY (`Id_Ecole`) REFERENCES `ecole` (`Id_Ecole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
