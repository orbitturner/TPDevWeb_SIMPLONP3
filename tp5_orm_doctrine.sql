-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 17 août 2020 à 15:43
-- Version du serveur :  5.7.24
-- Version de PHP :  7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp5_orm_doctrine`
--

-- --------------------------------------------------------

--
-- Structure de la table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creationDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numAgency` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `agency`
--

INSERT INTO `agency` (`id`, `nom`, `creationDate`, `lieu`, `numAgency`) VALUES
(1, 'AGT-DEVAGENCY', '2020-07-29', 'DAKAR', 'BP-TEST-DK-1010-001');

INSERT INTO `agency` (`id`, `nom`, `creationDate`, `lieu`, `numAgency`) VALUES
(2, 'AGT-TEST-AGENCY', '2020-08-18', 'SPATIUM', 'BP-TEST-DK-1010-002');

-- --------------------------------------------------------

--
-- Structure de la table `agency_state`
--

CREATE TABLE `agency_state` (
  `agency_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clientphysique`
--

CREATE TABLE `clientphysique` (
  `id` int(11) NOT NULL,
  `numId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaiss` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `features` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isSalarie` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clientphysique`
--

INSERT INTO `clientphysique` (`id`, `numId`, `nom`, `prenom`, `email`, `cni`, `telephone`, `adresse`, `sexe`, `dateNaiss`, `dateCreation`, `features`, `isSalarie`) VALUES
(1, 'BP-CP-20200729-1', 'MAPE', 'MARIE', 'orbitturner@gmail.com', '1852966300555', '773454993', 'DAKAR', 'F', '2020-07-29', '20200729', '1,2,3,4', '0'),
(2, 'BP-CP-20200729-2', 'GUEYE', 'Mouhamed', 'orbitturner@outlook.com', '1870199101585', '778834583', 'CitÃ© Keur Damel', 'M', '2020-07-22', '20200729', '1,2,3,4', '0'),
(3, 'BP-CP-20200729-3', 'CISSE', 'Aissatou', 'aissatoucisse001@gmail.com', '1889633325559', '775360279', 'Keur Massar', 'F', '2020-07-29', '20200729', '1,2,3,4', '0');

-- --------------------------------------------------------

--
-- Structure de la table `compteepsx`
--

CREATE TABLE `compteepsx` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `accountNumber` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cleRIB` int(11) NOT NULL,
  `solde` decimal(10,0) NOT NULL,
  `dateCreation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activeDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nextRemunDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `closeDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `hostAgency` int(11) NOT NULL,
  `idOpeningFees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `compteepsx`
--

INSERT INTO `compteepsx` (`id`, `owner_id`, `accountNumber`, `cleRIB`, `solde`, `dateCreation`, `activeDate`, `nextRemunDate`, `closeDate`, `idUser`, `hostAgency`, `idOpeningFees`) VALUES
(1, 1, 'BP-SN-20200803-1-1', 55, '450001', '2020-08-03', '2020-08-03', '2020-12-12', NULL, 1, 1, 1),
(2, 1, 'BP-SN-20200803-2-1', 78, '780000', '2020-08-03', '2020-08-03', '2020-12-12', NULL, 1, 2, 1),
(3, 1, 'BP-SN-20200803-3-1', 88, '10000', '2020-08-03', '2020-08-03', '2020-12-12', NULL, 1, 1, 1),
(4, 1, 'BP-SN-20200803-4-1', 98, '125000', '2020-08-03', '2020-08-03', '2020-12-12', NULL, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compteepsx_etats`
--

CREATE TABLE `compteepsx_etats` (
  `compteepsx_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `compteepsx_etats`
--

INSERT INTO `compteepsx_etats` (`compteepsx_id`, `state_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `numEmployee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaiss` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `agencyhost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `openingfees`
--

CREATE TABLE `openingfees` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `montant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `openingfees`
--

INSERT INTO `openingfees` (`id`, `libelle`, `montant`) VALUES
(1, 'CEPSX_1', '5600');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id`, `nom`, `description`) VALUES
(1, 'SUPER_ADMIN', 'GRANT ALL PRIVILEGES');

-- --------------------------------------------------------

--
-- Structure de la table `profile_state`
--

CREATE TABLE `profile_state` (
  `profile_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`id`, `nom`, `description`) VALUES
(1, 'ACTIF', 'Etat Initiale - Working');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idProfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `login`, `password`, `dateCreation`, `idProfil`) VALUES
(1, 'WALKER', 'SHADOW', 'orbitturner', '@webmaster1', '2020-07-29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_state`
--

CREATE TABLE `user_state` (
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_776CC3D0BAD79E3A` (`numAgency`);

--
-- Index pour la table `agency_state`
--
ALTER TABLE `agency_state`
  ADD PRIMARY KEY (`agency_id`,`state_id`),
  ADD KEY `IDX_AD5F5DD5CDEADB2A` (`agency_id`),
  ADD KEY `IDX_AD5F5DD55D83CC1` (`state_id`);

--
-- Index pour la table `clientphysique`
--
ALTER TABLE `clientphysique`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D9E97696C6E55B5` (`nom`),
  ADD UNIQUE KEY `UNIQ_8D9E97697AC033BE` (`cni`),
  ADD UNIQUE KEY `UNIQ_8D9E9769450FF010` (`telephone`);

--
-- Index pour la table `compteepsx`
--
ALTER TABLE `compteepsx`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_476A19E52D8B2F8F` (`accountNumber`),
  ADD KEY `IDX_476A19E5FE6E88D7` (`idUser`),
  ADD KEY `IDX_476A19E5EB0DA29F` (`idOpeningFees`),
  ADD KEY `IDX_476A19E57E3C61F9` (`owner_id`),
  ADD KEY `IDX_476A19E515C879D0` (`hostAgency`);

--
-- Index pour la table `compteepsx_etats`
--
ALTER TABLE `compteepsx_etats`
  ADD PRIMARY KEY (`compteepsx_id`,`state_id`),
  ADD KEY `IDX_9BEDB8E0E5930107` (`compteepsx_id`),
  ADD KEY `IDX_9BEDB8E05D83CC1` (`state_id`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A4E917F715A2EC63` (`numEmployee`),
  ADD UNIQUE KEY `UNIQ_A4E917F7450FF010` (`telephone`),
  ADD UNIQUE KEY `UNIQ_A4E917F7E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_A4E917F77AC033BE` (`cni`),
  ADD KEY `IDX_A4E917F7FE6E88D7` (`idUser`),
  ADD KEY `IDX_A4E917F7BAD79E3A` (`agencyhost`);

--
-- Index pour la table `openingfees`
--
ALTER TABLE `openingfees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2DCCD230A4D60759` (`libelle`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4EEA93936C6E55B5` (`nom`);

--
-- Index pour la table `profile_state`
--
ALTER TABLE `profile_state`
  ADD PRIMARY KEY (`profile_id`,`state_id`),
  ADD KEY `IDX_54474D29CCFA12B8` (`profile_id`),
  ADD KEY `IDX_54474D295D83CC1` (`state_id`);

--
-- Index pour la table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6252FDFF6C6E55B5` (`nom`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2DA17977AA08CB10` (`login`),
  ADD KEY `IDX_2DA1797785C71A0D` (`idProfil`);

--
-- Index pour la table `user_state`
--
ALTER TABLE `user_state`
  ADD PRIMARY KEY (`user_id`,`state_id`),
  ADD KEY `IDX_415129A3A76ED395` (`user_id`),
  ADD KEY `IDX_415129A35D83CC1` (`state_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clientphysique`
--
ALTER TABLE `clientphysique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `compteepsx`
--
ALTER TABLE `compteepsx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `openingfees`
--
ALTER TABLE `openingfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agency_state`
--
ALTER TABLE `agency_state`
  ADD CONSTRAINT `FK_AD5F5DD55D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AD5F5DD5CDEADB2A` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `compteepsx`
--
ALTER TABLE `compteepsx`
  ADD CONSTRAINT `FK_476A19E515C879D0` FOREIGN KEY (`hostAgency`) REFERENCES `agency` (`id`),
  ADD CONSTRAINT `FK_476A19E57E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `clientphysique` (`id`),
  ADD CONSTRAINT `FK_476A19E5EB0DA29F` FOREIGN KEY (`idOpeningFees`) REFERENCES `openingfees` (`id`),
  ADD CONSTRAINT `FK_476A19E5FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `compteepsx_etats`
--
ALTER TABLE `compteepsx_etats`
  ADD CONSTRAINT `FK_9BEDB8E05D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9BEDB8E0E5930107` FOREIGN KEY (`compteepsx_id`) REFERENCES `compteepsx` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_A4E917F7BAD79E3A` FOREIGN KEY (`agencyhost`) REFERENCES `agency` (`id`),
  ADD CONSTRAINT `FK_A4E917F7FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `profile_state`
--
ALTER TABLE `profile_state`
  ADD CONSTRAINT `FK_54474D295D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_54474D29CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_2DA1797785C71A0D` FOREIGN KEY (`idProfil`) REFERENCES `profile` (`id`);

--
-- Contraintes pour la table `user_state`
--
ALTER TABLE `user_state`
  ADD CONSTRAINT `FK_415129A35D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_415129A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
