CREATE DATABASE  IF NOT EXISTS `projetomiau` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `projetomiau`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: projetomiau
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `ajuda`
--

DROP TABLE IF EXISTS `ajuda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ajuda` (
  `idajuda` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `iddoacao` int(5) unsigned zerofill NOT NULL,
  `idusuario` int(5) unsigned zerofill NOT NULL,
  `formAjuda` varchar(50) NOT NULL,
  `ajuda` text NOT NULL,
  `dataAjuda` datetime DEFAULT NULL,
  `situacaoAjuda` tinyint(1) DEFAULT 1,
  `foto_comprovante` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idajuda`),
  KEY `ajuda_ibfk_1_idx` (`iddoacao`),
  KEY `ajuda_ibfk_2_idx` (`idusuario`),
  CONSTRAINT `ajuda_ibfk_1` FOREIGN KEY (`iddoacao`) REFERENCES `doacao` (`iddoacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ajuda_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajuda`
--

LOCK TABLES `ajuda` WRITE;
/*!40000 ALTER TABLE `ajuda` DISABLE KEYS */;
INSERT INTO `ajuda` VALUES (00001,00002,00001,'Alimentos','Ração para gato','2022-05-30 07:06:25',1,NULL),(00002,00002,00001,'Pix','10 reais','2022-05-30 07:07:39',1,NULL),(00003,00002,00001,'Pix','25 reais','2022-05-30 19:10:43',1,NULL),(00006,00002,00001,'Pix','56 reais','2022-06-25 18:07:39',1,'../images/ajuda/0f22cbff0c541d081a6c2b5adce8ec2b4849cc89.jpeg'),(00007,00002,00001,'Medicamentos','Antipulgas','2022-06-25 18:09:09',1,'');
/*!40000 ALTER TABLE `ajuda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal` (
  `idanimal` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idusuario` int(5) unsigned zerofill NOT NULL,
  `especie` char(15) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `sexo` char(5) NOT NULL,
  `porte` char(7) DEFAULT NULL,
  `temperamento` char(15) DEFAULT NULL,
  `situacaoAnimal` tinyint(1) DEFAULT 1,
  `img_animal` varchar(255) DEFAULT '../images/animais/unset.png',
  `dataCadastro` date NOT NULL,
  PRIMARY KEY (`idanimal`),
  KEY `animal_ibfk_1_idx` (`idusuario`),
  CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (00010,00006,'cachorro','Bilbo','Bilbo é o cachorro mais fofo que você verá hoje!\r\nEle precisa muito ser adotar...\r\nEstá vermifugado, vacinado e castrado. Tudo OK! Dou preferência por pessoas com lares bem estruturados.\r\n61985462332\r\ncarolex@gmail.com','Macho','Médio','Reservado',1,'../images/animais/image4.jpg','2022-05-15'),(00012,00005,'gato','Gata Siamês','Estou doando essa gata siâmes...\r\n\r\nmatgamer2017@gmail.com\r\n~ Matheus','Fêmea','Pequeno','Dócil',1,'../images/animais/gato-siames-petlove.jpg','2022-05-16'),(00013,00005,'cachorro','Simba','Simba, parece um leão, mas é a coisa mais fofa que você verá hoje;\r\nEle precisa muito de medicamentos, pois está doente.\r\nMeu contato:\r\n61985527059','Macho','Grande','Brincalhão',1,'../images/animais/Usando-o-laser-na-comunicação-com-o-cachorro.jpg','2022-05-16'),(00015,00004,'gato','Walkiria','Estou precisando de alguém que more perto do Gama e tenha carro para pegar essa gata.\r\nTelefone: 61982556232\r\nemail: elizasoares567@hotmail.com\r\nSó entre em contato se for realmente adotar!','Fêmea','Pequeno','Dócil',1,'../images/animais/porque-os-gatos-gostam-tanto-de-caixast.jpg','2022-05-16'),(00016,00001,'gato','Gato Curioso','Um gato curioso passando pelo seu feed...','Macho','Médio','Dócil',1,'../images/animais/gato_de_retrato_olhando_para_a_camera.jpg','2022-05-17'),(00017,00005,'cachorro','Huskies','Huskies disponíveis para adoção responsável\r\n','Macho','Médio','Brincalhão',1,'../images/animais/Husky-capa.jpg','2022-05-20');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `value` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES ('','Não selecionado'),('Águas Claras','Águas Claras'),('Asa Norte','Asa Norte'),('Asa Sul','Asa Sul'),('Ceilândia','Ceilândia'),('Gama','Gama'),('Guará','Guará'),('Lago Norte','Lago Norte'),('Lago Sul','Lago Sul'),('Núcleo Bandeirante','Núcleo Bandeirante'),('Paranoá','Paranoá'),('Planaltina','Planaltina'),('Recanto das Emas','Recanto das Emas'),('Riacho Fundo','Riacho Fundo'),('Samambaia','Samambaia'),('Sobradinho','Sobradinho'),('Taguatinga','Taguatinga');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios_animal`
--

DROP TABLE IF EXISTS `comentarios_animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios_animal` (
  `idcomentario` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idanimal` int(5) unsigned zerofill NOT NULL,
  `idusuario` int(5) unsigned zerofill NOT NULL,
  `texto` text NOT NULL,
  `situacaoComentario` tinyint(1) DEFAULT 1,
  `dataComentario` date NOT NULL,
  PRIMARY KEY (`idcomentario`),
  KEY `idanimal` (`idanimal`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `comentarios_animal_ibfk_1` FOREIGN KEY (`idanimal`) REFERENCES `animal` (`idanimal`),
  CONSTRAINT `comentarios_animal_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios_animal`
--

LOCK TABLES `comentarios_animal` WRITE;
/*!40000 ALTER TABLE `comentarios_animal` DISABLE KEYS */;
INSERT INTO `comentarios_animal` VALUES (00001,00017,00001,'FOFOS <3',1,'2022-06-25');
/*!40000 ALTER TABLE `comentarios_animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios_denuncia`
--

DROP TABLE IF EXISTS `comentarios_denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios_denuncia` (
  `idcomentario` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `iddenuncia` int(5) unsigned zerofill NOT NULL,
  `idusuario` int(5) unsigned zerofill NOT NULL,
  `texto` text NOT NULL,
  `situacaoComentario` tinyint(1) DEFAULT 1,
  `dataComentario` date NOT NULL,
  PRIMARY KEY (`idcomentario`),
  KEY `iddenuncia` (`iddenuncia`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `comentarios_denuncia_ibfk_1` FOREIGN KEY (`iddenuncia`) REFERENCES `denuncia` (`iddenuncia`),
  CONSTRAINT `comentarios_denuncia_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios_denuncia`
--

LOCK TABLES `comentarios_denuncia` WRITE;
/*!40000 ALTER TABLE `comentarios_denuncia` DISABLE KEYS */;
INSERT INTO `comentarios_denuncia` VALUES (00001,00004,00001,'Meu deus :(',1,'2022-06-25'),(00002,00004,00001,'',0,'2022-06-25');
/*!40000 ALTER TABLE `comentarios_denuncia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denuncia`
--

DROP TABLE IF EXISTS `denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denuncia` (
  `iddenuncia` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idusuario` int(5) unsigned zerofill NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text NOT NULL,
  `situacaoDenuncia` tinyint(1) NOT NULL DEFAULT 1,
  `dataCadastro` date NOT NULL,
  PRIMARY KEY (`iddenuncia`),
  KEY `denuncia_ibfk_idx` (`idusuario`),
  CONSTRAINT `denuncia_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncia`
--

LOCK TABLES `denuncia` WRITE;
/*!40000 ALTER TABLE `denuncia` DISABLE KEYS */;
INSERT INTO `denuncia` VALUES (00003,00001,'DF','Samambaia','../images/denuncias/cachorro-de-rua-pet.jpg','Cachorro abandonado aqui perto de casa!!!','Cachorro abandonado...',1,'2022-06-05'),(00004,00001,'DF','Ceilândia','../images/denuncias/gatinho.jpg','Gato mal tratado','Venham me ajudar!',1,'2022-06-05');
/*!40000 ALTER TABLE `denuncia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doacao`
--

DROP TABLE IF EXISTS `doacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doacao` (
  `iddoacao` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idong` int(5) unsigned zerofill NOT NULL,
  `idusuario` int(5) unsigned zerofill NOT NULL,
  `subtitulo` text NOT NULL,
  `fotoFundador` varchar(255) NOT NULL,
  `descFundador` text NOT NULL,
  `dataCriacao` datetime NOT NULL,
  PRIMARY KEY (`iddoacao`),
  KEY `doacao_ibfk_idx` (`idong`),
  KEY `doacao_ibfk_idx1` (`idusuario`),
  CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`idong`) REFERENCES `ong` (`idong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `doacao_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doacao`
--

LOCK TABLES `doacao` WRITE;
/*!40000 ALTER TABLE `doacao` DISABLE KEYS */;
INSERT INTO `doacao` VALUES (00002,00002,00001,'A Acãochego foi fundada em 2003, em Osasco.','../images/ongs/9017-a-aila-alianca-internacional-do-animal-articles_media_mobile-2.jpg','Em 2007, a ONG foi formalizada, e em 2008 adquirimos a sede localizada na Grande São Paulo, a uma hora da capital. O espaço é amplo, em área de preservação ambiental e abriga hoje mais de 250 animais, todos vacinados, castrados e vermifugados.','2022-05-29 11:19:35'),(00003,00004,00001,'A ONG ProAnima foi fundada em 13 de setembro em 2003.','../images/ongs/animais-e1603545053988.jpg','São centenas de animais resgatados todos os dias, precisamos que pessoas de bom coração nos ajude!','2022-06-25 18:19:09');
/*!40000 ALTER TABLE `doacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especie` (
  `value` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES ('','Não selecionado'),('cachorro','Cachorro'),('gato','Gato');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `value` char(2) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES ('','Não selecionado'),('DF','Distrito Federal');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `html`
--

DROP TABLE IF EXISTS `html`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `html` (
  `idtag` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`idtag`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `html`
--

LOCK TABLES `html` WRITE;
/*!40000 ALTER TABLE `html` DISABLE KEYS */;
INSERT INTO `html` VALUES (2,'nav','<nav class=\"flex\"><ul><li><a href=\"adotar.php\" id=\"adotar\"><div></div><h3>Adotar</h3></a></li><li><a href=\"divulgar.php\" id=\"divulgar\"><div></div><h3>Divulgar</h3></a></li><li><a href=\"doe-aqui.php\" id=\"doe-aqui\"><div></div><h3>Doe aqui</h3></a></li><li><a href=\"denuncias.php\" id=\"denuncias\"><div></div><h3>Denúncias</h3></a></li></ul></nav>');
/*!40000 ALTER TABLE `html` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ong`
--

DROP TABLE IF EXISTS `ong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ong` (
  `idong` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `situacaoOng` tinyint(1) NOT NULL DEFAULT 1,
  `dataCadastro` date NOT NULL,
  `necessidades` text NOT NULL,
  `banco` varchar(255) NOT NULL,
  `agencia` varchar(10) NOT NULL,
  `conta` varchar(10) NOT NULL,
  `pix` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idong`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ong`
--

LOCK TABLES `ong` WRITE;
/*!40000 ALTER TABLE `ong` DISABLE KEYS */;
INSERT INTO `ong` VALUES (00001,'Abrigo Flora e Fauna','A Associação Protetora dos Animais Abrigo Flora e Fauna foi fundada em 26 de maio de 2005 por Orcileni Arruda de Carvalho. \r\n  \r\n  O Abrigo acolhe cães e gatos em situação de risco, vítimas de abandono ou maus-tratos. Quando um animal chega aqui, tem quaisquer doenças tratadas, é vacinado, castrado e, após esses processos, fica disponível para adoção. Atualmente, em torno de 900 bichos vivem no Abrigo, cerca de 600 cães e 300 gatos. Ajudamos, ainda, aproximadamente 100 famílias carentes com os cuidados de seus bichinhos, fornecendo castração, ração e tratamento de doenças.','../images/ongs/abrigo-flora-fauna.jpg','69.009.820/0001-40','DF','Gama','Núcleo Rural Ponte Alta Baixo - Pte. Alta Norte (Gama), Brasília - DF, 72426-001',290,'DF-290','61986449914','contato@abrigofloraefauna.com',1,'2022-05-26','O consumo mensal (aproximado) de ração é de 7 toneladas por mês para os cachorros e 2 toneladas por mês para os gatos.<br><br>\r\n\r\nAlém dessas despesas, o Abrigo também precisa de recursos para idas ao veterinário, medicação, castração, vacinação e produtos de limpeza para os canis e gatis, sem falar nas contas de água, utilizada para o consumo e a limpeza dos animais.<br><br>\r\n\r\nPrecisamos da sua ajuda para continuar com nosso trabalho, afinal o Abrigo não possui fins lucrativos ou auxílio do governo, nem é financiado por empresas privadas. A instituição é mantida exclusivamente por meio de doações e de trabalho voluntário. Contamos com o apoio da população para receber doações e também fazer a adoção consciente de animais, proporcionando-lhes amor, saúde e conforto. Desta forma, o Abrigo poderá continuar salvando centenas de vidas.<br><br>','Itaú','6942','612621','cnpj,email'),(00002,'Acãochegos','A Acãochego nasceu em 2003, em Osasco. Surgiu da necessidade de oferecer atendimento aos animais que passavam por fome, frio e medo pelas ruas da cidade. Começamos pequeno, com poucos animais. A demanda nos fez crescer. Em 2007, a ONG foi formalizada, e em 2008 adquirimos a sede localizada na Grande São Paulo, a uma hora da capital. O espaço é amplo, em área de preservação ambiental e abriga hoje mais de 250 animais, todos vacinados, castrados e vermifugados.','../images/ongs/logo-acaochego.png','69.009.820/0001-40','DF','Asa Norte','Rua 11 módulo 6 lote 1 A - Ceilândia, Brasília - DF, 72280-468',11,'Rua','61986449914','acaochegoorg@yahoo.com.br',1,'2022-05-26','A chácara localizada na Grande São Paulo abriga mais de 250 animais. Os cães vivem em canis e são divididos por temperamento ou por famílias. Todos são vermifugados, vacinados e castrados. Recebem alimentação duas vezes ao dia e são tratados quando apresentam algum tipo de doença.<br><br>\r\n\r\nOs canis são construídos de acordo com normas internacionais e apesar de não ser o ambiente ideal para um cãozinho viver, estão hoje em um local seguro.<br><br>\r\n\r\nNo momento, precisamos de ajuda apenas com medicamentos e ração. Quem puder ajudar, agradecemos de coração!','Banco do Brasil','3118-2','68306-x','cnpj,email,telefone'),(00003,'Toca Segura','Nosso objetivo é retirar animais das ruas e de locais onde estejam correndo riscos, acolhendo-os, castrando-os e tratando de sua saúde, preparando-os dessa forma para que sejam adotados, conseguindo um lar de amor para cada um de nossos protegidos. Como o número de animais é incalculável e nosso espaço encontra-se superlotado, também ajudamos protetores independentes em suas lutas, divulgando seus protegidos e apoiando-os para que consigam lares definitivos para os animais que resgatam.','../images/ongs/Sem título.png','06.018.661/0001-20','DF','Guará','QE 3 QELC - Guará, Brasília - DF, 70297-400',8,'Lote','61982031801','teste@teste.com',1,'2022-05-26','','','','',NULL),(00004,'ProAnima','Constituída em 2003, a ProAnima é uma organização da sociedade civil de caráter socioambientalista, mantida com trabalho voluntário e cujos objetivos estratégicos são concretizados por meio de ações organizadas em quatro eixos: Ativismo, Política Pública, Educação e Proteção.\r\n\r\nAs ações da ProAnima são direcionadas às diferentes espécies de animais, sejam eles domésticos – cães, gatos e cavalos –, silvestres nativos e não nativos, do plantel de jardins zoológicos e de santuários.','../images/ongs/logo.png','69.009.820/0001-40','DF','Lago Norte','Lago Norte · Áreas Rurais – Lago Norte. Setor Habitacional Individual Norte (SHIN). CA – 01 e 04. CA',11,'Lote','61986449914','proanima@proanima.org.br',1,'2022-05-26','A ONG atualmente precisa de remédios, medicamentos e adotantes para suportar a grande quantidade de animais resgatados.','Santander','0305','00025319','telefone'),(00006,'Patinhas Carentes','Adote um Gatinho ou Cachorrinho\r\n O Grupo Patinhas Carentes foi formado em 2008, quando universitárias começaram a se engajar na causa animal. Iniciaram o projeto ajudando animais por intermédio de outros grupos de proteção e surgiu a necessidade de atender os animais que se encontravam em situação de risco e nas ruas. Fez-se necessário a criação da sede para abrigar esse animais que não tinham para onde ir. Atualmente o Patinhas abriga cerca de 50 cães e 75 gatos. ','../images/ongs/PatinhasCarentes_logo.png','69.009.820/0001-40','DF','Núcleo Bandeirante','Área Especial 03, 3ª Avenida – Núcleo Bandeirante, DF',3,'Avenida','61982031801','contato@patinhascarentes.org',1,'2022-05-26','','','','',NULL);
/*!40000 ALTER TABLE `ong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `porte`
--

DROP TABLE IF EXISTS `porte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `porte` (
  `value` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `porte`
--

LOCK TABLES `porte` WRITE;
/*!40000 ALTER TABLE `porte` DISABLE KEYS */;
INSERT INTO `porte` VALUES ('','Não selecionado'),('Pequeno','Pequeno'),('Médio','Médio'),('Grande','Grande');
/*!40000 ALTER TABLE `porte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexo` (
  `value` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES ('','Não selecionado'),('Macho','Macho'),('Fêmea','Fêmea');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temperamento`
--

DROP TABLE IF EXISTS `temperamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temperamento` (
  `value` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperamento`
--

LOCK TABLES `temperamento` WRITE;
/*!40000 ALTER TABLE `temperamento` DISABLE KEYS */;
INSERT INTO `temperamento` VALUES ('','Não selecionado'),('Dócil','Dócil'),('Bravo','Bravo'),('Brincalhão','Brincalhão'),('Reservado','Reservado');
/*!40000 ALTER TABLE `temperamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuario` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `senha` varchar(30) NOT NULL,
  `img_usuario` varchar(255) NOT NULL DEFAULT '../images/usuarios/unset.png',
  `perfil` char(1) NOT NULL DEFAULT 'U',
  `situacaoUsuario` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (00001,'Douglas','Souza de Lima','dougbr133@gmail.com','61985497046','DF','Samambaia','Mi@u1234','../images/usuarios/the-walking-dead-maggie-nova-imagem.jpg','A',1),(00004,'Elizabeth','Soares de Almeida','elizasoares567@hotmail.com','61993752271','DF','Gama','melissa6198','../images/usuarios/rosas-flores-maior-popularidade-comercializacao-cpt.jpg','U',1),(00005,'Matheus','Carvalho Damaceno','matgamer2017@gmail.com','119985456331','DF','Taguatinga','gamermal123','../images/usuarios/7d811f3194353b731d2977ed2511bcd8--adventure-time-poster-batman-wallpaper.jpg','U',1),(00006,'Carol','Sebastiana','carolex@gmail.com','61993752271','DF','Sobradinho','ca123','../images/usuarios/ciencias_naturales-flores-tierra_-planeta_499960581_154305912_1706x960.jpg','U',1),(00010,'Raylanne','Almeida','raylannerca@gmail.com','6198582242','DF','Ceilândia','raylinda','../images/usuarios/unset.png','A',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-25 19:03:47
