-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: chessuy
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `estadisticas`
--

DROP TABLE IF EXISTS `estadisticas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadisticas` (
  `Usuario` varchar(45) DEFAULT NULL,
  `ELO` int DEFAULT NULL,
  `Victorias` int DEFAULT NULL,
  `Tablas` int DEFAULT NULL,
  `Derrotas` int DEFAULT NULL,
  `Coronaciones` int DEFAULT NULL,
  `Comidas` int DEFAULT NULL,
  `Menos_Tiempo` int DEFAULT NULL,
  `Menos_Movimientos` int DEFAULT NULL,
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadisticas`
--

LOCK TABLES `estadisticas` WRITE;
/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagen` (
  `ID_Imagen` int NOT NULL AUTO_INCREMENT,
  `ID_Noticia` int DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Imagen`),
  KEY `ID_Noticia` (`ID_Noticia`),
  CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`ID_Noticia`) REFERENCES `noticia` (`ID_Noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen`
--

LOCK TABLES `imagen` WRITE;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugada`
--

DROP TABLE IF EXISTS `jugada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jugada` (
  `ID_Partido` int DEFAULT NULL,
  `ID_Pieza` int NOT NULL AUTO_INCREMENT,
  `Valor` varchar(45) DEFAULT NULL,
  `Posicion` int DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Pieza`),
  KEY `ID_Partido` (`ID_Partido`),
  CONSTRAINT `jugada_ibfk_1` FOREIGN KEY (`ID_Partido`) REFERENCES `partidas_agendadas` (`ID_Partido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugada`
--

LOCK TABLES `jugada` WRITE;
/*!40000 ALTER TABLE `jugada` DISABLE KEYS */;
/*!40000 ALTER TABLE `jugada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugadas`
--

DROP TABLE IF EXISTS `jugadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jugadas` (
  `ID_Jugadas` int NOT NULL AUTO_INCREMENT,
  `Jugadas` varchar(9999) DEFAULT NULL,
  `Turno` int DEFAULT NULL,
  `ID_Problema` int DEFAULT NULL,
  PRIMARY KEY (`ID_Jugadas`),
  KEY `ID_Problema` (`ID_Problema`),
  CONSTRAINT `jugadas_ibfk_1` FOREIGN KEY (`ID_Problema`) REFERENCES `problema` (`ID_Problema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugadas`
--

LOCK TABLES `jugadas` WRITE;
/*!40000 ALTER TABLE `jugadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `jugadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logro`
--

DROP TABLE IF EXISTS `logro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logro` (
  `ID_Logro` int NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Imagen` varchar(100) DEFAULT NULL,
  `Procentaje` int DEFAULT NULL,
  PRIMARY KEY (`ID_Logro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logro`
--

LOCK TABLES `logro` WRITE;
/*!40000 ALTER TABLE `logro` DISABLE KEYS */;
/*!40000 ALTER TABLE `logro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mangas` (
  `ID_Mangas` int NOT NULL AUTO_INCREMENT,
  `Ronda` int DEFAULT NULL,
  `ID_Torneo` int DEFAULT NULL,
  PRIMARY KEY (`ID_Mangas`),
  KEY `ID_Torneo` (`ID_Torneo`),
  CONSTRAINT `mangas_ibfk_1` FOREIGN KEY (`ID_Torneo`) REFERENCES `torneo` (`ID_Torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mangas`
--

LOCK TABLES `mangas` WRITE;
/*!40000 ALTER TABLE `mangas` DISABLE KEYS */;
/*!40000 ALTER TABLE `mangas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticia` (
  `Usuario` varchar(45) DEFAULT NULL,
  `ID_Noticia` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Informacion` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`ID_Noticia`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante`
--

DROP TABLE IF EXISTS `participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participante` (
  `Usuario` varchar(45) DEFAULT NULL,
  `Puntos` int DEFAULT NULL,
  `Coronaciones` int DEFAULT NULL,
  `Comidas` int DEFAULT NULL,
  `Menos_Tiempo` int DEFAULT NULL,
  `Menos_Movimientos` int DEFAULT NULL,
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante`
--

LOCK TABLES `participante` WRITE;
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante_manga`
--

DROP TABLE IF EXISTS `participante_manga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participante_manga` (
  `ID_Mangas` int DEFAULT NULL,
  `ID_Torneo` int DEFAULT NULL,
  KEY `ID_Torneo` (`ID_Torneo`),
  KEY `ID_Mangas` (`ID_Mangas`),
  CONSTRAINT `participante_manga_ibfk_1` FOREIGN KEY (`ID_Torneo`) REFERENCES `torneo` (`ID_Torneo`),
  CONSTRAINT `participante_manga_ibfk_2` FOREIGN KEY (`ID_Mangas`) REFERENCES `mangas` (`ID_Mangas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante_manga`
--

LOCK TABLES `participante_manga` WRITE;
/*!40000 ALTER TABLE `participante_manga` DISABLE KEYS */;
/*!40000 ALTER TABLE `participante_manga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida`
--

DROP TABLE IF EXISTS `partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partida` (
  `ID_Partido` int DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Turno` int DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Tiempo` varchar(45) DEFAULT NULL,
  KEY `ID_Partido` (`ID_Partido`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`ID_Partido`) REFERENCES `partidas_agendadas` (`ID_Partido`),
  CONSTRAINT `partida_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida`
--

LOCK TABLES `partida` WRITE;
/*!40000 ALTER TABLE `partida` DISABLE KEYS */;
/*!40000 ALTER TABLE `partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidas_agendadas`
--

DROP TABLE IF EXISTS `partidas_agendadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partidas_agendadas` (
  `ID_Mangas` int DEFAULT NULL,
  `ID_Partido` int NOT NULL AUTO_INCREMENT,
  `Fecha_Partido` date DEFAULT NULL,
  `Hora_Partido` time DEFAULT NULL,
  `Blancas` varchar(45) DEFAULT NULL,
  `Negras` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Partido`),
  KEY `ID_Mangas` (`ID_Mangas`),
  CONSTRAINT `partidas_agendadas_ibfk_1` FOREIGN KEY (`ID_Mangas`) REFERENCES `mangas` (`ID_Mangas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidas_agendadas`
--

LOCK TABLES `partidas_agendadas` WRITE;
/*!40000 ALTER TABLE `partidas_agendadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `partidas_agendadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `podcast`
--

DROP TABLE IF EXISTS `podcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `podcast` (
  `ID_Podcast` int NOT NULL AUTO_INCREMENT,
  `ID_Noticia` int DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Podcast`),
  KEY `ID_Noticia` (`ID_Noticia`),
  CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`ID_Noticia`) REFERENCES `noticia` (`ID_Noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podcast`
--

LOCK TABLES `podcast` WRITE;
/*!40000 ALTER TABLE `podcast` DISABLE KEYS */;
/*!40000 ALTER TABLE `podcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problema`
--

DROP TABLE IF EXISTS `problema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `problema` (
  `ID_Problema` int NOT NULL AUTO_INCREMENT,
  `Tiempo` time DEFAULT NULL,
  `CantidadMovimientos` int DEFAULT NULL,
  `ELO` int DEFAULT NULL,
  PRIMARY KEY (`ID_Problema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problema`
--

LOCK TABLES `problema` WRITE;
/*!40000 ALTER TABLE `problema` DISABLE KEYS */;
/*!40000 ALTER TABLE `problema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes` (
  `Tipo` int DEFAULT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `CI` int DEFAULT NULL,
  `Año` int DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Institucion` varchar(60) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Contacto` varchar(45) DEFAULT NULL,
  `Contrasenia` varchar(45) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torneo`
--

DROP TABLE IF EXISTS `torneo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `torneo` (
  `ID_Torneo` int NOT NULL AUTO_INCREMENT,
  `Rondas` int DEFAULT NULL,
  `ELO_Min` int DEFAULT NULL,
  `ELO_Max` int DEFAULT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Fecha_fin` date DEFAULT NULL,
  `Numero_Participantes` int DEFAULT NULL,
  `Primero` varchar(45) DEFAULT NULL,
  `Segundo` varchar(45) DEFAULT NULL,
  `Tercero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Torneo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneo`
--

LOCK TABLES `torneo` WRITE;
/*!40000 ALTER TABLE `torneo` DISABLE KEYS */;
/*!40000 ALTER TABLE `torneo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trofeo`
--

DROP TABLE IF EXISTS `trofeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trofeo` (
  `ID_Trofeo` int NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Trofeo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trofeo`
--

LOCK TABLES `trofeo` WRITE;
/*!40000 ALTER TABLE `trofeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `trofeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `Tipo` int DEFAULT NULL,
  `Usuario` varchar(45) NOT NULL,
  `CI` int DEFAULT NULL,
  `Año` int DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Institucion` varchar(60) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Contacto` varchar(45) DEFAULT NULL,
  `Contrasenia` varchar(45) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariologro`
--

DROP TABLE IF EXISTS `usuariologro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariologro` (
  `Usuario` varchar(45) DEFAULT NULL,
  `ID_Logro` int DEFAULT NULL,
  KEY `ID_Logro` (`ID_Logro`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `usuariologro_ibfk_1` FOREIGN KEY (`ID_Logro`) REFERENCES `logro` (`ID_Logro`),
  CONSTRAINT `usuariologro_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariologro`
--

LOCK TABLES `usuariologro` WRITE;
/*!40000 ALTER TABLE `usuariologro` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariologro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariotrofeo`
--

DROP TABLE IF EXISTS `usuariotrofeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariotrofeo` (
  `Usuario` varchar(45) DEFAULT NULL,
  `ID_Trofeo` int DEFAULT NULL,
  KEY `ID_Trofeo` (`ID_Trofeo`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `usuariotrofeo_ibfk_1` FOREIGN KEY (`ID_Trofeo`) REFERENCES `trofeo` (`ID_Trofeo`),
  CONSTRAINT `usuariotrofeo_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariotrofeo`
--

LOCK TABLES `usuariotrofeo` WRITE;
/*!40000 ALTER TABLE `usuariotrofeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariotrofeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'chessuy'
--
/*!50003 DROP PROCEDURE IF EXISTS `BorarSolicitud` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorarSolicitud`(In Usu Varchar(60))
BEGIN
	Delete from Solicitudes where Usuario = Usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CrearTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearTorneo`(IN ron int,IN EloMinimo int, IN EloMaximo int,IN Fechai date,In fechaf date,IN NumP int)
BEGIN
	Insert into Torneo (Rondas,ELO_Min,ELO_Max,Fecha_inicio,Fecha_fin,Numero_Participantes)value(ron,EloMinimo,EloMaximo,Fechai,fechaf,NumP);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoSolicitudes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoSolicitudes`()
BEGIN
	Select * From Solicitudes;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoUsuarios`()
BEGIN
	select * from usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Login`(IN username varchar(60),IN pass Varchar(60))
BEGIN
	SELECT * FROM usuario where Usuario=username and contrasenia=pass;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Register` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Register`(IN Tip INT,IN Usu Varchar(60),IN Cedula INT,IN an INT,IN Ape Varchar(60),IN Inst Varchar(60),IN Nom Varchar(60),IN Cont Varchar(60),IN Pass Varchar(60),IN Nac Date,IN Mai Varchar(100))
BEGIN
	if(not exists(select * from usuario where Usuario = Usu))then
		if(not exists(select * from Solicitudes where Usuario = Usu))then
			if(tip =  1)then
				insert into usuario(Tipo,Usuario,CI,Año,Apellido,Institucion,Nombre,Contacto,Contrasenia,Nacimiento,Mail)value(Tip,Usu,Cedula,an,Ape,Inst,Nom,Cont,Pass,Nac,Mai);
			else
				insert into Solicitudes(Tipo,Usuario,CI,Año,Apellido,Institucion,Nombre,Contacto,Contrasenia,Nacimiento,Mail)value(Tip,Usu,Cedula,an,Ape,Inst,Nom,Cont,Pass,Nac,Mai);
			end if;
		end if;
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-07 15:52:55
