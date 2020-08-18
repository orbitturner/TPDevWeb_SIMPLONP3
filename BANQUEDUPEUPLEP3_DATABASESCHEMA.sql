-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 04 août 2020 à 10:12
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp4_bp_simplon`
--

-- --------------------------------------------------------

--
-- Structure de la table `agency`
--

CREATE TABLE `agency` (
  `id_agency` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `creationDate` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `numAgency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agency`
--

INSERT INTO `agency` (`id_agency`, `nom`, `creationDate`, `lieu`, `state`, `numAgency`) VALUES
(1, 'AGENCE_DEV_TEST\r\n', '2020-07-01', 'Next Cyber Vision', 1, 'BP-TEST-DK-1010-001');

-- --------------------------------------------------------

--
-- Structure de la table `agios`
--

CREATE TABLE `agios` (
  `id_agios` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `montant` varchar(50) NOT NULL,
  `iteration` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clientonlineaccount`
--

CREATE TABLE `clientonlineaccount` (
  `id_account` int(11) NOT NULL,
  `login` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `dateCreation` date NOT NULL,
  `owner` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client_moral`
--

CREATE TABLE `client_moral` (
  `id_client` int(11) NOT NULL,
  `numIdentification` varchar(255) NOT NULL,
  `nom_entreprise` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `dateCreation` date NOT NULL,
  `features` varchar(50) DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client_physique`
--

CREATE TABLE `client_physique` (
  `id_client` int(11) NOT NULL,
  `numIdentification` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cni` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `sexe` char(2) NOT NULL,
  `dateNaiss` date NOT NULL,
  `dateCreation` date NOT NULL,
  `features` varchar(50) DEFAULT NULL,
  `isSalarie` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client_physique`
--

INSERT INTO `client_physique` (`id_client`, `numIdentification`, `nom`, `prenom`, `email`, `cni`, `adresse`, `sexe`, `dateNaiss`, `dateCreation`, `features`, `isSalarie`) VALUES
(1, 'BP-CP-20200701-1', 'GUEYE', 'MOHAMED', 'orbitturner@gmail.com', '1870199900646', 'Cite Keur Damel', 'M', '1999-01-09', '2020-07-01', '1,2,3,4', 0),
(2, 'BP-CP-20200701-2', 'MAPE', 'MARIE', 'orbitturner@gmail.com', '7897545612313', 'DAKAR', 'F', '2020-06-30', '2020-07-01', '1,2,3,4', 0),
(4, 'BP-CP-20200701-3', 'TURNER', 'Orbit', 'orbitrix@gmail.com', '1852966300555', 'Cité Keur Damel', 'M', '2020-06-16', '2020-07-01', '1,2,3,4', 0),
(5, 'BP-CP-20200701-5', 'GUEYE', 'Cheikh', 'jullo2002@orbitmail.com', '1870200200645', 'Houston, La Belle Vie', 'M', '2002-08-09', '2020-07-01', '1,2,3,4', 0),
(6, 'BP-CP-20200701-6', 'NIANG', 'Abdou', 'abdouniangyeumbeul@gmail.com', '1870199101585', 'Malika GUEDJ', 'M', '1991-07-02', '2020-07-01', '1,2,3,4', 0);

-- --------------------------------------------------------

--
-- Structure de la table `compte_bloque`
--

CREATE TABLE `compte_bloque` (
  `id_compte_bl` int(11) NOT NULL,
  `accountNumber` varchar(50) NOT NULL,
  `cleRib` int(11) NOT NULL,
  `idClientOwner_moral` int(11) DEFAULT NULL,
  `idClientOwner_physique` int(11) DEFAULT NULL,
  `solde` float NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `activedate` date DEFAULT NULL,
  `idUserCreator` int(11) NOT NULL,
  `agencyNumber` varchar(100) NOT NULL,
  `openingFees` int(11) NOT NULL,
  `nextRemunDate` date NOT NULL,
  `delaiBlocage` int(11) NOT NULL,
  `dateDeblockage` date NOT NULL,
  `closeDate` date DEFAULT NULL,
  `first_depot` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte_courant_salary`
--

CREATE TABLE `compte_courant_salary` (
  `id_compte_cs` int(11) NOT NULL,
  `accountNumber` varchar(50) NOT NULL,
  `idClientOwner_physique` int(11) NOT NULL,
  `cleRib` int(11) NOT NULL,
  `solde` float NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `activedate` date DEFAULT NULL,
  `idUserCreator` int(11) NOT NULL,
  `agios` int(11) NOT NULL,
  `agencyNumber` varchar(100) NOT NULL,
  `nextAgiosPrelevement` date DEFAULT NULL,
  `closeDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte_epargne_sx`
--

CREATE TABLE `compte_epargne_sx` (
  `id_compte_ep` int(11) NOT NULL,
  `accountNumber` varchar(50) NOT NULL,
  `cleRib` int(11) NOT NULL,
  `idCliOwner_physique` int(11) DEFAULT NULL,
  `idCliOwner_moral` int(11) DEFAULT NULL,
  `solde` float NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL DEFAULT '1',
  `dateCreation` date NOT NULL,
  `activedate` date DEFAULT NULL,
  `idUserCreator` int(11) NOT NULL,
  `agencyNumber` varchar(100) NOT NULL,
  `openingFees` int(11) NOT NULL,
  `nextRemunDate` date NOT NULL,
  `closeDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte_epargne_sx`
--

INSERT INTO `compte_epargne_sx` (`id_compte_ep`, `accountNumber`, `cleRib`, `idCliOwner_physique`, `idCliOwner_moral`, `solde`, `state`, `dateCreation`, `activedate`, `idUserCreator`, `agencyNumber`, `openingFees`, `nextRemunDate`, `closeDate`) VALUES
(5, 'BP-SN-2020-07-01-1-1', 45, 1, NULL, 450000, 1, '2020-07-01', NULL, 1, 'BP-TEST-DK-1010-001', 1, '2020-12-12', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `numEmployee` varchar(100) NOT NULL,
  `userAccount` int(11) UNSIGNED DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cni` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `sexe` char(2) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `agence` int(11) DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_employee`, `numEmployee`, `userAccount`, `telephone`, `email`, `cni`, `adresse`, `sexe`, `service`, `agence`, `dateNaiss`) VALUES
(1, 'BP-DK-EMP-20200701-1', 1, '778834583', 'orbitturner@gmail.com', '7896533', 'Damel', 'M', NULL, 1, '2020-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id_etat` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id_etat`, `nom`, `description`) VALUES
(1, 'actif', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `infoproclient`
--

CREATE TABLE `infoproclient` (
  `id_infoPro` int(11) NOT NULL,
  `profession` varchar(150) NOT NULL,
  `salaire` float NOT NULL,
  `idClient` int(11) NOT NULL,
  `employeurCli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `info_employeur`
--

CREATE TABLE `info_employeur` (
  `id_employeur` int(11) NOT NULL,
  `raisonSocial` varchar(150) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `numIdentification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id_module` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  `profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `opening_fees`
--

CREATE TABLE `opening_fees` (
  `id_fee` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `montant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `opening_fees`
--

INSERT INTO `opening_fees` (`id_fee`, `libelle`, `montant`) VALUES
(1, 'Frais d\'Ouverture EPSX', '5200');

-- --------------------------------------------------------

--
-- Structure de la table `oper_credit`
--

CREATE TABLE `oper_credit` (
  `id_credit` int(11) NOT NULL,
  `numOperCredit` varchar(50) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL,
  `accountNumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `oper_debit`
--

CREATE TABLE `oper_debit` (
  `id_debit` int(11) NOT NULL,
  `numOperDebit` varchar(50) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL,
  `accountNumber` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `oper_virement`
--

CREATE TABLE `oper_virement` (
  `id_OperVirement` int(11) NOT NULL,
  `numVirement` varchar(50) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `fromAccount` varchar(50) NOT NULL,
  `toAccount` varchar(50) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `optionclient`
--

CREATE TABLE `optionclient` (
  `id_opt` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `nom`, `description`, `state`) VALUES
(1, 'SUPER_ADMIN', 'ALL ACCESS PROFILE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

CREATE TABLE `typecompte` (
  `id_type` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeoperations`
--

CREATE TABLE `typeoperations` (
  `id_type` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(200) DEFAULT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profil` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `dateCreation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `login`, `password`, `profil`, `state`, `dateCreation`) VALUES
(1, 'TURNER', 'Orbit', 'orbitturner', '@Webmaster1', 1, 1, '2020-07-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id_agency`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `numAgency` (`numAgency`),
  ADD KEY `state` (`state`);

--
-- Index pour la table `agios`
--
ALTER TABLE `agios`
  ADD PRIMARY KEY (`id_agios`);

--
-- Index pour la table `clientonlineaccount`
--
ALTER TABLE `clientonlineaccount`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `owner` (`owner`),
  ADD KEY `clientonlineaccount_ibfk_1` (`state`);

--
-- Index pour la table `client_moral`
--
ALTER TABLE `client_moral`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `numIdentification` (`numIdentification`),
  ADD KEY `client_moral_ibfk_1` (`state`);

--
-- Index pour la table `client_physique`
--
ALTER TABLE `client_physique`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `cni` (`cni`),
  ADD UNIQUE KEY `numIdentification` (`numIdentification`);

--
-- Index pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  ADD PRIMARY KEY (`id_compte_bl`),
  ADD UNIQUE KEY `accountNumber` (`accountNumber`),
  ADD KEY `compte_bloque_ibfk_6` (`idClientOwner_moral`),
  ADD KEY `compte_bloque_ibfk_1` (`idClientOwner_physique`),
  ADD KEY `compte_bloque_ibfk_2` (`state`),
  ADD KEY `compte_bloque_ibfk_3` (`idUserCreator`),
  ADD KEY `compte_bloque_ibfk_4` (`agencyNumber`),
  ADD KEY `compte_bloque_ibfk_5` (`openingFees`);

--
-- Index pour la table `compte_courant_salary`
--
ALTER TABLE `compte_courant_salary`
  ADD PRIMARY KEY (`id_compte_cs`),
  ADD UNIQUE KEY `accountNumber` (`accountNumber`),
  ADD KEY `compte_courant_ibfk_1` (`idClientOwner_physique`),
  ADD KEY `compte_courant_ibfk_2` (`state`),
  ADD KEY `compte_courant_ibfk_3` (`idUserCreator`),
  ADD KEY `compte_courant_ibfk_4` (`agencyNumber`),
  ADD KEY `compte_courant_ibfk_5` (`agios`);

--
-- Index pour la table `compte_epargne_sx`
--
ALTER TABLE `compte_epargne_sx`
  ADD PRIMARY KEY (`id_compte_ep`),
  ADD UNIQUE KEY `accountNumber` (`accountNumber`),
  ADD KEY `compte_ibfk_2` (`state`),
  ADD KEY `compte_ibfk_3` (`idUserCreator`),
  ADD KEY `compte_ibfk_4` (`agencyNumber`),
  ADD KEY `compte_ibfk_5` (`openingFees`),
  ADD KEY `compte_ep_ibfk_6` (`idCliOwner_physique`),
  ADD KEY `compte_ep_ibfk_7` (`idCliOwner_moral`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `numEmployee` (`numEmployee`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cni` (`cni`),
  ADD UNIQUE KEY `telephone` (`telephone`),
  ADD KEY `agence` (`agence`),
  ADD KEY `employee_ibfk_2` (`userAccount`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id_etat`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `infoproclient`
--
ALTER TABLE `infoproclient`
  ADD PRIMARY KEY (`id_infoPro`),
  ADD KEY `infoProClient_ibfk_1` (`employeurCli`),
  ADD KEY `infoProClient_ibfk_2` (`idClient`);

--
-- Index pour la table `info_employeur`
--
ALTER TABLE `info_employeur`
  ADD PRIMARY KEY (`id_employeur`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `numIdentification` (`numIdentification`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `state` (`state`),
  ADD KEY `profil` (`profil`);

--
-- Index pour la table `opening_fees`
--
ALTER TABLE `opening_fees`
  ADD PRIMARY KEY (`id_fee`);

--
-- Index pour la table `oper_credit`
--
ALTER TABLE `oper_credit`
  ADD PRIMARY KEY (`id_credit`),
  ADD UNIQUE KEY `numOperCredit` (`numOperCredit`),
  ADD KEY `oper_credit_ibfk_1` (`state`),
  ADD KEY `oper_credit_ibfk_2` (`idEmpCreator`),
  ADD KEY `oper_credit_ibfk_3` (`agence`);

--
-- Index pour la table `oper_debit`
--
ALTER TABLE `oper_debit`
  ADD PRIMARY KEY (`id_debit`),
  ADD UNIQUE KEY `numOperDebit` (`numOperDebit`),
  ADD KEY `oper_debit_ibfk_1` (`state`),
  ADD KEY `oper_debit_ibfk_2` (`idEmpCreator`),
  ADD KEY `oper_debit_ibfk_3` (`agence`);

--
-- Index pour la table `oper_virement`
--
ALTER TABLE `oper_virement`
  ADD PRIMARY KEY (`id_OperVirement`),
  ADD UNIQUE KEY `numVirement` (`numVirement`),
  ADD KEY `oper_virement_ibfk_1` (`state`),
  ADD KEY `oper_virement_ibfk_2` (`idEmpCreator`),
  ADD KEY `oper_virement_ibfk_3` (`agence`);

--
-- Index pour la table `optionclient`
--
ALTER TABLE `optionclient`
  ADD PRIMARY KEY (`id_opt`),
  ADD KEY `state` (`state`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `state` (`state`);

--
-- Index pour la table `typecompte`
--
ALTER TABLE `typecompte`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `typeoperations`
--
ALTER TABLE `typeoperations`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `profil` (`profil`),
  ADD KEY `state` (`state`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agency`
--
ALTER TABLE `agency`
  MODIFY `id_agency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `agios`
--
ALTER TABLE `agios`
  MODIFY `id_agios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clientonlineaccount`
--
ALTER TABLE `clientonlineaccount`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_moral`
--
ALTER TABLE `client_moral`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_physique`
--
ALTER TABLE `client_physique`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  MODIFY `id_compte_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_courant_salary`
--
ALTER TABLE `compte_courant_salary`
  MODIFY `id_compte_cs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_epargne_sx`
--
ALTER TABLE `compte_epargne_sx`
  MODIFY `id_compte_ep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id_etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `infoproclient`
--
ALTER TABLE `infoproclient`
  MODIFY `id_infoPro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_employeur`
--
ALTER TABLE `info_employeur`
  MODIFY `id_employeur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `opening_fees`
--
ALTER TABLE `opening_fees`
  MODIFY `id_fee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `oper_credit`
--
ALTER TABLE `oper_credit`
  MODIFY `id_credit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `oper_debit`
--
ALTER TABLE `oper_debit`
  MODIFY `id_debit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `oper_virement`
--
ALTER TABLE `oper_virement`
  MODIFY `id_OperVirement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `optionclient`
--
ALTER TABLE `optionclient`
  MODIFY `id_opt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `typecompte`
--
ALTER TABLE `typecompte`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typeoperations`
--
ALTER TABLE `typeoperations`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agency`
--
ALTER TABLE `agency`
  ADD CONSTRAINT `agency_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`);

--
-- Contraintes pour la table `clientonlineaccount`
--
ALTER TABLE `clientonlineaccount`
  ADD CONSTRAINT `clientonlineaccount_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `clientonlineaccount_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `client_physique` (`id_client`);

--
-- Contraintes pour la table `client_moral`
--
ALTER TABLE `client_moral`
  ADD CONSTRAINT `client_moral_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`);

--
-- Contraintes pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  ADD CONSTRAINT `compte_bloque_ibfk_1` FOREIGN KEY (`idClientOwner_physique`) REFERENCES `client_physique` (`id_client`),
  ADD CONSTRAINT `compte_bloque_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `compte_bloque_ibfk_3` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `compte_bloque_ibfk_4` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`),
  ADD CONSTRAINT `compte_bloque_ibfk_5` FOREIGN KEY (`openingFees`) REFERENCES `opening_fees` (`id_fee`),
  ADD CONSTRAINT `compte_bloque_ibfk_6` FOREIGN KEY (`idClientOwner_moral`) REFERENCES `client_moral` (`id_client`);

--
-- Contraintes pour la table `compte_courant_salary`
--
ALTER TABLE `compte_courant_salary`
  ADD CONSTRAINT `compte_courant_ibfk_1` FOREIGN KEY (`idClientOwner_physique`) REFERENCES `client_physique` (`id_client`),
  ADD CONSTRAINT `compte_courant_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `compte_courant_ibfk_3` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `compte_courant_ibfk_4` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`),
  ADD CONSTRAINT `compte_courant_ibfk_5` FOREIGN KEY (`agios`) REFERENCES `agios` (`id_agios`);

--
-- Contraintes pour la table `compte_epargne_sx`
--
ALTER TABLE `compte_epargne_sx`
  ADD CONSTRAINT `compte_ep_ibfk_6` FOREIGN KEY (`idCliOwner_physique`) REFERENCES `client_physique` (`id_client`),
  ADD CONSTRAINT `compte_ep_ibfk_7` FOREIGN KEY (`idCliOwner_moral`) REFERENCES `client_moral` (`id_client`),
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `compte_ibfk_3` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `compte_ibfk_4` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`),
  ADD CONSTRAINT `compte_ibfk_5` FOREIGN KEY (`openingFees`) REFERENCES `opening_fees` (`id_fee`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`agence`) REFERENCES `agency` (`id_agency`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`userAccount`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `infoproclient`
--
ALTER TABLE `infoproclient`
  ADD CONSTRAINT `infoProClient_ibfk_1` FOREIGN KEY (`employeurCli`) REFERENCES `info_employeur` (`id_employeur`),
  ADD CONSTRAINT `infoProClient_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client_physique` (`id_client`);

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`profil`) REFERENCES `profil` (`id_profil`);

--
-- Contraintes pour la table `oper_credit`
--
ALTER TABLE `oper_credit`
  ADD CONSTRAINT `oper_credit_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `oper_credit_ibfk_2` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `oper_credit_ibfk_3` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`);

--
-- Contraintes pour la table `oper_debit`
--
ALTER TABLE `oper_debit`
  ADD CONSTRAINT `oper_debit_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `oper_debit_ibfk_2` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `oper_debit_ibfk_3` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`);

--
-- Contraintes pour la table `oper_virement`
--
ALTER TABLE `oper_virement`
  ADD CONSTRAINT `oper_virement_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  ADD CONSTRAINT `oper_virement_ibfk_2` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  ADD CONSTRAINT `oper_virement_ibfk_3` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`);

--
-- Contraintes pour la table `optionclient`
--
ALTER TABLE `optionclient`
  ADD CONSTRAINT `optionclient_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id_profil`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
