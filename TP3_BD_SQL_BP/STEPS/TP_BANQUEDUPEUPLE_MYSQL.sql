-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: tp_bd_bp_cli
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `affectation`
--

DROP TABLE IF EXISTS `affectation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affectation` (
  `id_affect` int(11) NOT NULL AUTO_INCREMENT,
  `affected_employee` int(11) NOT NULL,
  `agency` int(11) NOT NULL,
  `dateAffect` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_affect`),
  KEY `affected_employee` (`affected_employee`),
  KEY `agency` (`agency`),
  CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`affected_employee`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`agency`) REFERENCES `agency` (`id_agency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affectation`
--

LOCK TABLES `affectation` WRITE;
/*!40000 ALTER TABLE `affectation` DISABLE KEYS */;
/*!40000 ALTER TABLE `affectation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agency`
--

DROP TABLE IF EXISTS `agency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agency` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency`
--

LOCK TABLES `agency` WRITE;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
/*!40000 ALTER TABLE `agency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salaire` float DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `infoEmp` int(11) DEFAULT NULL,
  `cni` varchar(20) NOT NULL,
  `dateCreation` date DEFAULT NULL,
  `optionFunc` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `cni` (`cni`),
  KEY `infoEmp` (`infoEmp`),
  KEY `optionFunc` (`optionFunc`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`infoEmp`) REFERENCES `info_employeur` (`id_employeur`),
  CONSTRAINT `client_ibfk_2` FOREIGN KEY (`optionFunc`) REFERENCES `optionclient` (`id_func`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `accountNumber` varchar(50) NOT NULL,
  `cleRib` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `typeCompte` int(11) NOT NULL,
  `solde` float DEFAULT NULL,
  `state` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `closeDate` date DEFAULT NULL,
  `activedate` date DEFAULT NULL,
  `idUserCreator` int(11) NOT NULL,
  `agencyNumber` varchar(100) DEFAULT NULL,
  `dateDesactiv` date DEFAULT NULL,
  `delaiBloc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_compte`),
  UNIQUE KEY `accountNumber` (`accountNumber`),
  KEY `idClient` (`idClient`),
  KEY `typeCompte` (`typeCompte`),
  KEY `state` (`state`),
  KEY `idUserCreator` (`idUserCreator`),
  KEY `agencyNumber` (`agencyNumber`),
  CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id_client`),
  CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`typeCompte`) REFERENCES `typecompte` (`id_type`),
  CONSTRAINT `compte_ibfk_3` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `compte_ibfk_4` FOREIGN KEY (`idUserCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `compte_ibfk_5` FOREIGN KEY (`agencyNumber`) REFERENCES `agency` (`numAgency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compte`
--

LOCK TABLES `compte` WRITE;
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `numEmployee` varchar(100) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cni` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `agence` int(11) DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  PRIMARY KEY (`id_employee`),
  UNIQUE KEY `numEmployee` (`numEmployee`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cni` (`cni`),
  UNIQUE KEY `telephone` (`telephone`),
  KEY `agence` (`agence`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`agence`) REFERENCES `agency` (`id_agency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etats`
--

DROP TABLE IF EXISTS `etats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etats` (
  `id_etat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_etat`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etats`
--

LOCK TABLES `etats` WRITE;
/*!40000 ALTER TABLE `etats` DISABLE KEYS */;
/*!40000 ALTER TABLE `etats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_employeur`
--

DROP TABLE IF EXISTS `info_employeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_employeur` (
  `id_employeur` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSocial` varchar(150) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `numIdentification` varchar(50) NOT NULL,
  PRIMARY KEY (`id_employeur`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `numIdentification` (`numIdentification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_employeur`
--

LOCK TABLES `info_employeur` WRITE;
/*!40000 ALTER TABLE `info_employeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `info_employeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation`
--

DROP TABLE IF EXISTS `operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation` (
  `id_Operation` int(11) NOT NULL AUTO_INCREMENT,
  `numOperation` varchar(50) NOT NULL,
  `typeOperation` int(11) NOT NULL,
  `operDate` date NOT NULL,
  `montantOper` float NOT NULL,
  `state` int(11) NOT NULL,
  `fromAccount` int(11) NOT NULL,
  `toAccount` int(11) NOT NULL,
  `idEmpCreator` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `agence` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_Operation`),
  UNIQUE KEY `numOperation` (`numOperation`),
  KEY `typeOperation` (`typeOperation`),
  KEY `state` (`state`),
  KEY `fromAccount` (`fromAccount`),
  KEY `toAccount` (`toAccount`),
  KEY `idEmpCreator` (`idEmpCreator`),
  KEY `agence` (`agence`),
  CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`typeOperation`) REFERENCES `typeoper` (`id_type`),
  CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`),
  CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`fromAccount`) REFERENCES `compte` (`id_compte`),
  CONSTRAINT `operation_ibfk_4` FOREIGN KEY (`toAccount`) REFERENCES `compte` (`id_compte`),
  CONSTRAINT `operation_ibfk_5` FOREIGN KEY (`idEmpCreator`) REFERENCES `employee` (`id_employee`),
  CONSTRAINT `operation_ibfk_6` FOREIGN KEY (`agence`) REFERENCES `agency` (`numAgency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation`
--

LOCK TABLES `operation` WRITE;
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `optionclient`
--

DROP TABLE IF EXISTS `optionclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `optionclient` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_func`),
  KEY `state` (`state`),
  CONSTRAINT `optionclient_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `optionclient`
--

LOCK TABLES `optionclient` WRITE;
/*!40000 ALTER TABLE `optionclient` DISABLE KEYS */;
/*!40000 ALTER TABLE `optionclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_profil`),
  UNIQUE KEY `nom` (`nom`),
  KEY `state` (`state`),
  CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`state`) REFERENCES `etats` (`id_etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecompte`
--

DROP TABLE IF EXISTS `typecompte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typecompte` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecompte`
--

LOCK TABLES `typecompte` WRITE;
/*!40000 ALTER TABLE `typecompte` DISABLE KEYS */;
/*!40000 ALTER TABLE `typecompte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeoper`
--

DROP TABLE IF EXISTS `typeoper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeoper` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeoper`
--

LOCK TABLES `typeoper` WRITE;
/*!40000 ALTER TABLE `typeoper` DISABLE KEYS */;
/*!40000 ALTER TABLE `typeoper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-16 15:10:48
