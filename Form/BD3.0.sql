CREATE DATABASE  IF NOT EXISTS `proyecto` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `proyecto`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `datosproyecto`
--

DROP TABLE IF EXISTS `datosproyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datosproyecto` (
  `idProyecto` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(25) DEFAULT NULL,
  `Introduccion` varchar(200) DEFAULT NULL,
  `Descripcion` text,
  `LinkVideo` varchar(150) DEFAULT NULL,
  `Alumno` int NOT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Banner` varchar(150) DEFAULT NULL,
  `orientacion` varchar(45) DEFAULT NULL,
  `Year` int DEFAULT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `Alumno_idx` (`Alumno`),
  CONSTRAINT `Alumno` FOREIGN KEY (`Alumno`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datosproyecto`
--

LOCK TABLES `datosproyecto` WRITE;
/*!40000 ALTER TABLE `datosproyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `datosproyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagenes` (
  `idImagen` int NOT NULL,
  `idProyecto` int NOT NULL,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`idImagen`),
  KEY `idProyecto` (`idProyecto`),
  CONSTRAINT `idProyecto` FOREIGN KEY (`idProyecto`) REFERENCES `datosproyecto` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_profesor`
--

DROP TABLE IF EXISTS `proyecto_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyecto_profesor` (
  `idProyecto` int NOT NULL,
  `idProfesor` int NOT NULL,
  `reponsable` int NOT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `id_Profesor_idx` (`idProfesor`),
  CONSTRAINT `id_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `id_Proyecto` FOREIGN KEY (`idProyecto`) REFERENCES `datosproyecto` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_profesor`
--

LOCK TABLES `proyecto_profesor` WRITE;
/*!40000 ALTER TABLE `proyecto_profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes_profesor`
--

DROP TABLE IF EXISTS `solicitudes_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes_profesor` (
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes_profesor`
--

LOCK TABLES `solicitudes_profesor` WRITE;
/*!40000 ALTER TABLE `solicitudes_profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitudes_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes_usuario`
--

DROP TABLE IF EXISTS `solicitudes_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes_usuario` (
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Titulo_Proyecto` varchar(45) DEFAULT NULL,
  `orientacion` varchar(45) DEFAULT NULL,
  `year` int DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes_usuario`
--

LOCK TABLES `solicitudes_usuario` WRITE;
/*!40000 ALTER TABLE `solicitudes_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitudes_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `TipoUsuario` int DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-01 19:52:16
