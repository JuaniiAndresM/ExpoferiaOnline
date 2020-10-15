-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: expoeduca.liceoiep.edu.uy    Database: expoeduc_expoeduca
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `datosProyecto`
--

DROP TABLE IF EXISTS `datosProyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datosProyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `Banner` varchar(150) DEFAULT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Introduccion` varchar(250) DEFAULT NULL,
  `Descripcion` longtext,
  `Alumno_Responsable` int(11) NOT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Orientacion` int(11) DEFAULT NULL,
  `ndolocal` int(11) DEFAULT NULL,
  `ImagenPrincipal` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `fkAlumno_idx` (`Alumno_Responsable`),
  KEY `fkOrientacion_idx` (`Orientacion`),
  CONSTRAINT `fkAlumno` FOREIGN KEY (`Alumno_Responsable`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encuestas` (
  `idProyecto` int(11) DEFAULT NULL,
  `Sexo` int(11) DEFAULT NULL,
  `Edad` varchar(45) DEFAULT NULL,
  `ColoresObservados` int(11) DEFAULT NULL COMMENT '1=Blanco y Dorado\n2=Azul y Negro',
  `Diurnos_Nocturnos` int(11) DEFAULT NULL COMMENT '1=Diurnos\n2=Nocturnos',
  `OtrosColores` varchar(50) DEFAULT NULL COMMENT 'Por si no ve ninguno de los colores que se suponen que tiene que ver se agrega aca los colores que vio',
  KEY `fkProyectoEncuestas_idx` (`idProyecto`),
  CONSTRAINT `fkProyectoEncuestas` FOREIGN KEY (`idProyecto`) REFERENCES `datosProyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) DEFAULT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImagen`),
  KEY `fkProyectoImg_idx` (`idProyecto`),
  CONSTRAINT `fkProyectoImg` FOREIGN KEY (`idProyecto`) REFERENCES `datosProyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orientaciones`
--

DROP TABLE IF EXISTS `orientaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orientaciones` (
  `Nombre` varchar(40) DEFAULT NULL,
  `idOrientacion` int(11) NOT NULL,
  `Local` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrientacion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proyectoProfesor`
--

DROP TABLE IF EXISTS `proyectoProfesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyectoProfesor` (
  `idProyecto` int(11) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `Responsable` tinyint(4) DEFAULT NULL,
  KEY `fkProyecto_idx` (`idProyecto`),
  KEY `fkProfesor_idx` (`idProfesor`),
  CONSTRAINT `fkProfesor` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkProyecto` FOREIGN KEY (`idProyecto`) REFERENCES `datosProyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `solicitud_profesor`
--

DROP TABLE IF EXISTS `solicitud_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_profesor` (
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `idSoliProf` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idSoliProf`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `solicitud_usuario`
--

DROP TABLE IF EXISTS `solicitud_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_usuario` (
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Titulo_Proyecto` varchar(45) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Orientacion` int(11) DEFAULT NULL,
  `idSoli_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idSoli_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `TipoUsuario` int(11) DEFAULT NULL COMMENT '0 = Administrador\n1 = Profesor\n2 = Alumno',
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `url` varchar(150) DEFAULT NULL,
  `idVideo` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVideo`),
  KEY `fkProyectoVideo_idx` (`idProyecto`),
  CONSTRAINT `fkProyectoVideo` FOREIGN KEY (`idProyecto`) REFERENCES `datosProyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-15 12:55:35
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: expoeduca.liceoiep.edu.uy    Database: expoeduc_salajuegos
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `juegos`
--

DROP TABLE IF EXISTS `juegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juegos` (
  `id_juego` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_juego` varchar(50) NOT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puntaje` (
  `id_puntaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_juego` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_bin NOT NULL,
  `puntos_j` int(11) NOT NULL,
  PRIMARY KEY (`id_puntaje`),
  KEY `fkuno` (`id_juego`),
  KEY `fkdos` (`usuario`),
  CONSTRAINT `fkdos` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`),
  CONSTRAINT `fkuno` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id_juego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usuario` varchar(25) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `contra` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-15 12:55:35
