-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 179.27.156.47    Database: chessuy
-- ------------------------------------------------------
-- Server version	8.0.26

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
  CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadisticas`
--

LOCK TABLES `estadisticas` WRITE;
/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
INSERT INTO `estadisticas` VALUES ('ByJuanii_',2479,9,1,13,1,4,41,1),('BOT',2500,1,1,1,1,1,1,1),('EL7Seven',58,1,2,2,0,0,21,2),('El_Tomy',20,13,4,20,1,27,2,1),('Maty2914',2975,41,11,30,145,25,1,1),('Administrador',2500,0,0,0,0,0,0,0),(NULL,2500,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('ProfSergio',600,0,0,0,0,0,0,0),('Grilloldo',1500,0,0,0,0,0,0,0),('Agustin',1800,0,0,0,0,0,0,0),('OmeroRaperoNoFake',2500,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foto` (
  `ID_Foto` int NOT NULL,
  `URL` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_Foto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto`
--

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infopartida`
--

DROP TABLE IF EXISTS `infopartida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infopartida` (
  `ID_Torneo` int NOT NULL,
  `Jugador1` varchar(45) NOT NULL,
  `Jugador2` varchar(45) NOT NULL,
  `Fecha` datetime NOT NULL,
  `ronda` int NOT NULL,
  KEY `Torneo_idx` (`ID_Torneo`),
  KEY `Jug1_idx` (`Jugador1`),
  KEY `jug2_idx` (`Jugador2`),
  CONSTRAINT `Jug1` FOREIGN KEY (`Jugador1`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jug2` FOREIGN KEY (`Jugador2`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Torneo` FOREIGN KEY (`ID_Torneo`) REFERENCES `torneo` (`ID_Torneo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infopartida`
--

LOCK TABLES `infopartida` WRITE;
/*!40000 ALTER TABLE `infopartida` DISABLE KEYS */;
/*!40000 ALTER TABLE `infopartida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juego`
--

DROP TABLE IF EXISTS `juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juego` (
  `ID_Partido` int NOT NULL AUTO_INCREMENT,
  `Usuario1` varchar(45) DEFAULT NULL,
  `Usuario2` varchar(45) DEFAULT NULL,
  `Turno` int DEFAULT NULL,
  `Color1` varchar(45) DEFAULT NULL,
  `Color2` varchar(45) DEFAULT NULL,
  `Tablero` longtext,
  `Estado` tinyint DEFAULT NULL,
  `Movimientos` longtext,
  `Torneo` int DEFAULT NULL,
  `Jaque1` longtext,
  `Jaque2` longtext,
  `Barra` int DEFAULT NULL,
  `Tiempo1` varchar(45) DEFAULT NULL,
  `Tiempo2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Partido`),
  KEY `Usuario` (`Usuario1`),
  KEY `partida_ibfk_3_idx` (`Usuario2`),
  CONSTRAINT `juego_ibfk_2` FOREIGN KEY (`Usuario1`) REFERENCES `usuario` (`Usuario`),
  CONSTRAINT `juego_ibfk_3` FOREIGN KEY (`Usuario2`) REFERENCES `usuario` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego`
--

LOCK TABLES `juego` WRITE;
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugadas`
--

DROP TABLE IF EXISTS `jugadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jugadas` (
  `ID_Jugadas` int NOT NULL AUTO_INCREMENT,
  `Pieza` varchar(45) DEFAULT NULL,
  `Turno` int DEFAULT NULL,
  `ID_Problema` int DEFAULT NULL,
  `Y` int DEFAULT NULL,
  `X` int DEFAULT NULL,
  `XNULL` int DEFAULT NULL,
  `YNULL` int DEFAULT NULL,
  PRIMARY KEY (`ID_Jugadas`),
  KEY `ID_Problema` (`ID_Problema`),
  CONSTRAINT `jugadas_ibfk_1` FOREIGN KEY (`ID_Problema`) REFERENCES `problema` (`ID_Problema`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugadas`
--

LOCK TABLES `jugadas` WRITE;
/*!40000 ALTER TABLE `jugadas` DISABLE KEYS */;
INSERT INTO `jugadas` VALUES (4,'cn',1,6,3,3,0,0),(5,'an',1,7,3,8,0,0),(6,'p',2,7,3,8,7,2),(7,'dn',3,7,3,8,0,0);
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
  `Descripcion` varchar(300) DEFAULT NULL,
  `Imagen` varchar(100) DEFAULT NULL,
  `Procentaje` int DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Logro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logro`
--

LOCK TABLES `logro` WRITE;
/*!40000 ALTER TABLE `logro` DISABLE KEYS */;
INSERT INTO `logro` VALUES (1,'Haz comenzado tu camino hacia la grandeza consiguiendo tu primera victoria ','/cyberhydra/media/images/Logro_1.png',25,'Primeros Pasos'),(2,'Te estás volviendo un experto en el area despues de haber ganado 10 partidas pero aún falta camino por recorrer','/cyberhydra/media/images/Logro_2.png',12,'Todo un Aficionado'),(3,'Eres un completo maestro en este juego ya que has alcanzado la gran cifra de 100 victorias','/cyberhydra/media/images/Logro_3.png',12,'El Maestro'),(4,'Después de un partido muy intenso lo que te ha llevado a la derrota ha sido el tiempo ','/cyberhydra/media/images/Logro_4.png',18,'Reloj Agotado'),(5,'Haz recorrido un camino muy largo con 10 de tus peones hasta que se han vuelto grandes guerreros','/cyberhydra/media/images/Logro_5.png',6,'Ascensión'),(6,'Tu y tus guerreros han matado a 100 enemigos','/cyberhydra/media/images/Logro_6.png',0,'Asesino'),(7,'Has aniquilado a un batallón de 1000 soldados','/cyberhydra/media/images/Logro_7.png',0,'Genocida'),(8,'Has ganado tan rápido que no pasaron ni 15 segundos','/cyberhydra/media/images/Logro_8.png',25,'Flash'),(9,'Tus 2 movimientos tan precisos han derribado al rival con gran velocidad','/cyberhydra/media/images/Logro_9.png',12,'Manos Rápidas'),(10,'Te has coronado como el mayor jugador dentro de un torneo','/cyberhydra/media/images/Logro_10.png',0,'Campeón');
/*!40000 ALTER TABLE `logro` ENABLE KEYS */;
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
  `Informacion` longtext,
  `IMG` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Noticia`),
  KEY `Usuario` (`Usuario`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` VALUES ('Periodista',15,'Journo Ipsum','A lorem ipsum generator for future-of-news nerds','<p>Tumblr iPhone app syndicated Nick Denton production of innocence social media optimization Kindle Single API Bill Keller Fuego curation, if the news is that important, it&#39;ll find me Dan Fleckner plagiarism Like button Google News media diet Gutenberg parenthesis The Daily hyperlocal Google+, backpack journalist bringing a tote bag to a knife fight dead trees Walter Lippmann newsroom cafe Innovator&#39;s Dilemma Article Skimmer production of innocence awesome Dan Fleckner, Frontline tablets Romenesko awesome TweetDeck Twitter topples dictators Jeff Jarvis prostate AOL going forward.</p><p> </p><p>ProPublica vast wasteland Dayton for under $900 a day layoffs paywall twitterati newsonomics, the notion of the public Dayton for under $900 a day stream future Project Thunderdome, news.me church of the savvy Voice of San Diego Frontline Fuego. tools data journalism Free Darko #twittermakesyoustupid Quora Knight Foundation Google News TBD monetization I saw it on Mediagazer Kindle Single a giant stack of newspapers that you&#39;ll never read, Knight News Challenge Josh Marshall plagiarism +1 commons-based peer production Walter Cronkite died for your sins crowdsourcing reporting anonymity Kindle Single put the paper to bed curmudgeon, Gardening & War section tweets DocumentCloud twitterati Gutenberg curation writing filters linking Arianna.</p>','/cyberhydra/Usuarios/Periodista/imagenes_noticias/Exterior_1280x683_34.jpg'),('Maty2914',19,'Tablero','Nuestro Tablero','<p>Este es nuestro tablero</p>','/ChessUY/Usuarios/Periodista/imagenes_noticias/Tablero.PNG'),('Maty2914',20,'Trofeos','trofeos','<p>Participa de nuestros torneos para poder ganar trofeos.</p>','/ChessUY/Usuarios/Periodista/imagenes_noticias/Trofeo.png');
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
  `Id_Torneo` int DEFAULT NULL,
  KEY `Usuario` (`Usuario`),
  KEY `Id_Torneo_idx` (`Id_Torneo`),
  CONSTRAINT `id` FOREIGN KEY (`Id_Torneo`) REFERENCES `torneo` (`ID_Torneo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Usu` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`ID_Noticia`) REFERENCES `noticia` (`ID_Noticia`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `CantidadMovimientos` int DEFAULT NULL,
  `Tablero` longtext,
  PRIMARY KEY (`ID_Problema`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problema`
--

LOCK TABLES `problema` WRITE;
/*!40000 ALTER TABLE `problema` DISABLE KEYS */;
INSERT INTO `problema` VALUES (6,1,'[null,[null,{\"Piezas\":\"t\",\"color\":\"b\",\"Ejex\":1,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":1,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":1,\"Ejey\":7},{\"Piezas\":\"tn\",\"color\":\"n\",\"Ejex\":1,\"Ejey\":8}],\n[null,{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":2,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":3},{\"Piezas\":\"an\",\"color\":\"n\",\"Ejex\":2,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":2,\"Ejey\":7},{\"Piezas\":\"cn\",\"color\":\"n\",\"Ejex\":2,\"Ejey\":8}],\n[null,{\"Piezas\":\"a\",\"color\":\"b\",\"Ejex\":3,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":3,\"Ejey\":2},{\"Piezas\":\"c\",\"color\":\"b\",\"Ejex\":3,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":3,\"Ejey\":7},{\"Piezas\":\"an\",\"color\":\"n\",\"Ejex\":3,\"Ejey\":8}],\n[null,{\"Piezas\":\"d\",\"color\":\"b\",\"Ejex\":4,\"Ejey\":1},{\"Piezas\":null,\"color\":null,\"Ejex\":4,\"Ejey\":2},{\"Piezas\":\"c\",\"color\":\"b\",\"Ejex\":4,\"Ejey\":3},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":4,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":4,\"Ejey\":5},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":4,\"Ejey\":6},{\"Piezas\":null,\"color\":null,\"Ejex\":4,\"Ejey\":7},{\"Piezas\":\"dn\",\"color\":\"n\",\"Ejex\":4,\"Ejey\":8}],\n[null,{\"Piezas\":\"r\",\"color\":\"b\",\"Ejex\":5,\"Ejey\":1},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":3},{\"Piezas\":\"cn\",\"color\":\"n\",\"Ejex\":5,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":6},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":7},{\"Piezas\":\"tn\",\"color\":\"n\",\"Ejex\":5,\"Ejey\":8}],\n[null,{\"Piezas\":\"a\",\"color\":\"b\",\"Ejex\":6,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":6,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":6,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":8}],\n[null,{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":7,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":7,\"Ejey\":7},{\"Piezas\":\"rn\",\"color\":\"n\",\"Ejex\":7,\"Ejey\":8}],\n[null,{\"Piezas\":\"t\",\"color\":\"b\",\"Ejex\":8,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":8,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":8,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":8}]]'),(7,3,'[null,[null,{\"Piezas\":\"t\",\"color\":\"b\",\"Ejex\":1,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":1,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":1,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":1,\"Ejey\":8}],\n[null,{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":1},{\"Piezas\":\"a\",\"color\":\"b\",\"Ejex\":2,\"Ejey\":2},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":2,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":4},{\"Piezas\":\"c\",\"color\":\"b\",\"Ejex\":2,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":2,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":2,\"Ejey\":8}],\n[null,{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":1},{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":3},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":3,\"Ejey\":4},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":3,\"Ejey\":5},{\"Piezas\":\"cn\",\"color\":\"n\",\"Ejex\":3,\"Ejey\":6},{\"Piezas\":null,\"color\":null,\"Ejex\":3,\"Ejey\":7},{\"Piezas\":\"rn\",\"color\":\"n\",\"Ejex\":3,\"Ejey\":8}],\n[null,{\"Piezas\":\"d\",\"color\":\"b\",\"Ejex\":4,\"Ejey\":1},{\"Piezas\":null,\"color\":\"n\",\"color\":null,\"Ejex\":4,\"Ejey\":2},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":4,\"Ejey\":3},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":4,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":4,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":4,\"Ejey\":6},{\"Piezas\":\"dn\",\"color\":\"n\",\"Ejex\":4,\"Ejey\":7},{\"Piezas\":\"tn\",\"color\":\"n\",\"Ejex\":4,\"Ejey\":8}],\n[null,{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":1},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":3},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":5,\"Ejey\":4},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":5,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":6},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":5,\"Ejey\":8}],\n[null,{\"Piezas\":\"t\",\"color\":\"b\",\"Ejex\":6,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":6,\"Ejey\":2},{\"Piezas\":\"c\",\"color\":\"b\",\"Ejex\":6,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":5},{\"Piezas\":\"cn\",\"color\":\"n\",\"Ejex\":6,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":6,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":6,\"Ejey\":8}],\n[null,{\"Piezas\":\"r\",\"color\":\"b\",\"Ejex\":7,\"Ejey\":1},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":7,\"Ejey\":2},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":3},{\"Piezas\":\"an\",\"color\":\"n\",\"Ejex\":7,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":6},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":7},{\"Piezas\":null,\"color\":null,\"Ejex\":7,\"Ejey\":8}],\n[null,{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":1},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":2},{\"Piezas\":\"p\",\"color\":\"b\",\"Ejex\":8,\"Ejey\":3},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":4},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":5},{\"Piezas\":null,\"color\":null,\"Ejex\":8,\"Ejey\":6},{\"Piezas\":\"pn\",\"color\":\"n\",\"Ejex\":8,\"Ejey\":7},{\"Piezas\":\"tn\",\"color\":\"n\",\"Ejex\":8,\"Ejey\":8}]]');
/*!40000 ALTER TABLE `problema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problemasresueltos`
--

DROP TABLE IF EXISTS `problemasresueltos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `problemasresueltos` (
  `ID_Problema` int NOT NULL,
  `Usuarios` varchar(45) NOT NULL,
  KEY `Usuarios_idx` (`Usuarios`),
  CONSTRAINT `Usuarios` FOREIGN KEY (`Usuarios`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problemasresueltos`
--

LOCK TABLES `problemasresueltos` WRITE;
/*!40000 ALTER TABLE `problemasresueltos` DISABLE KEYS */;
INSERT INTO `problemasresueltos` VALUES (6,'El_Tomy'),(7,'El_Tomy');
/*!40000 ALTER TABLE `problemasresueltos` ENABLE KEYS */;
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
  `Contrasenia` varchar(130) DEFAULT NULL,
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
  `ELO_Min` int DEFAULT NULL,
  `ELO_Max` int DEFAULT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Fecha_fin` date DEFAULT NULL,
  `Numero_Participantes` int DEFAULT NULL,
  `Primero` varchar(45) DEFAULT NULL,
  `Segundo` varchar(45) DEFAULT NULL,
  `Tercero` varchar(45) DEFAULT NULL,
  `TiempoDescalificar` time DEFAULT NULL,
  `PartidasxDia` int DEFAULT NULL,
  `CantidaddeReservas` int DEFAULT NULL,
  `Localidad` varchar(45) DEFAULT NULL,
  `EdadMinima` int DEFAULT NULL,
  `EdadMaxima` int DEFAULT NULL,
  `Tiempo` int DEFAULT NULL,
  `InicioTorneo` datetime DEFAULT NULL,
  `Preset` int DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_Torneo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneo`
--

LOCK TABLES `torneo` WRITE;
/*!40000 ALTER TABLE `torneo` DISABLE KEYS */;
INSERT INTO `torneo` VALUES (17,0,0,'2021-10-10','2021-10-12',0,'El_Tomy','EL7Seven','Maty2914','00:00:01',1,0,'',0,0,1,'2021-10-13 16:55:00',0,'Torneo Prueba');
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
  `Contrasenia` varchar(130) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  `NumeroIcono` varchar(45) DEFAULT NULL,
  `ColorIcono` varchar(45) DEFAULT NULL,
  `ColorFondo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'a',12345678,3,'fsadf','sadfasdf','asdasd','123456789','82e19fa12aab7cfc718a002fc82c0f074bf070e7','2021-10-02','mr.blanco2016@gmail.com','fas fa-user','#ffffff','#0076be'),(0,'Administrador',12345678,6,'Administrador','IEP','Administrador','123456789','85550d8e5fc50eb75c4718efe38438b49452bbcf','2003-05-10','Administrador@Administrador.com','fas fa-hammer','#1d9ac3','#204e6a'),(1,'Agustin',46083270,4,'Breccia','Iep','Agustin','099111111','1fb10b98df5e0c7df18c82924fdad0ff97514bab','1988-11-08','sven@gmail..com','fas fa-user','#ffffff','#0076be'),(1,'BOT',12345678,6,'BOT','BOT','ALFI ᴮᴼᵀ','000000000','60497067f3bddb2c37e5b94a3a711487aa435cfc','2021-07-01','BOT@gmail.com','fas fa-robot','#000000','#ffffff'),(0,'ByJuanii_',54879239,6,'Morena','IEP','Juan','098234717','85e8d9a16e8660cc883329709e2e179b03bd9d32','2003-05-10','thewolfmodzyt@gmail.com','fa fa-fighter-jet','#ffaa00','#2e2e2e'),(0,'El_Tomy',12345678,6,'pepe','pepe','pepee','123456789','59d8318230e7b0883406bae77fd4dd16a4fd492a','1847-02-11','mr.blanco2016@gmail.com','fas fa-bug','#ff00dd','#000000'),(0,'EL7Seven',12345678,6,'Quiring','iep','manco','123456789','9c06df9d4ae68fe1ecfe27803ff7931c865d0a90','2009-11-17','svenpqiep@gmail.com','far fa-eye','#ffffff','#000000'),(1,'Grilloldo',41533985,6,'Grillo','IEP','Daniel ','094132077','1dda43a4016d0f589243bf5859efa7a099f1b5aa','1984-03-22','d.grillo2012@gmail.com','fas fa-user','#ffffff','#0076be'),(0,'Maty2914',54732839,2,'Rasnik','IEP','Matias','091614192','900528e8f9efd829e758a24f429331c357163193','2003-08-14','mlolachir@gmail.com','fas fa-biohazard','#bb00ff','#222222'),(1,'OmeroRapero',54148473,6,'Omero','IEP','OmeroElRapero','091935392','1298030a91f59e523f9fb527fd6727770c3825ab','2021-01-08','nicomati18@gmail.com','fas fa-user','#ffffff','#0076be'),(1,'OmeroRaperoNoFake',54149764,6,'Rigoberto','IEP','Peperulo','091976382','1298030a91f59e523f9fb527fd6727770c3825ab','2021-10-12','nicomati18@gmail.com','fas fa-user','#ffffff','#0076be'),(3,'pepeperiodista',12345678,6,'pepeperiodista','pepeperiodista','pepeperiodista','123456789','fd99b705f67f3cf6ef4b4b36f90e461bd9af6752','2021-09-02','mr.blanco2016@gmail.com','fas fa-user','#ffffff','#0076be'),(3,'Periodista',12345678,2,'Periodista','IEP','Periodista','1234568789','9c06df9d4ae68fe1ecfe27803ff7931c865d0a90','2021-08-06','periodista@gmail.com','fas fa-microphone','#f8b703','#222222'),(1,'ProfSergio',55555555,4,'Acosta','Iep','Sergio','094144390','0027b4efb986a6cab9ce6e39f2567d8c276b6f2d','2006-09-12','sasehara0@gmail.com','fas fa-user','#ffffff','#0076be'),(1,'YeEpIkAiYeI',54915798,6,'Vallejo','Santa Elena Lagomar','Germán','098421006','ca64064e4d5255a3b936fc99fc8cc6467a841af9','2003-07-23','gervallejo15@gmail.com','fab fa-accessible-icon','#2bff00','#4a5d68');
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
  CONSTRAINT `usuariologro_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariologro`
--

LOCK TABLES `usuariologro` WRITE;
/*!40000 ALTER TABLE `usuariologro` DISABLE KEYS */;
INSERT INTO `usuariologro` VALUES ('El_Tomy',1),('El_Tomy',2),('El_Tomy',8),('El_Tomy',9),('El_Tomy',3),('ByJuanii_',3),('El_Tomy',4),('Maty2914',1),('Maty2914',8),('Maty2914',9),('Maty2914',2),('Maty2914',4),('Maty2914',5),('ByJuanii_',1),('ByJuanii_',4),('ByJuanii_',8),('EL7Seven',1),('EL7Seven',8);
/*!40000 ALTER TABLE `usuariologro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_online`
--

DROP TABLE IF EXISTS `usuarios_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_online` (
  `Usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_online`
--

LOCK TABLES `usuarios_online` WRITE;
/*!40000 ALTER TABLE `usuarios_online` DISABLE KEYS */;
INSERT INTO `usuarios_online` VALUES ('Agustin'),('ByJuanii_'),('El_Tomy'),('EL7Seven'),('Maty2914');
/*!40000 ALTER TABLE `usuarios_online` ENABLE KEYS */;
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
  CONSTRAINT `usuariotrofeo_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Usuario`) ON DELETE CASCADE ON UPDATE CASCADE
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
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `ActualizarUsuario`(IN Usu Varchar(60), IN Nom Varchar(60), IN Ape Varchar(60), IN Mai Varchar(100), IN Inst Varchar(60), IN an INT, IN Cedula INT, IN Cont Varchar(60))
BEGIN
	update usuario set Nombre = Nom, Apellido = Ape, Mail = Mai, Institucion = Inst, Año = an, CI = Cedula, Contacto = Cont where Usuario = usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizoPorcentaje` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `ActualizoPorcentaje`(IN id int,IN por int)
BEGIN
	update logro set Procentaje = por where ID_Logro = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AgendoPartida` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `AgendoPartida`( IN usu varchar(45),  IN usu2 varchar(45),IN col1 int,IN col2 int,IN IDT int,IN tiempo VARCHAR(45))
BEGIN
	insert into juego ( Usuario1, Usuario2, Turno, Color1, Color2,Tablero,Estado,Movimientos,Jaque1,Jaque2,Torneo,Barra, Tiempo1,Tiempo2) values
    (usu,usu2,'1',col1,col2,'[null,[null,{"Piezas":"tn","color":"n","Ejex":1,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":1,"Ejey":2},{"Piezas":null,"color":null,"Ejex":1,"Ejey":3},{"Piezas":null,"color":null,"Ejex":1,"Ejey":4},{"Piezas":null,"color":null,"Ejex":1,"Ejey":5},{"Piezas":null,"color":null,"Ejex":1,"Ejey":6},{"Piezas":"p","color":"b","Ejex":1,"Ejey":7},{"Piezas":"t","color":"b","Ejex":1,"Ejey":8}],[null,{"Piezas":"cn","color":"n","Ejex":2,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":2,"Ejey":2},{"Piezas":null,"color":null,"Ejex":2,"Ejey":3},{"Piezas":null,"color":null,"Ejex":2,"Ejey":4},{"Piezas":null,"color":null,"Ejex":2,"Ejey":5},{"Piezas":null,"color":null,"Ejex":2,"Ejey":6},{"Piezas":"p","color":"b","Ejex":2,"Ejey":7},{"Piezas":"c","color":"b","Ejex":2,"Ejey":8}],[null,{"Piezas":"an","color":"n","Ejex":3,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":3,"Ejey":2},{"Piezas":null,"color":null,"Ejex":3,"Ejey":3},{"Piezas":null,"color":null,"Ejex":3,"Ejey":4},{"Piezas":null,"color":null,"Ejex":3,"Ejey":5},{"Piezas":null,"color":null,"Ejex":3,"Ejey":6},{"Piezas":"p","color":"b","Ejex":3,"Ejey":7},{"Piezas":"a","color":"b","Ejex":3,"Ejey":8}],[null,{"Piezas":"dn","color":"n","Ejex":4,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":4,"Ejey":2},{"Piezas":null,"color":null,"Ejex":4,"Ejey":3},{"Piezas":null,"color":null,"Ejex":4,"Ejey":4},{"Piezas":null,"color":null,"Ejex":4,"Ejey":5},{"Piezas":null,"color":null,"Ejex":4,"Ejey":6},{"Piezas":"p","color":"b","Ejex":4,"Ejey":7},{"Piezas":"d","color":"b","Ejex":4,"Ejey":8}],[null,{"Piezas":"rn","color":"n","Ejex":5,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":5,"Ejey":2},{"Piezas":null,"color":null,"Ejex":5,"Ejey":3},{"Piezas":null,"color":null,"Ejex":5,"Ejey":4},{"Piezas":null,"color":null,"Ejex":5,"Ejey":5},{"Piezas":null,"color":null,"Ejex":5,"Ejey":6},{"Piezas":"p","color":"b","Ejex":5,"Ejey":7},{"Piezas":"r","color":"b","Ejex":5,"Ejey":8}],[null,{"Piezas":"an","color":"n","Ejex":6,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":6,"Ejey":2},{"Piezas":null,"color":null,"Ejex":6,"Ejey":3},{"Piezas":null,"color":null,"Ejex":6,"Ejey":4},{"Piezas":null,"color":null,"Ejex":6,"Ejey":5},{"Piezas":null,"color":null,"Ejex":6,"Ejey":6},{"Piezas":"p","color":"b","Ejex":6,"Ejey":7},{"Piezas":"a","color":"b","Ejex":6,"Ejey":8}],[null,{"Piezas":"cn","color":"n","Ejex":7,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":7,"Ejey":2},{"Piezas":null,"color":null,"Ejex":7,"Ejey":3},{"Piezas":null,"color":null,"Ejex":7,"Ejey":4},{"Piezas":null,"color":null,"Ejex":7,"Ejey":5},{"Piezas":null,"color":null,"Ejex":7,"Ejey":6},{"Piezas":"p","color":"b","Ejex":7,"Ejey":7},{"Piezas":"c","color":"b","Ejex":7,"Ejey":8}],[null,{"Piezas":"tn","color":"n","Ejex":8,"Ejey":1},{"Piezas":"pn","color":"n","Ejex":8,"Ejey":2},{"Piezas":null,"color":null,"Ejex":8,"Ejey":3},{"Piezas":null,"color":null,"Ejex":8,"Ejey":4},{"Piezas":null,"color":null,"Ejex":8,"Ejey":5},{"Piezas":null,"color":null,"Ejex":8,"Ejey":6},{"Piezas":"p","color":"b","Ejex":8,"Ejey":7},{"Piezas":"t","color":"b","Ejex":8,"Ejey":8}]]','1','[]','{"jaque":null,"pieza":null,"color":null,"x":null,"y":null}','{"jaque":null,"pieza":null,"color":null,"x":null,"y":null}', IDT,'50',tiempo,tiempo);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AgregarEstadistica` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarEstadistica`(IN El INT,IN Usu Varchar(60),IN Vict INT,IN Tab INT,IN Der INT,IN Coron INT,IN Comid INT,IN MT INT,IN MM INT)
BEGIN
	if(not exists(select * from estadisticas where Usuario = Usu))then
		insert into estadisticas(Usuario,ELO,Victorias,Derrotas,Tablas,Coronaciones,Comidas,Menos_Tiempo,Menos_Movimientos)value(Usu,El,Vict,Der,Tab,Coron,Comid,MT,MM);
    else
		UPDATE estadisticas SET ELO = El , Victorias = Vict, Derrotas = Der , Tablas = Tab , Coronaciones = Coron , Comidas = Comid , Menos_Tiempo = MT , Menos_Movimientos = MM WHERE Usuario = Usu;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AgregarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarUsuario`(IN Tip INT,IN Usu Varchar(60),IN Cedula INT,IN an INT,IN Ape Varchar(60),IN Inst Varchar(60),IN Nom Varchar(60),IN Cont Varchar(60),IN Pass Varchar(130),IN Nac Date,IN Mai Varchar(100),IN Num Varchar(45),IN ColI Varchar(45),IN ColF Varchar(45))
BEGIN
	insert into usuario(Tipo,Usuario,CI,Año,Apellido,Institucion,Nombre,Contacto,Contrasenia,Nacimiento,Mail,NumeroIcono,ColorIcono,ColorFondo)value(Tip,Usu,Cedula,an,Ape,Inst,Nom,Cont,Pass,Nac,Mai,Num,ColI,ColF);
	Delete from Solicitudes where Usuario = Usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AgregoUsuOnline` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregoUsuOnline`( IN usu varchar(45))
BEGIN
	insert into usuarios_online (Usuario) values (usu);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
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
	Delete from solicitudes where Usuario = Usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BorrarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `BorrarUsuario`(IN usu varchar(60))
BEGIN
	delete from usuario where Usuario = usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BorroUsuOnline` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorroUsuOnline`( IN usu varchar(45))
BEGIN
    truncate usuarios_online;
    insert into usuarios_online (Usuario) values (usu);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BuscoJugador` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `BuscoJugador`(IN usu varchar(60))
BEGIN
	select Usuario, NumeroIcono, ColorIcono, ColorFondo, Tipo  from usuario where Usuario = usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BuscoUsuOnline` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscoUsuOnline`()
BEGIN
	select * from usuarios_online;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambiarContraseña` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `CambiarContraseña`(In usu varchar(60), In contraNueva varchar(130), IN contra varchar(130))
BEGIN
	update usuario set Contrasenia = contraNueva where Usuario = usu AND Contrasenia = contra;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambiarContrasenia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `CambiarContrasenia`(In usu varchar(60), In contraNueva varchar(130))
BEGIN
	update usuario set Contrasenia = contraNueva where Usuario = usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambioNombre` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `CambioNombre`(In usuNuevo varchar(60), IN usu varchar(60))
BEGIN
	update usuario set Usuario = usuNuevo where Usuario = usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cargoPartido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cargoPartido`(IN id INT)
BEGIN
	select * from juego where ID_Partido = id and Estado = '1' and Torneo = '0';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CrearNoticia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `CrearNoticia`(IN Usu varchar(45),IN Tit Varchar(50),IN Des varchar(200),IN Inf LONGTEXT,IN url varchar(100))
BEGIN
	insert into noticia (Usuario,Titulo,Descripcion,Informacion,IMG)value(Usu,Tit,Des,Inf,url);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CrearPartidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearPartidos`( IN usu varchar(45), IN col1 int)
BEGIN
	insert into juego ( Usuario1, Turno, Color1, Estado, Torneo, Jaque1, Jaque2) values (usu,'1',col1,'1', '0', '{"jaque":null,"pieza":null,"color":null,"x":null,"y":null}','{"jaque":null,"pieza":null,"color":null,"x":null,"y":null}');
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearTorneo`(IN tiem int,IN EloMinimo int, IN EloMaximo int,IN Fechai date,In fechaf date,IN NumP int,IN timedes time,IN pxd int,IN cantres int,IN loc varchar(60),IN edadmin int,IN edadmax int,IN it datetime,IN ps int,IN nom varchar(45))
BEGIN
	Insert into torneo (tiempo,ELO_Min,ELO_Max, Fecha_inicio, Fecha_fin,Numero_Participantes,TiempoDescalificar,PartidasxDia,CantidaddeReservas,Localidad,EdadMinima,EdadMaxima,InicioTorneo,Preset,Nombre)value(tiem,EloMinimo,EloMaximo,Fechai,fechaf,NumP,timedes,pxd,cantres,loc,edadmin,edadmax,it,ps,nom);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EditarParticipante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `EditarParticipante`(IN Usu varchar(45),IN pun int,IN cor int,IN com int,IN MT int,IN MM int,IN id int)
BEGIN
if(not exists(select * from participante where Usuario = Usu))then
		insert into participante(Usuario,Puntos,Coronaciones,Comidas,Menos_Tiempo,Menos_Movimientos,Id_Torneo)value(Usu,pun,cor,com,MT,MM,id);
    else
		UPDATE participante SET Puntos = pun , Coronaciones = cor, Comidas = com , Menos_Tiempo = MT , Menos_Movimientos = MM WHERE Usuario = Usu;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EliminarNoticia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `EliminarNoticia`(IN id int)
BEGIN
	delete from noticia where ID_Noticia = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EntrenamientoCompleto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `EntrenamientoCompleto`(IN id INT,IN Usu varchar(45))
BEGIN
	insert into problemasresueltos (ID_Problema,Usuarios) values (id,Usu);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FinalizarTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `FinalizarTorneo`(IN pri varchar(45),IN Se varchar(45),IN Ter varchar(45),IN idt int)
BEGIN
	update torneo set Primero = pri,Segundo = Se,Tercero = Ter where ID_Torneo = idt;
    delete from participante where Id_Torneo = idt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `FixturePuntos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `FixturePuntos`(IN id int)
BEGIN
	select * from participante where Id_Torneo = id order by Puntos Desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GuardoFotoPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardoFotoPerfil`(IN Usu varchar(60),IN Num Varchar(45),IN ColI Varchar(45),IN ColF Varchar(45))
BEGIN
	UPDATE usuario SET NumeroIcono = Num , ColorIcono = ColI , ColorFondo = ColF WHERE Usuario = Usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GuardoJaque` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardoJaque`( IN jug INT, IN jaque longtext, IN usu varchar(45))
BEGIN
IF jug = '1' THEN
   update juego set Jaque1 = jaque  where Usuario1 = usu and Estado = '1';
ELSE
   update juego set Jaque2 = jaque  where Usuario2 = usu and Estado = '1';
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GuardoTablero` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardoTablero`( IN id INT, IN tab longtext, IN tur INT, IN mov longtext, IN barra INT)
BEGIN
	update juego set Tablero = tab, Turno = tur, Movimientos = mov, Barra = barra where ID_Partido = id and Estado = '1';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GuardoTiempo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardoTiempo`( IN id INT, IN jug INT, IN tiempo varchar(45))
BEGIN
IF jug = '1' THEN
   update juego set Tiempo1 = tiempo  where ID_partido = id and Estado = '1';
ELSE
   update juego set Tiempo2 = tiempo  where ID_partido = id and Estado = '1';
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoEstadisticas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InfoEstadisticas`(IN Usu varchar(60))
BEGIN
	Select * from estadisticas where Usuario = Usu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoParticipante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `InfoParticipante`(IN Usu varchar(45),out x int)
BEGIN
    if(not exists(select * from participante where Usuario = Usu))then
		set x = "1";
        else
        set x = "0";
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoPartida` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `InfoPartida`(IN Nombre varchar(45),IN Torneo INT)
BEGIN
	if(Nombre != '')then
		select * from InfoPartida where (Jugador1 = Nombre) or (Jugador2 = Nombre);
    else
		select * from InfoPartida where ID_Torneo = Torneo;
    end IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InfoPartidaTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `InfoPartidaTorneo`(IN IDT INT,IN Usu1 varchar(45),IN Usu2 varchar(45),IN fech datetime,IN Ron int)
BEGIN
	Insert into Infopartida (ID_Torneo,Jugador1,Jugador2,Fecha,Ronda)value(IDT,Usu1,Usu2,fech,Ron);
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
	Select * From solicitudes;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `infoTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `infoTorneo`()
BEGIN
	select * from torneo;
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
/*!50003 DROP PROCEDURE IF EXISTS `ModificarNoticia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `ModificarNoticia`(IN Usu varchar(45),IN id int,IN Tit Varchar(50),IN Des varchar(200),IN Inf varchar(2000),IN url varchar(100))
BEGIN
	update noticia set Titulo = Tit, Descripcion = Des , Informacion = Inf , IMG = url where Usuario = Usu and ID_Noticia = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificoPartidaAgendada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `ModificoPartidaAgendada`(IN idp int,IN id int,IN Usu1 Varchar(45),IN Usu2 Varchar(45),IN Est int,IN Ron int,IN Fech datetime)
BEGIN
	UPDATE partidaagendada SET IDTorneo = id,Usuario1 = Usu1,Usuario2 = Usu2,Estado = Est,Ronda = Ron,Fecha = Fech WHERE idPartidaAgendada = idp;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MovimientoCorrecto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `MovimientoCorrecto`(IN id int,IN Turn int,IN Ejex int,IN Ejey int,IN Ficha varchar(45))
BEGIN
	Declare xp INT;
    Declare yp INT;
    Declare Pp varchar(45);
    SET @xp = (select x from jugadas where ID_Problema = id and Turno =Turn);
    SET @yp = (select y from jugadas where ID_Problema = id and Turno =Turn);
    SET @Pp = (select Pieza from jugadas where ID_Problema = id and Turno =Turn);
    if(@xp = Ejex  and @yp = Ejey and @Pp = Ficha)then
		if(exists(select * from jugadas where ID_Problema = id and Turno = (Turn + 1)))then 
			select x,y,Pieza,XNULL,YNULL from jugadas where ID_Problema = id and Turno = (Turn + 1);
		else
			select 9,9,9,9,9;
		end if;
    else
		select 0,0,0,0,0;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MuestroNoticias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `MuestroNoticias`()
BEGIN
	select * from noticia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `NoticiasIndex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NoticiasIndex`()
BEGIN
	select * from noticia order by ID_Noticia Desc limit 3;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `NuevoLogro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `NuevoLogro`(IN usu varchar(60),IN log int)
BEGIN
	insert into usuariologro (Usuario,ID_Logro) value (usu,log);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PerfilUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PerfilUsuario`(IN US varchar(60))
BEGIN
	select * from usuario where Usuario = US;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ProblemasNoResueltos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `ProblemasNoResueltos`(IN Usu varchar(45))
BEGIN
	Declare NUM int;
    Declare NUMUsu int;
    Set @NUM = (Select count(ID_Problema) from problema);
    Set @NUMUsu = (Select count(ID_Problema) from problemasresueltos where Usuarios = Usu);
    If(@NUMUsu = @NUM)then
     Select 0;
    else
		if((select ID_Problema from problemasresueltos where Usuarios = Usu)is not null)then
			select ID_Problema from Problema where ID_Problema <> (select ID_Problema from problemasresueltos where Usuarios = Usu);
        else
			Select ID_Problema from Problema;
        end if;
    end if;
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `Register`(IN Tip INT,IN Usu Varchar(60),IN Cedula INT,IN an INT,IN Ape Varchar(60),IN Inst Varchar(60),IN Nom Varchar(60),IN Cont Varchar(60),IN Pass Varchar(130),IN Nac Date,IN Mai Varchar(100),IN Num Varchar(45),IN ColI Varchar(45),IN ColF Varchar(45),out x int)
BEGIN
	if(not exists(select * from usuario where Usuario = Usu))then
		if(not exists(select * from solicitudes where Usuario = Usu))then
			if(tip =  1)then
				insert into usuario(Tipo,Usuario,CI,Año,Apellido,Institucion,Nombre,Contacto,Contrasenia,Nacimiento,Mail,NumeroIcono,ColorIcono,ColorFondo)value(Tip,Usu,Cedula,an,Ape,Inst,Nom,Cont,Pass,Nac,Mai,Num,ColI,ColF);
                set x = "1";
			else
				insert into solicitudes(Tipo,Usuario,CI,Año,Apellido,Institucion,Nombre,Contacto,Contrasenia,Nacimiento,Mail)value(Tip,Usu,Cedula,an,Ape,Inst,Nom,Cont,Pass,Nac,Mai);
                set x = "2";
                
			end if;
            else
            set x = "0";
		end if;
        else
        set x = "0";
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `terminoPartido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `terminoPartido`( IN jug INT, IN usu varchar(45))
BEGIN
IF jug = '1' THEN
   update juego set Estado = '0'  where Usuario1 = usu;
ELSE
   update juego set Estado = '0'  where Usuario2 = usu;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Top` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `Top`()
BEGIN
	SELECT usuario.*, estadisticas.ELO FROM usuario INNER JOIN estadisticas ON estadisticas.Usuario=usuario.Usuario order by ELO desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoEntrenamiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoEntrenamiento`(IN id INT)
BEGIN
	if(id != 0)then
		Select * from Problema where ID_Problema = id;
    else
		select 0,0,0;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoJaque` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoJaque`(IN usu varchar(60), IN jug INT)
BEGIN
if jug = '1' then
	select Jaque1 from juego where Torneo = '0' and Estado = '1' and Usuario1 = usu;
    ELSE
	select Jaque2 from juego where Torneo = '0' and Estado = '1' and Usuario2 = usu;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoLogro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoLogro`(IN id int)
BEGIN
	select ID_Logro from usuariologro where ID_Logro = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoLogros` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TraigoLogros`()
BEGIN
	select * from logro;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoMisLogros` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoMisLogros`(IN usu varchar(60))
BEGIN
	select ID_Logro from usuariologro where Usuario = usu ORDER BY ID_Logro asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoNoticias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoNoticias`(IN id int)
BEGIN
	select * from noticia where ID_Noticia = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoPartidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TraigoPartidos`()
BEGIN
	select * from juego where Estado = '1' and Torneo = '0';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoPartidosTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoPartidosTorneo`()
BEGIN
	select * from juego where Estado = '1' and Torneo !='0' ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoTablero` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cyberhydra`@`%` PROCEDURE `TraigoTablero`(IN id INT)
BEGIN
	select Tablero, Turno, Movimientos, Barra, Tiempo1, Tiempo2 from juego where Torneo = '0' and Estado = '1' and ID_partido = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoUltimaIDpartido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TraigoUltimaIDpartido`()
BEGIN
	SELECT MAX(ID_Partido) FROM juego;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TraigoUsuariosTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `TraigoUsuariosTorneo`(IN id INT)
BEGIN
	select Usuario from participante where Id_Torneo = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UnirsePartidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `UnirsePartidos`(IN idp int, IN usu varchar(45), IN col2 int)
BEGIN
	update juego set Usuario2 = usu, Color2 = col2 where ID_Partido = idp;
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

-- Dump completed on 2021-10-19 18:19:39
