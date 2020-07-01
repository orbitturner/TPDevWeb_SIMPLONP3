-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table tp4_bp_simplon. agency
CREATE TABLE IF NOT EXISTS `agency` (
  `id_agency` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `creationDate` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `numAgency` varchar(50) NOT NULL,
  PRIMARY KEY (`id_agency`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `numAgency` (`numAgency`),
  KEY `state` (`state`),
  CONSTRAINT `agency_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. agios
CREATE TABLE IF NOT EXISTS `agios` (
  `id_agios` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `montant` varchar(50) NOT NULL,
  `iteration` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_agios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. clientonlineaccount
CREATE TABLE IF NOT EXISTS `clientonlineaccount` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `dateCreation` date NOT NULL,
  `owner` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_account`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `owner` (`owner`),
  KEY `clientonlineaccount_ibfk_1` (`state`),
  CONSTRAINT `clientonlineaccount_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `clientonlineaccount_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `client_physique` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. client_moral
CREATE TABLE IF NOT EXISTS `client_moral` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `numIdentification` varchar(255) NOT NULL,
  `nom_entreprise` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `dateCreation` date NOT NULL,
  `features` varchar(50) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `numIdentification` (`numIdentification`),
  KEY `client_moral_ibfk_1` (`state`),
  CONSTRAINT `client_moral_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. client_physique
CREATE TABLE IF NOT EXISTS `client_physique` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
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
  `isSalarie` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `cni` (`cni`),
  UNIQUE KEY `numIdentification` (`numIdentification`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. compte_bloque
CREATE TABLE IF NOT EXISTS `compte_bloque` (
  `id_compte_bl` int(11) NOT NULL AUTO_INCREMENT,
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
  `first_depot` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id_compte_bl`),
  UNIQUE KEY `accountNumber` (`accountNumber`),
  KEY `compte_bloque_ibfk_6` (`idClientOwner_moral`),
  KEY `compte_bloque_ibfk_1` (`idClientOwner_physique`),
  KEY `compte_bloque_ibfk_2` (`state`),
  KEY `compte_bloque_ibfk_3` (`idUserCreator`),
  KEY `compte_bloque_ibfk_4` (`agencyNumber`),
  KEY `compte_bloque_ibfk_5` (`openingFees`),
  CONSTRAINT `compte_bloque_ibfk_1` FOREIGN KEY (`idClientOwner_physique`) REFERENCES `client_physique` (`id_client`),
  CONSTRAINT `compte_bloque_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `compte_bloque_ibfk_3` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `compte_bloque_ibfk_4` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`),
  CONSTRAINT `compte_bloque_ibfk_5` FOREIGN KEY (`openingFees`) REFERENCES `opening_fees` (`id_fee`),
  CONSTRAINT `compte_bloque_ibfk_6` FOREIGN KEY (`idClientOwner_moral`) REFERENCES `client_moral` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. compte_courant_salary
CREATE TABLE IF NOT EXISTS `compte_courant_salary` (
  `id_compte_cs` int(11) NOT NULL AUTO_INCREMENT,
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
  `closeDate` date DEFAULT NULL,
  PRIMARY KEY (`id_compte_cs`),
  UNIQUE KEY `accountNumber` (`accountNumber`),
  KEY `compte_courant_ibfk_1` (`idClientOwner_physique`),
  KEY `compte_courant_ibfk_2` (`state`),
  KEY `compte_courant_ibfk_3` (`idUserCreator`),
  KEY `compte_courant_ibfk_4` (`agencyNumber`),
  KEY `compte_courant_ibfk_5` (`agios`),
  CONSTRAINT `compte_courant_ibfk_1` FOREIGN KEY (`idClientOwner_physique`) REFERENCES `client_physique` (`id_client`),
  CONSTRAINT `compte_courant_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `compte_courant_ibfk_3` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `compte_courant_ibfk_4` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`),
  CONSTRAINT `compte_courant_ibfk_5` FOREIGN KEY (`agios`) REFERENCES `agios` (`id_agios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. compte_epargne_sx
CREATE TABLE IF NOT EXISTS `compte_epargne_sx` (
  `id_compte_ep` int(11) NOT NULL AUTO_INCREMENT,
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
  `closeDate` date DEFAULT NULL,
  PRIMARY KEY (`id_compte_ep`),
  UNIQUE KEY `accountNumber` (`accountNumber`),
  KEY `compte_ibfk_6` (`idClientOwner_moral`),
  KEY `compte_ibfk_1` (`idClientOwner_physique`),
  KEY `compte_ibfk_2` (`state`),
  KEY `compte_ibfk_3` (`idUserCreator`),
  KEY `compte_ibfk_4` (`agencyNumber`),
  KEY `compte_ibfk_5` (`openingFees`),
  CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idClientOwner_physique`) REFERENCES `client_physique` (`id_client`),
  CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `compte_ibfk_3` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `compte_ibfk_4` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`),
  CONSTRAINT `compte_ibfk_5` FOREIGN KEY (`openingFees`) REFERENCES `opening_fees` (`id_fee`),
  CONSTRAINT `compte_ibfk_6` FOREIGN KEY (`idClientOwner_moral`) REFERENCES `client_moral` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id_employee` int(11) NOT NULL AUTO_INCREMENT,
  `numEmployee` varchar(100) NOT NULL,
  `userAccount` int(11) unsigned DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cni` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `sexe` char(2) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `agence` int(11) DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  PRIMARY KEY (`id_employee`),
  UNIQUE KEY `numEmployee` (`numEmployee`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cni` (`cni`),
  UNIQUE KEY `telephone` (`telephone`),
  KEY `agence` (`agence`),
  KEY `employee_ibfk_2` (`userAccount`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`agence`) REFERENCES `agency` (`id_agency`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`userAccount`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. etats
CREATE TABLE IF NOT EXISTS `etats` (
  `id_etat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_etat`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. infoproclient
CREATE TABLE IF NOT EXISTS `infoproclient` (
  `id_infoPro` int(11) NOT NULL AUTO_INCREMENT,
  `profession` varchar(150) NOT NULL,
  `salaire` float NOT NULL,
  `idClient` int(11) NOT NULL,
  `employeurCli` int(11) NOT NULL,
  PRIMARY KEY (`id_infoPro`),
  KEY `infoProClient_ibfk_1` (`employeurCli`),
  KEY `infoProClient_ibfk_2` (`idClient`),
  CONSTRAINT `infoProClient_ibfk_1` FOREIGN KEY (`employeurCli`) REFERENCES `info_employeur` (`id_employeur`),
  CONSTRAINT `infoProClient_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client_physique` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. info_employeur
CREATE TABLE IF NOT EXISTS `info_employeur` (
  `id_employeur` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSocial` varchar(150) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `numIdentification` varchar(50) NOT NULL,
  PRIMARY KEY (`id_employeur`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `numIdentification` (`numIdentification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. modules
CREATE TABLE IF NOT EXISTS `modules` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  `profil` int(11) NOT NULL,
  PRIMARY KEY (`id_module`),
  UNIQUE KEY `nom` (`nom`),
  KEY `state` (`state`),
  KEY `profil` (`profil`),
  CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`profil`) REFERENCES `profil` (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. opening_fees
CREATE TABLE IF NOT EXISTS `opening_fees` (
  `id_fee` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `montant` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. oper_credit
CREATE TABLE IF NOT EXISTS `oper_credit` (
  `id_credit` int(11) NOT NULL AUTO_INCREMENT,
  `numOperCredit` varchar(50) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL,
  `accountNumber` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_credit`),
  UNIQUE KEY `numOperCredit` (`numOperCredit`),
  KEY `oper_credit_ibfk_1` (`state`),
  KEY `oper_credit_ibfk_2` (`idEmpCreator`),
  KEY `oper_credit_ibfk_3` (`agence`),
  CONSTRAINT `oper_credit_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `oper_credit_ibfk_2` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `oper_credit_ibfk_3` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. oper_debit
CREATE TABLE IF NOT EXISTS `oper_debit` (
  `id_debit` int(11) NOT NULL AUTO_INCREMENT,
  `numOperDebit` varchar(50) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL,
  `accountNumber` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_debit`),
  UNIQUE KEY `numOperDebit` (`numOperDebit`),
  KEY `oper_debit_ibfk_1` (`state`),
  KEY `oper_debit_ibfk_2` (`idEmpCreator`),
  KEY `oper_debit_ibfk_3` (`agence`),
  CONSTRAINT `oper_debit_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `oper_debit_ibfk_2` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `oper_debit_ibfk_3` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. oper_virement
CREATE TABLE IF NOT EXISTS `oper_virement` (
  `id_OperVirement` int(11) NOT NULL AUTO_INCREMENT,
  `numVirement` varchar(50) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `fromAccount` varchar(50) NOT NULL,
  `toAccount` varchar(50) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_OperVirement`),
  UNIQUE KEY `numVirement` (`numVirement`),
  KEY `oper_virement_ibfk_1` (`state`),
  KEY `oper_virement_ibfk_2` (`idEmpCreator`),
  KEY `oper_virement_ibfk_3` (`agence`),
  CONSTRAINT `oper_virement_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `oper_virement_ibfk_2` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `oper_virement_ibfk_3` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. optionclient
CREATE TABLE IF NOT EXISTS `optionclient` (
  `id_opt` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_opt`),
  KEY `state` (`state`),
  CONSTRAINT `optionclient_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_profil`),
  UNIQUE KEY `nom` (`nom`),
  KEY `state` (`state`),
  CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. typecompte
CREATE TABLE IF NOT EXISTS `typecompte` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. typeoperations
CREATE TABLE IF NOT EXISTS `typeoperations` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table tp4_bp_simplon. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(200) DEFAULT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profil` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `dateCreation` date DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`),
  KEY `profil` (`profil`),
  KEY `state` (`state`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`profil`) REFERENCES `profil` (`id_profil`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
